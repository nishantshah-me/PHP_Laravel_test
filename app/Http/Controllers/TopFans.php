<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Fan;
use App\Models\Creator;
use Illuminate\Support\Facades\Cache;

class TopFans extends Controller
{

    /*
        SELECT
            count(*) as view_count,
            views.fan_id,
            fans.display_name
        FROM
            views
        INNER JOIN posts ON views.post_id = posts.id
        INNER JOIN fans ON views.fan_id = fans.id
        WHERE
            posts.creator_id = 1
        GROUP BY views.fan_id;
    */
    public function __invoke(Creator $creator)
    {
        $seconds = 600;
        $key = 'fans_of_'.$creator->id;
        $fans = Cache::remember($key, $seconds, function () use ($creator){
        return DB::table('views')
            ->select('views.fan_id','fans.display_name', DB::raw('count(*) as view_count'))
            ->join('posts', function($join) use ($creator) {$join->on('posts.id', '=', 'views.post_id');})
            ->join('fans', function($join) use ($creator) {$join->on('views.fan_id', '=', 'fans.id');})
            ->where('posts.creator_id', '=', $creator->id)
            ->groupBy('views.fan_id')
            ->get();
        
        });
        return view('top_fans', [
            'fans' => $fans,
            'creator' => $creator
        ]);
    }
}
