<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('projects', function (Blueprint $table) {

            // crea il campo 
            $table->unsignedBigInteger('type_id')->nullable()->after('id');

            // crea la chiave esterna 
            $table->foreign('type_id')
                ->references('id')
                ->on('types')
                ->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {

            // droppiamo la relazione tra le tabelle
            $table->dropForeign('projects_type_id_foreign');

            // droppiamo il campo
            $table->dropColumn('type_id');
        });
    }
};
