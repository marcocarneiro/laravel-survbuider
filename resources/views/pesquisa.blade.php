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
        
        
    </style>
@endsection

@section('conteudo')

<div style="background-color: {{$pesquisa->bgcor}}" class="fixed w-full p-2 top-0 left-0 drop-shadow-md">
    <h2 class="text-center font-semibold">{{$pesquisa->titulo}}</h2>
</div>

<div class="w-full h-full p-10 pt-24">
        
        @foreach ($perguntas as $pergunta)
            <div class="pergunta w-full p-6 mb-6 bg-white opacity-75 rounded-lg border border-gray-200 shadow-md" data-aos="fade-up">
            {{$pergunta->txt_pergunta}}
                
                @foreach ($opcoesResposta as $opcao)
                    @for ($i = 0; $i < count($opcao); $i++)
                        @if($pergunta->id == $opcao[$i]->id_pergunta)
                            {{ $opcao[$i]->txt_opc_resposta }}
                        @endif
                    @endfor
                @endforeach
            </div>
        @endforeach
        
</div>

@endsection