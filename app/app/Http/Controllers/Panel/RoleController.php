<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        return view('roles.index');
    }

    public function editAdd(Role $role = null)
    {
        return view('roles.edit-add', ['role' => $role]);
    }

    /**
     * @param Role $role
     * @return RedirectResponse
     */
    public function delete(Role $role): RedirectResponse
    {
        $role->delete();

        return to_route('roles');
    }
}
