<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\CreateTagRequest;

use App\Tag;

class TagController extends Controller
{
    function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $tags = Tag::where('name', 'like', '%'.$request->tag.'%')
                ->orderBy('created_at', 'desc')->paginate(20);
        return view('admin.tag')->with('tags', $tags);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateTagRequest $request)
    {
        $tag = new Tag();
        $tag->name = $request->name;
        $tag->save();
        $response = array(
            'status' => 'success',
            'msg' => '标签创建成功啦啦啦～',
        );
        return $response;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateTagRequest $request, $id)
    {
        $tag = Tag::find($id);
        $tag->name = $request->name;
        $tag->save();
        $response = array(
            'status' => 'success',
            'msg' => '标签更新成功啦啦啦～',
        );
        return $response;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tag = Tag::find($id);
        $tag->posts()->detach(); // 删除有外键的必须处理
        $tag->delete();
        $response = [
            'status' => 'success',
            'msg' => '删除成功'
        ];
        return $response;
    }
}
