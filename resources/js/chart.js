// Importar Chart.js
import { Chart } from 'chart.js/auto';

// Hacer Chart disponible globalmente
window.Chart = Chart;

// Evento personalizado para cambios de tema
document.addEventListener('DOMContentLoaded', () => {
    // Crear un evento personalizado para notificar cambios de tema
    window.dispatchEvent(new CustomEvent('theme-changed'));
    
    // Observar cambios en la clase 'dark' del elemento html
    const observer = new MutationObserver((mutations) => {
        mutations.forEach((mutation) => {
            if (mutation.attributeName === 'class') {
                window.dispatchEvent(new CustomEvent('theme-changed'));
            }
        });
    });
    
    // Iniciar observación
    observer.observe(document.documentElement, { attributes: true });
});
