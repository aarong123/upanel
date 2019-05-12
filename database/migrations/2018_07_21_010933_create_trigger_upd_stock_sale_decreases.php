<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTriggerUpdStockSaleDecreases extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
        CREATE TRIGGER tr_updStockSaleDecreases AFTER UPDATE ON sales FOR EACH ROW 
            BEGIN
              UPDATE items i
                JOIN check_sales cs
                  ON cs.id_item = i.id
                 AND cs.id_sale= new.id
                 set i.stock = i.stock + cs.quantity;
            end;
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
