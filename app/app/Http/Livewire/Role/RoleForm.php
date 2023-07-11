<?php

namespace app\Http\Livewire\Role;


use Livewire\Component;
use Spatie\Permission\Models\Role;

class RoleForm extends Component
{
    public ?Role $role = null;

    public array $state = [
        'name' => '',
        'guard_name' => '',
    ];

    protected array $validationAttributes = [
        'state.name' => 'Название роли',
        'state.guard_name' => 'Guard name'

    ];

    /**
     * @return string[]
     */
    public function rules(): array
    {
        return [
            'state.name' => 'required|string|max:255|min:1|unique:roles,name',
            'state.guard_name' => 'required|string',
        ];
    }

    public function mount()
    {
        if ($this->role !== null) {
            $this->state = $this->role->toArray();
        }
    }

    public function render()
    {
        return view('livewire.roles.form');
    }

    public function save()
    {
        $data = $this->validate();

        if ($this->role !== null) {
            $this->role->update($data['state']);
        } else {
            Role::create($data['state']);
        }


        return to_route('roles');
    }
}
