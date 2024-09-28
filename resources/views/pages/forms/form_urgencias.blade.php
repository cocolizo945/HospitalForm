@extends('layouts.app', ['activePage' => 'form_urgencias', 'menuParent' => 'forms', 'titlePage' => __('Urgencias Forms')])

@section('content')
<div class="content">
  <!-- Logos Section -->
  <div class="row mb-4">
    <div class="col-md-12 text-center">
      <img src="{{ asset('images/gobierno-de-mexico-logo-E93B4BEE41-seeklogo.com 1.png') }}" alt="Gobierno de México"
        style="max-height: 100px; margin-right: 20px;">
      <img src="{{ asset('images/secretaria-salud-gobierno-federal-mexico-2020-logo-A3F6F47C9C-seeklogo.com 2.png') }}"
        alt="Secretaría de Salud" style="max-height: 100px; margin-right: 20px;">
    </div>
  </div>
  <div class="col-md-10 mr-auto ml-auto">

    @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
    @endforeach
      </ul>
    </div>
  @endif

    <!-- Wizard container -->
    <div class="wizard-container">
      <div class="card card-wizard" data-color="red" id="wizardProfile">
        <form action="{{ route('form_urgencias.store') }}" method="POST" id="RangeValidation">
          @csrf
          <div class="card-header text-center">
            <h3 id="tituloPrincipal" class="Montserrat-Bold">
              HOJA DIARIA DEL SERVICIO DE URGENCIAS
            </h3>
            <div class="wizard-navigation" id="wizardNavigation">
              <div class="progress-with-circle" id="progressWithCircle">
                <div class="progress-bar" role="progressbar" aria-valuenow="1" aria-valuemin="1" aria-valuemax="7"
                  style="width: 21%;" id="progressBar"></div>
              </div>
              <ul id="wizardSteps">
                <li class="nav-item" id="step0">
                  <a class="nav-link active" href="#formFolio" data-toggle="tab">
                    <i class="tim-icons icon-single-copy-04"></i>
                    <p>FOLIO</p>
                  </a>
                </li>
                <li class="nav-item" id="step1">
                  <a class="nav-link" href="#form1" data-toggle="tab">
                    <i class="tim-icons icon-single-02"></i>
                    <p>DATOS DEL PACIENTE</p>
                  </a>
                </li>
                <li class="nav-item" id="step2">
                  <a class="nav-link" href="#form2" data-toggle="tab">
                    <i class="tim-icons icon-satisfied"></i>
                    <p>ESTANCIA Y AFECCIONES TRATADAS</p>
                  </a>
                </li>
                <!--<li class="nav-item" id="step3">
                  <a class="nav-link" href="#form3" data-toggle="tab">
                    <i class="tim-icons icon-sound-wave"></i>
                    <p>AFECCIONES TRATADAS</p>
                  </a>
                </li>-->
                <li class="nav-item" id="step4">
                  <a class="nav-link" href="#form4" data-toggle="tab">
                    <i class="tim-icons icon-notes"></i>
                    <p>INTERCONSULTA Y PROCEDIMIENTOS</p>
                  </a>
                </li>
                <!--<li class="nav-item" id="step5">
                  <a class="nav-link" href="#form5" data-toggle="tab">
                    <i class="tim-icons icon-settings-gear-63"></i>
                    <p>PROCEDIMIENTOS</p>
                  </a>
                </li>-->
                <li class="nav-item" id="step6">
                  <a class="nav-link" href="#form6" data-toggle="tab">
                    <i class="tim-icons icon-attach-87"></i>
                    <p>MEDICAMENTOS SUMINISTRADOS</p>
                  </a>
                </li>
                <li class="nav-item" id="step7">
                  <a class="nav-link" href="#form7" data-toggle="tab">
                    <i class="tim-icons icon-heart-2"></i>
                    <p>PROFESIONAL DE LA SALUD RESPONSABLE:</p>
                  </a>
                </li>
              </ul>
            </div>
          </div>
          <div class="card-body" id="cardBody">
            <div class="tab-content" id="tabContent">

            <!-- Folio -->
            <div class="tab-pane show active" id="formFolio">
                <h5 class="info-text">Folio</h5>
                <div class="row">
                  <!-- CLUES (cambio1) -->
                 <div class="col-lg-5 col-md-6 col-sm-3">
                  <label for="clues">CLUES:</label>
                  <div class="form-group">
                  <input type="text" id="clues" name="clues" class="form-control" placeholder="Selecciona una CLUES" autocomplete="off" />
                      <ul id="clues_suggestions" class="list-group" style="position: absolute; z-index: 1000; display: none; width: 100%; background-color: white; border: 1px solid #ced4da; max-height: 200px; overflow-y: auto; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
                      </ul>
                  </div>
                  </div>
                  <!-- Folio -->
                  <div class="col-md-4 ml-auto mr-auto">
                  <label for="folio">Folio:</label>
                    <div class="form-group">
                      <input type='button' id='btnMakeFolio' class='btn btn-fill btn-primary btn-wd' name='makefolio' value='Crear Folio' />
                    </div>
                  </div>
                </div>
              </div>

              <!-- Datos del Paciente -->
              <div class="tab-pane" id="form1">
                <h5 class="info-text" id="datosPaciente">Datos del paciente</h5>
                <div class="row" id="datosPacienteRow1">
                  <!-- Nombre -->
                  <div class="col-md-4">
                    <label for="nombre">Nombre:</label>
                    <div class="form-group">
                      <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Juan" minlength="3"
                        required>
                    </div>
                  </div>

                  <!-- Primer apellido -->
                  <div class="col-md-4">
                    <label for="primer_apellido">Primer apellido:</label>
                    <div class="form-group">
                      <input type="text" class="form-control" id="primer_apellido" name="primer_apellido"
                        placeholder="Pérez" minlength="2" required>
                    </div>
                  </div>

                  <!-- Segundo apellido -->
                  <div class="col-md-4">
                    <label for="segundo_apellido">Segundo apellido:</label>
                    <div class="form-group">
                      <input type="text" class="form-control" id="segundo_apellido" name="segundo_apellido"
                        placeholder="Gómez" minlength="2">
                    </div>
                  </div>
                </div>

                <div class="row" id="datosPacienteRow2">
                  <!-- C.U.R.P. -->
                  <div class="col-md-4">
                    <label for="curp">C.U.R.P.:</label>
                    <div class="form-group">
                      <input type="text" class="form-control" id="curp" name="curp" placeholder="RAML850814HMCPLN07"
                        minlength="18" maxlength="18" required>
                        <span id="curp-validacion" style="color: red; display: none;">CURP inválida</span>
                    </div>
                  </div>

                  <!-- Fecha de Nacimiento -->
                  <div class="col-md-4">
                    <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
                    <div class="form-group">
                      <input type="text" class="form-control datetimepicker" id="fecha_nacimiento"
                        name="fecha_nacimiento" placeholder="07/12/2024" required>
                    </div>
                  </div>

                  
              <!-- Entidad o País de Nacimiento -->
              <div class="col-md-4">
                    <label for="entidad_nacimiento">Entidad o País de Nacimiento:</label>
                    <div class="form-group">
                      <input type="text" id="entidad_nacimiento" name="entidad_nacimiento" class="form-control"
                        placeholder="País" autocomplete="off" required>
                      <ul id="sugerencias_entidad_nacimiento" class="list-group autocomplete-suggestions"></ul>
                    </div>
                  </div>
                </div>

                <div class="row" id="datosPacienteRow3">
                  <!-- Edad -->
                  <div class="col-md-2">
                    <label for="edad">Edad cumplida:</label>
                    <div class="form-group">
                      <input class="form-control" type="number" id="edad" name="edad" placeholder="35" required>
                    </div>
                  </div>

                  <!-- Sexo -->
                  <div class="col-md-2">
                    <label for="sexo">Sexo:</label>
                    <div class="form-group">
                      <select class="selectpicker form-control" id="sexo" name="sexo" data-size="7"
                        data-style="btn btn-primary" title="Selección Única" required>
                        <option value="1">Hombre</option>
                        <option value="2">Mujer</option>
                        <option value="3">Intersexual</option>
                      </select>
                    </div>
                  </div>

