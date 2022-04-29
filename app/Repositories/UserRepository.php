<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository
{
    public function create(array $attributes)
    {
        $user = User::create([
            'first_name' => data_get($attributes, 'first_name'),
            'last_name' => data_get($attributes, 'last_name'),
            'email' => data_get($attributes, 'email'),
            'username' => data_get($attributes, 'username'),
            'password' => data_get($attributes, 'password'),
        ]);
    }

    public function update()
    {

    }
    public function forceDelete()
    {

    }

}