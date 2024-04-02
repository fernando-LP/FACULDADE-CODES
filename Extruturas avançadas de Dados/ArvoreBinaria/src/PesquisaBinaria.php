<?php

require_once 'Node.php';
require_once 'ArvoreBinaria.php';

class PesquisaBinaria extends ArvoreBinaria
{
    public function inserir($valorInserir)
    {
        $rasNoPai = null;
        $x = $this->root;
        while ($x !== null) {
            $rasNoPai = $x;
            if ($valorInserir < $x->data) {
                $x = $x->esquerda;  #Recebe valor a esquerda da arvore
            } else {
                $x = $x->direita; # Recebe valor a direita da arvore
            }
        }
        if ($rasNoPai === null) {
            $this->root = new Node($valorInserir);
        } elseif ($valorInserir < $rasNoPai->data) {
            $rasNoPai->esquerda = new Node($valorInserir);
        } else {
            $rasNoPai->direita = new Node($valorInserir);
        }
    }
}