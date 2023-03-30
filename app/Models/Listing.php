<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Listing extends Model
{
    use HasFactory;
    /***
     * we have to use scopeFilter name
     * to allow as to use filter methode
     * in the controllers
     */
    protected $fillable=['title','user_id','company','location','description','tags','email','website','logo'];
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

    //Relation between listing and user
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
