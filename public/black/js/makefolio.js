// script.js
async function createFolio() {
    const textInput = document.getElementById('clues');
    const selectedValue = document.getElementById('clues').value
    const selectedText = $(textInput).find('option:selected').text();
    const textAfterPoint = selectedText.split('.').slice(1).join('.').trim();

    //alert("El botón fue presionado");
    if  (selectedValue != 'Selección Única') {
        // Si tiene datos, ejecutar alguna acción
 
        try {
            // Enviar los datos a la API usando fetch
            const response = await fetch('http://192.168.1.5:8030/api/formHospital/register', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                   'Access-Control-Allow-Origin': '*'
                },
                body: JSON.stringify({
                    option: 1,
                    data: [{ clues: textAfterPoint }]
                })
            
                
            });
            // Verificar si la respuesta es exitosa
            if (response.ok) {
                const jsonResponse = await response.json();
                console.log('Respuesta de la API:', jsonResponse);
                document.getElementById('response-container').innerHTML = 
                `<h5>Folio: ${JSON.stringify(jsonResponse.data.folio)}</h5>`;
                document.getElementById('response-container2').innerHTML = 
                `<h5 id="response-container2">${JSON.stringify(jsonResponse.data.folio)}</h5>`;
            } else {
                console.error('Error al enviar los datos:', response.statusText);
                alert('Hubo un error al enviar los datos.');
            }
        } catch (error) {
            console.error('Error en la solicitud:', error);
            alert('Hubo un error en la solicitud.');
        }        // Puedes reemplazar el alert con cualquier otra acción
    } else {
        // Si el campo está vacío
        alert("no hay nada");
    }
    // Aquí puedes agregar el código que necesitas ejecutar al presionar el botón
}

async function searchFolio() {
    const textInput = document.getElementById('FolioDir').value;


    //alert("El botón fue presionado");        // Si tiene datos, ejecutar alguna acción
    if  (textInput.length > 0) {
        try {
            // Enviar los datos a la API usando fetch
            const response = await fetch('http://192.168.1.5:8030/api/formHospital/register', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                   'Access-Control-Allow-Origin': '*'
                },
                body: JSON.stringify({
                    option: 2,
                    data: [{ folio: textInput }]
                })
            
                
            });
            // Verificar si la respuesta es exitosa
            if (response.ok) {
                const jsonResponse = await response.json();
                console.log('Respuesta de la API:', jsonResponse);
                document.getElementById('response-container').innerHTML = 
                `<h5>Folio: ${JSON.stringify(jsonResponse.data.data)}</h5>`;
            } else {
                console.error('Error al enviar los datos:', response.statusText);
                alert('Hubo un error al enviar los datos.');
            }
        } catch (error) {
            console.error('Error en la solicitud:', error);
            alert('Hubo un error en la solicitud.');
        }        // Puedes reemplazar el alert con cualquier otra acción
    }else{
        alert('Texto Vacio');
    }
    // Aquí puedes agregar el código que necesitas ejecutar al presionar el botón
}


