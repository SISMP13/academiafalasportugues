<?php
// config for Bittacora/Bpanel4Panel
return [
    // URLs de los archivos CSS adicionales que se cargarán en TinyMCE. Útil para incluir estilos de la parte pública
    // y que así al editar la vista previa se parezca más a lo que se verá en la parte pública.
    // Debe ser null o un array de strings
    'tinymce-additional-styles' => null,
    // Si se necesita hacer referencia a algún asset de Vite (un archivo .scss, por ejemplo), se puede usar la siguiente
    // opción, en la que habrá que crear un array con las rutas que se pasarán a Vite::asset(), 
    // por ejemplo resources/scss/style.scss
    'tinymce-additional-vite-styles' => null,
];
