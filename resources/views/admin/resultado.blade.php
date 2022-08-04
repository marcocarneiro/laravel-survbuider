@extends('admin.base-datatablesjs')

@section('title', 'RESULTADOS')

@section('conteudo')

<?php
    $dados = array(
        'perguntas' => array(
            'questao-1' => 'pergunta 1 - checkbox',
            'questao-2' => 'pergunta 2 - number',
            'questao-3' => 'pergunta 3 - radio'
        ),
        'respostas' => array(
            'content-1a' => 'opção a',
            'content-1b' => 'opção b'
        ),
        array('content-2' => '10'),
        array('content-3' => 'sim')
    );

    $response = json_encode($dados, JSON_UNESCAPED_UNICODE);
    dd($response);

    /* $dados = '{
        "perguntas": [{
            "questao-1": "pergunta 1 - checkbox",
            "questao-2": "pergunta 2 - number",
            "questao-3": "pergunta 3 - radio"
        }],
        "respostas": [{
                "content-1a": "opção a",
                "content-1b": "opção b"
            },
            {
                "content-2": "10"
            },
            {
                "content-3": "sim"
            }
        ]
    }
    ';
    $dadosResp = json_encode($dados, JSON_UNESCAPED_UNICODE);
    dd($dadosResp); */
    /* foreach ($resultados as $result){
        $dados = json_decode($result->dados, JSON_UNESCAPED_UNICODE);
    } */
    //dd($dados['results'][0]);
?>

<h5 class="mb-2 text-2xl text-center m-5 font-bold tracking-tight text-gray-600 dark:text-white">{{$pesquisa->titulo}}</h5>
<div class="flex justify-center">    
    <div class="w-5/6 p-5 mb-10 bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
        <table>
            <thead>
                <tr>
                    <th>IP user</th>    
                    <th>Início</th>
                    <th>Final</th>
                    <th>Dados</th>
                    <th>Completo</th>
                </tr>
            </thead>
            <tbody> 
            @foreach ($resultados as $resultado)
                <tr>
                    <td>{{$resultado->ip_usuario}}</td>
                    <td>{{Carbon\Carbon::parse($resultado->data_hora_inicio)->format('d/m/Y H:i:s') }}</td>
                    <td>{{Carbon\Carbon::parse($resultado->data_hora_final)->format('d/m/Y H:i:s') }}</td>
                    <td>{{$resultado->dados}}</td>
                    <td>{{$resultado->completo}}</td>             
                </tr>                    
            @endforeach
            </tbody>
            <tfoot>
            <tr>
                <th>IP user</th>    
                <th>Início</th>
                <th>Final</th>
                <th>Dados</th>
                <th>Completo</th>
            </tr>
        </tfoot>
        </table>
    </div>
</div>    

@endsection
