<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Task;

class TaskSeeder extends Seeder
{
    public function run(): void
    {
        Task::create([
        'title' => 'Configurar Ambiente de DEV',
        'description' => 'Instalar e configurar o Docker, PHP, Composer e Node.js',
        'user_id' => 1
        ]);

        Task::create([
            'title' => 'Definir Esquema do Banco',
            'description' => 'Criar as migrations para as tabelas de usuários, tarefas e projetos',
            'user_id' => 1
        ]);

        Task::create([
            'title' => 'Implementar Autenticação',
            'description' => 'Criar rotas e controllers para login, registro e logout de usuários',
            'user_id' => 1,
            'status' => 'concluida'
        ]);

        Task::create([
            'title' => 'Desenvolver CRUD de Tarefas',
            'description' => 'Implementar as funcionalidades de Criar, Ler, Atualizar e Deletar tarefas',
            'user_id' => 1
        ]);

        Task::create([
            'title' => 'Estilizar Interface Web',
            'description' => 'Aplicar CSS (ex: Tailwind) para tornar a aplicação responsiva e amigável',
            'user_id' => 1
        ]);

        Task::create([
            'title' => 'Adicionar Validações',
            'description' => 'Validar os dados de entrada nos formulários (ex: campos obrigatórios, formato de e-mail)',
            'user_id' => 1
        ]);

        Task::create([
            'title' => 'Implementar "Marcar como Concluída"',
            'description' => 'Adicionar funcionalidade para o usuário poder alterar o status da tarefa',
            'user_id' => 1
        ]);

        Task::create([
            'title' => 'Criar Testes Unitários',
            'description' => 'Escrever testes para os Models e Controllers principais da aplicação',
            'user_id' => 1
        ]);

        Task::create([
            'title' => 'Revisar Código (Code Review)',
            'description' => 'Revisar todo o código em busca de melhorias, bugs e padrões de projeto',
            'user_id' => 1
        ]);

        Task::create([
            'title' => 'Escrever Documentação',
            'description' => 'Criar um arquivo README.md explicando como instalar e rodar o projeto',
            'user_id' => 1,
            'status' => 'concluida'
        ]);

        Task::create([
            'title' => 'Preparar para Deploy',
            'description' => 'Configurar variáveis de ambiente e otimizar assets para produção',
            'user_id' => 1
        ]);

        Task::create([
            'title' => 'Subir Projeto no GitHub',
            'description' => 'Fazer o commit final e enviar o repositório para a plataforma',
            'user_id' => 1
        ]);
    }
}
