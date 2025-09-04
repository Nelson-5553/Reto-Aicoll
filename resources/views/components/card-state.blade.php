@props(['empresas'])
<div>
    <div class="grid grid-cols-3 gap-8 mt-12">
         <!-- Card 1 -->
    <div class="rounded-lg border border-purple-50 bg-purple-50 shadow-sm">
        <div class="flex flex-row items-center justify-between space-y-0 pb-2 p-4 border border-purple-50">
            <h3 class="text-sm font-medium text-gray-600">Total Empresas</h3>
            <!-- Icono -->
            <div class="flex items-center justify-center w-8 h-8 rounded-md bg-purple-600 text-white">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2">
                    <path d="M12 2C7 2 3 3.79 3 6v12c0 2.21 4 4 9 4s9-1.79 9-4V6c0-2.21-4-4-9-4z" />
                    <path d="M3 6c0 2.21 4 4 9 4s9-1.79 9-4" />
                    <path d="M3 12c0 2.21 4 4 9 4s9-1.79 9-4" />
                </svg>
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
            <div class="flex items-center justify-center w-8 h-8 rounded-md bg-purple-600 text-white">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-users-round-icon lucide-users-round"><path d="M18 21a8 8 0 0 0-16 0"/><circle cx="10" cy="8" r="5"/><path d="M22 20c0-3.37-2-6.5-4-8a5 5 0 0 0-.45-8.3"/></svg>
            </div>
        </div>
        <div class="p-4">
            <div class="text-2xl font-bold text-[#4A1A5C]">{{ $empresas->where('estado', 'activo')->count() }}</div>
            <p class="text-xs text-gray-600">Con estado activo</p>
        </div>
    </div>

    @php
        $totalEmpresas = $empresas->count();
        $empresasActivas = $empresas->where('estado', 'activo')->count();
        $tasaActividad = $totalEmpresas > 0 ? ($empresasActivas / $totalEmpresas) * 100 : 0;
    @endphp

    <!-- Card 3 -->
    <div class="rounded-lg border border-purple-50 bg-purple-50 shadow-sm">
        <div class="flex flex-row items-center justify-between space-y-0 pb-2 p-4 border border-purple-50">
            <h3 class="text-sm font-medium text-gray-600">Tasa de Actividad</h3>
            <div class="flex items-center justify-center w-8 h-8 rounded-md bg-purple-600 text-white">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-trending-up-icon lucide-trending-up"><path d="M16 7h6v6"/><path d="m22 7-8.5 8.5-5-5L2 17"/></svg>
            </div>
        </div>
        <div class="p-4">
            <div class="text-2xl font-bold text-[#D946EF]">{{ $tasaActividad }}%</div>
            <p class="text-xs text-gray-600">Empresas operativas</p>
        </div>
    </div>
    </div>
</div>
