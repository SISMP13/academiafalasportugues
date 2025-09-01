import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import path from 'path';

export default defineConfig({
resolve: {
        alias: {
            '~font-awesome/css/font-awesome.min.css': path.resolve(__dirname, 'node_modules/font-awesome/css/font-awesome.min.css'),
            '~bootstrap': path.resolve(__dirname, 'node_modules/bootstrap'),
            '~select2': path.resolve(__dirname, 'node_modules/select2'),
            '~font-awesome': path.resolve(__dirname, 'resources/bpanel4/assets/vendor/fontawesome-pro-5.15.4'),
            '~datatables.net-bs4': path.resolve(__dirname, 'node_modules/datatables.net-bs4'),
            '~datatables.net-buttons-bs4': path.resolve(__dirname, 'node_modules/datatables.net-buttons-bs4'),
            '~datatables.net-rowreorder-bs4': path.resolve(__dirname, 'node_modules/datatables.net-rowreorder-bs4'),
            '@': '/resources'
        }
    },
    plugins: [
        laravel({
            input: ['resources/css/app.css',

    // ~@bp4Start@~
// bittacora/bpanel4-language
        'resources/language/scss/language.scss',
        // bittacora/bpanel4-public-menu
        'vendor/bittacora/laravel-menu/public/style.css',
        'vendor/bittacora/laravel-menu/public/menu.js',
        // /bittacora/bpanel4-public-menu
        'node_modules/jquery/dist/jquery.js',
        'node_modules/flatpickr/dist/flatpickr.css',
        'node_modules/tinymce/tinymce.min.js',
        'node_modules/bootstrap/dist/js/bootstrap.js',
        // Fancybox
        'node_modules/@fancyapps/ui/dist/fancybox/fancybox.css',
        'node_modules/@fancyapps/ui/dist/fancybox/fancybox.umd.js',
        'vendor/bittacora/bpanel4-panel/resources/assets/js/ace.js',
        'resources/bpanel4/assets/sass/app.scss',
        'resources/bpanel4/assets/scss/ace.scss',
        'resources/bpanel4/assets/scss/login.scss',
        'vendor/bittacora/bpanel4-panel/resources/assets/js/app.js',
        'resources/bpanel4/assets/js/app.public.js',
        'vendor/bittacora/bpanel4-panel/resources/assets/js/livewire-sortable.js',
        'vendor/bittacora/bpanel4-panel/resources/assets/vendor/fontawesome-pro-5.15.4/css/all.css',
        '/node_modules/flatpickr/dist/flatpickr.js',
        '/node_modules/flatpickr/dist/flatpickr.css',
        '/node_modules/tinymce/skins/content/default/content.css',
        'vendor/bittacora/bpanel4-panel/resources/assets/js/ace.js',
        'vendor/bittacora/bpanel4-panel/resources/assets/css/ckeditor-styles.css',
        '/node_modules/@fancyapps/ui/dist/fancybox/fancybox.css',
        '/node_modules/alpinejs/dist/cdn.min.js',
   // ~@bp4End@~
                'resources/scss/app.scss',
                'resources/js/web.js',
                'resources/js/courses.js',
                'resources/js/testimonials.js',
'resources/js/app.js'],
            refresh: true,
        }),
    ],
});

