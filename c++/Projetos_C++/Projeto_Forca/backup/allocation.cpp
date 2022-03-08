#include <iostream>
#include "allocation.h"

bool checkEspaceM(char** n)
{
    if(n==NULL)
    {
        std::cout << "\n\nNOT ENOUGHT MEMORY!\n\n";
        return false;
    }
    else
        return true;
}

bool checkEspaceS(char* n)
{
    if(n==NULL)
    {
        std::cout << "\n\nNOT ENOUGHT MEMORY!\n\n";
        return false;
    }
    else
        return true;
}

bool parameterCheck(int row=1,int col=1)
{
    if(row<1||col<1)
    {
        std::cout << "\n\nERRO! INCORRECT PARAMETERS.\n\n";
        return false;
    }
    else
        return true;
}

char* allocS(int tam)
{
    char* p=(char*)calloc(tam,sizeof(char));
    if(!checkEspaceS(p))
        return(NULL);
    return p;
}

char** allocM(int row,int col)
{
    if(!parameterCheck(row,col))
        return(NULL);
    char** matrix=(char**)malloc(row*sizeof(char*));
    if(!checkEspaceM(matrix))
        return(NULL);
    for(int i=0;i<row;i++)
    {
        matrix[i]=allocS(col);
        if(!checkEspaceS(matrix[i]))
            return(NULL);
    }
    return matrix;
}

void freeString(char* str)
{
    free(str);
}

void freeMatrix(char** matrix,int row,int col)
{
    if(!parameterCheck(row,col)||matrix==NULL)
        return;
    for(int i=0;i<row;i++)
        free(matrix[i]);
    free(matrix);
}

