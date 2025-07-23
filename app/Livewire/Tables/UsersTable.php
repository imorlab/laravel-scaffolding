<?php

namespace App\Livewire\Tables;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Filters\SelectFilter;
use Rappasoft\LaravelLivewireTables\Views\Columns\BooleanColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\LinkColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\ButtonGroupColumn;
use Illuminate\Support\Carbon;
use Livewire\Attributes\Lazy;

#[Lazy]
class UsersTable extends DataTableComponent
{
    protected $model = User::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setTableName('usuarios');
        $this->setSearchDebounce(500);
        $this->setSearchStatus(true);
        $this->setPerPageAccepted([10, 25, 50, 100]);
        $this->setPerPage(10);
        $this->setColumnSelectStatus(true);
        $this->setFilterLayoutSlideDown();
    }

    public function columns(): array
    {
        return [
            Column::make('ID', 'id')
                ->sortable()
                ->searchable(),
                
            Column::make('Nombre', 'name')
                ->sortable()
                ->searchable(),
                
            Column::make('Email', 'email')
                ->sortable()
                ->searchable(),
                
            Column::make('Verificado', 'email_verified_at')
                ->format(function($value) {
                    return $value ? Carbon::parse($value)->format('d/m/Y H:i') : 'No verificado';
                })
                ->sortable(),
                
            Column::make('Creado', 'created_at')
                ->format(function($value) {
                    return Carbon::parse($value)->format('d/m/Y');
                })
                ->sortable(),
                
            ButtonGroupColumn::make('Acciones')
                ->attributes(function($row) {
                    return [
                        'class' => 'space-x-2',
                    ];
                })
                ->buttons([
                    LinkColumn::make('Ver')
                        ->title(fn($row) => 'Ver')
                        ->location(fn($row) => '#') 
                        ->attributes(function($row) {
                            return [
                                'class' => 'btn btn-sm btn-info text-white',
                                'wire:click' => '$dispatch(\'showUserSidebar\', { action: \'view\', userId: ' . $row->id . ' })',
                                'href' => '#',
                            ];
                        }),
                    LinkColumn::make('Editar')
                        ->title(fn($row) => 'Editar')
                        ->location(fn($row) => '#')
                        ->attributes(function($row) {
                            return [
                                'class' => 'btn btn-sm btn-warning text-white',
                                'wire:click' => '$dispatch(\'showUserSidebar\', { action: \'edit\', userId: ' . $row->id . ' })',
                                'href' => '#',
                            ];
                        }),
                    LinkColumn::make('Eliminar')
                        ->title(fn($row) => 'Eliminar')
                        ->location(fn($row) => '#')
                        ->attributes(function($row) {
                            return [
                                'class' => 'btn btn-sm btn-danger text-white',
                                'wire:click' => '$dispatch(\'showUserSidebar\', { action: \'delete\', userId: ' . $row->id . ' })',
                                'href' => '#',
                            ];
                        }),
                ]),
        ];
    }

    public function filters(): array
    {
        return [
            SelectFilter::make('Verificado')
                ->options([
                    '' => 'Todos',
                    '1' => 'Verificado',
                    '0' => 'No verificado',
                ])
                ->filter(function(Builder $builder, string $value) {
                    if ($value === '1') {
                        $builder->whereNotNull('email_verified_at');
                    } elseif ($value === '0') {
                        $builder->whereNull('email_verified_at');
                    }
                }),
        ];
    }
}
