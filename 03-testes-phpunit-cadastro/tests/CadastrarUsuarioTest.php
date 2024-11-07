<?php

// Usa a classe TestCase do PHPUnit para criar testes
use PHPUnit\Framework\TestCase;
// Usa a classe CadastrarUsuario do namespace MeuApp\ManipulacaoDeDados
use MeuApp\ManipulacaoDeDados\CadastrarUsuario;

// Define a classe de teste para a classe CadastrarUsuario
class CadastrarUsuarioTest extends TestCase
{
    // Método que testa a funcionalidade de cadastro de usuário
    public function testCadastrarUsuario()
    {
        // Instancia a classe CadastrarUsuario, que será testada
        $cadastro = new CadastrarUsuario();

        // Chama o método cadastrarUsuario com dados de exemplo (nome e email) e armazena o resultado
        $resultado = $cadastro->cadastrarUsuario("Usuário", "usuario@email.com");

        // Usa uma asserção para verificar se o resultado do cadastro é verdadeiro (true)
        $this->assertTrue($resultado);
    }
}
