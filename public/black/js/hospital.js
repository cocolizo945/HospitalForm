document.addEventListener('DOMContentLoaded', (event) => {
  const horaOcurrenciaInput = document.getElementById('tiempo_traslado');
  const folioInput = document.getElementById('folio');

  // Inicializar el valor del input de hora
  horaOcurrenciaInput.value = '00:00';
  folioInput.value = '0';

  // Función para formatear la entrada de tiempo
  function formatTimeInput(event) {
    let input = event.target.value.replace(/\D/g, ''); // Eliminar todos los caracteres no numéricos

    if (input.length > 4) {
      input = input.substring(0, 4); // Limitar a los primeros 4 dígitos
    }
  }

  // Función para manejar la entrada de teclas en el input de hora
  function handleKeydownTime(event) {
    const start = event.target.selectionStart;
    const end = event.target.selectionEnd;

    if (event.key >= '0' && event.key <= '9') {
      event.preventDefault();

      if (start < 2) {
        // Insertar dígitos en la posición de las horas
        let hours = event.target.value.slice(0, 2).replace(/\D/g, '');
        hours = (hours + event.key).slice(-2); // Asegurar que se mantengan solo 2 dígitos
        event.target.value = hours + event.target.value.slice(2);
        event.target.setSelectionRange(3, 5); // Mover el cursor a los minutos después de introducir las horas

      } else if (start >= 3 && start < 5) {
        // Insertar dígitos en la posición de los minutos
        let minutes = event.target.value.slice(3, 5).replace(/\D/g, '');
        minutes = (minutes + event.key).slice(-2); // Asegurar que se mantengan solo 2 dígitos
        event.target.value = event.target.value.slice(0, 3) + minutes + event.target.value.slice(5);
        event.target.setSelectionRange(start + 1, start + 1); // Mantener el cursor en la posición correcta
      }

      formatTimeInput(event); // Formatear la entrada
    }
  }

  // Función para manejar el foco del input de hora, inicialmente en las horas
  function handleFocusTime(event) {
    setTimeout(() => {
      event.target.setSelectionRange(0, 2); // Establecer el foco en las horas
    }, 0);
  }

  // Función para manejar la restauración del formato del input de hora si está vacío
  function handleBlurTime(event) {
    const value = event.target.value;
    if (value === '') {
      event.target.value = '00:00';
    } else {
      formatTimeInput(event); // Formatear si el campo no está vacío
    }
  }

  // Función para validar el input de folio
  function validateFolioInput(event) {
    const input = event.target.value.replace(/\D/g, ''); // Eliminar todos los caracteres no numéricos

    if (input.length > 8) {
      event.target.value = input.substring(0, 8); // Limitar a 8 caracteres
    } else {
      event.target.value = input;
    }
  }



function manejarValidacionCURP() {
  const inputCurp = document.getElementById('curp');
  const mensajeValidacion = document.getElementById('curp-validacion');

  inputCurp.addEventListener('input', function() {
      const curp = inputCurp.value.toUpperCase();

      if (validarCURP(curp)) {
          mensajeValidacion.style.display = 'none';
      } else {
          mensajeValidacion.style.display = 'inline';
      }
  });
}
manejarValidacionCURP();
// Función de validación CURP (ya debes tener esta función)
function validarCURP(curp) {
  const regexCURP = /^[A-Z]{4}(\d{6}|X{6})[HMX](?:[A-Z]{2}|XX)(?:[A-Z\d]{3}|XXX)[A-Z\d]|x$/;
  return regexCURP.test(curp);
}




  // Event listeners para el input de hora
  horaOcurrenciaInput.addEventListener('input', formatTimeInput);
  horaOcurrenciaInput.addEventListener('focus', handleFocusTime);
  horaOcurrenciaInput.addEventListener('keydown', handleKeydownTime);
  horaOcurrenciaInput.addEventListener('blur', handleBlurTime);

  // Event listeners para el input de folio
  folioInput.addEventListener('input', validateFolioInput);
    
    // Define sections to toggle visibility based on select values
    const sectionsToToggle = [
        {selectId: 'afiliacion', targetSection: 'afiliacionEspecifique', showValues: ['12']},
        {selectId: 'sitio_ocurrencia', targetSection: 'otroLugarEspecifique', showValues: ['11']},
        {selectId: 'agente_lesion', targetSection: 'agenteEspecifique', showValues: ['Otro (Especifique)']},
        {selectId: 'tipo_seguridad', targetSection: 'seguridadEspecifique', showValues: ['Otro (Especifique)']},
        {selectId: 'escolaridad', targetSection: 'escolaridad_seleccionada', showValues: ['Primaria', 'Secundaria', 'Bachillerato o preparatoria', 'Profesional', 'Posgrado']},
        {selectId: 'sexo', targetSection: 'mujerFertilSection', showValues: ['Mujer', 'Intersexual']},
        {selectId: 'mujer_fertil', targetSection: 'semanasGestacionSection', showValues: ['1']},
        {selectId: 'lengua_indigena', targetSection: 'cualLenguaSection', showValues: ['1']},
        {selectId: 'referido_por', targetSection: 'unidadMedicaEspecifique', showValues: ['1']}
    ];

    // Add event listeners to select elements to toggle visibility of sections
    sectionsToToggle.forEach(item => {
        const selectElement = document.getElementById(item.selectId);
        if (selectElement) {
            selectElement.addEventListener('change', (event) => {
                const value = event.target.value;
                const section = document.getElementById(item.targetSection);
                if (section) {
                    if (item.showValues.includes(value)) {
                        section.style.display = 'block';
                    } else {
                        section.style.display = 'none';
                    }
                }
            });
        }
    });
});

