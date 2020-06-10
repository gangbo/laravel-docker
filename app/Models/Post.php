<?php
/**
 * Created by daigangbo.
 * User: daigangbo <gangbo.dai@ifchange.com>
 * Date: 2020/6/9
 * Time: 20:15
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Post extends Model
{
    protected $connection = 'mysql';

    protected $table = 'post';

    protected $fillable = [
        'title',
        'content',
    ];

    /**
     * 获取索引名称
     *
     * @return string
     */
    public function searchableAs()
    {
        return 'posts_index';
    }

}