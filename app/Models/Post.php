<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //table 

    protected $table="posts";


     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'body', 'user_id','creation_date'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public $timestamps=false;

    protected $primaryKey = 'id';

    //Relationship for get Comments

    public function getComment()
    {

        return $this->hasMany('App\Models\Comment','post_id');
    }
     //Relationship for get Users

    public function getUser()
    {

        return $this->belongsTo('App\Models\User', 'user_id');
    }
}