document.addEventListener('DOMContentLoaded', (event) => {
    // Toggle sections based on the selected option in "intencionalidad_evento"
    const intencionalidadSelect = document.getElementById('intencionalidad_evento');
    const accidenteSection = document.getElementById('accidenteSection');
    const violenciaSection = document.getElementById('violenciaSection');

    intencionalidadSelect.addEventListener('change', (event) => {
      const value = event.target.value;

      // Hide all sections initially
      accidenteSection.style.display = 'none';
      violenciaSection.style.display = 'none';

      // Show the relevant section based on the selected value
      if (value === '1') {
        accidenteSection.style.display = 'block';
      } else if (value === '2' || value === '3') {
        violenciaSection.style.display = 'block';
      }
    });
  });

  // Codigo para introducir pais
  document.getElementById('migrante').addEventListener('change', function() {
  var migrante = this.value;
  var paisInput = document.getElementById('entidad_pais');

  if (migrante === "2") { 
      paisInput.value = "Mexico"; 
      paisInput.setAttribute('readonly', true); 
  } else if (migrante === "1") { 
      paisInput.value = ""; 
      paisInput.removeAttribute('readonly'); 
  }
});


    $(document).ready(function() {
    // Lista de opciones para autocompletar, tomadas de tu select original
    var agentesLesion = [
        "Fuego, flama, sustancia caliente/vapor",
        "Intoxicación por drogas o medicamentos",
        "Pie o mano",
        "Caída",
        "Objeto contundente",
        "Objeto punzocortante",
        "Golpe contra piso o pared",
        "Cuerpo extraño",
        "Explosión",
        "Asfixia o sofocación",
        "Múltiples agentes",
        "Proyectil arma de fuego",
        "Ahorcamiento",
        "Radiación",
        "Sustancias químicas",
        "Corriente eléctrica",
        "Herramienta o maquinaria",
        "Sacudidas",
        "Desastre natural",
        "Vehículo de motor",
        "Ahogamiento por sumersión",
        "Piquete / mordedura de animal",
        "Fuerzas de la naturaleza",
        "Intoxicación por plantas, hongos venenosos",
        "Otro (Especifique)",
        "Se ignora",
        "No aplica"
    ];

    // Aplicar el autocompletar al input
    $("#agente_lesion_input").autocomplete({
        source: agentesLesion
    });
  });

  //Autocompletar C.P responsivo de localidad
  document.addEventListener('DOMContentLoaded', function() {
    const localidades = [
        { localidad: "Acacoyagua", codigo_postal: "30500" },
        { localidad: "Acapetahua", codigo_postal: "30510" },
        { localidad: "Cacahoatan", codigo_postal: "30890" },
        { localidad: "Escuintla", codigo_postal: "30470" },
        { localidad: "Frontera Hidalgo", codigo_postal: "30860" },
        { localidad: "Huehuetan", codigo_postal: "30660" },
        { localidad: "Huixtla", codigo_postal: "30640" },
        { localidad: "Mazatan", codigo_postal: "30650" },
        { localidad: "Metapa", codigo_postal: "30870" },
        { localidad: "Suchiate", codigo_postal: "30840" },
        { localidad: "Tapachula", codigo_postal: "30700" },
        { localidad: "Tuxtla Chico", codigo_postal: "30880" },
        { localidad: "Tuzantán", codigo_postal: "30690" },
        { localidad: "Unión Juarez", codigo_postal: "30900" },
        { localidad: "Villa Comaltitlan", codigo_postal: "30620" }
    ];

    const localidadInput = document.getElementById('localidad');
    const codigoPostalInput = document.getElementById('codigo_postal');
    const localidadList = document.getElementById('localidadesList');

    // Agregar opciones al datalist
    localidades.forEach(function(item) {
        const opcion = document.createElement('option');
        opcion.value = item.localidad;
        opcion.dataset.cp = item.codigo_postal;
        localidadList.appendChild(opcion);
    });

    localidadInput.addEventListener('input', function() {
        const valorInput = this.value.toLowerCase();

        // Encuentra la localidad correspondiente
        const localidadSeleccionada = localidades.find(function(item) {
            return item.localidad.toLowerCase() === valorInput;
        });

        if (localidadSeleccionada) {
            codigoPostalInput.value = localidadSeleccionada.codigo_postal;
        } else {
            codigoPostalInput.value = ''; // Limpiar el código postal si no hay coincidencias
        }
    });
});