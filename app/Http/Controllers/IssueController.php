<?php

namespace App\Http\Controllers;

use App\Category;
use App\Issue;
use App\Post;
use App\Tag;
use App\User;
use DateTime;
use DateTimeZone;
use Illuminate\Support\Carbon;

class IssueController extends Controller
{
    public function index()
    {

        $timezone = 'Asia/Ho_Chi_Minh';

        // $this->insert();
        // $issue = Issue::query()->latest()->first();

        $issue = Issue::query()->get();

        $createdAtCompare = Carbon::now()->setTimezone($timezone);
        dump($createdAtCompare);

        $createdAtCompare = (new DateTime(date('Y-m-d H:i:s')))->setTimezone(new DateTimeZone($timezone));
        dump($createdAtCompare);

        $data = Issue::query()
            ->where('created_at', '<=', $createdAtCompare)
            ->get();
        dump($data);

        // return response()->json($issue)
        //     ->header('content-type', 'application/json');
        return view('welcome', ['issue' => $issue]);
    }


    public function insert()
    {
        $formatDate = 'Y-m-d H:i:s';
        $birthday = DateTime::createFromFormat($formatDate, '1993-08-20 12:00:00')->format($formatDate);

        $issue = new Issue([
            'first_name' => 'trieu',
            'lastName' => 'thi huyen trang',
            'age' => 28,
            'is_male' => false,
            'options' => [
                'birthday' => $birthday,
                'job' => 'maketing',
                'childs' => 3,
                'happy' => true,
            ]
        ]);

        $issue->saveOrFail();
        return $issue;
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
            ])
            ->get();

        dump($post->toArray());
        return 'hello';
        return response()->json($post);
    }
}
