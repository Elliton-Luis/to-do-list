# To-Do App

Este é um projeto de aplicação web para gerenciamento de tarefas (To-Do List), construído com o framework Laravel. A aplicação é segura, multiusuário (cada usuário só vê suas próprias tarefas) e possui uma interface limpa e responsiva construída com Tailwind CSS.

---

## Funcionalidades Principais

A aplicação implementa um sistema completo de autenticação e gerenciamento de tarefas.

**Autenticação Completa:** A aplicação oferece um sistema de login e cadastro seguro, com recursos de conveniência como "Lembrar-me" e toggle de visibilidade de senha. O acesso é rigidamente controlado, separando as áreas públicas (login/cadastro) das áreas privadas da aplicação.

**Gerenciamento de Tarefas:** O foco principal é um CRUD (Criar, Ler, Atualizar, Deletar) de tarefas. O usuário pode criar, editar e visualizar os detalhes de suas tarefas. A lista principal é organizada e permite filtros por status (pendente ou concluída).

**Sistema de Lixeira (Soft Deletes):** A exclusão de tarefas é segura. Itens são movidos para uma lixeira, permitindo que o usuário possa restaurar a tarefa para sua lista principal ou excluí-la permanentemente.

## Tecnologias Utilizadas

    Back-end: Laravel 11 / PHP

    Front-end: Blade (views) e Tailwind CSS (estilização)

    Interatividade: Alpine.js

    Banco de Dados: (Configurado para MySQL/MariaDB, mas compatível com outros)

## Como Rodar o Projeto Localmente

Siga os passos abaixo para configurar e executar o projeto em seu ambiente de desenvolvimento.

Pré-requisitos

    PHP (>= 8.2)

    Composer

    Node.js e NPM (ou Yarn)

    Um servidor de banco de dados (ex: MySQL, MariaDB, PostgreSQL)

1. Clonar o Repositório

```
    git clone https://github.com/Elliton-Luis/to-do-list
    cd to-do-list
```

2. Instalar Dependências (PHP)

```
composer install
```

3. Configurar o Ambiente

Copie o arquivo de exemplo .env e gere a chave da aplicação:

```
cp .env.example .env

php artisan key:generate
```

4. Configurar o Banco de Dados

Abra o arquivo .env e edite as variáveis DB_ com as credenciais do seu banco de dados local:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=todo_app
DB_USERNAME=root
DB_PASSWORD=
```

5. Rodar as Migrations

Este comando criará as tabelas users e tasks (com Soft Deletes) no seu banco de dados:

```
php artisan migrate
```

6. Instalar Dependências (JavaScript)

```
npm install
```

7. Compilar os Assets (Tailwind)
```
npm run dev
```
(Para produção, você usaria npm run build)

8. Iniciar o Servidor

Com o npm run dev rodando em um terminal, abra outro terminal e inicie o servidor do Laravel:
```
php artisan serve
```
A aplicação estará disponível em http://127.0.0.1:8000.
