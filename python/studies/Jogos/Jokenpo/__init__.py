def exeJokenpo():
    from Jogos.cores import cor
    from Jogos.prints import tit, menu, lin
    from Jogos.inputs import lerInt
    from random import randint
    from time import sleep
    import emoji

    tit('JOKENPÔ', c='\033[1:34m')

    itens = ('Pedra ' + emoji.emojize(':fist:', use_aliases=True),
             'Papel ' + emoji.emojize(':hand:', use_aliases=True),
             'Tesoura ' + emoji.emojize(':v:', use_aliases=True))

    dado = [0, 0, 0]
    dado.insert(0, str(input(f'{cor["Brc"][0]}Digite seu nome: {cor["cls"]}')).strip()[:20])

    while True:
        print(f'{cor["Brc"][0]}Escolha entre:')
        menu(itens, corv=cor['Az'][1])
        ej = lerInt(f'{cor["Brc"][2]}Sua escolha:{cor["cls"]} ', 3, 1) - 1
        ec = randint(0, 2)
        print(f'{cor["Brc"][0]}JO{cor["cls"]}')
        sleep(1)
        print(f'{cor["Brc"][0]}KEN{cor["cls"]}')
        sleep(1)
        print(f'{cor["Brc"][0]}PÔ{cor["cls"]}')
        lin('-=', 15, cor['Az'][1])
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
        lin('-=', 15, cor['Az'][1])
        sleep(2)
        menu(['Jogar novamente.', 'Sair.'], cor["Az"][1], cor["Brc"][0])
        d = lerInt(f'{cor["Brc"][2]}Escolha:{cor["cls"]} ', 2, 1)
        if d == 2:
            break


def menuJok():
    from Jogos.prints import menu, tit
    from Jogos.cores import cor
    from Jogos.inputs import lerInt
    tit('JOKENPÔ', c='\033[1:34m')
    menu(['Jogar', 'Histórico', 'Voltar', 'Sair'], cor['Am'][1], cor['Az'][0])
    esc = lerInt(f'{cor["Brc"][2]}Sua escolha:{cor["cls"]} ', 4, 1)
    if esc == 1:
        exeJokenpo()
    elif esc == 2:
        print()
    elif esc == 3:
        return
    else:
        exit(0)
