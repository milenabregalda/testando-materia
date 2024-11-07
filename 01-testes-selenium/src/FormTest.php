<?php

// Requer o autoload do Composer para carregar as dependências do projeto, como o WebDriver
require __DIR__ . '/../vendor/autoload.php';

// Importa as classes do WebDriver do Facebook necessárias para o teste
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\WebDriverBy;  // Classe para localizar elementos no DOM
use Facebook\WebDriver\WebDriverExpectedCondition;  // Classe para esperar que certos elementos ou condições se cumpram

// Definição da classe que irá realizar os testes no formulário
class FormTest
{
    private $driver;  // Declara uma variável para armazenar o driver do WebDriver, que controlará o navegador

    // O construtor é chamado quando a classe é instanciada, configurando o WebDriver para controlar o navegador
    public function __construct()
    {
        // Configuração das capacidades do navegador Chrome para o Selenium

        // Com headless (não abre janelas visíveis no navegador):
        $capabilities = DesiredCapabilities::chrome()
            ->setCapability('chromeOptions', ['args' => ['--headless']])  // Configura o Chrome para rodar sem interface gráfica (modo headless)
            ->setCapability('binary', __DIR__ . '/../chromedriver.exe');  // Caminho do ChromeDriver, necessário para que o Selenium controle o navegador

        // Sem headless (abre janelas visíveis no navegador):
        /*$capabilities = DesiredCapabilities::chrome()
            ->setCapability('binary', __DIR__ . '/../chromedriver.exe');  // Caminho do ChromeDriver, necessário para que o Selenium controle o navegador*/

        // Cria uma instância do RemoteWebDriver, conectando-se ao servidor Selenium em localhost na porta 4444
        $this->driver = RemoteWebDriver::create('http://localhost:4444/wd/hub', $capabilities);
    }

    // Método para preencher o formulário automaticamente
    public function fillForm()
    {
        try {
            // Imprime mensagem no console informando que está navegando até a URL do formulário
            echo "Navegando até a URL do formulário...\n";

            // Acessa a URL do formulário onde os testes serão realizados
            $this->driver->get('http://localhost/01-testes-selenium/public/index.php');

            

            /* O código abaixo está com alguns problemas para encontrar e interagir com os inputs, mas vou mantê-lo para aprendizado: */

            // Mensagem para informar que está aguardando o campo de entrada com o nome 'inputName'
            echo "Esperando o campo de entrada 'inputName'...\n";

            // Aguarda até que o campo 'inputName' esteja presente no DOM (código HTML carregado)
            $this->driver->wait(10)->until(
                WebDriverExpectedCondition::presenceOfElementLocated(WebDriverBy::name('inputName'))
            );

            // Imprime uma mensagem dizendo que o campo 'inputName' está presente no DOM
            echo "'inputName' está presente no DOM.\n";

            // Aguarda até que o campo 'inputName' se torne visível na tela (não apenas presente no HTML)
            $this->driver->wait(10)->until(
                WebDriverExpectedCondition::visibilityOfElementLocated(WebDriverBy::name('inputName'))
            );

            // Imprime uma mensagem dizendo que o campo 'inputName' está visível na tela
            echo "'inputName' está visível.\n";

            // Localiza o campo de entrada com o nome 'inputName' no DOM
            $nameField = $this->driver->findElement(WebDriverBy::name('inputName'));

            // Preenche o campo 'inputName' com o valor 'Usuário'
            $nameField->sendKeys('Usuário');

            // Mensagem informando que o nome foi enviado com sucesso
            echo "Nome 'Usuário' enviado.\n";

            // Mensagem para informar que está esperando o campo de senha
            echo "Esperando o campo de senha...\n";

            // Aguarda até que o campo 'password' esteja presente no DOM
            $this->driver->wait(10)->until(
                WebDriverExpectedCondition::presenceOfElementLocated(WebDriverBy::name('password'))
            );

            // Imprime uma mensagem dizendo que o campo 'password' está presente no DOM
            echo "'password' está presente no DOM.\n";

            // Aguarda até que o campo 'password' se torne visível na tela
            $this->driver->wait(10)->until(
                WebDriverExpectedCondition::visibilityOfElementLocated(WebDriverBy::name('password'))
            );

            // Imprime uma mensagem dizendo que o campo 'password' está visível na tela
            echo "'password' está visível.\n";

            // Localiza o campo de senha no DOM
            $passwordField = $this->driver->findElement(WebDriverBy::name('password'));

            // Preenche o campo de senha com o valor 'senha123'
            $passwordField->sendKeys('senha123');

            // Mensagem informando que a senha foi enviada com sucesso
            echo "Senha 'senha123' enviada.\n";

            // Mensagem informando que o formulário está sendo enviado
            echo "Enviando o formulário...\n";

            // Simula pressionar a tecla ENTER no campo de senha para enviar o formulário
            $passwordField->sendKeys(\Facebook\WebDriver\WebDriverKeys::ENTER);



            // Pausa de 3 segundos antes de finalizar o teste (para aguardar qualquer processamento)
            sleep(3);

            // Mensagem final informando que o formulário foi preenchido e enviado com sucesso
            echo "Formulário preenchido e enviado com sucesso.<br>\n";
        } catch (Exception $e) {
            // Se houver um erro durante o processo, captura e exibe a mensagem de erro
            //$this->driver->takeScreenshot('screenshot.png'); // Opcional: caso queira salvar uma captura de tela em caso de erro
            echo "Erro: " . $e->getMessage();
        }
    }

    // Destruidor da classe, chamado automaticamente ao final do ciclo de vida do objeto
    // Fecha a instância do WebDriver e encerra o navegador
    public function __destruct()
    {
        $this->driver->quit();
    }
}

// Criação da instância da classe FormTest, que irá executar o teste
$formTest = new FormTest();
// Chama o método fillForm para preencher e enviar o formulário
$formTest->fillForm();
