<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Create a variable and store all the blog posts in it from the database
        $posts = Post::orderBy('id', 'desc')->paginate(5);

        // Return a view and pass in the above varaible
        return view('posts.index')->withPosts($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('posts.create')->withCategories($categories)->withTags($tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Valider les données (sinon rester sur la page)
        $this->validate($request, array(
            'title'         =>  'required|max:255',
            'slug'          =>  'required|alpha_dash|min:5|max:255|unique:posts,slug',
            'category_id'   =>  'required|integer',
            'body'          =>  'required'
        ));

        // Ajouter la tâche dans la table
        $post = new Post;

        $post->title        = $request->title;
        $post->slug         = $request->slug;
        $post->category_id  = $request->category_id;
        $post->body         = $request->body;

        $post->save();

        // Synchroniser les tags aves les posts
        $post->tags()->sync($request->tags, false);

        // Renseigner un message flash
        Session::flash('success', 'La tâche a été créee avec succès! ');

        // Rediriger vers une page
        return redirect()->route('posts.show', $post->id);
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
        return view('posts.show')->withPost($post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // find the post in the database and save in a variable
        $post = Post::find($id);
        $categories = Category::all();

        $cats = array();
        foreach($categories as $category) {
            $cats[$category->id] = $category->name;
        }

        $tags = Tag::all();
        $tags2 = array();
        foreach ($tags as $tag) {
            $tags2[$tag->id] = $tag->name;
        }

        // Return the view and pass in the variable
        return view('posts.edit')->withPost($post)->withCategories($cats)->withTags($tags2);
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
        // Validate the data
        $post = Post::find($id);
        
        if ($request->input('slug') == $post->slug) {
            $this->validate($request, array(
            'title'         =>  'required|max:255',
            'category_id'   =>  'required|integer',
            'body'          =>  'required'
            ));
        } else {
            $this->validate($request, array(
            'title'         =>  'required|max:255',
            'slug'          =>  'required|alpha_dash|min:5|max:255|unique:posts,slug',
            'category_id'   =>  'required|integer',
            'body'          =>  'required'
            ));
        }

        // Save the data to the DB
        $post->title = $request->input('title');
        $post->slug = $request->input('slug');
        $post->category_id = $request->input('category_id');
        $post->body = $request->input('body');

        $post->save();

        // Synchroniser les tags aves les posts s'il y a des tags de sélectionné
        if (isset($request->tags)) {
            $post->tags()->sync($request->tags);
        } else {
            $post->tags()->sync(array());
        }

        // Renseigner un message flash
        Session::flash('success', 'La tâche a été modifiée avec succès! ');

        // Redirect with flash message to posts.show
        return redirect()->route('posts.show', $post->id);
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

        // Renseigner un message flash
        Session::flash('success', 'La tâche a été supprimée avec succès! ');

        // Redirect with flash message to posts.show
        return redirect()->route('posts.index');
    }
}