<!-- Afiliación a los Servicios de Salud /cambio2 -->
<div class="col-md-4">
                    <label for="afiliacion">Afiliación a los Servicios de Salud:</label>
                    <div class="form-group">
                      <input type="text" id="afiliacion_input" name="afiliacion_input" class="form-control"
                        placeholder="Seleccione su afiliación" autocomplete="off" required>
                      <ul id="sugerencias_afiliacion" class="list-group autocomplete-suggestions"></ul>
                    </div>
                  </div>
                  <!--Especifique el otro lugar-->
                  <div class="col-md-4" id="afiliacionEspecifique" style="display: none;">
                    <label for="afiliacion_especifique">Especifique el otro lugar:</label>
                    <div class="form-group">
                      <input type="text" id="afiliacion_especifique" name="afiliacion_especifique" class="form-control"
                        placeholder="Especifique el lugar">
                    </div>
                  </div>
                
                  <!-- Número de Afiliación -->
                  <div class="col-md-4">
                    <label for="numero_afiliacion">Número de Afiliación:</label>
                    <div class="form-group">
                      <input class="form-control" type="number" id="numero_afiliacion" name="numero_afiliacion" min="0"
                        placeholder="Número de Afiliación" required maxlength="11">
                    </div>
                  </div>
                </div>

                <div class="row" id="datosPacienteRow4">
                  <!-- Gratuidad -->
                  <div class="col-md-2">
                    <label for="gratuidad">Gratuidad:</label>
                    <div class="form-group">
                      <select class="selectpicker form-control" id="gratuidad" name="gratuidad" data-size="7"
                        data-style="btn btn-primary" title="Selección Única" required>
                        <option disabled selected>Selección Única</option>
                        <option value="1">SI</option>
                        <option value="0">NO</option>
                      </select>
                    </div>
                  </div>

                  <!-- ¿Se Considera Indígena? -->
                  <div class="col-md-2">
                    <label for="indigena">¿Se Considera Indígena?</label>
                    <div class="form-group">
                      <select class="selectpicker form-control" id="indigena" name="indigena" data-size="7"
                        data-style="btn btn-primary" title="Selección Única" required>
                        <option disabled selected>Selección Única</option>
                        <option value="1">SI</option>
                        <option value="0">NO</option>
                      </select>
                    </div>
                  </div>

                  <!-- ¿Es Migrante Retornado? -->
                  <div class="col-md-2">
                  <label for="migrante">¿Es Migrante Retornado?</label>
                   <div class="form-group">
                    <select class="selectpicker form-control" id="migrante" name="migrante" data-size="7"
                    data-style="btn btn-primary" title="Selección Única" required onchange="toggleCamposMigrante()">
                    <option disabled selected>Selección Única</option>
                      <option value="1">SI</option>
                      <option value="0">NO</option>
                      <option value="9">NO APLICA</option>
                    </select>
                     </div>
                    </div>
                  <!-- ¿Se Considera Afromexicano? -->
                  <div class="col-md-2">
                    <label for="afromexicano">¿Se Considera Afromexicano?</label>
                    <div class="form-group">
                      <select class="selectpicker form-control" id="afromexicano" name="afromexicano" data-size="7"
                        data-style="btn btn-primary" title="Selección Única" required>
                        <option disabled selected>Selección Única</option>
                        <option value="1">SI</option>
                        <option value="0">NO</option>
                      </select>
                    </div>
                  </div>

             <!-- País -->
