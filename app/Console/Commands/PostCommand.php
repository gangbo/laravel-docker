<?php
/**
 * Created by daigangbo.
 * User: daigangbo <gangbo.dai@ifchange.com>
 * Date: 2020/6/9
 * Time: 20:21
 */

namespace App\Console\Commands;


use App\Models\Post;
use Illuminate\Console\Command;

class PostCommand extends Command
{

    protected $signature = 'post';

    protected $description = 'post';

    public function handle()
    {

        $this->info('insert post');
        Post::create([
            'title' => 'ttt',
            'content' => 'content....'
        ]);

    }

}