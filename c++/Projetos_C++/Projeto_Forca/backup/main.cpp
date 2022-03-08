#include <iostream>
#include <string.h>
#include <stdio.h>
#include <locale.h>
#include <stdlib.h>
#include <time.h>
#include <conio.h>
#include <ctype.h>
#include "imprimi.h"
#include "verifica.h"
#include "palavras.h"
#include "menu.h"
#include "file.h"
#include "allocation.h"
#include "database.h"


int main()
{
    setlocale(LC_ALL,"Portuguese");
    system("title Forca");
    system("mode con:cols=100 lines=30");
    menu();
    system("pause");
    return 0;
}

// Function to execute the force game. //
void game()
{
    // Declare a database structure. //
    Database database;
    // Initialize the database. //
    initDatabase(&database);
    // Sort a line from the database to get a word. //
    int sortRow=sortInt(database.row);
    // Get the sort word from the database. //
    getSortWord(&database,sortRow);
    // Initialize the typed word string. //
    initTypeWord(&database);
    // Mistakes counter && Count the number of typed letters. //
    int mistake=0,lettersTypedCount=0;
    // Letter typed && String to save the letters that was typed. //
    char letter,lettersTyped[40];
    // Until the mistake count reach 6. //
    while(mistake<6)
    {
        system("cls");
        // Print the force on the screen. //
        printForce(mistake);
        // Print the count of letters that the sorted word has. //
        printTypeWord(&database);
        // Print which are the letters that was typed. //
        printTypedLetters(lettersTyped,lettersTypedCount);
        // Shows how many mistakes the player still has. //
        std::cout << "\n\n Tentativas restantes: " << (6-mistake) << "\n\n";
        std::cout << "\n\nDigite uma letra:      (Aperte 1 para sair)\n\n";
        std::cin >> letter;
        // Uppercase the letter. //
        letter=toupper(letter);
        // Check if the scape key was pressed. //
        if(letter=='1')
        {
            // Free the allocated space for the database. //
            freeMatrix(database.database,database.row,database.col);
            // Free the allocated space for the auxiliary strings. //
            freeString(database.sortWord);
            freeString(database.typeWord);
            exit(0);
        }
        // Check if the letter was not typed yet. //
        if(checkLetterOnWord(letter,lettersTyped))
        {
            std::cout << "Essa letra já foi digitada! Tente novamente!\n\n";
            system("pause");
        }
        else
        {
            // Put the typed letter on the string with the typed letters. //
            lettersTyped[lettersTypedCount]=letter;
            // Increment the number of valid letters typed. //
            lettersTypedCount++;
            // Check if the sorted word has the typed letter. //
            if(checkLetterOnWord(letter,database.sortWord))
                updateTypeWord(&database,letter);
            else
            {
                // If the sorted word does not have the typed letter, increment the mistakes. //
                std::cout << "\nA palavra não tem essa letra! Tente novamente\n\n";
                mistake++;
                system("pause");
            }
        }
        // If the number of mistakes is bigger than 5, the game is over. //
        if(mistake>=6)
        {
            system("cls");
            // Print the force for the last time on that game. //
            printForce(mistake);
            // Print the typed word for the last time on that game. //
            printTypeWord(&database);
            // Print the letters that was typed on the game. //
            printTypedLetters(lettersTyped,lettersTypedCount);
            std::cout << "\n\n  Infelizmente, você não acertou a palavra e suas tentativas acabaram!\n\n";
            system("pause");
            // Return to menu. //
            menu();
        }
        // Check if the typed word is fully typed. //
        if(checkTypeWord(&database))
        {
            system("cls");
            // Print the force for the last time on that game. //
            printForce(mistake);
            // Print the typed word for the last time on that game. //
            printTypeWord(&database);
            // Print the letters that was typed on the game. //
            printTypedLetters(lettersTyped,lettersTypedCount);
            std::cout << "\n\tPARABÉNS!!!\n\n Voce acertou a palavra!\n\n";
            system("pause");
            menu();
        }
    }
}
// ----------------------------------- //

// Function to print the typed word. //
void printTypeWord(Database* database)
{
    int n=strlen(database->sortWord);
    std::cout << "\n     " << n << " letras \n\n   ";
    for(int i=0;i<n;i++)
        std::cout << database->typeWord[i] << " ";
}
// --------------------------------- //

// Function to print the force. //
void printForce(int mistakes)
{
    switch(mistakes)
    {
    case 0:             // 0 mistakes.
        std::cout << " ______ \n |      \n |      \n |      \n";
        break;
    case 1:             // 1 mistakes.
        std::cout << " ______ \n |    O \n |      \n |      \n";
        break;
    case 2:             // 2 mistakes.
        std::cout << " ______ \n |    O \n |    | \n |      \n";
        break;
    case 3:             // 3 mistakes.
        std::cout << " ______ \n |    O \n |   /| \n |      \n";
        break;
    case 4:             // 4 mistakes.
        std::cout << " ______ \n |    O \n |   /|\\\n |      \n";
        break;
    case 5:             // 5 mistakes.
        std::cout << " ______ \n |    O \n |   /|\\\n |   /  \n";
        break;
    case 6:             // 6 mistakes.
        std::cout << " ______ \n |    O \n |   /|\\\n |   / \\\n";
        break;
    }
}
// ---------------------------- //

