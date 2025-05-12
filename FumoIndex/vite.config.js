import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';
import react from '@vitejs/plugin-react';
import svgr from 'vite-plugin-svgr';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/assets/app.css', 'resources/js/assets/app.js'],
            refresh: true,
        }),
        tailwindcss(),
        svgr(),
        react()
    ]
});
