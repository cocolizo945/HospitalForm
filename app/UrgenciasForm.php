<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UrgenciasForm extends Model
{
    use HasFactory;

    protected $table = 'urgencias_forms';

    protected $fillable = [
        'nombre', 'primer_apellido', 'segundo_apellido', 'curp', 'fecha_nacimiento',
        'entidad_nacimiento', 'edad', 'sexo', 'afiliacion', 'numero_afiliacion', 'gratuidad',
        'indigena', 'migrante', 'afromexicano', 'entidad_pais', 'municipio', 'localidad',
        'codigo_postal', 'tipo_vialidad', 'nombre_vialidad', 'num_ext', 'num_int', 'tipo_asentamiento',
        'nombre_asentamiento', 'telefono', 'prehospitalaria', 'tiempo_traslado', 'fecha_ingreso',
        'tipo_urgencia', 'motivo_atencion', 'tipo_cama', 'traslado_transitorio', 'nombre_unidad',
        'clues', 'fecha_alta', 'alta_por', 'mujer_edad_fertil', 'afeccion_principal',
        'comorbilidades', 'causa_externa', 'llenado_hoja_lesion', 'folio_hoja_lesion', 'interconsulta_select',
        'especialidad', 'medico_interconsultante', 'cedula_curp', 'procedimiento1', 'procedimiento2',
        'procedimiento3', 'procedimiento4', 'procedimiento5', 'medicamento1', 'medicamento2',
        'medicamento3', 'medicamento4', 'medicamento5', 'nombre_responsable', 'primer_apellido_responsable',
        'segundo_apellido_responsable', 'curp_responsable', 'cedula_profesional'
    ];
}
