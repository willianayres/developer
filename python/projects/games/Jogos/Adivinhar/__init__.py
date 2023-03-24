from Jogos.cores import cor
from Jogos.inputs import lerInt, lerStr
from Jogos import prints
from Jogos import arquivos


def exeAdivinha(Max=10):
    from random import randint
    from time import sleep
    dado = [str(input(f'{cor["Brc"][1]}Digite seu nome:{cor["cls"]} ')).strip()[:20]]
    while True:
        n = int(randint(0, Max))
        print(f'{cor["Az"][1]}---' * 20)
        print(f'{f"Vou pensar em um número entre 0 e {Max}. Tente adivinhar...":^60}')
        print(f'---' * 20, f'{cor["cls"]}')
        cont = 0
        while True:
            dig = lerInt(f'{cor["Brc"][1]}Em que número eu pensei? {cor["cls"]}', Max, 0)
            print(f'{cor["Az"][1]}PENSANDO...{cor["cls"]}')
            sleep(0.75)
            cont += 1
            if dig < n:
                print(f'{cor["Vm"][1]}Errou! É mais...{cor["cls"]}.')
            elif dig > n:
                print(f'{cor["Vm"][1]}Errou! É menos...{cor["cls"]}.')
            if dig == n:
                print(f'{cor["Az"][1]}PARABÉNS!!! Você acertou o número em {cont} tentativas.')
                dado.insert(2, 'Sim')
                break
            if cont > Max/2:
                print(f'{cor["Vm"][1]}Você PERDEU! Suas 10 tentativas acabaram!{cor["cls"]}')
                dado.insert(2, 'Nao')
                break
        print(f'{cor["Az"][1]}---' * 20, f'{cor["cls"]}')
        dado.insert(1, int(Max/10))
        dado.insert(3, cont)
        arquivos.arqEscreve('adivinha.txt', dado)
        prints.menu(['Jogar Novamente', 'Aumentar Dificuldade',
                     'Diminuir Dificuldade', 'Voltar', 'Sair'], cor['Am'][1], cor['Brc'][1])
        d = lerInt(f'{cor["Am"][1]}Sua escolha >>{cor["cls"]} ', 5, 1)
        if d == 1:
            print(f'{cor["Am"][1]}Iniciando novo jogo...\n\n{cor["cls"]}')
        if d == 2:
            if Max < 100:
                Max += 10
            else:
                print(f'{cor["Vm"][0]}Dificuldade Máxima! Iniciando outro jogo normalmente!{cor["cls"]}')
        if d == 3:
            if Max > 10:
                Max -= 10
            else:
                print(f'{cor["Vm"][0]}Dificuldade Mínima! Iniciando outro jogo normalmente!{cor["cls"]}')
        if d == 4:
            break
        if d == 5:
            exit(0)
    return


def menuAdivinha():
    from time import sleep
    while True:
        prints.tit('MENU JOGO DE ADIVINHAR', c=cor['Cy'][1])
        prints.menu(['Jogar', 'Histórico', 'Voltar', 'Sair'], cor['Am'][1], cor['Az'][1])
        d = lerInt(f'{cor["Am"][1]}Sua escolha >>{cor["cls"]} ', 4, 1)
        if d == 1:
            m = lerInt(f'{cor["Am"][1]}>>>{cor["Brc"][1]} Escolha um nível entre 1 e 10:{cor["cls"]} ', 10, 1)
            exeAdivinha(m*10)
        elif d == 2:
            if not arquivos.arqExiste('adivinha.txt'):
                arquivos.arqCria('adivinha.txt')
            D = arquivos.arqLer('adivinha.txt')
            prints.tit('HISTÓRICO', c=cor["Mg"][1])
            print(f' {cor["Brc"][1]}{"Nome:":<20} {cor["Az"][1]}{"Nvl:"}  ', end='')
            print(f'{cor["Am"][1]}{"Vit:"}  {"Tnt:"} {cor["cls"]}')
            prints.lin('-', 40, cor['Mg'][0])
            for i in D:
                print(f' {cor["Brc"][0]}{i[0]:<20} {cor["Az"][0]}{i[1]:^4}  ', end='')
                print(f'{cor["Vm"][0]}' if i[2] == 'Nao' else f'{cor["Vd"][0]}', end='')
                print(f'{i[2]:^4}  ', end='')
                print(f'{i[3]:^4}{cor["cls"]} ')
            prints.lin('-', 40, cor['Mg'][0])
            limpar = lerStr(f'{cor["Am"][1]}>> Deseja limpar o arquivo? [S/N] ', 'SN', up=True, fat=0)
            if limpar == 'S':
                arquivos.arqLimpa('adivinha.txt')
            else:
                continue
            sleep(3)
        elif d == 3:
            break
        else:
            exit(0)
