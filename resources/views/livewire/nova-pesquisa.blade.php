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
                <label for="consentimento" class="text-slate-700">Inclui consentimento?</label>
                <input id="consentimento" type="checkbox" name="consentimento" value="sim" wire:click="show_consent"/>
            </div>
        </div>

        
        @if($consent)
        <div class="grid xl:grid-cols-1 xl:gap-6">
            <textarea name="tinymce-editor" id="tinymce-editor" cols="30" rows="10"></textarea>
        </div>
        
        @endif
       

        <br>
        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 
        font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 
        dark:focus:ring-blue-800">Criar Pesquisa</button>

    </form>
</div>