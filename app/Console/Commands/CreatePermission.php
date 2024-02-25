<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class CreatePermission extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:create-permission';

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
//        $dataPermissions = config('permissions');
//
//        foreach ($dataPermissions as $key => $value) {
//            Permission::query()->updateOrCreate([
//                'name' => $key,
//                'guard_name' => 'web'
//            ]);
//        }
//
//        Permission::query()
//            ->where('guard_name', 'web')
//            ->whereNotIn('name', array_keys($dataPermissions))
//            ->delete();
//
//        $role = Role::query()->updateOrCreate(['name' => 'super-admin', 'guard_name' => 'web']);
//        $role->givePermissionTo(Permission::all());

        $dataPermissions = config('permissions');
        $mergedArray = [];
        foreach ($dataPermissions as $permissions) {
            $mergedArray = array_merge($mergedArray, $permissions);
        }

        foreach ($mergedArray as $key => $value) {
            Permission::query()->updateOrCreate([
                'name' => $key,
                'guard_name' => 'web'
            ]);
        }

        Permission::query()
            ->where('guard_name', 'web')
            ->whereNotIn('name', array_keys($mergedArray))
            ->delete();

        $role = Role::query()->updateOrCreate(['name' => 'super-admin', 'guard_name' => 'web']);
        $role->givePermissionTo(Permission::all());
    }
}
