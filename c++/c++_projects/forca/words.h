#ifndef WORDS_H_INCLUDED
#define WORDS_H_INCLUDED

#include "database.h"

// Function to get the word from the database. //
void getSortWord(Database*,int);

// Function to initialize the typed word with '_' on all the spots. //
void initTypeWord(Database*);

// Function to update the typed word. //
void updateTypeWord(Database*,char);

// Function to check if the typed word is complete. //
bool checkTypeWord(Database*);

// Function to check if the letter is on a word. //
bool checkLetterOnWord(char letra, char vetor[]);

// Function to put a end string character on the string. //
char* endWord(char*);

// Function to uppercase all the letters from the word. //
char* toupperWord(char* word);

// Check if there is a number on the string. //
bool check1(char*);

// Check if there is a gap on the string. //
bool check2(char*);

#endif // WORDS_H_INCLUDED
