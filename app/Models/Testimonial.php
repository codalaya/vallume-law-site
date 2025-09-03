<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Testimonial extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "testimonials";
    protected $fillable = ['name', 'description', 'category', 'slug', 'sort_order', 'image', 'is_active', 'type', 'video_path', 'service_id', 'position', 'created_at', 'updated_at',  'deleted_at'];


    public function scopeWithAll($query)
    {
        return $query;
    }
    public function scopeActive($query)
    {
        return $query->where('is_active', 1);
    }
    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
