<?php
#Classe Node utilizada para mostrar os nós individuais da arvore binaria, onde cada nó contem 3 atributos - $data, $esquerda, $direita.


require_once 'ArvoreBinaria.php';
class Node
{
    public $data;
    public $esquerda;
    public $direita;

    public function __construct($data)
    {
        $this->data = $data;
        $this->direita = null;
        $this->esquerda = null;
    }
}