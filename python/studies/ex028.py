"""
28) Escreva um programa que faça o computador "pensar" em um número inteiro entre 0 e 5 e peça
para o usuário tentar descobrir qual foi o número escolhido pelo computador. O programa deverá
escrever na tela se o usuário venceu ou perdeu.
"""
from random import randint
from time import sleep

cores = {'limpa': '\033[m',
         'azul': '\033[1:34m',
         'vermelho': '\033[1:31m',
         'contraste': '\033[7:30m',
         'branco': '\033[1:30m'}

n = int(randint(0, 5))
print('{}-=-'.format(cores['azul']) * 20)
print('Vou pensar em um número entre 0 e 5. Tente adivinhar...')
print('-=-' * 20, '{}'.format(cores['limpa']))
dig = int(input('Em que número eu pensei? '))
print('PROCESSANDO...')
sleep(3)
if dig == n:
    print('{}PARABÉNS! Você venceu.{}'.format(cores['azul'], cores['limpa']))
else:
    print('{}GANHEI! Eu pensei no número {} e não no número {}.'.format(cores['vermelho'], n, dig))
