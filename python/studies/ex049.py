"""
49) Refaça o exercício 9, mostrando a tabuada de um número que o usuário escolher, só que
agora utilizando um laço for.
"""
print('='*20)
print('TABUADA'.center(20, '-'))
print('='*20)
n = int(input('Digite um número: '))
for c in range(0, 11):
    print('| {:<2} x {:2} = {:3} |'.format(n, c, n*c))
