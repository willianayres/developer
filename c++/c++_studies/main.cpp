/// VÍDEO USADO DE REFERÊNCIA
/// https://www.youtube.com/watch?v=_bYFu9mBnr4

/// *************************************************** INICIANDO PROGRAMAÇÃO EM C++ *************************************************** ///
/*
#include <iostream>     // <- Inclui a biblioteca iostream ->

// using namespace std  // <- Inclui o espaço std inteiro  ->

using std::cout;        // <- Inclui apenas o objeto cout  ->
using std::endl;        // <- Inclui apenas o objeto endl  ->
using std::cin;         // <- Inclui apenas o objeto cin   ->


int main()
{
    int slices;                                                          // <- Declaração de variável do tipo inteito       ->
    cout << "How many slices did you eat?" << endl << "Slices: ";
    cin >> slices;                                                       // <- Leitura do teclado da variáve com objeto cin ->
    cout << "You have eaten " << slices << " slices of pizza!"<< endl;   // <- Impressão formatada na tela com objeto cout  ->
    //printf("You have %i slices of pizza!",slices);                     // <- Impressão formatada na tela com printf       ->
    return 0;
}
*/

/// ********************************************************* COMEÇANDO FUNÇÕES ********************************************************* ///
/*
#include <iostream>                           // <- Inclui a biblioteca iostream     ->
#include <cmath>                              // <- Inclui a biblioteca cmath        ->

using std::cout;                              // <- Inclui apenas o objeto cout      ->
using std::endl;                              // <- Inclui apenas o objeto endl      ->
using std::cin;                               // <- Inclui apenas o objeto cin       ->


double myPower(double,int);     // <- Função própria para calcular potência          ->

void print_Power(double,int);   // <- Função própria para printar na tela a potência ->

int main()
{
    int b, e;                                                                                     // <- Declaração de inteiros   ->
    cout << "=== A program to calculate the power of a number ===\n\n" << "What is the base? ";   // <- \n para quebra de linha  ->
    cin >> b;
    cout << "\nWhat is the exponent? ";
    cin >> e;
    print_Power(b,e);
    return 0;
}


double myPower(double base, int exponent)
{
    double r = 1;                             // <- Declaração de double para retornar mesmo tipo de variável da função ->
    for(int i=0;i<exponent;i++)               // <- Loop for com i começando em 0, indo ate o exponent sem contar ele e ->
    {                                         // <- acrescentando de 1 em 1                                             ->
        r*=base;                              // <- r será igual a r multiplicado pela base, sendo feito exponent vezes ->
    }
    return r;                                 // <- retorna a variável r                                                ->
}

void print_Power(double base, int exponent)
{
    double p;                                 // <- Declaração de inteiro    ->
    //p = pow(b,e);                           // <- Usando a função pow para ->
    p = myPower(base,exponent);                         // <- Calcular a potência.     ->

    cout << "\nThe number " << base << " raised to the " << exponent << "  power is equal to " << p << "." << endl;
}
*/

