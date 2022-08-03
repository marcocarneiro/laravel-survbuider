@extends('admin.base-datatablesjs')

@section('title', 'RESULTADOS')

@section('conteudo')

<?php
    $dados = '';
    foreach ($resultados as $result){
        $dados = json_decode($result->dados, JSON_UNESCAPED_UNICODE);
    }
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
