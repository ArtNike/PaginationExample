<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use Illuminate\Support\Facades\Storage;
use DateTime;

class ArticleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $articles = Article::all();
        return view('articles',['articles' => $articles]);
    }

    public function add(Request $request){
        $image = null;
        $imageName = null;
        $text = null;
        $title = null;
        $url = null;

        //image saving
        $image = $request->image;  // your base64 encoded
        $image = str_replace('data:image/png;base64,', '', $image);
        $image = str_replace(' ', '+', $image);
        $date = new DateTime();
        $imageName = $date->getTimestamp().'.'.'png';
        Storage::disk('public')->put($imageName, base64_decode($image));

        $text = $request->text;
        $title = $request->title;
        $url = $request->url;

        //saving article
        $article = new Article;
        $article->title = $title;
        $article->content = $text;
        $article->url = $url;
        $article->image = $imageName;
        $article->published = true;
        $article->private = false;
        $article->save();
        return response()->json(['status'=>true]);
    }

    public function publish(Request $request){

    }

    public function undo(Request $request){

    }

    public function delete(Request $request){

    }
}
