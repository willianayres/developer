"""
63) Escreva um programa que leia um número n inteiro qualquer e mostre na tela os n primeiros
elementos de uma Sequência de Fibonacci.
"""
print('='*30)
print('Sequência de Fibonacci'.center(30))
print('='*30)
ok = False
n = 0
i_1 = 0
i_2 = 1
i_3 = i_1 + i_2
while not ok:
    n = int(input('Quantos termos você quer mostrar? '))
    if n < 0:
        print('Valor inválido.')
        n = int(input('Quantos termos você quer mostrar? '))
    else:
        ok = True
i = 3
print('{} -> {} -> '.format(i_1, i_2), end='')
while i <= n:
    print('{} -> '.format(i_3) if i <= n else print(''), end='')
    i_1 = i_2
    i_2 = i_3
    i_3 = i_1 + i_2
    i += 1
print('FIM')
