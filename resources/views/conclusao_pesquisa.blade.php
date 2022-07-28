@extends('base-surv')

@section('title', 'SurvBuilder')

@section('estilos')
    <style>
        .ativa{
            display: block;
            animation-name: fadeinup;
            animation-duration: 0.6s;
        }
        @keyframes fadeinup {
            from {opacity: 0; 
                transform: translateY(200px)
            }
            to {opacity: 0.75; 
                transform: translateY(0)
            }
        }
        
    </style>
@endsection

@section('conteudo')

    <div id="pag_apresentacao">
        <div class="flex justify-center gap-8 fixed w-full top-0 left-0 z-50 p-2 drop-shadow-md ativa">
            <h2 class="w-fit text-center font-semibold text-2xl"> Obrigado por participar </h2>
        </div>
    </div>

@endsection