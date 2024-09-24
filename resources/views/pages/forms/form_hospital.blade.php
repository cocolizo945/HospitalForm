@extends('layouts.app', ['activePage' => 'form_hospital', 'menuParent' => 'forms', 'titlePage' => __('Hospital Forms')])

@section('content')



<div class="content">
  <!-- Logos Section -->
  <div class="row mb-4">
    <div class="col-md-12 text-center">
      <img src="{{ asset('images/gobierno-de-mexico-logo-E93B4BEE41-seeklogo.com 1.png') }}" alt="Gobierno de México" style="max-height: 100px; margin-right: 20px;">
      <img src="{{ asset('images/secretaria-salud-gobierno-federal-mexico-2020-logo-A3F6F47C9C-seeklogo.com 2.png') }}" alt="Secretaría de Salud" style="max-height: 100px; margin-right: 20px;">
    </div>
  </div>
  <div class="col-md-10 mr-auto ml-auto">
    <!-- Mostrar mensajes de error -->
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
        <form id="RangeValidation" method="POST" action="{{ route('formulario.store') }}">
          @csrf
          <div class="card-header text-center">
            <h3 class="card-title">
              HOJA DE REGISTRO DE ATENCIÓN POR VIOLENCIA Y/O LESIÓN
            </h3>
            <div class="wizard-navigation">
              <div class="progress-with-circle">
                <div class="progress-bar" role="progressbar" aria-valuenow="1" aria-valuemin="1" aria-valuemax="4" style="width: 21%;"></div>
              </div>
              <ul>
                <li class="nav-item">
                  <a class="nav-link active" href="#folio" data-toggle="tab">
                    <i class="tim-icons icon-single-copy-04"></i>
                    <p>Folió</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#about" data-toggle="tab">
                    <i class="tim-icons icon-single-02"></i>
                    <p>Paciente Afectada(o)</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#account" data-toggle="tab">
                    <i class="tim-icons icon-settings-gear-63"></i>
                    <p>Evento</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#address" data-toggle="tab">
                    <i class="tim-icons icon-delivery-fast"></i>
                    <p>Atención</p>
                  </a>
                </li>
              </ul>
            </div>
          </div>
          <div class="card-body">
            <div class="tab-content">
              <div class="tab-pane show active" id="folio">
              <h5 class="info-text" id='response-container'>Folio</h5>
                <div class="row">
                  <!-- CLUES -->
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

              <!-- Paciente Afectada(o) -->
              <div class="tab-pane" id="about">
                <h5 class="info-text">Información del Paciente</h5>
                <h5 class="info-text"> Folio actual:</h5>
                <h5 class="info-text" id="response-container2"></h5>
                <div class="row">
                  <!-- Nombre -->
                  <div class="col-md-4">
                    <label for="nombre">Nombre:</label>
                    <div class="form-group">
                      <input type="text" id="nombre" name="nombre" minLength="3" class="form-control" placeholder="Nombre" required>
                    </div>
                  </div>
                  <!-- Primer apellido -->
                  <div class="col-md-4">
                    <label for="primer_apellido">Primer apellido:</label>
                    <div class="form-group">
                      <input type="text" id="primer_apellido" name="primer_apellido" minLength="2" class="form-control" placeholder="Primer Apellido" required>
                    </div>
                  </div>
                  <!-- Segundo apellido -->
                  <div class="col-md-4">
                    <label for="segundo_apellido">Segundo apellido:</label>
                    <div class="form-group">
                      <input type="text" id="segundo_apellido" name="segundo_apellido" minLength="2" class="form-control" placeholder="Segundo Apellido" >
                    </div>
                  </div>
                  <!-- C.U.R.P. -->
                  <div class="col-md-4">
                    <label for="curp">C.U.R.P.:</label>
                    <div class="form-group">
                      <input type="text" id="curp" name="curp" maxLength="18" class="form-control" placeholder="Solo 18 caracteres" style="text-transform: uppercase" required>
                      <span id="curp-validacion" style="color: red; display: none;">CURP inválida</span>
                    </div>
                  </div>
                  <!-- Fecha de Nacimiento -->
                  <div class="col-md-4">
                    <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
                    <div class="form-group">
                      <input type="text" id="fecha_nacimiento" name="fecha_nacimiento" class="form-control datepicker" placeholder="fecha" required>
                    </div>
                  </div>
                  <!-- Entidad o País de Nacimiento -->
               
            <div class="col-md-4">
                <label for="entidad_nacimiento">Entidad o País de Nacimiento:</label>
                <div class="form-group">
                    <input type="text" id="entidad_nacimiento" name="entidad_nacimiento" class="form-control" placeholder="País" autocomplete="off" required>
                    <ul id="sugerencias_entidad_nacimiento" class="list-group autocomplete-suggestions"></ul>
                </div>
            </div>


                  <!-- Edad -->
                  <div class="col-md-4">
                    <label for="edad">Edad:</label>
                    <div class="form-group">
                      <input class="form-control" type="number" id="edad" name="edad" min="0" placeholder="Años" required>
                    </div>
                  </div>
                  <!-- Sexo -->
                  <div class="col-md-4">
                    <label for="sexo">Sexo:</label>
                    <div lass="form-group">
                        <input type="radio" id="sexo_masculino" name="sexo" value="1" required>
                        <label for="sexo_masculino">1. Masculino</label>
                        <input type="radio" id="sexo_femenino" name="sexo" value="2">
                        <label for="sexo_femenino">2. Femenino</label>
                    </div>
                    <div><input type="radio" id="sexo_intersexual" name="sexo" value="3">
                    <label for="sexo_intersexual">3. Intersexual</label></div>
                  </div>
                  <!-- Afiliación a los Servicios de Salud -->
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
                  <!-- Gratuidad -->
                  <div class="col-md-4">
                 
  <label for="gratuidad">Gratuidad:</label>
  <div class="form-group">
    <input type="radio" id="gratuidad_si" name="gratuidad" value="1" required>
    <label for="gratuidad_si">1. SI</label>
    <input type="radio" id="gratuidad_no" name="gratuidad" value="2">
    <label for="gratuidad_no">2. NO</label>
  </div>
  

                  </div>
                  <!-- Escolaridad -->
                  <div class="col-md-4">
                    <label for="escolaridad">Escolaridad:</label>
                    <div class="form-group">
                    <select id="escolaridad" class="selectpicker form-control" name="escolaridad" required>
                    <option disabled selected>Selección Única</option>
                    <option value="Ninguna">Ninguna</option>
                    <option value="Primaria">Primaria</option>
                    <option value="Secundaria">Secundaria</option>
                    <option value="Bachillerato o preparatoria">Bachillerato o preparatoria</option>
                    <option value="Profesional">Profesional</option>
                    <option value="Posgrado">Posgrado</option>
                    <option value="Se ignora">Se ignora</option>
                    </select>
                    </div>
                  </div>
                  <!-- Escolaridad Seleccionada -->
                  <div class="col-md-4" id="escolaridad_seleccionada" style="display: none;">
                    <label for="escolaridad_seleccionada">Escolaridad Seleccionada:</label>
                    <div class="form-group">
                      <select id="escolaridad_seleccionada" class="selectpicker form-control" name="escolaridad_seleccionada" data-size="7" data-style="btn btn-primary" required>
                        <option disabled selected>Selección Única</option>
                        <option value="1">1. Completa</option>
                        <option value="2">2. Incompleta</option>
                      </select>
                    </div>
                  </div>
                  <!-- Sabe Leer y Escribir -->

                  <div class="col-md-4">
                    <label for="leer_escribir">Sabe Leer y Escribir:</label>
                      <div lass="form-group">
                        <input type="radio" id="leer&escribir_si" name="leer&escribir" value="1" required>
                        <label for="leer&escribir_si">1. SI</label>
                        <input type="radio" id="leer&escribir_no" name="leer&escribir" value="2">
                        <label for="leer&escribir_no">2. NO</label>
                      </div>                  

                  </div>
                  <!-- ¿Se Considera Indígena? -->
                  <div class="col-md-4">
                    <label for="indigena">¿Se Considera Indígena?</label>
                    <div lass="form-group">
                        <input type="radio" id="indigena_si" name="indigena" value="1" required>
                        <label for="indigena_si">1. SI</label>
                        <input type="radio" id="indigena_no" name="indigena" value="2">
                        <label for="indigena_no">2. NO</label>
                      </div>
                  </div>
                  <!-- ¿Habla alguna Lengua Indígena? -->
                  <div class="col-md-4">
                    <label for="lengua_indigena">¿Habla alguna Lengua Indígena?</label>
                    <div lass="form-group">
                        <input type="radio" id="engua_indigena_si" name="lengua_indigena" value="1" required>
                        <label for="lengua_indigena_si">1. SI</label>
                        <input type="radio" id="lengua_indigena_no" name="lengua_indigena" value="2">
                        <label for="lengua_indigena_no">2. NO</label>
                    </div>
                  </div>
                  <!-- ¿Cuál? -->
                  <div class="col-md-4" id="cualLenguaSection" style="display: none;">
                    <label for="cual_lengua">¿Cuál?</label>
                    <div class="form-group">
                      <input type="text" id="cual_lengua" name="cual_lengua" class="form-control" placeholder="Especifique">
                    </div>
                  </div>
                  <!-- ¿Se considera Afrodescendiente? -->
                  <div class="col-md-4">
                    <label for="afrodescendiente">¿Se considera Afrodescendiente?</label>
                    <div lass="form-group">
                        <input type="radio" id="afrodescendiente_si" name="afrodescendiente" value="1" required>
                        <label for="afrodescendiente_si">1. SI</label>
                        <input type="radio" id="afrodescendiente_no" name="afrodescendiente" value="2">
                        <label for="afrodescendiente_no">2. NO</label>
                    </div>
                  </div>
                     <!-- Select para ¿Es Migrante Retornado? -->
                     <div class="col-md-4">
                    <label for="migrante">¿Es Migrante Retornado?</label>
                    <div class="form-group">
                      <select id="migrante" class="selectpicker form-control" name="migrante" data-size="7" data-style="btn btn-primary" required>
                        <option disabled selected>Selección Única</option>
                        <option value="1">1. SI</option>
                        <option value="2">2. NO</option>
                        <option value="9">3.NO APLICA</option>
                      </select>
                    </div>
                  </div>
                  <!-- Mujer en Edad Fértil -->
                  <div class="col-md-4" id="mujerFertilSection" style="display: none;">
                    <label for="mujer_fertil">Mujer en Edad Fértil:</label>
                    <div class="form-group">
                      <select id="mujer_fertil" class="selectpicker form-control" name="mujer_fertil" data-size="7" data-style="btn btn-primary" required>
                        <option disabled selected>Selección Única</option>
                        <option value="1">1. Embarazo</option>
                        <option value="2">2. Puerperio (de 0 a 42 días después del evento obstétrico)</option>
                        <option value="3">3. No estaba embarazada ni en el puerperio</option>
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
                  <!-- Dificultad (Discapacidad) -->
                  <div class="col-md-4">
                    <label for="discapacidad">Dificultad (Discapacidad):</label>
                    <div class="form-group">
                      <select id="discapacidad" class="selectpicker form-control" name="discapacidad" data-size="7" data-style="btn btn-primary" required>
                        <option disabled selected>Selección Única</option>
                        <option value="1">1. SI</option>
                        <option value="2">2. NO</option>
                        <option value="3">3. SE IGNORA</option>
                      </select>
                    </div>
                  </div>
                  <!-- Referida(o) por -->
                  <!-- Referida(o) por -->
                  <div class="col-md-4">
                    <label for="referido_por">Referida(o) por:</label>
                    <div class="form-group">
                      <input type="text" id="referido_por" name="referido_por" class="form-control"
                        placeholder="Seleccion unica" autocomplete="off" required>
                      <ul id="referido_sugg" class="list-group autocomplete-suggestions"></ul>
                    </div>
                  </div>


                  <!-- Unidad Médica Especifique Nombre -->
                  <div class="col-md-4" id="unidadMedicaEspecifique" style="display: none;">
                    <label for="unidad_medica">Nombre (Unidad Médica):</label>
                    <div class="form-group">
                      <input type="text" id="unidad_medica" name="unidad_medica" class="form-control" placeholder="Nombre de la Unidad Médica">
                    </div>
                  </div>
                  <!-- CLUES -->
                  <div class="col-md-4" id="cluesU" style="display: none;">
                  <label for="cluesU">Especifique su CLUES:</label>
                  <div class="form-group">
                      <input type="text" id="cluesU" name="cluesU" class="form-control" placeholder="Selecciona una CLUES" autocomplete="off" />
                      <ul id="cluesU_suggestions" class="list-group" style="position: absolute; z-index: 1000; display: none; width: 100%; background-color: white; border: 1px solid #ced4da; max-height: 200px; overflow-y: auto; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
                      </ul>
                  </div>
              </div>
                </div>
              </div>
              <!-- Evento -->
              <div class="tab-pane" id="account">
                <h5 class="info-text">Información del Evento</h5>
                <div class="row">
                  <!-- Fecha de Ocurrencia -->
                  <div class="col-md-4">
                    <label for="fecha_ocurrencia">Fecha de Ocurrencia:</label>
                    <div class="form-group">
                      <input type="text" id="fecha_ocurrencia" name="fecha_ocurrencia" class="form-control datepicker" placeholder="dd/mm/yyyy" required>
                    </div>
                  </div>

                  <!-- hora de Ocurrencia -->
                  <div class="col-md-4">
                    <label for="hora_ocurrencia">hora de Ocurrencia:</label>
                    <div class="form-group">
                      <input type="text" id="hora_ocurrencia" name="hora_ocurrencia" class="form-control timepicker" placeholder="hh:mm AM/PM" required>
                    </div>
                  </div>

                  <!-- ¿Fue día festivo? -->
                  <div class="col-md-4">
                    <label for="festivo">¿Fue día festivo?</label>
                    <div lass="form-group">
                        <input type="radio" id="festivo_si" name="festivo" value="1" required>
                        <label for="festivo_si">1. SI</label>
                        <input type="radio" id="festivo_no" name="festivo" value="2">
                        <label for="festivo_no">2. NO</label>
                    </div>
                  </div>
                  <!-- Sitio de Ocurrencia -->
                  <div class="col-md-4">
                   <label for="sitio_ocurrencia">Sitio de Ocurrencia:</label>
                    <div class="form-group">
                     <input id="sitio_ocurrencia_input" type="text" class="form-control" placeholder="Escriba para buscar..." required>
                      <ul id="suggestions_list" class="list-group autocomplete-suggestions"></ul>
                    </div>
                  </div>

                  <!-- Campo de texto para especificar otro lugar -->
                  <div class="col-md-4" id="otroLugarEspecifique" style="display: none;">
                    <label for="otro_lugar">Especifique:</label>
                    <div class="form-group">
                      <input type="text" id="otro_lugar" name="otro_lugar" class="form-control" placeholder="Sitio de ocurrencia">
                    </div>
                  </div>

                 <!-- Entidad Federativa/País -->
