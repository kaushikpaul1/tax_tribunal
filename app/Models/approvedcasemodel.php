<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class approvedcasemodel extends Model
{
    use HasFactory;
    protected $table = 'approvedcases'; 
    public function district()
    {
        // return $this->belongsTo(districtmodel::class, 'id');
        return $this->belongsTo(districtmodel::class, 'pdistrict', 'id');
        
    }
}

