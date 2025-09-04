<!doctype html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @vite('resources/css/app.css')
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
    @livewireStyles

  </head>
  <body >
    <x-nav-bar />
    <div class="max-w-4xl mx-auto p-4">
        <x-card-state />
        <x-success-menssage />
        <x-error-menssage />
        {{-- <x-create-companies /> --}}
        {{-- <x-companies-table :empresas="$empresas" /> --}}
        @livewire('search-companies')
    </div>
    @livewireScripts
  </body>
</html>
