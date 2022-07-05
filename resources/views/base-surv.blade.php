<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>SurvBuilder | @yield('title')</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <link rel="stylesheet" href="{{ url('/') }}/css/base.css">

        @livewireStyles        

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
        @yield('estilos')   

    </head>
    <body class="pagina"> 
        
        @yield('conteudo')
        
        @livewireScripts
        <script src="https://unpkg.com/flowbite@1.4.6/dist/flowbite.js"></script>
        <script>

            var $i = -1
            const avancar = ()=>{
                $i ++
                showHideBt()
                                      
                let perguntas = document.querySelectorAll('.pergunta')
                for (let [index, pergunta] of perguntas.entries()) {
                    pergunta.classList.remove('ativa')
                    if(index == $i){                        
                        pergunta.classList.add('ativa')
                    }
                }
            }

            const retornar = ()=>{
                $i --
                showHideBt()
                let perguntas = document.querySelectorAll('.pergunta')
                for (let [index, pergunta] of perguntas.entries()) {
                    pergunta.classList.remove('ativa')
                    if(index == $i){                        
                        pergunta.classList.add('ativa')
                    }
                }
            }

            const showHideBt = ()=>{
                let perguntas = document.querySelectorAll('.pergunta')
                let botoesRetorna = document.querySelectorAll('.bt-retorna')
                let botoesAvanca = document.querySelectorAll('.bt-avanca')
                for (let btRetorna of botoesRetorna) {
                    if($i <= 0){
                        btRetorna.classList.add('hidden')
                    }else{
                        btRetorna.classList.remove('hidden')
                    }
                }

                for (let btAvanca of botoesAvanca) {
                    if($i >= perguntas.length-1){
                        btAvanca.classList.add('hidden')
                        document.getElementById('btn_submit').classList.remove('hidden')
                    }else{
                        btAvanca.classList.remove('hidden')
                        document.getElementById('btn_submit').classList.add('hidden')
                    }                
                }
            }

            avancar()

            /*

            <style>
                .etapas{
                    position: relative;
                    display: inline-block;
                    width: 100px;
                    height: 26px;
                    top: 8px;
                    border: 1px solid #ccc;
                }
                .etapas .txt-barra{
                    display: block;
                    position: absolute;
                    top: 0;
                    left: 0;
                    z-index: 110;
                    width: 100%;
                    text-align: center;
                    line-height: 26px;
                    font-size: 12px;
                }
                .etapas .moldura{
                    overflow: hidden;
                    height: 100%;
                }
                .etapas .moldura .barra{
                    width: 100%;
                    height: 100%;
                    background-color: #9df;
                }
            </style>

            //barra de progressão
            function barraProgress()
            {
                var etapa;
                $('.tela').each(function(index, element) {
                if ($(element).hasClass('ativa'))
                {
                    etapa = index + 1;
                }
                });
                var countEtapas = $('.tela').length;
                var porcentagem = Math.round((etapa / countEtapas)*100);
                var texto = etapa +' / '+ countEtapas;
                if(etapa == countEtapas){ texto = 'Finalizando...';}
                
                $('.etapas .txt-barra').text(texto);
                $('.etapas .moldura').css('width', porcentagem+'%');
            }

            function avancar()
            {
                $('.tela').each(function(index, element) {
                $('html, body').scrollTop(0);
                if ($(element).hasClass('ativa')) {
                    var nextEl = $(this).next();
                    $(this).removeClass('ativa');
                    $(nextEl).addClass('ativa');
                    barraProgress();            
                    return false;
                }
                });
            }
            function retornar()
            {
                $('.tela').each(function(index, element) {
                $('html, body').scrollTop(0);
                if ($(element).hasClass('ativa')) {
                    var prevEl = $(this).prev();
                    $(this).removeClass('ativa');
                    $(prevEl).addClass('ativa');
                    barraProgress();
                    return false;
                }
                });
            }

            */

        </script>
                      
    </body>
</html>
