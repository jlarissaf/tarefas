# Sistema de Gerenciamento de Tarefas

Este projeto é um sistema web simples para **gerenciamento de tarefas**, desenvolvido em **PHP** com **MySQL**.
Ele permite cadastrar, editar, excluir e organizar tarefas, além de destacar tarefas com custo elevado.

## Funcionalidades

* Cadastro de novas tarefas
* Edição de tarefas existentes
* Exclusão de tarefas
* Ordenação manual das tarefas
  * Botões de subir e descer
  * Arrastar e soltar (Drag and Drop)
* Destaque visual para tarefas com **custo maior que R$1000**
* Validação de dados no formulário
* Soma total dos custos exibida no rodapé da tabela
* Confirmação antes de excluir uma tarefa

## Estrutura do Projeto

```
sistema/
│
├── conexao.php      # Conexão com o banco de dados
├── index.php        # Página inicial do sistema
├── inicial.php      # Listagem das tarefas
├── incluir.php      # Cadastro de nova tarefa
├── editar.php       # Edição de tarefa
├── excluir.php      # Exclusão de tarefa
├── subir.php        # Move tarefa para cima
├── descer.php       # Move tarefa para baixo
└── ordenar.php      # Atualiza ordem após drag and drop
```

## Tecnologias Utilizadas

* PHP
* MySQL
* HTML
* CSS
* JavaScript
* XAMPP (ambiente de desenvolvimento)

## Banco de Dados

Tabela utilizada:

```sql
CREATE TABLE tarefas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    custo DECIMAL(15,2) NOT NULL,
    datalimite DATE NOT NULL,
    ordem_apresentacao INT
);
```

## Como Executar o Projeto

1. Instale o **XAMPP**.
2. Inicie os serviços **Apache** e **MySQL**.
3. Copie a pasta do projeto para:

```
xampp/htdocs/
```

4. Crie o banco de dados no **phpMyAdmin**.
5. Configure os dados de conexão no arquivo `conexao.php`.

Exemplo:

```php
$mysqli = new mysqli(
    "localhost",
    "root",
    "",
    "tarefas"
);
```

6. Acesse no navegador:

```
http://localhost/sistema
```

## Autor

Projeto desenvolvido por **Larissa Julie**
Estudante de Engenharia de Redes de Comunicação - Universidade de Brasília

## Observações

Este projeto foi desenvolvido para fins acadêmicos, com o objetivo de praticar conceitos de:

* CRUD com PHP
* Manipulação de banco de dados MySQL
* Validação de formulários
* Manipulação de DOM com JavaScript
* Organização de tarefas com drag and drop

## 🌐 Sistema Online

O projeto está hospedado e pode ser acessado em:

🔗 http://listatarefas.ct.ws

