## Resultados y Estilo de Código

Durante la prueba técnica se implementó una solución siguiendo buenas prácticas de desarrollo en Laravel y PHP. El código está estructurado en capas, utilizando patrones de diseño y manteniendo una nomenclatura clara y descriptiva para variables y funciones. Se aplicó programación funcional donde fue pertinente y se priorizó la legibilidad y mantenibilidad del código.

Se realizaron pruebas unitarias utilizando PHPUnit, asegurando la correcta funcionalidad de los servicios y componentes desarrollados. El manejo de excepciones está presente en los controladores y servicios, garantizando respuestas adecuadas ante errores y validaciones de datos.

### Componentes y Librerías Utilizadas

- **Laravel**: Framework principal para la estructura del proyecto y gestión de rutas, controladores y modelos.
- **Livewire**: Para la creación de componentes interactivos en el frontend.
- **Tailwind CSS**: Utilizado para el diseño responsivo y estilizado de la interfaz.
- **Heroicons**: Para iconografía en los componentes visuales.
- **PHPUnit**: Framework de pruebas unitarias integrado en Laravel.
- **Vite**: Para la gestión y compilación de assets frontend.

### Despliegue

El proyecto está disponible en el siguiente enlace:

**[Enlace](tu_enlace_aqui)**

### Descripción de Componentes

A continuación se detallan los componentes ubicados en `resources/views/components` y en `resources/views/livewire` y su función dentro del sistema:

- **card-state.blade.php**  
  Muestra tarjetas con estadísticas generales sobre las empresas (total, activas, tasa de actividad).

- **companies-table.blade.php**  
  Renderiza una tabla con la información de las empresas, mostrando sus datos principales.

- **searh-companies.blade.php**  
  Proporciona un modal para crear nuevas empresas, incluyendo el formulario de registro.

- **delete-modal.blade.php**  
  Modal de confirmación para eliminar o desactivar empresas, mostrando advertencias y opciones de acción.

- **error-menssage.blade.php**  
  Presenta mensajes de error y validación en la interfaz, mostrando incidencias detectadas en formularios.

- **nav-bar.blade.php**  
  Barra de navegación principal del sistema, con el título y branding del reto técnico.

- **success-menssage.blade.php**  
  Muestra mensajes de éxito tras operaciones satisfactorias como creación, edición o eliminación


### Estructura básica del NIT

- Parte principal: un número (puede ser cédula, identificación de empresa, etc.).
- DV (Dígito de Verificación): un número del 0 al 9 que se obtiene aplicando un cálculo sobre la parte principal.

### NitHelper: Generación y Validación del NIT

El componente `NitHelper` es responsable de la generación automática y validación del NIT (Número de Identificación Tributaria) para cada empresa registrada en el sistema.

- **Generación del NIT**: Al crear una nueva empresa, el sistema utiliza `NitHelper::generarNIT()` para asignar un NIT único. Este NIT consta de una parte principal (número base) y un Dígito de Verificación (DV), calculado mediante un algoritmo específico que garantiza la validez y unicidad del identificador.

- **Cálculo del Dígito de Verificación (DV)**: El DV es un número entre 0 y 9, obtenido aplicando un cálculo matemático sobre la parte principal del NIT. Este proceso ayuda a prevenir errores de digitación y asegura la integridad de los datos.

- **Validación de unicidad**: Antes de guardar una empresa, se verifica que el NIT generado no esté duplicado en la base de datos, cumpliendo con los requisitos técnicos del reto.

El uso de `NitHelper` centraliza la lógica relacionada con el NIT, facilitando el mantenimiento y la extensión del sistema en el futuro.
