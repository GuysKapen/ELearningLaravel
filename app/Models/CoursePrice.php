<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed $price
 */
class CoursePrice extends Model
{
    use HasFactory;

    protected $attributes = array(
        'price' => '0'
    );

    public function stripePrice() {
        return $this->price * 100;
    }
}
