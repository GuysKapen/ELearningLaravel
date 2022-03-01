<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property string $title
 * @property string $about
 * @property string $cover
 * @property integer $user_id
 */
class AuthorDetail extends Model
{
    use HasFactory;
}