<div class="col-md-4">
  <label for="pais">País:</label>
  <div class="form-group">
    <input type="text" id="pais1" name="pais" class="form-control" placeholder="País" autocomplete="off" oninput="mostrarSugerencias(this, 'pais')" onfocus="mostrarSugerencias(this, 'pais')">
    <ul id="sugerencias_pais1" class="list-group autocomplete-suggestions" style="position: absolute; z-index: 1000; display: none;"></ul>
  </div>
</div>

<!-- Entidad Federativa -->
<div class="col-md-4">
  <label for="entidad">Entidad Federativa:</label>
  <div class="form-group">
    <input type="text" id="entidad" name="entidad" class="form-control" placeholder="Entidad Federativa" autocomplete="off" oninput="mostrarSugerencias(this, 'entidades')" onfocus="mostrarSugerencias(this, 'entidades')">
    <ul id="sugerencias_entidad" class="list-group autocomplete-suggestions" style="position: absolute; z-index: 1000; display: none;"></ul>
  </div>
</div>

<!-- Municipio o Alcaldía -->
<div class="col-md-4">
  <label for="municipio">Municipio o Alcaldía:</label>
  <div class="form-group">
    <input type="text" id="municipio" name="municipio" class="form-control" placeholder="Municipio o Alcaldía" autocomplete="off" oninput="mostrarSugerencias(this, 'municipios')" onfocus="mostrarSugerencias(this, 'municipios')">
    <ul id="sugerencias_municipio" class="list-group autocomplete-suggestions" style="position: absolute; z-index: 1000; display: none;"></ul>
  </div>
</div>

<!-- Localidad -->
<div class="col-md-4">
  <label for="localidad">Localidad:</label>
  <div class="form-group">
    <input type="text" id="localidad" name="localidad" class="form-control" placeholder="Localidad" autocomplete="off" oninput="mostrarSugerencias(this, 'localidades')" onfocus="mostrarSugerencias(this, 'localidades')">
    <ul id="sugerencias_localidad" class="list-group autocomplete-suggestions" style="position: absolute; z-index: 1000; display: none;"></ul>
  </div>
</div>

<!-- Código Postal -->
<div class="col-md-4">
  <label for="codigo_postal">Código Postal:</label>
  <div class="form-group">
    <input type="text" class="form-control" id="codigo_postal" name="codigo_postal" placeholder="30700" minlength="5" required>
  </div>
</div>

                
                 <!-- Tipo de la Vialidad -->
<div class="col-md-4 autocomplete-container">
    <label for="tipo_vialidad">Tipo de la Vialidad:</label>
    <div class="form-group">
        <input type="text" id="tipo_vialidad" name="tipo_vialidad" class="form-control autocomplete-input" placeholder="Tipo de Vialidad" autocomplete="off">
        <ul class="list-group autocomplete-suggestions"></ul>
    </div>
</div>


                  <!-- Nombre de la vialidad -->
                  <div class="col-md-4">
                    <label for="nombre_vialidad">Nombre de la vialidad:</label>
                    <div class="form-group">
                      <input type="text" class="form-control" id="nombre_vialidad" name="nombre_vialidad"
                        placeholder="Central Norte" minlength="3" required>
                    </div>
                  </div>

                  <!-- Num. Ext. -->
                  <div class="col-md-2  autocomplete-container">
                    <label for="num_ext">Num. Ext.:</label>
                    <div class="form-group">
                      <input type="text" class="form-control autocomplete-input" id="num_ext" name="num_ext" placeholder="123" autocomplete="off" required>
                      <ul class="list-group autocomplete-suggestions"></ul>
                    </div>
                  </div>

                  <!-- Num. Int. -->
                  <div class="col-md-2">
                    <label for="num_int">Num. Int.:</label>
                    <div class="form-group">
                      <input type="text" class="form-control" id="num_int" name="num_int" placeholder="2B">
                    </div>
                  </div>
                
                 <!-- Tipo de Asentamiento Humano -->
<div class="col-md-4 autocomplete-container">
    <label for="tipo_asentamiento">Tipo de Asentamiento Humano:</label>
    <div class="form-group">
        <input type="text" id="tipo_asentamiento" name="tipo_asentamiento" class="form-control autocomplete-input" placeholder="Tipo de Asentamiento" autocomplete="off">
        <ul class="list-group autocomplete-suggestions"></ul>
    </div>
