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

// INTERCONSULTA
 
  document.addEventListener('DOMContentLoaded', function () {
  const interconsultaSelect = document.getElementById('interconsulta_select');
  const additionalFields = document.getElementById('interconsultaRow2');

  // Event listener para el cambio de selección en el dropdown de interconsulta
  interconsultaSelect.addEventListener('change', function () {
      if (interconsultaSelect.value === "1") { // Si la opción es "SI"
          additionalFields.style.display = ''; // Muestra los campos
      } else { // Si la opción es "NO"
          additionalFields.style.display = 'none'; // Oculta los campos
      }
  });
});
//-------------------------------------------------------------------------------------------------------------------------------------------
// Estado/municipio/localidad
const data = {
    "aguascalientes": ["Aguascalientes", "Asientos", "Calvillo", "Cosio", "El Llano", "Jesus Maria", "Pabellon de Arteaga", "Rincon de Romos", "San Francisco de los Romo", "San Jose de Gracia", "Tepezala"],
    "bajacalifornia": ["Ensenada", "Mexicali", "Playas de Rosarito", "Tecate", "Tijuana"],
    "bajacaliforniasur": ["Comondu", "La Paz", "Loreto", "Los Cabos", "Mulege"],
    "campeche": ["Calakmul", "Calkini", "Campeche", "Candelaria", "Carmen", "Champoton", "Escarcega", "Hecelchakan", "Hopelchen", "Palizada", "Tenabo"],
    "coahuila": ["Abasolo","Acuna","Allende","Arteaga","Candela","Castanos","Cuatro Cienegas","Escobedo","Francisco I. Madero","Frontera","General Cepeda","Guerrero","Hidalgo","Jimenez","Juarez","Lamadrid","Matamoros","Monclova","Morelos","Muzquiz","Nadadores","Nava","Ocampo","Parras","Piedras Negras","Progreso","Ramos Arizpe","Sabinas","Sacramento","Saltillo","San Buenaventura","San Juan de Sabinas","San Pedro","Sierra Mojada","Torreon","Viesca","Villa Union","Zaragoza"],
  "colima": ["Armeria","Colima","Comala","Coquimatlan","Cuauhtemoc","Ixtlahuacan","Manzanillo","Minatitlan","Tecoman","Villa de Alvarez"],
  "chiapas": ["Acacoyagua","Acala","Acapetahua","Aldama","Altamirano","Amatenango de la Frontera","Amatenango del Valle","Amatan","Angel Albino Corzo","Arriaga","Bejucal de Ocampo","Bella Vista","Benemerito de las Americas","Berriozabal","Bochil","Cacahoatan","Capitan Luis Angel Vidal","Catazaja","Chalchihuitan","Chamula","Chanal","Chapultenango","Chenalho","Chiapa de Corzo","Chiapilla","Chicoasen","Chicomuselo","Chilon","Cintalapa","Coapilla","Comitan de Dominguez","Copainala","El Bosque","El Parral","El Porvenir","Emiliano Zapata","Escuintla","Francisco Leon","Frontera Comalapa","Frontera Hidalgo","Huehuetan","Huitiupan","Huixtla","Huixtan","Ixhuatan","Ixtacomitan","Ixtapa","Ixtapangajoya","Jiquipilas","Jitotol","Juarez","La Concordia","La Grandeza","La Independencia","La Libertad","La Trinitaria","Larrainzar","Las Margaritas","Las Rosas","Mapastepec","Maravilla Tenejapa","Marques de Comillas","Mazapa de Madero","Mazatan","Metapa","Mezcalapa","Mitontic","Montecristo de Guerrero","Motozintla","Nicolas Ruiz","Ocosingo","Ocotepec","Ocozocoautla de Espinosa","Ostuacan","Osumacinta","Oxchuc","Palenque","Pantelho","Pantepec","Pichucalco","Pijijiapan","Pueblo Nuevo Solistahuacan","Rayon","Reforma","Rincon Chamula San Pedro","Sabanilla","Salto de Agua","San Andres Duraznal","San Cristobal de las Casas","San Fernando","San Juan Cancuc","San Lucas","Santiago el Pinar","Siltepec","Simojovel","Sitala","Socoltenango","Solosuchiapa","Soyalo","Suchiapa","Suchiate","Sunuapa","Tapachula","Tapalapa","Tapilula","Tecpatan","Tenejapa","Teopisca","Tila","Tonala","Totolapa","Tumbala","Tuxtla Chico","Tuxtla Gutierrez","Tuzantan","Tzimol","Union Juarez","Venustiano Carranza","Villa Comaltitlan","Villa Corzo","Villaflores","Yajalon","Zinacantan"],
  "chihuahua": ["Ahumada","Aldama","Allende","Aquiles Serdan","Ascension","Bachiniva","Balleza","Batopilas de Manuel Gomez Morin","Bocoyna","Buenaventura","Camargo","Carichi","Casas Grandes","Chihuahua","Chinipas","Coronado","Coyame del Sotol","Cuauhtemoc","Cusihuiriachi","Delicias","Dr. Belisario Dominguez","El Tule","Galeana","Gran Morelos","Guachochi","Guadalupe y Calvo","Guadalupe","Guazapares","Guerrero","Gomez Farias","Hidalgo del Parral","Huejotitan","Ignacio Zaragoza","Janos","Jimenez","Julimes","Juarez","La Cruz","Lopez","Madera","Maguarichi","Manuel Benavides","Matachi","Matamoros","Meoqui","Morelos","Moris","Namiquipa","Nonoava","Nuevo Casas Grandes","Ocampo","Ojinaga","Praxedis G. Guerrero","Riva Palacio","Rosales","Rosario","San Francisco de Borja","San Francisco de Conchos","San Francisco del Oro","Santa Barbara","Santa Isabel","Satevo","Saucillo","Temosachic","Urique","Uruachi","Valle de Zaragoza"],
  "ciudaddemexico": ["Alvaro Obregon","Azcapotzalco","Benito Juarez","Coyoacan","Cuajimalpa de Morelos","Cuauhtemoc","Gustavo A. Madero","Iztacalco","Iztapalapa","La Magdalena Contreras","Miguel Hidalgo","Milpa Alta","Tlalpan","Tlahuac","Venustiano Carranza","Xochimilco"],
  "durango": ["Canatlan","Canelas","Coneto de Comonfort","Cuencame","Durango","El Oro","General Simon Bolivar","Gomez Palacio","Guadalupe Victoria","Guanacevi","Hidalgo","Inde","Lerdo","Mapimi","Mezquital","Nazas","Nombre de Dios","Nuevo Ideal","Ocampo","Otaez","Panuco de Coronado","Penon Blanco","Poanas","Pueblo Nuevo","Rodeo","San Bernardo","San Dimas","San Juan de Guadalupe","San Juan del Rio","San Luis del Cordero","San Pedro del Gallo","Santa Clara","Santiago Papasquiaro","Suchil","Tamazula","Tepehuanes","Tlahualilo","Topia","Vicente Guerrero"],
  "guanajuato": ["Abasolo","Acambaro","Apaseo el Alto","Apaseo el Grande","Atarjea","Celaya","Comonfort","Coroneo","Cortazar","Cueramaro","Doctor Mora","Dolores Hidalgo Cuna de la Independencia Nacional","Guanajuato","Huanimaro","Irapuato","Jaral del Progreso","Jerecuaro","Leon","Manuel Doblado","Moroleon","Ocampo","Penjamo","Pueblo Nuevo","Purisima del Rincon","Romita","Salamanca","Salvatierra","San Diego de la Union","San Felipe","San Francisco del Rincon","San Jose Iturbide","San Luis de la Paz","San Miguel de Allende","Santa Catarina","Santa Cruz de Juventino Rosas","Santiago Maravatio","Silao de la Victoria","Tarandacuao","Tarimoro","Tierra Blanca","Uriangato","Valle de Santiago","Victoria","Villagran","Xichu","Yuriria"],
  "guerrero": ["Acapulco de Juarez","Acatepec","Ahuacuotzingo","Ajuchitlan del Progreso","Alcozauca de Guerrero","Alpoyeca","Apaxtla","Arcelia","Atenango del Rio","Atlamajalcingo del Monte","Atlixtac","Atoyac de Alvarez","Ayutla de los Libres","Azoyu","Benito Juarez","Buenavista de Cuellar","Chilapa de Alvarez","Chilpancingo de los Bravo","Coahuayutla de Jose Maria Izazaga","Cochoapa el Grande","Cocula","Copala","Copalillo","Copanatoyac","Coyuca de Benitez","Coyuca de Catalan","Cuajinicuilapa","Cualac","Cuautepec","Cuetzala del Progreso","Cutzamala de Pinzon","Eduardo Neri","Florencio Villarreal","General Canuto A. Neri","General Heliodoro Castillo","Huamuxtitlan","Huitzuco de los Figueroa","Iguala de la Independencia","Igualapa","Iliatenco","Ixcateopan de Cuauhtemoc","Jose Joaquin de Herrera","Juan R. Escudero","Juchitan","La Union de Isidoro Montes de Oca","Leonardo Bravo","Malinaltepec","Marquelia","Martir de Cuilapan","Metlatonoc","Mochitlan","Olinala","Ometepec","Pedro Ascencio Alquisiras","Petatlan","Pilcaya","Pungarabato","Quechultenango","San Luis Acatlan","San Marcos","San Miguel Totolapan","Taxco de Alarcon","Tecoanapa","Tecpan de Galeana","Teloloapan","Tepecoacuilco de Trujano","Tetipac","Tixtla de Guerrero","Tlacoachistlahuaca","Tlacoapa","Tlalchapa","Tlalixtaquilla de Maldonado","Tlapa de Comonfort","Tlapehuala","Xalpatlahuac","Xochihuehuetlan","Xochistlahuaca","Zapotitlan Tablas","Zihuatanejo de Azueta","Zirandaro","Zitlala"],
  "hidalgo": ["Acatlan","Acaxochitlan","Actopan","Agua Blanca de Iturbide","Ajacuba","Alfajayucan","Almoloya","Apan","Atitalaquia","Atlapexco","Atotonilco de Tula","Atotonilco el Grande","Calnali","Cardonal","Chapantongo","Chapulhuacan","Chilcuautla","Cuautepec de Hinojosa","El Arenal","Eloxochitlan","Emiliano Zapata","Epazoyucan","Francisco I. Madero","Huasca de Ocampo","Huautla","Huazalingo","Huehuetla","Huejutla de Reyes","Huichapan","Ixmiquilpan","Jacala de Ledezma","Jaltocan","Juarez Hidalgo","La Mision","Lolotla","Metepec","Metztitlan","Mineral de la Reforma","Mineral del Chico","Mineral del Monte","Mixquiahuala de Juarez","Molango de Escamilla","Nicolas Flores","Nopala de Villagran","Omitlan de Juarez","Pachuca de Soto","Pacula","Pisaflores","Progreso de Obregon","San Agustin Metzquititlan","San Agustin Tlaxiaca","San Bartolo Tutotepec","San Felipe Orizatlan","San Salvador","Santiago Tulantepec de Lugo Guerrero","Santiago de Anaya","Singuilucan","Tasquillo","Tecozautla","Tenango de Doria","Tepeapulco","Tepehuacan de Guerrero","Tepeji del Rio de Ocampo","Tepetitlan","Tetepango","Tezontepec de Aldama","Tianguistengo","Tizayuca","Tlahuelilpan","Tlahuiltepa","Tlanalapa","Tlanchinol","Tlaxcoapan","Tolcayuca","Tula de Allende","Tulancingo de Bravo","Villa de Tezontepec","Xochiatipan","Xochicoatlan","Yahualica","Zacualtipan de Angeles","Zapotlan de Juarez","Zempoala","Zimapan"],
  "jalisco": ["Acatic","Acatlan de Juarez","Ahualulco de Mercado","Amacueca","Amatitan","Ameca","Arandas","Atemajac de Brizuela","Atengo","Atenguillo","Atotonilco el Alto","Atoyac","Autlan de Navarro","Ayotlan","Ayutla","Bolanos","Cabo Corrientes","Canadas de Obregon","Casimiro Castillo","Chapala","Chimaltitan","Chiquilistlan","Cihuatlan","Cocula","Colotlan","Concepcion de Buenos Aires","Cuautitlan de Garcia Barragan","Cuautla","Cuquio","Degollado","Ejutla","El Arenal","El Grullo","El Limon","El Salto","Encarnacion de Diaz","Etzatlan","Gomez Farias","Guachinango","Guadalajara","Hostotipaquillo","Huejucar","Huejuquilla el Alto","Ixtlahuacan de los Membrillos","Ixtlahuacan del Rio","Jalostotitlan","Jamay","Jesus Maria","Jilotlan de los Dolores","Jocotepec","Juanacatlan","Juchitlan","La Barca","La Huerta","La Manzanilla de la Paz","Lagos de Moreno","Magdalena","Mascota","Mazamitla","Mexticacan","Mezquitic","Mixtlan","Ocotlan","Ojuelos de Jalisco","Pihuamo","Poncitlan","Puerto Vallarta","Quitupan","San Cristobal de la Barranca","San Diego de Alejandria","San Gabriel","San Ignacio Cerro Gordo","San Juan de los Lagos","San Juanito de Escobedo","San Julian","San Marcos","San Martin Hidalgo","San Martin de Bolanos","San Miguel el Alto","San Pedro Tlaquepaque","San Sebastian del Oeste","Santa Maria de los Angeles","Santa Maria del Oro","Sayula","Tala","Talpa de Allende","Tamazula de Gordiano","Tapalpa","Tecalitlan","Techaluta de Montenegro","Tecolotlan","Tenamaxtlan","Teocaltiche","Teocuitatlan de Corona","Tepatitlan de Morelos","Tequila","Teuchitlan","Tizapan el Alto","Tlajomulco de Zuniga","Toliman","Tomatlan","Tonala","Tonaya","Tonila","Totatiche","Tototlan","Tuxcacuesco","Tuxcueca","Tuxpan","Union de San Antonio","Union de Tula","Valle de Guadalupe","Valle de Juarez","Villa Corona","Villa Guerrero","Villa Hidalgo","Villa Purificacion","Yahualica de Gonzalez Gallo","Zacoalco de Torres","Zapopan","Zapotiltic","Zapotitlan de Vadillo","Zapotlan del Rey","Zapotlan el Grande","Zapotlanejo"],
  "estadodemexico": ["Acambay de Ruiz Castaneda","Acolman","Aculco","Almoloya de Alquisiras","Almoloya de Juarez","Almoloya del Rio","Amanalco","Amatepec","Amecameca","Apaxco","Atenco","Atizapan de Zaragoza","Atizapan","Atlacomulco","Atlautla","Axapusco","Ayapango","Calimaya","Capulhuac","Chalco","Chapa de Mota","Chapultepec","Chiautla","Chicoloapan","Chiconcuac","Chimalhuacan","Coacalco de Berriozabal","Coatepec Harinas","Cocotitlan","Coyotepec","Cuautitlan Izcalli","Cuautitlan","Donato Guerra","Ecatepec de Morelos","Ecatzingo","El Oro","Huehuetoca","Hueypoxtla","Huixquilucan","Isidro Fabela","Ixtapaluca","Ixtapan de la Sal","Ixtapan del Oro","Ixtlahuaca","Jaltenco","Jilotepec","Jilotzingo","Jiquipilco","Jocotitlan","Joquicingo","Juchitepec","La Paz","Lerma","Luvianos","Malinalco","Melchor Ocampo","Metepec","Mexicaltzingo","Morelos","Naucalpan de Juarez","Nextlalpan","Nezahualcoyotl","Nicolas Romero","Nopaltepec","Ocoyoacac","Ocuilan","Otumba","Otzoloapan","Otzolotepec","Ozumba","Papalotla","Polotitlan","Rayon","San Antonio la Isla","San Felipe del Progreso","San Jose del Rincon","San Martin de las Piramides","San Mateo Atenco","San Simon de Guerrero","Santo Tomas","Soyaniquilpan de Juarez","Sultepec","Tecamac","Tejupilco","Temamatla","Temascalapa","Temascalcingo","Temascaltepec","Temoaya","Tenancingo","Tenango del Aire","Tenango del Valle","Teoloyucan","Teotihuacan","Tepetlaoxtoc","Tepetlixpa","Tepotzotlan","Tequixquiac","Texcaltitlan","Texcalyacac","Texcoco","Tezoyuca","Tianguistenco","Timilpan","Tlalmanalco","Tlalnepantla de Baz","Tlatlaya","Toluca","Tonanitla","Tonatico","Tultepec","Tultitlan","Valle de Bravo","Valle de Chalco Solidaridad","Villa Guerrero","Villa Victoria","Villa de Allende","Villa del Carbon","Xalatlaco","Xonacatlan","Zacazonapan","Zacualpan","Zinacantepec","Zumpahuacan","Zumpango"],
  "michoacan": ["Acuitzio","Aguililla","Alvaro Obregon","Angamacutiro","Angangueo","Apatzingan","Aporo","Aquila","Ario","Arteaga","Brisenas","Buenavista","Caracuaro","Charapan","Charo","Chavinda","Cheran","Chilchota","Chinicuila","Chucandiro","Churintzio","Churumuco","Coahuayana","Coalcoman de Vazquez Pallares","Coeneo","Cojumatlan de Regules","Contepec","Copandaro","Cotija","Cuitzeo","Ecuandureo","Epitacio Huerta","Erongaricuaro","Gabriel Zamora","Hidalgo","Huandacareo","Huaniqueo","Huetamo","Huiramba","Indaparapeo","Irimbo","Ixtlan","Jacona","Jimenez","Jiquilpan","Jose Sixto Verduzco","Juarez","Jungapeo","La Huacana","La Piedad","Lagunillas","Lazaro Cardenas","Los Reyes","Madero","Maravatio","Marcos Castellanos","Morelia","Morelos","Mugica","Nahuatzen","Nocupetaro","Nuevo Parangaricutiro","Nuevo Urecho","Numaran","Ocampo","Pajacuaran","Panindicuaro","Paracho","Paracuaro","Patzcuaro","Penjamillo","Periban","Purepero","Puruandiro","Querendaro","Quiroga","Sahuayo","Salvador Escalante","San Lucas","Santa Ana Maya","Senguio","Susupuato","Tacambaro","Tancitaro","Tangamandapio","Tangancicuaro","Tanhuato","Taretan","Tarimbaro","Tepalcatepec","Tingambato","Tinguindin","Tiquicheo de Nicolas Romero","Tlalpujahua","Tlazazalca","Tocumbo","Tumbiscatio","Turicato","Tuxpan","Tuzantla","Tzintzuntzan","Tzitzio","Uruapan","Venustiano Carranza","Villamar","Vista Hermosa","Yurecuaro","Zacapu","Zamora","Zinaparo","Zinapecuaro","Ziracuaretiro","Zitacuaro"],
  "morelos": ["Amacuzac","Atlatlahucan","Axochiapan","Ayala","Coatlan del Rio","Cuautla","Cuernavaca","Emiliano Zapata","Huitzilac","Jantetelco","Jiutepec","Jojutla","Jonacatepec de Leandro Valle","Mazatepec","Miacatlan","Ocuituco","Puente de Ixtla","Temixco","Temoac","Tepalcingo","Tepoztlan","Tetecala","Tetela del Volcan","Tlalnepantla","Tlaltizapan de Zapata","Tlaquiltenango","Tlayacapan","Totolapan","Xochitepec","Yautepec","Yecapixtla","Zacatepec","Zacualpan de Amilpas"],
  "nayarit": ["Acaponeta","Ahuacatlan","Amatlan de Canas","Bahia de Banderas","Compostela","Del Nayar","Huajicori","Ixtlan del Rio","Jala","La Yesca","Rosamorada","Ruiz","San Blas","San Pedro Lagunillas","Santa Maria del Oro","Santiago Ixcuintla","Tecuala","Tepic","Tuxpan","Xalisco"],
  "nuevoleon": ["Abasolo","Agualeguas","Allende","Anahuac","Apodaca","Aramberri","Bustamante","Cadereyta Jimenez","Cerralvo","China","Cienega de Flores","Doctor Arroyo","Doctor Coss","Doctor Gonzalez","El Carmen","Galeana","Garcia","General Bravo","General Escobedo","General Teran","General Trevino","General Zaragoza","General Zuazua","Guadalupe","Hidalgo","Higueras","Hualahuises","Iturbide","Juarez","Lampazos de Naranjo","Linares","Los Aldamas","Los Herreras","Los Ramones","Marin","Melchor Ocampo","Mier y Noriega","Mina","Montemorelos","Monterrey","Paras","Pesqueria","Rayones","Sabinas Hidalgo","Salinas Victoria","San Nicolas de los Garza","San Pedro Garza Garcia","Santa Catarina","Santiago","Vallecillo","Villaldama"],
  "oaxaca":["Abejones","Acatlan de Perez Figueroa","Animas Trujano","Asuncion Cacalotepec","Asuncion Cuyotepeji","Asuncion Ixtaltepec","Asuncion Nochixtlan","Asuncion Ocotlan","Asuncion Tlacolulita","Ayoquezco de Aldama","Ayotzintepec","Calihuala","Candelaria Loxicha","Capulalpam de Mendez","Chahuites","Chalcatongo de Hidalgo","Chiquihuitlan de Benito Juarez","Cienega de Zimatlan","Ciudad Ixtepec","Coatecas Altas","Coicoyan de las Flores","Concepcion Buenavista","Concepcion Papalo","Constancia del Rosario","Cosolapa","Cosoltepec","Cuilapam de Guerrero","Cuna de la Independencia de Oaxaca","Cuyamecalco Villa de Zaragoza","El Barrio de la Soledad","El Espinal","Eloxochitlan de Flores Magon","Fresnillo de Trujano","Guadalupe Etla","Guadalupe de Ramirez","Guelatao de Juarez","Guevea de Humboldt","Heroica Ciudad de Ejutla de Crespo","Heroica Ciudad de Huajuapan de Leon","Heroica Ciudad de Juchitan de Zaragoza","Heroica Ciudad de Tlaxiaco","Heroica Villa Tezoatlan de Segura y Luna","Huautepec","Huautla de Jimenez","Ixpantepec Nieves","Ixtlan de Juarez","La Compania","La Pe","La Reforma","La Trinidad Vista Hermosa","Loma Bonita","Magdalena Apasco","Magdalena Jaltepec","Magdalena Mixtepec","Magdalena Ocotlan","Magdalena Penasco","Magdalena Teitipac","Magdalena Tequisistlan","Magdalena Tlacotepec","Magdalena Yodocono de Porfirio Diaz","Magdalena Zahuatlan","Mariscala de Juarez","Martires de Tacubaya","Matias Romero Avendano","Mazatlan Villa de Flores","Mesones Hidalgo","Miahuatlan de Porfirio Diaz","Mixistlan de la Reforma","Monjas","Natividad","Nazareno Etla","Nejapa de Madero","Nuevo Zoquiapam","Oaxaca de Juarez","Ocotlan de Morelos","Pinotepa de Don Luis","Pluma Hidalgo","Putla Villa de Guerrero","Reforma de Pineda","Reyes Etla","Rojas de Cuauhtemoc","Salina Cruz","San Agustin Amatengo","San Agustin Atenango","San Agustin Chayuco","San Agustin Etla","San Agustin Loxicha","San Agustin Tlacotepec","San Agustin Yatareni","San Agustin de las Juntas","San Andres Cabecera Nueva","San Andres Dinicuiti","San Andres Huaxpaltepec","San Andres Huayapam","San Andres Ixtlahuaca","San Andres Lagunas","San Andres Nuxino","San Andres Paxtlan","San Andres Sinaxtla","San Andres Solaga","San Andres Teotilalpam","San Andres Tepetlapa","San Andres Yaa","San Andres Zabache","San Andres Zautla","San Antonino Castillo Velasco","San Antonino Monte Verde","San Antonino el Alto","San Antonio Acutla","San Antonio Huitepec","San Antonio Nanahuatipam","San Antonio Sinicahua","San Antonio Tepetlapa","San Antonio de la Cal","San Baltazar Chichicapam","San Baltazar Loxicha","San Baltazar Yatzachi el Bajo","San Bartolo Coyotepec","San Bartolo Soyaltepec","San Bartolo Yautepec","San Bartolome Ayautla","San Bartolome Loxicha","San Bartolome Quialana","San Bartolome Yucuane","San Bartolome Zoogocho","San Bernardo Mixtepec","San Blas Atempa","San Carlos Yautepec","San Cristobal Amatlan","San Cristobal Amoltepec","San Cristobal Lachirioag","San Cristobal Suchixtlahuaca","San Dionisio Ocotepec","San Dionisio Ocotlan","San Dionisio del Mar","San Esteban Atatlahuca","San Felipe Jalapa de Diaz","San Felipe Tejalapam","San Felipe Usila","San Francisco Cahuacua","San Francisco Cajonos","San Francisco Chapulapa","San Francisco Chindua","San Francisco Huehuetlan","San Francisco Ixhuatan","San Francisco Jaltepetongo","San Francisco Lachigolo","San Francisco Logueche","San Francisco Nuxano","San Francisco Ozolotepec","San Francisco Sola","San Francisco Telixtlahuaca","San Francisco Teopan","San Francisco Tlapancingo","San Francisco del Mar","San Gabriel Mixtepec","San Ildefonso Amatlan","San Ildefonso Sola","San Ildefonso Villa Alta","San Jacinto Amilpas","San Jacinto Tlacotepec","San Jeronimo Coatlan","San Jeronimo Silacayoapilla","San Jeronimo Sosola","San Jeronimo Taviche","San Jeronimo Tecoatl","San Jeronimo Tlacochahuaya","San Jorge Nuchita","San Jose Ayuquila","San Jose Chiltepec","San Jose Estancia Grande","San Jose Independencia","San Jose Lachiguiri","San Jose Tenango","San Jose del Penasco","San Jose del Progreso","San Juan Achiutla","San Juan Atepec","San Juan Bautista Atatlahuca","San Juan Bautista Coixtlahuaca","San Juan Bautista Cuicatlan","San Juan Bautista Guelache","San Juan Bautista Jayacatlan","San Juan Bautista Lo de Soto","San Juan Bautista Suchitepec","San Juan Bautista Tlachichilco","San Juan Bautista Tlacoatzintepec","San Juan Bautista Tuxtepec","San Juan Bautista Valle Nacional","San Juan Cacahuatepec","San Juan Chicomezuchil","San Juan Chilateca","San Juan Cieneguilla","San Juan Coatzospam","San Juan Colorado","San Juan Comaltepec","San Juan Cotzocon","San Juan Diuxi","San Juan Evangelista Analco","San Juan Guelavia","San Juan Guichicovi","San Juan Ihualtepec","San Juan Juquila Mixes","San Juan Juquila Vijanos","San Juan Lachao","San Juan Lachigalla","San Juan Lajarcia","San Juan Lalana","San Juan Mazatlan","San Juan Mixtepec","San Juan Mixtepec","San Juan Numi","San Juan Ozolotepec","San Juan Petlapa","San Juan Quiahije","San Juan Quiotepec","San Juan Sayultepec","San Juan Tabaa","San Juan Tamazola","San Juan Teita","San Juan Teitipac","San Juan Tepeuxila","San Juan Teposcolula","San Juan Yaee","San Juan Yatzona","San Juan Yucuita","San Juan de los Cues","San Juan del Estado","San Juan del Rio","San Lorenzo Albarradas","San Lorenzo Cacaotepec","San Lorenzo Cuaunecuiltitla","San Lorenzo Texmelucan","San Lorenzo Victoria","San Lorenzo","San Lucas Camotlan","San Lucas Ojitlan","San Lucas Quiavini","San Lucas Zoquiapam","San Luis Amatlan","San Marcial Ozolotepec","San Marcos Arteaga","San Martin Huamelulpam","San Martin Itunyoso","San Martin Lachila","San Martin Peras","San Martin Tilcajete","San Martin Toxpalan","San Martin Zacatepec","San Martin de los Cansecos","San Mateo Cajonos","San Mateo Etlatongo","San Mateo Nejapam","San Mateo Penasco","San Mateo Pinas","San Mateo Rio Hondo","San Mateo Sindihui","San Mateo Tlapiltepec","San Mateo Yoloxochitlan","San Mateo Yucutindoo","San Mateo del Mar","San Melchor Betaza","San Miguel Achiutla","San Miguel Ahuehuetitlan","San Miguel Aloapam","San Miguel Amatitlan","San Miguel Amatlan","San Miguel Chicahua","San Miguel Chimalapa","San Miguel Coatlan","San Miguel Ejutla","San Miguel Huautla","San Miguel Mixtepec","San Miguel Panixtlahuaca","San Miguel Peras","San Miguel Piedras","San Miguel Quetzaltepec","San Miguel Santa Flor","San Miguel Soyaltepec","San Miguel Suchixtepec","San Miguel Tecomatlan","San Miguel Tenango","San Miguel Tequixtepec","San Miguel Tilquiapam","San Miguel Tlacamama","San Miguel Tlacotepec","San Miguel Tulancingo","San Miguel Yotao","San Miguel del Puerto","San Miguel del Rio","San Miguel el Grande","San Nicolas Hidalgo","San Nicolas","San Pablo Coatlan","San Pablo Cuatro Venados","San Pablo Etla","San Pablo Huitzo","San Pablo Huixtepec","San Pablo Macuiltianguis","San Pablo Tijaltepec","San Pablo Villa de Mitla","San Pablo Yaganiza","San Pedro Amuzgos","San Pedro Apostol","San Pedro Atoyac","San Pedro Cajonos","San Pedro Comitancillo","San Pedro Coxcaltepec Cantaros","San Pedro Huamelula","San Pedro Huilotepec","San Pedro Ixcatlan","San Pedro Ixtlahuaca","San Pedro Jaltepetongo","San Pedro Jicayan","San Pedro Jocotipac","San Pedro Juchatengo","San Pedro Martir Quiechapa","San Pedro Martir Yucuxaco","San Pedro Martir","San Pedro Mixtepec","San Pedro Mixtepec","San Pedro Molinos","San Pedro Nopala","San Pedro Ocopetatillo","San Pedro Ocotepec","San Pedro Pochutla","San Pedro Quiatoni","San Pedro Sochiapam","San Pedro Tapanatepec","San Pedro Taviche","San Pedro Teozacoalco","San Pedro Teutila","San Pedro Tidaa","San Pedro Topiltepec","San Pedro Totolapam","San Pedro Yaneri","San Pedro Yolox","San Pedro Yucunama","San Pedro el Alto","San Pedro y San Pablo Ayutla","San Pedro y San Pablo Teposcolula","San Pedro y San Pablo Tequixtepec","San Raymundo Jalpan","San Sebastian Abasolo","San Sebastian Coatlan","San Sebastian Ixcapa","San Sebastian Nicananduta","San Sebastian Rio Hondo","San Sebastian Tecomaxtlahuaca","San Sebastian Teitipac","San Sebastian Tutla","San Simon Almolongas","San Simon Zahuatlan","San Vicente Coatlan","San Vicente Lachixio","San Vicente Nunu","Santa Ana Ateixtlahuaca","Santa Ana Cuauhtemoc","Santa Ana Tavela","Santa Ana Tlapacoyan","Santa Ana Yareni","Santa Ana Zegache","Santa Ana del Valle","Santa Ana","Santa Catalina Quieri","Santa Catarina Cuixtla","Santa Catarina Ixtepeji","Santa Catarina Juquila","Santa Catarina Lachatao","Santa Catarina Loxicha","Santa Catarina Mechoacan","Santa Catarina Minas","Santa Catarina Quiane","Santa Catarina Quioquitani","Santa Catarina Tayata","Santa Catarina Ticua","Santa Catarina Yosonotu","Santa Catarina Zapoquila","Santa Cruz Acatepec","Santa Cruz Amilpas","Santa Cruz Itundujia","Santa Cruz Mixtepec","Santa Cruz Nundaco","Santa Cruz Papalutla","Santa Cruz Tacache de Mina","Santa Cruz Tacahua","Santa Cruz Tayata","Santa Cruz Xitla","Santa Cruz Xoxocotlan","Santa Cruz Zenzontepec","Santa Cruz de Bravo","Santa Gertrudis","Santa Ines Yatzeche","Santa Ines de Zaragoza","Santa Ines del Monte","Santa Lucia Miahuatlan","Santa Lucia Monteverde","Santa Lucia Ocotlan","Santa Lucia del Camino","Santa Magdalena Jicotlan","Santa Maria Alotepec","Santa Maria Apazco","Santa Maria Atzompa","Santa Maria Camotlan","Santa Maria Chachoapam","Santa Maria Chilchotla","Santa Maria Chimalapa","Santa Maria Colotepec","Santa Maria Cortijo","Santa Maria Coyotepec","Santa Maria Ecatepec","Santa Maria Guelace","Santa Maria Guienagati","Santa Maria Huatulco","Santa Maria Huazolotitlan","Santa Maria Ipalapa","Santa Maria Ixcatlan","Santa Maria Jacatepec","Santa Maria Jalapa del Marques","Santa Maria Jaltianguis","Santa Maria Lachixio","Santa Maria Mixtequilla","Santa Maria Nativitas","Santa Maria Nduayaco","Santa Maria Ozolotepec","Santa Maria Papalo","Santa Maria Penoles","Santa Maria Petapa","Santa Maria Quiegolani","Santa Maria Sola","Santa Maria Tataltepec","Santa Maria Tecomavaca","Santa Maria Temaxcalapa","Santa Maria Temaxcaltepec","Santa Maria Teopoxco","Santa Maria Tepantlali","Santa Maria Texcatitlan","Santa Maria Tlahuitoltepec","Santa Maria Tlalixtac","Santa Maria Tonameca","Santa Maria Totolapilla","Santa Maria Xadani","Santa Maria Yalina","Santa Maria Yavesia","Santa Maria Yolotepec","Santa Maria Yosoyua","Santa Maria Yucuhiti","Santa Maria Zacatepec","Santa Maria Zaniza","Santa Maria Zoquitlan","Santa Maria del Rosario","Santa Maria del Tule","Santa Maria la Asuncion","Santiago Amoltepec","Santiago Apoala","Santiago Apostol","Santiago Astata","Santiago Atitlan","Santiago Ayuquililla","Santiago Cacaloxtepec","Santiago Camotlan","Santiago Chazumba","Santiago Choapam","Santiago Comaltepec","Santiago Huajolotitlan","Santiago Huauclilla","Santiago Ihuitlan Plumas","Santiago Ixcuintepec","Santiago Ixtayutla","Santiago Jamiltepec","Santiago Jocotepec","Santiago Juxtlahuaca","Santiago Lachiguiri","Santiago Lalopa","Santiago Laollaga","Santiago Laxopa","Santiago Llano Grande","Santiago Matatlan","Santiago Miltepec","Santiago Minas","Santiago Nacaltepec","Santiago Nejapilla","Santiago Niltepec","Santiago Nundiche","Santiago Nuyoo","Santiago Pinotepa Nacional","Santiago Suchilquitongo","Santiago Tamazola","Santiago Tapextla","Santiago Tenango","Santiago Tepetlapa","Santiago Tetepec","Santiago Texcalcingo","Santiago Textitlan","Santiago Tilantongo","Santiago Tillo","Santiago Tlazoyaltepec","Santiago Xanica","Santiago Xiacui","Santiago Yaitepec","Santiago Yaveo","Santiago Yolomecatl","Santiago Yosondua","Santiago Yucuyachi","Santiago Zacatepec","Santiago Zoochila","Santiago del Rio","Santo Domingo Albarradas","Santo Domingo Armenta","Santo Domingo Chihuitan","Santo Domingo Ingenio","Santo Domingo Ixcatlan","Santo Domingo Nuxaa","Santo Domingo Ozolotepec","Santo Domingo Petapa","Santo Domingo Roayaga","Santo Domingo Tehuantepec","Santo Domingo Teojomulco","Santo Domingo Tepuxtepec","Santo Domingo Tlatayapam","Santo Domingo Tomaltepec","Santo Domingo Tonala","Santo Domingo Tonaltepec","Santo Domingo Xagacia","Santo Domingo Yanhuitlan","Santo Domingo Yodohino","Santo Domingo Zanatepec","Santo Domingo de Morelos","Santo Tomas Jalieza","Santo Tomas Mazaltepec","Santo Tomas Ocotepec","Santo Tomas Tamazulapan","Santos Reyes Nopala","Santos Reyes Papalo","Santos Reyes Tepejillo","Santos Reyes Yucuna","Silacayoapam","Sitio de Xitlapehua","Soledad Etla","Tamazulapam del Espiritu Santo","Tanetze de Zaragoza","Taniche","Tataltepec de Valdes","Teococuilco de Marcos Perez","Teotitlan de Flores Magon","Teotitlan del Valle","Teotongo","Tepelmeme Villa de Morelos","Tlacolula de Matamoros","Tlacotepec Plumas","Tlalixtac de Cabrera","Totontepec Villa de Morelos","Trinidad Zaachila","Union Hidalgo","Valerio Trujano","Villa Diaz Ordaz","Villa Hidalgo","Villa Sola de Vega","Villa Talea de Castro","Villa Tejupam de la Union","Villa de Chilapa de Diaz","Villa de Etla","Villa de Tamazulapam del Progreso","Villa de Tututepec","Villa de Zaachila","Yaxe","Yogana","Yutanduchi de Guerrero","Zapotitlan Lagunas","Zapotitlan Palmas","Zimatlan de Alvarez"],
  "puebla": ["Acajete","Acateno","Acatlan","Acatzingo","Acteopan","Ahuacatlan","Ahuatlan","Ahuazotepec","Ahuehuetitla","Ajalpan","Albino Zertuche","Aljojuca","Altepexi","Amixtlan","Amozoc","Aquixtla","Atempan","Atexcal","Atlequizayan","Atlixco","Atoyatempan","Atzala","Atzitzihuacan","Atzitzintla","Axutla","Ayotoxco de Guerrero","Calpan","Caltepec","Camocuautla","Canada Morelos","Caxhuacan","Chalchicomula de Sesma","Chapulco","Chiautla","Chiautzingo","Chichiquila","Chiconcuautla","Chietla","Chigmecatitlan","Chignahuapan","Chignautla","Chila de la Sal","Chila","Chilchotla","Chinantla","Coatepec","Coatzingo","Cohetzala","Cohuecan","Coronango","Coxcatlan","Coyomeapan","Coyotepec","Cuapiaxtla de Madero","Cuautempan","Cuautinchan","Cuautlancingo","Cuayuca de Andrade","Cuetzalan del Progreso","Cuyoaco","Domingo Arenas","Eloxochitlan","Epatlan","Esperanza","Francisco Z. Mena","General Felipe Angeles","Guadalupe Victoria","Guadalupe","Hermenegildo Galeana","Honey","Huaquechula","Huatlatlauca","Huauchinango","Huehuetla","Huehuetlan el Chico","Huehuetlan el Grande","Huejotzingo","Hueyapan","Hueytamalco","Hueytlalpan","Huitzilan de Serdan","Huitziltepec","Ixcamilpa de Guerrero","Ixcaquixtla","Ixtacamaxtitlan","Ixtepec","Izucar de Matamoros","Jalpan","Jolalpan","Jonotla","Jopala","Juan C. Bonilla","Juan Galindo","Juan N. Mendez","La Magdalena Tlatlauquitepec","Lafragua","Libres","Los Reyes de Juarez","Mazapiltepec de Juarez","Mixtla","Molcaxac","Naupan","Nauzontla","Nealtican","Nicolas Bravo","Nopalucan","Ocotepec","Ocoyucan","Olintla","Oriental","Pahuatlan","Palmar de Bravo","Pantepec","Petlalcingo","Piaxtla","Puebla","Quecholac","Quimixtlan","Rafael Lara Grajales","San Andres Cholula","San Antonio Canada","San Diego la Mesa Tochimiltzingo","San Felipe Teotlalcingo","San Felipe Tepatlan","San Gabriel Chilac","San Gregorio Atzompa","San Jeronimo Tecuanipan","San Jeronimo Xayacatlan","San Jose Chiapa","San Jose Miahuatlan","San Juan Atenco","San Juan Atzompa","San Martin Texmelucan","San Martin Totoltepec","San Matias Tlalancaleca","San Miguel Ixitlan","San Miguel Xoxtla","San Nicolas Buenos Aires","San Nicolas de los Ranchos","San Pablo Anicano","San Pedro Cholula","San Pedro Yeloixtlahuaca","San Salvador Huixcolotla","San Salvador el Seco","San Salvador el Verde","San Sebastian Tlacotepec","Santa Catarina Tlaltempan","Santa Ines Ahuatempan","Santa Isabel Cholula","Santiago Miahuatlan","Santo Tomas Hueyotlipan","Soltepec","Tecali de Herrera","Tecamachalco","Tecomatlan","Tehuacan","Tehuitzingo","Tenampulco","Teopantlan","Teotlalco","Tepanco de Lopez","Tepango de Rodriguez","Tepatlaxco de Hidalgo","Tepeaca","Tepemaxalco","Tepeojuma","Tepetzintla","Tepexco","Tepexi de Rodriguez","Tepeyahualco de Cuauhtemoc","Tepeyahualco","Tetela de Ocampo","Teteles de Avila Castillo","Teziutlan","Tianguismanalco","Tilapa","Tlachichuca","Tlacotepec de Benito Juarez","Tlacuilotepec","Tlahuapan","Tlaltenango","Tlanepantla","Tlaola","Tlapacoya","Tlapanala","Tlatlauquitepec","Tlaxco","Tochimilco","Tochtepec","Totoltepec de Guerrero","Tulcingo","Tuzamapan de Galeana","Tzicatlacoyan","Venustiano Carranza","Vicente Guerrero","Xayacatlan de Bravo","Xicotepec","Xicotlan","Xiutetelco","Xochiapulco","Xochiltepec","Xochitlan Todos Santos","Xochitlan de Vicente Suarez","Yaonahuac","Yehualtepec","Zacapala","Zacapoaxtla","Zacatlan","Zapotitlan de Mendez","Zapotitlan","Zaragoza","Zautla","Zihuateutla","Zinacatepec","Zongozotla","Zoquiapan","Zoquitlan"],
  "queretaro": ["Amealco de Bonfil","Arroyo Seco","Cadereyta de Montes","Colon","Corregidora","El Marques","Ezequiel Montes","Huimilpan","Jalpan de Serra","Landa de Matamoros","Pedro Escobedo","Penamiller","Pinal de Amoles","Queretaro","San Joaquin","San Juan del Rio","Tequisquiapan","Toliman"],
  "quintanaroo": ["Bacalar","Benito Juarez","Cozumel","Felipe Carrillo Puerto","Isla Mujeres","Jose Maria Morelos","Lazaro Cardenas","Othon P. Blanco","Puerto Morelos","Solidaridad","Tulum"],
  "sanluispotosi": ["Ahualulco","Alaquines","Aquismon","Armadillo de los Infante","Axtla de Terrazas","Cardenas","Catorce","Cedral","Cerritos","Cerro de San Pedro","Charcas","Ciudad Fernandez","Ciudad Valles","Ciudad del Maiz","Coxcatlan","Ebano","El Naranjo","Guadalcazar","Huehuetlan","Lagunillas","Matehuala","Matlapa","Mexquitic de Carmona","Moctezuma","Rayon","Rioverde","Salinas","San Antonio","San Ciro de Acosta","San Luis Potosi","San Martin Chalchicuautla","San Nicolas Tolentino","San Vicente Tancuayalab","Santa Catarina","Santa Maria del Rio","Santo Domingo","Soledad de Graciano Sanchez","Tamasopo","Tamazunchale","Tampacan","Tampamolon Corona","Tamuin","Tancanhuitz","Tanlajas","Tanquian de Escobedo","Tierra Nueva","Vanegas","Venado","Villa Hidalgo","Villa Juarez","Villa de Arista","Villa de Arriaga","Villa de Guadalupe","Villa de Ramos","Villa de Reyes","Villa de la Paz","Xilitla","Zaragoza"],
  "sinaloa": ["Ahome","Angostura","Badiraguato","Choix","Concordia","Cosala","Culiacan","El Fuerte","Elota","Escuinapa","Guasave","Mazatlan","Mocorito","Navolato","Rosario","Salvador Alvarado","San Ignacio","Sinaloa"],
  "sonora": ["Aconchi","Agua Prieta","Alamos","Altar","Arivechi","Arizpe","Atil","Bacadehuachi","Bacanora","Bacerac","Bacoachi","Bacum","Banamichi","Baviacora","Bavispe","Benito Juarez","Benjamin Hill","Caborca","Cajeme","Cananea","Carbo","Cucurpe","Cumpas","Divisaderos","Empalme","Etchojoa","Fronteras","General Plutarco Elias Calles","Granados","Guaymas","Hermosillo","Huachinera","Huasabas","Huatabampo","Huepac","Imuris","La Colorada","Magdalena","Mazatan","Moctezuma","Naco","Nacori Chico","Nacozari de Garcia","Navojoa","Nogales","Onavas","Opodepe","Oquitoa","Pitiquito","Puerto Penasco","Quiriego","Rayon","Rosario","Sahuaripa","San Felipe de Jesus","San Ignacio Rio Muerto","San Javier","San Luis Rio Colorado","San Miguel de Horcasitas","San Pedro de la Cueva","Santa Ana","Santa Cruz","Saric","Soyopa","Suaqui Grande","Tepache","Trincheras","Tubutama","Ures","Villa Hidalgo","Villa Pesqueira","Yecora"],
  "tabasco": ["Balancan","Cardenas","Centla","Centro","Comalcalco","Cunduacan","Emiliano Zapata","Huimanguillo","Jalapa","Jalpa de Mendez","Jonuta","Macuspana","Nacajuca","Paraiso","Tacotalpa","Teapa","Tenosique"],
  "tamaulipas": ["Abasolo","Aldama","Altamira","Antiguo Morelos","Burgos","Bustamante","Camargo","Casas","Ciudad Madero","Cruillas","El Mante","Gomez Farias","Gonzalez","Guemez","Guerrero","Gustavo Diaz Ordaz","Hidalgo","Jaumave","Jimenez","Llera","Mainero","Matamoros","Mendez","Mier","Miguel Aleman","Miquihuana","Nuevo Laredo","Nuevo Morelos","Ocampo","Padilla","Palmillas","Reynosa","Rio Bravo","San Carlos","San Fernando","San Nicolas","Soto la Marina","Tampico","Tula","Valle Hermoso","Victoria","Villagran","Xicotencatl"],
  "tlaxcala": ["Acuamanala de Miguel Hidalgo","Amaxac de Guerrero","Apetatitlan de Antonio Carvajal","Apizaco","Atlangatepec","Atltzayanca","Benito Juarez","Calpulalpan","Chiautempan","Contla de Juan Cuamatzi","Cuapiaxtla","Cuaxomulco","El Carmen Tequexquitla","Emiliano Zapata","Espanita","Huamantla","Hueyotlipan","Ixtacuixtla de Mariano Matamoros","Ixtenco","La Magdalena Tlaltelulco","Lazaro Cardenas","Mazatecochco de Jose Maria Morelos","Munoz de Domingo Arenas","Nanacamilpa de Mariano Arista","Nativitas","Panotla","Papalotla de Xicohtencatl","San Damian Texoloc","San Francisco Tetlanohcan","San Jeronimo Zacualpan","San Jose Teacalco","San Juan Huactzinco","San Lorenzo Axocomanitla","San Lucas Tecopilco","San Pablo del Monte","Sanctorum de Lazaro Cardenas","Santa Ana Nopalucan","Santa Apolonia Teacalco","Santa Catarina Ayometla","Santa Cruz Quilehtla","Santa Cruz Tlaxcala","Santa Isabel Xiloxoxtla","Tenancingo","Teolocholco","Tepetitla de Lardizabal","Tepeyanco","Terrenate","Tetla de la Solidaridad","Tetlatlahuca","Tlaxcala","Tlaxco","Tocatlan","Totolac","Tzompantepec","Xaloztoc","Xaltocan","Xicohtzinco","Yauhquemehcan","Zacatelco","Ziltlaltepec de Trinidad Sanchez Santos"],
  "veracruz": ["Acajete","Acatlan","Acayucan","Actopan","Acula","Acultzingo","Agua Dulce","Alamo Temapache","Alpatlahuac","Alto Lucero de Gutierrez Barrios","Altotonga","Alvarado","Amatitlan","Amatlan de los Reyes","Angel R. Cabada","Apazapan","Aquila","Astacinga","Atlahuilco","Atoyac","Atzacan","Atzalan","Ayahualulco","Banderilla","Benito Juarez","Boca del Rio","Calcahualco","Camaron de Tejeda","Camerino Z. Mendoza","Carlos A. Carrillo","Carrillo Puerto","Castillo de Teayo","Catemaco","Cazones de Herrera","Cerro Azul","Chacaltianguis","Chalma","Chiconamel","Chiconquiaco","Chicontepec","Chinameca","Chinampa de Gorostiza","Chocaman","Chontla","Chumatlan","Citlaltepetl","Coacoatzintla","Coahuitlan","Coatepec","Coatzacoalcos","Coatzintla","Coetzala","Colipa","Comapa","Cordoba","Cosamaloapan de Carpio","Cosautlan de Carvajal","Coscomatepec","Cosoleacaque","Cotaxtla","Coxquihui","Coyutla","Cuichapa","Cuitlahuac","El Higo","Emiliano Zapata","Espinal","Filomeno Mata","Fortin","Gutierrez Zamora","Hidalgotitlan","Huatusco","Huayacocotla","Hueyapan de Ocampo","Huiloapan de Cuauhtemoc","Ignacio de la Llave","Ilamatlan","Isla","Ixcatepec","Ixhuacan de los Reyes","Ixhuatlan de Madero","Ixhuatlan del Cafe","Ixhuatlan del Sureste","Ixhuatlancillo","Ixmatlahuacan","Ixtaczoquitlan","Jalacingo","Jalcomulco","Jaltipan","Jamapa","Jesus Carranza","Jilotepec","Jose Azueta","Juan Rodriguez Clara","Juchique de Ferrer","La Antigua","La Perla","Landero y Coss","Las Choapas","Las Minas","Las Vigas de Ramirez","Lerdo de Tejada","Los Reyes","Magdalena","Maltrata","Manlio Fabio Altamirano","Mariano Escobedo","Martinez de la Torre","Mecatlan","Mecayapan","Medellin de Bravo","Miahuatlan","Minatitlan","Misantla","Mixtla de Altamirano","Moloacan","Nanchital de Lazaro Cardenas del Rio","Naolinco","Naranjal","Naranjos Amatlan","Nautla","Nogales","Oluta","Omealca","Orizaba","Otatitlan","Oteapan","Ozuluama de Mascarenas","Pajapan","Panuco","Papantla","Paso de Ovejas","Paso del Macho","Perote","Platon Sanchez","Playa Vicente","Poza Rica de Hidalgo","Pueblo Viejo","Puente Nacional","Rafael Delgado","Rafael Lucio","Rio Blanco","Saltabarranca","San Andres Tenejapan","San Andres Tuxtla","San Juan Evangelista","San Rafael","Santiago Sochiapan","Santiago Tuxtla","Sayula de Aleman","Sochiapa","Soconusco","Soledad Atzompa","Soledad de Doblado","Soteapan","Tamalin","Tamiahua","Tampico Alto","Tancoco","Tantima","Tantoyuca","Tatahuicapan de Juarez","Tatatila","Tecolutla","Tehuipango","Tempoal","Tenampa","Tenochtitlan","Teocelo","Tepatlaxco","Tepetlan","Tepetzintla","Tequila","Texcatepec","Texhuacan","Texistepec","Tezonapa","Tierra Blanca","Tihuatlan","Tlachichilco","Tlacojalpan","Tlacolulan","Tlacotalpan","Tlacotepec de Mejia","Tlalixcoyan","Tlalnelhuayocan","Tlaltetela","Tlapacoyan","Tlaquilpa","Tlilapan","Tomatlan","Tonayan","Totutla","Tres Valles","Tuxpan","Tuxtilla","Ursulo Galvan","Uxpanapa","Vega de Alatorre","Veracruz","Villa Aldama","Xalapa","Xico","Xoxocotla","Yanga","Yecuatla","Zacualpan","Zaragoza","Zentla","Zongolica","Zontecomatlan de Lopez y Fuentes","Zozocolco de Hidalgo"],
  "yucatan": ["Abala","Acanceh","Akil","Baca","Bokoba","Buctzotz","Cacalchen","Calotmul","Cansahcab","Cantamayec","Celestun","Cenotillo","Chacsinkin","Chankom","Chapab","Chemax","Chichimila","Chicxulub Pueblo","Chikindzonot","Chochola","Chumayel","Conkal","Cuncunul","Cuzama","Dzan","Dzemul","Dzidzantun","Dzilam Gonzalez","Dzilam de Bravo","Dzitas","Dzoncauich","Espita","Halacho","Hocaba","Hoctun","Homun","Huhi","Hunucma","Ixil","Izamal","Kanasin","Kantunil","Kaua","Kinchil","Kopoma","Mama","Mani","Maxcanu","Mayapan","Merida","Mococha","Motul","Muna","Muxupip","Opichen","Oxkutzcab","Panaba","Peto","Progreso","Quintana Roo","Rio Lagartos","Sacalum","Samahil","San Felipe","Sanahcat","Santa Elena","Seye","Sinanche","Sotuta","Sucila","Sudzal","Suma","Tahdziu","Tahmek","Teabo","Tecoh","Tekal de Venegas","Tekanto","Tekax","Tekit","Tekom","Telchac Pueblo","Telchac Puerto","Temax","Temozon","Tepakan","Tetiz","Teya","Ticul","Timucuy","Tinum","Tixcacalcupul","Tixkokob","Tixmehuac","Tixpehual","Tizimin","Tunkas","Tzucacab","Uayma","Ucu","Uman","Valladolid","Xocchel","Yaxcaba","Yaxkukul","Yobain"],
  "zacatecas": ["Apozol","Apulco","Atolinga","Benito Juarez","Calera","Canitas de Felipe Pescador","Chalchihuites","Concepcion del Oro","Cuauhtemoc","El Plateado de Joaquin Amaro","El Salvador","Fresnillo","Genaro Codina","General Enrique Estrada","General Francisco R. Murguia","General Panfilo Natera","Guadalupe","Huanusco","Jalpa","Jerez","Jimenez del Teul","Juan Aldama","Juchipila","Loreto","Luis Moya","Mazapil","Melchor Ocampo","Mezquital del Oro","Miguel Auza","Momax","Monte Escobedo","Morelos","Moyahua de Estrada","Nochistlan de Mejia","Noria de Angeles","Ojocaliente","Panuco","Pinos","Rio Grande","Sain Alto","Santa Maria de la Paz","Sombrerete","Susticacan","Tabasco","Tepechitlan","Tepetongo","Teul de Gonzalez Ortega","Tlaltenango de Sanchez Roman","Trancoso","Trinidad Garcia de la Cadena","Valparaiso","Vetagrande","Villa Garcia","Villa Gonzalez Ortega","Villa Hidalgo","Villa de Cos","Villanueva","Zacatecas"]
  
  };
  
  
  const localidades = {
    "Tapachula": [
      { localidad: "Centro", codigo_postal: "30700" },
      { localidad: "San Sebastián", codigo_postal: "30705" }
      // Agregar el rssto de localidades que falten
    ],
    "Cacahoatan": [
      { localidad: "Cacahoatan Centro", codigo_postal: "30890" }
      // Agrega r
      //tratar de manejar esta misma estructura
    ],
    
  };
  
  let entidades = Object.keys(data);
  let municipios = [];
  let localidadesSeleccionadas = [];
  
  function mostrarSugerencias(input, tipo) {
    let valor = input.value.toLowerCase();
    let listaSugerencias = document.getElementById(`sugerencias_${input.id}`);
    listaSugerencias.innerHTML = "";
    let opciones = [];
    if (tipo === 'entidades') {
      opciones = entidades;
    } else if (tipo === 'municipios') {
      let entidadSeleccionada = document.getElementById('entidad_pais').value.toLowerCase().replace(/\s+/g, '');
      if (data[entidadSeleccionada]) {
        municipios = data[entidadSeleccionada];
        opciones = municipios;
      }
    } else if (tipo === 'localidades') {
      let municipioSeleccionado = document.getElementById('municipio').value;
      if (localidades[municipioSeleccionado]) {
        localidadesSeleccionadas = localidades[municipioSeleccionado];
        opciones = localidadesSeleccionadas.map(loc => loc.localidad);
      }
    }
  
    const opcionesFiltradas = opciones.filter(option => option.toLowerCase().includes(valor));
  
    if (opcionesFiltradas.length > 0) {
      listaSugerencias.style.display = 'block';
      opcionesFiltradas.forEach(option => {
        const li = document.createElement('li');
        li.textContent = option;
        li.style.padding = '10px';
        li.style.cursor = 'pointer'; 
        li.style.listStyle = 'none'; 
        li.style.borderBottom = '1px solid #e9ecef'; 
        li.style.fontWeight = 'bold'; 
        li.style.color = '#000'; 
        li.style.backgroundColor = '#fff'; 
        li.addEventListener('click', function() {
          input.value = option;
          listaSugerencias.style.display = 'none';
          if (tipo === 'localidades') {
            const codigoPostalInput = document.getElementById('codigo_postal');
            const localidadSeleccionada = localidadesSeleccionadas.find(loc => loc.localidad === option);
            if (localidadSeleccionada) {
              codigoPostalInput.value = localidadSeleccionada.codigo_postal;
            }
          }
        });
        listaSugerencias.appendChild(li);
      });
    } else {
      listaSugerencias.style.display = 'none';
    }
  }
  
  function ocultarSugerencias(id) {
    setTimeout(() => {
      document.getElementById(id).style.display = "none";
    }, 200); 
  }
  
  document.getElementById('entidad_pais').addEventListener('input', function() {
    document.getElementById('municipio').value = '';
    document.getElementById('localidad').value = '';
    document.getElementById('codigo_postal').value = '';
    document.getElementById('sugerencias_municipio').innerHTML = '';
    document.getElementById('sugerencias_localidad').innerHTML = '';
  });

  //----------------------------------------------------------
  const cluesData = [
    { "clues": "CSSSA000453", "nombre": "Hospital General Juárez Arriaga" },
    { "clues": "CSSSA002611", "nombre": "Hospital General Huixtla" },
    { "clues": "CSSSA004595", "nombre": "Hospital General Palenque" },
    { "clues": "CSSSA004945", "nombre": "Hospital General Pichucalco" },
    { "clues": "CSSSA005773", "nombre": "Hospital de la Mujer San Cristóbal de las Casas" },
    { "clues": "CSSSA006403", "nombre": "Hospital General Tapachula" },
    { "clues": "CSSSA007074", "nombre": "Hospital General Dr. Juan C. Corzo Tonalá" },
    { "clues": "CSSSA007540", "nombre": "Hospital Regional Dr. Rafael Pascasio Gamboa Tuxtla" },
    { "clues": "CSSSA008264", "nombre": "Hospital General Yajalón" },
    { "clues": "CSSSA018776", "nombre": "Hospital de la Mujer Comitán" },
    { "clues": "CSSSA018875", "nombre": "Hospital General Bicentenario Villaflores" },
    { "clues": "CSIMS000251", "nombre": "HGZ 2 Tuxtla Gutiérrez" },
    { "clues": "CSIMS000205", "nombre": "HGZMF 1 Tapachula" },
    { "clues": "CSIMO000433", "nombre": "Hospital Bochil" },
    { "clues": "CSIMO003863", "nombre": "San Felipe Ecatepec" },
    { "clues": "CSIMO003081", "nombre": "Hospital Ocozocoautla de Espinoza" },
    { "clues": "CSIMO000170", "nombre": "Hospital Altamirano" },
    { "clues": "CSIMO005210", "nombre": "Hospital Venustiano Carranza" },
    { "clues": "CSIMO002620", "nombre": "Hospital Motozintla de Mendoza" },
    { "clues": "CSIMO002125", "nombre": "Hospital Mapastepec" },
    { "clues": "CSIMO002784", "nombre": "Hospital Ocosingo" },
    { "clues": "CSIMO002270", "nombre": "Hospital Guadalupe Tepeyac" },
    { "clues": "CSIMO002924", "nombre": "Hospital Benemérito de las Américas" }
  ];
  

  
  function mostrarSugerenciasClues(input) {
    let valor = input.value.toLowerCase();
    let listaSugerencias = document.getElementById('sugerencias_clues');
    listaSugerencias.innerHTML = ""; 
  
    const opcionesFiltradas = cluesData.filter(clues => clues.clues.toLowerCase().includes(valor) || clues.nombre.toLowerCase().includes(valor));
  
    if (opcionesFiltradas.length > 0) {
      listaSugerencias.style.display = 'block';
      opcionesFiltradas.forEach(option => {
        const li = document.createElement('li');
        li.textContent = `${option.clues} - ${option.nombre}`;
        li.style.padding = '10px';
        li.style.cursor = 'pointer'; 
        li.style.listStyle = 'none'; 
        li.style.borderBottom = '1px solid #e9ecef'; 
        li.style.fontWeight = 'bold'; 
        li.style.color = '#000'; 
        li.style.backgroundColor = '#fff'; 
        li.addEventListener('click', function() {
          input.value = option.clues;
          listaSugerencias.style.display = 'none';
        });
        listaSugerencias.appendChild(li);
      });
    } else {
      listaSugerencias.style.display = 'none';
    }
  }
  
  function ocultarSugerenciasClues() {
    setTimeout(() => {
      document.getElementById('sugerencias_clues').style.display = "none";
    }, 200);
  }
  //--------------------------------------------------
  const afeccionesPrincipales = [
    "Fractura de fémur", "Infarto agudo de miocardio", "Accidente cerebrovascular", 
    "Neumonía", "Apendicitis aguda", "Insuficiencia renal", "Diabetes mellitus",
    "Hipertensión arterial", "Asma", "Enfermedad pulmonar obstructiva crónica",
    // Agrega más afecciones principales aquí
];

