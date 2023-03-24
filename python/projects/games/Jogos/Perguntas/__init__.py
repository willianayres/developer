from Jogos import arquivos, prints
from Jogos.cores import cor
from Jogos.inputs import lerStr, lerInt
from copy import deepcopy


def menuPerguntas():
    while True:
        prints.tit('MENU JOGO DAS PERGUNTAS', 40, '=', cor['Cy'][1])
        prints.menu(['Jogar', 'Histórico', 'Voltar', 'Sair'], cor['Am'][1], cor['Az'][1])
        esc = lerInt(f'{cor["Am"][1]}>> Sua escolha: {cor["cls"]}', 4, 1)
        if esc == 1:
            exePerguntas()
        elif esc == 2:
            if not arquivos.arqExiste('pergunta.txt'):
                arquivos.arqCria('pergunta.txt')
            D = arquivos.arqLer('pergunta.txt')
            prints.tit('HISTÓRICO', c=cor["Mg"][1])
            print(f'  {cor["Brc"][1]}{"Nome:":<20}  {cor["Az"][1]}{"Acertos:":>14}  ')
            prints.lin('-', 40, cor['Mg'][0])
            for i in D:
                print(f'  {cor["Brc"][1]}{i[0]:<20}  {cor["Az"][1]}{i[1]:^17}')
            prints.lin('-', 40, cor['Mg'][0])
            limpar = lerStr(f'{cor["Am"][1]}>> Deseja limpar o arquivo? [S/N] ', 'SN', up=True, fat=0)
            if limpar == 'S':
                arquivos.arqLimpa('pergunta.txt')
                continue
        elif esc == 3:
            break
        else:
            exit(0)


def randomComp(args):
    from random import choice
    computador = list()
    while len(computador) < 10:
        numero = choice(args)
        if numero not in computador:
            computador.append(numero)
    return computador


def exePerguntas():
    perguntas = {'texto': '', 'certa': '',
                 'resp': [0, 0, 0, 0, 0]}
    respostas = ['a', 'b', 'c', 'd', 'e']
    if arquivos.arqExiste('perguntas.txt'):
        arqui = arquivos.arqLer('perguntas.txt')
    else:
        arqui = perguntas.copy()
    dados = list()
    while True:
        comp = randomComp(arqui)
        p = perguntas.copy()
        prints.tit('JOGO DAS PERGUNTAS', 40, '=', cor['Cy'][1])
        nome = lerStr(f'{cor["Am"][1]}>> Digite seu nome: {cor["cls"]}', fat=20)
        print()
        for n, i in enumerate(comp):
            p['texto'] = i[0]
            p['certa'] = i[1]
            p['resp'][0] = i[2]
            p['resp'][1] = i[3]
            p['resp'][2] = i[4]
            p['resp'][3] = i[5]
            p['resp'][4] = i[6]
            dados.append(deepcopy(p))
        certas = 0

        for i in range(0, len(dados)):
            print(f'{cor["Am"][1]}>> {cor["Az"][1]}Pergunta {i+1}: ', end='')
            print(f'{cor["Brc"][1]}{dados[i]["texto"]}')
            for j in range(0, 5):
                print(f'{cor["Az"][1]}    [ {respostas[j]} ]: {cor["Brc"][1]}{dados[i]["resp"][j]}')

            while True:
                esc = lerStr(f'{cor["Am"][1]}    >> Resp: ', 'ABCDE', up=True, fat=0)
                if esc != ' ':
                    break
            prints.lin('-', 40, cor['Cy'][1])
            if esc == dados[i]['certa']:
                certas += 1
        prints.menu(['Jogar Novamente', 'Voltar', 'Sair'], cor['Am'][1], cor['Brc'][1])
        des = lerInt(f'{cor["Brc"][1]}Sua escolha >> {cor["cls"]}')
        if des == 2:
            arquivos.arqEscreve('pergunta.txt', [nome, certas])
            return
        elif des == 3:
            exit(0)
        else:
            continue
