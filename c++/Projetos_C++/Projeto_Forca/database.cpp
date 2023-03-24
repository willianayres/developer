#include <iostream>
#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <time.h>
#include "allocation.h"
#include "database.h"
#include "file.h"

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

// Function to sort a random integer. //
int sortInt(int word)
{
    // Timer. //
    srand(time(NULL));
    // Return a random value to chose a word. //
    return (rand() % word);
}
// ---------------------------------- //

// Function to read and print the database. //
void printDatabase()
{
    // Open the database to read. //
    FILE* file=openFile("database.txt","r");
    // Auxiliary variables. //
    char c,read[26];
    int n,rows=0;
    system("cls");
    std::cout << "<< Banco de Palavras >>\n\n";
    // Read the file until the end. //
    while(c!=EOF)
    {
        // Count the break lines. //
        if(c=='\n')
            rows++;
        // If there was 5 break lines. //
        if(rows==5)
        {
            std::cout << "\n";
            rows=0;
        }
        // Read the word. //
        fscanf(file,"%s",read);
        // Print the word formated. //
        printf("%-25s",read);
        // If it was not 5 break lines. //
        if(rows!=5)
            std::cout << " ";
        // Read the letter from the file. //
        c=fgetc(file);
    }
    // Close the file. //
    closeFile(file);
    std::cout << "\n\n >> Voltar >> ";
}
// ---------------------------------------- //

// Check if a the database has a specific word. //
bool checkDatabase(char* word)
{
    // Auxiliary string and character. //
    char ch,str[31];
    // Open the file for reading. //
    FILE* file=openFile("database.txt","r");
    // Read the file until the end. //
    while(ch!=EOF)
    {
        // Read the word from the database. //
        fscanf(file,"%s",str);
        // If the word are the same. //
        if(!strcmp(word,str))
            // Change the return. //
            return false;
        // Update the character for reading. //
        ch=fgetc(file);
    }
    // Close the file. //
    closeFile(file);
    // Pattern return. //
    return true;
}
// -------------------------------------------- //