const opcionesComorbilidades = [
    "Diabetes", "Hipertensión", "Obesidad", "Enfermedad renal crónica",
    "EPOC", "Asma", "Insuficiencia cardíaca", "Artritis reumatoide", 
    "Cáncer", "Hepatitis", "Anemia", "Enfermedad hepática", 
    // Agrega más comorbilidades aquí
];

const inputAfeccionPrincipal = document.getElementById('afeccion_principal_input');
const listaSugerenciasAfeccion = document.getElementById('sugerencias_afeccion');

const inputComorbilidades = document.getElementById('comorbilidades_input');
const listaSugerenciasComorbilidades = document.getElementById('sugerencias_comorbilidades');
const divSeleccionesComorbilidades = document.getElementById('selecciones_comorbilidades');
let listaComorbilidadesSeleccionadas = [];

// Mostrar todas las opciones al hacer clic (focus) en el input de afección principal
inputAfeccionPrincipal.addEventListener('focus', function () {
    mostrarOpcionesFiltradas(afeccionesPrincipales, listaSugerenciasAfeccion, inputAfeccionPrincipal);
});

// Mostrar todas las opciones al hacer clic (focus) en el input de comorbilidades
inputComorbilidades.addEventListener('focus', function () {
    mostrarOpcionesFiltradas(opcionesComorbilidades, listaSugerenciasComorbilidades, inputComorbilidades);
});

