<?php

// Definição da estrutura do nó da árvore
class Node {
    public $data; // Armazena valor do nó
    public $left; // Esquerda
    public $right; // Direita

    // Inicia os valores passados pelo nó pelo __construct
    public function __construct($data) {
        $this->data = $data;
        $this->left = null;
        $this->right = null;
    }
}

// Implementação de uma Árvore Binária
class BinaryTree {
    public $root;

    // Construtor
    function __construct($data = null, $node = null) {
        if ($node) {
            $this->root = $node;
        } elseif ($data) {
            $node = new Node($data);
            $this->root = $node;
        } else {
            $this->root = null;
        }
    }

    // Percurso em ordem (inorder traversal)
    function inorderTraversal($node = null) {
        if ($node === null) {
            $node = $this->root;
        }
        if ($node->left !== null) {
            $this->inorderTraversal($node->left);
        }
        echo $node->data . " ";
        if ($node->right !== null) {
            $this->inorderTraversal($node->right);
        }
    }

    // Percurso em pré-ordem (preorder traversal)
    function preOrder($node) {
        if ($node != null) {
            echo $node->data . " ";
            $this->preOrder($node->left);
            $this->preOrder($node->right);
        }
    }

    // Percurso em pós-ordem (postorder traversal)
    function postOrder($node) {
        if ($node != null) {
            $this->postOrder($node->left);
            $this->postOrder($node->right);
            echo $node->data . " ";
        }
    }

    // Retorna o valor mínimo na árvore
    function minValue($node = null) {
        if ($node === null) {
            $node = $this->root;
        }
        while ($node->left !== null) {
            $node = $node->left;
        }
        return $node->data;
    }

    // Retorna o valor máximo na árvore
    function maxValue($node = null) {
        if ($node === null) {
            $node = $this->root;
        }
        while ($node->right !== null) {
            $node = $node->right;
        }
        return $node->data;
    }
}

// Implementação de uma Árvore Binária de Busca (Binary Search Tree - BST)
class BinarySearchTree extends BinaryTree {

    // Método para inserir um valor na árvore de busca binária
    function insert($value) {
        $parent = null;
        $x = $this->root;
        while ($x !== null) {
            $parent = $x;
            if ($value < $x->data) {
                $x = $x->left;
            } else {
                $x = $x->right;
            }
        }
        if ($parent === null) {
            $this->root = new Node($value);
        } elseif ($value < $parent->data) {
            $parent->left = new Node($value);
        } else {
            $parent->right = new Node($value);
        }
    }

    // Método para pesquisar um valor na árvore de busca binária
    function search($value) {
        return $this->_search($value, $this->root);
    }

    // Método auxiliar para pesquisa
    function _search($value, $node) {
        if ($node === null) {
            return $node;
        }
        if ($node->data === $value) {
            return new BinarySearchTree($node);
        }
        if ($value < $node->data) {
            return $this->_search($value, $node->left);
        }
        return $this->_search($value, $node->right);
    }

    // Retorna o valor mínimo na árvore de busca binária
    function minValue($node = null) {
        if ($node === null) {
            $node = $this->root;
        }
        while ($node->left !== null) {
            $node = $node->left;
        }
        return $node->data;
    }

    // Retorna o valor máximo na árvore de busca binária
    function maxValue($node = null) {
        if ($node === null) {
            $node = $this->root;
        }
        while ($node->right !== null) {
            $node = $node->right;
        }
        return $node->data;
    }

    function remove($value, $node=null) {
        if ($node === null) {
            $node = $this->root;
        }
        if ($node === null) {
            return $node;
        }
        if ($value < $node->data) {
            $node->left = $this->remove($value, $node->left);
        } elseif ($value > $node->data) {
            $node->right = $this->remove($value, $node->right);
        } else {
            if ($node->left === null) {
                return $node->right;
            } elseif ($node->right === null) {
                return $node->left;
            } else {
                // Substituto é o sucessor do valor a ser removido
                $substitute = $this->min($node->right);
                // Ao invés de trocar a posição dos nós, troca o valor
                $node->data = $substitute;
                // Depois, remove o substituto da subárvore à direita
                $node->right = $this->remove($substitute, $node->right);
            }
        }
        return $node;
    }
}

// Teste
$tree = new BinarySearchTree(34);
$tree->insert(80);
$tree->insert(55);
$tree->insert(40);
$tree->insert(43);
$tree->insert(13);
$tree->insert(75);
$tree->insert(26);
$tree->insert(90);
$tree->insert(5);
$tree->insert(1);
$tree->insert(17);

// Imprime as travessias
echo "In-Order: ";
$tree->inorderTraversal(); // Saída: 13 17 26 34 40 43 55 75 80 90
echo "\n";

echo "Pre-Order: ";
$tree->preOrder($tree->root); // Saída: 34 26 13 17 40 80 55 43 75 90 5 1
echo "\n";

echo "Post-Order: ";
$tree->postOrder($tree->root); // Saída: 17 13 26 43 40 55 90 75 80 5 1 34
echo "\n";

echo "Menor valor na árvore: " . $tree->minValue() . "\n"; // Saída: 1
echo "Maior valor na árvore: " . $tree->maxValue() . "\n"; // Saída: 90

echo "\n --------------------- \n";

$valorRemovido = 90;
$tree->remove($valorRemovido);
echo "Após remover o node $valorRemovido: \n";
echo "In-Order: ";
$tree->inorderTraversal();
echo "\n";

echo "Pre-Order: ";
$tree->preOrder($tree->root);
echo "\n";

echo "Post-Order: ";
$tree->postOrder($tree->root);
echo "\n";

echo "Menor valor na árvore: " . $tree->minValue() . "\n";
echo "Maior valor na árvore: " . $tree->maxValue() . "\n";
