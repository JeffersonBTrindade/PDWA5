# Projeto de PDWA5

Para realizar o projeto da disciplina de Programação Dinâmica para Web escolhemos criar uma pequena aplicação para cadastro de musicas e de suas categorias, além da adição de avaliações para as músicas cadastradas


## Configuração projeto

### 1. Criar arquivo **.env**

> Renomear o arquivo **.env.example** para **.env**

--- 

### 2. Instalar pacotes do composer

Executar o comando:

        composer update

---

### 3. Rodar as migrates a partir do Artisan

Executar o comando:

        php artisan migrate

---

### 3. Subir servidor local

Por padrão sobe na porta 8000

Executar o comando:

        php artisan serve

---

## Documentação Swagger

Todas as informações das rotas da aplicação podem ser encontradas no Swagger gerado pelo pacote **L5 Swagger**.

Para gerar o Swagger da aplicação, basta seguir os seguintes passos:

1. Gerar o Swagger pelo artisan

        php artisan l5-swagger:generate

2. Acessar a URL padrão (`http://localhost:8000/api/documentation`) ou a configurada na aplicação

---

---

## Integrantes:
- Jefferson de Brito Trindade SP3060128
- Igor Kazuhiko Ujiie SP3061973
- Denysson Max SP3063763
