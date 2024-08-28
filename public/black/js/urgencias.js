// Lista de países del mundo
const paises = [
    "Afganistan", "Albania", "Alemania", "Andorra", "Angola", "Antigua y Barbuda", 
    "Arabia Saudita", "Argelia", "Argentina", "Armenia", "Australia", "Austria", 
    "Azerbaiyan", "Bahamas", "Banglades", "Barbados", "Barein", "Belgica", 
    "Belice", "Benin", "Bielorrusia", "Birmania", "Bolivia", "Bosnia y Herzegovina", 
    "Botsuana", "Brasil", "Brunei", "Bulgaria", "Burkina Faso", "Burundi", 
    "Butan", "Cabo Verde", "Camboya", "Camerun", "Canada", "Catar", "Chad", 
    "Chile", "China", "Chipre", "Ciudad del Vaticano", "Colombia", "Comoras", 
    "Corea del Norte", "Corea del Sur", "Costa de Marfil", "Costa Rica", "Croacia", 
    "Cuba", "Dinamarca", "Dominica", "Ecuador", "Egipto", "El Salvador", 
    "Emiratos Arabes Unidos", "Eritrea", "Eslovaquia", "Eslovenia", "Espana", 
    "Estados Unidos", "Estonia", "Esuatini", "Etiopia", "Fiyi", "Filipinas", 
    "Finlandia", "Francia", "Gabon", "Gambia", "Georgia", "Ghana", "Granada", 
    "Grecia", "Guatemala", "Guinea", "Guinea Bisau", "Guinea Ecuatorial", "Guyana", 
    "Haiti", "Honduras", "Hungria", "India", "Indonesia", "Irak", "Iran", 
    "Irlanda", "Islandia", "Islas Marshall", "Islas Salomon", "Israel", "Italia", 
    "Jamaica", "Japon", "Jordania", "Kazajistan", "Kenia", "Kirguistan", 
    "Kiribati", "Kosovo", "Kuwait", "Laos", "Lesoto", "Letonia", "Libano", 
    "Liberia", "Libia", "Liechtenstein", "Lituania", "Luxemburgo", "Madagascar", 
    "Malasia", "Malaui", "Maldivas", "Mali", "Malta", "Marruecos", "Mauricio", 
    "Mauritania", "Mexico", "Micronesia", "Moldavia", "Monaco", "Mongolia", 
    "Montenegro", "Mozambique", "Namibia", "Nauru", "Nepal", "Nicaragua", 
    "Niger", "Nigeria", "Noruega", "Nueva Zelanda", "Oman", "Paises Bajos", 
    "Pakistan", "Palaos", "Panama", "Papua Nueva Guinea", "Paraguay", "Peru", 
    "Polonia", "Portugal", "Reino Unido", "Republica Centroafricana", 
    "Republica Checa", "Republica del Congo", "Republica Democratica del Congo", 
    "Republica Dominicana", "Ruanda", "Rumania", "Rusia", "Samoa", "San Cristobal y Nieves", 
    "San Marino", "San Vicente y las Granadinas", "Santa Lucia", "Santo Tome y Principe", 
    "Senegal", "Serbia", "Seychelles", "Sierra Leona", "Singapur", "Siria", 
    "Somalia", "Sri Lanka", "Sudafrica", "Sudan", "Sudan del Sur", "Suecia", 
    "Suiza", "Surinam", "Tailandia", "Tanzania", "Tayikistan", "Timor Oriental", 
    "Togo", "Tonga", "Trinidad y Tobago", "Tunez", "Turkmenistan", "Turquia", 
    "Tuvalu", "Ucrania", "Uganda", "Uruguay", "Uzbekistan", "Vanuatu", 
    "Venezuela", "Vietnam", "Yemen", "Yibuti", "Zambia", "Zimbabue"
  ];
  
  
  let sugerencias_pais = document.getElementById('sugerencias_entidad_nacimiento');
  let input_pais = document.getElementById('entidad_nacimiento');
  
  // Función para mostrar sugerencias
  input_pais.addEventListener('input', function() {
    let valor = input_pais.value.toLowerCase();
    sugerencias_pais.innerHTML = ''; 
  
    const opcionesFiltradas = paises.filter(pais => pais.toLowerCase().includes(valor));
  
    if (opcionesFiltradas.length > 0) {
        sugerencias_pais.style.display = 'block';
        opcionesFiltradas.forEach(opcion => {
            const li = document.createElement('li');
            li.textContent = opcion;
            li.classList.add('list-group-item'); 
            li.style.cursor = 'pointer';
            li.addEventListener('click', function() {
                input_pais.value = opcion;
                sugerencias_pais.style.display = 'none';
            });
            sugerencias_pais.appendChild(li);
        });
    } else {
        sugerencias_pais.style.display = 'none';
    }
  });
  
  
  input_pais.addEventListener('blur', function() {
    setTimeout(() => {
        sugerencias_pais.style.display = 'none';
    }, 200);
  });
  
  
  input_pais.addEventListener('focus', function() {
    if (input_pais.value === '') {
        sugerencias_pais.innerHTML = '';
        paises.forEach(opcion => {
            const li = document.createElement('li');
            li.textContent = opcion;
            li.classList.add('list-group-item');
            li.style.cursor = 'pointer';
            li.addEventListener('click', function() {
                input_pais.value = opcion;
                sugerencias_pais.style.display = 'none';
            });
            sugerencias_pais.appendChild(li);
        });
        sugerencias_pais.style.display = 'block';
    }
  });
  
  
