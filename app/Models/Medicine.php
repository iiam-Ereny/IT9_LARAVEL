<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class Medicine extends Model
{
  protected $fillable = [
    'medicine_name', 'packing', 'generic_name', 'expiry_date',
    'supplier_id', 'quantity', 'rate',
];



    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }
}
