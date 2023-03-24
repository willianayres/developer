"""
99) Faça um programa que tenha uma função chamada maior() , que receba vários parâmetros com
valores inteiros. Seu programa tem que analisar todos os valores e dizer qual deles é o maior.
"""


def maior(* num):
    from time import sleep
    print('-=' * 30)
    Mnum = 0
    for i in num:
        if i > Mnum:
            Mnum = i
    print('Analisando os valores passados...')
    for i in num:
        sleep(0.25)
        print(f'{i} ', end='')
    print(f'Foram informados {len(num)} valores ao todo.')
    print(f'O maior valor informado foi {Mnum}.')


maior(2, 9, 4, 5, 7, 1)
