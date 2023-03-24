"""
54) Crie um programa que leia o ano de nascimento de sete pessoas. No final, mostre quantas
pessoas ainda não atingiram a maioridade e quantas ja são maiores.
"""
from datetime import date
maior = 0
menor = 0
for c in range(0, 7):
    a = int(input('Qual o ano do nascimento da {}ª pessoa?'.format(c+1)))
    if (date.today().year - a) < 21:
        menor += 1
    else:
        maior += 1
print('A quantidade de pessoas maiores de idade é {}.'.format(maior))
print('A quantidade de pessoas menores de idade é {}.'.format(menor))
