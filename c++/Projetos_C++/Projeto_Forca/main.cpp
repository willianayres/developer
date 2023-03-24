#include <locale.h>
#include <stdlib.h>
#include <windows.h>
#include "functions.h"

// Main function. //
int main()
{
    int w=0,h=0;
    // Check the size of the screen. //
    getScreenResolution(w,h);
    // Set the language to accept accentuation. //
    setlocale(LC_ALL,"Portuguese");
    // Set the title of the console. //
    system("title Forca");
    // Set the console size. //
    system("mode con:cols=125 lines=30");
    // Centralize the console on the screen. //
    HWND consoleWindow=GetConsoleWindow();
	SetWindowPos(consoleWindow,0,w/2-500,h/2-200,0,0,SWP_NOSIZE|SWP_NOZORDER);
    // Menu function. //
    menu();
    // Pattern return. //
    return 0;
}
// -------------- //

