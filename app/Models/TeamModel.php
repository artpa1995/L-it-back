<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamModel extends Model
{
    use HasFactory;
// relation
    public function team_description_models (){
        return $this->hasMany(TeamDescriptionModel::class,'worker_id');
    }
}
