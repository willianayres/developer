"""
84) Faça um programa que leia nome e peso de várias pessoas, guardando tudo em uma
lista. No final, mostre:
A) Quantas pessoas foram cadastradas;
B) Uma listagem com as pessoas mais pesadas;
C) Uma listagem com as pessoas mais leves.
"""
dados = list()
pessoas = list()
maior = menor = 0
while True:
    dados.append(str(input('Nome: ')).strip())
    dados.append(float(input('Peso: ')))
    if len(pessoas) == 0:
        maior = menor = dados[1]
    else:
        if dados[1] > maior:
            maior = dados[1]
        if dados[1] < menor:
            menor = dados[1]
    pessoas.append(dados[:])
    dados.clear()
    d = ' '
    while d not in 'NS':
        d = str(input('Quer continuar? [S/N] ')).upper().strip()[0]
    if d == 'N':
        break
print('=-=' * 10)
print(f'Ao todo, você cadastrou {len(pessoas)} pessoas.')
print(f'O maior peso foi {maior:.2f}Kg. Peso de ', end='')
for i in pessoas:
    if i[1] == maior:
        print(f'[{i[0]}] ', end='')
print(f'\nO menor peso foi {menor:.2f}Kg. Peso de ', end='')
for i in pessoas:
    if i[1] == menor:
        print(f'[{i[0]}] ', end='')
