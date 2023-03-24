"""
82) Crie um programa que leia vários números e coloque-os em uma lista. Depois disso,
crie duas listas extras que vão conter apenas os valores pares e os valores ímpares
digitados, respectivamente. Ao final, mostre o conteúdo das três listas geradas.
"""
num = list()
par = list()
impar = list()
while True:
    num.append(int(input('Digite um número: ')))
    d = ' '
    while d not in 'SN':
        d = str(input('Quer continuar? [S/N] ')).upper().strip()[0]
    if d == 'N':
        break
for a in num:
    if num[a] % 2 == 0:
        par.append(num[a])
    else:
        impar.append(num[a])
print('=-=' * 10)
print(f'A lista completa é {num}')
print(f'A lista de pares é {par}')
print(f'A lista de ímpares é {impar}')
