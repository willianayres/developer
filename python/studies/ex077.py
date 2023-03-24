"""
77) Crie um programa que tenha uma tupla com várias palavras(não usar acentos). Depois
disso, você deve mostrar, para cada palavra, quais são suas vogais.
"""
palavras = ('macaco', 'sabao', 'celuçar', 'urso', 'almofada', 'parede', 'cabelo',
            'janela', 'mesa', 'arvore')
for c in range(0, len(palavras)):
    pal = palavras[c]
    print(f'\nNa palavra {pal.upper()} temos ', end='')
    for p in range(0, len(pal)):
        if pal[p] in 'aeiouAEIOU':
            print(pal[p], end=' ')
