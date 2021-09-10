<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Models\Status;

class UpdateClienteStatus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table("cliente", function (Blueprint $table) {
			$table->foreignId("status");
			$table->foreign("status")->references("id")->on("status");
		});
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
