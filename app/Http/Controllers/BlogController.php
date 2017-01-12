<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
	public function getIndex() {
    	// Fetch from the DB based on slug
    	$posts = Post::paginate(10);

    	// return the view and pass in the post object
    	return view('blog.index')->withPosts($posts);
    }

    public function getSingle($slug) {
    	// Fetch from the DB based on slug
    	$post = Post::where('slug', '=', $slug)->first();

    	// return the view and pass in the post object
    	return view('blog.single')->withPost($post);
    }
}
