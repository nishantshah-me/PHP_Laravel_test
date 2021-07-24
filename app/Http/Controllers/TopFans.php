<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Fan;
use App\Models\Creator;
use Illuminate\Support\Facades\Cache;

class TopFans extends Controller
{
    public function old(Creator $creator)
    {
        // select count(*) as view_count, fan_id from views 
        // inner join posts on views.post_id=posts.id where posts.creator_id=1 group by fan_id;
        $viewCounts = DB::table('views')
            ->select('fan_id', DB::raw('count(*) as view_count'))
            ->join('posts', function($join) use ($creator) {
                $join->on('posts.id', '=', 'views.post_id')
                     ->where('posts.creator_id', '=', $creator->id);
            })
            ->groupBy('fan_id');
        
        $fans = DB::table('fans')
            ->joinSub($viewCounts, 'view_counts', function ($join) {
                $join->on('fans.id', '=', 'view_counts.fan_id');
            })
            ->orderByDesc('view_count')
            ->get();

        return view('top_fans', [
            'fans' => $fans,
            'creator' => $creator
        ]);
    }

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
    public function getTopFansByRank(Creator $creator)
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
