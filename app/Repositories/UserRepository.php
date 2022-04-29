<?php

namespace App\Repositories;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserRepository
{
    public function create(array $attributes)
    {
        
        return DB::transaction(function () use ($attributes) {
            $permission = [];
            
            $user = User::create([
                'employee_id' => data_get($attributes, 'employee_id'),
                'first_name' => data_get($attributes, 'first_name'),
                'last_name' => data_get($attributes, 'last_name'),
                'phone' => data_get($attributes, 'mobile_no'),
                'position' => data_get($attributes, 'position'),
                'email' => data_get($attributes, 'email'),
                'username' => data_get($attributes, 'username'),
                'password' => Hash::make(data_get($attributes, 'password')),
            ]);

            if ($role_id = data_get($attributes, 'role')) {
                $role = Role::find($role_id);
        
                $user->roles()->attach($role);
            }

            if (count($attributes['permission'])) {
                foreach($attributes['permission'] as $key => $value) {
                    $permission[$key] = [
                        'user_id' => $user->id,
                        'role_id' => $key,
                        'read' => '0',
                        'write' => '0',
                        'delete' => '0',
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ];

                    foreach($value as $perm) {
        
                        if ($perm == 'read') {
                            $permission[$key]['read'] = '1';
                        }
        
                        if ($perm == 'write') {
                            $permission[$key]['write'] = '1';
                        }
        
                        if ($perm == 'delete') {
                            $permission[$key]['delete'] = '1';
                        }
        
                    }

                }
                Permission::insert($permission);
            }

            return $user;
        });
    }

    public function update(array $attributes, User $user)
    {
        return DB::transaction(function () use ($attributes, $user) {
            $user->employee_id = data_get($attributes, 'employee_id');
            $user->first_name = data_get($attributes, 'first_name');
            $user->last_name = data_get($attributes, 'last_name');
            $user->phone = data_get($attributes, 'mobile_no');
            $user->position = data_get($attributes, 'position');
            $user->email = data_get($attributes, 'email');
            $user->username = data_get($attributes, 'username');
    
            $password = data_get($attributes, 'password');
            if ($password && !empty($password)) {
                $user->password = Hash::make($password);
            }
    
            $role_id = data_get($attributes, 'role');
    
            $user->save();
    
            $user->roles()->sync([$role_id]);

            return response()->json(['status' => true, 'user' => $user, 'message' => 'user updated successfully']);
        });
    }

    public function forceDelete($attributes)
    {
        $user = User::find($attributes);

        if ($user) {
            $user->delete();
            return response()->json(['status' => true, 'message' => 'user deleted successfully']);
        }
        return response()->json(['status' => false, 'message' => 'unable to delete user']);
    }

}