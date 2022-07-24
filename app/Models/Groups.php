<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Groups extends Model
{
    use HasFactory;
    protected $table = 'groups';
    protected $fillable = ['id','name','count_','created_at','updated_at'];
    protected $hidden = [];
    public $timestamps =true;

    public function user(){
        return $this-> hasMany(User::class,'user_id');
    }

}
