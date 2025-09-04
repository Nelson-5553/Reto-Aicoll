@props(['empresas'])
<div>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mt-12">
         <!-- Card 1 -->
    <div class="rounded-lg border border-purple-50 bg-purple-50 shadow-sm">
        <div class="flex flex-row items-center justify-between space-y-0 pb-2 p-4 border border-purple-50">
            <h3 class="text-sm font-medium text-gray-600">Total Empresas</h3>
            <!-- Icono -->
            <div class="flex items-center justify-center w-8 h-8 rounded-md bg-purple-600 text-white p-1.5">
                <x-heroicon-o-circle-stack class="h-6 w-6" />
            </div>
        </div>
        <div class="p-4">
            <div class="text-2xl font-bold text-gray-900">{{ $empresas->count() }}</div>
            <p class="text-xs text-gray-600">Registradas en el sistema</p>
        </div>
    </div>

    <!-- Card 2 -->
    <div class="rounded-lg border border-purple-50 bg-purple-50 shadow-sm">
        <div class="flex flex-row items-center justify-between space-y-0 pb-2 p-4 border border-purple-50">
            <h3 class="text-sm font-medium text-gray-600">Empresas Activas</h3>
            <div class="flex items-center justify-center w-8 h-8 rounded-md bg-purple-600 text-white p-1.5">
               <x-heroicon-o-users class="h-6 w-6" />
            </div>
        </div>
        <div class="p-4">
            <div class="text-2xl font-bold text-[#4A1A5C]">{{ $empresas->where('estado', 'activo')->count() }}</div>
            <p class="text-xs text-gray-600">Con estado activo</p>
        </div>
    </div>

    <!-- Card 3 -->
    @php
        $totalEmpresas = $empresas->count();
        $empresasActivas = $empresas->where('estado', 'activo')->count();
        $tasaActividad = $totalEmpresas > 0 ? intval(($empresasActivas / $totalEmpresas) * 100) : 0;
    @endphp

    <div class="rounded-lg border border-purple-50 bg-purple-50 shadow-sm">
        <div class="flex flex-row items-center justify-between space-y-0 pb-2 p-4 border border-purple-50">
            <h3 class="text-sm font-medium text-gray-600">Tasa de Actividad</h3>
            <div class="flex items-center justify-center w-8 h-8 rounded-md bg-purple-600 text-white p-1.5">
                <x-heroicon-o-chart-bar class="h-6 w-6" />
            </div>
        </div>
        <div class="p-4">
            <div class="text-2xl font-bold text-[#D946EF]">{{ $tasaActividad }}%</div>
            <p class="text-xs text-gray-600">Empresas operativas</p>
        </div>
    </div>
    </div>
</div>
