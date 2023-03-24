import Truco.imprimir as imp
import Truco.listas as li
import Truco.carteado as cart
# from Truco.inputs import *
# from Truco.prints import *
from random import choice
from time import sleep
from os import system


stat = 0
rod = 1
vez = choice((True, False))
while li.jogo[0] < 12 and li.jogo[1] < 12:
    cart.embaralha(li.baralho)
    cart.da_cartas(li.eu, li.pc, li.baralho)
    imp.linha('―', 10)
    vira = li.baralho.pop()
    li.escolhas = ['Jogar carta 1', 'Jogar carta 2', 'Jogar carta 3', li.mao_state[stat]]
    print(vez)
    while True:
        imp.print_carta(vira)
        print(f'{"> Vira":^8}')
        sleep(0.5)
        imp.linha('―', 30)
        if not vez:
            pc = choice(li.pc)
            print(pc)
            for i in li.pc:
                if i == pc:
                    li.mesa.append(pc)
                    li.pc.remove(pc)
            print(li.pc)
            vez = True
            system('pause')
        pc = li.pc.pop()
        imp.print_mao(li.eu)
        imp.linha('―', 30)
