"""
72) Crie um programa que tenha um tupla totalmente preenchida com uma contagem por
extenso, de zero até vinte. Seu programa deverá ler um número pelo teclado
(entre 0 e 20) e mostra-lo por extenso.
"""
cont = ('Zero', 'Um', 'Dois', 'Três', 'Quatro', 'Cinto', 'Seis', 'Sete', 'Oito', 'Nove',
        'Dez', 'Onze', 'Doze', 'Treze', 'Quatorze', 'Quinze', 'Dezesseis', 'Dezessete',
        'Dezoito', 'Dezenove', 'Vinte')
n = -1
while True:
    while n < 0 or n > 20:
        n = int(input('Digite um número entre 0 e 20: '))
        if n < 0 or n > 20:
            print('Tente novamente. ', end='')
    print(f'Você digitou o número {cont[n]}.')
    d = ' '
    while d not in 'SN':
        d = str(input('Deseja continuar? [S/N] ')).upper().strip()[0]
    if d == 'N':
        break
    else:
        n = -1
