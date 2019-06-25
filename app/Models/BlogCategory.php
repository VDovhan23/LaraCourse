<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BlogCategory extends Model
{
    use SoftDeletes;

    protected $guarded = [];


    public function posts()
    {
        return $this->hasMany(BlogPost::class);
    }

    public function parentCategory()
    {
        return $this->belongsTo(BlogCategory::class, 'parent_id', 'id');
    }


    /**
     * undocumented function summary
     *
     * Undocumented function long description
     *
     * @param Type $var Description
     * @return type
     * @throws conditon
     **/
    public function getTitleAttribute($value)
    {
        return mb_strtoupper($value); // в таккому вигляді буде  видавати в респонсі, при кожному виклику $item-.>title зверататиметься до цого аксессора
    }


    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = mb_strtolower($value); // в такому вигляді буде записувати в базу
    }

}
