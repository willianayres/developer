/// V�DEO USADO DE REFER�NCIA
/// https://www.youtube.com/watch?v=_bYFu9mBnr4

/// *************************************************** INICIANDO PROGRAMA��O EM C++ *************************************************** ///
/*
#include <iostream>     // <- Inclui a biblioteca iostream ->

// using namespace std  // <- Inclui o espa�o std inteiro  ->

using std::cout;        // <- Inclui apenas o objeto cout  ->
using std::endl;        // <- Inclui apenas o objeto endl  ->
using std::cin;         // <- Inclui apenas o objeto cin   ->


int main()
{
    int slices;                                                          // <- Declara��o de vari�vel do tipo inteito       ->
    cout << "How many slices did you eat?" << endl << "Slices: ";
    cin >> slices;                                                       // <- Leitura do teclado da vari�ve com objeto cin ->
    cout << "You have eaten " << slices << " slices of pizza!"<< endl;   // <- Impress�o formatada na tela com objeto cout  ->
    //printf("You have %i slices of pizza!",slices);                     // <- Impress�o formatada na tela com printf       ->
    return 0;
}
*/

/// ********************************************************* COME�ANDO FUN��ES ********************************************************* ///
/*
#include <iostream>                           // <- Inclui a biblioteca iostream     ->
#include <cmath>                              // <- Inclui a biblioteca cmath        ->

using std::cout;                              // <- Inclui apenas o objeto cout      ->
using std::endl;                              // <- Inclui apenas o objeto endl      ->
using std::cin;                               // <- Inclui apenas o objeto cin       ->


double myPower(double,int);     // <- Fun��o pr�pria para calcular pot�ncia          ->

void print_Power(double,int);   // <- Fun��o pr�pria para printar na tela a pot�ncia ->

int main()
{
    int b, e;                                                                                     // <- Declara��o de inteiros   ->
    cout << "=== A program to calculate the power of a number ===\n\n" << "What is the base? ";   // <- \n para quebra de linha  ->
    cin >> b;
    cout << "\nWhat is the exponent? ";
    cin >> e;
    print_Power(b,e);
    return 0;
}


double myPower(double base, int exponent)
{
    double r = 1;                             // <- Declara��o de double para retornar mesmo tipo de vari�vel da fun��o ->
    for(int i=0;i<exponent;i++)               // <- Loop for com i come�ando em 0, indo ate o exponent sem contar ele e ->
    {                                         // <- acrescentando de 1 em 1                                             ->
        r*=base;                              // <- r ser� igual a r multiplicado pela base, sendo feito exponent vezes ->
    }
    return r;                                 // <- retorna a vari�vel r                                                ->
}

void print_Power(double base, int exponent)
{
    double p;                                 // <- Declara��o de inteiro    ->
    //p = pow(b,e);                           // <- Usando a fun��o pow para ->
    p = myPower(base,exponent);                         // <- Calcular a pot�ncia.     ->

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
    const int MY_X = 5;                                                         // <- Declara��o de constante                                ->
    enum {my_X = 10};                                                           // <- Declara��o de constante por enumera��o                 ->
    // short <= int <= long <= long long
    //   8   <= 16  <=  32  <=  64
    int a = 65;
    cout << (char)a << endl;                                                    // <- typecast de int para char                              ->
    bool hey = true;                                                            // <- Vari�vel booleana pode ser true ou false               ->
    if(hey)
        cout << "true" << endl;
    else
        cout << "false" << endl;
    // float <= double <= long double
    double b = 7.7E4;                                                           // <- Nota��o cient�fica E4 = 10^4                           ->
    float c = 10.0/3 * 10000000000000;
    cout << b << endl;
    cout << std::fixed << c << endl;                                            // <- fixed arruma um float para previnir erros              ->
    cout << FLT_DIG << endl << "A constante MY_X vale " << MY_X << endl;        // <- FLT_DIG diz quantos digitos s�o confi�veis em um float ->
    cout << "A constante my_X da enum vale " << my_X << endl;
    return 0;
}
*/
/// ***************************************************************** STRINGS ***************************************************************** ///
/*
#include <iostream>
#include <string>        // <- Inclui o esp�a�o string ->

using std::cout;
using std::endl;
using std::string;       // <- String pertence ao espa�o std ->


int main()
{
    string c = "Ola mundo";                                                 // <- Declara��o de vari�vel do tipo string                   ->
    string d = "Ola mundo";
    string e = "What the Hell!";
    c += " da string c!";                                                   // <- Adi��o de strings                                       ->
    d.append(" da string d!");                                              // <- M�todo para adicionar algo � string                     ->
    cout << c << endl << d << endl;
    cout << "A string c tem " << c.length() << " caracteres." << endl;      // <- length � um m�todo que retorna o tamanho da string      ->
    cout << c.insert(3," no meio do") << endl;                              // <- insert � um m�todo para inserir algo na string          ->
    cout << c.erase(3,11) << endl;                                          // <- erase � um m�todo para remover algo na string           ->
    //cout << e << endl << e.replace(9,4,"****") << endl;                   // <- replace � um m�todo para substituir algo na string      ->
    cout << e << endl << e.replace(e.find("Hell"),4,"****") << endl;        // <- find � um m�todo para procurar algo dentro da string    ->
    string f = e.substr(0,4);                                               // <- substr � um m�todo que retorna um corte da string       ->
    cout << f << endl;
    if(f=="What") cout << "Iguais" << endl;
    cout << f.compare("What") << endl;                                      // <- compare � um m�todo para comparar se strings s�o iguais ->
}
*/
/// **************************************************** OPERADORES E LITERAIS *************************************************************** ///
/*
#include <iostream>

int main()
{
    auto x = 5U; // 5.0 = D  5.0F 5.0L 5.0LL 5UL 5ULL         // <- Unsigned int                             ->
    x += -6;                                                  // <- Extrapola o limite                       ->
    std::cout << x << std::endl;                              // <- Printa o valor m�ximo de um unsinged int ->
    int n = 30;
    std::cout << n << std::endl;                              // <- Printa o valor na base decimal           ->
    std::cout << std::hex << n << std::endl;                  // <- Printa o valor na base hexadecimal       ->
    std::cout << std::oct << n << std::endl;                  // <- Printa o valor na base octal             ->

    // :: <- Refere-se ao espa�o de uma fun��o ou classe ->
    // >> <- Entrada de dados                            ->
    // << <- Sa�da de dados                              ->
    // =  <- Atribuir valores                            ->
    // +  <- Somar                                       ->
    // -  <- Subtrair                                    ->
    // *  <- Multiplicar                                 ->
    // /  <- Dividir                                     ->
    // %  <- Resto da divis�o                            ->
    // !  <- Nega��o                                     ->
    // || <- Operador OU                                 ->
    // && <- Operador E                                  ->
    // != <- Operador DIFERENTE                          ->
    // == <- Operador IGUAL                              ->
    // >  <- Operador MAIOR QUE                          ->
    // <  <- Operador MENOR QUE                          ->
    // >= <- Operador MAIOR OU IGUAL QUE                 ->
    // <= <- Operador MENOR OU IGUAL QUE                 ->
    // ?  <- Operador de condi��o                        ->
    // :  <- Operador auxiliar de condi��o               ->

    return 0;
}
*/
/// **************************************************** CONDI��ES *************************************************************** ///
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
        cout << "Seu numero eh par!" << endl;                   // <- � par                                                   ->
    }else if(p_i % 2 == 1 && p_i != 0)
    {
        cout << "Seu numero eh impar!" << endl;                 // <- Sen�o � impar                                           ->
    }else
        cout << "Seu numero eh 0!" << endl;                     // <- Se n�o for par nem impar, � 0                           ->
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
    for(int i=n-1;i>0;i--)                              // <- Vari�vel de controle, condi��o de parada e atualiza��o na mesma linha ->
    {
        fat*=i;
    }
    cout << "(Loop for):" << endl << "O fatorial de " << n << " eh " << fat << "." << endl << endl;
    int j=n-1;
    while(j>0)                                          // <- Necessita que a vari�vel de controle seja declarada antes ->
    {
        fat2*=j;
        j--;                                            // <- E seja atualizada no final para maior controle do loop    ->
    }
    cout << "(Loop while):" << endl << "O fatorial de " << n << " eh " << fat2 << "." << endl << endl;
    string password = "30112000";
    string password_get;
    do                                                  // <- Garante que o c�digo dentro do loop se repita pelo menos uma vez ->
    {
        cout << "Digite a senha: ";
        cin >> password_get;
    } while(password != password_get);
                                                        // continue <- Ir� pular a ocorr�ncia naquele momento do loop ->
                                                        // break    <- Ir� romper o loop naquela ocorr�ncia           ->
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

