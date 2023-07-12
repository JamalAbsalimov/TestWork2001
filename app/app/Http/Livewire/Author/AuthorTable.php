<?php

namespace app\Http\Livewire\Author;

use App\Models\Author;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class AuthorTable extends DataTableComponent
{
    protected $model = User::class;

    public function builder(): Builder
    {
        return User::role('author','api');
    }

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make('Id', 'id')
                ->sortable(),
            Column::make(__('Name'), 'name')
                ->searchable(),
            Column::make(__('email'), 'email'),

            Column::make(__('email verified at'), 'email_verified_at'),

            Column::make(__('Created at'), 'created_at')
                ->sortable(),
        ];
    }
}
