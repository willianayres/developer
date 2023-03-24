"""
29) Escreva um programa que leia a velocidade de um carro. Se ele ultrapassar 80Km/h, mostre
uma mensagem dizendo que ele foi multado. A multa vai custar R$7,00 por cada Km acima do
limite.
"""
print('\033[30m-'*35)
v = float(input('Qual é a velocidade atual do carro? '))
print('-'*35)
if v > 80:
    print('\033[1:31mMULTADO! Você excedeu o limite que é de 80Km/h.')
    print('Você deve pagar uma multa de R${:.2f}.\033[m\n'.format(7*(v-80)))
else:
    print('\033[1:32mVocê estava abaixo do limite de velocidade.\n')
print('\033[1:33mTenha um bom dia! Diriga com segurança!\033[m')