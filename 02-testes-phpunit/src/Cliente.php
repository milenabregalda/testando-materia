<?php

// Declaração do namespace onde a classe está localizada. O namespace organiza o código,
// evitando conflitos de nomes e agrupando funcionalidades relacionadas.
namespace MeuApp\ManipulacaoDeDados;

// Definindo a classe Cliente, que tem a responsabilidade de fornecer funcionalidades para interagir com os dados
class Cliente
// Cliente é uma abstração de uma entidade que interage com o serviço de dados
{
    /* Busca informações relacionadas a um "item" com o identificador fornecido
    (exemplo: um documento, um livro, um arquivo, ou qualquer objeto digital que esteja sendo armazenado) */
    public function buscarMetadados(string $identificador)
    {
        // Retorna uma nova instância da classe Metadados com 3 parâmetros:
        // 1. O identificador passado para o método (usado para buscar um item específico),
        // 2. Uma data fixa ('2019-02-19 20:00:38'), que provavelmente representa a data de criação ou última modificação do item,
        // 3. Uma string ('opensource') que pode representar a categoria ou tipo do item.
        return new Metadados($identificador, '2019-02-19 20:00:38', 'opensource');
    }
}
