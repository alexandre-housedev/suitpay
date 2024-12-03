# Suitpay Teste

Este projeto é um mini sistema de testes desenvolvido da SuitPay para gerenciar alunos e cursos utilizando Docker, Laravel e Docker Compose. Este documento descreve como configurar o ambiente de desenvolvimento, executar o projeto, e rodar os seeds.

## Pré-requisitos

Antes de começar, você precisa ter as seguintes ferramentas instaladas em sua máquina para executar o projeto:

- **Docker**: [Download Docker](https://www.docker.com/products/docker-desktop)
- **Docker Compose**: O Docker Compose já vem com o Docker Desktop, mas se necessário, pode ser instalado separadamente. Veja a documentação de instalação [aqui](https://docs.docker.com/compose/install/).
- **Git**: [Download Git](https://git-scm.com/downloads)

## Configuração do ambiente

### 1. Clonar o repositório

Primeiro, clone este repositório para sua máquina:

```bash
git https://github.com/alexandre-housedev/suitpay
cd suitpay
```

### Env

Neste projeto temos .env de ambiente de homologação e produção que você pode configurar no arquivo Dockerfile.

```bash
# Copie o arquivo .env-producao ou .env.-homologacao e renomeia para .env
RUN cp .env-homologacao .env

```
### Rodar as migrations e seeds
Para popular o banco de dados com as tabelas e dados iniciais (seeds), execute os seguintes comandos dentro do container Laravel.

Primeiro, acesse o container do Laravel:

```bash
docker-compose exec app bash

```

### Dentro do container, vamos executar as migrations e seeds:

```bash
php artisan migrate --seed
```

### Acessar o projeto
Depois executar os passos iniciais, vamos acessar localmente o projeto:

```bash
http://localhost:8000

```