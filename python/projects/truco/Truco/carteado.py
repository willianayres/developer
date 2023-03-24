def embaralha(cartas):
    from random import shuffle
    shuffle(cartas)
    return cartas


def da_cartas(e, p, b):
    from Truco.imprimir import linha, print_carta
    from time import sleep
    for i in range(0, 3):
        linha('―', 10)
        e[i] = b.pop()
        print_carta(e[i])
        print(f'{f"> Carta {i + 1}":^8}')
        p[i] = b.pop()
        sleep(0.5)
