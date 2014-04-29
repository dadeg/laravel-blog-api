<?php


class Post extends \Eloquent {
	protected $fillable = ['title','content','author_name'];

    // validation rules
    public static $rules = ['title' => 'required', 'author_name' => 'required'];

    //relationship with comments table
    public function comments()
    {
        return $this->hasMany('Comment');
    }
}
