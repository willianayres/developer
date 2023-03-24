"""
45) Crie um programa que faça o computador jogar Jokenpô com você.
"""
from random import randint
from time import sleep
import emoji

print('\033[1:34m*\033[m'*7)
print('\033[1:34mJOKENPÔ\033[m')
print('\033[1:34m*\033[m'*7)
print("""\033[4:34m Este é um simulador de jokenpô. para jogar, você escolhe umas das opções, e então
o computador confere se a opção escolhida por ele irá ganhar da sua. Simples e prático.
Divirta-se!!!\033[m""")
itens = ('Pedra ' + emoji.emojize(':fist:', use_aliases=True),
         'Papel ' + emoji.emojize(':hand:', use_aliases=True),
         'Tesoura ' + emoji.emojize(':v:', use_aliases=True))

print('''\033[30mEscolha entre:
[ 0 ]\033[m {}
\033[30m[ 1 ]\033[m {}
\033[30m[ 2 ]\033[m {}'''.format(itens[0], itens[1], itens[2]))
ej = int(input('\033[4:30mSua escolha:\033[m '))
ec = randint(0, 2)
if 0 <= ej <= 2:
    print('\033[30mJO\033[m')
    sleep(1)
    print('\033[30mKEN\033[m')
    sleep(1)
    print('\033[30mPÔ\033[m')
    print('\033[30m-='*15)
    print('\033[30mComputador: \033[34m{}\033[30m'.format(itens[ec]))
    print('\033[0:30mJogador:    \033[34m{}\033[m.'.format(itens[ej]))
    if (ej == 0 and ec == 0) or (ej == 1 and ec == 1) or (ej == 2 and ec == 2):
        print('\033[30mEMPATAMOS!!!\033[m')
    elif (ej == 0 and ec == 1) or (ej == 1 and ec == 2) or (ej == 2 and ec == 0):
        print('\033[30mVOCÊ PERDEU!!!\033[m')
    elif (ej == 0 and ec == 2) or (ej == 1 and ec == 0) or (ej == 2 and ec == 1):
        print('\033[30mVOCÊ GANHOU!!!\033[m')
    print('\033[30m-='*15)
else:
    print('Opção Inválida! Tente novamente.')