<div class="col-md-4">
  <label for="entidad_pais">Entidad Federativa/País:</label>
  <div class="form-group">
    <input type="text" id="entidad_pais" name="entidad_pais" class="form-control" placeholder="Entidad Federativa o País" oninput="mostrarSugerencias(this, 'entidades')" autocomplete="off" onclick="mostrarSugerencias(this, 'entidades')" onfocus="mostrarSugerencias(this, 'entidades')" onblur="ocultarSugerencias('sugerencias_entidad_pais')">
    <div id="sugerencias_entidad_pais" class="sugerencias"style="position: absolute; z-index: 1000; display: none; width: 100%; background-color: white; border: 1px solid #ced4da; max-height: 200px; overflow-y: auto; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);"></div>
  </div>
</div>

<!-- Municipio o alcaldía -->
<div class="col-md-4">
  <label for="municipio">Municipio o alcaldía:</label>
  <div class="form-group">
    <input type="text" id="municipio" name="municipio" class="form-control" placeholder="Municipio o Alcaldía" oninput="mostrarSugerencias(this, 'municipios')" autocomplete="off" onclick="mostrarSugerencias(this, 'municipios')" onfocus="mostrarSugerencias(this, 'municipios')" onblur="ocultarSugerencias('sugerencias_municipio')">
    <div id="sugerencias_municipio" class="sugerencias"style="position: absolute; z-index: 1000; display: none; width: 100%; background-color: white; border: 1px solid #ced4da; max-height: 200px; overflow-y: auto; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);"></div>
  </div>