// Lógica para AC en input's select's (VIALIDAD, ASENTAMIENTO)
document.addEventListener('DOMContentLoaded', function() {
  const opcionesPorInput = {
      'tipo_vialidad': [
          "AMPLIACIÓN", "ANDADOR", "AVENIDA", "BOULEVARD", "CALLE", "CALLEJON", 
          "CALZADA", "CERRADA", "CIRCUITO", "CIRCUNVALACIÓN", "CONTINUACIÓN", 
          "CORREDOR", "DIAGONAL", "EJE VIAJAL", "PASAJE", "PEATONAL", "PERIFÉRICO", 
          "PRIVADA", "PROLONGACIÓN", "RETORNO", "VIADUCTO", "NINGUNO", "CAMINO", 
          "CARRETERA", "LIBRAMIENTO", "PASEO", "NO APLICA", "SIN INFORMACIÓN", 
          "NO ESPECIFICADO"
      ],
      'tipo_asentamiento': [
          "AEROPUERTO", "AMPLIACIÓN", "BARRIO", "CANTÓN", "CIUDAD", "CIUDAD INDUSTRIAL", 
          "COLONIA", "CONDOMINIO", "CONJUNTO HABITACIONAL", "CORREDOR INDUSTRIAL", 
          "COTO", "CUARTEL", "EJIDO", "EXHACIENDA", "FRACCIÓN", "FRACCIONAMIENTO", 
          "GRANJA", "HACIENDA", "INGENIO", "MANZANA", "PARAJE", "PARQUE INDUSTRIAL", 
          "PRIVADA", "PROLONGACIÓN", "PUEBLO", "PUERTO", "RANCHERÍA", "RANCHO", 
          "REGIÓN", "RESIDENCIAL", "RINCONADA", "SECCIÓN", "SECTOR", "SUPERMANZANA", 
          "UNIDAD", "UNIDAD HABITACIONAL", "VILLA", "ZONA FEDERAL", "ZONA INDUSTRIAL", 
          "ZONA MILITAR", "ZONA NAVAL", "NINGUNO", "CARRETERA", "NO APLICA", 
          "SE IGNORA", "NO ESPECIFICADO", "ZONA COMERCIAL", "LOCALIDAD"
      ],
      'servicio_atencion': [
        "1. CONSULTA EXTERNA", "2. HOSPITALIZACIÓN", "3. URGENCIAS", "4. SERVICIO ESPECIALIZADO DE ATENCIÓN A LA VIOLENCIA", "5. OTRO SERVICIO (ESPECIFIQUE)"
      ],
      'tipo_atencion': [
        "1. MEDICA", "2. PSICOLÓGICA", "3. QUIRÚRGICA", "4. PSIQUIÁTRICA", "5. CONSEJERÍA", "6. OTRO", "7. PÍLDORA ANTICONCEPTIVA DE EMERGENCIA", "8. PROFILAXIS VIH", "9. PROFILAXIS OTRAS ITS", "10. IVE (INTERRUPCIÓN VOLUNTARIA DEL EMBARAZO)", "11. VACUNA VPH"
      ],
      'area_gravedad': [
        "1. CABEZA", "2. CARGA", "3. REGIÓN OCULAR", "4. CUELLO", "5. COLUMNA VERTEBRAL", "6. EXTREMIDADES SUPERIORES", "7. MANO", "8. TÓRAX", "9. ESPALDO Y/O GLÚTEOS", "10. ABDOMEN", "11. PELVIS", "12. REGIÓN GENITAL", "13. EXTREMIDADES INFERIORES", "14. PIES", "15. MÚLTIPLES", "16. OTRO (ESPECIFIQUE)"
      ],
      'consecuencia_gravedad': [
        "1. LACERACIÓN/ABRASIÓN", "2. APLASTAMIENTO", "3. CICATRICES", "4. DEPRESIÓN", "5. CONTUSIÓN/MALLUGAMIENTO", "6. CONGELAMIENTO", "7. ABORTO", "8. TRASTORNOS DE ANSIEDAD/ESTRÉS POSTRAUMÁTICO", "9. QUEMADURA/CORROSIÓN", "10. ASFIXIA", "11. EMBARAZO", "12. TRASTORNOS PSIQUIÁTRICOS", "13. LUXACIÓN/ESGUINCE", "14. HERIDA", "15. INFECCIÓN DE TRANSMISIÓN SEXUAL", "16. MÚLTIPLE", "17. AMPUTACIÓN/AVULSIÓN", "18. FRACTURA", "19. DEFUNCIÓN", "20. MALESTAR EMOCIONAL", "21. TRASTORNO DEL ESTADO DE ÁNIMO", "22. OTRO (ESPECIFIQUE)"]
      // Puedes agregar más opciones para otros inputs si es necesario
  };

  document.querySelectorAll('.autocomplete-container').forEach(function(container) {
      const input = container.querySelector('.autocomplete-input');
      const sugerencias = container.querySelector('.autocomplete-suggestions');
      let seleccionAnterior = '';

      const opciones = opcionesPorInput[input.id] || [];

      input.addEventListener('input', function () {
          const filtro = input.value.toLowerCase();
          sugerencias.innerHTML = '';
          const opcionesFiltradas = opciones.filter(option => option.toLowerCase().includes(filtro));

          if (opcionesFiltradas.length > 0) {
              sugerencias.style.display = 'block';
              opcionesFiltradas.forEach(option => {
                  const li = document.createElement('li');
                  li.textContent = option;
                  li.style.fontWeight = (option === seleccionAnterior) ? 'bold' : 'normal';
                  li.addEventListener('mousedown', function () {
                      seleccionarOpcion(input, sugerencias, option);
                  });
                  sugerencias.appendChild(li);
              });
          } else {
              sugerencias.style.display = 'none';
          }
      });

      input.addEventListener('focus', function () {
          if (input.value === seleccionAnterior) {
              input.value = '';
          }
          sugerencias.innerHTML = '';
          opciones.forEach(option => {
              const li = document.createElement('li');
              li.textContent = option;
              li.style.fontWeight = (option === seleccionAnterior) ? 'bold' : 'normal';
              li.addEventListener('mousedown', function () {
                  seleccionarOpcion(input, sugerencias, option);
              });
              sugerencias.appendChild(li);
          });
          sugerencias.style.display = 'block';
      });

      input.addEventListener('blur', function () {
          setTimeout(() => {
              const filtro = input.value.toLowerCase();
              const opcionCercana = opciones.find(option => option.toLowerCase().includes(filtro));

              if (opcionCercana) {
                  seleccionarOpcion(input, sugerencias, opcionCercana);
              } else if (!input.value) {
                  input.value = '';
              }

              sugerencias.style.transition = 'opacity 0.3s';
              sugerencias.style.opacity = '0';
              setTimeout(() => {
                  sugerencias.style.display = 'none';
                  sugerencias.style.opacity = '1';
              }, 300);
          }, 200);
      });

      function seleccionarOpcion(input, sugerencias, option) {
          seleccionAnterior = option;
          input.value = option;
          input.placeholder = option;
          sugerencias.style.display = 'none';
      }
  });
});

