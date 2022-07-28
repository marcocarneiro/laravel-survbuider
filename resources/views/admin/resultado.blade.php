@extends('admin.base')

@section('title', 'RESULTADOS')

@section('conteudo')

<h5 class="mb-2 text-2xl text-center m-5 font-bold tracking-tight text-gray-600 dark:text-white">{{$pesquisa->titulo}}</h5>
<div class="flex justify-center">    
    <div class="w-5/6 divide-y mb-10 bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
        @foreach ($resultados as $resultado)        
            <div class="p-6">                
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise technology acquisitions of 2021 
                    so far, in reverse chronological order.
                </p>
            </div>        
        @endforeach
    </div>
</div>    

@endsection
