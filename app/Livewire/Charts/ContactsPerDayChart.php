<?php

namespace App\Livewire\Charts;

use Livewire\Component;

class ContactsPerDayChart extends Component
{
    public $chartData;
    
    public function mount()
    {
        // Datos de prueba para el gráfico de contactos por día
        $this->chartData = [
            'labels' => ['Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado', 'Domingo'],
            'datasets' => [
                [
                    'label' => 'Contactos',
                    'data' => [12, 19, 8, 15, 22, 14, 10],
                    'borderColor' => '#36A2EB',
                    'backgroundColor' => 'rgba(54, 162, 235, 0.2)',
                    'tension' => 0.4
                ]
            ]
        ];
    }

    public function render()
    {
        return view('livewire.charts.contacts-per-day-chart');
    }
}