</div>

                  <!-- Nombre de asentamiento humano -->
                  <div class="col-md-4">
                    <label for="nombre_asentamiento">Nombre de asentamiento humano:</label>
                    <div class="form-group">
                      <input type="text" class="form-control" id="nombre_asentamiento" name="nombre_asentamiento"
                        placeholder="Benito Juárez" minlength="3" required>
                    </div>
                  </div>

                  <!-- Teléfono -->
                  <div class="col-md-4">
                    <label for="telefono">Teléfono:</label>
                    <div class="form-group">
                      <input type="text" class="form-control" id="telefono" name="telefono" placeholder="9621234567"
                        minlength="10" maxlength="10" required>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Estancia -->
              <div class="tab-pane" id="form2">
                <h5 class="info-text" id="estancia">Estancia</h5>
                <div class="row" id="estanciaRow1">
                                    <!-- Atención prehospitalaria -->
                                    <div class="col-md-4">
                    <label for="prehospitalaria">¿Recibió atención prehospitalaria?</label>
                    <div class="form-group">
                      <select id="prehospitalaria" class="selectpicker form-control" name="prehospitalaria" data-size="7" data-style="btn btn-primary" required onchange="toggleTiempoTraslado()">
                        <option disabled selected>Selección Única</option>
                        <option value="1">1. SI</option>
                        <option value="2">2. NO</option>
                      </select>
                    </div>
                  </div>

                  <!-- Tiempo de traslado a la unidad hospitalaria -->
                  <div class="col-md-4">
                    <label for="tiempo_traslado">Tiempo de traslado a la unidad hospitalaria:</label>
                    <div class="form-group">
                      <input type="text" id="tiempo_traslado" name="tiempo_traslado" class="form-control" value="HH:mm" required>
                    </div>
                  </div>
                  <!-- Fecha de ingreso -->
                  <div class="col-md-4">
                    <label for="fecha_ingreso">Fecha de ingreso:</label>
                    <div class="form-group">
                      <input type="text" class="form-control datepicker" id="fecha_ingreso" name="fecha_ingreso"
                        placeholder="DD/MM/YYYY" required>
                    </div>
                  </div>
                  <!-- hora de ingreso -->
                  <div class="col-md-4">
                    <label for="fecha_ingreso">hora de ingreso:</label>
                    <div class="hora-group">
                      <input type="text" class="form-control timepicker" id="hora_ingreso" name="hora_ingreso"
                        placeholder="HH:MM AM/PM" required>
                    </div>
                  </div>
                </div>

                <div class="row" id="estanciaRow2">
                  <!-- Tipo de urgencia -->
                  <div class="col-md-4">
                    <label for="tipo_urgencia">Tipo de urgencia:</label>
                    <div class="form-group">
                      <select class="selectpicker form-control" id="tipo_urgencia" name="tipo_urgencia" data-size="7"
                        data-style="btn btn-primary" title="Selección Única" required>
                        <option disabled selected>Selección Única</option>
                        <option value="1">Urgencia calificada</option>
                        <option value="2">Urgencia no calificada</option>
                      </select>
                    </div>
                  </div>
                  <!-- Motivo de atención -->
                  <div class="col-md-4">
                    <label for="motivo_atencion">Motivo de atención:</label>
                    <div class="form-group">
                      <select id="motivo_atencion" class="selectpicker form-control" name="motivo_atencion"
                        data-size="7" data-style="btn btn-primary" title="Selección Única" required>
                        <option value="0">Accidente, envenenamiento y violencia</option>
                        <option value="1">Médica</option>
                        <option value="2">Gineco-obstétrica</option>
                        <option value="3">Pediátrica</option>
                      </select>
                    </div>
                  </div>
                  <!-- Tipo de cama -->
                  <div class="col-md-4">
                    <label for="tipo_cama">Tipo de cama:</label>
                    <div class="form-group">
                      <select id="tipo_cama" class="selectpicker form-control" name="tipo_cama" data-size="7"
                        data-style="btn btn-primary" title="Selección Única" required>
                        <option value="0">Cama de observación</option>
                        <option value="1">Cama de choque</option>
                        <option value="2">Sin cama</option>
                      </select>
                    </div>
                  </div>
                </div>

                <div class="row" id="estanciaRow3">
                  <!-- Traslado transitorio -->
                  <div class="col-md-4">
                    <label for="traslado_transitorio">Traslado transitorio:</label>
                    <div class="form-group">
                      <select class="selectpicker form-control" id="traslado_transitorio" name="traslado_transitorio"
                        data-size="7" data-style="btn btn-primary" title="Selección Única" required>
                        <option disabled selected>Selección Única</option>
                        <option value="1">SI</option>
                        <option value="0">NO</option>
                      </select>
                    </div>
                  </div>
                  <!-- Nombre de la unidad -->
                  <div class="col-md-4">
                    <label for="nombre_unidad">Nombre de la unidad:</label>
                    <div class="form-group">
                      <input type="text" class="form-control" id="nombre_unidad" name="nombre_unidad"
                        placeholder="Hospital General" minlength="3" required
                        oninput="mostrarSugerenciasClues(this)" autocomplete="off"
                        onclick="mostrarSugerenciasClues(this)" onfocus="mostrarSugerenciasClues(this)"
                        onblur="ocultarSugerenciasClues()">
                        <div id="sugerencias_clues" class="sugerencias"
                        style="position: absolute; z-index: 1000; display: none; width: 100%; background-color: white; border: 1px solid #ced4da; max-height: 200px; overflow-y: auto; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
                      </div>
                    </div>
                  </div>
                  <!-- CLUES -->
                  <div class="col-md-4">
                    <label for="clues">CLUES:</label>
                    <div class="form-group">
                      <input type="text" class="form-control" id="clue" name="clue" placeholder="CSSSA006403">
                    </div>
                  </div>
                </div>

                <div class="row" id="estanciaRow4">
                  <!-- Fecha de alta -->
                  <div class="col-md-2">
                    <label for="fecha_alta">Fecha de alta:</label>
                    <div class="form-group">
                      <input type="text" class="form-control datetimepicker" id="fecha_alta" name="fecha_alta"
                        placeholder="DD/MM/YYYY" required>
                    </div>
                  </div>
                  <!-- hora de alta -->
                  <div class="col-md-2">
                    <label for="hora_alta">hora de alta:</label>
                    <div class="form-group">
                      <input type="text" class="form-control timepicker" id="hora_alta" name="hora_alta"
                        placeholder="HH:MM AM/PM" required>
                    </div>
                  </div>
                  <!-- Alta Por(Enviado A): -->
                  <div class="col-md-3 autocomplete-container">
                    <label for="alta_por">Alta Por(Enviado A):</label>
                    <div class="form-group">
                      <select name="Altapor" id="Alta_por" class="selectpicker form-control" title="Seleccion unica">
                        <option value="1">Hospitalización</option>
                        <option value="2">consulta externa</option>
                        <option value="3">Translado a otra unidad</option>
                        <option value="4">Domicilio</option>
                        <option value="5">Denfuncion</option>
                        <option value="6">Fuga</option>
                        <option value="7">Voluntad propia</option>
                      </select>
                    </div>
                  </div>

                  <div class="col-md-2" id="MinisPub" style="display: none;">
                    <label for="Mins">Ministerio publico</label>
                    <select name="Ministerio" id="Ministerio" class="selectpicker form-control" title="Seleccion unica">
                      <option value="1">si</option>
                      <option value="2">No</option>
                    </select>
                  </div>

                  <div class="col-md-3" id="folioDef" style="display: none;">
                    <label for="foliosDef">Folio del certificado</label>
                    <input type="text" class="form-control" id="folio_Defun" name="folio_Defun">
                  </div>

                  <!-- Mujer en edad fértil: -->
                  <div class="col-md-4" id="mujerFertilSection" style="display: none;">
                    <label for="mujer_edad_fertil">Mujer en edad fértil:</label>
                    <div class="form-group">
                      <select id="mujer_edad_fertil" class="selectpicker form-control" name="mujer_edad_fertil"
                        data-size="7" data-style="btn btn-primary" title="Selección Única" required>
                        <option value="0">Embarazo</option>
                        <option value="1">Puerperio (de 0 a 42 días después del evento obstétrico)</option>
                        <option value="2">No estaba embarazada ni en puerperio</option>
                      </select>
                    </div>
                  </div>

                <!-- Semanas de Gestación -->
                <div class="col-md-4" id="semanasGestacionSection" style="display: none;">
                    <label for="semanas_gestacion">Semanas de Gestación:</label>
                    <div class="form-group">
                      <input class="form-control" type="number" id="semanas_gestacion" name="semanas_gestacion" min="0" placeholder="Semanas de Gestación" required>
                    </div>
                  </div>
                </div>


                <!-- Afecciones Tratadas -->
                <div class="tab-pane" id="form3">
                  <h5 class="info-text" id="afeccionesTratadas">Afecciones Tratadas</h5>
                  <div class="row" id="afeccionesTratadasRow1">
                    <!-- Afección Principal -->
                    <div class="col-md-4">
                      <label for="afeccion_principal">Afección Principal:</label>
                      <div class="form-group">
                        <input type="text" id="afeccion_principal_input" class="form-control"
                          placeholder="Escribe para seleccionar" />
                        <ul id="sugerencias_afeccion" class="list-group"
                          style="position: absolute; z-index: 1000; display: none; width: 100%; background-color: white; border: 1px solid #ced4da; max-height: 200px; overflow-y: auto; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
                        </ul>
                      </div>
                    </div>

                    <!-- Comorbilidades -->
                    <div class="col-md-4">
                      <label for="comorbilidades">Comorbilidades:</label>
                      <div class="form-group">
                        <input type="text" id="comorbilidades_input" class="form-control"
                          placeholder="Escribe para seleccionar" />
                        <ul id="sugerencias_comorbilidades" class="list-group"
                          style="position: absolute; z-index: 1000; display: none; width: 100%; background-color: white; border: 1px solid #ced4da; max-height: 200px; overflow-y: auto; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
                        </ul>
                        <div id="selecciones_comorbilidades" class="mt-2"></div>
                      </div>
                    </div>

                    <!-- Causa Externa -->
                    <div class="col-md-4">
                      <label for="causa_externa">Causa Externa:</label>
                      <div class="form-group">
                        <input type="text" class="form-control" id="causa_externa" name="causa_externa"
                          placeholder="Accidente automovilístico" minlength="3" required>
                      </div>
                    </div>
                  </div>

                  <div class="row" id="afeccionesTratadasRow2">
                    <!-- Llenado de hoja de atención por violencia y/o lesión: -->
                    <div class="col-md-6">
                      <label for="llenado_hoja_lesion">Llenado de hoja de atención por violencia y/o lesión:</label>
                      <div class="form-group">
                        <select class="selectpicker form-control" id="llenado_hoja_lesion" name="llenado_hoja_lesion"
                          data-size="7" data-style="btn btn-primary" title="Selección Única" required>
                          <option disabled selected>Selección Única</option>
                          <option value="1">SI</option>
                          <option value="0">NO</option>
                        </select>
                      </div>
                    </div>

                    <!-- Folio de la hoja de lesiones -->
                    <div class="col-md-6">
                      <label for="folio_hoja_lesion">Folio de la hoja de lesiones:</label>
                      <div class="form-group">
                        <input type="text" class="form-control" id="folio_hoja_lesion" name="folio_hoja_lesion"
                          placeholder="123456" minlength="6" required>
                      </div>
                    </div>
                  </div>
                </div>
                </div>

                <!-- Interconsulta -->
                <div class="tab-pane" id="form4">
                  <h5 class="info-text" id="interconsulta">Interconsulta</h5>
                  <div class="row" id="interconsultaRow1">
                    <!-- Interconsulta -->
                    <div class="col-md-4">
                      <label for="interconsulta_select">Interconsulta:</label>
                      <div class="form-group">
                        <select class="selectpicker form-control" id="interconsulta_select" name="interconsulta_select"
                          data-size="7" data-style="btn btn-primary" title="Selección Única" required>
                          <option disabled selected>Selección Única</option>
                          <option value="1">SI</option>
                          <option value="0">NO</option>
                        </select>
                      </div>
                    </div>
                  </div>

                  <!-- Campos ocultos inicialmente -->
                  <div class="row" id="interconsultaRow2" style="display: none;">
                    <!-- Especialidad -->
                    <div class="col-md-4">
                      <label for="especialidad">Especialidad:</label>
                      <div class="form-group">
                        <input type="text" class="form-control" id="especialidad" name="especialidad"
                          placeholder="Traumatología" minlength="3" required>
                      </div>
                    </div>

                    <!-- Médica(o) Interconsultante -->
                    <div class="col-md-4">
                      <label for="medico_interconsultante">Médica(o) Interconsultante:</label>
                      <div class="form-group">
                        <input type="text" class="form-control" id="medico_interconsultante"
                          name="medico_interconsultante" placeholder="Dr. Juan Pérez Gómez" minlength="3" required>
                      </div>
                    </div>

                    <!-- Cédula o C.U.R.P -->
                    <div class="col-md-4">
                      <label for="cedula_curp">Cédula o C.U.R.P:</label>
                      <div class="form-group">
                        <input type="text" class="form-control" id="cedula_curp" name="cedula_curp"
                          placeholder="1234567890" minlength="10" required>
                      </div>
                    </div>
                  </div>
                

                <!-- Procedimientos -->
                <div class="tab-pane" id="form5">
                  <h5 class="info-text" id="procedimientos">Procedimientos</h5>
                  <div class="row" id="procedimientosRow1">
                    <!-- Procedimiento 1 -->
                    <div class="col-md-12">
                      <label for="procedimiento1">Procedimiento 1:</label>
                      <div class="form-group">
                        <input type="text" class="form-control" id="procedimiento1" name="procedimiento1"
                          placeholder="Reducción cerrada de fractura" minlength="3" required>
                      </div>
                    </div>
                  </div>

                  <div class="row" id="procedimientosRow2">
                    <!-- Procedimiento 2 -->
                    <div class="col-md-12">
                      <label for="procedimiento2">Procedimiento 2:</label>
                      <div class="form-group">
                        <input type="text" class="form-control" id="procedimiento2" name="procedimiento2"
                          placeholder="Inmovilización con yeso" minlength="3">
                      </div>
                    </div>
                  </div>

                  <div class="row" id="procedimientosRow3">
                    <!-- Procedimiento 3 -->
                    <div class="col-md-12">
                      <label for="procedimiento3">Procedimiento 3:</label>
                      <div class="form-group">
                        <input type="text" class="form-control" id="procedimiento3" name="procedimiento3"
                          placeholder="Procedimiento 3" minlength="3">
                      </div>
                    </div>
                  </div>

                  <div class="row" id="procedimientosRow4">
                    <!-- Procedimiento 4 -->
                    <div class="col-md-12">
                      <label for="procedimiento4">Procedimiento 4:</label>
                      <div class="form-group">
                        <input type="text" class="form-control" id="procedimiento4" name="procedimiento4"
                          placeholder="Procedimiento 4" minlength="3">
                      </div>
                    </div>
                  </div>

                  <div class="row" id="procedimientosRow5">
                    <!-- Procedimiento 5 -->
                    <div class="col-md-12">
                      <label for="procedimiento5">Procedimiento 5:</label>
                      <div class="form-group">
                        <input type="text" class="form-control" id="procedimiento5" name="procedimiento5"
                          placeholder="Procedimiento 5" minlength="3">
                      </div>
                    </div>
                  </div>
                </div>
                </div>

                <!-- Medicamentos Suministrados -->
                <div class="tab-pane" id="form6">
                  <h5 class="info-text" id="medicamentosSuministrados">Medicamentos Suministrados</h5>
                  <div class="row" id="medicamentosRow1">
                    <!-- Medicamento 1 -->
                    <div class="col-md-6">
                      <label for="medicamento1">Nombre generico:</label>
                      <div class="form-group">
                        <input type="text" class="form-control" id="medicamento1" name="medicamento1"
                          placeholder="Paracetamol 500mg" minlength="3" required
                          oninput="mostrarmedica1(this)" autocomplete="off"
                          onclick="mostrarmedica1(this)" onfocus="mostrarmedica1(this)"
                          onblur="ocultarSugerenciasmedic1()">
                          <div id="lista_medicamentos1" class="sugerencias_medicame"
                        style="position: absolute; z-index: 1000; display: none; width: 100%; background-color: white; border: 1px solid #ced4da; max-height: 200px; overflow-y: auto; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
                      </div>
                      </div>
                    </div>
                    <div class="col-md-5">
                      <label for="medicamneto1">Presentacion</label>
                      <div class="form-group">
                        <input type="text" class="form-control" id="present1" name="present1" autocomplete="off">
                        <div id="lista_presentaciones1" class="sugerencias_medicame"
                        style="position: absolute; z-index: 1000; display: none; width: 100%; background-color: white; border: 1px solid #ced4da; max-height: 200px; overflow-y: auto; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row" id="medicamentosRow2">
                    <!-- Medicamento 2 -->
                    <div class="col-md-6">
                      <label for="medicamento2">Nombre generico:</label>
                      <div class="form-group">
                        <input type="text" class="form-control" id="medicamento2" name="medicamento2"
                          placeholder="Diclofenaco 75mg" minlength="3"
                          oninput="mostrarmedica2(this)" autocomplete="off"
                          onclick="mostrarmedica2(this)" onfocus="mostrarmedica2(this)"
                          onblur="ocultarSugerenciasmedic2()">
                          <div id="lista_medicamentos2" class="sugerencias_medicame"
                        style="position: absolute; z-index: 1000; display: none; width: 100%; background-color: white; border: 1px solid #ced4da; max-height: 200px; overflow-y: auto; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
                      </div>
                      </div>
                    </div>
                    <div class="col-md-5">
                      <label for="medicamneto1">Presentacion</label>
                      <div class="form-group">
                        <input type="text" class="form-control" id="present2" name="present2" autocomplete="off">
                        <div id="lista_presentaciones2" class="sugerencias_medicame"
                        style="position: absolute; z-index: 1000; display: none; width: 100%; background-color: white; border: 1px solid #ced4da; max-height: 200px; overflow-y: auto; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row" id="medicamentosRow3">
                    <!-- Medicamento 3 -->
                    <div class="col-md-6">
                      <label for="medicamento3">Nombre generico:</label>
                      <div class="form-group">
                        <input type="text" class="form-control" id="medicamento3" name="medicamento3"
                          placeholder="Medicamento 3" minlength="3"
                          oninput="mostrarmedica3(this)" autocomplete="off"
                          onclick="mostrarmedica3(this)" onfocus="mostrarmedica3(this)"
                          onblur="ocultarSugerenciasmedic3()">
                          <div id="lista_medicamentos3" class="sugerencias_medicame"
                        style="position: absolute; z-index: 1000; display: none; width: 100%; background-color: white; border: 1px solid #ced4da; max-height: 200px; overflow-y: auto; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
                      </div>
                      </div>
                    </div>
                    <div class="col-md-5">
                      <label for="medicamneto1">Presentacion</label>
                      <div class="form-group">
                        <input type="text" class="form-control" id="present3" name="present3" autocomplete="off">
                        <div id="lista_presentaciones3" class="sugerencias_medicame"
                        style="position: absolute; z-index: 1000; display: none; width: 100%; background-color: white; border: 1px solid #ced4da; max-height: 200px; overflow-y: auto; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row" id="medicamentosRow4">
                    <!-- Medicamento 4 -->
                    <div class="col-md-6">
                      <label for="medicamento4">Nombre generico:</label>
                      <div class="form-group">
                        <input type="text" class="form-control" id="medicamento4" name="medicamento4"
                          placeholder="Medicamento 4" minlength="3"
                          oninput="mostrarmedica4(this)" autocomplete="off"
                          onclick="mostrarmedica4(this)" onfocus="mostrarmedica4(this)"
                          onblur="ocultarSugerenciasmedic4()">
                          <div id="lista_medicamentos4" class="sugerencias_medicame"
                        style="position: absolute; z-index: 1000; display: none; width: 100%; background-color: white; border: 1px solid #ced4da; max-height: 200px; overflow-y: auto; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
                      </div>
                      </div>
                    </div>
                    <div class="col-md-5">
                      <label for="medicamneto1">Presentacion</label>
                      <div class="form-group">
                        <input type="text" class="form-control" id="present4" name="present4" autocomplete="off">
                        <div id="lista_presentaciones4" class="sugerencias_medicame"
                        style="position: absolute; z-index: 1000; display: none; width: 100%; background-color: white; border: 1px solid #ced4da; max-height: 200px; overflow-y: auto; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row" id="medicamentosRow5">
                    <!-- Medicamento 5 -->
                    <div class="col-md-6">
                      <label for="medicamento5">Nombre generico:</label>
                      <div class="form-group">
                        <input type="text" class="form-control" id="medicamento5" name="medicamento5"
                          placeholder="Medicamento 5" minlength="3"
                          oninput="mostrarmedica5(this)" autocomplete="off"
                          onclick="mostrarmedica5(this)" onfocus="mostrarmedica5(this)"
                          onblur="ocultarSugerenciasmedic5()">
                          <div id="lista_medicamentos5" class="sugerencias_medicame"
                        style="position: absolute; z-index: 1000; display: none; width: 100%; background-color: white; border: 1px solid #ced4da; max-height: 200px; overflow-y: auto; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
                      </div>
                      </div>
                    </div>
                    <div class="col-md-5">
                      <label for="medicamneto1">Presentacion</label>
                      <div class="form-group">
                        <input type="text" class="form-control" id="present5" name="present5" autocomplete="off">
                        <div id="lista_presentaciones5" class="sugerencias_medicame"
                        style="position: absolute; z-index: 1000; display: none; width: 100%; background-color: white; border: 1px solid #ced4da; max-height: 200px; overflow-y: auto; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
                        </div>
                      </div>
                    </div>
                  </div>
              
                   <!-- Menores de 5 años  -->
              <div class="tab-pane" id="form6">
                  <h5 class="info-text" id="menores5años">Para Menores de 5 años </h5>
                  <div class="row" id="menoresRow1">
                    <!-- IRAS-->
                  <div class="col-md-5" id="menores5años">
                    <label for="menores_5_años">IRAS:</label>
                    <div class="form-group">
                      <select id="menores_5_años" class="selectpicker form-control" name="menores5años"
                        data-size="7" data-style="btn btn-primary" title="Selección Única" >
                        <option value="0">Sintomatico</option>
                        <option value="1">Con antibiotico</option>
                        <option value="2">Antivirales</option>
                      </select>
                    </div>
                  </div>
                  
                    <!-- EDAS  -->
                  <div class="col-md-5" id="SelectEdas" >
                    <label for="menores_5_años">EDAS:</label>
                    <div class="form-group">
                      <select id="TipoEDA" class="selectpicker form-control" name="menores_5_años"
                        data-size="7" data-style="btn btn-primary" title="Selección Única">
                        <option value="0"> A </option>
                        <option value="1"> B </option>
                        <option value="2"> C </option>
                      </select>
                    </div>
                  </div>

                  <div class="cold-md-2" id="SuEdas" style="display: none;">
                    <label for="Sueros">Numero de sobres</label>
                    <input type="text" class="form-control" id="nsobres">
                  </div>
                </div>
              </div>
            </div>
                

                <!-- Profesional de la Salud Responsable -->
                <div class="tab-pane" id="form7">
                  <h5 class="info-text" id="profesionalSaludResponsable">Profesional de la Salud Responsable</h5>
                  <div class="row" id="profesionalSaludResponsableRow1">
                    <!-- Nombre(s) -->
                    <div class="col-md-4">
                      <label for="nombre_responsable">Nombre(s):</label>
                      <div class="form-group">
                        <input type="text" class="form-control" id="nombre_responsable" name="nombre_responsable"
                          placeholder="Juan" minlength="3" required>
                      </div>
                    </div>

                    <!-- Primer Apellido -->
                    <div class="col-md-4">
                      <label for="primer_apellido_responsable">Primer Apellido:</label>
                      <div class="form-group">
                        <input type="text" class="form-control" id="primer_apellido_responsable"
                          name="primer_apellido_responsable" placeholder="Pérez" minlength="3" required>
                      </div>
                    </div>

                    <!-- Segundo Apellido -->
                    <div class="col-md-4">
                      <label for="segundo_apellido_responsable">Segundo Apellido:</label>
                      <div class="form-group">
                        <input type="text" class="form-control" id="segundo_apellido_responsable"
                          name="segundo_apellido_responsable" placeholder="Gómez" minlength="3" required>
                      </div>
                    </div>
                  </div>

                  <div class="row" id="profesionalSaludResponsableRow2">
                    <!-- C.U.R.P. -->
                    <div class="col-md-6">
                      <label for="curp_responsable">C.U.R.P.:</label>
                      <div class="form-group">
                        <input type="text" class="form-control" id="curp_responsable" name="curp_responsable"
                          placeholder="RAML850814HMCPLN07" minlength="18" maxlength="18" required>
                      </div>
                    </div>

                    <!-- Cédula Profesional -->
                    <div class="col-md-6">
                      <label for="cedula_profesional">Cédula Profesional:</label>
                      <div class="form-group">
                        <input type="text" class="form-control" id="cedula_profesional" name="cedula_profesional"
                          placeholder="12345678" maxlength="8" required>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-footer">
              <div class="pull-right">
                <button type="button" id="SaveData" class="btn btn-primary">Guardar datos</button>
                <input type='button' class='btn btn-next btn-fill btn-primary btn-wd' name='next' value='Siguiente' />
                <button type="button" id="guardarBtn" class="btn btn-finish btn-fill btn-primary btn-wd">Guardar</button>
                <!--<button type="submit" class="btn btn-finish btn-fill btn-primary btn-wd" name="finish">Guardar</button> -->
              </div>
              <div class="pull-left">
                <input type='button' class='btn btn-previous btn-fill btn-default btn-wd' name='previous'value='Anterior' />
              </div>

              <div class="clearfix"></div>
            </div>
        </form>
      </div>
    </div>
    <!-- Wizard container -->


  </div>
