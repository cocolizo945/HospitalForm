// Lista de afiliaciones
const afiliaciones = [
    "No especificado", 
    "Ninguna", 
    "IMSS", 
    "ISSSTE", 
    "PEMEX", 
    "SEDENA", 
    "SEMAR", 
    "Otra", 
    "IMSS Bienestar", 
    "ISSFAM", 
    "OPD IMSS Bienestar", 
    "Se ignora"
];

// Referencias a los elementos del DOM
let sugerencias_afiliacion = document.getElementById('sugerencias_afiliacion');
let input_afiliacion = document.getElementById('afiliacion_input');
let especificarCampo = document.getElementById('afiliacionEspecifique');
let numeroAfiliacion = document.getElementById('numero_afiliacion'); // Campo de Número de Afiliación

// Función para manejar el autocompletado y otras funcionalidades
function manejarAutocompletado() {
    // Muestra todas las opciones cuando se hace clic en el input
    input_afiliacion.addEventListener('click', function() {
        sugerencias_afiliacion.innerHTML = '';
        afiliaciones.forEach(opcion => {
            const li = document.createElement('li');
            li.textContent = opcion;
            li.classList.add('list-group-item');
            li.style.cursor = 'pointer';
            li.addEventListener('click', function() {
                input_afiliacion.value = opcion;
                sugerencias_afiliacion.style.display = 'none';
                
                // Mostrar el campo adicional si se selecciona 'Otra'
                if (opcion === 'Otra') {
                    especificarCampo.style.display = 'block';
                } else {
                    especificarCampo.style.display = 'none';
                }
                
                // Deshabilitar el campo Número de Afiliación si se selecciona 'No especificado', 'Ninguna' o 'Se ignora'
                if (opcion === 'No especificado' || opcion === 'Ninguna' || opcion === 'Se ignora') {
                    numeroAfiliacion.disabled = true;
                    numeroAfiliacion.value = ''; // Limpia el campo
                } else {
                    numeroAfiliacion.disabled = false;
                }
            });
            sugerencias_afiliacion.appendChild(li);
        });
        sugerencias_afiliacion.style.display = 'block'; // Muestra la lista al hacer clic
    });

    // Filtrar opciones mientras se escribe en el input
    input_afiliacion.addEventListener('input', function() {
        let valor = input_afiliacion.value.toLowerCase();
        sugerencias_afiliacion.innerHTML = '';

        const opcionesFiltradas = afiliaciones.filter(afiliacion => afiliacion.toLowerCase().includes(valor));

        if (opcionesFiltradas.length > 0) {
            sugerencias_afiliacion.style.display = 'block';
            opcionesFiltradas.forEach(opcion => {
                const li = document.createElement('li');
                li.textContent = opcion;
                li.classList.add('list-group-item');
                li.style.cursor = 'pointer';
                li.addEventListener('click', function() {
                    input_afiliacion.value = opcion;
                    sugerencias_afiliacion.style.display = 'none';
                    
                    // Mostrar el campo adicional si se selecciona 'Otra'
                    if (opcion === 'Otra') {
                        especificarCampo.style.display = 'block';
                    } else {
                        especificarCampo.style.display = 'none';
                    }
                    
                    // Deshabilitar el campo Número de Afiliación si se selecciona 'No especificado', 'Ninguna' o 'Se ignora'
                    if (opcion === 'No especificado' || opcion === 'Ninguna' || opcion === 'Se ignora') {
                        numeroAfiliacion.disabled = true;
                        numeroAfiliacion.value = ''; // Limpia el campo
                    } else {
                        numeroAfiliacion.disabled = false;
                    }
                });
                sugerencias_afiliacion.appendChild(li);
            });
        } else {
            sugerencias_afiliacion.style.display = 'none';
        }
    });
	// Ocultar las sugerencias al hacer clic fuera del input o de las sugerencias
    document.addEventListener('click', function(event) {
        if (!input_afiliacion.contains(event.target) && !sugerencias_afiliacion.contains(event.target)) {
            sugerencias_afiliacion.style.display = 'none';
        }
    });
}

