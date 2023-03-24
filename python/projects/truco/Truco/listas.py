tipos = ['4', '5', '6', '7', 'Q', 'J', 'K', 'A', '2', '3']
nome_nipes = {'O': '♦', 'E': '♠', 'C': '♥', 'P': '♣'}
mao_state = ('Pedir Truco', 'Pedir Seis', 'Pedir Nove', 'Pedir Doze')
baralho = list()
eu = ['   ', '   ', '   ']
pc = ['   ', '   ', '   ']
jogo = [0, 0]
escolhas = []
mesa = []

for i in tipos:
    for j in nome_nipes.values():
        if j == '♦' or j == '♥':
            baralho.append(i + j + 'v')
        else:
            baralho.append(i + j + 'p')