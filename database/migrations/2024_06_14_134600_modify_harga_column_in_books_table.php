<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyHargaColumnInBooksTable extends Migration
{
    public function up()
    {
        Schema::table('books', function (Blueprint $table) {
            // Mengubah tipe data kolom harga dari decimal menjadi integer
            $table->integer('harga')->change();
        });
    }

    public function down()
    {
        Schema::table('books', function (Blueprint $table) {
            // Mengembalikan tipe data kolom harga menjadi decimal
            $table->decimal('harga', 8, 2)->change();
        });
    }
}
