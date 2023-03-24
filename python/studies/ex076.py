"""
76) Crie um programa que tenha uma tupla única com nome de produtos e seus respectivos
preços na sequência. No final, mostre uma listagem de preços, organizando os dados em
forma tabular.
"""
lista = ('Pão', 3.50, 'Abacaxi', 7.00, 'Morango', 5.00, 'Leite', 2.69, 'Maionese', 4.00,
         'Mostarda', 4.70, 'Laranja', 1.69, 'Melancia', 10.00, 'Nutella', 15.00,
         'Nescau', 12.00)
print('-' * 40)
print('LISTAGEM DE PREÇOS'.center(40))
print('-' * 40)
for c in range(0, len(lista)):
    if c % 2 == 0:
        print('{:.<32}'.format(lista[c]), end='')
    else:
        print('R$ {:>5.2f}'.format(lista[c]))
print('-' * 40)
