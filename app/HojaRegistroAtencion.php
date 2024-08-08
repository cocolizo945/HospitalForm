<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HojaRegistroAtencion extends Model
{
    protected $table = 'hoja_registro_atencion';

    protected $fillable = [
        'clues', 'folio', 'nombre', 'primer_apellido', 'segundo_apellido', 'curp', 'fecha_nacimiento',
        'entidad_nacimiento', 'edad', 'sexo', 'afiliacion', 'afiliacion_especifique', 'numero_afiliacion', 'gratuidad',
        'escolaridad', 'escolaridad_seleccionada', 'leer_escribir', 'indigena', 'lengua_indigena', 'cual_lengua',
        'afrodescendiente', 'migrante', 'mujer_fertil', 'semanas_gestacion', 'discapacidad', 'referido_por',
        'unidad_medica', 'fecha_ocurrencia', 'festivo', 'sitio_ocurrencia', 'otro_lugar', 'entidad_pais', 'municipio',
        'localidad', 'codigo_postal', 'tipo_vialidad', 'nombre_vialidad', 'num_ext', 'num_int', 'tipo_asentamiento',
        'nombre_asentamiento', 'intencionalidad_evento', 'agente_lesion', 'agente_especifique', 'prehospitalaria',
        'tiempo_traslado', 'efectos_paciente', 'accidente_motor', 'lesionado', 'equipo_seguridad', 'tipo_seguridad',
        'seguridad_especifique', 'tipo_violencia', 'num_agresores', 'parentesco', 'sexo_agresor', 'edad_agresor',
        'efectos_agresor', 'evento_autoinfligido', 'fecha_atencion', 'servicio_atencion', 'tipo_atencion', 'area_gravedad',
        'consecuencia_gravedad', 'afeccion_principal', 'causa_externa', 'aviso_ministerio', 'destino_atencion',
        'responsable_atencion', 'nombre_responsable', 'primer_apellido_responsable', 'segundo_apellido_responsable',
        'curp_responsable', 'cedula_profesional'
    ];
}