</div>

<!-- Localidad -->
<div class="col-md-4">
  <label for="localidad">Localidad:</label>
  <div class="form-group">
    <input type="text" id="localidad" name="localidad" class="form-control" placeholder="Localidad" oninput="mostrarSugerencias(this, 'localidades')" autocomplete="off" onclick="mostrarSugerencias(this, 'localidades')" onfocus="mostrarSugerencias(this, 'localidades')" onblur="ocultarSugerencias('sugerencias_localidad')">
    <div id="sugerencias_localidad" class="sugerencias"style="position: absolute; z-index: 1000; display: none; width: 100%; background-color: white; border: 1px solid #ced4da; max-height: 200px; overflow-y: auto; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);"></div>
  </div>
</div>
                  <!-- Código Postal -->
                  <div class="col-md-4">
                    <label for="codigo_postal">Código Postal:</label>
                    <div class="form-group">
                      <input type="text" id="codigo_postal" name="codigo_postal" class="form-control" placeholder="Código Postal"/>
                    </div>
                  </div>
                  
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
                      <input type="text" id="nombre_vialidad" name="nombre_vialidad" class="form-control" placeholder="Nombre de la Vialidad">
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
                  <div class="col-md-4">
                    <label for="num_int">Num. Int.:</label>
                    <div class="form-group">
                      <input type="text" id="num_int" name="num_int" class="form-control" placeholder="Número Interior">
                    </div>
                  </div>
                  <!-- Tipo de asentamiento humano -->
                  <div class="col-md-4 autocomplete-container">
                  <label for="tipo_asentamiento">Tipo de asentamiento humano:</label>
                  <div class="form-group">
                      <input type="text" id="tipo_asentamiento" name="tipo_asentamiento" class="form-control autocomplete-input" placeholder="Tipo de Asentamiento Humano" autocomplete="off">
                      <ul class="list-group autocomplete-suggestions"></ul>
                      </div>
                  </div>

                  <!-- Nombre de asentamiento humano -->
                  <div class="col-md-4">
                    <label for="nombre_asentamiento">Nombre de asentamiento humano:</label>
                    <div class="form-group">
                      <input type="text" id="nombre_asentamiento" name="nombre_asentamiento" class="form-control" placeholder="Nombre de Asentamiento Humano">
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-12">
                      <h4 class="card-title-hospital"></h4>
                  </div>
                  <!-- Intencionalidad del evento -->
                  <div class="col-md-4">
                    <label for="intencionalidad_evento">Intencionalidad del evento:</label>
                    <div class="form-group">
                      <select id="intencionalidad_evento" class="selectpicker form-control" name="intencionalidad_evento" data-size="7" data-style="btn btn-primary" required>
                        <option disabled selected>Selección Única</option>
                        <option value="1">1. Accidental</option>
                        <option value="2">2. Violencia familiar</option>
                        <option value="3">3. Violencia No familiar</option>
                        <option value="4">4. Autoinfligido</option>
                        <option value="5">5. Trata de personas</option>
                      </select>
                    </div>
                  </div>
                  <!-- Agente de la Lesión -->
                  <div class="col-md-4">
                  <label for="agente_lesion">Agente de la Lesión:</label>
                  <div class="form-group">
                      <input list="agente_lesion_list" id="agente_lesion_input" name="agente_lesion" class="form-control" placeholder="Agente de la Lesión" required />
                      <ul id="sugerencias" class="list-group" style="position: absolute; z-index: 1000; display: none; width: 100%; background-color: white; border: 1px solid #ced4da; max-height: 200px; overflow-y: auto; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
                      </ul>
                      </div>
                  </div>

                  <div class="col-md-4" id="agenteEspecifique" style="display: none;">
                    <label for="agente_especifique">Especifique:</label>
                    <div class="form-group">
                      <input type="text" id="agente_especifique" name="agente_especifique" class="form-control" placeholder="Agente de lesión">
                    </div>
                  </div>
                  <!-- ¿Recibió atención prehospitalaria? -->
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

                 <div class="col-md-4 autocomplete-container">
                  <label for="efectos_paciente">Se sospecha que la/el paciente estaba bajo los efectos de:</label>
                  <div class="form-group">
                    <input type="text" id="efectos_paciente" name="efectos_paciente" class="form-control autocomplete-input" placeholder="Escribe para seleccionar" autocomplete="off">
                    <ul class="list-group autocomplete-suggestions"></ul>
                    <div id="seleccion_efectos_paciente" class="mt-2"></div>

                  </div>
                </div>            
                  <!-- En caso de evento autoinfligido, el evento ocurrió -->
                  <div class="col-md-4">
                      <label for="evento_autoinfligido">El evento ocurrió:</label>
                      <div class="form-group">
                        <select id="evento_autoinfligido" class="selectpicker form-control" name="evento_autoinfligido"
                          required>
                          <option disabled selected>Selección Única</option>
                          <option value="Única vez">Única vez</option>
                          <option value="Repetido">Repetido</option>
                        </select>
                      </div>
                    </div>
                </div>
                
              <div id="accidenteSection" style="display: none;">
                <div class="row">
                  <!-- ACCIDENTE -->
                  <div class="col-md-12">
                    <h4 class="card-title-hospital">ACCIDENTE</h4>
                  </div>
                  <!-- Si la causa fue accidente de vehículo de motor -->
                  <div class="col-md-4">
                    <label for="accidente_motor">Si la causa fue accidente de vehículo de motor:</label>
                    <div lass="form-group">
                        <input type="radio" id="accidente_motor_si" name="accidente_motor" value="1" required>
                        <label for="accidente_motor_si">1. SI</label>
                        <input type="radio" id="accidente_motor_no" name="accidente_motor" value="2">
                        <label for="accidente_motor_no">2. NO</label>
                    </div>
                  </div>
                  <!-- La/El lesionado es -->
                  <div class="col-md-4">
                    <label for="lesionado">La/El lesionado es:</label>
                    <div class="form-group">
                      <select id="lesionado" class="selectpicker form-control" name="lesionado" data-size="7" data-style="btn btn-primary" required>
                        <option disabled selected>Selección Única</option>
                        <option value="0">1. Conductor</option>
                        <option value="1">2. Ocupante</option>
                        <option value="2">3. Peatón</option>
                      </select>
                    </div>
                  </div>
                  <!-- Uso equipo de Seguridad -->
                  <div class="col-md-4">
                    <label for="equipo_seguridad">Uso equipo de Seguridad:</label>
                    <div class="form-group">
                      <select id="equipo_seguridad" class="selectpicker form-control" name="equipo_seguridad" data-size="7" data-style="btn btn-primary" required>
                        <option disabled selected>Selección Única</option>
                        <option value="0">1. Si</option>
                        <option value="1">2. No</option>
                        <option value="2">3. Se ignora</option>
                      </select>
                    </div>
                  </div>
                  <!-- ¿Qué tipo de seguridad utilizó? -->
                  <div class="col-md-4">
                    <label for="tipo_seguridad">¿Qué tipo de seguridad utilizó?</label>
                    <div class="form-group">
                    <select id="tipo_seguridad" class="selectpicker form-control" name="tipo_seguridad" required>
                    <option disabled selected>Selección Única</option>
                    <option value="Cinturón de seguridad">Cinturón de seguridad</option>
                    <option value="Casco">Casco</option>
                    <option value="Sillín porta infante">Sillín porta infante</option>
                    <option value="Otro (Especifique)">Otro (Especifique)</option>
                    </select>
                    </div>
                  </div>
                
                  <div class="col-md-4" id="seguridadEspecifique" style="display: none;">
                      <label for="seguridad_especifique">Especifique:</label>
                      <div class="form-group">
                        <input type="text" id="seguridad_especifique" name="seguridad_especifique" class="form-control" placeholder="Tipo de seguridad">
                      </div>
                    </div>
                  </div>
                </div>

                <div id="violenciaSection" style="display: none;">
                <div class="row">
                  <!-- VIOLENCIA -->
                  <div class="col-md-12">
                    <h4 class="card-title-hospital">VIOLENCIA</h4>
                  </div>
                  <!-- Tipo de Violencia -->
                  <div class="col-md-4">
                    <label for="tipo_violencia">Tipo de Violencia:</label>
                    <div class="form-group">
                    <select id="tipo_violencia" class="selectpicker form-control" name="tipo_violencia" required>
                    <option disabled selected>Selección Única</option>
                    <option value="Violencia física">Violencia física</option>
                    <option value="Violencia sexual">Violencia sexual</option>
                    <option value="Violencia psicológica">Violencia psicológica</option>
                    <option value="Violencia económica/patrimonial">Violencia económica/patrimonial</option>
                    <option value="Abandono y/o negligencia">Abandono y/o negligencia</option>
                    </select>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <!-- AGRESOR -->
                  <div class="col-md-12">
                    <h4 class="card-title-hospital">AGRESOR:</h4>
                  </div>
                  <!-- Num. Agresores -->
                  <div class="col-md-4">
                    <label for="num_agresores">Num. Agresores:</label>
                    <div class="form-group">
                    <select id="num_agresores" class="selectpicker form-control" name="num_agresores" required>
                    <option disabled selected>Selección Única</option>
                    <option value="Única">Única</option>
                    <option value="Más de una(o)">Más de una(o)</option>
                    </select>
                    </div>
                  </div>
                  <!-- Parentesco con la/el afectada(o) -->
                  <div class="col-md-4">
                    <label for="parentesco">Parentesco con la/el afectada(o):</label>
                    <div class="form-group">
                      <input type="text" id="parentesco" name="parentesco" class="form-control" placeholder="Parentesco">
                    </div>
                  </div>
                  <!-- Sexo del agresor(a) -->
                  <div class="col-md-4">
                    <label for="sexo_agresor">Sexo del agresor(a):</label>
                    <div lass="form-group">
                        <input type="radio" id="sexo_agresor_si" name="sexo_agresor" value="1" required>
                        <label for="sexo_agresor_si">1. Masculino</label>
                        <input type="radio" id="sexo_agresor_no" name="sexo_agresor" value="2">
                        <label for="sexo_agresor_no">2. Femenino</label>
                    </div>
                  </div>
                  <!-- Edad del agresor(a) (años) -->
                  <div class="col-md-4">
                    <label for="edad_agresor">Edad del agresor(a):</label>
                    <div class="form-group">
                      <input class="form-control" type="number" id="edad_agresor" name="edad_agresor" min="0" placeholder="Años">
                    </div>
                  </div>

                  <div class="col-md-4 autocomplete-container">
                  <label for="efectos_agresor">El/La agresor(a) se sospecha que actuó bajo los efectos de:</label>
                  <div class="form-group">
                    <input type="text" id="efectos_agresor" name="efectos_agresor" class="form-control autocomplete-input" placeholder="Escribe para seleccionar" autocomplete="off">
                    <ul class="list-group autocomplete-suggestions"></ul>
                    <div id="seleccion_efectos_agresor" class="mt-2"></div>
                  </div>
                </div>
                  <!-- Campo de efectos del agresor -->
                </div>
              </div>
            </div>

              <!-- Atención -->
              <div class="tab-pane" id="address">
                <h5 class="info-text">Información de la Atención</h5>
                <div class="row">
                  <!-- Fecha de Atención -->
                  <div class="col-md-4">
                    <label for="fecha_atencion">Fecha de Atención:</label>
                    <div class="form-group">
                      <input type="text" id="fecha_atencion" name="fecha_atencion" class="form-control datepicker" placeholder="dd/mm/yyyy" required>
                    </div>
                  </div>
                  <!-- Hora de Atención -->
                  <div class="col-md-4">
                    <label for="hora_atencion">Hora de Atención:</label>
                    <div class="form-group">
                      <input type="text" id="hora_atencion" name="hora_atencion" class="form-control timepicker" placeholder="hh:mm AM/PM" required>
                    </div>
                  </div>
                  <!-- Servicio que otorgó la atención -->
                  <div class="col-md-4 autocomplete-container">
                    <label for="servicio_atencion">Servicio que otorgó la atención:</label>
                    <div class="form-group">
                      <input type="text" id="servicio_atencion" name="servicio_atencion" class="form-control autocomplete-input" placeholder="Servicio de atención" autocomplete="off" required>
                      <ul class="list-group autocomplete-suggestions"></ul>
                      </div>
                  </div>

                  <div class="col-md-4" id="servicioEspecifique" style="display: none;">
                      <label for="servicio_especifique">Especifique:</label>
                      <div class="form-group">
                          <input type="text" id="servicio_especifique" name="servicio_especifique" class="form-control" placeholder="Servicio que otorgó la atención">
                      </div>
                  </div>

                  <!-- Tipo de atención -->
                  <div class="col-md-4">
                    <label for="tipo_atencion">Tipo de atención:</label>
                    <div class="form-group">
                      <input type="text" id="tipo_atencion" class="form-control" placeholder="Tipo de atención"/>
                      <ul id="sugerencias_tipoA"class="list-group"
                      style="position: absolute; z-index: 1000; display: none; width: 100%; background-color: white; border: 1px solid #ced4da; max-height: 200px; overflow-y: auto; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);"></ul>
                      <div id="selecciones_tipoA" class="mt-2"></div>
                    </div>
                  </div>
                  <!-- Área Anatómica de Mayor Gravedad -->
                  <div class="col-md-4 autocomplete-container">
                    <label for="area_gravedad">Área Anatómica de Mayor Gravedad:</label>
                    <div class="form-group">
                      <input type="text" id="area_gravedad" name="area_gravedad" class="form-control autocomplete-input" placeholder="Areá de gravedad" autocomplete="off" required>
                      <ul class="list-group autocomplete-suggestions"></ul>
                    </div>
                  </div>

                  <div class="col-md-4" id="areaGravedadEspecifique" style="display: none;">
                      <label for="area_gravedad_especifique">Especifique:</label>
                      <div class="form-group">
                          <input type="text" id="area_gravedad_especifique" name="area_gravedad_especifique" class="form-control" placeholder="Área Anatómica de Mayor Gravedad">
                      </div>
                  </div> 

                  <!-- Consecuencia Resultante de Mayor Gravedad -->
                  <div class="col-md-4 autocomplete-container">
                    <label for="consecuencia_gravedad">Consecuencia Resultante de Mayor Gravedad:</label>
                    <div class="form-group">
                      <input type="text" id="consecuencia_gravedad" name="consecuencia_gravedad" class="form-control autocomplete-input" placeholder="Areá de gravedad" autocomplete="off" required>
                      <ul class="list-group autocomplete-suggestions"></ul>
                    </div>
                  </div>

                  <div class="col-md-4" id="consecuenciaGravedadEspecifique" style="display: none;">
                      <label for="consecuencia_gravedad_especifique">Especifique:</label>
                      <div class="form-group">
                          <input type="text" id="consecuencia_gravedad_especifique" name="consecuencia_gravedad_especifique" class="form-control" placeholder="Consecuencia Resultante de Mayor Gravedad">
                      </div>
                  </div>

                  <!-- Afección principal -->
                  <div class="col-md-4">
                    <label for="afeccion_principal">Afección principal:</label>
                    <div class="form-group">
                      <input type="text" id="afeccion_principal" name="afeccion_principal" class="form-control" placeholder="Afección Principal">
                    </div>
                  </div>
                  <!-- Causa Externa -->
                  <div class="col-md-4">
                    <label for="causa_externa">Causa Externa:</label>
                    <div class="form-group">
                      <input type="text" id="causa_externa" name="causa_externa" class="form-control" placeholder="Causa Externa">
                    </div>
                  </div>
                  <!-- ¿Se dió aviso al Ministerio Público? -->
                  <div class="col-md-4">
                    <label for="aviso_ministerio">¿Se dió aviso al Ministerio Público?</label>
                    <div lass="form-group">
                        <input type="radio" id="aviso_ministerio_si" name="aviso_ministerio" value="1" required>
                        <label for="aviso_ministerio_si">1. Si</label>
                        <input type="radio" id="aviso_ministerio_no" name="aviso_ministerio" value="2">
                        <label for="aviso_ministerio_no">2. No</label>
                    </div>
                  </div>

                  <!-- Destino después de la atención -->
                  <div class="col-md-4">
                    <label for="destino_atencion">Destino después de la atención:</label>
                    <div class="form-group">
                      <select id="destino_atencion" class="selectpicker form-control" name="destino_atencion" data-size="7" data-style="btn btn-primary" required>
                        <option disabled selected>Selección Única</option>
                        <option value="1">1. Domicilio</option>
                        <option value="2">2. Traslado a otra unidad médica</option>
                        <option value="3">3. Servicio especializado atención a violencia</option>
                        <option value="4">4. Consulta externa</option>
                        <option value="5">5. Defunción</option>
                        <option value="6">6. Refugio o albergue</option>
                        <option value="7">7. DIF</option>
                        <option value="8">8. Hospitalización</option>
                        <option value="9">9. Ministerio público</option>
                        <option value="10">10. Grupo de ayuda mutua</option>
                        <option value="11">11. Otro (Especifique)</option>
                      </select>
                    </div>
                  </div>
                  <!--Folio de Defunción-->
                  <div class="col-md-4">
                    <label for="folio_defuncion">Folio de Defuncion</label>
                    <div class="form-group">
                    <input type="text" id="folio_defuncion" name="folio_defuncion" class="form-control"
                    placeholder="Por favor escribe el folio"required>
                    </div>
                  </div>
                  <!--Especifique Destino-->
                  <div class="col-md-4" id="destinoEspecifique" style="display: none;">
                    <label for="destino_especifique">Especifique el Destino:</label>
                    <div class="form-group">
                      <input type="text" id="destino_especifique" name="destino_especifique" class="form-control"
                        placeholder="Especifique Destino">
                    </div>
                  </div>
                  <!-- Responsable de la atención -->
                  <div class="col-md-4">
                    <label for="responsable_atencion">Responsable de la atención:</label>
                    <div class="form-group">
                      <select id="responsable_atencion" class="selectpicker form-control" name="responsable_atencion" data-size="7" data-style="btn btn-primary" required>
                        <option disabled selected>Selección Única</option>
                        <option value="1">1. Médica(o) tratante</option>
                        <option value="2">2. Psicóloga(o) tratante</option>
                        <option value="3">3. Trabajadora o trabajador social</option>
                      </select>
                    </div>
                  </div>
                </div>

              <div id="responsableSection" style="display: none;">
                <div class="row">
                  <div class="col-md-12">
                      <h4 class="card-title-hospital">RESPONSABLE ATENCIÓN</h4>
                  </div>
                  <!-- Nombre(s) -->
                  <div class="col-md-4">
                    <label for="nombre_responsable">Nombre(s):</label>
                    <div class="form-group">
                      <input type="text" id="nombre_responsable" name="nombre_responsable" class="form-control" placeholder="Nombre del Responsable">
                    </div>
                  </div>
                  <!-- Primer Apellido -->
                  <div class="col-md-4">
                    <label for="primer_apellido_responsable">Primer Apellido:</label>
                    <div class="form-group">
                      <input type="text" id="primer_apellido_responsable" name="primer_apellido_responsable" class="form-control" placeholder="Primer Apellido del Responsable">
                    </div>
                  </div>
                  <!-- Segundo Apellido -->
                  <div class="col-md-4">
                    <label for="segundo_apellido_responsable">Segundo Apellido:</label>
                    <div class="form-group">
                      <input type="text" id="segundo_apellido_responsable" name="segundo_apellido_responsable" class="form-control" placeholder="Segundo Apellido del Responsable">
                    </div>
                  </div>
                  <!-- C.U.R.P. -->
                  <div class="col-md-4">
                    <label for="curp_responsable">C.U.R.P.:</label>
                    <div class="form-group">
                      <input type="text" id="curp_responsable" name="curp_responsable" class="form-control" placeholder="CURP del Responsable" maxLength="18" required>
                    </div>
                  </div>
                  <!-- Cédula Profesional -->
                  <div class="col-md-4">
                    <label for="cedula_profesional">Cédula Profesional:</label>
                    <div class="form-group">
                      <input type="text" id="cedula_profesional" name="cedula_profesional" class="form-control" placeholder="Cédula Profesional">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

          <div class="card-footer"> 
            <div class="pull-right">

                 <button type="button" id="SaveData" class="btn btn-primary">G. datos</button>
              <button type="button" id="darDeAlta" class="btn btn-primary">N. Paciente</button>
              <input type='button' class='btn btn-next btn-fill btn-primary btn-wd' name='next' value='Siguiente' />
              <button type="button" id="guardarBtn" class="btn btn-finish btn-fill btn-primary btn-wd">Guardar</button>
              <!-- <button type="submit" class="btn btn-finish btn-fill btn-primary btn-wd" name="finish">Guardar</button> -->
            </div>
            <div class="pull-left">
              <input type='button' class='btn btn-previous btn-fill btn-default btn-wd' name='previous' value='Anterior' />
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


  <script src="{{ asset('black/js/makefolio.js') }}"></script> 
  <script src="{{ asset('black/js/hospital.js') }}"></script>
