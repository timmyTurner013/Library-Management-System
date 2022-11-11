<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\User;

class BookController extends Controller
{
    public function index() {
        return Book::all();
    }

    public function search($slug) {
        return Book::where('name', str_replace("-", " ", $slug))->firstOrFail();
    }

    public function searchAuthor($slug) {
        return Book::where('author', str_replace("-", " ", $slug))->firstOrFail();
    }

    public function store() {
        return Book::create([
            'name' => request('name'),
            'author'=> request('author'),
            'number_of_copies'=> request('number_of_copies'),
            'available'=> request('available'),
        ]);
    }

    public function update(Book $book) {
        $success = $book->update([
            'name' => request('name'),
            'author' => request('author'),
            'number_of_copies' => request('number_of_copies'),
            'available' => request('available'),
        ]);
    
        return [
            'success' => $success
        ];
    }

    public function remove(Book $book) {
        $success = $book->delete();
    
        return [
            'success' => $success
        ];
    }
}
