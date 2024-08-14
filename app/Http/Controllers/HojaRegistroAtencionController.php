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
            'clues' => 'required|string',
            'folio' => 'required|string|unique:hoja_registro_atencion,folio',
            'curp' => 'required|string|unique:hoja_registro_atencion,curp',
            'nombre' => 'required|string',
            'primer_apellido' => 'required|string',
            'segundo_apellido' => 'nullable|string',
            'fecha_nacimiento' => 'required|date_format:d/m/Y',
            'fecha_ocurrencia' => 'required|date_format:d/m/Y h:i A',
            'fecha_atencion' => 'required|date_format:d/m/Y h:i A',
            'entidad_nacimiento' => 'required|string',
            'edad' => 'required|integer',
            'sexo' => 'required|in:Hombre,Mujer,Intersexual',
            // Añadir las demás validaciones necesarias
        ]);

        // Convertir las fechas al formato correcto para la base de datos
        $requestData = $request->all();
        $requestData['fecha_nacimiento'] = Carbon::createFromFormat('d/m/Y', $request->fecha_nacimiento)->format('Y-m-d');
        $requestData['fecha_ocurrencia'] = Carbon::createFromFormat('d/m/Y h:i A', $request->fecha_ocurrencia)->format('Y-m-d H:i:s');
        $requestData['fecha_atencion'] = Carbon::createFromFormat('d/m/Y h:i A', $request->fecha_atencion)->format('Y-m-d H:i:s');

        // Crear un nuevo registro en la base de datos
        $hojaRegistroAtencion = new HojaRegistroAtencion($requestData);
        $hojaRegistroAtencion->save();

        // Redirigir con un mensaje de éxito
        return redirect()->back()->with('success', 'Formulario enviado con éxito.');
    }
}
