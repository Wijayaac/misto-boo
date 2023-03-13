<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
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
    public function getBook($id)
    {
        $author = Author::findOrFail($id);

        $booksByAuthor = Book::where('author_id', $id)->get();

        $data = [
            'author' => $author,
            'books' => $booksByAuthor,
            'message' => "Books data"
        ];

        return json_encode($data);
    }
}
