<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserEmailSchedule extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'schedule_time','event'];
    protected $dates = ['schedule_time'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
