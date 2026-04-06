# BudgetCore

Sistema financeiro pessoal e escalável construído em **Laravel**, com foco em boas práticas de arquitetura, evolução incremental e potencial para open source.

## 🚀 Status atual do projeto

Atualmente o projeto já possui módulos funcionais para:

* ✅ Autenticação e dashboard
* ✅ Gestão de **clientes**
* ✅ Gestão de **fornecedores**
* ✅ Gestão de **contas/caixas**
* ✅ Controle de **movimentações de caixa**
* ✅ Módulo de **contas a pagar**

---

## 🧱 Stack

* PHP 8.3
* Laravel
* Blade
* Tailwind CSS
* Vite
* MySQL

---

## 📦 Módulos implementados

### 👥 Clientes

CRUD completo com:

* Resource Controller
* Form Requests
* ownership por usuário
* paginação
* ordenação por nome
* proteção multiusuário

### 🏢 Fornecedores

Estrutura espelhada de clientes, mantendo consistência arquitetural.

### 💰 Contas e Caixas

Cadastro de contas financeiras para representar:

* dinheiro
* banco principal
* carteira
* outras contas

Preparado para integração com pagamentos e recebimentos.

### 💸 Movimentações de Caixa

Histórico de entradas e saídas via tabela dedicada de movimentos.

Benefícios:

* saldo calculável
* histórico completo
* base robusta para auditoria

### 📉 Contas a Pagar

Módulo financeiro ligado a fornecedores.

Funcionalidades:

* vínculo com fornecedor
* vínculo opcional com conta/caixa
* valor
* vencimento
* observações
* status com enum tipado
* data de pagamento
* cálculo de vencimento dinâmico

## 🧠 Regras de domínio

O módulo de contas a pagar utiliza enum nativo do PHP:

* `Pending`
* `Paid`

Com helpers no model:

* `isPaid()`
* `isOverdue()`

---

## 🏗️ Arquitetura aplicada

O projeto segue padrões de Laravel mais profissionais:

* Form Requests para validação
* Resource Controllers
* Route Model Binding
* Eloquent Relationships
* PHP Enums
* Models com comportamento de domínio
* Índices compostos em tabelas críticas

---

## 🔒 Multi-tenant atual

Atualmente o sistema utiliza isolamento por:

* `user_id`

Cada usuário acessa apenas seus próprios dados.

Estrutura preparada para futura evolução para:

* workspaces
* contas compartilhadas
* múltiplos usuários por organização

---

## 🛣️ Roadmap

Próximos módulos planejados:

* ⏳ Contas a receber
* ⏳ Dashboard financeiro consolidado
* ⏳ Relatórios por período
* ⏳ Fluxo de caixa
* ⏳ Categorias
* ⏳ Workspace multiusuário
* ⏳ API pública

---

## 🎯 Objetivo do projeto

Além do uso pessoal, o BudgetCore está sendo desenvolvido como:

* estudo profundo de Laravel
* projeto de portfólio
* base escalável para open source
* showcase de arquitetura backend

---

## ▶️ Como rodar

```bash
composer install
npm install
cp .env.example .env
php artisan key:generate
php artisan migrate
npm run dev
php artisan serve
```
