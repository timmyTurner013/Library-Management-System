<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\BookMeta;
use App\Models\User;

class BookMetaController extends Controller
{
    public function store($book_name, $user_name) {
        $user = User::where('name', str_replace("-", " ", $user_name))->firstOrFail();
        $book = Book::where('name', str_replace("-", " ", $book_name))->firstOrFail();
        if($book->available !== 0) {
            return [
                'message' => 'Not available'
            ];
        } elseif($user->number_of_books_issued > 5) {
            return [
                'message' => 'Cannot issue anymore'
            ];
        } else {
            $book->update([
                'available' => $book->available - 1,
            ]);
            $user->update([
                'number_of_books_issued' => $book->number_of_books_issued + 1,
            ]);
        }

        return BookMeta::create([
            'book_id' => $book->id,
            'user_id' => $user->id,
        ]);
    }

    public function destroy($book_name, $user_name) {
        $user = User::where('name', str_replace("-", " ", $user_name))->firstOrFail();
        $book = Book::where('name', str_replace("-", " ", $book_name))->firstOrFail();
        $book->update([
            'available' => $book->available + 1,
        ]);
        $user->update([
            'number_of_books_issued' => $book->number_of_books_issued - 1,
        ]);

        return BookMeta::where([
            'book_id' => $book->id,
            'user_id' => $user->id,
        ])->delete();
    }
}
