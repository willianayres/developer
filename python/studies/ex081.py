"""
81) Crie um programa que leia vários números e coloque-os em uma lista. Depois mostre:
A) Quantos números foram digitados;
B) A lista de valores ordenada de forma decrescente;
C) Se o valor 5 foi digitado e está ou não na lista.
"""
num = list()
while True:
    num.append(int(input('Digite um valor: ')))
    d = str(' ')
    while d not in 'SN':
        d = str(input('Quer continuar? [S/N] ')).upper().strip()[0]
    if d == 'N':
        break
print('=-=' * 10)
print(f'Você digitou {len(num)} elementos.')
print(f'Os valores em ordem decrescente são {sorted(num, reverse=True)}')
if 5 in num:
    print('O valor 5 faz parte da lista.')
else:
    print('O valor 5 não foi encontrado na lista.')
