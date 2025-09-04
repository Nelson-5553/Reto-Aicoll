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
                    <th scope="col" class="px-6 py-3">Acciones</th>
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
                            <td class="px-6 py-4">
                                <a href="{{ route('empresas.edit', $empresa) }}"
                                    class="text-blue-500"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-square-pen-icon lucide-square-pen"><path d="M12 3H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.375 2.625a1 1 0 0 1 3 3l-9.013 9.014a2 2 0 0 1-.853.505l-2.873.84a.5.5 0 0 1-.62-.62l.84-2.873a2 2 0 0 1 .506-.852z"/></svg></a>
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
