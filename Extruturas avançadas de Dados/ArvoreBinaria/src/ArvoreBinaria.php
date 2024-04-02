<?php

require_once 'Node.php';
require_once 'PesquisaBinaria.php';

class ArvoreBinaria
{
    public $root; ## Armazena nó raiz
    public function __construct($data = null, $node = null)
    {
        if ($node) {
            $this->root = $node;
        } elseif ($data) {
            $node = new Node($data);
            $this->root = $node;
        } else {
            $this->root = null;
        }
    }

    public function inOrden($node = null)
    {
        if ($node === null){ ## Se o no chamado for null, entao atribui ao root da raiz
            $node = $this->root;
        }
        if ($node->esquerda !== null) {
            $this->inOrden($node->esquerda); #Recursividade
        }
        echo $node->data . " ";
        if ($node->direita !== null) {
            $this->inOrden($node->direita); #Recursividade
        }
    }
    public function preOrdem($node)
    {
        if ($node != null) {
            echo $node->data . " ";
            $this->preOrdem($node->esquerda);
            $this->preOrdem($node->direita);
        }
    }
    function posOrdem($node)
    {
        if ($node != null) {
            $this->posOrdem($node->esquerda);
            $this->posOrdem($node->direita);
            echo $node->data . " ";
        }
    }
    function minValor($node = null)
    {
        if ($node === null) {
            $node = $this->root;
        }
        while ($node->esquerda !== null) { ##Pesquisa sempre pelo valor a esquerda
            $node = $node->esquerda;
        }
        return $node->data; #Retorna o ultimo valor a esquerda.
    }
    function maxVAlor($node = null)
    {
        if ($node === null) {
            $node = $this->root;
        }
        while ($node->direita !== null) {
            $node = $node->direita;
        }
        return $node->data;
    }
    function altura($node = null)
    {
        if ($node === null) {
            $node = $this->root;
        }
        $alesquerda = 0;
        $aldireita = 0;
        if ($node->esquerda !== null) {
            $alesquerda = $this->altura($node->esquerda);
        }
        if ($node->direita !== null) {
            $aldireita = $this->altura($node->direita);
        }
        if ($aldireita > $alesquerda) {
            return $aldireita + 1;
        }
        return $alesquerda + 1;
    }
    function removerNo($valorDel, $node=null) {
        if ($node === null) {
            $node = $this->root;
        }
        if ($node === null) {
            return $node;
        }
        if ($valorDel < $node->data) {
            $node->esquerda = $this->removerNo($valorDel, $node->esquerda);
        } elseif ($valorDel > $node->data) {
            $node->direita = $this->removerNo($valorDel, $node->direita);
        } else {
            if ($node->esquerda === null) {
                return $node->direita;
            } elseif ($node->direita === null) {
                return $node->esquerda;
            } else {
                // Substituto é o sucessor do valor a ser removido
                $substitui = $this->minValor($node->direita);
                // Ao invés de trocar a posição dos nós, troca o valor
                $node->data = $substitui;
                // Depois, removerNo o substituto da subárvore à direita
                $node->direita = $this->removerNo($substitui, $node->direita);
            }
        }
        return $node;
    }
    function contaFolhas($node = null)
    {
        if ($node === null) {
            return 0;
        } elseif ($node->esquerda === null && $node->direita === null) {
            return 1;
        } else {
            return $this->contaFolhas($node->esquerda) + $this->contaFolhas($node->direita);
        }
    }
    function contaNo($node = null)
    {
        if ($node === null) {
            return 0;
        }
        // Continua a contagem dos nós na árvore binária
        return 1 + $this->contaNo($node->esquerda) + $this->contaNo($node->direita);
    }
    function buscarNo($valorBuscar, $node=null, $pai=null)
    {
        if ($node === null) {
            return null;
        }
        if ($valorBuscar == $node->data) { // Valor encontrado
            return ["no" => $node, "pai" => $pai];
        } elseif ($valorBuscar < $node->data) {
            return $this->buscarNo($valorBuscar, $node->esquerda, $node);// Aqui o nó atual é passado como o pai na chamada recursiva à esquerda
        } else {
            return $this->buscarNo($valorBuscar, $node->direita, $node);// Aqui o nó atual é passado como o pai na chamada recursiva à direita
        }
    }

/*    function contaSubArvores($node = null)
    {
        if ($node === null) {
            return 0;
        } else {
            return 1 + $this->contaSubArvores($node->esquerda) + $this->contaSubArvores($node->esquerda);
        }
    }*/
}