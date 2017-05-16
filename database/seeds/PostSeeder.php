<?php

use Illuminate\Database\Seeder;
use App\Post;
use Carbon\Carbon;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->delete();

        for ($i = 0; $i < 10; $i++) {
        	Post::create([
        		'uid' => 1,
        		'title' => 'Title'.$i,
        		'desc' => 'Description'.$i,
        		'content' => 'This is content '.$i
        		// 不需要设置created_at，框架会自动检测表中是否有该字段，如果有则自动添加
        	]);
        }
    }
}
