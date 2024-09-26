# ImmoValuation - Aplicação para Geração de Laudos de Avaliações de Imóveis

## Descrição

O ImmoValuation é uma API desenvolvida com PHP e Laravel para facilitar o trabalho de corretores e avaliadores de imóveis. A API permite que o corretor/avaliador insira as características de um imóvel e, ao final, gera automaticamente um laudo técnico que pode ser baixado em formato PDF. O objetivo é otimizar o processo de avaliação, economizando tempo e reduzindo erros manuais.

## Funcionalidades

-   Cadastro de usuário/corretor
-   Cadastro de imóvel
-   Geração automática de laudos com as informações inseridas pelo corretor/avaliador
-   Download de laudos em PDF
-   Suporte a OTP (One-Time-Password) para validar o email do usuário
-   Autenticação tanto por email quanto pelo CRECI com tokens JWT

## Requisitos

-   PHP >= 8.3
-   Composer
-   PostgreSQL
-   Laravel 11.x

## Instalação

1. Clone o repositório:

    ```bash
    git clone https://github.com/seu-usuario/immo-valuation.git
    cd immo-valuation
    ```

```bash
  composer install
```

-   Pacotes Utilizados
    -   tech-ed/simpl-otp - Para validação de email usando OTP.
    -   Rotas
    -   As rotas da API estão organizadas em diferentes arquivos para melhor modularidade. Abaixo estão as rotas disponíveis atualmente:

require **DIR** . '/api/v1/user.php'; // Rotas relacionadas ao cadastro e gerenciamento de usuários
require **DIR** . '/api/v1/reports/report.php'; // Rotas para criação e gestão de laudos
require **DIR** . '/api/v1/login/login.php'; // Rotas para autenticação de usuários
Exemplos de Uso das Rotas

1. Cadastro de Usuário
   Método: POST
   Rota: /api/v1/users
   Descrição: Cadastra um novo usuário/corretor.
2. Cadastro de Imóvel
   Método: POST
   Rota: /api/v1/reports
   Descrição: Cadastra um novo imóvel e gera o laudo correspondente.
3. Geração de Laudos
   Método: GET
   Rota: /api/v1/reports/{id}/download
   Descrição: Gera e faz o download do laudo em PDF para o imóvel especificado pelo ID.
4. Autenticação
   Método: POST
   Rota: /api/v1/login
   Descrição: Realiza login do usuário utilizando email e senha ou CRECI.
   Conclusão
   O ImmoValuation visa simplificar o processo de avaliação de imóveis, permitindo que corretores e avaliadores concentrem-se em suas atividades principais. Para mais informações e atualizações, consulte a documentação interna ou entre em contato com a equipe de desenvolvimento.

### Como Usar

-   **Rotas**: Incluí exemplos de uso para cada rota, o que pode ajudar os desenvolvedores a entender como interagir com sua API.
-   **Descrição**: Aumentei a clareza da descrição e funcionalidade do projeto, para que novos desenvolvedores ou usuários possam entender rapidamente o propósito do ImmoValuation.

Se você precisar adicionar mais detalhes ou quiser discutir mais funcionalidades, estou aqui para ajudar!
