<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionsTable extends Migration
{

    public $tableName = 'transactions';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {

            $table->engine = 'InnoDB';
            
            $table->increments('id');
            $table->decimal('amount');
            $table->timestamp('dateCreated');
            $table->integer('customerId')->unsigned();
        });
        
        Schema::table($this->tableName, function ($table) {
            $table->foreign('customerId')
                ->references('id')
                ->on('customers')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table($this->tableName, function ($table) {
            $table->dropForeign(['customerId']);
        });
        
        Schema::drop($this->tableName);
    }
}
