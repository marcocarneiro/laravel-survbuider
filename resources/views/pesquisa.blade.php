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

<div style="background-color: {{$pesquisa->bgcor}}" class="fixed w-full p-2 top-0 left-0 drop-shadow-md">
    <h2 class="text-center font-semibold">{{$pesquisa->titulo}}</h2>
</div>

<div class="w-full h-full p-10 pt-24">        
    
    @foreach ($perguntas as $pergunta)
        <div class="pergunta w-full p-6 mb-6 bg-white/75 opacity-75 rounded-lg border border-gray-200 shadow-md">
        {{$pergunta->txt_pergunta}}
            
            @foreach ($opcoesResposta as $opcao)
                @for ($i = 0; $i < count($opcao); $i++)
                    @if($pergunta->id == $opcao[$i]->id_pergunta)
                        {{ $opcao[$i]->txt_opc_resposta }}
                    @endif
                @endfor
            @endforeach

            <div class="flex justify-center mt-6">
                <button onClick="avancar()" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium 
                rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                    Prosseguir
                </button>
            </div>
        </div>
    @endforeach

    
        
</div>

@endsection