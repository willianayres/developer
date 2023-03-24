#include <iostream>
#include "allocation.h"

// Function to check if there's enough memory to allocate a character matrix. //
bool checkEspaceM(char** n)
{
    // Check if the pointer point to a NULL address. //
    if(n==NULL)
    {
        std::cout << "\n\nNOT ENOUGHT MEMORY!\n\n";
        return false;
    }
    else
        return true;
}
// -------------------------------------------------------------------------- //

// Function to check if there's enough memory to allocate a string. //
bool checkEspaceS(char* n)
{
    // Check if the pointer point to a NULL address. //
    if(n==NULL)
    {
        std::cout << "\n\nNOT ENOUGHT MEMORY!\n\n";
        return false;
    }
    else
        return true;
}
// ---------------------------------------------------------------- //

// Function to check if the parameters are valid. //
bool parameterCheck(int row=1,int col=1)
{
    // Check if the parameters are lower than 0. //
    if(row<1||col<1)
    {
        std::cout << "\n\nERRO! INCORRECT PARAMETERS.\n\n";
        return false;
    }
    else
        return true;
}
// ---------------------------------------------- //

// Function to allocate the memory to a string. //
char* allocS(int tam)
{
    // Allocate space for a a pointer to a string. //
    char* p=(char*)calloc(tam,sizeof(char));
    // Check if there is space to allocate. //
    if(!checkEspaceS(p))
        return(NULL);
    return p;
}
// -------------------------------------------- //

// Function to allocate the memory to a string matrix. //
char** allocM(int row,int col)
{
    // Check if the parameters are valid. //
    if(!parameterCheck(row,col))
        return(NULL);
    // Allocate row pointers for the matrix. //
    char** matrix=(char**)malloc(row*sizeof(char*));
    // Check if there is space to allocate. //
    if(!checkEspaceM(matrix))
        return(NULL);
    // Iterate the row pointers. //
    for(int i=0;i<row;i++)
    {
        // Allocate columns pointer for each row pointer. //
        matrix[i]=allocS(col);
        // Check if there is space to allocate. //
        if(!checkEspaceS(matrix[i]))
            return(NULL);
    }
    return matrix;
}
// --------------------------------------------------- //

// Function to deallocate the space of a string. //
void freeString(char* str)
{
    // Deallocate the string. //
    free(str);
}
// --------------------------------------------- //

// Function to deallocate the space of a string matrix. //
void freeMatrix(char** matrix,int row,int col)
{
    // Check if the parameters are valid or the matrix is not NULL yet. //
    if(!parameterCheck(row,col)||matrix==NULL)
        return;
    // Iterate the matrix pointer. //
    for(int i=0;i<row;i++)
        // Deallocate each column pointer of the matrix. //
        free(matrix[i]);
    // Deallocate the row pointer of the matrix. //
    free(matrix);
}
// ---------------------------------------------------- //

