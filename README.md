## Visão Geral

O Feedbacker é um projeto composto por um painel administrativo para acompanhar e organizar os feedbacks recebidos, além
de um widget fácil de incorporar em qualquer site, proporcionando uma experiência simples e eficaz para os visitantes
compartilharem seus feedbacks.

Inicialmente na versão v1 foi desenvolvido com PHP Laravel e Nuxt com Javascript e agora na v2 a ideia é reescrever o
backend usando Hyperf e o frontend em typescript.

## Estrutura do Projeto

O projeto está organizado em quatro pastas principais:

### Backend

Localizado na pasta `/backend`, o backend é desenvolvido com PHP 8.3 e Swoole, usando como framework o Hyperf.

- Autenticação de usuários
- Gerenciamento de feedbacks
- Controle de acesso
- Armazenamento de dados

### Dashboard

Localizado na pasta `/dashboard`, é uma aplicação frontend desenvolvida com Nuxt.js 3 e Vue 3, oferecendo:

- Interface de usuário intuitiva para gerenciamento de feedbacks
- Autenticação segura
- Visualização e filtragem de feedbacks por tipo
- Gerenciamento de conta e tokens de API
- Estatísticas e resumos dos feedbacks recebidos

### Widget

Localizado na pasta `/widget`, é um componente web independente desenvolvido com Nuxt.js que pode ser incorporado em
qualquer site para:

- Coletar feedbacks dos usuários em tempo real
- Oferecer interface amigável e responsiva
- Capturar automaticamente informações do dispositivo e da página
- Enviar dados de forma segura para o backend

### TryWidget

Localizado na pasta `/tryWidget`, é uma página de demonstração para testar o funcionamento do widget em ambiente
controlado.

## Stack

### Backend

- PHP 8.3
- ~~Laravel 10~~
- ~~Laravel Sanctum para autenticação via tokens~~
- ~~MySQL 9.3 (via Docker)~~

### Frontend Dashboard

- Vue.js 3.4
- Nuxt.js 3.11
- TypeScript
- Tailwind CSS
- Pinia para gerenciamento de estado

### DevOps

- Docker e Docker Compose para ambientes de desenvolvimento
- ~~GitHub Actions para CI/CD~~
- ~~Vercel para deploy~~

### Testes na Dashboard

- Cypress para testes E2E
- Vitest para testes unitários

## Sobre o sistema

### Tipos de Feedback

O sistema suporta três categorias principais de feedback:

- **Issue**: Para reportar problemas ou bugs
- **Idea**: Para sugestões de melhorias ou novas funcionalidades
- **Other**: Para comentários gerais ou outros tipos de feedback

## Modelo de Dados

### Feedback

Cada feedback contém:

- : Tipo do feedback (ISSUE, IDEA, OTHER) `type`
- : Mensagem do feedback `text`
- : URL da página onde o feedback foi enviado `page`
- : Chave de API do site `api_key`
- : Informações sobre o dispositivo do usuário `device`
- : Identificador único do usuário `fingerprint`
- `user`: ID do usuário dono do site

## Instalação e Configuração

😕Informações ainda desatualizadas, em breve serão atualizadas.

### Backend (Laravel)

1. Clone o repositório
2. Configure o arquivo baseado no `.env``.env.example`
3. Execute:
   cd laravel
   composer install
   php artisan migrate
   php artisan serve

### Dashboard

1. Configure o arquivo baseado no `.env``.env.example`
2. Execute:
   cd dashboard
   npm install
   npm run dev

### Widget

1. Configure o arquivo baseado no `.env``.env.example`
2. Execute:
   cd widget
   npm install
   npm run dev

### Usando Docker

Para executar o ambiente completo com Docker:
docker-compose up -d

## Integrando o Widget

Para incorporar o widget em seu site:

1. Obtenha sua chave de API no dashboard após criar uma conta
2. Adicione o snippet de código fornecido pelo dashboard ao seu site
3. Personalize as opções conforme necessário

