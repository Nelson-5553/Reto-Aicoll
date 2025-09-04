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
            class="w-full text-sm text-left rtl:text-right text-gray-600 border border-gray-200 rounded-lg overflow-hidden">
            <!-- Encabezado -->
            <thead class="text-xs uppercase bg-purple-100 text-purple-800">
                <tr>
                    <th scope="col" class="px-6 py-3">NIT</th>
                    <th scope="col" class="px-6 py-3">Nombre</th>
                    <th scope="col" class="px-6 py-3">Dirección</th>
                    <th scope="col" class="px-6 py-3">Teléfono</th>
                    <th scope="col" class="px-6 py-3">Estado</th>
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
                        <tr class="bg-white hover:bg-purple-50">
                            <td class="px-6 py-4 font-medium text-gray-900">{{ $empresa->nit }}</td>
                            <td class="px-6 py-4">{{ $empresa->nombre }}</td>
                            <td class="px-6 py-4">{{ $empresa->direccion }}</td>
                            <td class="px-6 py-4">{{ $empresa->telefono }}</td>
                            <td class="px-6 py-4">
                                @if ($empresa->estado === 'activo')
                                    <span
                                        class="bg-[#4A1A5C] text-white text-xs font-medium me-2 px-2.5 py-1 rounded-sm">{{ $empresa->estado }}</span>
                                @else
                                    <span
                                        class="bg-[#D946EF] text-white text-xs font-medium me-2 px-2.5 py-1 rounded-sm">{{ $empresa->estado }}</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        <div class="p-4">
            {{ $empresas->links() }}
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
