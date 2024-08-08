@extends('layouts.app', ['activePage' => 'form_hospital', 'menuParent' => 'forms', 'titlePage' => __('Hospital Forms')])

@section('content')
<div class="content">
  <div class="row">

    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h2 class="card-title-hospital">HOJA DE REGISTRO DE ATENCIÓN POR VIOLENCIA Y/O LESIÓN</h2>
          <h3 class="card-title-hospital">Evento</h3>
        </div>

    <div class="content">
        <div class="row">

        <div class="col-md-4">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Fecha y hora de Ocurrencia</h4>
          </div>
          <div class="card-body">
            <div class="form-group">
              <input type="text" class="form-control datetimepicker" value="07/12/2024">
            </div>
          </div>
        </div>
      </div>

        <div class="col-md-4">
            <div class="card">
            <div class="card-header">
                    <h4 class="card-title">¿Fue día festivo?</h4>
                    </div>
                    <div class="card-body">
                        <select class="selectpicker" data-size="7" data-style="btn btn-primary" title="Selección Única">
                        <option disabled selected>Selección Única</option>
                        <option value="2">1. SI</option>
                        <option value="3">2. NO</option>
                        </select>
            </div>
        </div>
    </div>

    <div class="col-md-4">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Sitio de Ocurrencia</h4>
        </div>
        <div class="card-body">
            <select id="sitioOcurrencia" class="selectpicker" data-size="7" data-style="btn btn-primary" title="Selección Única">
                <option value="2">0. Vivienda</option>
                <option value="3">1. Institución residencial</option>
                <option value="4">2. Escuela</option>
                <option value="5">3. Área de deporte y atletismo</option>
                <option value="6">4. Vía pública (peatón)</option>
                <option value="7">5. Comercio y áreas de servicio</option>
                <option value="8">6. Trabajo</option>
                <option value="9">7. Granja</option>
                <option value="10">8. Club, cantina, bar</option>
                <option value="11">9. Vehículo automotor público</option>
                <option value="12">10. Vehículo automotor privado</option>
                <option value="13">11. Otro Lugar (Especifique)</option>
                <option value="14">12. Lugar no especificado</option>
            </select>
            <div id="especifique" style="display: none; margin-top: 10px;">
                <label for="especifiqueInput">Especifique:</label>
                <input type="text" id="especifiqueInput" class="form-control">
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var sitioOcurrencia = document.getElementById('sitioOcurrencia');
        var especifiqueDiv = document.getElementById('especifique');
        var especifiqueInput = document.getElementById('especifiqueInput');

        sitioOcurrencia.addEventListener('change', function() {
            if (sitioOcurrencia.value === '13') {
                especifiqueDiv.style.display = 'block';
            } else {
                especifiqueDiv.style.display = 'none';
                especifiqueInput.value = '';  // Limpiar el campo de texto
            }
        });

        especifiqueInput.addEventListener('input', function() {
            if (sitioOcurrencia.value === '13') {
                var customText = '11. ' + especifiqueInput.value.trim();
                var optionExists = false;

                // Check if the option already exists
                for (var i = 0; i < sitioOcurrencia.options.length; i++) {
                    if (sitioOcurrencia.options[i].value === '13') {
                        sitioOcurrencia.options[i].text = customText;
                        sitioOcurrencia.options[i].selected = true;
                        optionExists = true;
                        break;
                    }
                }

                // If the option does not exist, create it
                if (!optionExists) {
                    var customOption = document.createElement('option');
                    customOption.value = '13';
                    customOption.text = customText;
                    customOption.selected = true;
                    sitioOcurrencia.add(customOption);
                }
            }
        });

        especifiqueInput.addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                especifiqueDiv.style.display = 'none';  // Ocultar el campo especifique
            }
        });
    });
