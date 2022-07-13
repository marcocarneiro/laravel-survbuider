@extends('base-surv')

@section('title', 'SurvBuilder')

@section('estilos')
    <style>
        .pagina{
            background-color: {{$pesquisa->bgcor}};
            color: {{$pesquisa->txtcor}};

            @if($pesquisa->bgimage)
                background-image:url({{ url('/public/uploads') }}/{{$pesquisa->bgimage}});
                background-repeat: no-repeat;
                background-position: right bottom;
                background-attachment: fixed;
            @endif
        }

        .etapas, #pag_termo_consentimento{
            display: none;
        }

        .etapas{
            position: relative;            
            display: inline-block;
            top: 4px;
            width: 100px;
            height: 26px;
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

        .pergunta{
            display: none;
        }

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

<div style="background-color: {{$pesquisa->bgcor}}" class="flex justify-center gap-8 fixed w-full top-0 left-0 z-50 p-2 drop-shadow-md">
    <h2 class="w-fit text-center font-semibold text-2xl">{{$pesquisa->titulo}}</h2>
</div>


@isset($pesquisa->txt_pag_apresentacao)
    <div id="pag_apresentacao">
        <div class="w-full h-full p-10 pt-24 flex justify-center">
            <div class="md:w-full lg:w-1/2 p-6 mb-6 bg-white/75 opacity-75 rounded-lg border border-gray-200 shadow-md">
                {{$pesquisa->txt_pag_apresentacao}}
            </div>            
        </div>
        <div class="flex justify-center mt-6">
            <button onClick="checkConsentimento()" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium 
            rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                INICIAR
            </button>
        </div>
    </div>
@endisset




@endsection