<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ent_Per_Relation_Type extends Model
{
    protected $primaryKey = 'ent_per_relation_type';
    protected $table = 'ent_per_relation_type';

    protected $fillable = [
        'type_name'
    ];
}
