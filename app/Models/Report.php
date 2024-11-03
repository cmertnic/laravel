<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Report extends Model
{
    use HasFactory,softDeletes;
    use SoftDeletes;
    public function user()
{
    return $this->belongsTo(User::class);
}

public function setUser(User $user)
{
    $this->user_id = $user->id;
    return $this;
}

public function getUser()
{
    return User::find($this->user_id);
}
protected $fillable = [
    'number',
    'description',
    'status_id',
    'user_id',
    'created_at',
    'updated_at',
    'deleted_at',
];
}
