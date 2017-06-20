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
        $tag = $request->tag;
        $keywords = $request->keywords;
        $articles = null;
        if (isset($keywords) && !isset($tag)) { // GET如果有关键字，但没有标签
            $articles = Post::where('title', 'LIKE', '%' . $keywords . '%')
                        ->orderBy('updated_at', 'DESC')->paginate(10);
        }else if (!isset($keywords) && isset($tag)) { // GET如果有标签，但没有关键字
            $tag_id = \DB::table('tags')
                        ->where('name', '=', $tag)
                        ->select('id')
                        ->first();
            $articles = Tag::find($tag_id->id)->posts()
                        ->orderBy('updated_at', 'DESC')
                        ->paginate(10);
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
        }else if(isset($keywords) && isset($tag)){ // GET如果有关键字，有标签
            $tag_id = \DB::table('tags')
                        ->where('name', '=', $tag)
                        ->select('id')
                        ->first();
            $articles = Tag::find($tag_id->id)->posts()
                        ->where('title', 'LIKE', '%' . $keywords . '%')
                        ->orderBy('updated_at', 'DESC')
                        ->paginate(10);
        }else {
            $articles = Post::orderBy('updated_at', 'DESC')->paginate(10);
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