</script>

        </div>
    </div>

    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title-hospital">DOMICILIO DE OCURRENCIA</h4>
        </div>

            <div class="card-body">
          <form method="get" action="/" class="form-horizontal">
            <div class="row">
              <label class="col-sm-2 col-form-label">Entidad Federativa/País:</label>
              <div class="col-sm-10">
                <div class="form-group">
                <input type="text" class="form-control" placeholder="placeholder">
                </div>
              </div>
            </div>

            <div class="row">
              <label class="col-sm-2 col-form-label">Municipio o alcadía:</label>
              <div class="col-sm-10">
                <div class="form-group">
                <input type="text" class="form-control" placeholder="placeholder">
                </div>
              </div>
            </div>

            <div class="row">
              <label class="col-sm-2 col-form-label">Localidad:</label>
              <div class="col-sm-10">
                <div class="form-group">
                <input type="text" class="form-control" placeholder="placeholder">
                </div>
              </div>
            </div>

            <div class="row">
              <label class="col-sm-2 col-form-label">Código Postal</label>
              <div class="col-sm-10">
                <div class="form-group">
                <input type="text" class="form-control" placeholder="placeholder">
                </div>
              </div>
            </div>
            
            <div class="row">
              <label class="col-sm-2 col-form-label">Tipo de la Vialidad:</label>
              <div class="col-sm-10">
                <div class="form-group">
                <input type="text" class="form-control" placeholder="placeholder">
                </div>
              </div>
            </div>

            <div class="row">
              <label class="col-sm-2 col-form-label">Nombre de la vialidad:</label>
              <div class="col-sm-10">
                <div class="form-group">
                <input type="text" class="form-control" placeholder="placeholder">
                </div>
              </div>
            </div>

            <div class="row">
              <label class="col-sm-2 col-form-label">Num. Ext.</label>
              <div class="col-sm-10">
                <div class="form-group">
                <input type="text" class="form-control" placeholder="placeholder">
                </div>
              </div>
            </div>

            <div class="row">
              <label class="col-sm-2 col-form-label">Num. Int.</label>
              <div class="col-sm-10">
                <div class="form-group">
                <input type="text" class="form-control" placeholder="placeholder">
                </div>
              </div>
            </div>

            <div class="row">
              <label class="col-sm-2 col-form-label">Tipo de asentamiento humano:</label>
              <div class="col-sm-10">
                <div class="form-group">
                <input type="text" class="form-control" placeholder="placeholder">
                </div>
              </div>
            </div>

            <div class="row">
              <label class="col-sm-2 col-form-label">Nombre de asentamiento humano:</label>
              <div class="col-sm-10">
                <div class="form-group">
                <input type="text" class="form-control" placeholder="placeholder">
                </div>
              </div>
            </div>
            </div>
    </div>

    <div class="content">
        <div class="row">

    <div class="col-md-4">
            <div class="card">
            <div class="card-header">
                    <h4 class="card-title">Intensionalidad del evento</h4>
                    </div>
                    <div class="card-body">
                        <select class="selectpicker" data-size="7" data-style="btn btn-primary" title="Selección Única">
                        <option value="2">1. Accidental</option>
                        <option value="3">2. Violencia familiar</option>
                        <option value="4">3. Violencia No familiar</option>
                        <option value="5">4. Autoinfligido</option>
                        <option value="6">11. Trata de personas</option>
                        </select>
            </div>
        </div>
    </div>

    <div class="col-md-4">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Agente de la Lesión</h4>
        </div>
        <div class="card-body">
            <select id="sitioOcurrencia2" class="selectpicker" data-size="7" data-style="btn btn-primary" title="Selección Única">
                <option value="3">1. Fuego, flama, sustancia caliente/vapor</option>
                <option value="4">2. Intoxicación por drogas o medicamentos</option>
                <option value="5">3. Pie o mano</option>
                <option value="6">4. Caída</option>
                <option value="7">5. Objeto contundente</option>
                <option value="8">6. Objeto punzocortante</option>
                <option value="9">7. Golpe contra piso o pared</option>
                <option value="10">8. Cuerpo extraño</option>
                <option value="11">9. Explosión</option>
                <option value="12">10. Asfixia o sofocación</option>
                <option value="13">11. Múltiples agentes</option>
                <option value="14">12. Proyectil arma de fuego</option>
                <option value="15">13. Ahorcamiento</option>
                <option value="16">14. Radiación</option>
                <option value="17">15. Sustancias químicas</option>
                <option value="18">16. Corriente eléctrica</option>
                <option value="19">17. Herramienta o maquinaria</option>
                <option value="20">18. Sacudidas</option>
                <option value="21">19. Desastre natural</option>
                <option value="22">20. Vehículo de motor</option>
                <option value="23">21. Ahogamiento por sumersión</option>
                <option value="24">22. Piquete / mordedura de animal</option>
                <option value="25">23. Fuerzas de la naturaleza</option>
                <option value="26">24. Intoxicación por plantas, hongos
                venenosos</option>
                <option value="27">25. Otro (Especifique)</option>
                <option value="28">26. Se ignora</option>
                <option value="29">27. No aplica</option>
            </select>
            <div id="especifique2" style="display: none; margin-top: 10px;">
                <label for="especifiqueInput2">Especifique:</label>
                <input type="text" id="especifiqueInput2" class="form-control">
            </div>
        </div>
    </div>
