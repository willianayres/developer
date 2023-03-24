"""
93) Crie um programa que gerencie o aproveitamento de um jogador de futebol. O programa vai ler
o nome do jogador e quantas partidades ele jogou. Depois vai ler a quantidade de gols feitos em
cada partida. No final, tudo isso será guardado em um dicionário, incluindo o total de gols
feitos durante o campeonato.
"""
jogador = dict()
jogador['Nome'] = str(input('Nome do jogador: ')).strip()
jogador['Gols'] = list()
qjog = int(input(f'Quantas partidas {jogador["Nome"]} jogou? '))
for i in range(0, qjog):
    jogador['Gols'].append((int(input(f'Quantos gols na partida {i+1}? '))))
jogador['Total de gols'] = sum(jogador['Gols'])
print('=-=' * 25)
print(jogador)
print('=-=' * 25)
for k, v in jogador.items():
    print(f'O campo {k} tem {v}.')
print('=-=' * 25)
print(f'O jogador {jogador["Nome"]} jogou {qjog} partidas.')
for i, v in enumerate(jogador['Gols']):
    print(f'    => Na partida {i+1}, fez {v} gols.')
print(f'Foi um total de {jogador["Total de gols"]} gols.')
