<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Log;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;
use Ramsey\Uuid\Uuid;

class BaseModel extends Model
{
    Use SoftDeletes;

    protected $guarded =['_token','id'];
    public $incrementing = false;
    public $keyType='string';

    protected static $relatedTable=[];

    protected static function boot()
    {
        parent::boot();
        $relations = static::$relatedTable;
        static::deleting(function($model)use($relations) {
            foreach ($relations as $relation){
                if(method_exists($model,$relation)){
                    try{
                        if(method_exists($model->{$relation}(),'detach')){
                            $model->{$relation}()->detach();
                        }else{
                            $model->{$relation}()->delete();
                        }
                    }catch (\Exception $exception){
                        Log::error('error deleted relation table',['message'=>$exception->getMessage()]);
                    }
                }
            }
        });

        static::creating(function ($model) {
            try {
                $model->id = Uuid::uuid4()->toString();

            } catch (UnsatisfiedDependencyException $e) {
                abort(500, $e->getMessage());
            }
        });
    }
}
