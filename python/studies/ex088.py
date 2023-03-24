"""
88) Faça um programa que ajude um jogador da MEGA SENA a criar palpites. O programa vai perguntar
quantos jogos serão gerados e vai sortear 6 números entre 1 e 60 para cada jogo, cadastrando tudo
em uma lista composta.
"""
from random import randint
from time import sleep
print('=' * 30)
print('JOGA NA MEGA SENA'.center(30))
print('=' * 30)
jogos = []
aux = []
n = int(input('Quantos jogos você quer que eu sorteie? '))
print(f' SORTEANDO {n} JOGOS '.center(30, '='))
for i in range(0, n):
    while True:
        num = randint(1, 60)
        if num not in aux:
            aux.append(num)
        if len(aux) == 6:
            break
    aux.sort()
    sleep(0.5)
    jogos.append(aux[:])
    print(f'Jogo {i + 1}: {jogos[i]}')
    aux.clear()
sleep(0.5)
print(' < BOA SORTE! > '.center(30, '='))
