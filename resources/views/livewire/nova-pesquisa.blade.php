<div class="w-5/6 p-10 bg-slate-100">
    <form>
        <div class="grid xl:grid-cols-1 xl:gap-6">
          <div class="relative z-0 w-full mb-6 group">
              <input type="text" name="titulo" id="titulo" class="block py-2.5 px-0 w-full text-sm text-gray-900 
              bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 
              dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
              <label for="titulo" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 
              transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 
              peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Título da Pesquisa</label>
          </div>
        </div>

        <div class="grid xl:grid-cols-2 xl:gap-6">
          <div class="relative z-0 w-full mb-6 group">
              <input type="datetime-local" name="pesquisa_inicio" id="pesquisa_inicio" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
              <label for="pesquisa_inicio" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 
              transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 
              peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 
              peer-focus:scale-75 peer-focus:-translate-y-6">Data início da pesquisa</label>
          </div>
          <div class="relative z-0 w-full mb-6 group">
              <input type="datetime-local" name="pesquisa_final" id="pesquisa_final" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
              <label for="pesquisa_final" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 
              transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 
              peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 
              peer-focus:-translate-y-6">Data final da pesquisa</label>
          </div>
        </div>

        <div class="grid xl:grid-cols-2 xl:gap-6">
            <div class="relative z-0 w-full mb-6 group">
                <input type="number" name="perguntas_por_tela" id="perguntas_por_tela" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                <label for="perguntas_por_tela" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 
                transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 
                peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 
                peer-focus:scale-75 peer-focus:-translate-y-6">Perguntas por tela</label>
            </div>
            <div class="relative z-0 w-full mb-6 group pt-6">
                <label for="consentimento" class="text-slate-700 pr-4">Inclui termo de consentimento? </label>
                <input id="consentimento" type="checkbox" name="consentimento" value="sim" 
                wire:click="show_consent"/>
            </div>
        </div>
        
        
        @if($consent)        
        <div class="grid xl:grid-cols-1 xl:gap-6 mb-8">
            <p>Digite o termo de consentimento para a pesquisa:</p>
            <textarea name="txt_consentimento" id="txt_consentimento" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400" 
            rows="10"></textarea>
        </div>
        <script>loadTinyMCEEditor('txt_consentimento')</script>
        @endif
        
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
                    <input type="text" name="txt_filtro" id="txt_filtro" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block 
                    w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Texto do filtro" >
                    <small>Pergunta inicial da pesquisa com opções de resposta <strong>sim e não</strong>, se a resposta for SIM, as perguntas a seguir serão carregadas.
                        Em seguida cadastre o grupo de perguntas nesse bloco. Ao final, cadastre as perguntas padrão no próximo bloco.
                    </small>
                    <p class="mt-6">Adicionar perguntas ao grupo
                        <svg class="cursor-pointer inline-block w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </p>
                </div>
            </div>
        </div>

        <fieldset class="p-6 mt-8 mb-8 border border-gray-300">            
            <legend class="px-4">
                Adicionar perguntas padrão da pesquisa
                <svg onClick="addPerguntas()" class="cursor-pointer inline-block w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </legend>
            <div id="perguntas">
                <div class="pergunta relative mt-6 pb-8 border-b border-gray-300">
                    <div class="flex">
                        <svg class="mover inline-flex items-center mt-1 h-5 w-5 cursor-pointer text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8 9l4-4 4 4m0 6l-4 4-4-4" />
                        </svg>
                        <label for="txt_pergunta" class="block mt-1 text-sm font-medium text-gray-900 dark:text-gray-400">
                            Questão <span class="num"></span>
                        </label>                   
                    </div>
                    <div class="flex gap-2 mb-6">
                        <textarea name="txt_pergunta" rows="4" class="block p-2.5 w-1/2 text-sm text-gray-900 bg-gray-50 rounded-lg border
                        border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 
                        dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" 
                        placeholder="Digite aqui o texto da pergunta"></textarea>

                        <select name="tipo" onChange="setPergunta(this.parentNode.parentNode, this.value)" class="tipo w-1/2 h-32 rounded-lg bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 p-2.5 
                            dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                <option value="">Selecione aqui o tipo de resposta</option> 
                                <option value="text">Texto</option>
                                <option value="number">Número</option>
                                <option value="checkbox">Múltipla escolha</option>
                                <option value="radio">Radio</option>
                        </select>
                    </div> 
                    <div class="resposta-details px-6">

                    </div>
                    <span onClick="removePergunta(this.parentNode)" class="absolute right-0 bottom-0 px-3 text-sm text-red-700">
                        <svg xmlns="http://www.w3.org/2000/svg" class="cursor-pointer h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                    </span>                    
                </div>
            </div> 
        </fieldset>        
        

        <br>
        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 
        font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 
        dark:focus:ring-blue-800">Criar Pesquisa</button>

    </form>
</div>