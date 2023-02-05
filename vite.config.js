import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    server: {
        host: '0.0.0.0',
        hmr: {
            host: 'localhost'
        }
    },

    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/jquery-3.6.3.min.js',
                'resources/js/app.js',
                'resources/js/main.js',
            ],
            refresh: true,
        }),
    ],
});
