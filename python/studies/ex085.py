"""
85) Crie um programa onde o usuário possa digitar 7 valores numéricos e cadastre-os em
uma lista única que mantenha separados os valores pares e ímpares. No final, mostre os
valores pares e ímpares 
"""
num = [[], []]
for i in range(1, 8):
    n = int(input(f'Digite o {i}º valor: '))
    if n % 2 == 0:
        num[0].append(n)
    else:
        num[1].append(n)
num[0].sort()
num[1].sort()
print('=-=' * 10)
print(f'Os valores pares digitados foram: {num[0]}')
print(f'os valores ímpares digitados foram: {num[1]}')
