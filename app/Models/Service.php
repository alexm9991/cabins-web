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
    //public function type_for_service()
   // {
   //     return $this->hasOne(Type_for_service::class,'SERVICES_id', 'id');
    //}

    public function type_service_individuals(): HasOneThrough
    {
    return $this->hasOneThrough(Types_individual::class, People_for_price::class, 'SERVICES_id', 'id', 'id', 'TYPES_INDIVIDUALS_id');
    }

    public function detail_service(): HasMany
    {
        return $this->hasMany(Detail_service::class,'SERVICES_id','id');
    }

    public function services_resource(): HasManyThrough
    {
        return $this->hasManyThrough(Resource::class, Detail_service::class,'SERVICES_id','DETAIL_SERVICES_id','id','id');
    }

    public function people_for_prices(): HasMany
    {
        return $this->hasMany(People_for_price::class,'SERVICES_id','id');
    }

    

    use HasFactory;
     //En caso de fallas en fechas BORRAR
    public $timestamps = False;
   
}
