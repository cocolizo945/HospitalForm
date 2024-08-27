<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUrgenciasFormsTable extends Migration
{
    public function up()
    {
        Schema::create('urgencias_forms', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('primer_apellido');
            $table->string('segundo_apellido')->nullable();
            $table->string('curp')->unique();
            $table->date('fecha_nacimiento');
            $table->string('entidad_nacimiento');
            $table->integer('edad');
            $table->enum('sexo', ['Hombre', 'Mujer', 'Intersexual']);
            $table->enum('afiliacion', [
                'No especificado', 'Ninguna', 'IMSS', 'ISSSTE', 'PEMEX', 'SEDENA', 'SEMAR', 'OTRA', 'IMSS Bienestar', 'ISSFAM', 'OPD IMSS Bienestar', 'Se ignora'
            ]);
            $table->string('numero_afiliacion')->nullable();
            $table->boolean('gratuidad');
            $table->boolean('indigena');
            $table->boolean('migrante');
            $table->boolean('afromexicano');
            $table->string('entidad_pais');
            $table->string('municipio');
            $table->string('localidad');
            $table->string('codigo_postal');
            $table->string('tipo_vialidad');
            $table->string('nombre_vialidad');
            $table->string('num_ext');
            $table->string('num_int')->nullable();
            $table->string('tipo_asentamiento');
            $table->string('nombre_asentamiento');
            $table->string('telefono');
            $table->boolean('prehospitalaria');
            $table->time('tiempo_traslado');
            $table->timestamp('fecha_ingreso');
            $table->enum('tipo_urgencia', ['Urgencia calificada', 'Urgencia no calificada']);
            $table->enum('motivo_atencion', ['Accidente, envenenamiento y violencia', 'Médica', 'Gineco-obstétrica', 'Pediátrica']);
            $table->enum('tipo_cama', ['Cama de observación', 'Cama de choque', 'Sin cama']);
            $table->boolean('traslado_transitorio');
            $table->string('nombre_unidad');
            $table->string('clues');
            $table->timestamp('fecha_alta')
            $table->enum('alta_por', [
                'Hospitalización', 'Consulta Externa', 'Traslado a otra unidad', 'Domicilio', 'Defunción', 'Fuga', 'Voluntad'
            ]);
            $table->enum('mujer_edad_fertil', [
                'Embarazo', 'Puerperio', 'No estaba embarazada ni en puerperio'
            ]);
            $table->string('afeccion_principal');
            $table->string('comorbilidades');
            $table->string('causa_externa');
            $table->boolean('llenado_hoja_lesion');
            $table->string('folio_hoja_lesion')->nullable();
            $table->boolean('interconsulta_select');
            $table->string('especialidad')->nullable();
            $table->string('medico_interconsultante')->nullable();
            $table->string('cedula_curp')->nullable();
            $table->string('procedimiento1')->nullable();
            $table->string('procedimiento2')->nullable();
            $table->string('procedimiento3')->nullable();
            $table->string('procedimiento4')->nullable();
            $table->string('procedimiento5')->nullable();
            $table->string('medicamento1')->nullable();
            $table->string('medicamento2')->nullable();
            $table->string('medicamento3')->nullable();
            $table->string('medicamento4')->nullable();
            $table->string('medicamento5')->nullable();
            $table->string('nombre_responsable');
            $table->string('primer_apellido_responsable');
            $table->string('segundo_apellido_responsable');
            $table->string('curp_responsable');
            $table->string('cedula_profesional');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('urgencias_forms');
    }
}
