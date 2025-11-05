<aside class="w-64 h-screen bg-white shadow-lg fixed top-0 left-0 overflow-y-auto
              border-r border-stone-200 z-40
              transform -translate-x-full md:translate-x-0
              transition-transform duration-300 ease-in-out"
       :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'">

    <div class="md:hidden text-right p-4">
        <button @click="sidebarOpen = false" class="text-stone-600 hover:text-stone-900" aria-label="Fechar menu">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
        </button>
    </div>

    <div class="p-6 text-center -mt-10 md:mt-0">
        <a href="#" class="text-2xl font-bold text-stone-800 hover:text-indigo-600 transition-colors">
            To-Do App
        </a>
    </div>

    <div class="px-4 my-4">
        <a href="#" class="flex items-center justify-center w-full px-5 py-3 bg-indigo-600 text-white rounded-lg shadow-md hover:bg-indigo-700 transition-colors">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
            Criar Tarefa
        </a>
    </div>

    <nav class="mt-4">
        <ul>
            <li class="px-4">
                <a href="#" class="flex items-center px-4 py-3 rounded-md transition-colors
                          {{ Request::is('tarefas') && !Request::is('tarefas/lixeira*') ?
                             'bg-stone-100 text-indigo-600 font-semibold' :
                             'text-stone-600 hover:bg-stone-50 hover:text-stone-900' }}">

                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path></svg>
                    Todas as Tarefas
                </a>
            </li>

            <li class="px-8 my-4">
                <hr class="border-t border-stone-200">
            </li>

            <li class="px-4 mt-2">
                <a href="#" class="flex items-center px-4 py-3 rounded-md transition-colors
                          {{ Request::is('tarefas/lixeira*') ?
                             'bg-stone-100 text-indigo-600 font-semibold' :
                             'text-stone-600 hover:bg-stone-50 hover:text-stone-900' }}">

                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                    Lixeira
                </a>
            </li>
        </ul>
    </nav>
    <div class="absolute bottom-0 left-0 w-full p-4 border-t border-stone-200">
        <a href="#" class="flex items-center text-stone-600 hover:text-stone-900">
            <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
            Sair
        </a>
    </div>
</aside>
