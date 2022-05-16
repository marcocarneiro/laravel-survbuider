# Livewire Survbuilder
Construtor de pesquisas com dashboard para criação, edição e visualização das pesquisas desenvolvido em Laravel / Livewire. <br>
FRONT-END utilizando Tailwind.

## Dicas


## Tabelas
- tabela pesquisas - Armazena as pesquisas construídas, campos: <br>
<b>titulo</b> - Título da pesquisa, <br>
slug - Nome curto da pesquisa, <br> 
pesquisa_inicio - data e hora para início da pesquisa, <br>
pesquisa_final - data e hora para o término da pesquisa, <br>
perguntas_por_tela - Define quantas pereguntas serão exibidas a cada tela <br><br>
- tabela perguntas - Armazena as perguntas de uma pesquisa - campos: <br>
id_pesquisa - a qual pesquisa pertence, <br>
tipo - tipo de pergunta com opções texto, checkbox, radio, textarea <br>
resposta_pai - id da opção de resposta que deverá exibir a pergunta em questão <br> 

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.


