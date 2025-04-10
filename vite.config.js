import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 
                'resources/js/app.js',
                'resources/assets/vendors/mdi/css/materialdesignicons.min.css',
               'resources/assets/vendors/css/vendor.bundle.base.css',
               'resources/assets/css/style.css',





               //javascript
               'resources/assets/js/off-canvas.js',
               'resources/assets/js/hoverable-collapse.js',
               'resources/assets/js/misc.js',
               'resources/assets/js/settings.js',
               'resources/assets/js/todolist.js'
            ],
            refresh: true,
        }),
    ],
});
