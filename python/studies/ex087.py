"""
87) Aprimore o desafio do exercício 86 , mostrando no final:
A) A soma de todos os valores pares digitados;
B) A soma dos valores da terceira coluna;
C) O maior valor da segunda linha.
"""
matriz = [[0, 0, 0], [0, 0, 0], [0, 0, 0]]
soma = somat3 = ml2 = 0
for i in range(0, 3):
    for j in range(0, 3):
        matriz[i][j] = int(input(f'Digite um valor para [{i}, {j}]: '))
        if matriz[i][j] % 2 == 0:
            soma += matriz[i][j]
        if matriz[i][2]:
            somat3 += matriz[i][2]
        if ml2 == 0:
            ml2 = matriz[1][0]
        else:
            if matriz[1][j] > ml2:
                ml2 = matriz[1][j]
print('=-=' * 10)
for i in range(0, 3):
    for j in range(0, 3):
        print(f'[{matriz[i][j]:^5}]', end='')
    print()
print('=-=' * 10)
print(f'A soma dos valores pares é {soma}.')
print(f'A soma dos valores da terceira coluna é {somat3}.')
print(f'O maior valor da segunda linha é {ml2}.')
