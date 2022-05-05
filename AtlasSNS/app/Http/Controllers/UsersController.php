<?php
use Illuminate\Foundation\Auth\AuthenticatesUsers;
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

use App\User;
use App\Post;
use App\Follow;


class UsersController extends Controller
{
    //
    public function index(User $user)
    {
        // $all_users = $user->getAllUsers(auth()->user()->id);
        $id = Auth::user()->id;
        $all_users = User::where('id','<>',$id)->get();
        // $users = User::where('id','!=',$id)->get();
        return view('users.search', ['all_users'  => $all_users]);
    }

    public function follow(User $user) {
        $user->isFollowing()->attach(Auth::id());

        return redirect('/search');
    }
    // フォロー解除
    public function unfollow(User $user)
    {
        $user->isFollowed()->detach(Auth::id());

        // return back();
         return redirect('/search');
    }
    public function search(Request $request)
    {
        $id = Auth::user()->id;
        $word = $request->get('word');
    if ($word !== null) {
        $escape_word = addcslashes($word, '\\_%');
        $all_users = User::where('username', 'like', '%' . $escape_word . '%')
        ->where('id','<>',$id)
        ->get();
    } else {
        $all_users = User::where('id','<>',$id)->get();
    }
    return view(
        'users.search',
        [
            'all_users' => $all_users,
            'word' => $word
        ]
    );
    }
    public function profile(){
            $user = Auth::user();
            return view(
        'users.profile',
        [
            'user' => $user
        ]
    );
    }

}