// Function to print the vector with the typed letters. //
void printTypedLetters(char* letters,int lettersSize)
{
    std::cout << "\n\n Letras digitadas: ";
    // Iterate the vector. //
    for(int i=0;i<lettersSize;i++)
        // Print the letter on the position i. //
        std::cout << letters[i] << ", ";
    std::cout << "\n\n";
}
// ---------------------------------------------------- //

// Function to check if the letter is on a word. //
bool checkLetterOnWord(char letter, char word[])
{
    // Iterate the word. //
    for(unsigned int i=0;i<strlen(word);i++)
    {
        // Return true if the letter i on the word is equal to the letter. //
        if(word[i]==letter)
            return true;
    }
    return false;
}
// --------------------------------------------- //

// Function to check if the typed word is complete. //
bool checkTypeWord(Database* database)
{
    // Iterate the typed word. //
    for(unsigned int i=0;i<strlen(database->sortWord);i++)
    {
        // If there is still empty spaces on the typed word, return false. //
        if(database->typeWord[i]=='_')
            return false;
    }
    return true;
}
// ------------------------------------------------ //

// Function to get the word from the database. //
void getSortWord(Database* database,int row)
{
    // Iterate the sorted word.
    for(int i=0;i<database->col;i++)
        // Copy the word from the database. //
        database->sortWord[i]=database->database[row][i];
}
// ------------------------------------------- //

// Function to initialize the typed word with '_' on all the spots. //
void initTypeWord(Database* database)
{
    // Iterate the sorted word. //
    for(unsigned int i=0;i<strlen(database->sortWord);i++)
        // Put '_' n times equals to the length of the sorted word. //
        database->typeWord[i]='_';
}
// ---------------------------------------------------------------- //

// Function to update the typed word. //
void updateTypeWord(Database* database,char letter)
{
    // Iterate the sorted word. //
    for(unsigned int i=0;i<strlen(database->sortWord);i++)
    {
        // If the typed letter exists on the sorted word. //
        if(database->sortWord[i]==letter)
            // Put the letter on the typed word. //
            database->typeWord[i]=letter;
    }
}
// ---------------------------------- //

// Function to sort a random integer. //
int sortInt(int word)
{
    // Timer. //
    srand(time(NULL));
    // Return a random value to chose a word. //
    return (rand() % word);
}
// ---------------------------------- //

// Function to open the menu. //
void menu()
{
    int op;
    // While the input is different from the options. //
    do
    {
        system("cls");
        // Print the menu options. //
        std::cout << "<<  Menu  Forca  >>\n\n";
        std::cout << "[1] Jogar\n\n";
        std::cout << "[2] Sair\n\n";
        std::cout << "Escolha uma opção >> ";
        // Clear the input buffer. //
        setbuf(stdin,NULL);
        // Read the option from the keyboard. //
        op=getch();
    }while(op!=49&&op!=50);
    // If the option is equal to 2, the program is finalized. //
    if(op==50)
        exit(0);
    // Else, the game will start. //
    else
        game();
}
// -------------------------- //

// Function to initialize the database. //
void initDatabase(Database* database)
{
    // Initialize the rows and cols with 0. //
    database->row=0;
    database->col=0;
    // Check the size of the database. //
    sizeDatabase(database);
    // Allocate the space in memory for the database. //
    database->database=allocM(database->row,database->col);
    // Allocate the space in memory for the typed word. //
    database->typeWord=allocS(database->col);
    // Allocate the space in memory for the sorted word. //
    database->sortWord=allocS(database->col);
    // Open the file to read. //
    FILE* file=openFile("database.txt","r");
    // Iterate the rows of the database. //
    for(int i=0;i<database->row;i++)
    {
        // Iterate the cols of the database. //
        for(int j=0;j<database->col;j++)
        {
            // Read the database from the file. //
            fscanf(file,"%c",&database->database[i][j]);
            // Put an end string character on each word from database. //
            if(database->database[i][j]=='\n')
            {
                database->database[i][j]='\0';
                break;
            }
        }
    }
    // Close the file. //
    closeFile(file);
}
// ------------------------------------ //

// Function to check the size of the database. //
void sizeDatabase(Database* database)
{
    // Open the file to read. //
    FILE* file=openFile("database.txt","r");
    char c;
    int aux=0;
    while(c!=EOF)
    {
        // If it's a break line, increment the number of rows. //
        if(c=='\n')
        {
            database->row++;
            // If the auxiliary is bigger than the number of columns. //
            if(aux>database->col)
                // The number of columns assume the value of the auxiliary. //
                database->col=aux;
            aux=0;
        }
        // If it's not a break line, increment the auxiliary variable. //
        else
            aux++;
        c=fgetc(file);
    }
    database->col++;
    closeFile(file);
}
// ------------------------------------------- //

