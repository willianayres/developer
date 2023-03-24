"""
102) Crie um programa que tenha uma função chamada fatorial() que receba dois parâmetros: o primeiro
que indique o número a calcular e o outro chamado show, que será um valor lógico(opcional) indicando
se será mostrada ou não na tela o processo de cálculo do fatorial.
"""


def fatorial(num=1, show=False):
    """
    -> Calcula o Fatorial de um número.
    :param num: O número a ser calculado.
    :param show: (opcional) Mostrar ou não a conta.
    :return: O valor do Fatorial de um número n.
    """
    f = 1
    for i in range(num, 1, -1):
        if show:
            print(f'{i} x ', end='')
        f *= i
    if show:
        print('1 = ', end='')
    return f


n = int(input('Digite um número: '))
print(fatorial(n, True))
help(fatorial)
