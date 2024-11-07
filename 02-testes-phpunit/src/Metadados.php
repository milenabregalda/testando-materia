<?php

// Definindo o namespace para a classe. O namespace organiza o código e ajuda a evitar conflitos com outras classes de bibliotecas
namespace MeuApp\ManipulacaoDeDados;

// A classe Metadata é responsável por representar e armazenar metadados de um item armazenado, com três propriedades: identificador, data de publicação e coleção.
class Metadados // Os metadados são dados que descrevem outros dados (do cliente que não é uma pessoa, e sim uma abstração - documento, livro, arquivo, etc.)
{
    // Definindo três propriedades privadas, que armazenam o identificador, data de publicação e coleção do item
    private string $identificador; // O identificador único do item
    private string $dataPublicacao; // A data de publicação do item
    private string $colecao; // O nome da coleção à qual o item pertence

    // O construtor da classe é chamado sempre que um novo objeto da classe Metadata é criado.
    // Ele inicializa as propriedades com os valores fornecidos na criação do objeto.
    public function __construct(string $identificador, string $dataPublicacao, string $colecao)
    {
        $this->identificador = $identificador; // Inicializa a propriedade 'identificador' com o valor fornecido
        $this->dataPublicacao = $dataPublicacao; // Inicializa a propriedade 'dataPublicacao' com o valor fornecido
        $this->colecao = $colecao; // Inicializa a propriedade 'colecao' com o valor fornecido
    }

    // Método para acessar o identificador do item. Ele retorna o valor armazenado na propriedade 'identificador'.
    public function identificador(): string
    {
        return $this->identificador; // Retorna o identificador do item.
    }

    // Método para acessar a data de publicação do item. Ele retorna o valor armazenado na propriedade 'dataPublicacao'.
    public function dataPublicacao(): string
    {
        return $this->dataPublicacao; // Retorna a data de publicação do item.
    }

    // Método para acessar o nome da coleção à qual o item pertence. Ele retorna o valor armazenado na propriedade 'colecao'.
    public function colecao(): string
    {
        return $this->colecao; // Retorna o nome da coleção do item
    }
}
