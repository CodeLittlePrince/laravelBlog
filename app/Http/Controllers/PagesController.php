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
            $tag_id = \DB::table('tags')
                        ->where('name', '=', $keywords)
                        ->select('id')
                        ->first();
            $articles = Tag::find($tag_id->id)->posts()
                        ->orderBy('updated_at', 'DESC')
                        ->paginate(5);
                        // get()
                        // first()
                        // count()
                        // pluck('title')
                        // =====return: [0=>'tt1', 1=>'tt2']
                        // select('title')->get()
                        // =====return: [0=>{'title':'tt1'}, 1=>{'title':'tt2'}]
                        // ->select('title', 'desc as ds')
                        // =====return: [0=>{'title':'tt1','de':'desc1'}, 1=>{'title':'tt2','de':'desc2'}]
                        // distinct() 去重
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