"""
98) Faça um programa que tenha uma função chamada contador(), que receba três parâmetros:
início, fim e passo e realize a contagem. Seu programa tem que realizar três contagens
através da função criada:
A) de 1 até 10, de 1 em 1;
B) de 10 até 0, de 2 em 2;
C) Uma contagem personalizada;
"""


def contador(inicio, final, passo):
    from time import sleep
    print('-=' * 20)
    print(f'Contagem de {inicio} até {final} de {passo} em {passo}:')
    if (inicio < final and passo < 0) or (final < inicio and passo > 0):
        passo *= -1
    if passo == 0:
        if inicio > final:
            passo = -1
        else:
            passo = 1
    if passo < 0:
        while inicio >= final:
            sleep(0.25)
            print(f'{inicio} ', end='')
            inicio += passo
    elif passo > 0:
        while inicio <= final:
            sleep(0.25)
            print(f'{inicio} ', end='')
            inicio += passo
    print('FIM!')


contador(1, 10, 1)
contador(10, 0, -2)
print('Agora é a sua vez de personalizar a contagem!')
ini = int(input('Início: '))
fim = int(input('Fim:    '))
pas = int(input('Passo:  '))
contador(ini, fim, pas)
