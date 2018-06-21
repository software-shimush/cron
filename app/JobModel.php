<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobModel extends Model
{
    protected $table = 'job';
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
}
