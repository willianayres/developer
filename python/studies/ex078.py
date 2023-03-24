"""
78) Faça um programa que leia 5 valores numéricos e guarde-os em uma lista. No final,
mostre qual foi o maior e o menor valor digitado e as suas respectivas posições na lista.
"""
numeros = list()
for v in range(0, 5):
    numeros.append(int(input(f'Digite um valor para a posição {v}: ')))
print('=-='*10)
print(f'Você digitou os valores {numeros}')
print(f'O maior valor digitado foi {max(numeros)} nas posições ', end='')
for n, v in enumerate(numeros):
    if numeros[n] == max(numeros):
        print(f'{n}... ', end='')
print(f'\nO menor valor digitado foi {min(numeros)} nas posições ', end='')
for n, v in enumerate(numeros):
    if numeros[n] == min(numeros):
        print(f'{n}... ', end='')
