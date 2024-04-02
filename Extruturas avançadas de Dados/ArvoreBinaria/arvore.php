<?php

require_once './src/ArvoreBinaria.php';
require_once './src/Node.php';
require_once './src/PesquisaBinaria.php';


$arvore = new PesquisaBinaria(50);
$arvore->inserir(15);
$arvore->inserir(67);
$arvore->inserir(10);
$arvore->inserir(16);
$arvore->inserir(52);
$arvore->inserir(70);
$arvore->inserir(8);
$arvore->inserir(76);



do {
    echo "\n\n\t########### INFORME O NUMERO DA OPCAO ############\n\n";
    echo "1 - Inserir Nó: \n";
    echo "2 - Exibir Arvore \n";
    echo "3 - Buscar Nó \n";
    echo "4 - Exibir em pré-ordem\n";
    echo "5 - Exibir em ordem\n";
    echo "6 - Exibir em pós-ordem\n";
    echo "7 - Altura da árvore\n";
    echo "8 - Total de nós da árvore\n";
    echo "9 - Total de folhas da árvore\n";
    echo "10 - Total de sub-árvores\n";
    echo "11 - Remover Nó\n";
    echo "12 - Listar Maior Valor\n";
    echo "13 - Listar Menor Valor\n";
    echo "14 - Sair do programa!!\n";

    $opcao = readline("Digite o numero da opção: ");

    switch ($opcao){
        case 1:
            echo "Você selecionou a opção 1 - Inserir Nó!\n";
            $valorInserir = readline("Qual é o novo nó: ");
            $arvore->inserir($valorInserir);
            break;
        case 2:
            echo "Você selecionou a opção 2 - Exibir Árvore!\n";
            break;
        case 3:
            echo "Você selecionou a opção 3 - Buscar Nó\n";
            $valorBuscar = readline("Qual valor deseja encontrar: ");
            $resultado = $arvore->buscarNo($valorBuscar, $arvore->root);
            if ($resultado != null) {
                $no = $resultado["no"];
                $pai = $resultado["pai"];
                ##var_dump($pai);
                echo "Valor solicitado encontrado: " . $no->data . "\n";
                if ($pai == null) {
                    echo "O valor solicitado é o nó raiz.\n";
                } else {
                    echo "O nó pai é: " . $pai->data . "\n";
                }
                #Pesquisa Filhos do no consultado
                if ($no->esquerda != null) {
                    echo "Filho à esquerda: " . $no->esquerda->data . "\n";
                }
                if ($no->direita != null) {
                    echo "Filho à direita: " . $no->direita->data . "\n";
                }
            } else {
                echo "Não encontramos o valor $valorBuscar\n";
            }
            break;
        case 4:
            echo "Você selecionou a opção 4 - Pre-Ordem\n";
            $arvore->preOrdem($arvore->root) . PHP_EOL;
            break;
        case 5:
            echo "Você selecionou a opção 5 - Ordem\n";
           $arvore->inOrden($arvore->root) . PHP_EOL;
            break;
        case 6:
            echo "Você selecionou a opção 6 - Exibir Pós-Ordem\n";
            $arvore->posOrdem($arvore->root) . PHP_EOL;
            break;
        case 7:
            echo "Você selecionou a opção 7 - Altura da Árvore!\n";
            echo $arvore->altura();
            break;
        case 8:
            echo "Você selecionou a opção 8 - Total de nós\n";
            echo $arvore->contaNo($arvore->root);
            break;
        case 9:
            echo "Você selecionou a opção 9 - Total de folhas\n";
            echo $arvore->contaFolhas($arvore->root);
            break;
        case 10:
            echo "Você selecionou a opção 10 - Total de Sub-Árvores\n";
            echo $arvore->contaSubArvores($arvore->root);
            break;
        case 11:
            echo "Você selecionou a opção 11 - Remover Nó\n";
            $valorDel = readline("Informe valor para remover da árvore: ");
            $arvore->removerNo($valorDel);
            echo "Nó Removido com sucesso!\n";
            break;
        case 12:
            echo "Você selecionou a opção 12 - Mostrar maior valor\n";
            echo $arvore->maxVAlor() . PHP_EOL;
            break;
        case 13:
            echo "Você selecionou a opção 13 - Mostrar menor valor\n";
            echo $arvore->minValor() . PHP_EOL;
            break;
        case 14:
            echo "SAINDO DO PROGRAMA....\n";
            break;
        default:
            echo "Opção invalida";
    }

} while ($opcao != 14);
