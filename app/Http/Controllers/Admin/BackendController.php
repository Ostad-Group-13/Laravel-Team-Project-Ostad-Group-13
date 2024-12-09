<?php

namespace App\Http\Controllers\admin;

use App\Models\Blog;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Support\Facades\Auth;

class BackendController extends Controller
{
   
    # Email Subscription
    public function Subscribe(Request $request){

       $subscription = DB::table('subscriptions')->latest('id')->paginate(6);
        // $categories = Category::latest('id')->paginate(10);

       return view('backend.subscribe', compact('subscription'));
    }

    # Contact List
    public function Contact()
    {

        $contacts = Contact::latest('id')->paginate(6);
        return view('backend.contact', compact('contacts'));
    
      }
      
    public function ContactDelete(Contact $contact)
    {

        $contact->delete();
        
        return view('backend.contact', compact('contacts'));
    }

    public function userlist(User $user){

      // return "User Is : ". $user;

    $userList = Blog::where('user_id', $user->id)->with('user')->get();

      // $user = Auth::User()->id;
      // $userList = Blog::where('user_id',$user)->with('category','users')->get();
    //   return $userList->users->count();
    // $list = User::where('id',$user)->with('blogs')->get(); //blogs_count
    // return $userList->count();


      return view('backend.user-list-post',compact('userList'));

    }
    function UserPost($UserPost) {

    $user = User::where('id',$UserPost)->first();
         
    $userList = Blog::where('user_id', $UserPost)->with('user')->get();

    return view('backend.user-list-post', compact('userList','user'));

      
    }
}