// Ocultar sugerencias cuando se hace clic fuera del input
document.addEventListener('click', function(event) {
    if (!inputAfeccionPrincipal.contains(event.target) && !listaSugerenciasAfeccion.contains(event.target)) {
        listaSugerenciasAfeccion.style.display = 'none';
    }
    if (!inputComorbilidades.contains(event.target) && !listaSugerenciasComorbilidades.contains(event.target)) {
        listaSugerenciasComorbilidades.style.display = 'none';
    }
});

function mostrarOpcionesFiltradas(opciones, listaSugerencias, input) {
    listaSugerencias.innerHTML = ''; 
    opciones.forEach(opcion => {
        const elementoLista = document.createElement('li');
        elementoLista.textContent = opcion;
        elementoLista.style.padding = '10px';
        elementoLista.style.cursor = 'pointer';
        elementoLista.style.listStyle = 'none';
        elementoLista.style.borderBottom = '1px solid #e9ecef';
        elementoLista.style.fontWeight = 'bold';
        elementoLista.style.color = '#000';
        elementoLista.style.backgroundColor = '#fff';
        elementoLista.addEventListener('click', function () {
            if (input === inputAfeccionPrincipal) {
                inputAfeccionPrincipal.value = opcion;
                listaSugerenciasAfeccion.style.display = 'none';
            } else if (input === inputComorbilidades) {
                agregarComorbilidadSeleccionada(opcion);
                listaSugerenciasComorbilidades.style.display = 'none';
            }
        });
        listaSugerencias.appendChild(elementoLista);
    });
    listaSugerencias.style.display = 'block';
}

