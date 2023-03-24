"""
58) Melhore o jogo do exercício 28 onde o computador vai ''pensar'' em um número entre
0 e 10. Só que agora o jogador vai tentar adivinhar até até acertar, mostrando no final
quantos palpites foram necessários para vencer.
"""
from random import randint
from time import sleep

cores = {'limpa': '\033[m',
         'azul': '\033[1:34m',
         'vermelho': '\033[1:31m',
         'contraste': '\033[7:30m',
         'branco': '\033[1:30m'}

n = int(randint(0, 10))
print('{}---'.format(cores['azul']) * 20)
print('Vou pensar em um número entre 0 e 10. Tente adivinhar...'.center(60))
print('---' * 20, '{}'.format(cores['limpa']))
dig = -1
cont = 0
while dig != n:
    dig = int(input('Em que número eu pensei? '))
    print('PROCESSANDO...')
    sleep(1.5)
    cont += 1
    if dig < n:
        print('{}Errou! É mais...{}.'.format(cores['vermelho'], cores['limpa']))
    elif dig > n:
        print('{}Errou! É menos...{}.'.format(cores['vermelho'], cores['limpa']))
print('{}PARABÉNS!!! Você acertou o número em {} tentativas.'.format(cores['azul'], cont))
