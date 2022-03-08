#ifndef DATABASE_H_INCLUDED
#define DATABASE_H_INCLUDED

// Structure for the database. //
typedef struct
{
    int row;            // Rows. //
    int col;            // Cols. //
    char* sortWord;     // Sorted Word. //
    char* typeWord;     // Typed Word. //
    char** database;    // Matrix for database. //
}Database;

// Function to initialize the database. //
void initDatabase(Database*);

// Function to check the size of the database. //
void sizeDatabase(Database*);

// Return a random value to chose a word. //
int sortInt(int);

// Function to read and print the database. //
void printDatabase();

// Check if a the database has a specific word. //
bool checkDatabase(char* word);

#endif // DATABASE_H_INCLUDED
