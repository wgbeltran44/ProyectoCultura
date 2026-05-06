import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/variables.css',
                'resources/css/base.css',
                'resources/css/navigation.css',
                'resources/css/welcome.css',
                'resources/css/login.css',
                'resources/css/dashboard.css',
		'resources/css/profile.css',
                'resources/css/tradiciones.css',
                'resources/css/gastronomia.css',
                'resources/css/turismo.css',
                'resources/css/admin-usuarios.css',
                'resources/css/obras-form.css',
                'resources/js/app.js'
            ],
            refresh: true,
        }),
    ],
});