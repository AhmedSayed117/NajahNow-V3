<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class checkinout extends Model
{
    use HasFactory;

    protected $table = 'checkinout';
    protected $fillable = ['id','user_id','checkin','Currentday','CheckOut'];
    protected $hidden = ['user_id'];
    public $timestamps = false;

    public function user(){
        return $this-> belongsTo(User::class,'user_id');
    }
}
