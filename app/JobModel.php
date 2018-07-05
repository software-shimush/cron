<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JobModel extends Model
{
    protected $table = 'job';
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    public function getProperIntervalAttribute()
    {
        switch($this->interval_type){
            case "daily":
                return $this->interval /1440;    
                break;
            case "hourly":
                return ($this->interval /60);   
                break;
            case "min":
                return $this->interval;
                break;
            default :
                return "none";
        }
    }
    public function setIntervalAttribute($value)
    {
        $this->attributes['interval'] = $value;
        switch($this->attributes['interval_type']){
            case "daily":
                $this->attributes['interval']= $this->attributes['interval']*1440;    
                break;
            case "hourly":
                $this->attributes['interval']= $this->attributes['interval']*60;
                break;
            case "min":
                return $this->interval;
                break;
            default :
                return "none";
        }
    }

    public function setPayloadAttribute($value){
        $this->attributes['payload'] = $value;
        unset($this->attributes['payload']['']); //remove any empty keys
        $this->attributes['payload'] = json_encode($this->attributes['payload']);     
    }

    public function getPayloadAttribute($value){
        return json_decode($value, true);
    }
}
