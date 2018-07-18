<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    
    
    protected $fillable = ['id', 'name', 'address','postal_code', 'zip_code', 'region', 'city', 'country', 'contact_phone', 'contact_email'];
    public function scopeSearch($query, $s) {
    	return $query->where('name', 'like', '%' .$s. '%')
    	->orWhere('contact_email', 'like', '%' .$s. '%');
    }
}
