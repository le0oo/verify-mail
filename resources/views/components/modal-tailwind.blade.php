{{-- <button class="bg-grey-light hover:bg-blue-100 px-3 py-1 rounded text-blue-600 text-xs m-5 show-modal">Ver numero de Servicio</button> --}}
{{-- <button class="py-2 px-3 border border-transparent text-sm leading-5 font-medium rounded-full text-blue-700 bg-grey-light shadow-sm hover:bg-blue-200 focus:outline-none focus:shadow-outline-orange active:bg-blue-400 transition duration-150 ease-in-out show-modal">Ver numero de Servicio</button> --}}
  <button type="submit" class="flex items-center justify-center focus:outline-none text-blue-400 text-sm sm:text-base bg-grey-light hover:text-blue-700 rounded py-1 px-1 transition duration-150 ease-in show-modal">
  <span class="mr-2">¿Dónde está mi CIS?</span>
  <span>
      <svg class="h-6 w-6" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
          <path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"/>
      </svg>
  </span>
  </button>

  <div class="modal h-screen w-full fixed left-0 top-0 flex justify-center items-center bg-black bg-opacity-50 hidden">
    <!-- modal -->
    <div class="bg-white rounded shadow-lg w-2/3">
      <!-- modal header -->
      <div class="border-b px-4 py-2 flex justify-between items-center">
        <h3 class="font-semibold text-lg">¿Dónde está mi CIS?</h3>
        <button class="text-black close-modal">&cross;</button>
      </div>
      <!-- modal body -->
      <div class="p-3">
        {{-- Lorem ipsum dolor, sit amet consectetur adipisicing elit. Rerum, delectus cumque fugiat nemo ducimus quae deserunt cupiditate sapiente incidunt aut accusantium dolore assumenda vitae similique, exercitationem voluptatum praesentium laboriosam nam. --}}
        <img src="/img/factura_gsj.png">
      </div>
      <div class="flex justify-end items-center w-100 border-t p-3">
        <button class="bg-red-600 hover:bg-red-700 px-3 py-1 rounded text-white mr-1 close-modal">Cerrar</button>
        {{-- <button class="bg-blue-600 hover:bg-blue-700 px-3 py-1 rounded text-white">Oke</button> --}}
      </div>
    </div>
  </div>

  <script>
    const modal = document.querySelector('.modal');

    const showModal = document.querySelector('.show-modal');
    const closeModal = document.querySelectorAll('.close-modal');

    showModal.addEventListener('click', function (){
      modal.classList.remove('hidden')
    });

    closeModal.forEach(close => {
      close.addEventListener('click', function (){
        modal.classList.add('hidden')
      });
    });
  </script>