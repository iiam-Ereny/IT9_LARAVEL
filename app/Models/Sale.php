<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
  protected $fillable = [
    'invoice_number',
    'medicine_name',
    'generic_name',
    'sale_date',
    'quantity',
    'payment_status',
];
public function medicine()
{
    return $this->belongsTo(Medicine::class);
}
}
