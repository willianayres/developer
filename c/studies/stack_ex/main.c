#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#define TAM 20


// Struct do tipo pilha.
struct pilha
{
    char c;
    struct pilha *prox;
};


// Definindo 'Pilha' como tipo de variável pilha.
typedef struct pilha Pilha;


// Declarando o topo da pilha.
Pilha *topo;


// Verifica se a pilha esta vazia.
int empty()
{
    if(topo == NULL)     // Se o topo apontar para nulo,
        return 1;        // a pilha esta vazia e retorna 1.
    else
        return 0;
}


// Empilha um valor na pilha.
void push(char c)
{
    Pilha *novo = (Pilha *)malloc(sizeof(Pilha));                   // Aloca o espaço para o novo valor na pilha.
    if(novo == NULL){
        printf("\nMemoria insuficiente. A pilha esta cheia!\n");    // Teste de memória.
    }
    novo->c = c;                                                    // Inseri o valor na pilha.
    novo->prox = topo;                                              // Atualiza o valor do topo.
    topo = novo;
}


// Desempilha um valor da pilha.
char pop()
{
    char n;                             // Retorna o valor que estava no topo, e atualiza o valor do topo.
    Pilha *aux;
    n = topo->c;
    aux = topo;
    topo = topo->prox;
    free(aux);
    return n;
}


// Retorna o valor do topo.
int top()
{
    return topo->c;
}


// Empilha a expressão na pilha.
void push_exp(char* exp)
{
    for(int i = 0; i < strlen(exp); i++){       // Empilha todos os valores da expressão passada como parâmetro.
        push(exp[i]);
    }
}


// Desempilha a expressão da pilha.
void pop_exp(char* exp)
{
    while(!empty()){            // Desempilha todos os valores da expressão passada como parâmetro.
        pop();
    }
}


// Verifica se a expressão é válida pelo critério 1.
int crit_1(char* exp)
{
    char aux;
    int n1 = 0, n2 = 0;
    while(!empty()){            // Desempilha e incrementa os valores auxiliares
        aux = pop();            // se forem iguais a ( ou )
        if(aux == '(')
            n1++;
        if(aux == ')')
            n2++;
    }
    push_exp(exp);
    if(n1 == n2)                // Se o número de ( for igual a ) retorna 0.
        return 0;
    else
        return 1;
}


// Verifica se a expressão é válida pelo critério 2.
int crit_2()
{
    char aux;
    int n1 = 0, n2 = 0;
    while(!empty()){                    // Desempilha e incrementa os valores auxiliares
        aux = pop();
        if(aux == ')' && n2 >= n1)
            n2++;
        if(aux == '(' && n1 <= n2)      // Se ( for desempilhado antes de um ) a função
            n1++;                       // retorna 1 por falha de critério.
        if( n1 > n2)
            break;
    }
    if( n1 > n2 )
        return 1;
    else
        return 0;
}


int main()
{
    char* exp;
    exp = (char *)calloc(TAM,sizeof(char));
    printf("Digite uma expressao: ");
    fgets(exp, TAM, stdin);

    push_exp(exp);


    if(crit_1(exp) == 0)
        printf("\nPassou no criterio 1.\n\n");
    else{
        printf("\nNao passou no criterio 1.\n\n");
        system("pause");
        exit(1);
    }

    if(crit_2() == 0)
        printf("Passou no criterio 2.\n\n");
    else{
        printf("Nao passou no criterio 2.\n\n");
    }


    pop_exp(exp);

    free(exp);

    system("pause");

    return 0;
}




