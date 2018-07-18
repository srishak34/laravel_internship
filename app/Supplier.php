<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'idSupplier';
    protected $fillable = ['idSupplier', 'name', 'address', 'zip', 'region', 'city', 'country', 'phone', 'email'];
    public function scopeSearch($query, $s) {
    	return $query->where('name', 'like', '%' .$s. '%')
    	->orWhere('email', 'like', '%' .$s. '%');
    }
}
