# ImmoValuation - Aplicação para geração de laudos de avaliações de imóveis

## Descrição

O ImmoValuation é uma API desenvolvida com PHP e Laravel para facilitar o trabalho de corretores e avaliadores de imóveis. A API permite que o corretor/avaliador insira as características de um imóvel e, ao final, gera automaticamente um laudo técnico que pode ser baixado em formato PDF. O objetivo é otimizar o processo de avaliação, economizando tempo e reduzindo erros manuais.

## Funcionalidades

-   Cadastro de usuário/corretor
-   Cadastro de imóvel
-   Geração automática de imóveis com as informações inseridas pelo corretor/avaliador
-   Download de laudos em PDF
-   Suporte a OTP (One-Time-Password) para validar email do usuário
-   Autenticação tanto por email quanto pelo CRECI com tokens JWT

## Requisitos

-   PHP >= 8.3
-   Composer
-   Postgres
-   Laravel 11.x

## Instalação

1 - Clone o repositório:

```bash
  > git clone https://github.com/seu-usuario/immo-valuation.git
  > cd immo-valuation
```

2 - Instale as dependências

```bash
  > composer install
```

## Pacotes utilizados

`tech-ed/simpl-otp`
