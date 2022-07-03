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
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

        @livewireStyles        

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
        @yield('estilos')   

    </head>
    <body class="pagina"> 
        
        @yield('conteudo')
        
        @livewireScripts
        <script src="https://unpkg.com/flowbite@1.4.6/dist/flowbite.js"></script>
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <script>            
            AOS.init();

            var $i = 0
            const avancar = ()=>{                
                let perguntas = document.querySelectorAll('.pergunta')
                for (let [index, pergunta] of perguntas.entries()) {
                    pergunta.classList.remove('ativa')
                    if(index == $i){                        
                        pergunta.classList.add('ativa')
                    }
                }
                $i ++
            }

            avancar()

        </script>
                      
    </body>
</html>
