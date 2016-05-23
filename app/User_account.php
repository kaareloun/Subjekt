<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User_account extends Model
{
    protected $primaryKey = 'user_account';
    protected $table = 'user_account';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'subject_type_fk', 'subject_fk', 'username', 'passw', 'status', 'valid_from', 'valid_to', 'created_by', 'created', 'password_never_expires'
    ];
}