</div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var sitioOcurrencia2 = document.getElementById('sitioOcurrencia2');
            var especifiqueDiv2 = document.getElementById('especifique2');
            var especifiqueInput2 = document.getElementById('especifiqueInput2');

            sitioOcurrencia2.addEventListener('change', function() {
                if (sitioOcurrencia2.value === '27') {
                    especifiqueDiv2.style.display = 'block';
                } else {
                    especifiqueDiv2.style.display = 'none';
                    especifiqueInput2.value = '';  // Limpiar el campo de texto
                }
            });

            especifiqueInput2.addEventListener('input', function() {
                if (sitioOcurrencia2.value === '27') {
                    var customText = '25. ' + especifiqueInput2.value.trim();
                    var optionExists = false;

                    // Check if the option already exists
                    for (var i = 0; i < sitioOcurrencia2.options.length; i++) {
                        if (sitioOcurrencia2.options[i].value === '27') {
                            sitioOcurrencia2.options[i].text = customText;
                            sitioOcurrencia2.options[i].selected = true;
                            optionExists = true;
                            break;
                        }
                    }

                    // If the option does not exist, create it
                    if (!optionExists) {
                        var customOption = document.createElement('option');
                        customOption.value = '27';
                        customOption.text = customText;
                        customOption.selected = true;
                        sitioOcurrencia2.add(customOption);
                    }
                }
            });

            especifiqueInput2.addEventListener('keypress', function(e) {
                if (e.key === 'Enter') {
                    especifiqueDiv2.style.display = 'none';  // Ocultar el campo especifique
                }
            });
        });
    </script>

    </div>
    </div>

    <div class="content">
    <div class="row">
    <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">¿Recibió atención prehospitalaria?</h4>
                </div>
                       <div class="card-body">
                        <select class="selectpicker" data-size="7" data-style="btn btn-primary" title="Selección Única">
                        <option disabled selected>Selección Única</option>
                        <option value="2">1. SI</option>
                        <option value="3">2. NO</option>
                        </select>
            </div>
        </div>
    </div>

    <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Tiempo de traslado a la unidad hospitalaria:</h4>
                </div>
                    <div class="card-body">
                            <input class="form-control" type="number" name="number" required />

                            <div class="form-check form-check-radio">
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                                <span class="form-check-sign"></span>
                                MIN
                            </label>
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                                <span class="form-check-sign"></span>
                                HR
                            </label>
                            </div>
                    </div>
            </div>
    </div>

    <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Se sospecha que la/el paciente estaba bajo los efectos de:</h4>
                </div>
                       <div class="card-body">
                        <select class="selectpicker" data-size="7" data-style="btn btn-primary" title="Selección Única">
                        <option value="2">1. Alcohol</option>
                        <option value="3">2. Droga por indicación médica</option>
                        <option value="4">3. Drogas ilegales</option>
                        <option value="5">4. Se ignora</option>
                        <option value="6">5. Ninguna</option>
                        </select>
            </div>
        </div>
    </div>

              </div>
            </div>
            
            <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title-hospital">ACCIDENTE</h4>
        </div>

    <div class="content">
        <div class="row">

        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Si la causa fue accidente de vehículo de motor:</h4>
                </div>
                       <div class="card-body">
                        <select class="selectpicker" data-size="7" data-style="btn btn-primary" title="Selección Única">
                        <option value="2">1. SI</option>
                        <option value="3">2. NO</option>
                        </select>
            </div>
        </div>
    </div>

    <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">La/El lesionado es:</h4>
                </div>
                       <div class="card-body">
                        <select class="selectpicker" data-size="7" data-style="btn btn-primary" title="Selección Única">
                        <option value="2">1. Conductor</option>
                        <option value="3">2. Ocupante</option>
                        <option value="4">3. Peatón</option>
                        </select>
            </div>
        </div>
    </div>

    <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Uso equipo de Seguridad:</h4>
                </div>
                       <div class="card-body">
                        <select class="selectpicker" data-size="7" data-style="btn btn-primary" title="Selección Única">
                        <option value="2">1. Si</option>
                        <option value="3">2. No</option>
                        <option value="4">3. Se ignora</option>
                        </select>
            </div>
        </div>
    </div>

    <div class="col-md-4">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">¿Que tipo de seguridad utilizó?</h4>
        </div>
        <div class="card-body">
            <select id="sitioOcurrencia3" class="selectpicker" data-size="7" data-style="btn btn-primary" title="Selección Única">
                <option value="3">1. Cinturón de seguridad</option>
                <option value="4">2. Casco</option>
                <option value="5">3. Sillín porta infante</option>
                <option value="6">4. Otro (Especifique)</option>
            </select>
            <div id="especifique3" style="display: none; margin-top: 10px;">
                <label for="especifiqueInput3">Especifique:</label>
                <input type="text" id="especifiqueInput3" class="form-control">
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var sitioOcurrencia3 = document.getElementById('sitioOcurrencia3');
        var especifiqueDiv3 = document.getElementById('especifique3');
        var especifiqueInput3 = document.getElementById('especifiqueInput3');

        sitioOcurrencia3.addEventListener('change', function() {
            if (sitioOcurrencia3.value === '6') {
                especifiqueDiv3.style.display = 'block';
            } else {
                especifiqueDiv3.style.display = 'none';
                especifiqueInput3.value = '';  // Limpiar el campo de texto
            }
        });

        especifiqueInput3.addEventListener('input', function() {
            if (sitioOcurrencia3.value === '6') {
                var customText = '4. ' + especifiqueInput3.value.trim();
                var optionExists = false;

                // Check if the option already exists
                for (var i = 0; i < sitioOcurrencia3.options.length; i++) {
                    if (sitioOcurrencia3.options[i].value === '6') {
                        sitioOcurrencia3.options[i].text = customText;
                        sitioOcurrencia3.options[i].selected = true;
                        optionExists = true;
                        break;
                    }
                }

                // If the option does not exist, create it
                if (!optionExists) {
                    var customOption = document.createElement('option');
                    customOption.value = '6';
                    customOption.text = customText;
                    customOption.selected = true;
                    sitioOcurrencia3.add(customOption);
                }
            }
        });

        especifiqueInput3.addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                especifiqueDiv3.style.display = 'none';  // Ocultar el campo especifique
            }
        });
    });
