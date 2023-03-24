#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include "file.h"

// Function to open a file that receives the file path and the way it will open. //
FILE* openFile(char* path,char* to)
{
    // Open the file. //
    FILE* file=fopen(path,to);
    // If it's for reading, check if it exists. //
    if(!strcmp(to,"r"))
    {
        if(file==NULL)
        {
            printf("\n\nERRO AO ABRIR O ARQUIVO: %s\n\n",path);
            exit(1);
        }
    }
    return file;
}
// ----------------------------------------------------------------------------- //

// Function to close a file. //
void closeFile(FILE* file)
{
    // Close the file. //
    fclose(file);
}
// ------------------------- //

// Function to clear a content of a file. //
void clearFile(char* path)
{
    // Open the file for overwriting. //
    FILE* file=openFile(path,"w+");
    closeFile(file);
}
// -------------------------------------- //

