# BudgetCore

Sistema financeiro pessoal e escalável construído em **Laravel**, com foco em **arquitetura limpa, evolução incremental, modelagem de domínio financeiro e potencial real para open source/SaaS**.

O projeto já está em fase funcional, com módulos financeiros consistentes e uma base sólida para crescimento em portfólio e produto.

---

## 🚀 Status atual do projeto

Atualmente o BudgetCore já possui módulos funcionais para:

* ✅ Autenticação e dashboard
* ✅ Gestão de **clientes**
* ✅ Gestão de **fornecedores**
* ✅ Gestão de **contas/caixas**
* ✅ Controle de **movimentações de caixa**
* ✅ Módulo de **contas a pagar**
* ✅ Base inicial de **contas a receber**
* ✅ Sidebar e navegação modular
* ✅ Testes iniciais de features

---

## 🧱 Stack

* PHP 8.3
* Laravel 12
* Blade
* Tailwind CSS
* Vite
* MySQL
* Breeze
* PHPUnit / Pest

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
* policies implícitas por ownership

### 🏢 Fornecedores

Estrutura espelhada de clientes, mantendo consistência arquitetural e reaproveitamento de padrões.

### 💰 Contas e Caixas

Cadastro de contas financeiras para representar:

* dinheiro
* banco principal
* carteira
* outras contas

Preparado para integração com pagamentos, recebimentos e dashboards consolidados.

### 💸 Movimentações de Caixa

Histórico de entradas e saídas via tabela dedicada de movimentos (`cash_movements`).

Benefícios:

* saldo calculável
* histórico completo
* trilha de auditoria
* reconstrução de saldo
* base robusta para relatórios

### 📉 Contas a Pagar

Módulo financeiro ligado a fornecedores.

Funcionalidades:

* vínculo com fornecedor
* vínculo opcional com conta/caixa
* valor
* vencimento
* observações
* status extensível
* data de pagamento
* cálculo de vencimento dinâmico

### 📈 Contas a Receber

Base do domínio já preparada para:

* vínculo com clientes
* recebimento por conta
* baixa futura
* projeção de entradas

---

## 🧠 Regras de domínio

O módulo financeiro segue modelagem orientada a domínio.

Atualmente contas a pagar utiliza **enum nativo do PHP**, com evolução planejada para status integer extensível.

Status atuais:

* `Pending`
* `Paid`

Helpers no model:

* `isPaid()`
* `isOverdue()`

Direção futura:

* cancelled
* partially_paid
* scheduled
* recurring

---

## 🏗️ Arquitetura aplicada

O projeto segue padrões profissionais de Laravel:

* Form Requests para validação
* Resource Controllers
* Route Model Binding
* Eloquent Relationships
* PHP Enums
* Models com comportamento de domínio
* Índices compostos em tabelas críticas
* Paginação consistente
* ownership-safe queries
* arquitetura preparada para Service Layer

---

## 🔒 Multi-tenant atual

Atualmente o sistema utiliza isolamento por:

* `user_id`

Cada usuário acessa apenas seus próprios dados.

Estrutura preparada para futura evolução para:

* workspaces
* contas compartilhadas
* múltiplos usuários por organização
* SaaS multi-tenant

---

## 🧪 Qualidade de software

Foco atual da evolução:

* aumento de cobertura de testes
* melhoria visual para showcase
* padronização de componentes Blade
* branding BUD
* preparação para open source

---

## 🛣️ Roadmap

Próximos módulos planejados:

* ⏳ Contas a receber completo
* ⏳ Dashboard financeiro consolidado
* ⏳ Relatórios por período
* ⏳ Fluxo de caixa
* ⏳ Categorias
* ⏳ Metas financeiras
* ⏳ Workspace multiusuário
* ⏳ API pública
* ⏳ Exportação CSV/PDF

---

## 🎯 Objetivo do projeto

Além do uso pessoal, o BudgetCore está sendo desenvolvido como:

* estudo profundo de Laravel
* projeto de portfólio premium
* base escalável para open source
* showcase de arquitetura backend
* possível SaaS financeiro futuro

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