void print_array(int array[], int size)                         // <- Array como par�metro ->
{
    for(int i=0;i<size;i++)                                     // <- Loop para percorrer o array ->
    {
        cout << "Array[" << i << "]: " << array[i];             // <- Printa o array na posi��o i ->
        if(i==size-1)                                           // <- Se n�o for a ultima posi��o ->
            continue;                                           // <- ele printa uma tabula��o    ->
        else
            cout << "\t";
    }
    cout << endl;
}

int main()
{
    const int SIZE = 10;                                             // <- Declara��o de constante para tamanho do array      ->
    int guesses[SIZE];                                               // <- Declara��o de um array                             ->
    int cont = 0;

    for(int i=0;i<SIZE;i++)                                          // <- Leitura de dados para o array                      ->
    {
        cout << "Array[" << i << "]: ";
        if(cin >> guesses[i])                                        // <- Se o dado for invalido ele n�o le                  ->
        {
            cont++;
        }
        else
        {
            break;
        }
    }

    //print_array(guesses,sizeof(guesses)/sizeof(int));             // <- Chamada da fun��o para printar o array             ->
                                                                    // <- sizeof retorna o tamanho do que � passado em bytes ->
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
using std::vector;                              // <- Permite usar a classe de vectores no espa�o std ->

void print_vector(vector<int> &data)            // <- Passa o vetor como refer�ncia por meio do &     ->
{
    for(unsigned int i=0;i<data.size();i++)     // <- Percorre o vetor ate o tamanho dele             ->
        cout << data[i] << " ";
}

int main()
{
    vector<int> data = {5,10,20};               // <- Declara��o do vetor                             ->
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
    std::ofstream file ("teste.txt", std::ios::app);            // <- Abre o arquivo para inser��o de informa��o   ->
    if(!file.is_open())                                    // <- Confere se o arquivo foi aberto corretamente ->
        cout << "O arquivo nao foi aberto com sucesso!";
    for(string name : names)
        file << name << std::endl;                         // <- Imprimi as informa��es no arquivo texto      ->
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
{                                                             // <- n�o seja modificado                        ->
    for(int i=0;i<data_size;i++)
    {
        //data[i]++;                                          // <- const n�o permite que isso ocorra          ->
        cout << data[i] << "\t";
    }
    cout << std::endl;
}

int main()
{                                                             // Arrays statico precisa de tamanho das colunas ->
    int notas[][3] = {{30,20,10}, {10,20,30}};                // <- Declara��o de array bidimensional          ->
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
/// ************************************************* REFER�NCIA ************************************************************ ///
/*
#include <iostream>

using std::cout;

void troca(int &a, int &b)                                                             // <- Passando os par�metros como ref�ncia ->
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

struct Retangulo                                    // <- Structs s�o "tipos" de vari�vel definido pelo programador ->
{                                                   // <- S�o vari�veis compostas e podem possuir quantas outras    ->
    float b;                                        // <- vari�veis necess�rio                                      ->
    float h;
};

float area(float l)                                 // <- Primeira defini��o da fun�ao area, que recebe apenas 1    ->
{                                                   // <- par�metro.                                                ->
    return l*l;
}

float area(float b, float h)                        // <- Segunda defini��o da fun��o area, que recebe mais de 1    ->
{                                                   // <- par�metro. Para ser definida outra fun��o com mesmo nome, ->
    return b*h;                                     // <- � necess�rio possuir par�metros diferentes.               ->
}

float area(Retangulo r)                             // <- Terceira defini��o da fun��o area, que recebe uma struct  ->
{                                                   // <- Retangulo como par�metro.                                 ->
    return r.b*r.h;
}

int power(int base, int pow=0)                      // <- Define-se par�metros com valores padr�o para caso n�o se  ->
{                                                   // <- passe um argumento para a fun��o, ele possuir� aquele     ->
    int total = 1;                                  // <- valor padr�o.                                             ->
    if(pow==0)
        return total;
    for(int i=1;i<pow;i++)                          // <- Sempre priorize usar par�metros com valores padr�o do que ->
        total*=i;                                   // <- repetir fun��es com par�metros diferentes.                ->
    return total;
}

int main()
{
    cout << power(2) << "\n";          // <- Como � chamado power sem passar o segundo argumento, ele valer� 2 por padr�o. ->
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
    std::cout << power(2) << "\n";          // <- Como � chamado power sem passar o segundo argumento, ele valer� 2 por padr�o. ->
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
#include <iostream> // biblioteca padr�o
#include <fstream>  // biblioteca para arquivos texto
#include <vector>   // biblioteca para vetores
#include <cstdlib>  // biblioteca de n�meros aleat�rios
#include <ctime>    // biblioteca de tempo


using std::cout;    // Uso da fun��o cout do espa�o std.
using std::cin;     // Uso da fun��o cin  do espa�o std.
using std::endl;    // Uso da fun�ao endl do espa�o std.


void game_start();  // Declara��o da fun��o de in�cio do jogo.

void print_guesses(std::vector <int> array);    // Declara��o da fun��o de printar o vetor de tentativas.

bool guess_check(std::vector <int> array, int); // Declara��o da fun��o de verifica��o de tentativa.

void record(int);   // Declara��o da fun��o para leitura do arquivo texto de record.

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

void print_guesses(std::vector <int> array) // Fun��o que recebe vetor como par�metro, e imprime ele.
{
    cout << "Suas tentativas foram: ";

    for(unsigned int i=0;i<array.size();i++)    // Loop para impress�o na tela.
    {
        cout << array[i];
        if(i==array.size()-1)                   // Confere se n�o � o �ltimo, para imprimir " - ".
            continue;
        else
            cout << " - ";
    }
    cout << endl;
}

bool guess_check(std::vector <int> array, int guess)    // Fun��o para conferir o chute. Recebe o array de tentativas
{                                                       // e a tentativa.
    bool check = true;
    for(unsigned int i=0;i<array.size();i++)            // Percore o vetor de tentativas.
    {
        if(array[i]==guess)                             // Se a tentativa existe no guess, retorna falso.
        {                                               // Sen�o permanece como true.
            check = false;
            break;
        }
    }
    return check;
}

void game_start()   // Fun��o para in�cio do jogo.
{
    std::vector <int> guesses;  //  Declarando o vetor de tentativas.

    cout << "OK, entao vamos jogar!" << endl << endl;
    int random = rand() % 251;                          // Gera um n�mero aleat�rio entre 0 e 251.
    cout << random << endl;
    cout << "Adivinha o numero: ";
    while(true)                                         // La�o infinito que s� termina em determinada condi��o.
    {
        int guess;
        cin >> guess;
        if(guess_check(guesses,guess))                  // Confere se a tentativa ja foi feita, se n�o foi, empilha no vetor.
            guesses.push_back(guess);

        if(guess==random)                               // Confere se a tentativa � igual ao n�mero gerado.
        {
            cout << "OK, voce ganhou!" << endl;
            break;                                      // Se for igual, quebra o la�o infinito.
        }
        else if(guess < random)                         // Se a tentativa for menor, avisa que o n�mero � maior.
        {
            cout << "Voce errou! Eh maior..." << endl;
        }
        else if(guess > random)                         // Se a tentativa for maior, avisa que o n�mero � menor.
        {
           cout << "Voce errou! Eh menor..." << endl;
        }
    }

    record((int)guesses.size());                        // Ap�s o jogo, confere se o n�mero de tentativas bate o record.

    print_guesses(guesses);                             // Imprimi o vetor de tentativas.
}

void record(int guess_count)
{
    std::ifstream input("records.txt");                 // Abre o arquivo para leitura do record.
    if(!input.is_open())
    {
        cout << "Erro ao abrir o arquivo!" << endl;     // Confere se foi poss�vel abrir o arquivo.
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
{                                                           // <- que deseja dar ao espa�o. As fun��es pertencentes ->
    void print_array(int array[], int size)                 // <- v�o dentro dos delimitadores '{' e '}'            ->
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

//using namespace utilidades;                               // <- Usando todas as fun�oes pertencentes ao namespace  ->
//using utilidades::print_array;                            // <- Usando fun��o espacifica do namespace              ->

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

    //print_array(guesses,cont);                                        // <- Se for declarado o uso dessa fun�ao do space no    ->
                                                                        // <- come�o do c�digo                                   ->
    utilidades::print_array(guesses,cont);                              // <- Chama a fun��o print_array do namespace utilidades ->
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
void trocar(T &a, T &b)             // <- na hora que os argumentos forem passados a uma fun��o. Serve para evitar        ->
{                                   // <- overloadings desnecess�rios                                                     ->
    T temp = a;
    a = b;
    b = temp;
}

template <typename T>               // <- Overloading de fun��es com template. Util na utiliza��o de arrays, pois n�o s�o ->
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

    trocar(a,b);                                                                      // <- � possivel chamar a mesma fun��o para tipos ->
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

    trocar(dois,tres,SIZE);                                                             // <- Os dois argumentos iniciais s�o os mesmos ->
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

struct User                                         // Classes s�o semelhantes a structs, mas por convens�o, structs s�o
{                                                   // utilizadas para grupos de dados pequenos. Struct tem dados publicos
    std::string first_name;                         // por padr�o, e para alterar basta adicionar 'private:' antes de
    std::string last_name;                          // qualquer dado ou fun��o novo.
    std::string get_status()                        // Dados privados apenas s�o acessados pela struct User, n�o podem ser
    {                                               // acessados diretamente por novas inst�ncias a partir dessa struct.
        return status;
    }
    private:
        std::string status = "Gold";
};

int main()
{
    User user;                                              // Inst�ncia uma nova struct do tipo User
    user.first_name = "Willian";                            // Utiliza o '.' para acessar os campos dessa struct
    user.last_name = "Ayres";
    std::cout << "First name: " << user.first_name << "\n";
    std::cout << "Last name: " << user.last_name << "\n";
    std::cout << "Status: " << user.get_status() << "\n";   // Recupera o dado privado utilizando a fun��o de acesso a esse dado
    return 0;
}
*/
/// **************************************************** OOP CLASSES *************************************************************** ///
/*
#include <iostream>
#include <vector>

class User                                  // Semelhantes a structs, porem seus dados s�o privados por padr�o. Para permitir acesso
{                                           // de dados por objetos instanciados, precisa-se tornar o dado como p�blico.
    std::string status = "Gold";
    public:
        std::string first_name;
        std::string last_name;
        std::string get_status()
        {
            return status;
        }
};

int add_user(std::vector<User> &users, User user)           // � passado como parametro um vetor por referencia do tipo User
{                                                           // e um User no qual deseja verificar se pode ser inserido.
    for(unsigned int i=0;i<users.size();i++)                // Percorre o vetor de usu�rios
    {
        if(users[i].first_name==user.first_name &&          // Compara se o first_name da posi��o i � igual ao first_name do user
           users[i].last_name==user.last_name)              // Compara se o last_name da posi��o i � igual ao last_name do user
            return i;                                       // Se for igual ele retorna a posi��o daquela usu�rio no vetor
    }
    users.push_back(user);
    return users.size()-1;                                  // sen�o adiciona ele no final do vetor e retorna a posi��o final do vetor
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
    user.first_name = "Willian";                                // Como no caso esse user � o mesmo que o user1
    user.last_name = "Ayres";

    std::cout << add_user(users,user) << "\n";                  // Deve printar o valor 0 na tela, referente a posi��o do user1 no vetor

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
        User()                                              // Constructor � o metodo que sempre � chamado quando instancia-se um novo
        {                                                   // Objeto. O nome do m�todo � o mesmo da classe.
            std::cout << "Constructor" << "\n";
        }
        User(std::string first_name, std::string last_name) // Pode se fazer um constructor com par�metros.
        {
            this->first_name = first_name;                  // Usa-se o 'this->' para acessar � variavel da classe, e atribuir a ela
            this->last_name = last_name;                    // os argumentos passados ao m�todo constructor.
        }
        ~User()                                             // O m�todo destructor sempre � chamado, ao final de uma aplica��o, para
        {                                                   // todo objeto instanciado a partir dessa classe.
            std::cout << "Destructor" << "\n";
        }
};

int main()
{
    User me;                                                // Utiliza o metodo constructor padr�o.
    User user1("Willian","Ayres");                          // M�todo construct personalizado.
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
        {                                                           // Como status � privado, utiliza-se  o m�todo get_status para
            return status;                                          // recurperar esse valor por meio do return status.
        }
        void set_status(std::string status)                         // Utiliza-se setters para atribuir valores privados da classe.
        {                                                           // Como status � privado, utiliza-se o m�todo set_status para
            if(status=="Gold"||status=="Silver"||status=="Bronze")  // atribuir um valor especifico. Caso n�o seja um valor v�lido,
                this->status = status;                              // � atribuido o valor de nenhum status.
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

    static int user_count;                              // Vari�vel est�tica pertencente a classe. Apenas aponta que ela existe.
                                                        // Para come�ar a trabalhar com ela, precisa-se instancia-la fora da classe.
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


int User::user_count = 0;                                       // Quando � criado uma classe, ela n�o ocupado m�moria, por isso,
                                                                // instancia-se uma vari�vel est�tica para que ocupe o espa�o e possa
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
        bool operator == (Position pos)     // Retorna verdadeiro ou falso para o operador de compara��o
        {
            if(x == pos.x && y == pos.y)    // Se o x e o y do comparado for igual ao recebido, retorna true
                return true;
            return false;                   // Senao, por padrao, retorn falso.
        }
};

std::ostream& operator << (std::ostream& output, const Position pos)      // Alterando operador de saida. Usa-se '&' para alterar o valor
{                                                                         // do m�todo. Const na pos para nao ter problemas de altera��o
    output << "Pos.x: " << pos.x << "  Pos.y: " << pos.y << ".\n";        // da mesma.
    return output;
}

std::istream& operator >> (std::istream& input, Position &pos)            // Alterando o operador de entrada. Usa-se o '&' para alterar o valor
{                                                                         // do m�todo. '&' no pos para alterar os valores originais com m�todo
    input >> pos.x >> pos.y;                                              // de entrada.
    return input;
}

int main()
{
    Position pos1, pos2, pos4;
    Position pos3 = pos1 + pos2;                     // Como o operador foi definido, � possivel fazer a opera��o.
    std::cout << "Pos3.x = " << pos3.x;
    std::cout << "\nPos3.y = " << pos3.y << "\n";
    if(pos1==pos2)                                   // Como o operador foi definido, � possivel fazer a opera��o.
        std::cout << "Pos1 e Pos2 sao iguais!!!\n";
    std::cin >> pos4;                                // Como o operador foi definido, � possivel fazer a opera��o.
    std::cout << pos4;                               // Como o operador foi definido, � possivel fazer a opera��o.
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
        friend void output_status(User user);                                       // Declara��o das fun��es � feita dentro da classe.
        friend std::ostream& operator << (std::ostream& output, const User user);   // Como � do tipo friend, da liberdade para acesso
        friend std::istream& operator >> (std::istream& input, User &user);         // a vari�veis privadas.
};

void output_status(User user)                                                       // Como � feita fora da classe, tem acesso a variavel
{                                                                                   // privada livremente.
    std::cout << user.status;
}

std::ostream& operator << (std::ostream& output, const User user)                   // Implementa��o da friend function da classe
{
    output << "First Name: " << user.first_name << "  Last Name: " << user.last_name << "  Status: " << user.status << ".\n";
    return output;
}

std::istream& operator >> (std::istream& input, User &user)                         // Implementa��o da friend function da classe
{
    input >> user.first_name >> user.last_name;
    return input;
}

int main()
{
    User user("Willian","Ayres");
    output_status(user);
    std::cout << "\n" << user;                     // Pode-se usar diretamente o operador por ja haver a declara��o
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
    Teacher teacher;                // Como Teacher herda a classe User, ambos os m�todos construtores ser�o chamados aqui.
    teacher.output();
    return 0;
}

