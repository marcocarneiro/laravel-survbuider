<?php 
    /*
        Campo oculto id="info_reg" contém o registro da tabela de pesquisas 
    */
?>

<div class="pergunta relative mt-6 pb-8 border-b border-gray-300">
    <div class="flex">
        <svg class="mover inline-flex items-center mt-1 h-5 w-5 cursor-pointer text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M8 9l4-4 4 4m0 6l-4 4-4-4" />
        </svg>
        <label for="txt_pergunta" class="block mt-1 text-sm font-medium text-gray-900 dark:text-gray-400">
            Questão <span class="num"></span>
        </label>                   
    </div>
    <div class="grid xl:grid-cols-2 xl:gap-6 gap-2 mb-6">
        <div>            
            {{-- texto da pergunta  --}}
            <textarea name="txt_pergunta" 
            rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border
            border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 
            dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" 
            placeholder="Digite aqui o texto da pergunta"></textarea>
            <label class="block mt-2 text-sm font-medium text-gray-900 dark:text-gray-300" for="midia">Upload file</label>
            
            {{-- imagem da peergunta  --}}
            <input name="midia" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 
            dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="midia_help" id="midia" type="file">
            <div class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="midia_help">
                (opcional) Imagem para exibir junto com a pergunta. Formatos .gif, .jpg e .png
            </div>
        </div>

        <div>            
            {{-- tipo de resposta  --}}
            <select name="tipo" onChange="setPergunta(this, this.value)" class="tipo w-full rounded-lg bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 p-2.5 
                dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
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
                    
                    <div class="relative opc-resposta">
                        <div onClick="removeOpcResposta(this.parentNode)" class="absolute inset-y-0 right-6 flex items-center pl-3 cursor-pointer text-red-700">
                            <svg xmlns="http://www.w3.org/2000/svg" class="cursor-pointer h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                        </div>
                        <svg onClick="toggleBaseModal()" class="absolute right-1 bottom-[10px] cursor-pointer w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>

                        {{-- opções de resposta  --}}
                        <input type="text" name="txt_opc_resposta[]" class="mb-6 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  
                        dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Digite o texto da opção de resposta">
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