async function handleSaveData() {
    const folio = document.getElementById('response-container2')

    const name = document.getElementById('nombre').value
    const middle_name = document.getElementById('primer_apellido').value
    const last_name = document.getElementById('segundo_apellido').value
    const curp = document.getElementById('curp').value
    const Bday = document.getElementById('fecha_nacimiento').value
    const Bplace = document.getElementById('entidad_nacimiento').value
    const age = document.getElementById('edad').value
    const sex = getSelectedRadioValue('sexo')
    const health_service = document.getElementById('afiliacion').value
    const num_afiliated = document.getElementById('numero_afiliacion').value
    const isFree = getSelectedRadiotrue('gratuidad')
    const school = document.getElementById('escolaridad').value
    const schoolComplete = document.getElementById('escolaridad_seleccionada').value
    const readwrite = getSelectedRadiotrue('ler&escribir')
    const native = getSelectedRadiotrue('indigena')
    const nativespeaker = getSelectedRadiotrue('lengua_indigena')
    const afro = getSelectedRadiotrue('afrodescendiente')
    const migrant = getSelectedRadiotrue('migrante')
    const disable = getSelectedRadiotrue('discapacidad')
    const refby = document.getElementById('referido_por').value
    
    
    
    
    var h5Value = folio.textContent || folio.innerText;
    var cleanedString = h5Value.replace(/"/g, '');

    console.log(cleanedString)

    console.log(name)
    console.log(middle_name)
    console.log(last_name)
    console.log(curp)
    console.log(Bday)
    console.log(Bplace)
    console.log(age)
    console.log(sex)
    console.log(health_service)
    console.log(num_afiliated)
    console.log(isFree)
    console.log(school)
    console.log(schoolComplete)
    console.log(readwrite)
    console.log(native)
    console.log(nativespeaker)
    console.log(afro)
    console.log(migrant)
    console.log(disable)
    console.log(refby)
    

    try {
        // Enviar los datos a la API usando fetch
        const response = await fetch('http://192.168.1.5:8030/api/formHospital/save-form', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
               'Access-Control-Allow-Origin': '*'
            },
            body: JSON.stringify({
                option: 1,
                data: [{ 
                    folio: cleanedString,
                    name:name,
                    middle_name:middle_name,
                    last_name:last_name,
                    curp:curp,
                    bday:Bday,
                    bplace:Bplace,
                    age:age,
                    sex:sex,
                    health_service:health_service,
                    num_afiliated:num_afiliated,
                    isfree:isFree,
                    school:school,
                    schoolComplete:schoolComplete,
                    readwrite:readwrite,
                    native:native,
                    nativespeaker:nativespeaker,
                    afro:afro,
                    migrant:migrant,
                    disable:disable,
                    refby:refby,
                 }]
            })
        
            
        });
        // Verificar si la respuesta es exitosa
        if (response.ok) {
            const jsonResponse = await response.json();
            console.log('Respuesta de la API:', jsonResponse);
            document.getElementById('response-container').innerHTML = 
            `<h5>Folio: ${JSON.stringify(jsonResponse.data.folio)}</h5>`;
            document.getElementById('response-container2').innerHTML = 
            `<h5 id="response-container2">${JSON.stringify(jsonResponse.data.folio)}</h5>`;
        } else {
            console.error('Error al enviar los datos:', response.statusText);
            alert('Hubo un error al enviar los datos.');
        }
    } catch (error) {
        console.error('Error en la solicitud:', error);
        alert('Hubo un error en la solicitud.');
    }        // Puedes reemplazar el alert con cualquier otra acción
}




function getSelectedRadioValue(groupName) {
    var radios = document.getElementsByName(groupName);
    var selectedValue = '';

    for (var i = 0; i < radios.length; i++) {
        if (radios[i].checked) {
            selectedValue = radios[i].value;
            break;
        }
    }

    return selectedValue;
}


function getSelectedRadiotrue(groupName) {
    var radios = document.getElementsByName(groupName);
    var selectedValue = '';

    for (var i = 0; i < radios.length; i++) {
        if (radios[i].checked) {
            selectedValue = radios[i].value;
            break;
        }
    }

    // Retorna true si el valor seleccionado es "1", false si es "2"
    return selectedValue === '1';
}

// Asegúrate de que el DOM esté completamente cargado antes de agregar el manejador de eventos
document.addEventListener('DOMContentLoaded', function() {
    
    const btnSiguiente = document.getElementById('btnMakeFolio');
    if (btnSiguiente) {
        btnSiguiente.addEventListener('click', createFolio);
    }
    
});





document.addEventListener('DOMContentLoaded', function() {
    
    const btnSiguiente = document.getElementById('SaveData');
    if (btnSiguiente) {
        btnSiguiente.addEventListener('click', handleSaveData);
    }
    
});


document.addEventListener('DOMContentLoaded', function() {
    
    const btnSiguiente = document.getElementById('SearchData');
    if (btnSiguiente) {
        btnSiguiente.addEventListener('click', searchFolio);
    }
    
});




