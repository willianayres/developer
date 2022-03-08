def moeda(valor=0.0, din='R$'):
    return f'{din}{valor:>.2f}'.replace('.', ',')


def aumentar(preco=0, taxa=0, form=False):
    va = preco * (1 + taxa / 100)
    if form:
        va = moeda(va)
    return va


def diminuir(preco=0, taxa=0, form=False):
    vdi = preco * (1 - taxa / 100)
    if form:
        vdi = moeda(vdi)
    return vdi


def dobro(preco=0, form=False):
    vdb = 2 * preco
    if form:
        vdb = moeda(vdb)
    return vdb


def metade(preco=0, form=False):
    vm = preco / 2
    if form:
        vm = moeda(vm)
    return vm


def resumo(valor=0, T=0, t=0):
    print('=' * 30)
    print('RESUMO DO VALOR'.center(30))
    print('=' * 30)
    print(f'Preço analisado:    {moeda(valor):<13}')
    print(f'Dobro do preço:     {dobro(valor, True):<13}')
    print(f'Metade do preço:    {metade(valor, True):<13}')
    print(f'{T}% de aumento:     {aumentar(valor, t, True):<13}')
    print(f'{t}% de redução:     {diminuir(valor, t, True):<13}')
    print('=' * 30)
