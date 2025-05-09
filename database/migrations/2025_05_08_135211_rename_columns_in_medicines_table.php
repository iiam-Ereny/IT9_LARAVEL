<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('medicines', function (Blueprint $table) {
        $table->renameColumn('Generic_Name', 'generic_name');
        $table->renameColumn('expiration_date', 'expiry_date');
        $table->renameColumn('Rate', 'rate');
    });
}

public function down()
{
    Schema::table('medicines', function (Blueprint $table) {
        $table->renameColumn('generic_name', 'Generic_Name');
        $table->renameColumn('expiry_date', 'expiration_date');
        $table->renameColumn('rate', 'Rate');
    });
}
};
