<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RatingController extends Controller
{

    public function index()
    {
        $authors = DB::table('authors')->select('name', 'id')->get();

        $data = [
            'authors' => $authors,
            'rating' => "test",
        ];

        // return json_encode($data);
        return view('add-rating', $data);
    }

    public function getBooksByAuthor(Request $request)
    {
        $author = $request->query('author');
        return json_encode($author);
    }
}
