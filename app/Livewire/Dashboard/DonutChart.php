<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class DonutChart extends Component
{
    public $series = [];
    public $labels = [];

    public function mount()
    {
        $this->loadChartData();
    }

    public function loadChartData()
    {
        // Agrupar por tipo_certificacion solo de los últimos 7 días
        $tipos = DB::table('pedidos')
            ->select('pedidos.estado_pedido as estado', DB::raw('COUNT(*) as total'))
            ->groupBy('estado_pedido')
            ->pluck('total', 'estado');


        $this->labels = $tipos->keys()->toArray();     // Ej: ["Ambiental", "Sanitaria"]
        $this->series = $tipos->values()->map(fn($v) => (int) $v)->toArray();

        // dd($this->series);
        // Ej: [12, 34]
    }

    public function render()
    {
        return view('livewire.dashboard.donut-chart');
    }
}
