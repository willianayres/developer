"""
59) Crie um programa que leia dois valores e mostre um menu na tela:
[1] Somar;
[2] Multiplicar;
[3] Maior;
[4] Novos números;
[5] Sair do programa;
"""
from time import sleep
n1 = float(input('1º número: '))
n2 = float(input('2º número: '))
maior = n1
if n2 > n1:
    maior = n2
c = 1
sleep(2)
while c != 5:
    sleep(2)
    print('=-='*20)
    print('[1] Somar\n[2] Multiplicar\n[3] Maior\n[4] Novos números\n[5] Sair do programa')
    c = int(input('Sua escolha: '))
    if c == 1:
        print('A soma de {} + {} é {}'.format(n1, n2, n1 + n2))
    elif c == 2:
        print('A multiplicação de {} por {} é {}'.format(n1, n2, n1 * n2))
    elif c == 3:
        print('O maior número entre {} e {} é {}'.format(n1, n2, maior))
    elif c == 4:
        n1 = float(input('1º número: '))
        n2 = float(input('2º número: '))
    elif c == 5:
        print('Saindo do programa.')
        c = 5
    else:
        print('Opção inválida.')
