<?php

namespace Pensamento_Computacional\php;

class Estudante
{
    // Atributos essenciais
    public string $nome;
    public string $matricula;
    public string $campus;
    public string $telefone;

    // Inicializa os dados essenciais do estudante
    public function __construct(
        string $nome,
        string $matricula,
        string $campus,
        string $telefone
    ) {
        $this->nome = $nome;
        $this->matricula = $matricula;
        $this->campus = $campus;
        $this->telefone = $telefone;
    }

    // Retorna informações complementares
    public function getTrabalho(): string
    {
        return "Este estudante possui vínculo empregatício ativo.";
    }

    public function getLivroPreferido(): string
    {
        return "Introdução ao Pensamento Computacional";
    }

    public function getQuantidadeFilhos(): int
    {
        return 0;
    }

    /**
     * Formata os dados de uma lista de estudantes.
     *
     * @param Estudante[] $estudantes
     */
    public static function listados(array $estudantes): array
    {
        $listaFormatada = [];

        foreach ($estudantes as $estudante) {
            $listaFormatada[] = [
                'nome'      => $estudante->nome,
                'matricula' => $estudante->matricula,
                'campus'    => $estudante->campus,
                'telefone'  => $estudante->telefone,
                'livro'     => $estudante->getLivroPreferido(),
            ];
        }

        return $listaFormatada;
    }
}