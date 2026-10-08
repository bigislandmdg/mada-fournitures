import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './app/Livewire/**/*.php',
        './app/Http/Livewire/**/*.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Inter', ...defaultTheme.fontFamily.sans],
            },

            colors: {
                brand: {
                    50:  '#eff6ff',
                    100: '#dbeafe',
                    200: '#bfdbfe',
                    300: '#93c5fd',
                    400: '#60a5fa',
                    500: '#3b82f6',
                    600: '#2563eb',
                    700: '#1d4ed8',
                    800: '#1e40af',
                    900: '#1e3a8a',
                    950: '#172554',
                },
            },

            animation: {
                'fade-in':        'fadeIn 0.8s ease-out forwards',
                'fade-in-up':     'fadeInUp 0.8s ease-out forwards',
                'fade-in-down':   'fadeInDown 0.8s ease-out forwards',
                'slide-in-left':  'slideInLeft 0.8s ease-out forwards',
                'slide-in-right': 'slideInRight 0.8s ease-out forwards',
                'float':          'float 3s ease-in-out infinite',
                'pulse-slow':     'pulse 4s cubic-bezier(0.4, 0, 0.6, 1) infinite',
                'gradient':       'gradient 8s ease infinite',
                'bounce-slow':    'bounce 2s infinite',
                'spin-slow':      'spin 3s linear infinite',
            },

            keyframes: {
                fadeIn: {
                    '0%':   { opacity: '0' },
                    '100%': { opacity: '1' },
                },
                fadeInUp: {
                    '0%':   { opacity: '0', transform: 'translateY(30px)' },
                    '100%': { opacity: '1', transform: 'translateY(0)' },
                },
                fadeInDown: {
                    '0%':   { opacity: '0', transform: 'translateY(-30px)' },
                    '100%': { opacity: '1', transform: 'translateY(0)' },
                },
                slideInLeft: {
                    '0%':   { opacity: '0', transform: 'translateX(-50px)' },
                    '100%': { opacity: '1', transform: 'translateX(0)' },
                },
                slideInRight: {
                    '0%':   { opacity: '0', transform: 'translateX(50px)' },
                    '100%': { opacity: '1', transform: 'translateX(0)' },
                },
                float: {
                    '0%, 100%': { transform: 'translateY(0)' },
                    '50%':      { transform: 'translateY(-10px)' },
                },
                gradient: {
                    '0%, 100%': { 'background-position': '0% 50%' },
                    '50%':      { 'background-position': '100% 50%' },
                },
            },

            backgroundSize: {
                '300%': '300% 300%',
            },

            boxShadow: {
                'soft':  '0 4px 20px -2px rgba(0, 0, 0, 0.08)',
                'glow':  '0 0 30px rgba(37, 99, 235, 0.3)',
                'inner-glow': 'inset 0 0 20px rgba(255, 255, 255, 0.1)',
            },

            borderRadius: {
                '4xl': '2rem',
            },

            transitionDuration: {
                '400': '400ms',
                '600': '600ms',
            },
        },
    },

    plugins: [forms],
};