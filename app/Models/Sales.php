<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    protected $table = 'sales'; // Specify the table name if it's not the plural of the model name
    protected $fillable = [
        'invoice_number',
        'medicine_name',
        'generic_name',
        'sale_date',
        'quantity',
        'total_amount',
    ];
    
}
