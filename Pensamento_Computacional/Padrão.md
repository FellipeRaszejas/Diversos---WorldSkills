# Padronização de Código

Quando o mesmo trecho de código aparece em vários lugares, há um padrão a ser reconhecido. Generalizá-lo em uma única estrutura reutilizável é o princípio **DRY** (*Don't Repeat Yourself*), parte do Clean Code. Este guia mostra um exemplo de antes e depois, 10 lugares do código onde essa padronização costuma ser aplicada e 10 áreas de T.I. em que a padronização é essencial.

## Sumário

1. [Exemplo: antes e depois](#exemplo-antes-e-depois)
2. [10 lugares do código onde a padronização é aplicada](#10-lugares-do-código-onde-a-padronização-é-aplicada)
3. [10 áreas de T.I. onde a padronização é aplicada](#10-áreas-de-ti-onde-a-padronização-é-aplicada)

## Exemplo: antes e depois

**Antes:** a mesma lógica de busca se repete em cada método.

```php
public function show(int $id)
{
    $user = User::findOrFail($id);

    return $user;
}

public function edit(int $id)
{
    $user = User::findOrFail($id);

    return $user;
}
```

**Depois:** a operação repetida é centralizada em um método reutilizável.

```php
private function findUser(int $id): User
{
    return User::findOrFail($id);
}

public function show(int $id)
{
    return $this->findUser($id);
}

public function edit(int $id)
{
    return $this->findUser($id);
}
```

### O que o exemplo demonstra

| Conceito | O que o código mostra |
|---|---|
| **Identificar semelhanças** | Perceber que a mesma operação aparece em diferentes métodos |
| **Generalizar padrões** | Extrair a operação repetida para uma função |
| **Eliminar redundância** | Reutilizar a função em vez de repetir a implementação |
| **DRY** | Manter uma única implementação da lógica de busca |

Esse é o reconhecimento de padrões feito **pelo programador**: perceber estruturas semelhantes e abstraí-las. Em Machine Learning, quem identifica as regularidades é o sistema, a partir dos dados.

> **Nota sobre autenticação:** este exemplo foi escolhido de propósito sem autenticação, para não misturar dois conceitos. Autenticação deve ser estudada à parte. Em especial, `Auth::login($user)` apenas inicia a sessão do usuário, sem verificar senha ou credenciais. Autenticar alguém só por um ID recebido em uma requisição é uma falha grave de segurança. Para validar credenciais, use mecanismos próprios, como `Auth::attempt()`.

### Como identificar um candidato à padronização

- O mesmo trecho aparece em **três ou mais lugares**.
- Ao corrigir um erro, é preciso **alterar vários arquivos** para o mesmo ajuste.
- As cópias são **quase idênticas**, mudando apenas alguns valores (que viram parâmetros da função generalizada).

## 10 lugares do código onde a padronização é aplicada

Os exemplos de ferramentas usam o Laravel, mas a ideia vale para qualquer linguagem ou framework.

| # | Onde | O que se repetia | Como é padronizado |
|---|---|---|---|
| 1 | **Autenticação** | Verificar credenciais em vários pontos do sistema | Um único mecanismo de autenticação (como `Auth::attempt()` em um serviço ou *middleware*) |
| 2 | **Validação de dados** | As mesmas regras (e-mail, senha, campos obrigatórios) em vários formulários | Classes de validação reutilizáveis (*Form Requests*) |
| 3 | **Consultas ao banco de dados** | Os mesmos filtros e buscas escritos em cada controlador | Repositórios ou *scopes* nos modelos |
| 4 | **Respostas de API** | Montar o JSON de sucesso e de erro de formas diferentes | Um formato único de resposta (*API Resources* ou *helper* de resposta) |
| 5 | **Tratamento de erros** | Blocos `try/catch` copiados em cada função | Um tratador global de exceções |
| 6 | **Logs e auditoria** | Registrar "quem fez o quê" manualmente em cada ação | *Middleware* ou *observers* que registram automaticamente |
| 7 | **Permissões e autorização** | Verificações de "este usuário pode fazer isso?" espalhadas pelo código | Políticas de acesso centralizadas (*Policies* e *Gates*) |
| 8 | **Envio de e-mails e notificações** | Montar e disparar mensagens de formas parecidas em vários pontos | Um serviço de notificação com modelos de mensagem |
| 9 | **Interface (telas)** | O mesmo botão, formulário ou cartão copiado em várias páginas | Componentes reutilizáveis (*Blade components*, React, Vue) |
| 10 | **Paginação e filtros de listagem** | A mesma lógica de ordenar, filtrar e paginar em cada listagem | Uma função ou classe genérica de listagem |

## 10 áreas de T.I. onde a padronização é aplicada

A padronização vai além do código: em T.I., padrões permitem que sistemas, equipes e empresas diferentes trabalhem juntos, reduzindo erros, retrabalho e custo.

| # | Área de T.I. | O que é padronizado | Exemplos de padrões |
|---|---|---|---|
| 1 | **Redes e comunicação** | A forma como dispositivos conversam entre si | TCP/IP, HTTP, DNS, Ethernet, Wi-Fi (IEEE 802.11) |
| 2 | **Desenvolvimento de software** | Estilo de código e soluções para problemas recorrentes | PSR (PHP), PEP 8 (Python), padrões de projeto (*Design Patterns*), *linters* e formatadores |
| 3 | **Bancos de dados** | Linguagem de consulta e organização dos dados | SQL (ISO/IEC 9075), normalização, convenções de nomes de tabelas e colunas |
| 4 | **APIs e integração** | Como sistemas diferentes trocam informações | REST, OpenAPI, formato padronizado de erros |
| 5 | **Segurança da informação** | Controles, políticas e boas práticas de proteção | ISO/IEC 27001, OWASP Top 10, políticas de senha e de acesso |
| 6 | **DevOps e infraestrutura** | Como o software é construído, testado e publicado | Pipelines de CI/CD, contêineres (Docker), infraestrutura como código (Terraform) |
| 7 | **Gestão de serviços de T.I.** | Processos de atendimento, incidentes e mudanças | ITIL, fluxo padronizado de chamados |
| 8 | **Qualidade e testes** | Como testar e medir a qualidade do software | Estrutura *Arrange-Act-Assert*, critérios de cobertura, ISO/IEC 25010 |
| 9 | **Interface e experiência do usuário** | Aparência e comportamento consistentes das telas | *Design systems*, diretrizes de acessibilidade (WCAG) |
| 10 | **Dados e formatos** | Como a informação é representada e trocada | JSON, CSV, XML, UTF-8, datas no padrão ISO 8601 |