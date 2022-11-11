<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\User;

class UserController extends Controller
{
    public function index() {
        return User::all();
    }

    public function store() {
        return User::create([
            'name' => request('name'),
            'email'=> request('email'),
        ]);
    }
    
    public function update(User $user) {
        $success = $user->update([
            'name' => request('name'),
            'email' => request('email'),
        ]);
    
        return [
            'success' => $success
        ];
    }
    
    public function remove(User $user) {
        $success = $user->delete();
    
        return [
            'success' => $success
        ];
    }
}
