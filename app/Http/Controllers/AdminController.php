<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use App\Tag;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.index');
    }
    public function article(Request $request)
    {
        $tag = $request->tag;
        $keywords = $request->keywords;
        $articles = null;
        if (isset($keywords) && !isset($tag)) { // GET如果有关键字，但没有标签
            $articles = Post::where('title', 'LIKE', '%' . $keywords . '%')
                        ->orderBy('updated_at', 'DESC')->paginate(30);
        }else if (!isset($keywords) && isset($tag)) { // GET如果有标签，但没有关键字
            $tag_id = \DB::table('tags')
                        ->where('name', '=', $tag)
                        ->select('id')
                        ->first();
            $articles = Tag::find($tag_id->id)->posts()
                        ->orderBy('updated_at', 'DESC')
                        ->paginate(30);
        }else if(isset($keywords) && isset($tag)){ // GET如果有关键字，有标签
            $tag_id = \DB::table('tags')
                        ->where('name', '=', $tag)
                        ->select('id')
                        ->first();
            $articles = Tag::find($tag_id->id)->posts()
                        ->where('title', 'LIKE', '%' . $keywords . '%')
                        ->orderBy('updated_at', 'DESC')
                        ->paginate(30);
        }else {
            $articles = Post::orderBy('updated_at', 'DESC')->paginate(30);
        }
        foreach ($articles as $article) {
            $article->title = str_limit($article->content, 20, '...');
            $article->desc = str_limit($article->content, 20, '...');
        }
        $tags = Tag::all();

        return view('admin.article')
                ->with('articles', $articles);
    }
}