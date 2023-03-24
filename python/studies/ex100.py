"""
100) Faça um programa que tenha uma lista chamada números e duas funções chamadas sorteia() e
somaPar(). A primeira função vai sortear 5 números e coloca-los dentro da lista e a segunda
função vai mostrar a soma entre todos os valores PARES sorteados pela função anterior.
"""


def sorteia(num):
    from random import randint
    from time import sleep
    print('Sorteando 5 valores da lista: ', end='')
    for i in range(0, 5):
        num.append(randint(0, 10))
        sleep(0.25)
        print(num[i], end=' ')
    print('PRONTO!')


def somaPar(num):
    soma = 0
    for i in num:
        if i % 2 == 0:
            soma += i
    print(f'Somando os valores pares de {num} temos {soma}')


numeros = list()
sorteia(numeros)
somaPar(numeros)
