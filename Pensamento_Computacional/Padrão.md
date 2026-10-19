# Reconhecimento de Padrões

Guia introdutório sobre reconhecimento de padrões na computação: como identificar o que se repete e o que muda, como isso aparece no código e na compressão de dados, e como uma máquina aprende a enxergar padrões por si mesma.

## Sumário

1. [Semelhanças e diferenças](#semelhanças-e-diferenças)
2. [Padrões no código: evitando repetição](#padrões-no-código-evitando-repetição)
3. [Outro exemplo: compressão de dados (RLE)](#outro-exemplo-compressão-de-dados-rle)
4. [Como fazer a máquina enxergar padrões](#como-fazer-a-máquina-enxergar-padrões)

## Semelhanças e diferenças

Reconhecer padrões é olhar para o problema de duas formas complementares:

![Conceitos fundamentais de padrões computacionais: à esquerda, similaridades (detectando repetições); à direita, diferenças (detectando transições)](imagens/semelhancas-vs-diferencas.jpg)

| | Similaridades (contexto base) | Diferenças (variáveis) |
|---|---|---|
| **O que detecta** | Repetições | Transições |
| **Onde atua** | Pontos de repetição idêntica | Pontos onde o contexto ou o objeto muda |
| **Objetivo** | Identificar o que **não muda** | Identificar pontos de **transição e variação** |

## Padrões no código: evitando repetição

Um padrão aparece no código quando o mesmo trecho se repete em vários lugares. Ao percebê-lo, é possível generalizá-lo em uma única função e seguir o princípio **DRY** (*Don't Repeat Yourself*), parte do Clean Code.

**Antes:** a busca do usuário e a autenticação se repetem em cada função.

```php
$user = User::find($id);

    $user::auth($id);
    return $user;
}

Function update(int $id, array $data){
    $user = User::findOrFail($id);
    $user::auth();
    $user = User::update($array);
    return $user; 
}
```

**Depois:** o padrão repetido vira uma função generalizada.

```php
namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthService
{
    /**
     * Função generalizada para autenticar um utilizador pelo ID.
     * Evita a repetição de código (Clean Code / DRY - Don't Repeat Yourself).
     */
    public function authUser(int $id): bool
    {
        // 1. Procura o utilizador na base de dados
        $user = User::find($id);

        // 2. Verifica se o utilizador existe e efetua o login na sessão
        if ($user) {
            Auth::login($user);
            return true;
        }

        // 3. Retorna falso caso falhe
        return false;
    }
}
```

## Outro exemplo: compressão de dados (RLE)

Na compressão por **RLE** (*Run-Length Encoding*), o padrão é a repetição de valores consecutivos. Em vez de guardar cada bloco individualmente, guarda-se a cor e quantas vezes ela se repete em sequência.

![Compressão de dados com RLE: nove blocos coloridos viram cinco pares de cor e quantidade](imagens/compressao-dados-rle.jpg)

| Sequência original | Codificação |
|---|---|
| 3 blocos azuis | Azul 3 |
| 2 blocos ciano | Ciano 2 |
| 1 bloco amarelo | Amarelo 1 |
| 2 blocos pretos | Preto 2 |
| 1 bloco amarelo | Amarelo 1 |

### O caminho da compressão de imagens

O reconhecimento de padrão é o coração da compressão. O processo completo passa por quatro etapas:

![Caminho da compressão de imagens: da imagem bruta à análise de padrões, codificação RLE, dados comprimidos e armazenamento no servidor](imagens/caminho-compressao-imagens.jpg)

1. **Análise de padrões:** detecção de sequências na imagem bruta (dados brutos, muito dado e pouco espaço).
2. **Codificação (algoritmo RLE):** contagem das repetições.
3. **Dados comprimidos:** o resultado ocupa menos espaço (ex.: `[Azul,3]`, `[Ciano,2]`, `[Amarelo,1]`, `[Preto,2]`, `[Amarelo,1]`).
4. **Guardar eficientemente no servidor:** os dados comprimidos são enviados e armazenados.

## Como fazer a máquina enxergar padrões

Para que um sistema computacional ou uma inteligência artificial deixe de apenas executar regras rígidas e passe a enxergar padrões por si mesmo, é necessário transitar pelo campo da representação de dados e do aprendizado de máquina (*Machine Learning*). O processo ocorre em três etapas.

### 1. Representação de atributos (*Feature Representation*)

Antes que qualquer padrão seja detectado, a máquina precisa converter o mundo real (ou dados brutos) em estruturas matemáticas compreensíveis.

- **O que é:** cada objeto ou dado é decomposto em uma lista de atributos ou características mensuráveis (vetores numéricos). Por exemplo, em vez de "ver" um rosto, a máquina enxerga coordenadas de distância entre os olhos, tonalidade da pele e proporções.
- **O papel do Machine Learning:** algoritmos analisam milhares de exemplos para descobrir quais atributos são realmente relevantes para diferenciar um objeto do outro, eliminando ruídos e informações desnecessárias.

### 2. Associação de conceitos

Com os atributos representados, o sistema passa a associar esses valores a conceitos lógicos.

- **Exemplo:** se a combinação de atributos indica "clique rápido + muitas abas abertas + IP suspeito", o sistema associa isso ao conceito abstrato de "possível tentativa de fraude".
- O modelo armazena essas associações e correlações para consultas posteriores, em formato de pesos estatísticos ou árvores de decisão.

### 3. A chegada às regras de negócio e de decisão

É o estágio final, em que o padrão deixa de ser apenas uma correlação estatística e se torna uma regra de decisão acionável:

- O sistema infere automaticamente: "Sempre que o padrão X se repetir, execute a Ação Y".
- É assim que sistemas inteligentes automatizam decisões complexas em tempo real, antecipando falhas, recomendando produtos ou validando segurança sem depender de programação manual para cada exceção.