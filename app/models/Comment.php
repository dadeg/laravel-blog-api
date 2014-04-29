<?php


class Comment extends \Eloquent {
	protected $fillable = ['content', 'post_id', 'author_name'];
    
    // validation rules
    public static $rules = ['post_id' => 'required', 'content' => 'required', 'author_name' => 'required'];

    // relationship to posts table
    public function post()
    {
        $this->belongsTo('Post');
    }
}
