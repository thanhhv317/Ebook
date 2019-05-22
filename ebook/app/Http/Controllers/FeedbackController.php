<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\feedback;

class FeedbackController extends Controller
{
    public function getEdit($id){
    	$book_id = $id;
    	$user_id = $_GET['user_id'];
    	$content = $_GET['content'];

    	$feedback = new feedback;
    	$feedback->user_id = $user_id;
    	$feedback->book_id = $book_id;
    	$feedback->content = $content;
    	$feedback->save();

    	return 1;
    }
}
