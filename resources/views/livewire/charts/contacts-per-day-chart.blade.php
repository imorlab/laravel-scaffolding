<div class="h-64 w-full">
    <canvas id="contactsPerDayChart" wire:ignore></canvas>

    <script>
        document.addEventListener('livewire:initialized', () => {
            const ctx = document.getElementById('contactsPerDayChart').getContext('2d');
            const chartData = @js($chartData);
            
            const chart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: chartData.labels,
                    datasets: [{
                        label: chartData.datasets[0].label,
                        data: chartData.datasets[0].data,
                        borderColor: chartData.datasets[0].borderColor,
                        backgroundColor: chartData.datasets[0].backgroundColor,
                        tension: chartData.datasets[0].tension,
                        fill: true
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                color: document.documentElement.classList.contains('dark') ? '#fff' : '#333'
                            },
                            grid: {
                                color: document.documentElement.classList.contains('dark') ? 'rgba(255, 255, 255, 0.1)' : 'rgba(0, 0, 0, 0.1)'
                            }
                        },
                        x: {
                            ticks: {
                                color: document.documentElement.classList.contains('dark') ? '#fff' : '#333'
                            },
                            grid: {
                                color: document.documentElement.classList.contains('dark') ? 'rgba(255, 255, 255, 0.1)' : 'rgba(0, 0, 0, 0.1)'
                            }
                        }
                    },
                    plugins: {
                        legend: {
                            labels: {
                                color: document.documentElement.classList.contains('dark') ? '#fff' : '#333'
                            }
                        }
                    }
                }
            });

            // Actualizar colores cuando cambia el tema
            window.addEventListener('theme-changed', () => {
                const isDark = document.documentElement.classList.contains('dark');
                chart.options.scales.y.ticks.color = isDark ? '#fff' : '#333';
                chart.options.scales.x.ticks.color = isDark ? '#fff' : '#333';
                chart.options.scales.y.grid.color = isDark ? 'rgba(255, 255, 255, 0.1)' : 'rgba(0, 0, 0, 0.1)';
                chart.options.scales.x.grid.color = isDark ? 'rgba(255, 255, 255, 0.1)' : 'rgba(0, 0, 0, 0.1)';
                chart.options.plugins.legend.labels.color = isDark ? '#fff' : '#333';
                chart.update();
            });
        });
    </script>
</div>
