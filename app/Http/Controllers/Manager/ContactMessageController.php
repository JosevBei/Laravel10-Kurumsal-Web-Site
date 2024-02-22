<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactMessage;

class ContactMessageController extends Controller
{
    public function index(){
        $messages = ContactMessage::orderBy('created_at','desc')->get();
        return view('admin.contact.index',compact('messages'));
    }
}
