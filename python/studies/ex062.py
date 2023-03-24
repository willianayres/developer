"""
62) Melhore o desafio 61, perguntando para o usuário se ele quer mostrar mais alguns termos.
O programa encerra quando ele disser que quer mostrar 0 termos.
"""
print('='*21)
print('GERADOR DE PA'.center(21))
print('='*21)
a0 = int(input('Digite o primeiro termo da PA: '))
q = int(input('Digite a razão da PA: '))
i = 0
soma = 10
print('{ ', end='')
while i < 10:
    print(a0 + i * q, end=' ')
    print('-> ' if i < 9 else '-> PAUSA }', end='')
    i += 1
n = int(input('\nQuantos termos você quer mostar mais? '))
print('{ ', end='')
i = 0
while n != 0:
    while i < n:
        print((a0 + 10 * q) + i * q, end='')
        print('-> ' if i < n-1 else '-> FIM }', end='')
        i += 1
        soma += 1
    n = int(input('\nQuantos termos você quer mostar mais? '))
    i = 0
print('Progressão finalizada com {} termos mostrados.'.format(soma))
print('Fim do programa.')
