<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
use Symfony\Component\HttpFoundation\Response;
class PostsController extends Controller
{

    public function __construct()
    {
        
        $this->middleware('auth');
        $this->middleware('datenotcomplete');
       
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $userId= \Auth::user()->id;
        $gender=\Auth::user()->gender;
        $posts=PosT::orderBy('creation_date','DESC')->get();
        return view('posts.index',['posts'=>$posts]);
        
        //
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
    public function store(Request $request)
    {
        if ($request->ajax()) {

            $inputs = $request->all();
            $inputs['user_id']= \Auth::user()->id;
            $inputs['creation_date']= date('Y-m-d H:i:s');
            $post =new Post();
            $newPost=$post->create($inputs);
            if( $newPost){
                return view('posts.single',['post'=>$newPost]);
            }else{
                return "fail";
            }
        }
    }
     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function comment(Request $request)
    {
        if ($request->ajax()) {

            $inputs = $request->all();
            $inputs['user_id']= \Auth::user()->id;
            $inputs['creation_date']= date('Y-m-d H:i:s');
            $comment =new Comment();
            $newComment=$comment->create($inputs);
            if( $newComment){
                return view('posts.comment',['comment'=>$newComment]);
            }else{
                return "fail";
            }
        }
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
    public function edit(Request $request)
    {
        //
        if ($request->ajax()) {
            $inputs = $request->all();
            $id=$inputs['post_id'];
            $post=Post::findOrFail($id);
            return response()->json(array('title' => $post->title, 'body' => $post->title));
        
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if ($request->ajax()) {

            $inputs = $request->all();
            $inputs['user_id']= \Auth::user()->id;
            $inputs['creation_date']= date('Y-m-d H:i:s');
            $updatePost = Post::findOrFail( $inputs['post_id']);
            $updatePost->update($inputs);
            if( $updatePost){
                return view('posts.single',['post'=>$updatePost]);
            }else{
                return "fail";
            }
           

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //delete Element

        if ($request->ajax()) {
            $inputs = $request->all();
            $id=$inputs['post_id'];
            Post::destroy($id);
            return "success";
        
        }
        

    }
}
