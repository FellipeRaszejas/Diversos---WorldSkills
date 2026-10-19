# Decomposição

Guia introdutório sobre decomposição de problemas: o princípio central, como fatiar um sistema em blocos, como ordenar as tarefas e como entender as partes de um sistema antes de dividi-lo. Os exemplos usam uma plataforma de E-learning e um aplicativo de delivery.

## Sumário

1. [O princípio da decomposição](#o-princípio-da-decomposição)
2. [Estratégias de quebra e blocos](#estratégias-de-quebra-e-blocos)
3. [Ordem de sequência](#ordem-de-sequência)
4. [O fluxo de como decompor](#o-fluxo-de-como-decompor)
5. [Entender o funcionamento e as partes do sistema](#entender-o-funcionamento-e-as-partes-do-sistema)

## O princípio da decomposição

Diante de um problema complexo que parece impossível de resolver de uma só vez, a regra de ouro é: **deve haver um problema menor e mais fácil que você consegue resolver. Encontre-o e comece por ele.**

**Exemplo:** o desafio é criar do zero uma plataforma completa de E-learning (ensino a distância). O escopo é gigante e assustador. Pelo princípio da decomposição, o primeiro problema mais fácil é apenas:

> "Como faço para exibir uma única página HTML na tela com o título 'Bem-vindo'?"

Resolvido isso, você avança para o próximo micro-problema.

## Estratégias de quebra e blocos

Momento de fatiar o sistema em detalhe, separando-o em grandes blocos lógicos.

**Exemplo:** no sistema de E-learning, um dos grandes blocos é o **Gerenciamento de Usuários**. Ao decompor esse bloco, ele se divide em subtarefas:

- Cadastrar usuário (recolher dados)
- Criptografar a senha por segurança
- Logar usuário (validar credenciais)
- Encontrar o registro do usuário no banco de dados ao fazer o login

## Ordem de sequência

As partes decompostas precisam ser ordenadas. Elas podem se relacionar de duas formas:

| Tipo | Como funciona | Onde é comum |
|---|---|---|
| **Sequencial** | A tarefa B depende estritamente do término da tarefa A | Computação tradicional |
| **Paralela** | Várias tarefas rodam ao mesmo tempo | DevOps e infraestrutura |

**Exemplo sequencial:** no cadastro, primeiro coletam-se os dados enviados pelo usuário, depois a senha é criptografada e, só então, o registro é salvo no banco de dados.

**Exemplo paralelo:** o sistema envia um e-mail de boas-vindas ao mesmo tempo em que gera um log de acesso, em servidores separados.

## O fluxo de como decompor

O ciclo básico de processamento e entrega segue três etapas:

**Coleta de dados → Agregação/processamento → Entrega da funcionalidade**

**Exemplo:** em um aplicativo de delivery.

1. **Coleta:** o usuário escolhe o item e digita o endereço.
2. **Agregação/processamento:** o sistema calcula a taxa de entrega com base na distância e processa o pagamento.
3. **Entrega:** o pedido é confirmado e enviado para o restaurante.

## Entender o funcionamento e as partes do sistema

Para decompor bem, é preciso entender o ecossistema e as divisões exatas de cada setor, como ao mapear os diferentes setores de uma olimpíada. Ao planejar um aplicativo, defina claramente três pilares:

| Pilar | Pergunta que responde |
|---|---|
| **Finalidade** | Para que ele serve? Qual problema resolve? |
| **Interface** | Como o usuário vai interagir visualmente com ele (telas, botões, experiência)? |
| **Funcionalidades** | O que o sistema faz nos bastidores (regras de negócio, banco de dados, integrações)? |