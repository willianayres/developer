"""
44) Elabore um programa que calcule o valor a ser pago por um produto, considerando o seu
preço normal e condição de pagamamento:
-> À vista dinheiro/cheque: 10% de desconto;
-> À vista no cartão: 5% de desconto;
-> Em até 2x no cartão: preço normal;
->3x ou mais no cartão: 20% de juros.
"""
print('*'*9)
print('PAGAMENTO')
print('*'*9)
p = float(input('Digite o preço do produto: R$'))
print('Escolha a forma de pagamento:\n(1) Dinheiro/Cheque à vista\n(2) Cartão à vista')
print('(3) Cartão em 2x\n(4) Cartão em 3x ou mais')
f = int(input())
if f == 1:
    forma = str('Dinheiro/Cheque à vista')
    pf = float(0.9 * p)
elif f == 2:
    forma = str('Cartão à vista')
    pf = float(0.95 * p)
elif f == 3:
    forma = str('Cartão em 2x')
    pf = float(p)
elif f == 4:
    forma = str('Cartão em 3x ou mais')
    pf = float(1.2 * p)
else:
    forma = str('-1')
    pf = -1
    print('Forma de pagamento inválida!')
if 0 < f < 5:
    print('O produto que custa R${:.2f}, passará a custar R${:.2f} pagando no {}.'.format(p, pf, forma))
