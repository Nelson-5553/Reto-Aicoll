@extends('layouts.app')
@section('content')
    <a href="{{ route('empresas.index') }}"
       class="inline-flex items-center gap-2 mb-6 px-4 py-2 rounded-lg bg-gradient-to-r from-purple-600 to-purple-400 text-white font-semibold shadow-md hover:from-purple-700 hover:to-purple-500 transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-purple-300">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round"><path d="M15 19l-7-7 7-7"/></svg>
        Volver
    </a>


      <form action="{{ route('empresas.update', $empresas->id) }}" method="POST" class="p-4 md:p-5 bg-white rounded-lg shadow-sm border border-purple-50">
    @csrf
    @method('PUT')
    <div class="grid gap-4 mb-4 grid-cols-2 ">
        <div class="flex flex-row items-center gap-3 col-span-2 mb-2">
        <div class="flex items-center justify-center w-10 h-10 rounded-lg bg-purple-600 text-white">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-refresh-cw-icon lucide-refresh-cw"><path d="M3 12a9 9 0 0 1 9-9 9.75 9.75 0 0 1 6.74 2.74L21 8"/><path d="M21 3v5h-5"/><path d="M21 12a9 9 0 0 1-9 9 9.75 9.75 0 0 1-6.74-2.74L3 16"/><path d="M8 16H3v5"/></svg>
          </div>

            <h1 class="flex flex-col">
                <strong class="text-lg text-gray-900">Editar Empresa</strong>
                Por favor, actualiza la información de la empresa a continuación.
            </h1>
        </div>
        <div class="col-span-1">
            <label for="nombre" class="block mb-2 text-sm font-medium text-gray-900">Nombre</label>
            <input type="text" name="nombre" id="nombre" value="{{ old('nombre', $empresas->nombre) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-purple-600 focus:border-purple-600 block w-full p-2.5" required>
        </div>
        <div class="col-span-1">
            <label for="direccion" class="block mb-2 text-sm font-medium text-gray-900">Dirección</label>
            <input type="text" name="direccion" id="direccion" value="{{ old('direccion', $empresas->direccion) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-purple-600 focus:border-purple-600 block w-full p-2.5" required>
        </div>
        <div class="col-span-1">
            <label for="telefono" class="block mb-2 text-sm font-medium text-gray-900">Teléfono</label>
            <input type="text" name="telefono" id="telefono" value="{{ old('telefono', $empresas->telefono) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-purple-600 focus:border-purple-600 block w-full p-2.5" required>
        </div>
        <div class="col-span-1">
            <label for="estado" class="block mb-2 text-sm font-medium text-gray-900">Estado</label>
            <select name="estado" id="estado" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-purple-600 focus:border-purple-600 block w-full p-2.5">
                <option value="activo" {{ old('estado', $empresas->estado) == 'activo' ? 'selected' : '' }}>Activo</option>
                <option value="inactivo" {{ old('estado', $empresas->estado) == 'inactivo' ? 'selected' : '' }}>Inactivo</option>
            </select>
        </div>
    </div>
    <button type="submit" class="text-white inline-flex items-center bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
        <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
        Actualizar Empresa
    </button>
</form>
@endsection
