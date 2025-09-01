<?php

// config for Bittacora/Services
return [
    'name-module' => 'Servicios',
    'route_prefix' => 'services',
    'table_name' => 'services',
    'sortable_datatable' => true,
    'icon' => 'fas fa-tools',
    'role-index' => 'Listar servicios',
    'role-create' => 'Crear servicio',
    'role-store' => 'Guardar servicio',
    'role-show' => 'Ver servicio',
    'role-edit' => 'Editar servicio',
    'role-update' => 'Actualizar servicio',
    'role-destroy' => 'Borrar servicio',
    'alert-store-danger' => 'Hubo un error al crear el servicio.',
    'alert-store-success' => 'El servicio ha sido creado correctamente.',
    'alert-update-danger' => 'El servicio no pudo ser actualizado',
    'alert-update-success' => 'El servicio ha sido actualizado',
    'alert-destroy-danger' => 'El servicio no pudo ser eliminado',
    'alert-destroy-success' => 'Servicio eliminado',
    'modal-destroy-message' => 'el servicio?',
    'images_location' => true,
    'images_location_names' => ['Imagen destacada', 'Portada en ficha de servicio', 'Galería'],
    'categories' => false,
    'categories_images_location' => false,
    'categories_images_location_names' => []
];
