<?php

namespace App\Http\Controllers;

use App\Post;
use App\Tag;
use Illuminate\Http\Request;
/**
 * Serve pages
 */
class PagesController extends Controller
{
    public function getAbout()
    {
        return view('pages.about')->with('pageType', 'about');
    }
    public function getIndex(Request $request)
    {
        $keywords = $request->keywords;
        if (isset($keywords)) {
            $articles = Post::where('title', 'LIKE', '%' . $keywords . '%')
                        ->orderBy('updated_at', 'DESC')->paginate(5);
        }else {
            $articles = Post::orderBy('updated_at', 'DESC')->paginate(5);
        }
        foreach ($articles as $article) {
            // ======== 上面是原生，laravel其实提供了辅助方法 =========
            $article->content = str_limit($article->content, 300, '...');
            // ==============================================
        }
        $tags = Tag::all();

        return view('pages.welcome')
                ->with('pageType', 'index')
                ->with('articles', $articles)
                ->with('tags', $tags);
    }
}