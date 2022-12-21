<?php

namespace App\Models;

use App\Services\Permission\traits\HasPermissions;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory,HasPermissions;
}
