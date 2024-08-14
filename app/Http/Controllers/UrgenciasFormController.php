<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UrgenciasForm;
use Carbon\Carbon;

class UrgenciasFormController extends Controller
{
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
            'primer_apellido' => 'required|string|max:255',
            'segundo_apellido' => 'nullable|string|max:255',
            'curp' => 'required|string|max:18|unique:urgencias_forms,curp',
            'fecha_nacimiento' => 'required|date_format:d/m/Y h:i A',
            'entidad_nacimiento' => 'required|string|max:255',
            'edad' => 'required|integer',
            'sexo' => 'required|in:1,2,3',  // Valores numéricos para Hombre, Mujer, Intersexual
            'afiliacion' => 'required|in:0,1,2,3,4,5,6,7,8,9,10,99',
            'gratuidad' => 'required|boolean',
            'indigena' => 'required|boolean',
            'migrante' => 'required|boolean',
            'afromexicano' => 'required|boolean',
            'entidad_pais' => 'required|string|max:255',
            'municipio' => 'required|string|max:255',
            'localidad' => 'required|string|max:255',
            'codigo_postal' => 'required|string|max:5',
            'tipo_vialidad' => 'required|string|max:255',
            'nombre_vialidad' => 'required|string|max:255',
            'num_ext' => 'required|string|max:255',
            'num_int' => 'nullable|string|max:255',
            'tipo_asentamiento' => 'required|string|max:255',
            'nombre_asentamiento' => 'required|string|max:255',
            'telefono' => 'required|string|max:10',
            'prehospitalaria' => 'required|boolean',
            'tiempo_traslado' => 'required|date_format:H:i',
            'fecha_ingreso' => 'required|date_format:d/m/Y h:i A',
            'tipo_urgencia' => 'required|in:1,2',
            'motivo_atencion' => 'required|in:0,1,2,3',
            'tipo_cama' => 'required|in:0,1,2',
            'traslado_transitorio' => 'required|boolean',
            'nombre_unidad' => 'required|string|max:255',
            'clues' => 'required|string|max:255',
            'fecha_alta' => 'required|date_format:d/m/Y h:i A',
            'alta_por' => 'required|in:0,1,2,3,4,5,6',
            'mujer_edad_fertil' => 'required|in:0,1,2',
            'afeccion_principal' => 'required|string|max:255',
            'comorbilidades' => 'required|string|max:255',
            'causa_externa' => 'required|string|max:255',
            'llenado_hoja_lesion' => 'required|boolean',
            'folio_hoja_lesion' => 'nullable|string|max:255',
            'interconsulta_select' => 'required|boolean',
            'especialidad' => 'nullable|string|max:255',
            'medico_interconsultante' => 'nullable|string|max:255',
            'cedula_curp' => 'nullable|string|max:255',
            'procedimiento1' => 'nullable|string|max:255',
            'procedimiento2' => 'nullable|string|max:255',
            'procedimiento3' => 'nullable|string|max:255',
            'procedimiento4' => 'nullable|string|max:255',
            'procedimiento5' => 'nullable|string|max:255',
            'medicamento1' => 'nullable|string|max:255',
            'medicamento2' => 'nullable|string|max:255',
            'medicamento3' => 'nullable|string|max:255',
            'medicamento4' => 'nullable|string|max:255',
            'medicamento5' => 'nullable|string|max:255',
            'nombre_responsable' => 'required|string|max:255',
            'primer_apellido_responsable' => 'required|string|max:255',
            'segundo_apellido_responsable' => 'required|string|max:255',
            'curp_responsable' => 'required|string|max:18',
            'cedula_profesional' => 'required|string|max:8',
        ]);

        // Convertir las fechas al formato adecuado para MySQL
        $validatedData['fecha_nacimiento'] = Carbon::createFromFormat('d/m/Y h:i A', $validatedData['fecha_nacimiento'])->format('Y-m-d H:i:s');
        $validatedData['fecha_ingreso'] = Carbon::createFromFormat('d/m/Y h:i A', $validatedData['fecha_ingreso'])->format('Y-m-d H:i:s');
        $validatedData['fecha_alta'] = Carbon::createFromFormat('d/m/Y h:i A', $validatedData['fecha_alta'])->format('Y-m-d H:i:s');

        // Guardar los datos en la base de datos
        UrgenciasForm::create($validatedData);

        // Redirigir con mensaje de éxito
        return redirect()->back()->with('success', 'Datos guardados correctamente.');
    }
}
