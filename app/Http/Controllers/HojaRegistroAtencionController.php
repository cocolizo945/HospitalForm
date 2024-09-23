<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HojaRegistroAtencion;
use Carbon\Carbon;

class HojaRegistroAtencionController extends Controller
{
    public function create()
    {
        return view('form_hospital');
    }

    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'folio' => 'required|string|unique:hoja_registro_atencion,folio',
            'clues' => 'nullable|string',
            'clues_u' => 'nullable|string',
            'curp' => 'required|string|unique:hoja_registro_atencion,curp',
            'nombre' => 'required|string',
            'primer_apellido' => 'required|string',
            'segundo_apellido' => 'nullable|string',
            'fecha_nacimiento' => 'required|date_format:d/m/Y',
            'fecha_ocurrencia' => 'required|date_format:d/m/Y',
            'hora_ocurrencia' => 'required|date_format:h:i A',
            'fecha_atencion' => 'required|date_format:d/m/Y',
            'hora_atencion' => 'required|date_format:h:i A',
            'entidad_nacimiento' => 'required|string',
            'edad' => 'required|integer',
            'sexo' => 'required|in:Hombre,Mujer,Intersexual',
            // Añadir las demás validaciones necesarias
        ]);

        $requestData = $request->all();

        // Asignar el valor de CLUES, priorizando el campo clues_u si está presente
    $requestData['clues'] = $request->input('clues_u') ?: $request->input('clues');

    // Verificar si el campo clues sigue siendo nulo
    if (empty($requestData['clues'])) {
        return redirect()->back()->withErrors(['clues' => 'El campo CLUES no puede estar vacío.']);
    }

        // Convertir las fechas al formato correcto para la base de datos
        $requestData['codigo_postal'] = $request->input('codigo_postal') ?: '00000';
        $requestData['fecha_nacimiento'] = Carbon::createFromFormat('d/m/Y', $request->fecha_nacimiento)->format('Y-m-d');
        $requestData['fecha_ocurrencia'] = Carbon::createFromFormat('d/m/Y', $request->fecha_ocurrencia)->format('Y-m-d');
        $requestData['hora_ocurrencia'] = Carbon::createFromFormat('h:i A', $request->hora_ocurrencia)->format('H:i:s');
        $requestData['fecha_atencion'] = Carbon::createFromFormat('d/m/Y', $request->fecha_atencion)->format('Y-m-d');
        $requestData['hora_atencion'] = Carbon::createFromFormat('h:i A', $request->hora_atencion)->format('H:i:s');

        // Crear un nuevo registro en la base de datos
        $hojaRegistroAtencion = new HojaRegistroAtencion($requestData);
        $hojaRegistroAtencion->save();

         // Si todo es exitoso
        return redirect()->back()->with('success', 'Datos guardados correctamente.');
        
        // Si ocurre algún error
        return redirect()->back()->with('error', 'Hubo un problema al guardar los datos.');
    }
}
