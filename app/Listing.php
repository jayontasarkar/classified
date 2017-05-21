<?php

namespace App;

use App\User;
use App\Traits\Eloquent\OrderableTrait;
use App\Traits\Eloquent\PivotOrderableTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Listing extends Model
{
    use SoftDeletes, OrderableTrait, PivotOrderableTrait;

    protected $fillable = [
    	'title', 'body', 'area_id', 
    	'category_id', 'user_id', 'live'
    ];

    public function scopeIsNotLive($query)
    {
    	return $query->where('live', false);
    }

    public function scopeIsLive($query)
    {
    	return $query->where('live', true);
    }

    public function scopeFromCategory($query, Category $category)
    {
        return $query->where('category_id', $category->id);
    }

    public function scopeInArea($query, Area $area)
    {
        return $query->whereIn('area_id', array_merge(
        	[$area->id],
        	$area->descendants->pluck('id')->toArray()
        ));
    }

    public function live()
    {
    	return $this->live;
    }

    public function cost()
    {
    	return $this->category->cost;
    }

    public function ownedByUser(User $user)
    {
        return $this->user->id === $user->id;
    }

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function area()
    {
    	return $this->belongsTo(Area::class);
    }

    public function category()
    {
    	return $this->belongsTo(Category::class);
    }

    public function favourites()
    {
        return $this->morphToMany(User::class, 'favouritable');
    }

    public function favouritedBy(User $user)
    {
        return $this->favourites->contains($user);
    }

    public function viewedUser()
    {
        return $this->belongsToMany(User::class, 'user_listing_views')
            ->withTimestamps()
            ->withPivot(['count']);   
    }

    public function views()
    {
        return $this->viewedUser()->sum('count');
    }
}
