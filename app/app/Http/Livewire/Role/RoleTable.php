<?php

namespace app\Http\Livewire\Role;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Columns\ButtonGroupColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\LinkColumn;
use Spatie\Permission\Models\Role;

class RoleTable extends DataTableComponent
{
    protected $model = Role::class;

    public ?Role $role = null;

    public function configure(): void
    {
        //TODO Список ролей, редактирование роли, внутри есть список разрешений

        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make('id', 'id')->sortable(),
            Column::make('Name', 'name')->searchable(),
            Column::make('Guard', 'guard_name'),

            ButtonGroupColumn::make('Actions')
                ->attributes(function ($row) {
                    return [
                        'class' => 'space-x-2',
                    ];
                })
                ->buttons([
                    LinkColumn::make('Edit')
                        ->title(fn($row) => 'Edit')
                        ->location(fn($row) => route('roles.edit-add', ['role' => $row->id]))
                        ->attributes(function ($row) {
                            return [
                                'target' => '_blank',
                                'class' => 'underline text-blue-500 hover:no-underline',
                            ];
                        }),
                ]),

        ];
    }
}