// Autocompletado para Afección Principal
inputAfeccionPrincipal.addEventListener('input', function () {
    const filtro = inputAfeccionPrincipal.value.toLowerCase();
    const opcionesFiltradas = afeccionesPrincipales.filter(opcion => opcion.toLowerCase().includes(filtro));
    mostrarOpcionesFiltradas(opcionesFiltradas, listaSugerenciasAfeccion, inputAfeccionPrincipal);
});

// Autocompletado para Comorbilidades
inputComorbilidades.addEventListener('input', function () {
    const filtro = inputComorbilidades.value.toLowerCase();
    const opcionesFiltradas = opcionesComorbilidades.filter(opcion => opcion.toLowerCase().includes(filtro));
    mostrarOpcionesFiltradas(opcionesFiltradas, listaSugerenciasComorbilidades, inputComorbilidades);
});

// Función para agregar comorbilidades seleccionadas
function agregarComorbilidadSeleccionada(opcion) {
    if (listaComorbilidadesSeleccionadas.length >= 5) {
        alert('Solo puedes seleccionar hasta 5 comorbilidades.');
        return;
    }

    if (!listaComorbilidadesSeleccionadas.includes(opcion)) {
        listaComorbilidadesSeleccionadas.push(opcion);
        actualizarListaComorbilidadesSeleccionadas();
    }

    inputComorbilidades.value = ''; // Limpiar el input después de seleccionar
}

