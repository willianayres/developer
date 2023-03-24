"""
55) Faça um programa que leia o peso de cinco pessoas. No final, mostre qual foi o maior
e o menor peso lidos.
"""
maior = 0
menor = 0
for c in range(0, 5):
    p = float(input('Digite o peso da {}ª pessoa em Kg: '.format(c+1)))
    if c == 0:
        maior = p
        menor = p
    else:
        if p > maior:
            maior = p
        if p < menor:
            menor = p
print('O maior peso lido foi {:.2f}Kg'.format(maior))
print('O menor peso lido foi {:.2f}Kg'.format(menor))
