<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTriggerUpdStockEntryIncrease extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
        CREATE TRIGGER tr_updStockEntryIncrease AFTER UPDATE ON entries
        FOR EACH ROW BEGIN
            UPDATE items i
            JOIN check_entries ce
            ON ce.id_item = i.id
            AND ce.id_entry = NEW.id
            SET i.stock = i.stock - ce.quantity;
        END

        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
