## Feegow Challenge 

Design de código, com ênfase em:

- Boas práticas de orientação a objetos.
- Organização de arquitetura front-end.
- Organização de arquitetura back-end.
- Integração com sistemas de terceiros ([Feegow Doc](https://api.feegow.com.br/api/documentation)).
- Código de baixa granularidade e acoplamento.
- Combinação de uso de tecnologias front-back como Laravel (PHP), Blade e jQuery.

## Tecnologias utilizadas

Para desenvolvimento e organização limpa o back-end utilizou-se o Laravel (framework PHP). A organização de templates e o desenvolvimento front-end foi realizado utilizando a engine Blade.

Algumas bibliotecas foram utilizadas para a camada de front, tais como: jQuery, Select2 e SweetAlert2.

Também, para o back foram utilizadas algumas bibliotecas, tais como: GuzzleHttp e Laravel Sessions.

O banco de dados referenciado nas variáveis de ambiente de exemplo (.env.example) foi o MySQL, podendo ser substituído pelo Postgres.

## Instalações necessárias

Este projeto contém alguns requisitos para sua execução:

- [PHP](https://www.php.net/manual/en/install.php)
- [Composer](https://getcomposer.org/)
- [MySQL](https://dev.mysql.com/downloads/installer/)


### Executando o projeto

Os comandos a seguir são necessários para a execução do projeto.

Primeiramente vamos baixar o projeto do GitHub.

- `git clone https://github.com/guimadalozzo/FChallenge.git`
- `cd FChallenge`

Agora, devemos baixar todas as dependências para a execução do projeto.

- `composer install`

Na sequência vamos fazer todas as configurações necessárias do ambiente, começando com a criação do banco de dados MySQL. Utilizando algum SGBD (MySQLWorkBrench, SQLMyAdmin, SQL Table, DBeaver, etc) crie o banco de dados chamado `fchallenge`.

Execute o código a seguir que irá copiar o arquivo `.env.example` para `.env`. Este arquivo é responsável pela organização e configuração das variáveis de ambiente.

- `copiar .env.example para .env`

O próximo passo é adquirir um TOKEN de acesso a API da Feegow, junto com o suporte e atendimento do sistema. Com o TOKEN disponível, adicione o conteúdo na variável de ambiente `TOKEN_FEEGOW` que está inserida no arquivo `.env`.

Por fim, temos que executar os próximos dois comandos. O primeiro gera uma chave da aplicação Laravel, enquanto o segundo executa o sistema.

- `php artisan key:generate`
- `php artisan serve`

Com a execução do último comando, você verá uma mensagem parecida com a seguinte: 

`Starting Laravel development server: http://127.0.0.1:8000`

Pronto! Acessando `http://127.0.0.1:8000` você será direcionado ao desafio desenvolvido.