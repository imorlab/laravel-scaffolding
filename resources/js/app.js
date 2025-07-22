import './bootstrap';
import { setupThemeToggle } from './theme';
import './chart';

// Inicializar el selector de tema
document.addEventListener('DOMContentLoaded', () => {
    setupThemeToggle();
});

// Permitir que Livewire maneje la inicialización de Alpine.js
// No importamos Alpine.js aquí para evitar conflictos con Livewire
