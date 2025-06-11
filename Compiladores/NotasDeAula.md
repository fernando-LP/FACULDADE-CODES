#Análisador Sintático Descendente
* AS Predetivo sem recursão.
  * Gramática LL(1)
  * Requisitos:
    * Não pode ser ambigua (Para mesma entrada consigo ter duas arvores de derivação)
    * Não pode ter recursão à esquerda.
    * Precisa ser refatorada se houver necessidade.
    * Antes de implementar ela, precisa ser validado se ela precisa de recursão, como elemida a recursão direta e indireta até mesmo fatoração.
    * Refatorando e fatorando, conseguimos diminuir muito a ambiguidade.
   

#Estrutura
> Como será a estrutura para o compilador conseguir entender todo a origem do código passado para ele interpretar?




# Exercicios
a)
S -> aAb  | Sbc
A -> Acd | cdB
B -> aSd | bb | E

Resposta:
S -> aAbS'
S -> bcS' | E

b)
S -> aAcd | Sbd
A -> Bcd | ab
B -> Ade | cd

Resposta:
S -> aAcd | Sbd
A -> Bcd | ab
B -> Bcdde | abde
S -> aAcdS'
S' -> bdS' | E
A -> Bcd | ab
B -> abdeB'
B' -> cddeB'| E

-----
# 11/06/2025
### Analise sintatica (aula passada:)
Não é possivel elaborar uma GLC
* GLC pode ser utilizada como um ga de traduções, por meio da tradução dirigida pela sintaxe (TDS). Técnica que permite realizar ao tratamento semântico com a geração do código intermediário
* Ações semânticas são incorporadas na GLC
* Os sinbolos gramaticais são associados a ____ que armazenam os valores durante o processo de reconhecimento.
### Grámatica de atributos
X -> Símbolo gramatical
a -> atributo
Ex: X -> a + b
X.valor -> a.valor. b.valo 

TDS -> Definição dirigida pela sintaxe -> Esquema de tradução

### Definição dirigida pela sintaxe
* Especificação de alto nível
* Ocultam detalhes de implementações.
* Não é necessário especificar a ordem de traduções.
* Modulo: GLC + atributos + regras semânticas
 *  Os atributos estão associadpos aos simbolos gramaticais
 *  As regras são associadas ás produções exemplo:

 GLC       Regra semântica
 E -> E + T      E.code = E1.code || T.code || '+'
 
* Usa notação pós-fixada 12*3 / expressão 12*3

### Esquemas de traduções
* Indicam a ordem ná qual as regras semânticas são avaliadas.
* COnsideram detalhes de implemtação
* Modelo: GLC + atributos + fragmentos de código

GLC
E -> E + T           E -> E + T { print " + " }

> EXEMPLO

### Gramática de atributos
* Tipos de atributos
  * Atributos sintetizados
  * " "      Herdados

#### Atributos sintetizados
Definido por uma regra semântica com base nos atributos dos filhos e do própio nó.
O valor do atributo é calculado em função dos filhos na árvore.
OS atributos dos terminais são sempre sintetizados e representam o valor gerado pelo analisador lexico.
> EXEMPLO

* F -> Digito
* I. val = digito.lexical
* A -> Xy
* A.s -> f (X.x, Y.y)

 
