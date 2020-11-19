<div>
    <div class="mt-10 sm:mt-2">
        <div class="mt-5 mr-5 mb-5 ml-5 md:mt-5 md:col-span-2">
            <div>
                <p class="text-gray-700 text-opacity-50 text-center font-serif italic mb-2">
                    Datos Personales    
                </p>
                <div class="shadow overflow-hidden sm:rounded-md">
                    <div class="px-4 py-5 bg-white sm:p-3">
                        <div class="grid grid-cols-6 gap-6">
                            <div class="col-span-12 sm:col-span-6">
                                <label for="first_name" 
                                    class="block text-sm font-medium leading-5 text-gray-700">
                                    Nombre/s y apellido
                                </label>
                                <input wire:model="name"
                                    class="mt-1 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                            @error('name') <span class="text-red-500">{{ $message }}</span>@enderror
                            </div>
                            <div class="col-span-12 sm:col-span-6">
                                <label for="first_name" 
                                    class="block text-sm font-medium leading-5 text-gray-700">
                                    Numero de telefono
                                </label>
                                <input wire:model="ntelefono"
                                    class="mt-1 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                            @error('ntelefono') <span class="text-red-500">{{ $message }}</span>@enderror
                            </div>
                            <div class="col-span-12 sm:col-span-6">
                                <label for="first_name" 
                                    class="block text-sm font-medium leading-5 text-gray-700">
                                    Mail
                                </label>
                                <input wire:model="mail"
                                    class="mt-1 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                            @error('mail') <span class="text-red-500">{{ $message }}</span>@enderror
                            </div>
                        </div>
                    </div>
                </div>
                <p class="text-gray-700 text-opacity-50 text-center font-serif italic mb-2 mt-4">
                    Servicios
                </p>
                <div class="shadow overflow-hidden sm:rounded-md">
                    <div class="px-4 py-5 bg-white sm:p-3">
                        <div class="grid grid-cols-6 gap-6">
                            @foreach ($this->cis as $item => $key)
                                <div class="col-span-8 sm:col-span-4">
                                    <label for="last_name" 
                                        class="block text-sm font-medium leading-5 text-gray-700">CIS #{{$item + 1}}
                                    </label>
                                    <input wire:model="cis.{{$item}}"
                                        class="mt-1 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                                    @error('cis.'.$item) <span class="text-red-500">{{ $message }}</span>@enderror
                                </div>
                                @if(count($this->cis) > 1)
                                <div class="col-span-2 sm:col-span-1">
                                    <button wire:click.prevent="eliminarCis({{$item}})" type="button"
                                        class="mt-6 py-2 px-3 border border-transparent text-lg leading-5 font-medium rounded-full text-white bg-yellow-400 shadow-sm hover:bg-yellow-500 focus:outline-none focus:shadow-outline-orange active:bg-yellow-600 transition duration-150 ease-in-out">
                                        -
                                    </button>
                                </div>
                                @endif
                            @endforeach
                            <div class="col-span-8 sm:col-span-4">
                                <button wire:click.prevent="agregarCis()" type="button"
                                    class="py-2 px-3 border border-transparent text-sm leading-5 font-medium rounded-full text-white bg-yellow-400 shadow-sm hover:bg-yellow-500 focus:outline-none focus:shadow-outline-orange active:bg-yellow-600 transition duration-150 ease-in-out">
                                    Agregar CIS
                                </button>
                            </div> 
                        </div>

                        @if (session()->has('message'))
                            <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3"
                                role="alert">
                                <div class="flex">
                                    <div>
                                        <p class="text-sm">{{ session('message') }}</p>
                                    </div>
                                </div>
                            </div>
                        @endif


                    </div>

                </div>
                <div class="px-0 py-2 mt-2 bg-white-50 text-right">
                    <button wire:click.prevent="store()" type="button"
                     class="py-2 px-4 mt-5 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-green-600 shadow-sm hover:bg-green-500 focus:outline-none focus:shadow-outline-blue active:bg-green-600 transition duration-150 ease-in-out">
                        Registrar
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
