<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class AuthorController extends Controller
{

    public function index()
    {
        $authors = DB::table('authors')->select(DB::raw('authors.name, COUNT(*) AS votes'))->leftJoin('books', 'authors.id', '=', 'books.author_id')->leftJoin('book_ratings', 'books.id', '=', 'book_ratings.book_id')->groupBy('authors.name')->having('votes', '>=', 5)->orderBy('votes', 'desc')->limit(10)->get();

        $data = [
            'authors' => $authors,
        ];

        return view('author', $data);
    }
}
