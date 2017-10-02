<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Carbon\Carbon;

class PostsController extends Controller
{
    public function index(){
    	$posts = Post::orderBy('created_at','desc')->get();
        /*$posts = Post::latest();

        if($month = request('month')){
            $posts->whereMonth('created_at',Carbon::parse($month));
        }
        
        if($year = request('year')){
            $posts->whereYear('created_at',$year);
        }
        

        $posts = $posts->get();*/



        $archives = Post::selectRaw('year(created_at) year,monthname(created_at) month,count(*) Publish')->groupBy('year','month')
            ->get()
            ->toArray();
        

    	return view('posts.index',compact('posts','archives'));
    }

    public function show(Post $post){
    	return view('posts.show',compact('post'));
    }

    public function create(){
    	return view('posts.create');
    }

    public function store(){
    	Post::create(request(['title','body']));

    	return redirect('/');
    }

    public function edit(Post $post){
    	return view('posts.edit',compact('post'));
    }

    public function update(Post $post){
    	$post->title = request('title');
    	$post->body  = request('body');
    	$post->save();

    	return redirect ('/');
    }

    public function delete(Post $post){
    	$post->delete();
    	return redirect ('/');
    }
}
