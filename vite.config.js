import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'node_modules/jquery/dist/jquery.js',
                'node_modules/bootstrap/dist/css/bootstrap.css',
                'node_modules/bootstrap/dist/js/bootstrap.bundle.js',
                'resources/css/app.css',
                'resources/js/app.js'
            ],
            refresh: true,
        }),
    ],

    build:{
        manifest: true,
    },
});
