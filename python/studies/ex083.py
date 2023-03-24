"""
83) Crie um programa onde um usuário digite uma expressão qualquer que use parênteses.
Seu aplicativo deverá analisar se a expressão passada está com os parênteses abertos
e fechados na ordem correta.
"""
e = str(input('Digite a expressão: '))
ep = list(e)
pe = pd = 0
for i in range(0, len(ep)):
    if ep[i] == '(':
        pe += 1
    if ep[i] == ')':
        pd += 1
    if pd > pe:
        break
if pd != pe:
    print('Sua expressão está errada!')
else:
    print('Sua expressão está correta!')
