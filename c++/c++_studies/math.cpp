#include "math.h"


float area(float l)
{
    return l*l;
}

float area(float b, float h)
{
    return b*h;
}

float area(Retangulo r)
{
    return r.b*r.h;
}

int power(int base, int pow)
{
    int total = 1;
    if(pow==0)
    {
        return total;
    }
    else
    {
        total = base;
        for(int i=1;i<pow;i++)
            total *= base;
        return total;
    }
}
