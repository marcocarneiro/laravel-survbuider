<?php 
    /*
        ============== ÍNDICE DE CAMPOS ==============
        pergunta complementar  
        opções de resposta  
        tipo de resposta  
        imagem da peergunta  
        texto da pergunta 
        filtro da pesquisa (agrupamento de perguntas) 
        texto do termo de consentimento  
        termo de consentimento 
        perguntas por tela  
        data final da pesquisa 
        data de início da pesquisa 
        titulo da pesquisa 
    */
?>


<div class="w-full xl:w-5/6 p-10 bg-slate-100">
    <form wire:submit.prevent="createPesquisa" class="{{$hiddenbtn}}">
        @csrf
        <div class="grid xl:grid-cols-1 xl:gap-6">
          <div class="relative z-0 w-full mb-6 group">
              {{-- titulo da pesquisa  --}}
              <input wire:model.lazy="titulo" type="text" name="titulo" id="titulo" class="block py-2.5 px-0 w-full text-sm text-gray-900 
              bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 
              dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
              <label for="titulo" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 
              transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 
              peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Título da Pesquisa</label>
          </div>
        </div>
        

        <div class="grid xl:grid-cols-2 xl:gap-6">
          <div class="relative z-0 w-full mb-6 group">
              
              {{-- data de início da pesquisa  --}}
              <input wire:model.lazy="pesquisa_inicio"  type="datetime-local" name="pesquisa_inicio" id="pesquisa_inicio" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent 
              border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none 
              focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
              <label for="pesquisa_inicio" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 
              transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 
              peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 
              peer-focus:scale-75 peer-focus:-translate-y-6">Data início da pesquisa</label>
          </div>
          <div class="relative z-0 w-full mb-6 group">
              
              {{-- data final da pesquisa  --}}
              <input wire:model.lazy="pesquisa_final" type="datetime-local" name="pesquisa_final" id="pesquisa_final" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
              <label for="pesquisa_final" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 
              transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 
              peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 
              peer-focus:-translate-y-6">Data final da pesquisa</label>
          </div>
        </div>

        <div class="grid xl:grid-cols-2 xl:gap-6">
            <div class="relative z-0 w-full mb-6 group">
                
                {{-- perguntas por tela  --}}
                <input wire:model.lazy="perguntas_por_tela" type="number" name="perguntas_por_tela" id="perguntas_por_tela" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent 
                border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none 
                focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                <label for="perguntas_por_tela" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 
                transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 
                peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 
                peer-focus:scale-75 peer-focus:-translate-y-6">Perguntas por tela</label>
            </div>
            <div class="relative z-0 w-full mb-6 group pt-6">
                
                {{-- termo de consentimento  --}}
                <label for="consentimento" class="text-slate-700 pr-4">Inclui termo de consentimento? </label>
                <input wire:model.lazy="consentimento" id="consentimento" type="checkbox" name="consentimento" onClick="show_consent()"/>
            </div>
        </div>
               
        <div id="divConsent" wire:ignore class="grid xl:grid-cols-1 xl:gap-6 mb-8 hidden">
            <p>Digite o termo de consentimento para a pesquisa:</p>
            
            {{-- texto do termo de consentimento  --}}
            <textarea wire:model.lazy="txt_consentimento" name="txt_consentimento" id="txt_consentimento" class="block mb-2 text-sm font-medium
             text-gray-900 dark:text-gray-400 {{$hiddenTiny}}" 
            rows="10"></textarea>
            <script>
                var show_consent = ()=>{
                    let el = document.getElementById('divConsent')
                    if(el.classList.contains('hidden')){
                        el.classList.remove('hidden')
                    }else{
                        el.classList.add('hidden')
                    }
                    tinymce.init({
                        selector: "#txt_consentimento",
                        height: 500,
                        plugins: [
                            'advlist', 'autolink', 'lists', 'link', 'image', 'charmap', 'preview',
                            'anchor', 'searchreplace', 'visualblocks', 'code', 'fullscreen',
                            'insertdatetime', 'media', 'table', 'help', 'wordcount'
                        ],
                        toolbar: 'undo redo | blocks | ' +
                        'bold italic backcolor | alignleft aligncenter ' +
                        'alignright alignjustify | bullist numlist outdent indent | ' +
                        'removeformat | help',
                        content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:16px }',
                        forced_root_block: false,
                        setup: function (editor) {
                            editor.on('init change', function () {
                                editor.save();
                            });
                            editor.on('change', function (e) {
                            @this.set('txt_consentimento', editor.getContent());
                            });
                        }
                    });
                }
            </script>
        </div>
        
        
        <div id="accordion-collapse" data-accordion="collapse" class="grid xl:grid-cols-1">
            <h2 id="accordion-collapse-heading-2">
                <button type="button" class="flex justify-between items-center w-full py-2 font-medium text-left text-gray-500 border border-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800" data-accordion-target="#accordion-collapse-body-2" aria-expanded="false" aria-controls="accordion-collapse-body-2">
                    <span class="px-6">Adicionar um filtro para agrupar perguntas (opcional)</span>
                    <svg data-accordion-icon class="w-6 h-6 shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </button>
            </h2>
            <div id="accordion-collapse-body-2" class="hidden mb-8" aria-labelledby="accordion-collapse-heading-2">
                <div class="p-5 border border-t-0 border-gray-300 dark:border-gray-700">
                    <p class="text-gray-500 dark:text-gray-400">
                        Ao adicionar um filtro, você cria um grupo de perguntas que o participante responderá caso atenda a um pré-requisito como por exemplo a sua idade, se a idade do usuário for maior que 18, 
                        será carregado um grupo de perguntas específicas, caso contrário será carregada as perguntas padrão.
                    </p>
                    
                    {{-- filtro da pesquisa (agrupamento de perguntas) --}}
                    <input wire:model.lazy="txt_filtro" type="text" name="txt_filtro" id="txt_filtro" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block 
                    w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Texto do filtro" >
                    <small>Pergunta inicial da pesquisa com opções de resposta <strong>sim e não</strong>, se a resposta for SIM, as perguntas a seguir serão carregadas.
                        Em seguida cadastre o grupo de perguntas nesse bloco. Ao final, cadastre as perguntas padrão no próximo bloco.
                    </small>

                    {{-- Adiciona perguntas ao filtro  --}}
                    <p class="mt-6">Adicionar perguntas ao grupo
                        <svg class="cursor-pointer inline-block w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </p>
                </div>
            </div>
        </div>

        <input wire:model.lazy="reg" type="hidden" name="reg" id="reg" value="{{$reg}}">

        <button type="submit" class="{{$hiddenbtn}} mt-6 mb-6 text-white bg-gray-900 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 
        font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-gray-600 dark:hover:bg-gray-700 
        dark:focus:ring-gray-800">Continuar</button>
        
    </form>

    <?php //COMPONENTE DE PERGUNTAS ?>
    <div class="{{$showPerguntas}}">
        <button wire:click="mostraPesquisa" type="button" class="w-full text-white bg-slate-600 hover:bg-slate-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-slate-700">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            Retornar para pesquisa: {{$titulo}} 
        </button>
        <?php //Envia o parâmetro $reg (id da pesquisa) somente após a sua atualização ?>
        @if($reg > 0)            
            <livewire:show-perguntas :reg="$reg">
        @endif
    </div>    
</div>