// Llamada a la función de manejo de autocompletado
manejarAutocompletado();

// Lista de opciones para 'Referida(o) por'
const referidoPorOpciones = [
    "Unidad médica",
    "Procuración de Justicia",
    "Secretaría de Educación Pública",
    "Desarrollo Social",
    "DIF",
    "Otras instituciones gubernamentales",
    "Instituciones No gubernamentales",
    "Sin referencia (iniciativa propia)"
];

let sugerenciasReferido = document.getElementById('referido_sugg');
let inputReferido = document.getElementById('referido_por');

// Función para mostrar sugerencias cuando el usuario escribe en el campo
inputReferido.addEventListener('input', function() {
  let valor = inputReferido.value.toLowerCase();
  sugerenciasReferido.innerHTML = ''; // Limpiar sugerencias previas

  // Filtrar las opciones que coincidan con lo que el usuario está escribiendo
  const opcionesFiltradas = referidoPorOpciones.filter(opcion => opcion.toLowerCase().includes(valor));

  // Si hay opciones filtradas, mostrarlas
  if (opcionesFiltradas.length > 0) {
      sugerenciasReferido.style.display = 'block';
      opcionesFiltradas.forEach(opcion => {
          const li = document.createElement('li');
          li.textContent = opcion;
          li.classList.add('list-group-item'); // Agregar estilo a las sugerencias
          li.style.cursor = 'pointer';
          li.addEventListener('click', function() {
              inputReferido.value = opcion; // Actualizar el valor del campo de entrada
              sugerenciasReferido.style.display = 'none'; // Ocultar las sugerencias
          });
          sugerenciasReferido.appendChild(li);
      });
  } else {
      sugerenciasReferido.style.display = 'none'; // Si no hay coincidencias, ocultar la lista
  }
});

// Ocultar las sugerencias al perder el foco (con un pequeño retraso para permitir clic)
inputReferido.addEventListener('blur', function() {
  setTimeout(() => {
      sugerenciasReferido.style.display = 'none';
  }, 200);
});

// Mostrar todas las sugerencias cuando el campo recibe foco y está vacío
inputReferido.addEventListener('focus', function() {
  if (inputReferido.value === '') {
      sugerenciasReferido.innerHTML = ''; // Limpiar sugerencias previas
      referidoPorOpciones.forEach(opcion => {
          const li = document.createElement('li');
          li.textContent = opcion;
          li.classList.add('list-group-item');
          li.style.cursor = 'pointer';
          li.addEventListener('click', function() {
              inputReferido.value = opcion; // Actualizar el valor del campo de entrada
              sugerenciasReferido.style.display = 'none'; // Ocultar las sugerencias
          });
          sugerenciasReferido.appendChild(li);
      });
      sugerenciasReferido.style.display = 'block'; // Mostrar la lista de sugerencias
  }
});


// Elementos del DOM
const referidoInput = document.getElementById("referido_por");
const sugerenciasList = document.getElementById("referido_sugg");

// Función para mostrar las sugerencias
function mostrarSugerencias() {
    const valorInput = referidoInput.value.toLowerCase();
    sugerenciasList.innerHTML = ""; // Limpiar las sugerencias anteriores

    // Si el campo está vacío, mostrar todas las opciones
    const sugerenciasFiltradas = valorInput
        ? referidoPorOpciones.filter(opcion => opcion.toLowerCase().includes(valorInput))
        : referidoPorOpciones;

    // Mostrar las sugerencias filtradas
    sugerenciasFiltradas.forEach(opcion => {
        const li = document.createElement("li");
        li.classList.add("list-group-item", "autocomplete-suggestion");
        li.textContent = opcion;

        // Añadir evento de clic para seleccionar la sugerencia
        li.addEventListener("click", function () {
            referidoInput.value = opcion;  // Establecer el valor seleccionado en el input
            sugerenciasList.innerHTML = ""; // Limpiar las sugerencias
        });

        sugerenciasList.appendChild(li); // Añadir la sugerencia a la lista
    });
}

