<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('proyectos', function (Blueprint $table) {
            $table->id();
            $table->string('nombreProyecto', 50);
            $table->string('fuenteFondos', 50);
            $table->float('montoPlanificado', 8, 2);
            $table->float('montoPatrocinado', 8, 2);
            $table->float('montoFondosPropios', 8, 2);
        });

        DB::table('proyectos')->insert([
            [
                'nombreProyecto' => 'LisbethArt',
                'fuenteFondos' => 'Fondos Propios',
                'montoPlanificado' => 15520,
                'montoPatrocinado' => 14000.20,
                'montoFondosPropios' => 1519.80,
            ],
            [
                'nombreProyecto' => 'MacrArt',
                'fuenteFondos' => 'Capital Semilla',
                'montoPlanificado' => 1500,
                'montoPatrocinado' => 1250.25,
                'montoFondosPropios' => 249.75,
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proyectos');
    }
};
