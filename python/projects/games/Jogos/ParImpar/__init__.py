from Jogos import prints, arquivos
from Jogos.cores import cor
from Jogos.inputs import lerInt, lerStr


def exeParImpar(v=0):
    from random import randint
    from time import sleep
    prints.tit('PAR OU IMPAR', 40, '=', cor['Az'][1])
    dado = [str(input(f'{cor["Brc"][1]}Digite seu nome >> ')).strip()[:20]]
    while True:
        eu = lerInt(f'\n{cor["Brc"][1]}Diga o número entre 0 e 10 >> {cor["cls"]} ', 10, 0)
        pieu = lerStr(f'\n{cor["Brc"][1]}Par ou Ímpar? [P/I] ', 'PI', up=True, fat=0)
        pc = randint(0, 10)
        total = eu + pc
        print()
        prints.lin('-', 40, cor['Az'][0])
        print(f'{cor["Am"][1]}>> {cor["Brc"][1]}Jogador:    ', end='')
        print(f'{cor["Az"][1]}{"PAR"}'if pieu == 'P' else f'{cor["Az"][1]}{"ÍMPAR"}')
        prints.pensar(f'{cor["Am"][1]}>>{cor["Brc"][1]} ...{cor["cls"]}', 1)
        print(f'{cor["Am"][1]}>> {cor["Brc"][1]}Computador: ', end='')
        print(f'{cor["Az"][1]}{"ÍMPAR"}' if pieu == 'P' else f'{cor["Az"][1]}{"PAR"}')
        prints.lin('-', 40, cor['Az'][0])
        print(f'{cor["Am"][1]}>> {cor["Brc"][1]}Você jogou {cor["Az"][0]}{eu}', end='')
        print(f'{cor["Brc"][1]} e o computador {cor["Az"][0]}{pc}{cor["Brc"][1]}.')
        print(f'{cor["Am"][1]}>> {cor["Brc"][1]}Total de {cor["Am"][0]}{total}{cor["Brc"][1]}.{cor["cls"]}')
        prints.lin('-', 40, cor['Az'][0])
        if (total % 2 == 0 and pieu == 'P') or (total % 2 == 1 and pieu == 'I'):
            print(f'{cor["Az"][1]}Parabéns! Você {cor["Vd"][1]}VENCEU!')
            v += 1
            prints.pensar(f'{cor["Brc"][1]}Vamos jogar novamente...{cor["cls"]}', 1)
        else:
            print(f'{cor["Az"][1]}HAHA! Você {cor["Vm"][1]}PERDEU!')
            dado.append(v)
            arquivos.arqEscreve('parouimpar.txt', dado)
            if v == 0:
                print(f'{cor["Brc"][1]}Não ganhou nenhuma haha. {cor["Vm"][1]}Eu sou o invencível!{cor["cls"]}')
            elif v == 1:
                print(f'{cor["Brc"][1]}Ganhou só uma. {cor["Am"][1]}Mais sorte na próxima patinho!{cor["cls"]}')
            elif v == 2:
                print(f'{cor["Brc"][1]}Ganhou duas. {cor["Az"][1]} Andou treinando né?!{cor["cls"]}')
            else:
                print(f'{cor["Brc"][1]}Ganhou {v}. {cor["Vd"][1]}Quanta sorte!!!{cor["cls"]}')
        prints.lin('-', 40, cor['Az'][0])
        prints.menu(['Jogar Novamente', 'Voltar', 'Sair'], cor['Am'][1], cor['Brc'][1])
        d = lerInt(f'{cor["Brc"][1]}Sua escolha >> {cor["cls"]}')
        if d == 2:
            dado.append(v)
            arquivos.arqEscreve('parouimpar.txt', dado)
            return
        elif d == 3:
            exit(0)
        else:
            continue


def menuParImpar():
    from time import sleep
    while True:
        prints.tit('MENU PAR OU ÍMPAR', 40, '=', cor['Cy'][1])
        prints.menu(['Jogar', 'Histórico', 'Voltar', 'Sair'], cor['Am'][1], cor['Az'][1])
        esc = lerInt(f'{cor["Am"][1]}Sua escolha >>{cor["cls"]} ', 4, 1)
        if esc == 1:
            exeParImpar(0)
        elif esc == 2:
            if not arquivos.arqExiste('parouimpar.txt'):
                arquivos.arqCria('parouimpar.txt')
            D = arquivos.arqLer('parouimpar.txt')
            prints.tit('HISTÓRICO', c=cor["Mg"][1])
            print(f'  {cor["Brc"][1]}{"Nome:":<20}  {cor["Az"][1]}{"Vitórias:":>14}  ')
            prints.lin('-', 40, cor['Mg'][0])
            for i in D:
                print(f'  {cor["Brc"][1]}{i[0]:<20}  {cor["Az"][1]}{i[1]:^17}')
            prints.lin('-', 40, cor['Mg'][0])
            limpar = lerStr(f'{cor["Am"][1]}>> Deseja limpar o arquivo? [S/N] ', 'SN', up=True, fat=0)
            if limpar == 'S':
                arquivos.arqLimpa('parouimpar.txt')
            else:
                continue
            sleep(3)
        elif esc == 3:
            break
        else:
            exit(1)
