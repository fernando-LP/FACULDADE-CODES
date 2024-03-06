
#include <iostream>
#include <bits/stdc++.h>
using namespace std;

class No {
    public:
    int valor;
    // Temos nó raiz, apontando para esquerda e direita;
    No *esquerda, *direita;
    No(int valor){
        this->valor = valor;
        esquerda = NULL;
        direita = NULL;
    }
}
//Classe gerenciar arvore
class Arvore {
    public:
    No *root;
    Arvore() {
        root = NULL;
    }
}

int altura(No* root) {
    if (root == NULL)
        return 0;
    return max(altura(root>esquerda), altura(root->direita)); //Recursividade
}

int main()
{
    Arvore minhaArvore;
    minhaArvore.root = new No(1);
    minhaArvore.root->esquerda = new No(2);
    minhaArvore.root->direita = new No(3);
    minhaArvore.root->direita = new No(3);
    minhaArvore.root->esquerda->esquerda = new No(4);
    minhaArvore.root->esquerda->direita = new No(5);
    minhaArvore.root->direita->esquerda = new No(6);
    minhaArvore.root->direita->direita = new No(7);  
}
