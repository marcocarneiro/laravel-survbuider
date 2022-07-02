@extends('admin.base')

@section('title', 'NOVA PESQUISA')

@section('conteudo')

<h1 class="font-bold text-xl text-white text-center">Nova Pesquisa</h1>

<div class="flex justify-center">
    <div class="w-full xl:w-5/6 p-10 bg-slate-100">

        <form  action="{{ route('store-pesquisa') }}" method="POST" enctype="multipart/form-data">
            @csrf
        
            {{-- Dados da pesquisa --}}
            <div id="accordion-dadospesquisa" data-accordion="collapse" class="mb-6">
                <h2 id="dados-pesquisa-heading-1">
                <button type="button" class="flex justify-between items-center p-5 w-full font-medium text-left text-gray-200 bg-gray-900 hover:bg-gray-800 
                focus:ring-4 focus:outline-none focus:ring-gray-300 rounded-lg dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800" 
                data-accordion-target="#dados-pesquisa" aria-expanded="false" aria-controls="dados-pesquisa">
                    <span>1. Dados da Pesquisa*</span>
                    <svg data-accordion-icon class="w-6 h-6 rotate-180 shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </button>
                </h2>
                <div id="dados-pesquisa" class="hidden pt-6" aria-labelledby="dados-pesquisa-heading-1">
                    <div class="grid xl:grid-cols-2 xl:gap-6">
                        <div class="relative z-0 w-full mb-6 group">
                            {{-- titulo da pesquisa --}}
                            <input type="text" name="titulo" id="titulo" class="block py-2.5 px-0 w-full text-sm text-gray-900 
                            bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 
                            dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                            <label for="titulo" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 
                            transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 
                            peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                            Título da Pesquisa</label>
                        </div>
                        <div class="relative z-0 w-full mb-6 group">
                            <input type="text" name="url_slug" id="url_slug" class="block py-2.5 px-0 w-full text-sm text-gray-900 
                            bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 
                            dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                            <label for="url_slug" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 
                            transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 
                            peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                            URL da pesquisa - um nome sem espaços e acentos, ex: pesquisa-publico </label>
                        </div>
                    </div>                    
        
                    <div class="grid xl:grid-cols-2 xl:gap-6">
                        <div class="relative z-0 w-full mb-6 group">
                            
                            {{-- data de início da pesquisa  --}}
                            <input type="datetime-local" name="pesquisa_inicio" id="pesquisa_inicio" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent 
                            border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none 
                            focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                            <label for="pesquisa_inicio" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 
                            transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 
                            peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 
                            peer-focus:scale-75 peer-focus:-translate-y-6">Data início da pesquisa</label>
                        </div>
                        <div class="relative z-0 w-full mb-6 group">
                            
                            {{-- data final da pesquisa  --}}
                            <input type="datetime-local" name="pesquisa_final" id="pesquisa_final" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                            <label for="pesquisa_final" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 
                            transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 
                            peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 
                            peer-focus:-translate-y-6">Data final da pesquisa</label>
                        </div>
                    </div>

                    <!-- página de apresnetação -->
                    <div class="grid xl:grid-cols-2 xl:gap-6">
                        <div class="relative z-0 w-full mb-6 group pt-6">
                            
                            {{-- página de apresentação  --}}
                            <label for="pag_apresentacao" class="text-slate-700 pr-4">Inclui página de apresentação </label>
                            <input id="pag_apresentacao" type="checkbox" name="pag_apresentacao" value="0" onClick="show_pagApresent()"/>
                        </div>
                    </div>                        
                    <div id="divPagApresent" class="grid xl:grid-cols-1 xl:gap-6 mb-8 hidden">
                        <p>Inclua o conteúdo da página de apresentação:</p>
                        
                        {{-- conteúdo da página de apresentação  --}}
                        <textarea name="txt_pag_apresentacao" id="txt_pag_apresentacao" class="block mb-2 text-sm font-medium
                        text-gray-900 dark:text-gray-400" 
                        rows="10"></textarea>
                        <script>
                            var show_pagApresent = ()=>{
                                let el = document.getElementById('divPagApresent')
                                if(el.classList.contains('hidden')){
                                    el.classList.remove('hidden')
                                }else{
                                    el.classList.add('hidden')
                                }
                                tinymce.init({
                                    selector: "#txt_pag_apresentacao",
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
                                });
                            }
                        </script>
                    </div>
        
                    <div class="grid xl:grid-cols-2 xl:gap-6">
                        <div class="relative z-0 w-full mb-6 group">
                            
                            {{-- perguntas por tela --}}
                            <input type="number" name="perguntas_por_tela" id="perguntas_por_tela" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent 
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
                            <input id="consentimento" type="checkbox" name="consentimento" value="0"  onClick="show_consent()"/>
                        </div>
                    </div>
                        
                    <div id="divConsent" class="grid xl:grid-cols-1 xl:gap-6 mb-8 hidden">
                        <p>Digite o termo de consentimento para a pesquisa:</p>
                        
                        {{-- texto do termo de consentimento  --}}
                        <textarea name="txt_consentimento" id="txt_consentimento" class="block mb-2 text-sm font-medium
                        text-gray-900 dark:text-gray-400" 
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
                                });
                            }
                        </script>
                    </div>
                    
                    <div class="grid xl:grid-cols-3 xl:gap-6">
                        <div class="relative z-0 w-full mb-6 group">                            
                            {{-- Imagem de fundo  --}}
                            <label class="block mt-2 text-sm font-medium text-gray-900 dark:text-gray-300" for="bgimage">
                            Upload file
                            </label>
                            <input name="bgimage" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer 
                            bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 
                            dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="bgimage_help" id="bgimage" type="file">
                            <div class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="bgimage_help">
                                (opcional) Imagem de fundo do layout da pesquisa. Formatos .gif, .jpg e .png
                            </div>
                        </div>
                        <div class="mb-6">
                            <label for="bgcor" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Cor de fundo</label>
                            <input type="color" id="bgcor" name="bgcor" >
                        </div>
                        <div class="mb-6">
                            <label for="txtcor" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Cor do texto</label>
                            <input type="color" id="txtcor" name="txtcor">
                        </div>
                    </div>

                </div>
            </div>


            {{-- Filtro de questionário  --}}
            <div id="accordion-filtro" data-accordion="collapse" class="mb-6">
                <h2 id="filtro-questionario-heading-1">
                <button type="button" class="flex justify-between items-center p-5 w-full font-medium text-left text-gray-200 bg-gray-900 hover:bg-gray-800 
                focus:ring-4 focus:outline-none focus:ring-gray-300 rounded-lg dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800" 
                data-accordion-target="#filtro-questionario" aria-expanded="false" aria-controls="filtro-questionario">
                    <span>2. Adicionar um filtro para agrupar questionário (opcional)</span>
                    <svg data-accordion-icon class="w-6 h-6 rotate-180 shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </button>
                </h2>
                <div id="filtro-questionario" class="hidden pt-6" aria-labelledby="filtro-questionario-heading-1">
                    <div class="p-5 border border-t-0 border-gray-300 dark:border-gray-700">
                        <p class="text-gray-500 dark:text-gray-400">
                            Ao adicionar um filtro, você cria um grupo de perguntas que o participante responderá caso atenda a um pré-requisito como por exemplo a sua idade, se a idade do usuário for maior que 18, 
                            será carregado um grupo de perguntas específicas, caso contrário será carregada as perguntas padrão.
                        </p>
                        
                        {{-- filtro da pesquisa (agrupamento de perguntas) --}}
                        <input type="text" name="txt_filtro" id="txt_filtro" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block 
                        w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Texto do filtro" >
                        <small>Pergunta inicial da pesquisa com opções de resposta <strong>sim e não</strong>, se a resposta for SIM, as perguntas a seguir serão carregadas.
                            Em seguida cadastre o grupo de perguntas nesse bloco. Ao final, cadastre as perguntas padrão no próximo bloco.
                        </small>

                        {{-- Adiciona perguntas ao filtro  --}}
                        <p class="mt-6">Adicionar questões ao grupo
                            <svg class="cursor-pointer inline-block w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </p>
                    </div>
                </div>
            </div>            

            {{-- Questionário padrão  --}}
            <div id="accordion-questionario" data-accordion="collapse" class="mb-6">
                <h2 id="questionario-padrao-heading-1">
                <button type="button" class="flex justify-between items-center p-5 w-full font-medium text-left text-gray-200 bg-gray-900 hover:bg-gray-800 
                focus:ring-4 focus:outline-none focus:ring-gray-300 rounded-lg dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800" 
                data-accordion-target="#questionario-padrao" aria-expanded="false" aria-controls="questionario-padrao">
                    <span>3. Questionário Padrão*</span>
                    <svg data-accordion-icon class="w-6 h-6 rotate-180 shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </button>
                </h2>
                <div id="questionario-padrao" class="hidden pt-6" aria-labelledby="questionario-padrao-heading-1">
                    <fieldset id="perguntas_padrao" class="relative p-6 mt-4 mb-8 border border-gray-300">
                        <p><strong>Dica:</strong> Perguntas complementares a uma opção de resposta resposta como 
                            por exemplo na resposta "Outros" que em seguida abre uma nova pergunta como "Quais?" devem 
                            ser inseridas após o cadastro da pesquisa, na sua edição.</p>          
                        <legend class="absolute -bottom-4 left-4 px-4 w-fit bg-slate-100">
                        Adicionar questionário padrão
                        <svg onClick="duplicatePerguntas()" class="cursor-pointer inline-block w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        </legend>
        
                        <div id="perguntas">
                            
                            <!-- LISTA DE PERGUNTAS  -->
                            <div class="pergunta relative mt-6 pb-8 border-b border-gray-300">
                                <div class="flex">
                                    <svg class="mover inline-flex items-center mt-1 h-5 w-5 cursor-pointer text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M8 9l4-4 4 4m0 6l-4 4-4-4" />
                                    </svg>
                                    <label for="txt_pergunta" class="block mt-1 text-sm font-medium text-gray-900 dark:text-gray-400">
                                        Questão <span class="numeroQ"></span>
                                    </label>                   
                                </div>
                                <div class="grid xl:grid-cols-2 xl:gap-6 gap-2 mb-6">
                                    <div>         
                                        {{-- texto da pergunta  --}}
                                        <textarea name="txt_pergunta[]" 
                                        rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border
                                        border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 
                                        dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" 
                                        placeholder="Digite aqui o texto da pergunta"></textarea>

                                        <label class="block mt-2 text-sm font-medium text-gray-900 dark:text-gray-300" for="midia">Upload file</label> 
                                        {{-- imagem da pergunta  --}}
                                        <input name="midia[]" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer 
                                        bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 
                                        dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="midia_help" id="midia" type="file">
                                        <div class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="midia_help">
                                            (opcional) Imagem para exibir junto com a pergunta. Formatos .gif, .jpg e .png
                                        </div>                                        
                                    </div>
                        
                                    <div>
                                        {{-- tipo de resposta  --}}
                                        <select name="tipo[]" onChange="setPergunta(this, this.value)" required
                                        class="tipo w-full rounded-lg bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 p-2.5 
                                        dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            <option value="">Tipo de resposta</option> 
                                            <option value="text">Texto</option>
                                            <option value="number">Número</option>
                                            <option value="checkbox">Múltipla escolha</option>
                                            <option value="radio">Radio</option>
                                        </select>
                                        
                                        <fieldset class="resposta-details p-6 mt-8 mb-8 border border-gray-300 hidden">            
                                            <legend class="px-4">
                                                Adicionar opções de resposta
                                                <svg onClick="addOpcRespostas(this.parentNode.parentNode)" class="cursor-pointer inline-block w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                </svg>
                                            </legend>                                            
                                            <input class="infQtdeOpc" type="hidden" name="qtdeOpcResp[]" value="">
                                            <div class="relative opc-resposta">                                                
                                                <div onClick="removeOpcResposta(this.parentNode)" class="absolute inset-y-0 right-2 flex items-center pl-3 cursor-pointer text-red-700">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="cursor-pointer h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                    </svg>
                                                </div>
                                                
                                                {{-- opções de resposta  --}}               
                                                <input type="text" name="txt_opc_resposta" class="campo-opcao mb-6 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  
                                                dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 
                                                dark:focus:border-blue-500" placeholder="Digite o texto da opção de resposta">
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>
                                <span onClick="removePergunta(this.parentNode)" class="absolute right-0 bottom-0 px-3 text-sm text-red-700">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="cursor-pointer h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </span>
                            </div>
                            
                            
                        </div>
                    </fieldset>
                </div>
            </div>

            <button type="submit" class="mt-6 mb-6 text-sm w-full sm:w-auto px-5 py-2.5 text-center text-white bg-gray-900 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 
            font-medium rounded-lg dark:bg-gray-600 dark:hover:bg-gray-700 
            dark:focus:ring-gray-800">Concluir</button>
        </form>    
    </div>
</div>    

@endsection
