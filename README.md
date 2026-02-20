🏆 Sistema de Gerenciamento da Copa
📌 Descrição

Este sistema foi desenvolvido como projeto prático para simular a organização de uma Copa do Mundo.
A proposta foi criar uma aplicação completa, capaz de cadastrar seleções, organizar grupos, registrar jogos e calcular automaticamente a classificação.

O foco principal foi aplicar PHP Orientado a Objetos utilizando o padrão MVC, mantendo separação clara entre regras de negócio, controle e interface.

🧱 Arquitetura do Sistema

O projeto segue o padrão MVC:

Model: contém as regras de negócio e a comunicação com o banco de dados.

Controller: recebe as requisições e controla o fluxo da aplicação.

View: responsável pelas interfaces em HTML e exibição das informações.

Essa separação facilita manutenção, organização e escalabilidade do sistema.

⚙️ Funcionalidades Implementadas
🔹 Seleções

Cadastro de seleção com nome, grupo e continente

Edição e exclusão

Listagem geral

Cada seleção possui dados estatísticos que são atualizados automaticamente conforme os resultados dos jogos.

🔹 Usuários

Cadastro com nome, idade, seleção e cargo (jogador, técnico, árbitro etc.)

Edição e exclusão

Listagem completa

Permite associar usuários a suas respectivas seleções.

🔹 Grupos

Criação de grupos (A, B, C…)

Associação de seleções

Visualização das seleções por grupo

🔹 Jogos

Cadastro contendo:

Seleção mandante

Seleção visitante

Data e horário

Estádio

Grupo ou fase

Também é possível visualizar todos os jogos cadastrados.

🔹 Registro de Resultados

Ao registrar o placar de um jogo, o sistema atualiza automaticamente:

Pontuação

Vitórias

Empates

Derrotas

Saldo de gols

Gols marcados

A lógica de cálculo foi implementada diretamente na camada Model.

🔹 Classificação

A classificação é exibida por grupo e ordenada com base em:

Pontos

Saldo de gols

Gols marcados

A ordenação é feita dinamicamente conforme os resultados são registrados.

🗄️ Banco de Dados

O sistema utiliza MySQL para armazenar:

Seleções

Usuários

Grupos

Jogos

Resultados

Estatísticas

Os dados são manipulados através de classes específicas, mantendo organização e responsabilidade única por entidade.

🎯 Objetivo

O projeto teve como objetivo aplicar na prática:

Programação Orientada a Objetos

Organização em MVC

Integração com banco de dados

Manipulação de relacionamentos entre entidades

Atualização automática de estatísticas
