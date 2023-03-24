"""
106) Faça um mini-sistema que utilize o Interactive Help do Python. O usuário vai digitar o comando
e o manual vai aparecer. Quando o usuário digitar a palavra 'FIM', o programa se encerrará.
OBS: use cores.
"""
from time import sleep


def titulo(frase, cor='\033[0m'):
    sleep(1)
    print(cor, end='')
    print('=' * (len(frase) + 4))
    print(f'  {frase}')
    print('=' * (len(frase) + 4))
    print('\033[0m', end='')


while True:
    titulo('SISTEMA DE AJUDA PyHELP', '\033[0:30:42m')
    d = str(input('Função ou Biblioteca > '))
    if d.upper() == 'FIM':
        titulo('ATÉ LOGO!', '\033[0:30:41m')
        break
    else:
        titulo(f"Acessando o manual do comando '{d}'", '\033[0:30:44m')
        print('\033[7:30m', end='')
        sleep(1)
        help(d)
        print(end='')
        sleep(1)
