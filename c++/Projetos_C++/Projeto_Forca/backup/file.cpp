#include <iostream>
#include <stdio.h>
#include <string.h>
#include "file.h"

FILE* openFile(char* path,char* to)
{
    FILE* file=fopen(path,to);
    if(!strcmp(to,"r"))
    {
        if(file==NULL)
        {
            std::cout << "\n\nERRO AO ABRIR O ARQUIVO: " << path << "\n\n";
            exit(1);
        }
    }
    return file;
}

void closeFile(FILE* file)
{
    fclose(file);
}

void clearFile(char* path)
{
    FILE* file=openFile(path,"w+");
    closeFile(file);
}

