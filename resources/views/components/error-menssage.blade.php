<div>
    @if ($errors->any())
        <div
            x-data="{ show: true }"
            x-init="setTimeout(() => show = false, 6000)"
            x-show="show"
            x-transition.opacity.duration.500ms
            class="p-4 mt-4 text-sm text-red-700 bg-red-100 border border-red-300 rounded-lg shadow-md"
            role="alert"
            aria-live="assertive"
            wire:ignore
        >
            <div class="flex items-center mb-2 text-lg font-semibold">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2 text-red-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z" />
                </svg>
                <strong>Se detectaron incidencias:</strong>
            </div>
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>
