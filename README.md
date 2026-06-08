# 🏋️ Sistema Academia Fitness

Sistema web desenvolvido para gerenciamento de academias, permitindo o cadastro de clientes e o controle de acesso dos alunos.

## 📋 Sobre o Projeto

O Sistema Academia Fitness foi desenvolvido com o objetivo de informatizar processos administrativos de uma academia, facilitando o gerenciamento de clientes e o controle de entrada e saída dos alunos.

A aplicação utiliza PHP para o backend, MySQL para armazenamento dos dados e Bootstrap para a construção da interface responsiva.

---

## 🚀 Funcionalidades

### 👤 Gerenciamento de Clientes

* Cadastro de clientes
* Listagem de clientes
* Edição de informações
* Exclusão de registros

### 🔐 Controle de Acesso

* Registro de entrada e saída dos alunos
* Histórico de movimentações
* Consulta de acessos realizados

### 🔒 Segurança

* Sistema de autenticação
* Controle de sessões
* Proteção de páginas restritas

---

## 🛠️ Tecnologias Utilizadas

* HTML5
* CSS3
* Bootstrap
* JavaScript
* PHP
* MySQL
* XAMPP
* Git e GitHub

---

## 📂 Estrutura do Projeto

```bash
Projeto-Academia-Fitness/
│
├── index.php
├── login.php
├── logout.php
├── security.php
├── conecta.php
│
├── clientes/
│   ├── cadastrar.php
│   ├── editar.php
│   ├── excluir.php
│   └── listar.php
│
├── acesso/
│   ├── cadastrar.php
│   └── listar.php
│
├── assets/
│   ├── css/
│   ├── js/
│   └── imagens/
│
└── banco/
    └── sistema_academia.sql
```

## 🗄️ Banco de Dados

O sistema utiliza MySQL como banco de dados.

### Tabela Cliente

| Campo      | Tipo    |
| ---------- | ------- |
| id_cliente | INT     |
| nome       | VARCHAR |
| cpf        | VARCHAR |
| email      | VARCHAR |
| telefone   | VARCHAR |

### Tabela Acesso

| Campo          | Tipo |
| -------------- | ---- |
| id_acesso      | INT  |
| id_cliente     | INT  |
| data_hora      | DATE |
| tipo_movimento | INT  |

### Relacionamento

* Um cliente pode possuir vários registros de acesso.
* A tabela `acesso` possui relacionamento com a tabela `cliente` através da chave estrangeira `id_cliente`.

---

## ⚙️ Como Executar o Projeto

### 1. Clonar o Repositório

```bash
git clone https://github.com/Igor-Moraes/Projeto-Academia-Fitness.git
```

### 2. Mover para o XAMPP

Copie a pasta do projeto para:

```bash
C:\xampp\htdocs\
```

### 3. Criar o Banco de Dados

1. Abra o phpMyAdmin.
2. Crie um banco chamado:

```sql
sistema_academia
```

3. Importe o arquivo SQL do projeto.

### 4. Configurar a Conexão

Verifique o arquivo:

```php
conecta.php
```

Configure os dados de acesso ao MySQL:

```php
$host = "localhost";
$dbname = "sistema_academia";
$user = "root";
$password = "";
```

### 5. Executar

Inicie o Apache e o MySQL pelo XAMPP e acesse:

```bash
http://localhost/Projeto-Academia-Fitness
```

---

## 🎯 Objetivo Acadêmico

Este projeto foi desenvolvido para aplicação prática dos conhecimentos em:

* Programação Web
* Banco de Dados
* PHP
* CRUD
* Modelagem de Sistemas
* Controle de Sessões
* Desenvolvimento Front-end

---

## 📈 Melhorias Futuras

* Controle de mensalidades
* Cadastro de planos
* Dashboard administrativo
* Relatórios gerenciais
* Controle financeiro
* Gráficos estatísticos
* Sistema de notificações

---

## 👨‍💻 Desenvolvedores

Projeto desenvolvido para fins acadêmicos.

**Equipe de Desenvolvimento**

* Igor Moraes
* Ana Júlia de Paiva Valentim
* (Adicionar demais integrantes)

---

## 📄 Licença

Este projeto foi desenvolvido exclusivamente para fins educacionais e acadêmicos.


