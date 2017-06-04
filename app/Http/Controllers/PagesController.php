<?php

namespace App\Http\Controllers;

use App\Post;

/**
 * Serve pages
 */
class PagesController extends Controller
{
    public function getAbout()
    {
        $age = 17;
        $hobby = 'Watching TV';
        $data = [];
        $data['age'] = $age;
        $data['hobby'] = $hobby;
        return view('pages.about')->with('data', $data)->with('pageType', 'about');
    }
    public function getContact()
    {
        $data = [];
        $data['name'] = 'Tom Jackson';
        $data['description'] = 'I am a hardworking and positive dog!';
        return view('pages.contact')->with('data', $data)->with('pageType', 'contact');
    }
    public function getIndex()
    {
        $articles = Post::paginate(5);
        foreach ($articles as $article) {
            // ======== 上面是原生，laravel其实提供了辅助方法 =========
            $article->content = str_limit($article->content, 300, '...');
            // ==============================================
        }
        return view('pages.welcome')
                ->with('pageType', 'index')
                ->with('articles', $articles);
    }
}