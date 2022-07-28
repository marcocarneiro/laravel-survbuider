@extends('admin.base')

@section('title', 'DASHBOARD')

@section('conteudo')

<div class="md:grid grid-cols-3 gap-4 mb-10">

    {{-- cards informativos e de acesso --}}
    <div class="bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
        <div class="p-6">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Dicas:</h5>
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise technology acquisitions of 2021 
                so far, in reverse chronological order.
            </p>
        </div>
    </div>

    @foreach ($pesquisas as $pesquisa)
    <div class="bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
        <div class="p-6">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-600 dark:text-white">
                {{$pesquisa->titulo}}                
            </h5>

            <?php $link = url('/') .'/surv/'. $pesquisa->url_slug ?>
            <small class="flex itens-end"><a href="{{ $link }}" target="_blank" class="text-blue-400 hover:text-blue-900">
                {{ $link }} 
                <svg xmlns="http://www.w3.org/2000/svg" class="inline-block h-3 w-3 mb-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                </svg>
            </a></small>

            @isset($pesquisa->bgimage)
                <img src="{{ url('/public/uploads') }}/{{$pesquisa->bgimage}}" width="100%" ><br><br>
            @endisset

            @isset($pesquisa->descricao)
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                    {{$pesquisa->descricao}}
                </p>
            @endisset            
            
            <div class="flex justify-end border-y p-2">
                <a href="{{ route('resultados', ['id' => $pesquisa->id])}}" data-tooltip-target="tooltip-resultados">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 m-2 hover:text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                </a>
                <div id="tooltip-resultados" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 transition-opacity duration-300 tooltip dark:bg-gray-700">
                    Visualizar resultados
                    <div class="Visualizar resultados" data-popper-arrow></div>
                </div>

                <a href="{{ route('editar', ['id' => $pesquisa->id])}}" data-tooltip-target="tooltip-editar">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 m-2 hover:text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                    </svg>
                </a>
                <div id="tooltip-editar" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 transition-opacity duration-300 tooltip dark:bg-gray-700">
                    Editar
                    <div class="Visualizar resultados" data-popper-arrow></div>
                </div>

                <a href="{{ route('duplicar', ['id' => $pesquisa->id])}}" data-tooltip-target="tooltip-duplicar">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 m-2 hover:text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8 7v8a2 2 0 002 2h6M8 7V5a2 2 0 012-2h4.586a1 1 0 01.707.293l4.414 4.414a1 1 0 01.293.707V15a2 2 0 01-2 2h-2M8 7H6a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2v-2" />
                    </svg>
                </a>
                <div id="tooltip-duplicar" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 transition-opacity duration-300 tooltip dark:bg-gray-700">
                    Duplicar
                    <div class="Visualizar resultados" data-popper-arrow></div>
                </div>

                <a href="{{ route('excluir', ['id' => $pesquisa->id])}}" data-tooltip-target="tooltip-excluir">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 m-2 hover:text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                    </svg>
                </a>
                <div id="tooltip-excluir" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 transition-opacity duration-300 tooltip dark:bg-gray-700">
                    Excluir
                    <div class="Visualizar resultados" data-popper-arrow></div>
                </div>
                
            </div>
            
        </div>
    </div>
    @endforeach
    
    

    

</div>    

@endsection
