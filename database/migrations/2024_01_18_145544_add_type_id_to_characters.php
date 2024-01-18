<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('characters', function (Blueprint $table) {
            $table
                ->unsignedBigInteger('type_id')
                ->nullable()
                ->after('id');
            //costrained significa di andare a prendere la type con l'id ( abbiamo rispettato la convenzione dei nomi )
            $table
                ->foreign('type_id')
                ->references('id')
                ->on('types')
                ->nullOnDelete()
                ->constrained();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('characters', function (Blueprint $table) {
            $table->dropForeign('characters_type_id_foreign');
            $table->dropColumn('type_id');
        });
    }
};
