"""
34) Escreva um programa que pergunte o salário de um funcionário e calcule o valor do seu
aumento.
-> Para salários superiores a R$1250,00, calcule um aumento de 10%.
-> Para salários inferiores ou iguais a R$1250, o aumento é de 15%.
"""
s = float(input('Qual é o salário do funcionário? R$'))
if s > 1250.00:
    print('O salário de R${:.2f} com o aumento de 10% será de R${:.2f}.'.format(s, 1.1*s))
else:
    print('O salário de R${:.2f} com o aumento de 15% será de R${:.2f}.'.format(s, 1.15*s))
