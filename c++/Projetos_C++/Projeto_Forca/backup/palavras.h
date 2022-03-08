#ifndef PALAVRAS_H_INCLUDED
#define PALAVRAS_H_INCLUDED

#include "database.h"

// Function to get the word from the database. //
void getSortWord(Database*,int);

// Function to initialize the typed word with '_' on all the spots. //
void initTypeWord(Database*);

// Function to update the typed word. //
void updateTypeWord(Database*,char);

// Function to initialize the database. //
void  initDatabase(Database*);

#endif // PALAVRAS_H_INCLUDED
