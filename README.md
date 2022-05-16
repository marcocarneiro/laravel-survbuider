# Livewire Survbuilder
Construtor de pesquisas com dashboard para criação, edição e visualização das pesquisas desenvolvido em Laravel / Livewire. FRONT-END utilizando Tailwind.

## Dicas
- Antes de utilizar, pode-se criar uma pesquisa de teste apenas para verificar o funcionamento da ferramenta
- Tipos de usuário: <b>Administrador</b> que pode criar e editar pesquisas / <b>Leitor</b> que pode apenas visualizar os resultados

## Tabelas
- <b>tabela pesquisas</b> - Armazena as pesquisas construídas, campos: <br>
<b>titulo</b> - Título da pesquisa, <br>
<b>slug</b> - Nome curto da pesquisa, <br> 
<b>pesquisa_inicio</b> - data e hora para início da pesquisa, <br>
<b>pesquisa_final</b> - data e hora para o término da pesquisa, <br>
<b>perguntas_por_tela</b> - Define quantas pereguntas serão exibidas a cada tela <br>

- <b>tabela perguntas</b> - Armazena as perguntas de uma pesquisa - campos: <br>
<b>id_pesquisa</b> - A qual pesquisa pertence, <br>
<b>tipo</b> - Tipo de pergunta com opções text, number, checkbox, radio, textarea <br>
<b>texto</b> - Texto da pergunta <br>
<b>resposta_pai</b> - id da opção de resposta que deverá exibir a pergunta em questão, valor 0 indica pergunta independente de resposta do usuário <br>

- <b>tabela resultados</b> - Respostas dos participantes da pesquisa, esta tabela gera os relatórios e gráficos das pesquisas - campos: <br>
<b>id_pesquisa</b> - A qual pesquisa pertence, <br>
<b>aceite</b> - Aceite do participante após a leitura da página inicial da pesquisa <br>
<b>ip_usuario</b> - IP do usuário no momento em que inicia a pesquisa <br>
<b>navegador</b> - Navegador do usuário no momento em que inicia a pesquisa <br>
<b>data_hora_inicio</b> - Data e hora quando usuário iniciou a pesquisa <br>
<b>data_hora_final</b> - Data e hora quando usuário finalizou a pesquisa <br>
<b>dados</b> - Respostas do usuário no formato JSON <br>
<b>completo</b> - Booleano, indica se o usuário finalizou a pesquisa ou não <br>


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

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>


