<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Post;
use App\Tag;
use App\User;
use Auth;
use Session;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => 'show']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = \DB::table('posts')
                ->where('uid', '=', Auth::id())
                ->orderBy('updated_at', 'desc')
                ->paginate(20);
        foreach ($posts as $post) {
            // 当标题长度大于15，则截取
            // if (strlen($post->title) > 15) {
            //     $post->title = mb_substr($post->title, 0, 15, 'utf-8').'...';
            // }
            // 当标题长度大于30，则截取
            // if (strlen($post->desc) > 30) {
            //     $post->desc = mb_substr($post->desc, 0, 30, 'utf-8').'...';
            // }
            // ======== 上面是原生，laravel其实提供了辅助方法 =========
            $post->title = str_limit($post->title, 15, '...');
            $post->desc = str_limit($post->desc, 30, '...');
            // ==============================================
            // 格式化时间（不知道为什么created_at和updated_at不能被赋值）
            // （因为系统将created_at、updated_at、deleted_at字段格式化为了Carbon\Carbon类了, 所以还是直接交给前端来做格式化吧,用法：$post->created_at->format('Y年n月j日')）
            // $post->created_time = date('Y年n月j日', strtotime($post->created_at));
            // $post->updated_time = date('Y年n月j日', strtotime($post->updated_at));
            // $post->created_at = $post->created_at->format('Y年n月j日');
        }
        return view('post.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();
        return view('post.create')->with('tags', $tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate the data
        // if validate failed, the page would refresh
        $this->validate($request, array(
            'uid' => 'required|digits_between:1,11',
            'title' => 'required|max:50',
            'desc' => 'required|max:100',
            'tags' => 'max:5',
            'content' => 'required',
        ));
        // store in the database
        $post = new Post();
        $post->uid = $request->uid;
        $post->title = $request->title;
        $post->desc = $request->desc;
        $post->content = $request->content;
        $post->save();

        // if (isset($request->tags)) { // 这里有问题，因为如果编辑删除所有的标签，数据库并不会删除
        //     $post->tags()->sync($request->tags);
        // }
        $tags = $request->input('tags', []); // 设置默认值为数组
        $post->tags()->sync($tags);
        // test session
        Session::Flash('success', '文章发布成功');
        // redirect to another page
        return redirect()->route('post.show', $post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        $tags = Tag::all();
        $isAuthor = $post->uid == Auth::id() || Auth::id() == 1 ? true : false;
        $authorName = User::find($post->uid)->name;
        return view('post.show')
            ->with('post', $post)
            ->with('tags', $tags)
            ->with('authorName', $authorName)
            ->with('isAuthor', $isAuthor);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        // 判断该文章的id的uid是否是该用户
        if (Auth::id() == $post->uid) {
            $defaultTags = $post->tags();
            $tags = Tag::all();
            return view('post.create')
                ->with('post', $post)
                ->with('defaultTags', $defaultTags)
                ->with('tags', $tags)
                ->with('isEdit', true);
        }else {
            Session::Flash('fail', '你没有删除文章的权限');
            return redirect()->route('/');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //validate the data
        $this->validate($request, array(
            'uid' => 'required|digits_between:1,11',
            'title' => 'required|max:50',
            'desc' => 'required|max:100',
            'tags' => 'max:5',
            'content' => 'required',
        ));
        //store the date to database
        $post = Post::find($id);
        if (Auth::id() == $post->uid) {
            $post->uid = $request->uid;
            $post->title = $request->title;
            $post->desc = $request->desc;
            $post->content = $request->content;
            $post->save();

            $tags = $request->input('tags', []); // 设置默认值为数组
            $post->tags()->sync($tags);
            //set flash session
            Session::Flash('success', '文章更新成功');
            //redirect with session
        }else {
            Session::Flash('fail', '你没有删除文章的权限');
        }
        
        return redirect()->route('post.show', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        // 判断该文章的id的uid是否是该用户
        if (Auth::id() == $post->uid || Auth::id() == 1) {
            $post->delete();
            Session::Flash('success', '删除标签成功');
            return redirect()->route('post.index');
        }else {
            Session::Flash('fail', '你没有删除文章的权限');
            return redirect()->route('post.index');
        }
    }
}
