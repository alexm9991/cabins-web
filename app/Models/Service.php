<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;


/**
 * Summary of Service
 */
class Service extends Model
{
 

    public function detail_service(): HasMany
    {
        return $this->hasMany(Detail_service::class,'SERVICES_id','id');
    }

    public function services_resource(): HasManyThrough
    {
        return $this->hasManyThrough(Resource::class, Detail_service::class,'SERVICES_id','DETAIL_SERVICES_id','id','id');
    }

    use HasFactory;
     //En caso de fallas en fechas BORRAR
    public $timestamps = False;
   
}
