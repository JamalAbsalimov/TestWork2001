<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Spatie\Permission\Models\Role;

class InitAppCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:init-access-role';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        \DB::beginTransaction();

        try {

            /** @var User $author */
            $author = User::factory()->create();
            $author->assignRole(Role::findByName('author', 'api'));


            /** @var User $admin */
            $admin = User::factory()->create();
            $admin->assignRole(Role::findByName('admin', 'web'));

            $headers = ['ID', 'Email', 'Пароль', 'Роль'];

            $this->info('Данные демо автора');
            $this->table($headers, [[
                'id' => $author->id,
                'email' => $author->email,
                'password' => 'password',
                'role' => $author->roles->first()->name
            ]]);

            $this->line('_');

            $this->info('Данные админа панели');

            $this->table($headers, [[
                'id' => $admin->id,
                'email' => $admin->email,
                'password' => 'password',
                'role' => $admin->roles->first()->name
            ]]);

            \DB::commit();

        } catch (\Throwable $e) {
            \DB::rollBack();
            throw $e;
        }


        return self::SUCCESS;
    }
}
