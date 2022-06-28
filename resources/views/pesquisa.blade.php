<p>{{$pesquisa->titulo}}</p>

<ol>
@foreach ($perguntas as $pergunta)
    <li>{{$pergunta->txt_pergunta}} <br>
        @foreach ($opcoesResposta as $opcao)
            {{$opcao}} <br>
        @endforeach
    </li>
@endforeach
</ol>