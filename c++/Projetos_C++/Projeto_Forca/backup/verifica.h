#ifndef VERIFICA_H_INCLUDED
#define VERIFICA_H_INCLUDED

#include "database.h"

// Function to check if the letter is on a word. //
bool checkLetterOnWord(char letra, char vetor[]);

// Function to check if the typed word is complete. //
bool checkTypeWord(Database*);

// Function to check the size of the database. //
void sizeDatabase(Database*);

#endif // VERIFICA_H_INCLUDED
