<?php

namespace App\Livewire\Charts;

use Livewire\Component;

class RoleDistributionChart extends Component
{
    public $chartData;
    
    public function mount()
    {
        // Datos de prueba para el gráfico
        $this->chartData = [
            'labels' => ['Administrador', 'Editor', 'Usuario', 'Invitado'],
            'datasets' => [
                [
                    'data' => [15, 25, 45, 20],
                    'backgroundColor' => [
                        '#FF6384',
                        '#36A2EB',
                        '#FFCE56',
                        '#4BC0C0'
                    ]
                ]
            ]
        ];
    }

    public function render()
    {
        return view('livewire.charts.role-distribution-chart');
    }
}
