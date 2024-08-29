// Lista de afiliaciones
const afiliaciones = [
    "No especificado", 
    "Ninguna", 
    "IMSS", 
    "ISSSTE", 
    "PEMEX", 
    "SEDENA", 
    "SEMAR", 
    "OTRA", 
    "IMSS Bienestar", 
    "ISSFAM", 
    "OPD IMSS Bienestar", 
    "Se ignora", 
    "Especifique"
];

// Referencias a los elementos del DOM
let sugerencias_afiliacion = document.getElementById('sugerencias_afiliacion');
let input_afiliacion = document.getElementById('afiliacion_input');
let especificarCampo = document.getElementById('afiliacionEspecifique');
let numeroAfiliacion = document.getElementById('numero_afiliacion'); // Campo de Número de Afiliación

// Función para manejar el autocompletado y otras funcionalidades
function manejarAutocompletado() {
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
                    
                    // Mostrar el campo adicional si se selecciona 'Especifique'
                    if (opcion === 'Especifique') {
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

    numeroAfiliacion.addEventListener('input', function() {
        let valor = numeroAfiliacion.value;
        
        // Limitar a 11 dígitos
        if (valor.length > 11) {
            numeroAfiliacion.value = valor.slice(0, 11);
        }
    });

    input_afiliacion.addEventListener('blur', function() {
        setTimeout(() => {
            sugerencias_afiliacion.style.display = 'none';
        }, 200);
    });
}

// Ejecutar la función de manejo del autocompletado
document.addEventListener('DOMContentLoaded', manejarAutocompletado);

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
let cluesU = document.getElementById('CluesU');
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
