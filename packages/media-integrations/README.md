# media-integrations

[![Latest Version on Packagist](https://img.shields.io/packagist/v/bittacora/media-integrations.svg?style=flat-square)](https://packagist.org/packages/bittacora/media-integrations)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/bittacora/media-integrations/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/bittacora/media-integrations/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/bittacora/media-integrations/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/bittacora/media-integrations/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/bittacora/media-integrations.svg?style=flat-square)](https://packagist.org/packages/bittacora/media-integrations)

Este paquete sirve para integrar videos de Youtube, Vimeo y RRSS.

Instalación via composer:

```bash
composer require bittacora/media-integrations
```

Opcionalmente, puedes publicar las vistas públicas del paquete:

```bash
php artisan vendor:publish --tag="media-integrations-public"
```

## Usage
En el Facade del paquete vienen varias funciones que te ayudarán (en cada función viene su descripción con lo que hace).

```php
Bittacora\MediaIntegrations\Facades\MediaIntegrationsFacade
```

## Ejemplo de uso
- bPanel:
  1. En el modelo donde quieras meter la implementación utiliza el trait HasIntegrations.
  ```php
  class MyModel extends Model
  {
    use Bittacora\MediaIntegrations\Traits\HasIntegrations\HasIntegrations;
  }
    ```
  2. En la vista editar introducir el componente (donde $model es el elemento que se está editando) y el 
  script es para abrir y cerrar el modal cuando editamos una integración. 
  **El componente de blade DEBE ESTAR FUERA DE LA ETIQUETA FORM.**
  ```blade
  <x-media-integrations::bpanel.integration-media :model="$model" />
    @push('scripts')
        <script>
            window.addEventListener('show-edit-modal', () => {
                $('#editIntegrationModal').modal('show');
            });
    
            window.addEventListener('hide-edit-modal', () => {
                $('#editIntegrationModal').modal('hide');
            });
        </script>
    @endpush
    ```
- Parte pública: 
  En la vista introducimos lo siguiente:
  ```blade
    {{--Para usar todas las integraciones (donde :model es el elemento donde se han asociado las integraciones)--}}
    <x-media-integrations::components.public.all-media-integrations :model="$model"/>
    {{--O integraciones por tipo--}}
    <x-media-integrations::components.public.youtube-media-integration :model="$model"/>
    <x-media-integrations::components.public.vimeo-media-integration :model="$model"/>
    <x-media-integrations::components.public.instagram-media-integration :model="$model"/>
    <x-media-integrations::components.public.x-media-integration :model="$model"/>
    <x-media-integrations::components.public.facebook-media-integration :model="$model"/>
    <x-media-integrations::components.public.tiktok-media-integration :model="$model"/>
    ```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [joaquin](https://github.com/joaquin)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
