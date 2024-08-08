<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class FormulariosTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('formularios')->insert([
            'clues' => 'CSSSA006403',
            'folio' => Str::random(10),
            'nombre' => 'Juan',
            'primer_apellido' => 'Perez',
            'segundo_apellido' => 'Lopez',
            'curp' => Str::random(18),
            'fecha_nacimiento' => '1985-06-15',
            'entidad_nacimiento' => 'Chiapas',
            'edad' => 35,
            'sexo' => 'Hombre',
            'afiliacion' => 'IMSS',
            'numero_afiliacion' => '123456789',
            'gratuidad' => true,
            'escolaridad' => 'Profesional',
            'leer_escribir' => true,
            'indigena' => false,
            'lengua_indigena' => false,
            'afrodescendiente' => false,
            'migrante' => false,
            'discapacidad' => false,
            'referido_por' => 'Unidad médica',
            'fecha_ocurrencia' => now(),
            'festivo' => false,
            'sitio_ocurrencia' => 'Vivienda',
            'entidad_pais' => 'México',
            'municipio' => 'Tuxtla Gutierrez',
            'localidad' => 'Centro',
            'codigo_postal' => '29000',
            'tipo_vialidad' => 'Calle',
            'nombre_vialidad' => 'Primera',
            'num_ext' => '123',
            'num_int' => '1',
            'tipo_asentamiento' => 'Urbano',
            'nombre_asentamiento' => 'Centro',
            'intencionalidad_evento' => 'Accidental',
            'agente_lesion' => 'Caída',
            'prehospitalaria' => false,
            'tiempo_traslado' => '30 minutos',
            'efectos_paciente' => 'Alcohol',
            'lesionado' => 'Conductor',
            'equipo_seguridad' => true,
            'tipo_seguridad' => 'Cinturón de seguridad',
            'tipo_violencia' => 'Violencia física',
            'num_agresores' => '1',
            'parentesco' => 'Ninguno',
            'sexo_agresor' => 'Hombre',
            'edad_agresor' => 30,
            'efectos_agresor' => 'Alcohol',
            'fecha_atencion' => now(),
            'servicio_atencion' => 'Urgencias',
            'tipo_atencion' => 'Médica',
            'area_gravedad' => 'Cabeza',
            'consecuencia_gravedad' => 'Laceración',
            'afeccion_principal' => 'Contusión',
            'causa_externa' => 'Accidente',
            'aviso_ministerio' => true,
            'destino_atencion' => 'Domicilio',
            'responsable_atencion' => 'Médica(o) tratante',
            'nombre_responsable' => 'Maria',
            'primer_apellido_responsable' => 'Gomez',
            'segundo_apellido_responsable' => 'Martinez',
            'curp_responsable' => Str::random(18),
            'cedula_profesional' => '987654321',
        ]);
    }
}
