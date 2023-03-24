"""
53) Crie um programa que leia uma frase qualquer e diga se ela é um palíndromo,
desconsiderando os espaços.
"""
fr = str(input('Digite uma frase: ')).strip().upper()
palavras = fr.split()
junto = ''.join(palavras)
inverso = ''
for letra in range(len(junto) - 1, -1, -1):
    inverso += junto[letra]
print('O inverso de {} é {}'.format(junto, inverso))
if junto == inverso:
    print('Temos um palíndromo!')
else:
    print('A frase digitada não é um palíndromo!')
