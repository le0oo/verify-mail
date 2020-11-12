<div>
    <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="bg-white px-4 py-3 flex items-center justify-around border-t border-gray-200 sm:px-6">
                    <div>
                        <label class="font-bold mb-1 text-gray-700 block" for="email">Email</label>
                        <input class="form-input rounded-md shadow-sm mt-1" wire:model.debounce.500ms="emailsearch" type="text">
                    </div>
                    <div>
                        <label class="font-bold mb-1 text-gray-700 block" for="estado">Estado</label>
                        <select name="verificado" class="appearance-none bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500 mt-1"
                            wire:model.debounce.500ms="verificado">
                            <option value="null" disabled selected>Seleccione un Tipo...</option>
                            <option value="1">Verificado</option>
                            <option value="0">Pendiente</option>
                        </select>
                    </div>
                    <div>
                        <label class="font-bold mb-1 text-gray-700 block" for="email">CIS</label>
                        <input class="form-input rounded-md shadow-sm mt-1" wire:model.debounce.500ms="cissearch" type="text">
                    </div>
                </div>
                <div class="bg-white px-4 py-3 flex items-center justify-around border-t border-gray-200 sm:px-6">
                    <div>
                        <label class="font-bold mb-1 text-gray-700 block" for="email">Desde</label>
                        <input class="form-input rounded-md shadow-sm mt-1" wire:model.debounce.500ms="dateDesde" type="date" placeholder="Seleccione Fecha">
                    </div>
                        {{-- {{$dateDesde}} --}}
                    <div>                        
                        <label class="font-bold mb-1 text-gray-700 block" for="email">Hasta</label>
                        <input class="form-input rounded-md shadow-sm mt-1" wire:model.debounce.500ms="dateHasta" type="date" placeholder="Seleccione Fecha">
                    </div>
                        {{-- {{$dateHasta}} --}}
                    <div>
                        <button wire:click.prevent="limpiarfiltro()" type="button"
                        class="inline-flex justify-center rounded-md border border-transparent px-4 py-2 bg-green-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-green-500 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                            Refrescar Formulario
                        </button>
                    </div>
                </div>
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                    <thead>
                        <tr>
                            <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                Mail
                            </th>
                            <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                CIS
                            </th>
                            <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                Hash
                            </th>
                            <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                Estado
                            </th>
                            <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                Fecha Registro
                            </th>
                            <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                Fecha Verificado
                            </th>
                            {{-- <th class="px-6 py-3 bg-gray-50"></th> --}}
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($listmail as $index)
                        <tr>
                            <td class="px-6 py-4 whitespace-no-wrap">
                                <div class="text-sm leading-5 text-gray-900">{{$index->mail}}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap">
                                <div class="text-sm leading-5 text-gray-900">
                                    {{$index->cis}}
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap">
                                <div class="text-xs leading-5 text-gray-900">
                                    {{$index->hash}}
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap">
                                @if($index->estado)
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                    Verificado
                                </span>
                                @else
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                    Pendiente
                                </span>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">
                                {{$index->created_at}}
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">
                                @if($index->created_at == $index->updated_at)
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                    Pendiente
                                </span>           
                                @else
                                    {{$index->updated_at}}
                                @endif
                            </td>
                            {{-- <td class="px-6 py-4 whitespace-no-wrap text-right text-sm leading-5 font-medium">
                                <button disabled class="text-indigo-600 hover:text-indigo-900">+Info</button>
                                <a href="#" class="text-indigo-600 hover:text-indigo-900" disabled>+Info</a>
                            </td> --}}
                        </tr>
                        @endforeach

                    </tbody>
                    </table>
                    @if($listmail->count())
                        <div class="bg-white px-4 py-3 border-t border-gray-200 sm:px-6">
                            {{ $listmail->links() }}
                        </div>
                        <div class="bg-white px-4 py-3 border-t border-gray-200 sm:px-6">
                            <label for="export">Exportar</label>
                            <button wire:click.prevent="export('excel')" type="button"
                            class="inline-flex justify-center rounded-md border border-transparent px-2 py-1 bg-green-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-green-500 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                                Excel
                            </button>
                            <button wire:click.prevent="export('csv')" type="button"
                            class="inline-flex justify-center rounded-md border border-transparent px-2 py-1 bg-green-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-green-500 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                                CSV
                            </button>
                        </div>
                    @else
                        <div class="bg-white px-4 py-3 border-t border-gray-200 sm:px-6">
                            No Existen Resultados
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>