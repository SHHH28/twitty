<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class FeedController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $user = auth()->user();

        $folliwingID = $user->followings()->pluck('user_id');
        
        $ideas = Idea::whereIn('user_id', $folliwingID)->latest();

        if(request()->has('search')){
            $ideas = $ideas->where('content','like', '%' . request()->get('search',''). '%');
        }

        return view("feeds",[
            'ideas' => $ideas->paginate(5)
        ]);
    }
}
