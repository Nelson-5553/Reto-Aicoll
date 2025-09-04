<div>
    <div class="flex justify-center flex-row items-center mt-12 mb-4 w-full gap-4">
        <div class="flex-1">
            <input type="text" placeholder="Buscar empresa por NIT o Nombre..."
                class="px-4 py-2 border rounded-lg w-full focus:ring-2 focus:ring-purple-400 focus:outline-none"
                oninput="debouncedSearch(this.value)" value="{{ $search }}" />
        </div>
        <x-create-companies />
    </div>

    <div class="relative overflow-x-auto mt-10">
        <table
            class="w-full text-sm text-left rtl:text-right text-gray-600 border border-purple-200 rounded-xl shadow-md overflow-hidden">
            <!-- Encabezado -->
            <thead class="text-xs uppercase bg-gradient-to-r from-purple-100 to-purple-200 text-purple-800">
                <tr>
                    <th scope="col" class="px-6 py-3 font-semibold tracking-wide">NIT</th>
                    <th scope="col" class="px-6 py-3 font-semibold tracking-wide">Nombre</th>
                    <th scope="col" class="px-6 py-3 font-semibold tracking-wide">Dirección</th>
                    <th scope="col" class="px-6 py-3 font-semibold tracking-wide">Teléfono</th>
                    <th scope="col" class="px-6 py-3 font-semibold tracking-wide">Estado</th>
                    <th scope="col" class="px-6 py-3 font-semibold tracking-wide">Acciones</th>
                </tr>
            </thead>

            <!-- Cuerpo -->
            <tbody>
                @if ($empresas->isEmpty())
                    <tr>
                        <td colspan="5" class="px-6 py-4 text-center text-gray-500">No se encontraron empresas.</td>
                    </tr>
                @else
                    @foreach ($empresas as $empresa)
                        <tr class="bg-white hover:bg-purple-50 transition-all duration-150 border-b border-purple-100 last:border-b-0">
                            <td class="px-6 py-4 font-medium text-purple-900">{{ $empresa->nit }}</td>
                            <td class="px-6 py-4 text-purple-800">{{ $empresa->nombre }}</td>
                            <td class="px-6 py-4 text-gray-700">{{ $empresa->direccion }}</td>
                            <td class="px-6 py-4 text-gray-700">{{ $empresa->telefono }}</td>
                            <td class="px-6 py-4">
                                @if ($empresa->estado === 'activo')
                                    <span
                                        class="bg-[#4A1A5C] text-white text-xs font-medium me-2 px-2.5 py-1 rounded-sm">{{ $empresa->estado }}</span>
                                @else
                                    <span
                                        class="bg-[#D946EF] text-white text-xs font-medium me-2 px-2.5 py-1 rounded-sm">{{ $empresa->estado }}</span>
                                @endif
                            </td>
                            <td class="flex flex-row px-6 py-4 gap-2">
                                <a href="{{ route('empresas.edit', $empresa) }}" class="text-blue-500"><x-heroicon-o-pencil-square class="w-6 h-6" /></a>
                                <x-delete-modal>
                                    <!-- Dialog Body -->
                                    @if ($empresa->estado === 'activo')
                                        <div class="p-4 text-center">
                                            <h3 id="dangerModalTitle"
                                                class="mb-2 font-semibold tracking-wide text-neutral-900">
                                                Desactivar Empresa</h3>
                                            <p>La empresa <strong>{{ $empresa->nombre }}</strong> está activa. Es requerido desactivarla para ser eliminada.</p>
                                        </div>
                                        <div class="flex items-center justify-center border-neutral-300 p-4">
                                            <button x-on:click="dangerModalIsOpen = false" type="button"
                                                class="w-full whitespace-nowrap rounded-sm border border-purple-500 bg-purple-500 px-4 py-2 text-center text-sm font-semibold tracking-wide text-white transition hover:opacity-75 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-purple-500 active:opacity-100 active:outline-offset-0">Volver</button>
                                        </div>
                                    @else
                                        <div class="px-4 text-center">
                                            <h3 id="dangerModalTitle"
                                                class="mb-2 font-semibold tracking-wide text-neutral-900">
                                                Eliminar Empresa</h3>
                                            <p>¿Estás seguro de que deseas eliminar esta empresa? Este acción no se puede deshacer.</p>
                                        </div>
                                        <!-- Dialog Footer -->
                                        <form action="{{ route('empresas.destroy', $empresa) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <div class="flex items-center justify-center border-neutral-300 p-4">
                                                <button x-on:click="dangerModalIsOpen = false" type="submit"
                                                    class="w-full whitespace-nowrap rounded-sm border border-purple-500 bg-purple-500 px-4 py-2 text-center text-sm font-semibold tracking-wide text-white transition hover:opacity-75 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-500 active:opacity-100 active:outline-offset-0">Eliminar Empresa</button>
                                            </div>
                                        </form>
                                    @endif
                                </x-delete-modal>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        <div class="p-4">
            {{ $empresas->links('pagination::tailwind') }}
        </div>


    </div>
    <script>
        let debounceTimer;

        function debouncedSearch(value) {
            clearTimeout(debounceTimer);
            debounceTimer = setTimeout(() => {
                Livewire.dispatch('searchChanged', {
                    value
                });
            }, 200); // 200ms de espera
        }
    </script>
