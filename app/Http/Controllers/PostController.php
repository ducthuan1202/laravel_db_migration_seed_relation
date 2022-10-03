<?php

namespace App\Http\Controllers;

use App\Post;
use Jenssegers\Agent\Agent;

class PostController extends Controller
{
    public function index()
    {

        $agent = new Agent();

        $browser = $agent->browser();
        $platform = $agent->platform();

        $detect = [
            'ip' => request()->ip(),            
            'userAgent' => request()->userAgent(),

            'isDesktop' => $agent->isDesktop(),
            'isMobile' => $agent->isMobile(),
            'isPhone' => $agent->isPhone(),
            'isRobot' => $agent->isRobot(),            

            'device' => $agent->device(),

            'browser' => $agent->browser(),
            'browserVersion' => $agent->version($browser),

            'platform' => $agent->platform(),
            'platformVersion' => $agent->version($platform),
        ];

        dump($detect);

        $posts = Post::query()->whereHas('tags', function ($query) {
            $query->where('name', 'like', '%omnis%');
        })->get();

        dump($posts);
        // SELECT * FROM `posts` 
        // WHERE EXISTS (
        //      SELECT * FROM `tags` INNER JOIN `posts_tags` ON `tags`.`id` = `posts_tags`.`tag_id` 
        //      WHERE `posts`.`id` = `posts_tags`.`post_id` AND `name` LIKE '%omnis%'
        //  )

        return 'ok';
    }
}
