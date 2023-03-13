<?php

namespace App\Http\Controllers;

use App\Models\BookRating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RatingController extends Controller
{

    public function index()
    {
        $authors = DB::table('authors')->select('name', 'id')->get();

        $data = [
            'authors' => $authors,
        ];
        return view('add-rating', $data);
    }
    public function save(Request $request)
    {
        $postData = $request->all('book_id', 'rating');
        BookRating::create($postData);
        return redirect('/');
    }
}
