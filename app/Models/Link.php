<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Link extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function lifetime_job()
    {
        return DB::table('jobs')->where('id',$this->job_id);
    }

}
