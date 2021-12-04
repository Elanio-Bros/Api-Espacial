# StarGrid – Teste Desevolvedor(a) Backend N3

&nbsp;
## Configurações da Aplicação
Primeiro crie um arquivo ou faça um clone do .env [`exemplo do arquivo env`](https://github.com/Elanio-Bros/jobs-dev-n3/blob/main/.env.example) os requisitos para mudança são:
1. DB_HOST-> IP
2. DB_PORT-> Porta
3. DB_DATABASE -> Nome do Banco
4. DB_USERNAME -> Usuário 
5. DB_PASSWORD -> Senha

&nbsp;
Esse requisitos são importantes pra a configuração do **Banco De Dados**

&nbsp;
Depois digite os commandos:
1. `composer install`-> para instalar as dependências
2. `php artisan key:generate`-> para gerar uma chave de criptografia
3. `php artisan migrate`-> para criar todas as migrações e tabelas
4. `php artisan serve`-> para iniciar o servidor


&nbsp;
## Lógica

&nbsp;
A API tem como função acessar dados de outra API para pegar informações salvar
