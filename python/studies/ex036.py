"""
36) Escreva um programa para aprovar o empréstimo bancário de para uma compra de uma casa.
O programa vai perguntar o valor da casa, o salário do comprador e em quantos anos ele
vai pagar. Calcule o valor da prestação mensal, sabendo que ela não pode exceder 30% do
salário ou então o empréstimo será negado.
"""
print('*'*19)
print('EMPRÉSTIMO BANCÁRIO')
print('*'*19)
v_casa = float(input('Qual é o valor da casa? R$'))
v_sala = float(input('Qual é o salário do comprador? R$'))
q_anos = int(input('Em quantos anos ele pretende pagar o empréstimo? '))
p_men = v_casa / (q_anos*12)
print('O valor da prestação mensal é de R${:.2f}'.format(p_men))
if p_men > 0.3*v_sala:
    print('EMPRÉSTIMO NEGADO! Salário insuficiente para o pagamento no tempo previsto.')
else:
    print('EMPRÉSTIMO LIBERADO! Você tem até {} anos para pagar a dívida de R${:.2f}'.format(q_anos, v_casa))
