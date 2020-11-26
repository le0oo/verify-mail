{{-- <button class="bg-grey-light hover:bg-blue-100 px-3 py-1 rounded text-blue-600 text-xs m-5 show-modal">Ver numero de Servicio</button> --}}
<button class="py-2 px-3 border border-transparent text-sm leading-5 font-medium rounded-full text-blue-700 bg-blue-400 shadow-sm hover:bg-blue-500 focus:outline-none focus:shadow-outline-orange active:bg-blue-600 transition duration-150 ease-in-out show-modal">Ver numero de Servicio</button>

  <div class="modal h-screen w-full fixed left-0 top-0 flex justify-center items-center bg-black bg-opacity-50 hidden">
    <!-- modal -->
    <div class="bg-white rounded shadow-lg w-2/3">
      <!-- modal header -->
      <div class="border-b px-4 py-2 flex justify-between items-center">
        <h3 class="font-semibold text-lg">Factura</h3>
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