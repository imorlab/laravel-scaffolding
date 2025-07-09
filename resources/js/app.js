import './bootstrap';
import Alpine from 'alpinejs';
import { setupThemeToggle } from './theme';

window.Alpine = Alpine;

// Inicializar el selector de tema
document.addEventListener('DOMContentLoaded', () => {
    setupThemeToggle();
});

Alpine.start();
