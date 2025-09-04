<!doctype html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @vite('resources/css/app.css')
  </head>
  <body >
    <x-nav-bar />
    <div class="max-w-4xl mx-auto p-4">
      <x-card-state />
      <x-companies-table />
    </div>
  </body>
</html>
