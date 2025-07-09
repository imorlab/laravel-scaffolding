// Función para alternar entre modo claro y oscuro
export function setupThemeToggle() {
    // Verificar si el usuario ya tiene una preferencia guardada
    const theme = localStorage.getItem('theme') || 'light';
    
    // Aplicar el tema al cargar la página
    if (theme === 'dark' || (!theme && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
        document.documentElement.classList.add('dark');
    } else {
        document.documentElement.classList.remove('dark');
    }
    
    // Función para cambiar el tema
    window.toggleTheme = function() {
        const isDark = document.documentElement.classList.contains('dark');
        
        if (isDark) {
            document.documentElement.classList.remove('dark');
            localStorage.setItem('theme', 'light');
        } else {
            document.documentElement.classList.add('dark');
            localStorage.setItem('theme', 'dark');
        }
    };
}
