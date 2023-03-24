"""
103) Faça um programa que tenha uma função chamada ficha(), que receba dois parâmetros opcionais:
o nome de um jogador e quantos gols ele marcou. O programa deverá se capaz de mostrar a ficha do
jogador, mesmo que algum dado não tenha sido informado corretamente.
"""


def ficha(nome='', gols=''):
    if gols.isnumeric():
        gols = int(gols)
    else:
        gols = 0
    if nome == '':
        nome = '<desconhecido>'
    print(f'O jogador {nome} fez {gols} gol(s) no campeonato.')


print('-' * 30)
name = str(input('Nome do Jogador: ')).strip()
ngol = str(input('Número de Gols:  ')).strip()
ficha(name, ngol)
