<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookMeta extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function book() {
        return $this->belongsTo(Book::class);
    }

    public function user() {
        return $this->belongsToMany(User::class);
    }
}
