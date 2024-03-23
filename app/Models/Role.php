<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $table = "role";
    protected $primaryKey  = "roleID";
    protected $fillable = [
        'roleID','empID','roletypeID','nameType'];
}
