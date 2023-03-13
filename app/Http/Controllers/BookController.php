<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{

    public function index(Request $request)
    {

        $limit = $request->query('limit') != null ? $request->query('limit') : 10;
        $search = $request->query('search') != null ? $request->query('search') : '';

        if ($search == '') {
            $booksWithRating = DB::table('book_ratings')->select(DB::raw('COUNT(id) as votes, AVG(rating) as rating, book_id'))->orderBy('rating', 'desc')->orderBy('votes', 'desc')->groupBy('book_id')->paginate($limit);

            foreach ($booksWithRating as $item) {
                $book = DB::table('books')
                    ->leftJoin('authors', 'books.author_id', '=', 'authors.id')
                    ->leftJoin('book_categories', 'books.category_id', '=', 'book_categories.id')
                    ->select('books.id as id', 'books.title', 'authors.name as author', 'category')
                    ->where('books.id', $item->book_id)
                    ->get();

                $item->title =  $book->pluck('title')[0];
                $item->category = $book->pluck('category')[0];
                $item->author = $book->pluck('author')[0];
            }
        } else {
            $booksWithRating = DB::table('books')
                ->leftJoin('authors', 'books.author_id', '=', 'authors.id')
                ->leftJoin('book_categories', 'books.category_id', '=', 'book_categories.id')
                ->select('books.id as id', 'books.title', 'authors.name as author', 'category')
                ->orderBy('books.id')
                ->where('books.title', 'LIKE', '%' . $search . '%')
                ->orWhere('authors.name', 'LIKE', '%' . $search . '%')
                ->paginate($limit);

            foreach ($booksWithRating as $book) {
                $rating = DB::table('book_ratings')
                    ->select(DB::raw('COUNT(id) as votes, AVG(rating) as rating'))
                    ->where('book_id', '=', $book->id)
                    ->get();
                $book->rating = $rating->pluck('rating')[0];
                $book->votes = $rating->pluck('votes')[0];
            }
        }

        $data = [
            'books' => $booksWithRating
        ];
        return view('index', $data);
    }
}
