@extends('base-surv')

@section('title', 'SurvBuilder')

@section('conteudo')

<p>{{$pesquisa->titulo}}</p>

<ol>
@foreach ($perguntas as $pergunta)
    <li>{{$pergunta->txt_pergunta}} <br>
        
        @foreach ($opcoesResposta as $opcao)
            @for ($i = 0; $i < count($opcao); $i++)
                @if($pergunta->id == $opcao[$i]->id_pergunta)
                    {{ $opcao[$i]->txt_opc_resposta }}
                @endif
            @endfor
        @endforeach
    </li>
@endforeach
</ol>


@endsection