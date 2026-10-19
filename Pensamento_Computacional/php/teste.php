<?php

require_once __DIR__ . '/Estudante.php';

use Pensamento_Computacional\php\Estudante;

// Criamos as instâncias dos estudantes
$estudante1 = new Estudante(
    "Ana Silva",
    "2026001",
    "Campus Central",
    "(11) 98888-7777"
);

$estudante2 = new Estudante(
    "Carlos Souza",
    "2026002",
    "Campus Norte",
    "(11) 97777-6666"
);

// Reunimos os objetos em um array e formatamos os dados
$resultado = Estudante::listados([
    $estudante1,
    $estudante2,
]);

// Exibimos o resultado
print_r($resultado);

// php .\php\teste.php         |||||||      na execução