// Lógica para AC en input's select's (Alta por)
document.addEventListener('DOMContentLoaded', function() {
  const opcionesPorInput = {
      'alta_por': [
        "0. Hospitalización", "1. Consulta Externa", "2. Traslado a otra unidad", "3. Domicilio", "4. Defunción", "5. Fuga", "6. Voluntad"
      ]
  };

  document.querySelectorAll('.autocomplete-container').forEach(function(container) {
      const input = container.querySelector('.autocomplete-input');
      const sugerencias = container.querySelector('.autocomplete-suggestions');
      let seleccionAnterior = '';

      const opciones = opcionesPorInput[input.id] || [];

      input.addEventListener('input', function () {
          const filtro = input.value.toLowerCase();
          sugerencias.innerHTML = '';
          const opcionesFiltradas = opciones.filter(option => option.toLowerCase().includes(filtro));

          if (opcionesFiltradas.length > 0) {
              sugerencias.style.display = 'block';
              opcionesFiltradas.forEach(option => {
                  const li = document.createElement('li');
                  li.textContent = option;
                  li.style.fontWeight = (option === seleccionAnterior) ? 'bold' : 'normal';
                  li.addEventListener('mousedown', function () {
                      seleccionarOpcion(input, sugerencias, option);
                  });
                  sugerencias.appendChild(li);
              });
          } else {
              sugerencias.style.display = 'none';
          }
      });

      input.addEventListener('focus', function () {
          if (input.value === seleccionAnterior) {
              input.value = '';
          }
          sugerencias.innerHTML = '';
          opciones.forEach(option => {
              const li = document.createElement('li');
              li.textContent = option;
              li.style.fontWeight = (option === seleccionAnterior) ? 'bold' : 'normal';
              li.addEventListener('mousedown', function () {
                  seleccionarOpcion(input, sugerencias, option);
              });
              sugerencias.appendChild(li);
          });
          sugerencias.style.display = 'block';
      });

      input.addEventListener('blur', function () {
          setTimeout(() => {
              const filtro = input.value.toLowerCase();
              const opcionCercana = opciones.find(option => option.toLowerCase().includes(filtro));

              if (opcionCercana) {
                  seleccionarOpcion(input, sugerencias, opcionCercana);
              } else if (!input.value) {
                  input.value = '';
              }

              sugerencias.style.transition = 'opacity 0.3s';
              sugerencias.style.opacity = '0';
              setTimeout(() => {
                  sugerencias.style.display = 'none';
                  sugerencias.style.opacity = '1';
              }, 300);
          }, 200);
      });

      function seleccionarOpcion(input, sugerencias, option) {
          seleccionAnterior = option;
          input.value = option;
          input.placeholder = option;
          sugerencias.style.display = 'none';
      }
  });
});
