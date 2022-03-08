#include <iostream>
#include <string.h>
#include "prints.h"

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

// Function to print the typed word. //
void printTypeWord(Database* database)
{
    int n=strlen(database->sortWord);
    std::cout << "\n     " << n << " letras \n\n   ";
    for(int i=0;i<n;i++)
        std::cout << database->typeWord[i] << " ";
}
// --------------------------------- //

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
