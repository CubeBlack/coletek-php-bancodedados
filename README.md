# Coletek: PHP + Banco de Dados
Teste para vaga de desnvolvedor PHP

# Desafio proposto

## Objetivo

Criar um Crud simples, totalmente desenvolvido em PHP, sem a utilização de frameworks, onde será possível 

Criar/Editar/Excluir/Listar usuários. O sistema também deve possuir a possibilidade de vincular/desvincular vários setores ao usuário. Deve existir um filtro de usuários por setor.

## Estrutura de banco de dados

A seguinte estrutura será utilizada para persistência dos dados, podendo ser alterada a qualquer momento para melhor funcionamento do sistema:

    tabela: users
        id      int not null auto_increment primary key
        name    varchar(100) not null
        email   varchar(100) not null
    tabela: setores
        id      int not null auto_increment primary key
        name    varchar(50) not null
    tabela: user_setores
        setor_id  int
        user_id   int

## Start

Este projeto pode ser em  sqlite ou Mysql. Está livre para criar o arquivo de conexão e ou parâmetros de conexão.

## Pontos que serão levados em conta
- Funcionalidade
- Organização do código e projeto
- Apresentação da interface (Poderá usar frameworks CSS como Bootstrap, Material, Foundation etc)
- Conceitos MVC
- Solid
- Recursividade para o DB (está livre para criação de procedures ou functions para serem chamadas pelo código php)