// Escuchar el evento de entrada en el campo de texto
referidoInput.addEventListener("input", mostrarSugerencias);

// Mostrar la lista completa de sugerencias cuando el campo recibe foco
referidoInput.addEventListener("focus", mostrarSugerencias);

// Opcional: Ocultar sugerencias cuando el campo pierde el foco
referidoInput.addEventListener("blur", function () {
    setTimeout(() => sugerenciasList.innerHTML = "", 200); // Retraso para permitir selección
});




// Lista de CLUES para el autocompletado
const cluesOpciones = [
    "CLUES1",
    "CLUES2",
    "CLUES3",
    // Agrega todas las CLUES necesarias aquí
];

// Referencias a los elementos del DOM
let referidoPorInput = document.getElementById('referido_por');
let referidoPorSuggestions = document.getElementById('referido_sugg');
let unidadMedicaEspecifique = document.getElementById('unidadMedicaEspecifique');
let cluesU = document.getElementById('cluesU');
let cluesUInput = document.getElementById('cluesU');
let cluesUSuggestions = document.getElementById('cluesU_suggestions');

// Función para manejar el autocompletado y otras funcionalidades
function manejarAutocompletadoReferidoPor() {
    // Autocompletado para 'Referida(o) por'
    referidoPorInput.addEventListener('input', function() {
        let valor = referidoPorInput.value.toLowerCase();
        referidoPorSuggestions.innerHTML = '';

        const opcionesFiltradas = referidoPorOpciones.filter(opcion => opcion.toLowerCase().includes(valor));

        if (opcionesFiltradas.length > 0) {
            referidoPorSuggestions.style.display = 'block';
            opcionesFiltradas.forEach(opcion => {
                const li = document.createElement('li');
                li.textContent = opcion;
                li.classList.add('list-group-item');
                li.style.cursor = 'pointer';
                li.addEventListener('click', function() {
                    referidoPorInput.value = opcion;
                    referidoPorSuggestions.style.display = 'none';
                    
                    // Mostrar/ocultar campos adicionales según la opción seleccionada
                    if (opcion === 'Unidad médica') {
                        unidadMedicaEspecifique.style.display = 'block';
                        cluesU.style.display = 'block';
                    } else {
                        unidadMedicaEspecifique.style.display = 'none';
                        cluesU.style.display = 'none';
                    }
                });
                referidoPorSuggestions.appendChild(li);
            });
        } else {
            referidoPorSuggestions.style.display = 'none';
        }
    });

    // Autocompletado para CLUES
    cluesUInput.addEventListener('input', function() {
        let valor = cluesUInput.value.toLowerCase();
        cluesUSuggestions.innerHTML = '';

        const opcionesFiltradas = cluesOpciones.filter(clues => clues.toLowerCase().includes(valor));

        if (opcionesFiltradas.length > 0) {
            cluesUSuggestions.style.display = 'block';
            opcionesFiltradas.forEach(opcion => {
                const li = document.createElement('li');
                li.textContent = opcion;
                li.classList.add('list-group-item');
                li.style.cursor = 'pointer';
                li.addEventListener('click', function() {
                    cluesUInput.value = opcion;
                    cluesUSuggestions.style.display = 'none';
                });
                cluesUSuggestions.appendChild(li);
            });
        } else {
            cluesUSuggestions.style.display = 'none';
        }
    });

    referidoPorInput.addEventListener('blur', function() {
        setTimeout(() => {
            referidoPorSuggestions.style.display = 'none';
        }, 200);
    });

    cluesUInput.addEventListener('blur', function() {
        setTimeout(() => {
            cluesUSuggestions.style.display = 'none';
        }, 200);
    });
}

// Ejecutar la función de manejo del autocompletado para 'Referida(o) por'
document.addEventListener('DOMContentLoaded', manejarAutocompletadoReferidoPor);
