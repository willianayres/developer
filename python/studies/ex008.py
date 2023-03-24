"""
8) Escreva um programa que leia um valor em metros e o exiba convertido em quilõmetros,
hectômetros, decâmetros, decímetros, centímetros e milímetros.
"""
xm = int(input('Digite um valor (em metros): '))
print("{} m é igual a {:.3f}  km.".format(xm, xm/1000))
print("{} m é igual a {:.2f}   hm.".format(xm, xm/100))
print("{} m é igual a {:.1f}  dam.".format(xm, xm/10))
print("{} m é igual a {}   dm.".format(xm, xm*10))
print("{} m é igual a {}  cm.".format(xm, (xm*100)))
print("{} m é igual a {} mm.".format(xm, (xm*1000)))
