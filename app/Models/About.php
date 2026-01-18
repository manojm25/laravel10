<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;

    protected $guarded = [];

    // $table->string('title')->nullable();
    //         $table->string('short_title')->nullable();
    //         $table->text('short_description')->nullable();
    //         $table->text('long_description')->nullable();
    //         $table->string('about_image')->nullable();
}
