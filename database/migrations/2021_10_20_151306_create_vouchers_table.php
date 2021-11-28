<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use \Illuminate\Support\Carbon;
//use Carbon\Carbon;

class CreateVouchersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vouchers', function (Blueprint $table) {
            $table->id();
            $table->string('voucher_id')->unique(); // ma code voucher BAEMINSIEUTIEC128390128390218930
            $table->string('name'); /// haskdjfhjkl
            $table->string('type'); /// percentage or amount, 'percentage', 'amount'
            $table->bigInteger('deduction_amount');// '15', '125000'
            $table->date('start_from')->default(Carbon::now()); //'' Carbon
            $table->date('end_at')->default(Carbon::now()); //
            $table->boolean('is_enable')->default(0); // true or false
            $table->integer('released_voucher'); // so luong voucher tao ra: 100 voucher
            $table->integer('used_voucher')->default(0); // so luong voucher da dung: 50 voucher
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vouchers');
    }
}
