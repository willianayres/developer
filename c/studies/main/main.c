#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <math.h>
#include <windows.h>
#include <time.h>
#include <conio.h>

    /*int main(){
    // AMOR DA MINHA VIDA
    char nome[20];
    char amor[20]="Anna Carolina";
    printf("Digite seu nome e veja se vc eh o amor da vida do Willian: \n");
    setbuf(stdin,NULL);
    gets(nome);
    if (strcmp(nome,amor) == 0){
    printf("\nAnna Carolina, voce eh o amor da vida dele!\n");
    }else
        printf("\nNao eh o amor da vida dele.\n");
      system("pause");
      return 0;}*/

    //TESTE CONDICIONAL
    /*int main(){
    int x, y;
    printf("Digite dois numeros: ");
    scanf("%d %d ",&x,&y);
    if (x>y){
        printf("O prieiro eh maior\n");
    }else{
    printf("O segundo eh maior\n");
    }
    return 0;
    }*/

    //TESTE LOGICO
    /*int main(){
    int r, x=5, y=3;
    r = (x>2) || (y>x);
    printf("Resultado = %d\n",r);
    r = (x%2 == 0) || (y>0);
    printf("Resultado = %d\n",r);
    system("pause");
    return 0;
    }*/

    //PAR OU IMPAR
    /*int main(){
    int x;
    printf("Digite um numero inteiro: \n");
    scanf("%d",&x);
    if (x%2==0){
        printf("O numero eh par. \n");
    }else{
    printf("O numero eh impar. \n");
    }
    system("pause");
    return 0;
    }*/

    //NUMERO MAIOR/MENOR/IGUAL A ZERO
    /*int main(){
    int num;
    printf("Digite um numero: \n");
    scanf("%d",&num);
    if (num>=0){
        if (num==0){
            printf("O numero eh igual a zero.\n");
        }else{
        printf("O numero eh maior que zero.\n");
        }
    }else{
    printf("O numero eh menor que zero.\n");
    }
    system("pause");
    return 0;
    }*/

    //OPERADOR TERNÁRIO

    /*int main(){
    int x, y, z;
    printf("Digite um valor para x: \n");
    scanf("%d",&x);
    printf("Digite um valor para y: \n");
    scanf("%d",&y);
    z= x>y ? x:y;
    printf("O maior valor eh: %d\n",z);
    system("pause");
    return 0;
    }*/

    //BRINCADEIRA ( ͡° ͜ʖ ͡°)
    /*int main(){
    int num;
    printf("Escolha o que podemos fazer com um numero entre 1 e 10: \n");
    scanf("%d",&num);
    switch (num){
    case 1 : printf("Vamos dormir. \n"); break;
    case 2 : printf("Vamos assistir. \n"); break;
    case 3 : printf("Vamos comer. \n"); break;
    case 4 : printf("Bola Gato. \n"); break;
    case 5 : printf("Vamos tomar um sorvete. \n"); break;
    case 6 : printf("Eu te chupo gostoso. \n"); break;
    case 7 : printf("Transar Violento. \n"); break;
    case 8 : printf("Vamos conversar. \n"); break;
    case 9 : printf("Vamos beijar lento e com selinho no final. \n"); break;
    case 10: printf("Vamos jogar alguma coisa. \n"); break;
    default: printf("Tente outro numero. \n");
    }
    system("pause");
    return 0;
    }*/

    //WHILE
    /*int main(){
    int a, b;
    printf("Digite dois valores inteiros: \n");
    scanf("%d %d",&a,&b);
    while(a<b){
        a++;
        printf("%d\n",a-1);
    }
    system("pause");
    return 0;
    }*/

    //MATRIZ IDENTIDADE
    /*int main(){
    int i, j;
    for(i=1;i<5;i++){
     for(j=1;j<5;j++){
        if(i==j){
            printf ("1 ");
        }else{
        printf("0 ");
        }
     }
     printf("\n");
    }
     system("pause");
     return 0;
     }*/

    //GOTO

    /*int main(){
     int i, j, k;
     for(i=0;i<5;i++)
        for(j=0;j<5;j++)
            for(k=0;k<5;k++)
                if(i==2 && j==3 && k==1)
                    goto fim;
            else
                printf("Pos[%d,%d,%d]\n",i,j,k);
        fim:
        printf("Fim do Programa. \n");
        system("pause");
        return 0;
        }*/


    //ARRAY

    /*int main(){
    float notas[5], media=0.0;
    int i;
    for(i=0;i<5;i++){
        printf("Digite a nota do  aluno %d: ",i+1);
        scanf("%f",&notas[i]);
        media = media + notas[i];
    }
    media = media/5.0;
    for(i=0;i<5;i++){
        if(notas[i]>media)
            printf("Aluno %d: %f\n",i+1,notas[i]);
    }
    system("pause");
    return 0;
    }*/

    //ARRAY DE MATRIZ

    /*int main(){
    int mat[2][2];
    int i, j;
    printf("Digite os valores da sua matriz: \n");
    for(i=0;i<2;i++){
        for(j=0;j<2;j++){
            scanf("%d",&mat[i][j]);
        }
    }
    for(i=0;i<2;i++){
        for(j=0;j<2;j++){
            printf("%d ",mat[i][j]);
        }
    }
    printf("\n");
    system("pause");
    return 0;
    }*/

    //ARRAY GENERICO

    /*int main(){
    int n, i;
    printf("Defina o tamanho do vetor: \n");
    scanf("%d",&n);
    int vet[n];
    for(i=0;i<n;i++){
        scanf("%d",&vet[i]);
    }
    for(i=0;i<n;i++){
        printf("%d ",vet[i]);
    }
    system("pause");
    return 0;
    }*/

    //MAIOR VALOR

    /*int main(){
    int n, i;
    printf("Defina o tamanho do vetor: \n");
    scanf("%d",&n);
    int vet[n];
    for(i=0;i<n;i++){
        scanf("%d",&vet[i]);
    }
    int Maior = vet[0];
    for(i=0;i<n;i++){
        if(Maior<vet[i])
        Maior = vet[i];
    }
    printf("Maior valor eh: %d\n",Maior);
    system("pause");
    return 0;
    }*/

    //TESTE STRLEN
    /*int main(){
    char nome[10]="eita";
    int tam;
    tam = strlen(nome);
    printf("%d",tam);
    return 0;
    }*/

    //INVERTENDO STRING

    /*int main(){
    char teste[20]="Subi no onibus";
    int i;
    for(i=strlen(teste)-1; i>=0; i--){
        printf("%c",teste[i]);
    }
    printf("\n");
    system("pause");
    return 0;
    }*/

    //INVERTENDO STRING

    /*int main(){
    char nome[20]="Testando";
    int i, tam=strlen(nome);
    char c;
    for(i=0;i<tam/2;i++){
        c=nome[i];
        nome[i]=nome[tam-1-i];
        nome[tam-1-i]=c;
    }
    printf("%s\n",nome);
    system("pause");
    return 0;
    }*/

    //PROCURANDO VOGAIS

    /*int main(){
    char str[20]="Testando";
    char vogais[11]="aeiouAEIOU";
    int i, j, total=0;
    int tam1=strlen(str);
    int tam2=strlen(vogais);
    for(i=0;i<tam1;i++){
        for(j=0;j<tam2;j++){
            if(str[i]==vogais[j]){
                total++;
                break;
            }
        }
    }
    printf("%d\n",total);
    system("pause");
    return 0;
    }*/


    //STRUCT

    /*struct pessoa{
    char nome[50];
    char rua[50];
    int idade;
    int numero;
    };

    int main(){
    struct pessoa p;
    p.idade=17;
    scanf("%d\n",&p.numero);
    gets(p.nome);
    p.numero=p.numero+p.idade-100;
    return 0;

    }*/

    //ARRAY DE STRUCT

    /*struct pessoa{
    char nome[50];
    char rua[50];
    int idade;
    int numero;
    };

    int main(){
    struct pessoa p[2];
    strcpy(p[0].nome,"Willian");
    p[0].idade=20;
    printf("%s tem %d anos\n",p[0].nome,p[0].idade);
    system("pause");
    return 0;

    }*/

    //CONTINUANDO ARRAY STRUCT

    /*struct endereco{
    char rua[50];
    int numero;
    };

    struct pessoa{
    char nome[50];
    int idade;
    struct endereco ender;
    };

    int main(){
    struct pessoa p[2];
    int i;
    for(i=0;i<2;i++){
        setbuf(stdin,NULL);
        fgets(p[i].nome,50,stdin);
        scanf("%d",&p[i].idade);
        setbuf(stdin,NULL);
        fgets(p[i].ender.rua,50,stdin);
        scanf("%d",&p[i].ender.numero);
    }
    system("pause");
    return 0;

    }*/


    //TYPEDEF

    /*struct cadastro{
    char nome[50], rua[50];
    int idade, numero;
    };
    typedef struct cadastro cad;
    int main(){
    cad c;
    strcpy(c.nome,"Willian");
    scanf("%d",&c.idade);
    printf("%s\n%d\n",c.nome,c.idade);
    system("pause");
    return 0;
    }*/


    //FUNÇOES

    /*int quadrado(int x){
        return x*x;
    }
    int main(){
    int x;
    scanf("%d",&x);
    printf("%d\n",quadrado(x));
    system("pause");
    return 0;
    }*/

    //RAIZ

    /*float raiz(int x){
    return sqrt(x);
    }

    int main(){
    int x;
    scanf("%d",&x);
    printf("%f\n",raiz(x));
    system("pause");
    return 0;
    }*/

    //FATORIAL

    /*int fatorial(int n){
    int i, f=1;
    for (i=1;i<=n;i++)
        f=f*i;
        return f;
    }

    int main(){
    int x;
    scanf("%d",&x);
    printf("%d\n",fatorial(x));
    system("pause");
    return 0;
    }*/

    //FUNÇAO MENU

    /*int Menu(){
    int i;
    do{
        printf("Escolha uma opção:\n");
        printf("(1) Opcao 1\n");
        printf("(2) Opcao 2\n");
        printf("(3) Opcao 3\n");
        printf("(4) Opcao 4\n");
        printf("(5) Opcao 5\n");
        printf("(6) Opcao 6\n");
        printf("(7) Opcao 7\n");
        printf("(8) Opcao 8\n");
        printf("(9) Opcao 9\n");
        scanf("%d",&i);
    }while((i<1)&&(i>9));
    return i;
    }

    int main(){
    int op Menu();
    printf("Voce escolheu a opcao %d\n",op);
    system("pause");
    return 0;
    }*/


    //VOID

    /*void imprime(int n){
    int i;
    for(i=1;i<=5;i++)
        printf("Linha %d\n",i);
    }
    int main(){
    imprime(5);
    system("pause");
    return 0;
    }*/

    //STRUCT REFERENCIA

    /*struct ponto{
    int x, y;
    };
    void soma_imprime_valor(int *n){
    *n = *n+1;
    printf("Valor= %d\n",*n);
    }

    int main(){
    struct ponto p1;
    scanf("%d %d",&p1.x,&p1.y);
    soma_imprime_valor(&p1.x);
    system("pause");
    return 0;
    }*/

    /* int retMaior(int x, int y){
    int aux;
    if(x<y){
        aux=x;
        x=y;
        y=aux;
    }
    return x;
    }

    int main(){
    int x,y;
    scanf("%d %d",&x,&y);
    printf("O maior eh %d",retMaior(x,y));
    return 0; }  */

    /*int parOuImpar(int x){
    return x%2;
    }

    int main(){
    int x=10;
    printf("Par ou Impar %d",parOuImpar(x));
    return 0;
    }*/

    //FATORIAL RECURSIVO

    /*int Fatorial(int n){
    if(n==0)
    return 1;
    else
    return n*Fatorial(n-1);
    }
    int main(){
    int x;
    scanf("%d",&x);
    printf("Fatorial de %d eh: %d",x,Fatorial(x));
    return 0;
    }*/

    /*int main(){
    int vet[5]={1,2,3,4,5};
    int *p=vet;
    int i;
    for(i=0;i<5;i++){
    printf("%d ",*(p+i));

    }
    return 0;
    }*/


    //MALLOC

    /*int main(){
    int *v;
    v=(int*) malloc(20*sizeof(int));
     if(v==NULL){
        printf("ERRO espaço insuficiente");
        exit(1);
     }
    int i;
    for(i=0;i<20;i++){
        printf("Digite o vetor v[%d]: \n",i);
        scanf("%d",&v[i]);
    }
    free(v);
    return 0;
    }*/

    //CALLOC

    /*int main(){
    int *v= (int*) calloc(20, sizeof(int));
    if (v==NULL){
        printf("ERRO");
        exit(1);
    }

    free(v);
    return 0;
    }*/

    /*
    int main(){
    int dia;
    fflush(stdin);
    scanf("%d",&dia);
    printf("%d ano(s)\n%d mes(es)\n%d dia(s)\n",dia/365,(dia%365)/30,(dia%365)%30);
    return 0;
    }
    */
    int main()
    {
        double vet[4][6] = {{33,38,36,40,31,35},{32,40,42,38,30,34},{31,37,35,33,34,30},{28,34,32,30,33,31}};
        double st = 0.0;
        double x=33.975;
        for(int i=0;i<4;i++)
        {
            for(int j=0;j<6;j++)
            {
                st += (vet[i][j]-x)*(vet[i][j]-x);
            }
        }
        double me[4]={35.5,36.0,33.3,31.1};
        double se=0.0;
        for(int i=0;i<4;i++)
            se += (me[i]-x)*(me[i]-x);
        printf("St: %.3f\nSe: %.3f",st,se);
        return 0;
    }
