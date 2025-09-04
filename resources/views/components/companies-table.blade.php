@props(['empresas'])

<div>

<div class="relative overflow-x-auto mt-10">
  <table class="w-full text-sm text-left rtl:text-right text-gray-600 border border-gray-200 rounded-lg overflow-hidden">
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
      @foreach ($empresas as $empresa)
        <tr class="bg-white hover:bg-purple-50">
          <td class="px-6 py-4 font-medium text-gray-900">{{ $empresa->nit }}</td>
          <td class="px-6 py-4">{{ $empresa->nombre }}</td>
          <td class="px-6 py-4">{{ $empresa->direccion }}</td>
          <td class="px-6 py-4">{{ $empresa->telefono }}</td>
        <td class="px-6 py-4">
            @if ($empresa->estado === 'Activo')
              <span class="bg-[#4A1A5C] text-white text-xs font-medium me-2 px-2.5 py-1 rounded-sm">{{ $empresa->estado }}</span>
            @else
              <span class="bg-[#D946EF] text-white text-xs font-medium me-2 px-2.5 py-1 rounded-sm">{{ $empresa->estado }}</span>
            @endif
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
    <div class="p-4">
        {{-- {{ $empresas->links() }} --}}
    </div>


</div>
