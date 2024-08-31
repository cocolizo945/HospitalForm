<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('hoja_registro_atencion', function (Blueprint $table) {
            $table->string('servicio_atencion', 255)->change();
            $table->string('tipo_atencion', 255)->change();
            $table->string('area_gravedad', 255)->change();
            $table->string('consecuencia_gravedad', 255)->change();
        });
    }

    public function down()
    {
        // Revertir los cambios si es necesario
        Schema::table('hoja_registro_atencion', function (Blueprint $table) {
            $table->enum('servicio_atencion', [
                'Consulta externa', 'Hospitalización', 'Urgencias', 'Servicio especializado de atención a la violencia', 'Otro servicio (Especifique)'
            ])->change();
            $table->enum('tipo_atencion', [
                'Médica', 'Psicológica', 'Quirúrgica', 'Psiquiátrica', 'Consejería', 'Otro', 'Píldora anticonceptiva de emergencia', 'Profilaxis VIH', 'Profilaxis otras ITS', 'IVE(Interrupción Voluntaria del Embarazo)', 'Vacuna VPH'
            ])->change();
            $table->enum('area_gravedad', [
                'Cabeza', 'Cara', 'Región ocular', 'Cuello', 'Columna vertebral', 'Extremidades superiores', 'Mano', 'Tórax', 'Espalda y/o glúteos', 'Abdomen', 'Pelvis', 'Región genital', 'Extremidades inferiores', 'Pies', 'Múltiples', 'Otro (Especifique)'
            ])->change();
            $table->enum('consecuencia_gravedad', [
                'Laceración/abrasión', 'Aplastamiento', 'Cicatrices', 'Depresión', 'Contusión/mallugamiento', 'Congelamiento', 'Aborto', 'Trastornos de ansiedad/estrés postraumático', 'Quemadura/corrosión', 'Asfixia', 'Embarazo', 'Trastornos psiquiátricos', 'Luxación/esguince', 'Herida', 'Infección de transmisión sexual', 'Múltiple', 'Amputación/avulsión', 'Fractura', 'Defunción', 'Malestar emocional', 'Trastorno del estado de ánimo', 'Otro (Especifique)'
            ])->change();
        });
    }
};
