<?php

namespace MeuApp\ManipulacaoDeDados; // Define o namespace da classe para organizar o código e evitar conflitos de nomes

class CadastrarUsuario // Declara a classe CadastrarUsuario que será responsável por gerenciar o cadastro de usuários
{
    // Define um método público chamado cadastrarUsuario, que recebe dois parâmetros (nome e email) e retorna um valor booleano
    public function cadastrarUsuario(string $nome, string $email): bool 
    {
        // Por ser uma simulação de cadastro, apenas retorna verdadeiro
        return true;
    }
}
