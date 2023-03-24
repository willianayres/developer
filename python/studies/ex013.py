"""
13) Faça um algoritimo que leia o salário de um funcionário e mostre seu novo salário, com 15%
de aumento.
"""
sal = float(input('Digite o salário do funcionário: R$'))
print('O funcionário que ganhava {:.2f}, com 15% de aumento, passa a ganhar R${:.2f}.'.format(sal, sal*1.15))
