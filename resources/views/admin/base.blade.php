<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>SurvBuilder | @yield('title')</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <link rel="stylesheet" href="{{ url('/') }}/css/base.css">

        @livewireStyles
        

        <!-- Scripts -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js" integrity="sha256-xKeoJ50pzbUGkpQxDYHD7o7hxe0LaOGeguUidbq6vis=" crossorigin="anonymous"></script>
        <script src="{{ mix('js/app.js') }}" defer></script>

        <!-- TinyMCE  -->
        <script src="{{ asset('js/tinymce/tinymce.min.js') }}" referrerpolicy="origin"></script>
        <script>
          function loadTinyMCEEditor(id) {
            tinymce.remove('#'+id);
            tinymce.init({
              selector: "#"+id,
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
              content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:16px }'
            });
          }          
        </script>

    </head>
    <body class="max-h-screen font-sans antialiased bg-slate-300 text-slate-700">

        {{-- Navbar --}}
        <nav class="bg-slate-500 fixed text-slate-200 px-2 sm:px-4 py-2.5 w-full drop-shadow-md z-50">
            <div class="container flex flex-wrap justify-between items-center mx-auto">
            <a href="#" class="flex items-center">
                <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">SurvBuilder</span>
            </a>
            
            <!-- user menu -->
            <div class="flex items-center md:order-2">
                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                    <button type="button" class="flex mr-3 text-sm bg-gray-800 rounded-full md:mr-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" id="user-menu-button" aria-expanded="false" type="button" data-dropdown-toggle="dropdown">
                        <span class="sr-only">Open user menu</span>
                        <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                    </button>
                @else
                    <span class="inline-flex rounded-md">
                        <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition" id="user-menu-button" aria-expanded="false" type="button" data-dropdown-toggle="dropdown">
                            {{ Auth::user()->name }}

                            <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </span>
                @endif
                <div class="hidden z-50 my-4 text-base list-none bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600" id="dropdown">
                  <div class="py-3 px-4">
                    <span class="block text-sm text-gray-900 dark:text-white">Bonnie Green</span>
                    <span class="block text-sm font-medium text-gray-500 truncate dark:text-gray-400">name@flowbite.com</span>
                  </div>
                  <ul class="py-1" aria-labelledby="dropdown">
                    <li>
                      <a href="#" class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Dashboard</a>
                    </li>
                    <li>
                      <a href="#" class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Settings</a>
                    </li>
                    <li>
                      <a href="#" class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Earnings</a>
                    </li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a class="nav-link text-light" href="{{ route('logout') }}" onclick="event.preventDefault();
                                        this.closest('form').submit(); " role="button">
                                <i class="fas fa-sign-out-alt"></i>
                    
                                {{ __('Log Out') }}
                            </a>
                        </form>
                    </li>
                  </ul>
                </div>                

                {{-- menu hamburguer --}}
                <button data-collapse-toggle="mobile-menu-2" type="button" class="inline-flex items-center p-2 ml-1 text-sm text-gray-900 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="mobile-menu-2" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
                <svg class="hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
              </button>
            </div>

            {{-- menu principal --}}
            <div class="hidden justify-between items-center w-full md:flex md:w-auto md:order-1" id="mobile-menu-2">
              <ul class="flex flex-col mt-4 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium">
                <li>
                  <a href="#" class="block py-2 pr-4 pl-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 dark:text-white" aria-current="page">Home</a>
                </li>
                <li>
                  <a href="#" class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">About</a>
                </li>
                <li>
                  <a href="#" class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Services</a>
                </li>
                <li>
                  <a href="#" class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Pricing</a>
                </li>
                <li>
                  <a href="#" class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Contact</a>
                </li>
              </ul>
            </div>
            </div>
        </nav>
        

        <div class="w-full h-full p-10 pt-24">
            @yield('conteudo')
        </div>
        

        @livewireScripts
        <script src="https://unpkg.com/flowbite@1.4.6/dist/flowbite.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>
        <script>
          /* var numQuest = 1
          var contPerguntas = document.querySelectorAll('.pergunta').length
          var divPerguntas = document.getElementById('perguntas')
          document.querySelector('.pergunta span.num').innerText = numQuest */


          //perguntas
          /* var addPerguntas = () => {
            numQuest ++           
            let pergunta = document.getElementById('perguntas').lastElementChild
            let novaPergunta = pergunta.cloneNode(true)
            novaPergunta.querySelector('.resposta-details').classList.add('hidden')
            novaPergunta.querySelector('.num').innerText = numQuest
            document.getElementById('perguntas').appendChild(novaPergunta)          
          };

          var removePergunta = (obj) => {
            if(numQuest > 1){ 
              numQuest -- ;
              obj.remove()
              reorderPerguntas()
            }            
          }; */
          
                    
          var setPergunta = (el, tipo) =>{
            let container = el.nextElementSibling
            container.classList.add('hidden')
            if(tipo == 'checkbox' || tipo == 'radio'){
              container.classList.remove('hidden')
            }
          }

          var reorderPerguntas = () =>{
            let cont = document.querySelectorAll('.pergunta').length
            for (let i = 1; i <= cont; i++) {
              document.querySelector(`.pergunta:nth-child(${i}) .num`).innerText = i                 
            }
          }

          new Sortable(divPerguntas, {
              handle: '.mover', 
              animation: 150,
              onUpdate: function (evt) {
                reorderPerguntas()
              }
          });



          //Opções de resposta
          var addOpcRespostas = (obj) => {
            let lastOpc = obj.lastElementChild
            let novaOpc = lastOpc.cloneNode(true)
            obj.appendChild(novaOpc)      
          }

          var removeOpcResposta = (obj) => {
            let fieldSet = obj.parentNode
            let count = fieldSet.querySelectorAll('.opc-resposta').length
            if(count > 1){
              obj.remove()
            }
          }

          //Modal padrão
          var toggleBaseModal = () => {
            let principal = document.querySelector('#baseModal')
            let baseModal = document.querySelector('#baseModal .conteudo')
            
            if(document.body.clientWidth > 600){
              baseModal.style.left = 50 + '%'
            }

            if(principal.classList.contains('hidden')){
              principal.classList.remove('hidden')
            }else{
              principal.classList.add('hidden')
            }
          }
          

        </script>        
    </body>
</html>
