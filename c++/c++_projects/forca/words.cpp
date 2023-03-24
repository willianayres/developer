#include <ctype.h>
#include <string.h>
#include "words.h"

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

// Function to put a end string character on the word. //
char* endWord(char* word)
{
    // Iterate the word. //
    for(unsigned int i=0;i<strlen(word);i++)
    {
        // If there is a break line on the word. //
        if(word[i]=='\n')
            // Put a end string character. //
            word[i]='\0';
    }
    // Return the new word. //
    return word;
}
// ----------------------------------------------------- //

// Function to uppercase all the letters from the word. //
char* toupperWord(char* word)
{
    // Iterate the word. //
    for(int i=0;word[i]!='\0';i++)
        // Uppercase all the letters. //
        word[i]=toupper(word[i]);
    // Return the new word. //
    return word;
}
// ---------------------------------------------------- //

// Check if there is a number on the string. //
bool check1(char* word)
{
    // Auxiliary number string. //
    char aux[]="0123456789";
    // Iterate the word. //
    for(int i=0;word[i]!='\0';i++)
    {
        // Iterate the auxiliary. //
        for(int j=0;aux[j]!='\0';j++)
        {
            // If the letter are the same in both strings. //
            if(word[i]==aux[j])
                // Change the return. //
                return false;
        }
    }
    // Pattern return. //
    return true;
}
// ----------------------------------------- //

// Check if there is a gap on the string. //
bool check2(char* word)
{
    // Iterate the word. //
    for(int i=0;word[i]!='\0';i++)
    {
        // If it's a gap on the word. //
        if(word[i]==' ')
            // Change the return. //
            return false;
    }
    // Pattern return. //
    return true;
}
// -------------------------------------- //