</div>
@endsection

@push('js')
  <script src="{{ asset('black/js/urgencias.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script>
    $(document).ready(function () {
    $('.datetimepicker').datetimepicker({
      format: 'DD/MM/YYYY'
    });

    $('#tiempo_traslado').datetimepicker({
      format: 'HH:mm' // Solo tiempo
    });

    $('#fecha_nacimiento').on('dp.change', function (e) {
      calculateAgeFromBirthdate();
    });

    $('#edad').on('input', function () {
      calculateBirthdateFromAge();
    });

    function calculateAgeFromBirthdate() {
      const birthdate = $('#fecha_nacimiento').data("DateTimePicker").date();
      if (birthdate) {
      const today = moment();
      const age = today.diff(birthdate, 'years');
      $('#edad').val(age);
      }
    }

    function calculateBirthdateFromAge() {
      const age = parseInt($('#edad').val());
      if (!isNaN(age)) {
      const birthdate = moment().subtract(age, 'years');
      $('#fecha_nacimiento').data("DateTimePicker").date(birthdate);
      }
    }
    });

    function setFormValidation(id) {
    $(id).validate({
      highlight: function (element) {
      $(element).closest('.form-group').removeClass('has-success').addClass('has-danger');
      $(element).closest('.form-check').removeClass('has-success').addClass('has-danger');
      },
      success: function (element) {
      $(element).closest('.form-group').removeClass('has-danger').addClass('has-success');
      $(element).closest('.form-check').removeClass('has-danger').addClass('has-success');
      },
      errorPlacement: function (error, element) {
      $(element).closest('.form-group').append(error);
      },
    });
    }

    $(document).ready(function () {
    setFormValidation('#RegisterValidation');
    setFormValidation('#TypeValidation');
    setFormValidation('#LoginValidation');
    setFormValidation('#RangeValidation');
    });

    $(document).ready(function () {
    // initialise Datetimepicker and Sliders
    blackDashboard.initDateTimePicker();
    if ($('.slider').length != 0) {
      demo.initSliders();
    }
    });

    $(document).ready(function () {
    // Initialise the wizard
    demo.initNowUiWizard();
    setTimeout(function () {
      $('.card.card-wizard').addClass('active');
    }, 600);
    });
  </script>

  
<script>
  //SOLO MUESTRA Y REINICIA LA PAGINA SIN GUARDAR EN LA BD
document.addEventListener('DOMContentLoaded', function() {
    // Evento click para el botón "Guardar"
    document.getElementById('guardarBtn').addEventListener('click', function(event) {
        // Prevenir el envío del formulario
        event.preventDefault();

        // Mostrar el SweetAlert de éxito
        Swal.fire({
            icon: 'success',
            title: 'Éxito',
            text: 'Los datos han sido guardados existosamente.',
            timer: 3000,
            showConfirmButton: false
        }).then(() => {
            // Recargar la página después de que el alert desaparezca
            location.reload();
        });
    });
});
</script>

@endpush