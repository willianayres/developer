"""
43) Desenvolva uma lógica que leia o peso e a altura de uma pessoa, calcule seu IMC e mostre
seu status, de acordo com a tabela abaixo:
-> Abaixo de 18.5: Abaixo do peso;
-> Entre 18.5 e 25: Peso ideal;
-> 25 até 30: Sobrepeso;
-> 30 até 40: Obesidade;
-> Acima de 40: Obesidade mórbida.
"""
print('*'*18)
print('CALCULADORA DE IMC')
print('*'*18)
h = float(input('Digite a altura da pessoa(em m): '))
p = float(input('Digite o peso da pessoa(em kg): '))
imc = p / (h*h)
print('O IMC da pessoa com {:.2f}m e {:.2f}kg é {:.1f}kg/m². Ela está '.format(h, p, imc), end='')
if imc < 18.5:
    print('ABAIXO DO PESO.')
elif 18.5 <= imc < 25:
    print('com PESO IDEAL.')
elif 25 <= imc < 30:
    print('com SOBREPESO.')
elif 30 <= imc < 40:
    print('com OBESIDADE.')
elif imc >= 40:
    print('com OBESIDADE MÓRBIDA.')
