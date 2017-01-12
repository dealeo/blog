<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    Public function getContact() {
    	return view('pages.contact');
    }

    Public function getAbout() {
    	$first = "Jerome";
    	$last = "Mans";

    	$data = [
    	'fullname' => $first . " " . $last,
    	'email' => 'contact@dealeo.fr'
    	];
    	
    	return view('pages.about')->withData($data);
    }

    Public function getIndex() {
        // Afficher les 5 dernières tâches sur la page d'accueil
        $posts = Post::orderBy('id', 'desc')->limit(5)->get();

        // Return a view and pass in the above varaible
    	return view('pages.welcome')->withPosts($posts);
    }
}
