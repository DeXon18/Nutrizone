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
        Schema::table('users', function (Blueprint $table) {
            // Añadimos las columnas después de la columna 'password' por organización
            $table->integer('age')->nullable()->after('password');
            $table->enum('gender', ['Hombre', 'Mujer'])->nullable()->after('age');
            $table->decimal('weight', 5, 2)->nullable()->after('gender'); // e.g., 150.75 kg
            $table->integer('height')->nullable()->after('weight'); // en cm
            $table->enum('activity_level', ['Sedentario', 'Ligero', 'Moderado', 'Activo', 'Muy Activo'])->nullable()->after('height');
            $table->enum('goal', ['Perder peso', 'Mantener', 'Ganar músculo'])->nullable()->after('activity_level');
            $table->enum('language_preference', ['es', 'en'])->default('es')->after('goal');
            $table->text('allergies')->nullable()->after('language_preference');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'age',
                'gender',
                'weight',
                'height',
                'activity_level',
                'goal',
                'language_preference',
                'allergies',
            ]);
        });
    }
};
