<?php

// Aula de 04/11/2024 - Projeto de exemplo para testes com Selenium

/* Composer - ferramenta de gerenciamento de dependências para PHP. Ele facilita a instalação, atualização e gerenciamento das bibliotecas de terceiros
   que o seu projeto PHP necessita, além de permitir a automação de processos como o autoload (carregamento automático) das classes do seu código. */

/* Selenium - ferramenta de automação de navegadores web, usada para testar a interface de usuário de aplicações web. Ele simula interações de um usuário,
   como clicar em botões, preencher formulários e verificar conteúdos. */

/* Os WebDrivers de vários navegadores são componentes essenciais para que o Selenium interaja com os navegadores de maneira automatizada.
   Eles são responsáveis por fazer a comunicação entre o Selenium e o navegador. Aqui, utilizamos a versão 130.0.6723.91 */


require __DIR__ . '/../vendor/autoload.php'; // Requer o autoload do Composer para carregar as dependências do projeto, como o WebDriver

/* O Facebook WebDriver é uma biblioteca mantida pelo Facebook que implementa a especificação do WebDriver para automação de navegadores.
   Mesmo não sendo um projeto diretamente do Facebook, o nome "Facebook" no pacote se deve ao fato de que a biblioteca foi originalmente
   desenvolvida e é mantida por eles. */

use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\Remote\DesiredCapabilities; // Importa as classes do WebDriver do Facebook necessárias para o teste

class StressTest // Define uma classe chamada "StressTest" para executar o teste de estresse
{
    // Declaração de variáveis privadas para armazenar o driver do WebDriver e a URL:
    private $driver;
    private $url;

    // O construtor da classe recebe a URL do site que será testado
    public function __construct($url)
    {
        // Atribui a URL recebida à variável $url da classe
        $this->url = $url;

        // Configura as opções de inicialização para o Chrome, definindo-o como headless (sem interface gráfica)
        // e especificando o caminho do ChromeDriver

        // Versão com headless (o teste roda em segundo plano, sem ser visível ao usuário):
        $capabilities = DesiredCapabilities::chrome()
            ->setCapability('chromeOptions', ['args' => ['--headless']])  // Define que o Chrome deve rodar sem interface gráfica
            ->setCapability('binary', __DIR__ . '/../chromedriver.exe');  // Define o caminho do executável do <ChromeDriver></ChromeDriver>

        // Versão sem headless (o navegador abre, dá para ver a página sendo recarregada 10 vezes e ele fecha sozinho):
        /* $capabilities = DesiredCapabilities::chrome()
            ->setCapability('binary', __DIR__ . '/../chromedriver.exe');  // Caminho do ChromeDriver */

        /* Cria uma instância do RemoteWebDriver com o servidor local do Selenium (porta 4444 - deve ser inicializado antes no terminal)
        e as capacidades definidas (opções de inicialização para o Chrome que estão acima) */
        $this->driver = RemoteWebDriver::create('http://localhost:4444/wd/hub', $capabilities, 5000);
        // 5000 representa o timeout (tempo limite) em milissegundos para a criação da sessão do WebDriver

        // Código antigo:
        //$this->driver = RemoteWebDriver::create('http://localhost:4444/wd/hub', DesiredCapabilities::chrome());
    }

    // Método para rodar o teste de estresse, fazendo múltiplas requisições para a URL
    public function runTest($numberOfRequests)
    {
        // Um loop que irá rodar o número de vezes especificado pelo argumento $numberOfRequests
        for ($i = 1; $i <= $numberOfRequests; $i++) {
            // Exibe no console o número da requisição sendo executada
            echo "Requisição de teste #$i feita com sucesso.<br>\n";

            // Abre a URL no navegador controlado pelo WebDriver
            $this->driver->get($this->url);

            // Aguarda 1 segundo antes de fazer a próxima requisição
            sleep(1);
        }
    }

    // Destruidor da classe, que é chamado automaticamente quando o objeto é destruído
    // Aqui ele garante que o WebDriver será fechado ao final do teste
    public function __destruct()
    {
        // Fecha o navegador e encerra a sessão do WebDriver
        $this->driver->quit();
    }
}

// Instancia a classe StressTest com a URL desejada para o teste de estresse
// O endereço que será testado é o "index.php" hospedado no servidor local do Apache
$stressTest = new StressTest('http://localhost/01-testes-selenium/public/index.php'); // Página index no servidor do Apache
// $stressTest = new StressTest('http://localhost:8080');  // Página de exemplo antiga

// Executa o teste de estresse, solicitando 10 requisições (mudar conforme desejado)
$stressTest->runTest(10);
