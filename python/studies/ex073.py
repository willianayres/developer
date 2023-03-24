"""
73) Crie uma tupla preenchida com os 20 primeiros colocados da Tabela do Campeonato
Brasileiro de Futebol, na ordem de colocação. Depois mostre:
A) Apenas os 5 primeiros colocados;
B) Os últimos 4 colocados da tabela;
C) Uma lista com os times em ordem alfabética;
D) Em que posição na tabela está o time Chapecoense.
"""
times = ('Flamengo', 'Santos', 'Palmeiras', 'Grêmio', 'Athletico Paranaense',
         'São Paulo', 'Internacional', 'Corinthians', 'Fortaleza', 'Goiás', 'Bahia',
         'Vasco da Gama', 'Atlético', 'Fluminense', 'Botafogo', 'Ceará', 'Cruzeiro',
         'Csa', 'Chapecoense', 'Avaí')
print('=-=' * 95)
print(f'Lista de times do Brasileirão: {times}')
print('=-=' * 95)
print(f'Os 5 primeiros são {times[:5]}')
print('=-=' * 95)
print(f'Os 4 últimos são {times[16:]}')
print('=-=' * 95)
print(f'Times em ordem alfabética: {sorted(times)}')
print('=-=' * 95)
c = times.index('Chapecoense') + 1
print(f'O Chapecoense está na {c}ª posição.')
