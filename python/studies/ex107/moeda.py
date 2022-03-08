def aumentar(preco, taxa, form=False):
    v = preco * (1 + taxa / 100)
    return v


def diminuir(preco, taxa, form=False):
    v = preco * (1 - taxa / 100)
    return v


def dobro(preco, form=False):
    v = 2 * preco
    return v


def metade(preco, form=False):
    v = preco / 2
    return v
