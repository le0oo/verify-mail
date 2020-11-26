<div>
    <div class="mt-10 sm:mt-2">
        <div class="mt-5 mr-5 mb-1 ml-5 md:mt-5 md:col-span-2">
        @if(!$registed)
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
                                    Número de teléfono
                                </label>
                                <input wire:model="ntelefono"
                                    class="mt-1 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                            @error('ntelefono') <span class="text-red-500">{{ $message }}</span>@enderror
                            </div>
                            <div class="col-span-12 sm:col-span-6">
                                <label for="first_name" 
                                    class="block text-sm font-medium leading-5 text-gray-700">
                                    Correo electrónico
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
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="last_name" 
                                        class="block text-sm font-medium leading-5 text-gray-700">CIS #{{$item + 1}}
                                    </label>
                                    <input wire:model="cis.{{$item}}"
                                        class="mt-1 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                                    @error('cis.'.$item) <span class="text-red-500">{{ $message }}</span>@enderror
                                </div>
                                @if(count($this->cis) > 1)
                                <div class="col-span-2 sm:col-span-1">
                                    {{-- <button wire:click.prevent="eliminarCis({{$item}})" type="button"
                                        class="mt-6 py-2 px-3 border border-transparent text-lg leading-5 font-medium rounded-full text-white bg-yellow-400 shadow-sm hover:bg-yellow-500 focus:outline-none focus:shadow-outline-orange active:bg-yellow-600 transition duration-150 ease-in-out">
                                        -
                                    </button> --}}
                                    <button wire:click.prevent="eliminarCis({{$item}})" type="button"
                                        class="mt-5 bg-grey-light text-grey-darkest font-bold py-1 px-1 rounded inline-flex items-center hover:bg-red-100 focus:outline-none focus:ring-2 focus:ring-red-600 focus:ring-opacity-50">
                                        {{-- <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M13 8V2H7v6H2l8 8 8-8h-5zM0 18h20v2H0v-2z"/></svg> --}}
                                        {{-- <svg class="fill-current w-8 h-8 mr-1 text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"> <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg> --}}
                                        <svg class="fill-current w-10 h-10 text-red-700" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zM8 9h8v10H8V9zm7.5-5l-1-1h-5l-1 1H5v2h14V4z"/></svg>
                                    </button>
                                </div>
                                @endif
                            @endforeach
                            <div class="col-span-12 sm:col-span-6">
                                <div class="flex justify-between">
                                    <div>
                                        <button wire:click.prevent="agregarCis()" type="button"
                                            class="py-2 px-3 border border-transparent text-sm leading-5 font-medium rounded-full text-white bg-yellow-400 shadow-sm hover:bg-yellow-500 focus:outline-none focus:shadow-outline-orange active:bg-yellow-600 transition duration-150 ease-in-out">
                                            Agregar CIS
                                            </button>
                                        </button>
                                    </div>
                                </div>
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
                    <button wire:click.prevent="store()" wire:loading.class="animate-ping" wire:loading.attr="disabled" type="button"
                    class="py-2 px-4 mt-5 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-green-600 shadow-sm hover:bg-green-500 focus:outline-none focus:shadow-outline-blue active:bg-green-600 transition duration-150 ease-in-out">
                        Registrar
                    </button>
                </div>
            </div>
        @elseif($registed)
            <div class="flex justify-center">
                <div>
                    <p class="text-green-600 text-3xl text-center mb-5">
                        Gracias por adherirse a la factura digital
                    </p>
                </div>
            </div>
            <div class="flex justify-center">
                <div>
                    <a href=""
                    class="py-2 px-4 mt-5 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-green-600 shadow-sm hover:bg-green-500 focus:outline-none focus:shadow-outline-blue active:bg-green-600 transition duration-150 ease-in-out">
                        Registrar nuevo servicio
                    </a>
                </div>
            </div>
        @endif
        </div>
    </div>
</div>