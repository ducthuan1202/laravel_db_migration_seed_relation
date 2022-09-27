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

        // $user = User::where('id', 1)
        //     ->with(['categories', 'posts'])
        //     ->first();
        //    dump($user);

        // $category = Category::where('id', 1)
        //     ->with(['user'])
        //     ->first();
        // dump($category);

        /**
         * action cho quan he n-n
         * attach: them
         * detach: xoa
         * sync: dong bo, neu chua co thi them
         * toggle: co thi xoa, chua co thi them
         */

        $post = Post::where('id', 1)
            ->with(['category', 'user'])
            ->first();
        $tags = Tag::take(3)->get();
        $post->tags()->sync($tags);

        $tag = Tag::find(5);
        $tag->posts()->sync($post);

        dump($tag);
    }
}
