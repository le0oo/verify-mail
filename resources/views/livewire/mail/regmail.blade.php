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
                                    Número de telefono
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
                            <div class="col-span-12 sm:col-span-6">
                                <div class="flex justify-between">
                                    <div>
                                    <button wire:click.prevent="agregarCis()" type="button"
                                        class="py-2 px-3 border border-transparent text-sm leading-5 font-medium rounded-full text-white bg-yellow-400 shadow-sm hover:bg-yellow-500 focus:outline-none focus:shadow-outline-orange active:bg-yellow-600 transition duration-150 ease-in-out">
                                        Agregar CIS
                                        </button>
                                    </button>
                                    </div>
                                    <div>
                                        <button wire:click.prevent="agregarCis()" type="button"
                                        class="animate-pulse py-2 px-3 border border-transparent text-sm leading-5 font-medium rounded-full text-white bg-yellow-400 shadow-sm hover:bg-yellow-500 focus:outline-none focus:shadow-outline-orange active:bg-yellow-600 transition duration-150 ease-in-out">
                                            {{-- <svg class="inline animate-spin h-5 w-5 mr-3" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0z" fill="none"/><path d="M12 4H5C3.34 4 2 5.34 2 7v8c0 1.66 1.34 3 3 3l-1 1v1h1l2-2.03L9 18v-5H4V5.98L13 6v2h2V7c0-1.66-1.34-3-3-3zM5 14c.55 0 1 .45 1 1s-.45 1-1 1-1-.45-1-1 .45-1 1-1zm15.57-4.34c-.14-.4-.52-.66-.97-.66h-7.19c-.46 0-.83.26-.98.66L10 13.77l.01 5.51c0 .38.31.72.69.72h.62c.38 0 .68-.38.68-.76V18h8v1.24c0 .38.31.76.69.76h.61c.38 0 .69-.34.69-.72l.01-1.37v-4.14l-1.43-4.11zm-8.16.34h7.19l1.03 3h-9.25l1.03-3zM12 16c-.55 0-1-.45-1-1s.45-1 1-1 1 .45 1 1-.45 1-1 1zm8 0c-.55 0-1-.45-1-1s.45-1 1-1 1 .45 1 1-.45 1-1 1z"/></svg> --}}
                                            <svg class="inline animate-spin h-5 w-5 mr-3" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0z" fill="none"/><path d="M12 6v3l4-4-4-4v3c-4.42 0-8 3.58-8 8 0 1.57.46 3.03 1.24 4.26L6.7 14.8c-.45-.83-.7-1.79-.7-2.8 0-3.31 2.69-6 6-6zm6.76 1.74L17.3 9.2c.44.84.7 1.79.7 2.8 0 3.31-2.69 6-6 6v-3l-4 4 4 4v-3c4.42 0 8-3.58 8-8 0-1.57-.46-3.03-1.24-4.26z"/></svg>
                                            <!-- ... -->
                                            Processing
                                            </button>
                                            {{-- Agregar CIS --}}
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
                    @if($enviando)
                        <button wire:click.prevent="store()" type="button" disabled
                        class="animate-ping py-2 px-4 mt-5 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-green-600 shadow-sm hover:bg-green-500 focus:outline-none focus:shadow-outline-blue active:bg-green-600 transition duration-150 ease-in-out">
                        <svg class="inline animate-spin h-5 w-5 mr-3" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0z" fill="none"/><path d="M12 6v3l4-4-4-4v3c-4.42 0-8 3.58-8 8 0 1.57.46 3.03 1.24 4.26L6.7 14.8c-.45-.83-.7-1.79-.7-2.8 0-3.31 2.69-6 6-6zm6.76 1.74L17.3 9.2c.44.84.7 1.79.7 2.8 0 3.31-2.69 6-6 6v-3l-4 4 4 4v-3c4.42 0 8-3.58 8-8 0-1.57-.46-3.03-1.24-4.26z"/></svg>
                            Enviando
                        </button>
                    @elseif(!$enviando)
                        <button wire:click.prevent="store()" wire:loading.class="animate-ping" type="button"
                        class="py-2 px-4 mt-5 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-green-600 shadow-sm hover:bg-green-500 focus:outline-none focus:shadow-outline-blue active:bg-green-600 transition duration-150 ease-in-out">
                            Registrar
                        </button>              
                    @endif
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