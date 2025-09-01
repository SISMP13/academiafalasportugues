# bPanel4-services

[![Latest Version on Packagist](https://img.shields.io/packagist/v/bittacora/services.svg?style=flat-square)](https://packagist.org/packages/bittacora/services)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/bittacora/services/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/bittacora/services/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/bittacora/services/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/bittacora/services/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/bittacora/services.svg?style=flat-square)](https://packagist.org/packages/bittacora/services)

Paquete para crear un módulo en bPanel4 de servicios, productos o cualquier tipo de clasificación de funciones que realize una empresa (y que no requiera ningún proceso de tienda). Este paquete contiene también la posibilidad de categorizarlos con el paquete bPanel4-category (ya instalado por defecto) y ordenar los registros creados.

## Instalación

Instalar el paquete via composer:

```bash
composer require bittacora/services
```

Debes publicar el archivo de configuración con:

```bash
php artisan vendor:publish --tag="services-config"
```

Este es el contenido publicado del archivo de configuración
```php
    'name-module' => 'Servicios',
    'route_prefix' => 'services',
    'table_name' => 'services',
    'sortable_datatable' => true,
    'icon' => 'fa fa-seedling',
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
    'images_location_names' => ['Imagen en página principal','Portada en ficha de servicio','Imagen bloque','Galería','Imagen Social'],
    'categories' => false,
    'categories_images_location' => false,
    'categories_images_location_names' => ['Imagen en página principal','Portada en ficha de servicio','Imagen bloque','Galería','Imagen Social']
```

Comprueba que tienes la configuración que deseas y después ejecuta el comando:
```bash
php artisan services:install
```

Opcionalmente, puedes publicar las vistas

```bash
php artisan vendor:publish --tag="services-views"
```

<!-- ## Usage

```php
$services = new Bittacora\Services();
echo $services->echoPhrase('Hello, Bittacora!');
```

## Testing

```bash
composer test
```
-->
## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [joaquin](https://github.com/joaquín)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