</script>

              </div>
            </div>

            </div>
            </div>

            <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title-hospital">VIOLENCIA</h4>
        </div>

    <div class="content">
        <div class="row">

        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Tipo de Violencia:</h4>
                </div>
                       <div class="card-body">
                        <select class="selectpicker" data-size="7" data-style="btn btn-primary" title="Selección Única">
                        <option value="2">1. Violencia física</option>
                        <option value="3">2. Violencia sexual</option>
                        <option value="4">3. Violencia psicológica</option>
                        <option value="5">4. Violencia económica/patrimonial</option>
                        <option value="6">5. Abandono y/o negligencia</option>
                        </select>
            </div>
        </div>
        </div>

        <div class="col-md-12">
          <h4 class="card-title-hospital">AGRESOR:</h4>
        </div>
        
    <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Num. Agresores:</h4>
                </div>
                       <div class="card-body">
                        <select class="selectpicker" data-size="7" data-style="btn btn-primary" title="Selección Única">
                        <option value="2">1. Única</option>
                        <option value="3">2. Más de una(o)</option>
                        </select>
            </div>
        </div>
    </div>

      <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Parentesco con la/el afectada(o):</h4>
                </div>
                <div class="card-body">
                <input type="text" class="form-control" placeholder="placeholder">
                </div>
            </div>
      </div>

      <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Sexo del agresor(a):</h4>
                </div>
                       <div class="card-body">
                        <select class="selectpicker" data-size="7" data-style="btn btn-primary" title="Selección Única">
                        <option value="2">1. Masculino</option>
                        <option value="3">2. Femenino</option>
                        </select>
            </div>
        </div>
    </div>

    <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Edad del agresor(a) (años):</h4>
                </div>
                    <div class="card-body">
                            <input class="form-control" type="number" name="number" required />
                    </div>
            </div>
    </div>

    <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">El/La agresor(a) se sospecha que actuó bajo los efectos de:</h4>
                </div>
                       <div class="card-body">
                        <select class="selectpicker" data-size="7" data-style="btn btn-primary" title="Selección Única">
                        <option value="2">1. Alcohol</option>
                        <option value="4">2. Droga por indicación médica</option>
                        <option value="5">3. Drogas ilegales</option>
                        <option value="6">4. Se ignora</option>
                        <option value="7">5. Ninguna</option>
                        </select>
            </div>
        </div>
    </div>

    <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">En caso de evento autoinflingido, el evento ocurrió:</h4>
                </div>
                       <div class="card-body">
                        <select class="selectpicker" data-size="7" data-style="btn btn-primary" title="Selección Única">
                        <option value="2">1. Única vez</option>
                        <option value="4">2. Repetido</option>
                        </select>
            </div>
        </div>
    </div>

            </div>
            </div>
            </div>

          </form>
        </div>
      </div>
    </div>
@endsection

@push('js')
  <script>
    $(document).ready(function() {
      // initialise Datetimepicker and Sliders
      blackDashboard.initDateTimePicker();
      if ($('.slider').length != 0) {
        demo.initSliders();
      }
    });
  </script>
@endpush