from Jogos.cores import cor
from Jogos import prints
from Jogos.inputs import lerInt, lerStr
from time import sleep


def exeJokenpo():
    from Jogos.arquivos import arqEscreve
    from random import randint
    import emoji

    prints.tit('JOKENPÔ', c='\033[1:34m')

    itens = ('Pedra ' + emoji.emojize(':fist:', use_aliases=True),
             'Papel ' + emoji.emojize(':hand:', use_aliases=True),
             'Tesoura ' + emoji.emojize(':v:', use_aliases=True))

    dado = [0, 0, 0]
    dado.insert(0, str(input(f'{cor["Brc"][0]}Digite seu nome: {cor["cls"]}')).strip()[:20])

    while True:
        print(f'{cor["Brc"][0]}Escolha entre:')
        prints.menu(itens, corv=cor['Az'][1])
        ej = lerInt(f'{cor["Brc"][2]}Sua escolha:{cor["cls"]} ', 3, 1) - 1
        ec = randint(0, 2)
        print(f'{cor["Brc"][0]}JO{cor["cls"]}')
        sleep(1)
        print(f'{cor["Brc"][0]}KEN{cor["cls"]}')
        sleep(1)
        print(f'{cor["Brc"][0]}PÔ{cor["cls"]}')
        prints.lin('-=', 15, cor['Az'][1])
        print(f'{cor["Brc"][0]}Computador: {cor["Az"][0]}{itens[ec]}{cor["cls"]}.')
        print(f'{cor["Brc"][0]}Jogador   : {cor["Az"][0]}{itens[ej]}{cor["cls"]}.')
        if (ej == 0 and ec == 0) or (ej == 1 and ec == 1) or (ej == 2 and ec == 2):
            print(f'{cor["Brc"][1]}EMPATAMOS!!!{cor["cls"]}')
            dado[3] += 1
        elif (ej == 0 and ec == 1) or (ej == 1 and ec == 2) or (ej == 2 and ec == 0):
            print(f'{cor["Vm"][1]}VOCÊ PERDEU!!!{cor["cls"]}')
            dado[2] += 1
        elif (ej == 0 and ec == 2) or (ej == 1 and ec == 0) or (ej == 2 and ec == 1):
            print(f'{cor["Vd"][1]}VOCÊ GANHOU!!!{cor["cls"]}')
            dado[1] += 1
        prints.lin('-=', 15, cor['Az'][1])
        sleep(2)
        prints.menu(['Jogar novamente.', 'Sair.'], cor["Az"][1], cor["Brc"][0])
        d = lerInt(f'{cor["Brc"][2]}Escolha:{cor["cls"]} ', 2, 1)
        if d == 2:
            break
    arqEscreve('jokenpo.txt', dado)
    sleep(2)


def menuJok():
    from Jogos.arquivos import arqExiste, arqCria, arqLer, arqLimpa
    while True:
        prints.tit('MENU JOKENPÔ', c=cor['Cy'][1])
        prints.menu(['Jogar', 'Histórico', 'Voltar', 'Sair'], cor['Am'][1], cor['Az'][0])
        esc = lerInt(f'{cor["Am"][1]}Sua escolha >>{cor["cls"]} ', 4, 1)
        if esc == 1:
            exeJokenpo()
        elif esc == 2:
            if not arqExiste('jokenpo.txt'):
                arqCria('jokenpo.txt')
            D = arqLer('jokenpo.txt')
            prints.tit('HISTÓRICO', c=cor["Mg"][1])
            print(f' {cor["Brc"][0]}{"Nome:":<20}  {cor["Vd"][0]}{"Vit:":^4}  ', end='')
            print(f'{cor["Vm"][0]}{"Drt:":^4}  {cor["Am"][0]}{"Emp:":^4}')
            prints.lin('-', 40, cor['Mg'][0])
            for i in D:
                print(f' {cor["Brc"][0]}{i[0]:<20}  {cor["Vd"][0]}{i[1]:^4}  ', end='')
                print(f'{cor["Vm"][0]}{i[2]:^4}  {cor["Am"][0]}{i[3]:^4}')
            prints.lin('-', 40, cor['Mg'][0])
            limpar = lerStr(f'{cor["Am"][1]}>> Deseja limpar o arquivo? [S/N] ', 'SN', up=True, fat=0)
            if limpar == 'S':
                arqLimpa('jokenpo.txt')
            else:
                continue
            sleep(3)
        elif esc == 3:
            break
        else:
            exit(0)
