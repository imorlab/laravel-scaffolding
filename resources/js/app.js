import './bootstrap';
import { setupThemeToggle } from './theme';

// Inicializar el selector de tema
document.addEventListener('DOMContentLoaded', () => {
    setupThemeToggle();
});

// Permitir que Livewire maneje la inicialización de Alpine.js
// No importamos Alpine.js aquí para evitar conflictos con Livewire