// Función para eliminar comorbilidad seleccionada
function eliminarComorbilidadSeleccionada(opcion) {
    listaComorbilidadesSeleccionadas = listaComorbilidadesSeleccionadas.filter(sel => sel !== opcion);
    actualizarListaComorbilidadesSeleccionadas();
}

// Función para actualizar la lista de comorbilidades seleccionadas
function actualizarListaComorbilidadesSeleccionadas() {
    divSeleccionesComorbilidades.innerHTML = '';
    listaComorbilidadesSeleccionadas.forEach(opcion => {
        const divComorbilidad = document.createElement('div');
        divComorbilidad.textContent = opcion;
        divComorbilidad.style.padding = '5px';
        divComorbilidad.style.backgroundColor = '#e9ecef';
        divComorbilidad.style.marginBottom = '5px';
        divComorbilidad.style.display = 'inline-block';
        divComorbilidad.style.fontWeight = 'bold';
        divComorbilidad.style.marginRight = '5px';

        const botonEliminar = document.createElement('button');
        botonEliminar.textContent = 'X';
        botonEliminar.style.marginLeft = '10px';
        botonEliminar.style.color = 'red';
        botonEliminar.style.border = 'none';
        botonEliminar.style.backgroundColor = 'transparent';
        botonEliminar.style.cursor = 'pointer';
        botonEliminar.addEventListener('click', function () {
            eliminarComorbilidadSeleccionada(opcion);
        });

        divComorbilidad.appendChild(botonEliminar);
        divSeleccionesComorbilidades.appendChild(divComorbilidad);
    });
}

