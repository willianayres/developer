mi = [[[10, 10, 10, 0, 0, 0], [10, 10, 10, 0, 0, 0],
      [10, 10, 10, 0, 0, 0], [10, 10, 10, 0, 0, 0],
      [10, 10, 10, 0, 0, 0], [10, 10, 10, 0, 0, 0]],
      [[10, 10, 10, 0, 0, 0], [10, 10, 10, 0, 0, 0],
      [10, 10, 10, 0, 0, 0], [10, 10, 10, 0, 0, 0],
      [10, 10, 10, 0, 0, 0], [10, 10, 10, 0, 0, 0]],
      [[10, 10, 10, 0, 0, 0], [10, 10, 10, 0, 0, 0],
      [10, 10, 10, 0, 0, 0], [10, 10, 10, 0, 0, 0],
      [10, 10, 10, 0, 0, 0], [10, 10, 10, 0, 0, 0]]]

mf = [[[1, 0, -1], [1, 0, -1], [1, 0, -1]],
      [[2, 1, 0], [2, 1, 0], [2, 1, 0]],
      [[3, 2, 1], [3, 2, 1], [3, 2, 1]]]

print('--- Imprimindo a matriz imagem ---')
for k in range(0, 3):
    print(f'------------------\nrgb = {k + 1}\n------------------')
    for j in range(0, 6):
        for i in range(0, 6):
            print(f'{mi[k][j][i]} ', end="")
        print()

print('--- Imprimindo a matriz filtro ---')
for k in range(0, 3):
    print(f'---------\nrgb = {k + 1}\n---------')
    for j in range(0, 3):
        for i in range(0, 3):
            print(f'{mf[k][j][i]} ', end="")
        print()