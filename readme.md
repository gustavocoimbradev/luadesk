# 🌙 Lua/desk

O **Lua/desk** é um sistema de gerenciamento de tickets (chamados) de código aberto, focado em agilidade e organização. Desenvolvido com uma arquitetura moderna, ele oferece uma experiência de Single Page Application (SPA) fluida para o suporte e comunicação entre equipes.

<div align="center">
  <video src="https://github.com/user-attachments/assets/12d9e211-6d5f-40de-8c48-b948082fcee0" width="100%" controls autoplay loop muted>
    Seu navegador não suporta a visualização de vídeos.
  </video>
</div>

---

### 📋 Pré-requisitos

- **PHP 8.2+**
- **Composer**
- **Node.js & NPM**

### 🛠️ Passo a passo

1. **Clone o repositório:**

    ```bash
    git clone https://github.com/gustavocoimbradev/luadesk.git
    cd luadesk
    ```

2. **Como rodar localmente:**

    Com Docker

    ```bash
    docker compose build -d --build
    ```

    Sem docker (requer PHP 8.3, Composer, Node, Mysql)

    ```bash
      composer run setup
      composer run dev
    ```

---

## 🔐 Acesso para testes

A senha para todas as contas pré-configuradas é: `password`.

### 🛠️ Administradores

- `admin1@example.com`
- `admin2@example.com`
- `admin3@example.com`

### 👤 Usuários padrão

- `user1@example.com`
- `user2@example.com`
- `user3@example.com`

---

## 🛠️ Tecnologias utilizadas

- **Backend:** [Laravel 12](https://laravel.com)
- **Frontend:** [Vue.js 3](https://vuejs.org) (Composition API)
- **Ponte de Dados:** [Inertia.js](https://inertiajs.com) (Experiência SPA)
- **Estilização:** [Tailwind CSS](https://tailwindcss.com)

---

## 📝 Licença

Este projeto é um software de código aberto (open-source) licenciado sob a [MIT license](https://opensource.org/licenses/MIT).
