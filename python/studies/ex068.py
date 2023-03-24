"""
68) Faça um programa que jogue PAR ou ÍMPAR com o computador. O jogo só será interrompido
quando o jogador PERDER, mostrando o total de vitórias consecutivas que ele conquistou
no final do jogo.
"""
from random import randint
print('=-='*10)
print('VAMOS JOGAR PAR OU ÍMPAR'.center(30))
print('=-='*10)
v = 0
while True:
    jogador = int(input('Diga um valor: '))
    pij = ' '
    while pij not in 'PI':
        pij = str(input('Par ou Ímpar? [P/I] ')).strip().upper()[0]
    comp = randint(0, 10)
    total = jogador + comp
    print('-'*30)
    print(f'Você jogou {jogador} e o computador jogou {comp}. Total de {total} ', end='')
    print('DEU PAR' if total % 2 == 0 else 'DEU ÍMPAR')
    if total % 2 == 0:
        print('-' * 30)
        if pij == 'P':
            print('Você VENCEU!')
            v += 1
            print('Vamos jogar novamente...')
        else:
            print('Você PERDEU!')
            break
    else:
        print('-' * 30)
        if pij == 'I':
            print('Você VENCEU!')
            v += 1
            print('Vamos jogar novamente...')
        else:
            print('Você PERDEU!')
            break
print('=-='*10)
print(f'GAME OVER! Você venceu {v} vezes')
