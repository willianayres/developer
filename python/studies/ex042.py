"""
42) Refaça o exercício 35 dos triângulos, acrescentando o recurso de mostrar que tipo de
triângulo será formado:
-> Equilátero: todos os lados iguais;
-> Isósceles: dois lados iguais;
-> Escaleno: todos os lados diferentes.
"""
print('*'*24)
print('ANALISADOR DE TRIÂNGULOS')
print('*'*24)
r1 = float(input('Segmento de reta 1: '))
r2 = float(input('Segmento de reta 2: '))
r3 = float(input('Segmento de reta 3: '))
if r1 < (r2 + r3) and r2 < (r1 + r3) and r3 < (r1 + r2):
    print('Os segmentos PODEM FORMAR triângulo ', end='')
    if r1 == r2 == r3:
        print('EQUILÁTERO.')
    elif r1 == r2 or r1 == r3 or r2 == r3:
        print('ISÓSCELES.')
    elif r1 != r2 != r3 != r1:
        print('ESCALENO.')
else:
    print('Os segmentos NÃO PODEM FORMAR triângulo.')
