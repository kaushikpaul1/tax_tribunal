<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class registercasemodel extends Model
{
    use HasFactory;
    protected $table = 'registercase';
    public function district()
    {
        // return $this->belongsTo(districtmodel::class, 'id');
        return $this->belongsTo(districtmodel::class, 'pdistrict', 'id');
        
    }
    

}
