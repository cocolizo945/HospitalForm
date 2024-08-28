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
  