<script src="{{ asset('black/js/hospital.js') }}"></script>
<script src="{{ asset('black/js/autocomplete.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <script>
    $(document).ready(function() {

        $('.datepicker').datetimepicker({
            format: 'DD/MM/YYYY', // Asegúrate de que este es el formato que se está enviando al backend
        });

        $('.datetimepicker').datetimepicker({
            format: 'DD/MM/YYYY hh:mm A', // Para los campos con fecha y hora
        });
        
        $('#tiempo_traslado').datetimepicker({
            format: 'HH:mm' // Solo tiempo
        });


        function calcularEdad(fecha) {
            const hoy = new Date();
            const nacimiento = new Date(fecha);
            let edad = hoy.getFullYear() - nacimiento.getFullYear();
            const diferenciaMeses = hoy.getMonth() - nacimiento.getMonth();
            if (diferenciaMeses < 0 || (diferenciaMeses === 0 && hoy.getDate() < nacimiento.getDate())) {
                edad--;
            }
            return edad;
        }

        function calcularFechaNacimiento(edad) {
            const hoy = new Date();
            hoy.setFullYear(hoy.getFullYear() - edad);
            return hoy.toISOString().split('T')[0];
        }

        $('#fecha_nacimiento').on('dp.change', function(e) { 
            const fecha = e.date.format('YYYY-MM-DD');
            if (fecha) {
                const edad = calcularEdad(fecha);
                $('#edad').val(edad);
            }
        });

        $('#edad').on('change', function() {
            const edad = $(this).val();
            if (edad) {
                const fechaNacimiento = calcularFechaNacimiento(edad);
                const fechaFormateada = fechaNacimiento.split('-').reverse().join('/');
                $('#fecha_nacimiento').val(fechaFormateada);
            }
        });

    });

    function setFormValidation(id) {
      $(id).validate({
        highlight: function(element) {
          $(element).closest('.form-group').removeClass('has-success').addClass('has-danger');
          $(element).closest('.form-check').removeClass('has-success').addClass('has-danger');
        },
        success: function(element) {
          $(element).closest('.form-group').removeClass('has-danger').addClass('has-success');
          $(element).closest('.form-check').removeClass('has-danger').addClass('has-success');
        },
        errorPlacement: function(error, element) {
          $(element).closest('.form-group').append(error);
        },
      });
    }

    $(document).ready(function() {
      setFormValidation('#RegisterValidation');
      setFormValidation('#TypeValidation');
      setFormValidation('#LoginValidation');
      setFormValidation('#RangeValidation');
    });

    $(document).ready(function() {
      // initialise Datetimepicker and Sliders
      blackDashboard.initDateTimePicker();
      if ($('.slider').length != 0) {
        demo.initSliders();
      }
    });

    $(document).ready(function() {
      // Initialise the wizard
      demo.initNowUiWizard();
      setTimeout(function() {
        $('.card.card-wizard').addClass('active');
      }, 600);
    });

    document.addEventListener('DOMContentLoaded', function () {
    const clues = document.getElementById('clues');
    const cluesSuggestions = document.getElementById('clues_suggestions');
    const preselectedClues = "CSSSA006403"; // CLUES del Hospital General
    let cluesData = []; // Array para almacenar los datos del JSON

    // Cargar el JSON con todas las CLUES
    fetch('/json/clues.json')
        .then(response => response.json())
        .then(data => {
            cluesData = data; // Asigna los datos cargados al array cluesData

            // Preseleccionar la CLUES del Hospital General
            clues.value = preselectedClues;
        })
        .catch(error => console.error('Error cargando el JSON de CLUES:', error));

    // Mostrar sugerencias filtradas al escribir en el input
    clues.addEventListener('input', function () {
        const filtro = clues.value.toLowerCase();
        cluesSuggestions.innerHTML = ''; // Limpia las sugerencias anteriores
        const opcionesFiltradas = cluesData.filter(option => option.clues.toLowerCase().includes(filtro));

        if (opcionesFiltradas.length > 0) {
            cluesSuggestions.style.display = 'block';
            opcionesFiltradas.forEach(option => {
                const li = document.createElement('li');
                li.textContent = option.clues;
                li.style.padding = '10px';
                li.style.cursor = 'pointer';
                li.style.listStyle = 'none';
                li.style.borderBottom = '1px solid #e9ecef';
                li.style.fontWeight = 'bold';
                li.style.color = '#000';
                li.style.backgroundColor = '#fff';
                li.addEventListener('click', function () {
                    clues.value = option.clues;
                    cluesSuggestions.style.display = 'none';
                });
                cluesSuggestions.appendChild(li);
            });
        } else {
            cluesSuggestions.style.display = 'none';
        }
    });

    // Mostrar todas las opciones al hacer focus en el input
    clues.addEventListener('focus', function () {
        cluesSuggestions.innerHTML = ''; // Limpia las sugerencias
        cluesData.forEach(option => {
            const li = document.createElement('li');
            li.textContent = option.clues;
            li.style.padding = '10px';
            li.style.cursor = 'pointer';
            li.style.listStyle = 'none';
            li.style.borderBottom = '1px solid #e9ecef';
            li.style.fontWeight = 'bold';
            li.style.color = '#000';
            li.style.backgroundColor = '#fff';
            li.addEventListener('click', function () {
                clues.value = option.clues;
                cluesSuggestions.style.display = 'none';
            });
            cluesSuggestions.appendChild(li);
        });
        cluesSuggestions.style.display = 'block'; // Muestra todas las sugerencias
    });

    // Oculta la lista al hacer clic fuera del input
    clues.addEventListener('blur', function () {
        setTimeout(() => {
            cluesSuggestions.style.display = 'none';
        }, 200);
    });
});
document.addEventListener('DOMContentLoaded', function () {
    const cluesU = document.getElementById('cluesU');
    const cluesSuggestions = document.getElementById('cluesU_suggestions');
    let cluesData = []; // Array para almacenar los datos del JSON

    // Cargar el JSON con todas las CLUES
    fetch('/json/clues.json')
        .then(response => response.json())
        .then(data => {
            cluesData = data; // Asigna los datos cargados al array cluesData
            cluesU.value = cluesData.find(clue => clue.clues === "CSSSA006403").clues; // Preseleccionar la CLUES del Hospital General
        })
        .catch(error => console.error('Error cargando el JSON de CLUES:', error));

    // Mostrar sugerencias filtradas al escribir en el input
    cluesU.addEventListener('input', function () {
        const filtro = cluesU.value.toLowerCase();
        cluesSuggestions.innerHTML = ''; // Limpia las sugerencias anteriores
        const opcionesFiltradas = cluesData.filter(option => option.clues.toLowerCase().includes(filtro));

        if (opcionesFiltradas.length > 0) {
            cluesSuggestions.style.display = 'block';
            opcionesFiltradas.forEach(option => {
                const li = document.createElement('li');
                li.textContent = option.clues;
                li.style.padding = '10px';
                li.style.cursor = 'pointer';
                li.style.listStyle = 'none';
                li.style.borderBottom = '1px solid #e9ecef';
                li.style.fontWeight = 'bold';
                li.style.color = '#000';
                li.style.backgroundColor = '#fff';
                li.addEventListener('click', function () {
                    cluesU.value = option.clues;
                    cluesSuggestions.style.display = 'none';
                });
                cluesSuggestions.appendChild(li);
            });
        } else {
            cluesSuggestions.style.display = 'none';
        }
    });

    // Mostrar todas las opciones al hacer focus en el input
    cluesU.addEventListener('focus', function () {
        cluesSuggestions.innerHTML = ''; // Limpia las sugerencias
        cluesData.forEach(option => {
            const li = document.createElement('li');
            li.textContent = option.clues;
            li.style.padding = '10px';
            li.style.cursor = 'pointer';
            li.style.listStyle = 'none';
            li.style.borderBottom = '1px solid #e9ecef';
            li.style.fontWeight = 'bold';
            li.style.color = '#000';
            li.style.backgroundColor = '#fff';
            li.addEventListener('click', function () {
                cluesU.value = option.clues;
                cluesSuggestions.style.display = 'none';
            });
            cluesSuggestions.appendChild(li);
        });
        cluesSuggestions.style.display = 'block'; // Muestra todas las sugerencias
    });

    // Oculta la lista al hacer clic fuera del input
    cluesU.addEventListener('blur', function () {
        setTimeout(() => {
            cluesSuggestions.style.display = 'none';
        }, 200);
    });
}); 
  </script>
  

<script>
    document.addEventListener('DOMContentLoaded', function() {
        @if(session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Éxito',
                text: '{{ session('success') }}',
                timer: 3000,
                showConfirmButton: false
            });
        @endif

        @if(session('error'))
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: '{{ session('error') }}',
                timer: 3000,
                showConfirmButton: false
            });
        @endif
    });
</script>

@endpush
