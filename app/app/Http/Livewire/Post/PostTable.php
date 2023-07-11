<?php

namespace app\Http\Livewire\Post;

use App\Models\Post\Post;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class PostTable extends DataTableComponent
{
    protected $model = Post::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make('Id', 'id')
                ->sortable(),
            Column::make(__('Title'), 'title')
                ->searchable(),
            Column::make(__('Author'), 'author.name'),

            Column::make(__('Status'), 'status')
                ->format(function ($value, Post $row) {
                    return view(
                        'components.badge',
                        ['value' => $row->status->isAccepted(), 'text' => $row->status->title()]
                    );
                }),


            Column::make('Created at', 'created_at')
                ->sortable(),
        ];
    }
}
