"""
6) Crie um algoritimo que leia um número e mostre seu dobro, seu triplo e a raiz quadrada dele.
"""
n = int(input('Digite um número: '))
print('O dobro de {} é {}.'.format(n, 2*n))
print('O triplo de {} é {}.'.format(n, 3*n))
print('A raiz quadrada de {} é {:.2f}.'.format(n, n**(1/2)))
