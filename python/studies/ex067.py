"""
67) Faça um programa que mostre a tabuada de vários números, um de cada vez, para cada
valor digitado pelo usuário. O programa será interrompido quando o número digitado for
negativo.
"""
print('=-='*10)
print('TABUADA'.center(30, '-'))
print('=-='*10)
while True:
    n = int(input('Quer ver a tabuada de qual valor? '))
    if n < 0:
        break
    print('='*30)
    for i in range(1, 11):
        print(f'{n:^2} x {i:^2} = {i*n:^2}')
    print('='*30)
print('PROGRAMA TABUADA ENCERRADO. Volte sempre!')
