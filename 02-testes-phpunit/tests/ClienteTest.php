<?php

// A declaração da utilização da classe TestCase do PHPUnit.
// Isso permite que a classe 'ClienteTest' estenda o PHPUnit TestCase,
// fornecendo várias funcionalidades para os testes.
use PHPUnit\Framework\TestCase;

/* O PHPUnit é um framework de testes para PHP (back-end), amplamente utilizado para realizar testes automatizados em código PHP.
   Ele permite que desenvolvedores criem e executem testes para verificar se funções e classes do sistema estão funcionando conforme esperado. */

// As classes Cliente e Metadados da biblioteca MeuApp/ManipulacaoDeDados são importadas,
// permitindo que sejam utilizadas diretamente no código do teste.
use MeuApp\ManipulacaoDeDados\Cliente;
use MeuApp\ManipulacaoDeDados\Metadados;

// Definindo a classe 'ClienteTest', que estende a classe TestCase do PHPUnit. 
// Ela será usada para testar a classe Cliente.
class ClienteTest extends TestCase
{
    // Função de teste chamada 'testBuscaMetadados' 
    public function testBuscaMetadados(): void // O método de teste deve sempre começar com 'test' para ser reconhecido pelo PHPUnit
    {
        // Criação de um novo objeto da classe 'Cliente'.
        // A classe 'Cliente' provavelmente é responsável por buscar dados de algum serviço externo (no caso, aqui é só um exemplo mesmo)
        $cliente = new Cliente();

        // Chama o método 'buscarMetadados' da classe 'Cliente', 
        // passando a string 'phpunit-test' como parâmetro. 
        // Esse método provavelmente retorna os metadados relacionados ao identificador fornecido.
        $metadados = $cliente->buscarMetadados('phpunit-test');

        // Testa se o identificador retornado pelo método 'metadados->identificador()' é igual a 'phpunit-test'.
        // O 'assertSame' compara o valor exato retornado com o valor esperado.
        $this->assertSame('phpunit-test', $metadados->identificador());

        // Testa se a data pública retornada pelo método 'metadados->publicDate()' 
        // é igual a '2019-02-19 20:00:38'. 
        // Novamente, usa-se 'assertSame' para comparar os dois valores.
        $this->assertSame('2019-02-19 20:00:38', $metadados->dataPublicacao());

        // Testa se a coleção retornada pelo método 'metadados->collection()' 
        // é igual a 'opensource'. Esse método provavelmente retorna o nome da coleção
        // em que o item encontrado pertence.
        $this->assertSame('opensource', $metadados->colecao());
    }
}
