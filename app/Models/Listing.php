<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;
    /***
     * we have to use scopeFilter name
     * to allow as to use filter methode
     * in the controllers
     */
    protected $fillable=['title','company','location','description','tags','email','website'];
    public function scopeFilter($query, array $filters)
    {
        if (!empty($filters["tag"])) {
            return $query->where('tags', 'like', '%'. request('tag').'%');
        }
        if (!empty($filters["search"])) {
            return $query->where('title', 'like', '%'.  request('search').'%')
            ->orWhere('description', 'like', '%'.  request('search').'%')
            ->orWhere('tags', 'like', '%'.  request('search').'%');
        }
        return $query;
    }
}
