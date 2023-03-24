def aumentar(preco=0, taxa=0):
    v = preco * (1 + taxa / 100)
    return v


def diminuir(preco=0, taxa=0):
    v = preco * (1 - taxa / 100)
    return v


def dobro(preco=0):
    v = 2 * preco
    return v


def metade(preco=0):
    v = preco / 2
    return v


def moeda(valor=0, din='R$'):
    return f'{din}{valor:>.2f}'.replace('.', ',')


