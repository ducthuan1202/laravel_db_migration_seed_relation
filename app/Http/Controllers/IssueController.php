<?php

namespace App\Http\Controllers;

use App\Http\Requests\TestValidateRequest;
use App\Issue;
use App\Post;
use DateTime;
use DateTimeZone;
use Illuminate\Support\Carbon;

class IssueController extends Controller
{
    public function index()
    {

        $timezone = 'Asia/Ho_Chi_Minh';

        $createdAtCompare = Carbon::now()->setTimezone($timezone);

        $createdAtCompare = (new DateTime(date('Y-m-d H:i:s')))->setTimezone(new DateTimeZone($timezone));

        $issue = Issue::query()->where('created_at', '<=', $createdAtCompare)->get();

        return view('welcome', ['issue' => $issue]);
    }

    public function db()
    {

        # SELECT * FROM `posts` WHERE `id` IN (11, 55, 88)
        $post = Post::whereIn('id', [11, 55, 88])
            ->with([

                # SELECT `id`, `name` FROM `categories` WHERE `categories`.`id` IN (2, 6, 9)
                'category' => function ($query) {
                    $query->select(['id', 'name']);
                },

                # SELECT `id`, `name`, `email` FROM `users` 
                # WHERE `users`.`email` IN ('destany.zboncak@example.org', 'janelle95@example.net', 'sherman33@example.org')
                'user' => function ($query) {
                    $query->select(['id', 'name', 'email']);
                },

                # SELECT `tags`.`id`, `tags`.`name`, `posts_tags`.`post_id` AS `pivot_post_id`, `posts_tags`.`tag_id` AS `pivot_tag_id` 
                # FROM `tags` INNER JOIN `posts_tags` ON `tags`.`id` = `posts_tags`.`tag_id` 
                # WHERE `posts_tags`.`post_id` in (11, 55, 88)
                'tags' => function ($query) {
                    // với quan hệ n-n, có sử dụng pivot key
                    // thì cần chỉ rõ ràng field select ở table nào
                    $query->select(['tags.id', 'tags.name']);
                }
            ])->get();

        return response()->json($post);
    }

    public function validateData(TestValidateRequest $request){
        $attr = $request->validated();
        dd($attr);
        return response()->json($attr);
    }
}
