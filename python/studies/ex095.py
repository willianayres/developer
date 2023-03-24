"""
95) Aprimore o exercício 93 para que ele funcione com vários jogadores, incluindo um sistema
de vizualização de detalhes do aproveitamento de cada jogador.
"""
jogadores = list()
jogador = dict()
while True:
    print('-' * 40)
    jogador.clear()
    jogador['Nome'] = str(input('Nome do jogador: ')).strip()[:21]
    jogador['Gols'] = list()
    qjog = int(input(f'Quantas partidas {jogador["Nome"]} jogou? '))
    for i in range(0, qjog):
        jogador['Gols'].append((int(input(f'    Quantos gols na partida {i+1}? '))))
    jogador['Total'] = sum(jogador['Gols'])
    jogadores.append(jogador.copy())
    while True:
        d = str(input('Quer continuar? [S/N] ')).upper().strip()[0]
        if d in 'SN':
            break
        else:
            print('ERRO! Por favor, digite S ou N.')
    if d == 'N':
        break
print('=-=' * 30)
print('Cód ', end='')
for i in jogador.keys():
    print(f'{i:<20}', end='')
print()
print('-' * 52)
for i, j in enumerate(jogadores):
    print(f'{i:>3} ', end='')
    for d in j.values():
        print(f'{str(d):<20}', end='')
    print()
print('-' * 52)
while True:
    busca = int(input('Mostrar dados de qual jogador? (999 para parar) '))
    if busca == 999:
        break
    if busca >= len(jogadores):
        print(f'ERRO! Não existe jogador com o código {busca}.')
    else:
        print(f' -- LEVANTAMENTO DO JOGADOR {jogadores[busca]["Nome"]}: ')
        for i, g in enumerate(jogadores[busca]["Gols"]):
            print(f'    No jogo {i+1} fez {g} gols.')
    print('-' * 52)
print('<< VOLTE SEMPRE! >>')
