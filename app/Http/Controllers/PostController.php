<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Post;
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
        $posts = Post::orderBy('updated_at', 'desc')->paginate(5);
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
        return view('post.create');
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
            'content' => 'required',
        ));
        // store in the database
        $post = new Post();
        $post->uid = $request->uid;
        $post->title = $request->title;
        $post->desc = $request->desc;
        $post->content = $request->content;
        $post->save();
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
        $isAuthor = $post->uid == Auth::id() ? true : false;
        return view('post.show')->with('post', $post)->with('isAuthor', $isAuthor);
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
        return view('post.create')
            ->with('post', $post)
            ->with('isEdit', true);
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
            'content' => 'required',
        ));
        //store the date to database
        $post = Post::find($id);
        $post->uid = $request->uid;
        $post->title = $request->title;
        $post->desc = $request->desc;
        $post->content = $request->content;
        $post->save();
        //set flash session
        Session::Flash('success', '文章更新成功');
        //redirect with session
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
        $post->delete();
        Session::Flash('success', '删除成功');
        return redirect()->route('post.index');
    }
}
