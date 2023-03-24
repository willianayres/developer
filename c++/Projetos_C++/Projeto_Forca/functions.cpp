#include <conio.h>
#include <ctype.h>
#include <iostream>
#include <string.h>
#include <windows.h>
#include "allocation.h"
#include "database.h"
#include "file.h"
#include "functions.h"
#include "prints.h"
#include "words.h"

// Get the screen resolution. //
void getScreenResolution(int& width,int& height)
{
   RECT desktop;
   // Get a handle to the desktop window
   const HWND hDesktop=GetDesktopWindow();
   // Get the size of screen to the variable desktop
   GetWindowRect(hDesktop, &desktop);
   // The top left corner will have coordinates (0,0)
   // and the bottom right corner will have coordinates
   // (horizontal, vertical)
   width=desktop.right;
   height=desktop.bottom;
}
// -------------------------- //

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
        std::cout << "[2] Cadastrar palavra\n\n";
        std::cout << "[3] Sair\n\n";
        std::cout << "Escolha uma opção >> ";
        // Clear the input buffer. //
        setbuf(stdin,NULL);
        // Read the option from the keyboard. //
        op=getch();
    }while(op!=49&&op!=50&&op!=51);
    // If the user press 1, the game will start. //
    if(op==49)
        game();
    // If the user press 2, you will send a new word to the database. //
    else if(op==50)
        checkPassword();
    // If the user press 3, the program will finalize. //
    else
    {
        std::cout << std::endl;
        exit(0);
    }
}
// -------------------------- //

// Function to check if the password is correct. //
void checkPassword()
{
    // Auxiliary to read the password from the keyboard. //
    char password[9];
    system("cls");
    // Print the information. //
    std::cout << " >> Antes de registrar nova palavra, insira a senha: \n\n";
    std::cout << " >> Password >> ";
    // Clear the buffer. //
    setbuf(stdin,NULL);
    // Read the password from keyboard. //
    std::cin >> password;
    // Put end character on the end of the password. //
    strcpy(password,endWord(password));
    int op;
    // Check if it's right. //
    if(!strcmp(password,"30112000"))
    {
        // Label for the goto. //
        database:
        do
        {
            system("cls");
            // Print the options. //
            std::cout << "<< Banco de Palavras >>\n\n[1] Ver banco\n\n[2] Inserir palavra\n\n[3] Voltar\n\n";
            std::cout << "Escolha uma opção >> ";
            // Clear the input buffer. //
            setbuf(stdin,NULL);
            // Read the option from keyboard. //
            op=getch();
        }while(op!=49&&op!=50&&op!=51);
        // If it's 1. //
        if(op==49)
        {
            // Print the database. //
            printDatabase();
            getch();
            goto database;
        }
        else if(op==50)
            // Call the function to read the new word for the database. //
            newWord();
        else if(op==51)
            // Go back to the menu. //
            menu();
    }
    else
    {
        // If it's wrong password. //
        std::cout << "\n\n Senha incorreta! Retornando ao menu!\n\n";
        getch();
        menu();
    }
}
// --------------------------------------------- //

// Function to read a new password for the database. //
void newWord()
{
    system("cls");
    // Print the information. //
    std::cout << "<<           Cadastrar nova palavra no banco!           >>\n\n";
    std::cout << "  >> Para cadastrar uma nova palavra, tenha em mente que:\n\n";
    std::cout << "  >> [1] A palavra não pode ter mais que 25 letras.\n\n";
    std::cout << "  >> [2] A palavra não pode possuir números.\n\n";
    std::cout << "  >> [3] A palavra não pode possuir espaços.\n\n";
    std::cout << "  >> [4] A palavra não pode possuir quebras de linha.\n\n";
    std::cout << "  >> Palavra >> ";
    // Variable to store the new word. //
    char word[26];
    // Clear the input buffer. //
    setbuf(stdin,NULL);
    // Read the word from the keyboard. //
    gets(word);
    // Put a end character on the end of the string. //
    strcpy(word,endWord(word));
    // Check the conditions for a valid word. //
    if(check1(word)&&check2(word))
    {
        // Uppercase all the letters from the word. //
        strcpy(word,toupperWord(word));
        // Check if the word does not exists on the database. //
        if(checkDatabase(word))
        {
            // Open the file to append. //
            FILE* file=openFile("database.txt","a");
            // Put the word on the database. //
            fprintf(file,"\n%s",word);
            // Close the file. //
            closeFile(file);
            std::cout << "\n  >> Palavra salva no banco com sucesso!\n\n  >> Retornando ao menu... ";
        }
        else
            std::cout << "\n  >> Essa palavra já existe no banco!\n\n  >> Retornando ao menu... ";
    }
    else
    {
        std::cout << "\n  >> A palavra não passou pelos requisitos!\n\n  >> Retornando ao menu... ";
    }
    // Pause the console. //
    getch();
    // Return to menu. //
    menu();
}
// ------------------------------------------------- //

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

