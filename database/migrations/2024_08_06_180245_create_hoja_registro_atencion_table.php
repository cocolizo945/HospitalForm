<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHojaRegistroAtencionTable extends Migration
{
    public function up()
    {
        Schema::create('hoja_registro_atencion', function (Blueprint $table) {
            $table->increments('id');
            $table->string('clues');
            $table->string('folio')->unique();
            $table->string('nombre');
            $table->string('primer_apellido');
            $table->string('segundo_apellido')->nullable();
            $table->string('curp')->unique();
            $table->date('fecha_nacimiento');
            $table->string('entidad_nacimiento');
            $table->integer('edad');
            $table->enum('sexo', ['Hombre', 'Mujer', 'Intersexual']);
            $table->enum('afiliacion', [
                'No especificado', 'Ninguna', 'IMSS', 'ISSSTE', 'PEMEX', 'SEDENA', 'SEMAR', 'OTRA', 'IMSS Bienestar', 'ISSFAM', 'OPD IMSS Bienestar', 'Se ignora', 'Especifique'
            ]);
            $table->string('afiliacion_especifique')->nullable();
            $table->string('numero_afiliacion')->nullable();
            $table->boolean('gratuidad');
            $table->enum('escolaridad', ['Ninguna', 'Primaria', 'Secundaria', 'Bachillerato o preparatoria', 'Profesional', 'Posgrado', 'Se ignora']);
            $table->enum('escolaridad_seleccionada', ['Completa', 'Incompleta'])->nullable();
            $table->boolean('leer_escribir');
            $table->boolean('indigena');
            $table->boolean('lengua_indigena');
            $table->string('cual_lengua')->nullable();
            $table->boolean('afrodescendiente');
            $table->boolean('migrante');
            $table->enum('mujer_fertil', ['Embarazo', 'Puerperio', 'No estaba embarazada ni en el puerperio'])->nullable();
            $table->integer('semanas_gestacion')->nullable();
            $table->boolean('discapacidad');
            $table->enum('referido_por', [
                'Unidad médica', 'Procuración de Justicia', 'Secretaría de Educación Pública', 'Desarrollo Social', 'DIF', 'Otras instituciones gubernamentales', 'Instituciones No gubernamentales', 'Sin referencia (iniciativa propia)'
            ]);
            $table->string('unidad_medica')->nullable();
            $table->timestamp('fecha_ocurrencia')->nullable();
            $table->time('hora_ocurrencia')->nullable();
            $table->boolean('festivo');
            $table->enum('sitio_ocurrencia', [
                'Vivienda', 'Institución residencial', 'Escuela', 'Área de deporte y atletismo', 'Vía pública (peatón)', 'Comercio y áreas de servicio', 'Trabajo', 'Granja', 'Club, cantina, bar', 'Vehículo automotor público', 'Vehículo automotor privado', 'Otro lugar (Especifique)', 'Lugar no especificado'
            ]);
            $table->string('otro_lugar')->nullable();
            $table->string('entidad_pais');
            $table->string('municipio');
            $table->string('localidad');
            $table->string('codigo_postal')->nullable()->change();
            $table->string('tipo_vialidad');
            $table->string('nombre_vialidad');
            $table->string('num_ext');
            $table->string('num_int')->nullable();
            $table->string('tipo_asentamiento');
            $table->string('nombre_asentamiento');
            $table->enum('intencionalidad_evento', [
                'Accidental', 'Violencia familiar', 'Violencia No familiar', 'Autoinfligido', 'Trata de personas'
            ]);
            $table->enum('agente_lesion', [
                'Fuego, flama, sustancia caliente/vapor', 'Intoxicación por drogas o medicamentos', 'Pie o mano', 'Caída', 'Objeto contundente', 'Objeto punzocortante', 'Golpe contra piso o pared', 'Cuerpo extraño', 'Explosión', 'Asfixia o sofocación', 'Múltiples agentes', 'Proyectil arma de fuego', 'Ahorcamiento', 'Radiación', 'Sustancias químicas', 'Corriente eléctrica', 'Herramienta o maquinaria', 'Sacudidas', 'Desastre natural', 'Vehículo de motor', 'Ahogamiento por sumersión', 'Piquete / mordedura de animal', 'Fuerzas de la naturaleza', 'Intoxicación por plantas, hongos venenosos', 'Otro (Especifique)', 'Se ignora', 'No aplica'
            ]);
            $table->string('agente_especifique')->nullable();
            $table->boolean('prehospitalaria');
            $table->time('tiempo_traslado');
            $table->enum('efectos_paciente', ['Alcohol', 'Droga por indicación médica', 'Drogas ilegales', 'Se ignora', 'Ninguna']);
            $table->boolean('accidente_motor')->nullable();
            $table->enum('lesionado', ['Conductor', 'Ocupante', 'Peatón'])->nullable();
            $table->boolean('equipo_seguridad')->nullable();
            $table->enum('tipo_seguridad', ['Cinturón de seguridad', 'Casco', 'Sillín porta infante', 'Otro (Especifique)'])->nullable();
            $table->string('seguridad_especifique')->nullable();
            $table->enum('tipo_violencia', ['Violencia física', 'Violencia sexual', 'Violencia psicológica', 'Violencia económica/patrimonial', 'Abandono y/o negligencia'])->nullable();
            $table->enum('num_agresores', ['Única', 'Más de una(o)'])->nullable();
            $table->string('parentesco')->nullable();
            $table->enum('sexo_agresor', ['Masculino', 'Femenino'])->nullable();
            $table->integer('edad_agresor')->nullable();
            $table->enum('efectos_agresor', ['Alcohol', 'Droga por indicación médica', 'Drogas ilegales', 'Se ignora', 'Ninguna'])->nullable();
            $table->enum('evento_autoinfligido', ['Única vez', 'Repetido'])->nullable();
            $table->timestamp('fecha_atencion')->nullable();
            $table->time('hora_atencion')->nullable();
            $table->string('servicio_atencion');
            $table->string('tipo_atencion');
            $table->string('area_gravedad');
            $table->string('consecuencia_gravedad');
            $table->string('afeccion_principal');
            $table->string('causa_externa');
            $table->boolean('aviso_ministerio');
            $table->enum('destino_atencion', [
                'Domicilio', 'Traslado a otra unidad médica', 'Servicio especializado atención a violencia', 'Consulta externa', 'Defunción', 'Refugio o albergue', 'DIF', 'Hospitalización', 'Ministerio público', 'Grupo de ayuda mutua', 'Otro (Especifique)'
            ]);
            $table->enum('responsable_atencion', ['Médica(o) tratante', 'Psicóloga(o) tratante', 'Trabajadora o trabajador social']);
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
        Schema::dropIfExists('hoja_registro_atencion');
    }
}
