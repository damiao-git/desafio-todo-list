## Desafio Prático 1 - Backend com Laravel:

Você precisa criar um sistema de gerenciamento de tarefas simples com as seguintes especificações:

## Modelo: Task com os campos:

`id` (chave primária, auto-incremento)

`title` (string, obrigatório)

`description` (text, opcional)

`status` (enum: 'pending', 'in_progress', 'completed', padrão: 'pending')

`due_date` (data, obrigatório)

## Requisitos:

- Criar as migrações para a tabela tasks.
- Criar um controller com os métodos para:
- Listar todas as tarefas.
- Criar uma nova tarefa.
- Atualizar o status de uma tarefa.
- Deletar uma tarefa.
- Aplicar validações adequadas para o cadastro/edição de tarefas.

### Extras:

- Implementar uma API Resource para o retorno das tarefas.
- Adicionar uma rota específica para buscar tarefas por status (ex.: /tasks/status/{status}).

### Tarefa:
- Descreva os passos que você seguiria para implementar essa funcionalidade, e, se possível, forneça o código do migration e de uma das rotas no controller.

- Quando estiver pronto, compartilhe o que conseguiu!
