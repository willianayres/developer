#ifndef FILAIN_H_INCLUDED
#define FILAIN_H_INCLUDED


struct aviao{
    char ID[7];
    char destino[30];
    char empresa[10];
    char modelo[30];
    int n;
};

typedef struct fila Fila;

Fila* cria_Fila();

void libera_Fila(Fila* fi);

int tamanho_Fila(Fila* fi);

int Fila_cheia(Fila* fi);

int Fila_vazia(Fila* fi);

int insere_Fila(Fila* fi, struct aviao a);

void remove_Fila(Fila* fi);

int consulta_Fila(Fila* fi, struct aviao *a);

void listar_Fila(Fila* fi);


#endif // FILAIN_H_INCLUDED
