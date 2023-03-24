mi = [[10, 10, 10, 0, 0, 0], [10, 10, 10, 0, 0, 0], [10, 10, 10, 0, 0, 0],
      [10, 10, 10, 0, 0, 0], [10, 10, 10, 0, 0, 0], [10, 10, 10, 0, 0, 0]]

mf = [[1, 0, -1], [1, 0, -1], [1, 0, -1]]

mr = [[0, 0, 0, 0], [0, 0, 0, 0], [0, 0, 0, 0], [0, 0, 0, 0]]
mr2 = [[0, 0, 0], [0, 0, 0], [0, 0, 0]]

strid = 1

'(n+2p-f)/s + 1'
'n = dimension of the matrix'
'p = padding'
'f = dimension of the filter'

for lin in range(0, len(mi)-len(mf)+1, strid):
    for col in range(0, len(mi)-len(mf)+1, strid):
        for i in range(0+lin, len(mf)+lin):
            for j in range(0+col, len(mf)+col):
                mr[0+lin][0+col] += mi[i][j] * mf[i-lin][j-col]

for i in range(0, len(mr)):
    for j in range(0, len(mr)):
        print(f'{mr[i][j]:^4} ', end="")
    print()
