# Apresentação parte 1 projeto - Compiladores

## Tokens que devem ser considerados na análise léxica
* Definir e descrever os tokens que serão atendidos na Linguagem;


**Palavras reservadas**
```bash
int, float, char, if, else, while, for, return, true, false
```
**Tipos de dados**
```bash
int, float, char
```
**Operadores Aritiméticos**
| Operador | Token        | Descrição                 |
| -------- | ------------ | ------------------------- |
| `+`      | `ARITMETICO` | Soma                      |
| `-`      | `ARITMETICO` | Subtração                 |
| `*`      | `ARITMETICO` | Multiplicação             |
| `/`      | `ARITMETICO` | Divisão                   |
| `%`      | `ARITMETICO` | Módulo (resto da divisão) |

**Operadores Relacionais**
| Operador | Token        | Descrição        |
| -------- | ------------ | ---------------- |
| `==`     | `RELACIONAL` | Igual a          |
| `!=`     | `RELACIONAL` | Diferente de     |
| `<`      | `RELACIONAL` | Menor que        |
| `<=`     | `RELACIONAL` | Menor ou igual a |
| `>`      | `RELACIONAL` | Maior que        |
| `>=`     | `RELACIONAL` | Maior ou igual a |


**Operadores Lógicos**
| Operador | Token    | Descrição            |          |                |
| -------- | -------- | -------------------- | -------- | -------------- |
| `&&`     | `LOGICO` | E lógico (AND)       |          |                |
| \`       |          | \`                   | `LOGICO` | OU lógico (OR) |
| `!`      | `LOGICO` | Negação lógica (NOT) |          |                |

**Delimitadores e Pontuação**
| Símbolo | Token         | Descrição          |
| ------- | ------------- | ------------------ |
| `(`     | `DELIMITADOR` | Parêntese esquerdo |
| `)`     | `DELIMITADOR` | Parêntese direito  |
| `{`     | `DELIMITADOR` | Chave esquerda     |
| `}`     | `DELIMITADOR` | Chave direita      |
| `;`     | `DELIMITADOR` | Ponto e vírgula    |
| `,`     | `DELIMITADOR` | Vírgula            |

**Comentários**
| Tipo        | Token              | Exemplo            | Regex                 |
| ----------- | ------------------ | ------------------ | --------------------- |
| Linha única | `COMENTARIO_LINHA` | `// comentário`    | `/^\/\/.*/`           |
| Bloco       | `COMENTARIO_BLOCO` | `/* comentário */` | `/^\/\*[\s\S]*?\*\//` |

  
* Especificar os tokens da linguagem usando as expressões regulares; 
```node
module.exports = [
  { type: "STRING_LITERAL", regex: /^"[^"\n]*"/ },
  { type: "COMENTARIO_LINHA", regex: /^\/\/.*?/ },
  { type: "COMENTARIO_BLOCO", regex: /^\/\*[\s\S]*?\*\// },
  { type: "PALAVRA_RESERVADA", regex: /\b(for|while|do|if|else|return)\b/ },
  { type: "TIPO_VARIAVEL", regex: /\b(int|float|char|bool)\b/ },
  { type: "NUMERO_PONTO_FLUTUANTE", regex: /^[0-9]+\.[0-9]+/ },
  { type: "NUMERO_INTEIRO", regex: /^[0-9]+/ },
  { type: "IDENTIFICADOR", regex: /^[a-zA-Z_][a-zA-Z0-9_]*/ },
  { type: "OPERADOR_RELACIONAL", regex: /^(==|!=|<=|>=|<|>)/ },
  { type: "OPERADOR_LOGICO", regex: /^(&&|\|\||!)/ },
  { type: "OPERADOR_ARITMETICO", regex: /^(\+|\-|\*|\/|%)/ },
  { type: "OPERADOR_ATRIBUICAO", regex: /^=/ },
  { type: "PONTUACAO", regex: /^(,|;|\.)/ },
  { type: "CHAVE", regex: /^(\{|\})/ },
  { type: "PARENTESE", regex: /^(\(|\))/ },
  { type: "QUEBRA_LINHA", regex: /^\n/, ignore: true },
  { type: "ESPACO_EM_BRANCO", regex: /^[ \t\r]+/, ignore: true }
];
```
* Apresentar o reconhecimento dos tokens da linguagem por meio de AFD;

![IMAGEM_AFD](imagem_afd_trabalho.png)



