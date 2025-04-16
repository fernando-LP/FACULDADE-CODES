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


