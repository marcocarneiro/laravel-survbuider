<!DOCTYPE html>
<html lang="pt-BR">
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
                barraProgress()
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
                barraProgress()
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

            const barraProgress = ()=>{
                let perguntas = document.querySelectorAll('.pergunta')
                let count = perguntas.length
                let percentual = Math.round((($i+1) / count)*100);
                let texto = ($i+1) +' / '+ count;
                document.querySelector('.txt-barra').innerText = texto
                document.querySelector('.etapas .moldura').style.width = percentual +'%'
            }

            avancar()

        </script>
                      
    </body>
</html>