//validacion de validar input
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
// Función de validación de estructura de la curp
function validarCURP(curp) {
  const regexCURP = /^[A-Z]{4}(\d{6}|X{6})[HMX](?:[A-Z]{2}|XX)(?:[A-Z\d]{3}|XXX)[A-Z\d]|x$/;
  return regexCURP.test(curp);
}


//agregar clases
const inputsC = document.querySelectorAll('.form-control');
// Añadir una o más clases a cada input
inputsC.forEach(input => {
    input.classList.add('autocompletar');  // Añadir una nueva clase
    // input.classList.add('nueva-clase1', 'nueva-clase2'); // Para añadir múltiples clases
});


// -- AutorrellenadoInputs -- Inicio

// Definir la cantidad de "X" para cada input
const fillValues = {
    curp: 'XXXXXXXXXXXXXXXXXX',
    nombre: 'XXXXX',
    primer_apellido: 'XX',
    segundo_apellido: 'XX',
    nombre_vialidad: 'XXXXX',
    localidad: 'XXXXX',
    nombre_vialidad: 'XXXXX',
    num_ext: 'XXXXX',
    num_int: 'XXXXX',
    nombre_asentamiento: 'XXXXX',
    afeccion_principal: 'XXXXX',
    causa_externa: 'XXXXX',
    telefono: 'XXXXXXXXXX'
};

// Seleccionar todos los inputs con la clase 'autocompletar'
const inputsAutocompletar = document.querySelectorAll('.autocompletar');

// Añadir un event listener a cada input
inputsAutocompletar.forEach(input => {
    input.addEventListener('keydown', function(event) {
        // Verificar si la tecla presionada es F9
        if (event.key === 'F9') {
            // Obtener el id del input
            const inputId = input.id;
            // Obtener el valor de relleno correspondiente desde el objeto fillValues
            const fillValue = fillValues[inputId];
            if (fillValue) {
                // Rellenar el input con el valor especificado
                input.value = fillValue;
                event.preventDefault(); // Prevenir el comportamiento por defecto de la tecla F9
            }
        }
    });
});

// -- AutorrellenadoIntpus -- Fin