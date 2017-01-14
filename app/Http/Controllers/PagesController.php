<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class PagesController extends Controller
{

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

    Public function getContact() {
        return view('pages.contact');
    }

    Public function postContact(Request $request) {
        $this->validate($request, [
            'email'     =>  'required|email',
            'subject'   =>  'min:3',
            'message'   =>  'min:10'
        ]);

        $data = array(
            'email' => $request->email,
            'subject' => $request->subject,
            'bodyMessage' => $request->message
        );

        Mail::send('emails.contact', $data, function($message) use ($data) {
            $message->from($data['email']);
            $message->to('contact@dealeo.fr');
            $message->subject($data['subject']);
        });

        Session::flash('success',"L'email a été envoyé!");

        return redirect('/');
    }
}