/// *************************************************************** DATATYPES *************************************************************** ///
/*
#include <iostream>                           // <- Inclui a biblioteca iostream     ->
#include <float.h>

using std::cout;                              // <- Inclui apenas o objeto cout      ->
using std::endl;                              // <- Inclui apenas o objeto endl      ->


int main()
{
    const int MY_X = 5;                                                         // <- Declaração de constante                                ->
    enum {my_X = 10};                                                           // <- Declaração de constante por enumeração                 ->
    // short <= int <= long <= long long
    //   8   <= 16  <=  32  <=  64
    int a = 65;
    cout << (char)a << endl;                                                    // <- typecast de int para char                              ->
    bool hey = true;                                                            // <- Variável booleana pode ser true ou false               ->
    if(hey)
        cout << "true" << endl;
    else
        cout << "false" << endl;
    // float <= double <= long double
    double b = 7.7E4;                                                           // <- Notação científica E4 = 10^4                           ->
    float c = 10.0/3 * 10000000000000;
    cout << b << endl;
    cout << std::fixed << c << endl;                                            // <- fixed arruma um float para previnir erros              ->
    cout << FLT_DIG << endl << "A constante MY_X vale " << MY_X << endl;        // <- FLT_DIG diz quantos digitos são confiáveis em um float ->
    cout << "A constante my_X da enum vale " << my_X << endl;
    return 0;
}
*/
/// ***************************************************************** STRINGS ***************************************************************** ///
/*
#include <iostream>
#include <string>        // <- Inclui o espçaço string ->

using std::cout;
using std::endl;
using std::string;       // <- String pertence ao espaço std ->


int main()
{
    string c = "Ola mundo";                                                 // <- Declaração de variável do tipo string                   ->
    string d = "Ola mundo";
    string e = "What the Hell!";
    c += " da string c!";                                                   // <- Adição de strings                                       ->
    d.append(" da string d!");                                              // <- Método para adicionar algo à string                     ->
    cout << c << endl << d << endl;
    cout << "A string c tem " << c.length() << " caracteres." << endl;      // <- length é um método que retorna o tamanho da string      ->
    cout << c.insert(3," no meio do") << endl;                              // <- insert é um método para inserir algo na string          ->
    cout << c.erase(3,11) << endl;                                          // <- erase é um método para remover algo na string           ->
    //cout << e << endl << e.replace(9,4,"****") << endl;                   // <- replace é um método para substituir algo na string      ->
    cout << e << endl << e.replace(e.find("Hell"),4,"****") << endl;        // <- find é um método para procurar algo dentro da string    ->
    string f = e.substr(0,4);                                               // <- substr é um método que retorna um corte da string       ->
    cout << f << endl;
    if(f=="What") cout << "Iguais" << endl;
    cout << f.compare("What") << endl;                                      // <- compare é um método para comparar se strings são iguais ->
}
*/
/// **************************************************** OPERADORES E LITERAIS *************************************************************** ///
/*
#include <iostream>

int main()
{
    auto x = 5U; // 5.0 = D  5.0F 5.0L 5.0LL 5UL 5ULL         // <- Unsigned int                             ->
    x += -6;                                                  // <- Extrapola o limite                       ->
    std::cout << x << std::endl;                              // <- Printa o valor máximo de um unsinged int ->
    int n = 30;
    std::cout << n << std::endl;                              // <- Printa o valor na base decimal           ->
    std::cout << std::hex << n << std::endl;                  // <- Printa o valor na base hexadecimal       ->
    std::cout << std::oct << n << std::endl;                  // <- Printa o valor na base octal             ->

    // :: <- Refere-se ao espaço de uma função ou classe ->
    // >> <- Entrada de dados                            ->
    // << <- Saída de dados                              ->
    // =  <- Atribuir valores                            ->
    // +  <- Somar                                       ->
    // -  <- Subtrair                                    ->
    // *  <- Multiplicar                                 ->
    // /  <- Dividir                                     ->
    // %  <- Resto da divisão                            ->
    // !  <- Negação                                     ->
    // || <- Operador OU                                 ->
    // && <- Operador E                                  ->
    // != <- Operador DIFERENTE                          ->
    // == <- Operador IGUAL                              ->
    // >  <- Operador MAIOR QUE                          ->
    // <  <- Operador MENOR QUE                          ->
    // >= <- Operador MAIOR OU IGUAL QUE                 ->
    // <= <- Operador MENOR OU IGUAL QUE                 ->
    // ?  <- Operador de condição                        ->
    // :  <- Operador auxiliar de condição               ->

    return 0;
}
*/
/// **************************************************** CONDIÇÕES *************************************************************** ///
/*
#include <iostream>
#include <string>

using std::cout;
using std::cin;
using std::endl;
using std::string;


int main()
{
    // Parte 1
    string nome = "Willian", nome_chute;
    int idade = 21, idade_chute;
    cout << "Adivinhe meu nome: ";
    cin >> nome_chute;
    cout << "Adivinha minha idade: ";
    cin >> idade_chute;
    if(!nome.compare(nome_chute) && idade==idade_chute)         // <- Compara se o nome e a idade lida sao as corres ->
        cout << "Acertou" << endl;                              // <- Imprime acertou na tela se for verdadeiro      ->
    else
        cout << "Errou" << endl;                                // <- Imprime errou na tela se for falso             ->
    // Parte 2
    int p_i;
    cout << "Digite um numero: ";
    cin >> p_i;
    if(p_i % 2 == 0 && p_i != 0)                                // <- Se o resto da divisao por 2 for 0, e for diferente de 2 ->
    {
        cout << "Seu numero eh par!" << endl;                   // <- É par                                                   ->
    }else if(p_i % 2 == 1 && p_i != 0)
    {
        cout << "Seu numero eh impar!" << endl;                 // <- Senão é impar                                           ->
    }else
        cout << "Seu numero eh 0!" << endl;                     // <- Se não for par nem impar, é 0                           ->
    return 0;
}
*/
/// **************************************************** LOOPS *************************************************************** ///
/*
#include <iostream>
#include <string>

using std::cout;
using std::cin;
using std::endl;
using std::string;

int main()
{
    int n, fat, fat2;
    cout << "Digite um numero: ";
    cin >> n;
    fat = fat2 = n;
    cout << n << endl;
    for(int i=n-1;i>0;i--)                              // <- Variável de controle, condição de parada e atualização na mesma linha ->
    {
        fat*=i;
    }
    cout << "(Loop for):" << endl << "O fatorial de " << n << " eh " << fat << "." << endl << endl;
    int j=n-1;
    while(j>0)                                          // <- Necessita que a variável de controle seja declarada antes ->
    {
        fat2*=j;
        j--;                                            // <- E seja atualizada no final para maior controle do loop    ->
    }
    cout << "(Loop while):" << endl << "O fatorial de " << n << " eh " << fat2 << "." << endl << endl;
    string password = "30112000";
    string password_get;
    do                                                  // <- Garante que o código dentro do loop se repita pelo menos uma vez ->
    {
        cout << "Digite a senha: ";
        cin >> password_get;
    } while(password != password_get);
                                                        // continue <- Irá pular a ocorrência naquele momento do loop ->
                                                        // break    <- Irá romper o loop naquela ocorrência           ->
    return 0;
}
*/
/// **************************************************** ARRAYS *************************************************************** ///
/*
#include <iostream>
#include <limits>                                               // <- Usadado para os limites    ->
                                                                // <- da limpeza do buffer       ->
using std::cout;
using std::cin;
using std::endl;

void print_array(int array[], int size)                         // <- Array como parâmetro ->
{
    for(int i=0;i<size;i++)                                     // <- Loop para percorrer o array ->
    {
        cout << "Array[" << i << "]: " << array[i];             // <- Printa o array na posição i ->
        if(i==size-1)                                           // <- Se não for a ultima posição ->
            continue;                                           // <- ele printa uma tabulação    ->
        else
            cout << "\t";
    }
    cout << endl;
}

int main()
{
    const int SIZE = 10;                                             // <- Declaração de constante para tamanho do array      ->
    int guesses[SIZE];                                               // <- Declaração de um array                             ->
    int cont = 0;

    for(int i=0;i<SIZE;i++)                                          // <- Leitura de dados para o array                      ->
    {
        cout << "Array[" << i << "]: ";
        if(cin >> guesses[i])                                        // <- Se o dado for invalido ele não le                  ->
        {
            cont++;
        }
        else
        {
            break;
        }
    }

    //print_array(guesses,sizeof(guesses)/sizeof(int));             // <- Chamada da função para printar o array             ->
                                                                    // <- sizeof retorna o tamanho do que é passado em bytes ->
    print_array(guesses,cont);
    cin.clear();
    cin.ignore(std::numeric_limits<std::streamsize>::max(),'\n');   // <- Limpa o buffer de entrada                          ->

    return 0;
}
*/
/// **************************************************** VECTORS *************************************************************** ///
/*
#include <iostream>
#include <vector>                               // <- Inclui a classe para vetores                    ->

using std::cout;
using std::cin;
using std::endl;
using std::vector;                              // <- Permite usar a classe de vectores no espaço std ->

void print_vector(vector<int> &data)            // <- Passa o vetor como referência por meio do &     ->
{
    for(unsigned int i=0;i<data.size();i++)     // <- Percorre o vetor ate o tamanho dele             ->
        cout << data[i] << " ";
}

int main()
{
    vector<int> data = {5,10,20};               // <- Declaração do vetor                             ->
    data.push_back(30);                         // <- Empilha um novo valor no final do vetor         ->
    print_vector(data);
    return 0;
}
*/
/// **************************************************** FOR EACH *************************************************************** ///
/*
#include <iostream>
#include <vector>
#include <array>

using std::cout;

int main()
{
    int data[] = {1,2,3};
    std::vector <int> data2 = {4,5,6};
    std::array <int, 3> data3 = {7,8,9};
    for(int n : data)
        cout << n << " ";
    cout << std::endl;
    for(int n : data2)
        cout << n << " ";
    cout << std::endl;
    for(int n : data3)
        cout << n << " ";
    cout << std::endl;
    return 0;
}
*/
/// **************************************************** FILES *************************************************************** ///
/*
#include <iostream>
#include <vector>
#include <string>
#include <fstream>                              // <- Biblioteca para trabalhar com arquivos texto ->

using std::cout;
using std::cin;
using std::vector;
using std::string;

int main()
{
    vector <string> names;                                 // <- Vetor de nomes                               ->
    for(int i=0;i<2;i++)
    {
        string nome;
        cin >> nome;
        names.push_back(nome);                             // <- Coloca o nome no vetor                       ->
    }
    std::ofstream file ("teste.txt", std::ios::app);            // <- Abre o arquivo para inserção de informação   ->
    if(!file.is_open())                                    // <- Confere se o arquivo foi aberto corretamente ->
        cout << "O arquivo nao foi aberto com sucesso!";
    for(string name : names)
        file << name << std::endl;                         // <- Imprimi as informações no arquivo texto      ->
    file.close();                                          // <- Fecha o arquivo texto                        ->

    std::ifstream file2 ("teste.txt");                     // <- Abre para leitura                            ->
    if(!file2.is_open())
        cout << "O arquivo nao foi aberto com sucesso!";
    string line;
    getline(file2, line);                                  // <- Pega uma linha do arquivo                    ->
    cout << line << std::endl;
    return 0;
}
*/
/// ******************************************* MULTIDIMENSIONAL ARRAY ****************************************************** ///
/*
#include <iostream>
#include <vector>

using std::cout;
using std::cin;
using std::vector;

void print_array(const int data[], int data_size)             // <- Passando como const garante que o array    ->
{                                                             // <- não seja modificado                        ->
    for(int i=0;i<data_size;i++)
    {
        //data[i]++;                                          // <- const não permite que isso ocorra          ->
        cout << data[i] << "\t";
    }
    cout << std::endl;
}

int main()
{                                                             // Arrays statico precisa de tamanho das colunas ->
    int notas[][3] = {{30,20,10}, {10,20,30}};                // <- Declaração de array bidimensional          ->
    for(int i=0;i<2;i++)                                      // <- Primeiro loop percorre a "linha"           ->
    {
        for(int j=0;j<3;j++)                                  // <- Segundo loop percorre a "coluna"           ->
            cout << notas[i][j] << " ";
    }
    cout << std::endl << std::endl;
    vector <vector<int>> notas2 = {{30,20,10}, {10,20,30}};   // <- Vetores funcionam da mesma forma           ->
    for(int i=0;i<2;i++)
    {
        for(int j=0;j<3;j++)
        {
            cout << notas2[i][j] << " ";
        }
        cout << std::endl;
    }
    return 0;
}
*/
/// ************************************************* REFERÊNCIA ************************************************************ ///
/*
#include <iostream>

using std::cout;

void troca(int &a, int &b)                                                             // <- Passando os parâmetros como refência ->
{                                                                                      // <- Com o operador &                     ->
    int temp = a;
    a = b;
    b = temp;
    cout << "Dentro da funcao troca:\n" <<"A = " << a << " B = " << b << std::endl;
}

int main()
{
    int a = 5, b = 4;
    cout << "Dentro da main:\n" << "A = " << a << " B = " << b << std::endl;
    troca(a,b);
    cout << "Dentro da main:\n" << "A = " << a << " B = " << b << std::endl;
    return 0;
}
*/
/// ************************************************* OVERLOADING ************************************************************ ///
/*
#include <iostream>

using std::cout;

struct Retangulo                                    // <- Structs são "tipos" de variável definido pelo programador ->
{                                                   // <- São variáveis compostas e podem possuir quantas outras    ->
    float b;                                        // <- variáveis necessário                                      ->
    float h;
};

float area(float l)                                 // <- Primeira definição da funçao area, que recebe apenas 1    ->
{                                                   // <- parâmetro.                                                ->
    return l*l;
}

float area(float b, float h)                        // <- Segunda definição da função area, que recebe mais de 1    ->
{                                                   // <- parâmetro. Para ser definida outra função com mesmo nome, ->
    return b*h;                                     // <- é necessário possuir parâmetros diferentes.               ->
}

float area(Retangulo r)                             // <- Terceira definição da função area, que recebe uma struct  ->
{                                                   // <- Retangulo como parâmetro.                                 ->
    return r.b*r.h;
}

int power(int base, int pow=0)                      // <- Define-se parâmetros com valores padrão para caso não se  ->
{                                                   // <- passe um argumento para a função, ele possuirá aquele     ->
    int total = 1;                                  // <- valor padrão.                                             ->
    if(pow==0)
        return total;
    for(int i=1;i<pow;i++)                          // <- Sempre priorize usar parâmetros com valores padrão do que ->
        total*=i;                                   // <- repetir funções com parâmetros diferentes.                ->
    return total;
}

int main()
{
    cout << power(2) << "\n";          // <- Como é chamado power sem passar o segundo argumento, ele valerá 2 por padrão. ->
    float l=5;
    Retangulo r;               // <- Para acessar os valores ->                    // <- Declarando uma struct Retangulo r ->
    r.b = 5;                   // <- da struct r, usa-se o   ->                    // <- Atribuindo valor a float b de r   ->
    r.h = 10;                  // <- operador .              ->                    // <- Atribuindo valor a float h de r   ->

    cout << "Area do quadrado com lado: " << l << ", eh: " << area(l) << ".\n";
    cout << "Area do retangulo com lado: " << r.b << ", altura: " << r.h << ", eh: " << area(r.b, r.h) << ".\n";
    cout << "Area do retangulo(struct) eh: " << area(r) << ".\n";
    return 0;
}
*/
/// ************************************************** MULTIFILE ************************************************************* ///
/*
#include <iostream>
#include "math.h"

int main()
{
    std::cout << power(2) << "\n";          // <- Como é chamado power sem passar o segundo argumento, ele valerá 2 por padrão. ->
    std::cout << power(2,4) << "\n";
    float l=5;
    Retangulo r;               // <- Para acessar os valores ->                    // <- Declarando uma struct Retangulo r ->
    r.b = 5;                   // <- da struct r, usa-se o   ->                    // <- Atribuindo valor a float b de r   ->
    r.h = 10;                  // <- operador .              ->                    // <- Atribuindo valor a float h de r   ->

    std::cout << "Area do quadrado com lado: " << l << ", eh: " << area(l) << ".\n";
    std::cout << "Area do retangulo com lado: " << r.b << ", altura: " << r.h << ", eh: " << area(r.b, r.h) << ".\n";
    std::cout << "Area do retangulo(struct) eh: " << area(r) << ".\n";
    return 0;
    return 0;
}
*/
/// **************************************************** GAME *************************************************************** ///
/*
#include <iostream> // biblioteca padrão
#include <fstream>  // biblioteca para arquivos texto
#include <vector>   // biblioteca para vetores
#include <cstdlib>  // biblioteca de números aleatórios
#include <ctime>    // biblioteca de tempo


using std::cout;    // Uso da função cout do espaço std.
using std::cin;     // Uso da função cin  do espaço std.
using std::endl;    // Uso da funçao endl do espaço std.


void game_start();  // Declaração da função de início do jogo.

void print_guesses(std::vector <int> array);    // Declaração da função de printar o vetor de tentativas.

bool guess_check(std::vector <int> array, int); // Declaração da função de verificação de tentativa.

void record(int);   // Declaração da função para leitura do arquivo texto de record.

int main()
{
    srand(time(NULL));  // Temporizador.
    int choice;
    do                  // Menu de escolha para jogar ou sair do jogo.
    {
        cout << "[1] Play the game\n[2] Exit" << endl;
        cin >> choice;
        switch(choice)
        {
            case 1:
                game_start();
                break;
            case 2:
                cout << "OK, te vejo por ai!";
                return 0;
                break;
        }
    } while(choice!=2);
}

void print_guesses(std::vector <int> array) // Função que recebe vetor como parâmetro, e imprime ele.
{
    cout << "Suas tentativas foram: ";

    for(unsigned int i=0;i<array.size();i++)    // Loop para impressão na tela.
    {
        cout << array[i];
        if(i==array.size()-1)                   // Confere se não é o último, para imprimir " - ".
            continue;
        else
            cout << " - ";
    }
    cout << endl;
}

bool guess_check(std::vector <int> array, int guess)    // Função para conferir o chute. Recebe o array de tentativas
{                                                       // e a tentativa.
    bool check = true;
    for(unsigned int i=0;i<array.size();i++)            // Percore o vetor de tentativas.
    {
        if(array[i]==guess)                             // Se a tentativa existe no guess, retorna falso.
        {                                               // Senão permanece como true.
            check = false;
            break;
        }
    }
    return check;
}

void game_start()   // Função para início do jogo.
{
    std::vector <int> guesses;  //  Declarando o vetor de tentativas.

    cout << "OK, entao vamos jogar!" << endl << endl;
    int random = rand() % 251;                          // Gera um número aleatório entre 0 e 251.
    cout << random << endl;
    cout << "Adivinha o numero: ";
    while(true)                                         // Laço infinito que só termina em determinada condição.
    {
        int guess;
        cin >> guess;
        if(guess_check(guesses,guess))                  // Confere se a tentativa ja foi feita, se não foi, empilha no vetor.
            guesses.push_back(guess);

        if(guess==random)                               // Confere se a tentativa é igual ao número gerado.
        {
            cout << "OK, voce ganhou!" << endl;
            break;                                      // Se for igual, quebra o laço infinito.
        }
        else if(guess < random)                         // Se a tentativa for menor, avisa que o número é maior.
        {
            cout << "Voce errou! Eh maior..." << endl;
        }
        else if(guess > random)                         // Se a tentativa for maior, avisa que o número é menor.
        {
           cout << "Voce errou! Eh menor..." << endl;
        }
    }

    record((int)guesses.size());                        // Após o jogo, confere se o número de tentativas bate o record.

    print_guesses(guesses);                             // Imprimi o vetor de tentativas.
}

void record(int guess_count)
{
    std::ifstream input("records.txt");                 // Abre o arquivo para leitura do record.
    if(!input.is_open())
    {
        cout << "Erro ao abrir o arquivo!" << endl;     // Confere se foi possível abrir o arquivo.
        return;
    }
    int record;
    input >> record;                                    // Le o record do arquivo.
    std::ofstream output("records.txt");                // Abre o arquivo para escrita do record.
    if(!output.is_open())
    {
        cout << "Erro ao abrir o arquivo!" << endl;     // Confere se o arquivo existe.
        return;
    }
    if(guess_count<record)                              // Se a tentativa for menor que o record...
        output << guess_count;                          // Grava o novo record.
    else
        output << record;                               // Grava o antigo record.
}
*/
/// **************************************************** NAMESPACE *************************************************************** ///
/*
#include <iostream>
#include <limits>

using std::cout;
using std::cin;
using std::endl;

namespace utilidades                                        // <- Cria-se um space utilizando 'namespace' e o nome  ->
{                                                           // <- que deseja dar ao espaço. As funções pertencentes ->
    void print_array(int array[], int size)                 // <- vão dentro dos delimitadores '{' e '}'            ->
    {
        for(int i=0;i<size;i++)
        {
            cout << "Array[" << i << "]: " << array[i];
            if(i==size-1)
                continue;
            else
                cout << "\t";
        }
        cout << endl;
    }
}

//using namespace utilidades;                               // <- Usando todas as funçoes pertencentes ao namespace  ->
//using utilidades::print_array;                            // <- Usando função espacifica do namespace              ->

int main()
{
    const int SIZE = 3;
    int guesses[SIZE];
    int cont = 0;

    for(int i=0;i<SIZE;i++)
    {
        cout << "Array[" << i << "]: ";
        if(cin >> guesses[i])
        {
            cont++;
        }
        else
        {
            break;
        }
    }

    //print_array(guesses,cont);                                        // <- Se for declarado o uso dessa funçao do space no    ->
                                                                        // <- começo do código                                   ->
    utilidades::print_array(guesses,cont);                              // <- Chama a função print_array do namespace utilidades ->
    cin.clear();                                                        // <- por meio do 'utilidades::'                         ->
    cin.ignore(std::numeric_limits<std::streamsize>::max(),'\n');

    return 0;
}
*/
/// **************************************************** TEMPLATE *************************************************************** ///
/*
#include <iostream>
#include <string>

template <typename T>               // <- Define-se T como uma variavel de tipo desconhecido, que apenas sera reconhecido ->
void trocar(T &a, T &b)             // <- na hora que os argumentos forem passados a uma função. Serve para evitar        ->
{                                   // <- overloadings desnecessários                                                     ->
    T temp = a;
    a = b;
    b = temp;
}

template <typename T>               // <- Overloading de funções com template. Util na utilização de arrays, pois não são ->
void trocar(T a[], T b[], int tam)  // <- atribuiveis diretamente.                                                        ->
{
    for(int i=0;i<tam;i++)
    {
        T temp=a[i];
        a[i]=b[i];
        b[i]=temp;
    }
}

int main()
{
    const int SIZE = 5;
    int a = 5;
    int b = 10;

    std::cout << "Antes da funcao:\nA = " << a << "   B = " << b << "\n";

    trocar(a,b);                                                                      // <- É possivel chamar a mesma função para tipos ->
                                                                                      // <- de variavel diferentes pelo fato de existir ->
    std::cout << "Depois da funcao:\nA = " << a << "   B = " << b << "\n";            // <- Template T                                  ->

    std::string nome1 = "Willian";
    std::string nome2 = "Joao";

    std::cout << "Antes da funcao:\nA = " << nome1 << "   B = " << nome2 << "\n";

    trocar(nome1,nome2);

    std::cout << "Depois da funcao:\nA = " << nome1 << "   B = " << nome2 << "\n\n";

    int dois[SIZE] = {2,2,2,2,2};
    int tres[SIZE] = {3,3,3,3,3};
    std::cout << "Antes da funcao: Array dois[] = ";
    for(int i=0;i<5;i++)
        std::cout << dois[i] << " ";
    std::cout << "\nAntes da funcao: Array tres[] = ";
    for(int i=0;i<5;i++)
        std::cout << tres[i] << " ";

    trocar(dois,tres,SIZE);                                                             // <- Os dois argumentos iniciais são os mesmos ->
                                                                                        // <- porem existe um adicional, em decorrencia ->
        std::cout << "\n\nDepois da funcao: Array dois[] = ";                           // <- do overloading.                           ->
    for(int i=0;i<5;i++)
        std::cout << dois[i] << " ";
    std::cout << "\nDepois da funcao: Array tres[] = ";
    for(int i=0;i<5;i++)
        std::cout << tres[i] << " ";
    std::cout << "\n";

    return 0;
}
*/
/// **************************************************** OOP STRUCTS *************************************************************** ///
/*
#include <iostream>

struct User                                         // Classes são semelhantes a structs, mas por convensão, structs são
{                                                   // utilizadas para grupos de dados pequenos. Struct tem dados publicos
    std::string first_name;                         // por padrão, e para alterar basta adicionar 'private:' antes de
    std::string last_name;                          // qualquer dado ou função novo.
    std::string get_status()                        // Dados privados apenas são acessados pela struct User, não podem ser
    {                                               // acessados diretamente por novas instâncias a partir dessa struct.
        return status;
    }
    private:
        std::string status = "Gold";
};

int main()
{
    User user;                                              // Instância uma nova struct do tipo User
    user.first_name = "Willian";                            // Utiliza o '.' para acessar os campos dessa struct
    user.last_name = "Ayres";
    std::cout << "First name: " << user.first_name << "\n";
    std::cout << "Last name: " << user.last_name << "\n";
    std::cout << "Status: " << user.get_status() << "\n";   // Recupera o dado privado utilizando a função de acesso a esse dado
    return 0;
}
*/
/// **************************************************** OOP CLASSES *************************************************************** ///
/*
#include <iostream>
#include <vector>

class User                                  // Semelhantes a structs, porem seus dados são privados por padrão. Para permitir acesso
{                                           // de dados por objetos instanciados, precisa-se tornar o dado como público.
    std::string status = "Gold";
    public:
        std::string first_name;
        std::string last_name;
        std::string get_status()
        {
            return status;
        }
};

int add_user(std::vector<User> &users, User user)           // É passado como parametro um vetor por referencia do tipo User
{                                                           // e um User no qual deseja verificar se pode ser inserido.
    for(unsigned int i=0;i<users.size();i++)                // Percorre o vetor de usuários
    {
        if(users[i].first_name==user.first_name &&          // Compara se o first_name da posição i é igual ao first_name do user
           users[i].last_name==user.last_name)              // Compara se o last_name da posição i é igual ao last_name do user
            return i;                                       // Se for igual ele retorna a posição daquela usuário no vetor
    }
    users.push_back(user);
    return users.size()-1;                                  // senão adiciona ele no final do vetor e retorna a posição final do vetor
}

int main()
{
    User user1, user2, user3;                               // Instancia 3 novos objetos a partir da classe User

    user1.first_name = "Willian";                           // Atribui-se valores a first_name do objeto utilizando o operador '.'
    user1.last_name = "Ayres";

    user2.first_name = "Joao";
    user2.last_name = "Batatoso";

    user3.first_name = "Mario";
    user3.last_name = "Joel";

    std::cout << "First Name: " << user1.first_name << ".\n";
    std::cout << "Last Name: " << user1.last_name << ".\n";

    std::vector <User> users;                                   // Vetor do tipo User
    users.push_back(user1);
    users.push_back(user2);
    users.push_back(user3);
    std::cout << users[0].first_name << "\n";                   // Acessa o first_name o user na posicao 0 do vetor.

    User user;
    user.first_name = "Willian";                                // Como no caso esse user é o mesmo que o user1
    user.last_name = "Ayres";

    std::cout << add_user(users,user) << "\n";                  // Deve printar o valor 0 na tela, referente a posição do user1 no vetor

    return 0;
}
*/
/// **************************************************** CONSTRUCTOR *************************************************************** ///
/*
#include <iostream>

class User
{
    std::string status = "Gold";
    public:
        std::string first_name;
        std::string last_name;
        std::string get_status()
        {
            return status;
        }
        User()                                              // Constructor é o metodo que sempre é chamado quando instancia-se um novo
        {                                                   // Objeto. O nome do método é o mesmo da classe.
            std::cout << "Constructor" << "\n";
        }
        User(std::string first_name, std::string last_name) // Pode se fazer um constructor com parâmetros.
        {
            this->first_name = first_name;                  // Usa-se o 'this->' para acessar á variavel da classe, e atribuir a ela
            this->last_name = last_name;                    // os argumentos passados ao método constructor.
        }
        ~User()                                             // O método destructor sempre é chamado, ao final de uma aplicação, para
        {                                                   // todo objeto instanciado a partir dessa classe.
            std::cout << "Destructor" << "\n";
        }
};

int main()
{
    User me;                                                // Utiliza o metodo constructor padrão.
    User user1("Willian","Ayres");                          // Método construct personalizado.
    User user3("Jose","Diceu");
    return 0;
}
*/
/// **************************************************** GETTING AND SETTERS *************************************************************** ///
/*
#include <iostream>

class User
{
    std::string status = "Gold";
    public:
        std::string first_name;
        std::string last_name;
        std::string get_status()                                    // Utiliza-se getters para recuperar valores privados da classe.
        {                                                           // Como status é privado, utiliza-se  o método get_status para
            return status;                                          // recurperar esse valor por meio do return status.
        }
        void set_status(std::string status)                         // Utiliza-se setters para atribuir valores privados da classe.
        {                                                           // Como status é privado, utiliza-se o método set_status para
            if(status=="Gold"||status=="Silver"||status=="Bronze")  // atribuir um valor especifico. Caso não seja um valor válido,
                this->status = status;                              // é atribuido o valor de nenhum status.
            else
                this->status = "No status";
        }
        User(){}
        User(std::string first_name, std::string last_name)
        {
            this->first_name = first_name;
            this->last_name = last_name;
        }
        ~User(){}
};

int main()
{
    User user("Willian","Ayres");
    user.set_status("Silver");
    std::cout << "Status: " << user.get_status() << "\n";
    return 0;
}
*/
/// **************************************************** STATIC *************************************************************** ///
/*
#include <iostream>

class User
{

    static int user_count;                              // Variável estática pertencente a classe. Apenas aponta que ela existe.
                                                        // Para começar a trabalhar com ela, precisa-se instancia-la fora da classe.
    std::string status = "Gold";

    public:
        static int get_user_count()
        {
            return user_count;                          // Retorna o valor da variavel. Certificar que algum valor foi atribuido a mesma.
        }
        std::string first_name;
        std::string last_name;
        std::string get_status()
        {
            return status;
        }
        void set_status(std::string status)
        {
            if(status=="Gold"||status=="Silver"||status=="Bronze")
                this->status = status;
            else
                this->status = "No status";
        }
        User()
        {
            user_count++;                                       // Sempre que um novo objeto for instanciado, sera adiciona 1 ao valor.
        }
        User(std::string first_name, std::string last_name)
        {
            this->first_name = first_name;
            this->last_name = last_name;
            user_count++;                                       // Sempre que um novo objeto for instanciado, sera adiciona 1 ao valor.
        }
        ~User()
        {
            user_count--;                                       // Sempre que um novo objeto for instanciado, sera removido 1 do valor.
        }
};


int User::user_count = 0;                                       // Quando é criado uma classe, ela não ocupado mémoria, por isso,
                                                                // instancia-se uma variável estática para que ocupe o espaço e possa
                                                                // ser atribuido valores a ela.
int main()
{
    User user("Willian","Ayres");
    User user2, user3;
    user.set_status("Silver");
    std::cout << "Status: " << user.get_status() << "\n";
    std::cout << "User_count: " << user.get_user_count() << "\n";
    return 0;
}
*/
/// **************************************************** OPERATORS *************************************************************** ///
/*
#include <iostream>

class Position
{
    public:
        int x = 10;                         // Se nao definidos valores, terao esse como padrao.
        int y = 20;
        Position operator + (Position pos)  // Retornara um objeto da classe position. Redefine o operador mais para objetos da classe
        {
            Position new_pos;               // Declara a variavel de retorno.
            new_pos.x = x + pos.x;          // Atribui ao x da variavel de retorno o valor de x + o recebido.
            new_pos.y = y + pos.y;          // Atribui ao y da variavel de retorno o valor de y + o recebido.
            return new_pos;                 // Retorna a variavel new_pos
        }
        bool operator == (Position pos)     // Retorna verdadeiro ou falso para o operador de comparação
        {
            if(x == pos.x && y == pos.y)    // Se o x e o y do comparado for igual ao recebido, retorna true
                return true;
            return false;                   // Senao, por padrao, retorn falso.
        }
};

std::ostream& operator << (std::ostream& output, const Position pos)      // Alterando operador de saida. Usa-se '&' para alterar o valor
{                                                                         // do método. Const na pos para nao ter problemas de alteração
    output << "Pos.x: " << pos.x << "  Pos.y: " << pos.y << ".\n";        // da mesma.
    return output;
}

std::istream& operator >> (std::istream& input, Position &pos)            // Alterando o operador de entrada. Usa-se o '&' para alterar o valor
{                                                                         // do método. '&' no pos para alterar os valores originais com método
    input >> pos.x >> pos.y;                                              // de entrada.
    return input;
}

int main()
{
    Position pos1, pos2, pos4;
    Position pos3 = pos1 + pos2;                     // Como o operador foi definido, é possivel fazer a operação.
    std::cout << "Pos3.x = " << pos3.x;
    std::cout << "\nPos3.y = " << pos3.y << "\n";
    if(pos1==pos2)                                   // Como o operador foi definido, é possivel fazer a operação.
        std::cout << "Pos1 e Pos2 sao iguais!!!\n";
    std::cin >> pos4;                                // Como o operador foi definido, é possivel fazer a operação.
    std::cout << pos4;                               // Como o operador foi definido, é possivel fazer a operação.
    return 0;
}
*/
/// **************************************************** FRIEND FUNCTIONS *************************************************************** ///
/*
#include <iostream>

class User
{
    std::string status = "Gold";
    public:
        std::string first_name;
        std::string last_name;
        std::string get_status()
        {
            return status;
        }
        void set_status(std::string status)
        {
            if(status=="Gold"||status=="Silver"||status=="Bronze")
                this->status = status;
            else
                this->status = "No status";
        }
        User(){}
        User(std::string first_name, std::string last_name)
        {
            this->first_name = first_name;
            this->last_name = last_name;
        }
        friend void output_status(User user);                                       // Declaração das funções é feita dentro da classe.
        friend std::ostream& operator << (std::ostream& output, const User user);   // Como é do tipo friend, da liberdade para acesso
        friend std::istream& operator >> (std::istream& input, User &user);         // a variáveis privadas.
};

void output_status(User user)                                                       // Como é feita fora da classe, tem acesso a variavel
{                                                                                   // privada livremente.
    std::cout << user.status;
}

std::ostream& operator << (std::ostream& output, const User user)                   // Implementação da friend function da classe
{
    output << "First Name: " << user.first_name << "  Last Name: " << user.last_name << "  Status: " << user.status << ".\n";
    return output;
}

std::istream& operator >> (std::istream& input, User &user)                         // Implementação da friend function da classe
{
    input >> user.first_name >> user.last_name;
    return input;
}

int main()
{
    User user("Willian","Ayres");
    output_status(user);
    std::cout << "\n" << user;                     // Pode-se usar diretamente o operador por ja haver a declaração
    return 0;
}
*/
/// **************************************************** CLASS FILES *************************************************************** ///
/*
#include <iostream>  // Para chamar arquivo presente na data do codeblocks, usa-se <>
#include <string>
#include "user.h"    // Para chamar arquivo presente na pasta do programa, usa-se ""

int main()
{
    User user("Willian","Ayres");
    output_status(user);
    std::cout << "\n" << user;
    return 0;
}
*/
/// **************************************************** CLASS INHERITANCE *************************************************************** ///
#include <iostream>
#include <string>
#include "user.h"
#include "teacher.h"

int main()
{
    User user;
    std::cin >> user;
    std::cout << "\n" << user;
    Teacher teacher;                // Como Teacher herda a classe User, ambos os métodos construtores serão chamados aqui.
    teacher.output();
    return 0;
}

