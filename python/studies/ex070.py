"""
70) Crie um programa que leia o nome e o preço de vários produtos. O programa deverá
perguntar se o usuário vai continuar. No final, mostre:
A) Qual é o total gasto na compra.
B) Quantos produtos custam mais de R$1000.
C) Qual é o nome do produto mais barato.
"""
print('=' * 40)
print('LOJA SUPER BARATÃO'.center(40))
print('=' * 40)
total = caros = barato = 0
barato_nome = ''
while True:
    nome = str(input('Nome do Produto: ')).strip()
    preco = float(input('R$'))
    total += preco
    if barato == 0 or preco < barato:
        barato = preco
        barato_nome = nome
    if preco > 1000:
        caros += 1
    c = ' '
    while c not in 'SN':
        c = str(input('Quer continuar? [S/N] ')).strip().upper()[0]
    if c == 'N':
        print(' FIM DO PROGRAMA '.center(40, '='))
        break
print(f'O total da compra foi de R${total}')
print(f'Temos {caros} produtos custando mais de R$1000.00')
print(f'O produto mais barato foi {barato_nome} que custa R${barato}')
