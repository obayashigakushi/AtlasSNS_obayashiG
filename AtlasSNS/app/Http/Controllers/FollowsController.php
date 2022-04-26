<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\Follow;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FollowsController extends Controller
{
    //
    public function followList(){
        $posts = Post::query()->whereIn('user_id', Auth::user()->notFollowing()->pluck('followed_id'))->latest()

        ->select('posts.id','users.username', 'posts.user_id','posts.post', 'posts.created_at')
        ->join('users', 'users.id', '=', 'posts.user_id')
        ->get();

        return view('follows.followList' , compact('posts'));
    }
    public function followerList(){
        $posts = Post::query()->whereIn('user_id', Auth::user()->isFollowing()->pluck('following_id'))->latest()

        ->select('posts.id','users.username', 'posts.user_id','posts.post', 'posts.created_at')
        ->join('users', 'users.id', '=', 'posts.user_id')
        ->get();

        return view('follows.followerList' , compact('posts'));
    }


    public function followCounts(){
        $followCounts = count(Follow::where('followed_id', Auth::user()->id)->get());

        return view('auth.login', compact('followCounts'));
        }
}
