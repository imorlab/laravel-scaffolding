<div class="h-64 w-full">
    <canvas id="roleDistributionChart" wire:ignore></canvas>

    <script>
        document.addEventListener('livewire:initialized', () => {
            const ctx = document.getElementById('roleDistributionChart').getContext('2d');
            const chartData = @js($chartData);
            
            const chart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: chartData.labels,
                    datasets: [{
                        data: chartData.datasets[0].data,
                        backgroundColor: chartData.datasets[0].backgroundColor,
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'bottom',
                            labels: {
                                color: document.documentElement.classList.contains('dark') ? '#fff' : '#333'
                            }
                        }
                    }
                }
            });

            // Actualizar colores cuando cambia el tema
            window.addEventListener('theme-changed', () => {
                chart.options.plugins.legend.labels.color = document.documentElement.classList.contains('dark') ? '#fff' : '#333';
                chart.update();
            });
        });
    </script>
</div>
