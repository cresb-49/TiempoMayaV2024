function createCalendar(calendar, year, month) {
    let tbl = calendar.querySelector('tbody'); // Body de la tabla donde se insertarán los días
    // Limpia el contenido previo del tbody
    tbl.innerHTML = '';

    // Empieza el día en el que cae el 1 del mes
    let firstDay = new Date(year, month).getDay();

    // Crea las celdas vacías hasta el primer día del mes
    let row = tbl.insertRow();
    for (let i = 0; i < firstDay; i++) {
        let cell = row.insertCell();
    }

    // Rellena los días del mes
    let daysInMonth = new Date(year, month + 1, 0).getDate();
    for (let day = 1; day <= daysInMonth; day++) {
        elemento_diaMes = diasMes[day]
        if (firstDay === 7) {
            firstDay = 0; // Si es domingo, comienza nueva fila
            row = tbl.insertRow();
        }
        let cell = row.insertCell();
        // Asegúrate de ajustar la ruta y el estilo de la imagen
        imagen = "img/nahuales/tzikin.png";
        numero = "img/numeros/11.png";
        // texto_bajo = "Tzikin";
        cholquij_elementos = elemento_diaMes['cholquij'];
        cholquij_elementos = cholquij_elementos.split(" ")
        cholquij_imagen = cholquij_elementos[0].toLowerCase();
        // A la imagen solo hay que dejarle los caracteres letras y en lowercase
        cholquij_imagen = cholquij_imagen.replace(/[^Aa-zZ]/g, '');
        cholquij_numero = cholquij_elementos[1];
        // un log para ver que se obtiene
        // console.log(cholquij_imagen);
        // console.log(cholquij_numero);
        haab_elementos = elemento_diaMes['haab'];
        haab_elementos = haab_elementos.split(" ")
        haab_imagen = haab_elementos[0].toLowerCase();
        // A la imagen solo hay que dejarle los caracteres letras y en lowercase
        haab_imagen = haab_imagen.replace(/[^Aa-zZ]/g, '');
        haab_numero = haab_elementos[1];
        // un log para ver que se obtiene
        console.log(haab_imagen);
        console.log(haab_numero);
        texto_bajo = elemento_diaMes['cholquij']+" - "+elemento_diaMes['haab'];
        // Agregamos la imagen y el texto
        cell.innerHTML = `
        <div class="calendar-day">
            <div class="text-below">${day}</div>
            <div class="images-container">
                <img class="maya_num" src="img/numeros/${cholquij_numero}.png" alt="Descripción">
                <img class="maya_cal" src="img/nahuales_alterno/${cholquij_imagen}.png" alt="Descripción">
                <img class="maya_num" src="img/numeros/${haab_numero}.png" alt="Descripción">
                <img class="maya_cal" src="img/uinales_alterno/${haab_imagen}.png" alt="Descripción">
            </div>
            <div class="text-below">${texto_bajo}</div>
        </div>`;
        firstDay++;
    }

    // Completa la semana si el último día del mes no es un Sábado
    if (firstDay !== 7) {
        for (let i = firstDay; i < 7; i++) {
            let cell = row.insertCell();
        }
    }
}

// Obtén la fecha actual
// let now = new Date();
// let currentYear = now.getFullYear();
// let currentMonth = now.getMonth();

// Llama a createCalendar pasándole el elemento de la tabla, el año y el mes actual
//obtenemos el año y mes de los selectores
let year = document.querySelector('.selector-fecha select[name="anio"]').value;
let month = document.querySelector('.selector-fecha select[name="mes"]').value;
console.log(year);
console.log(month);

let calendarEl = document.querySelector('.calendar');
createCalendar(calendarEl, year, month);


document.querySelector('.selector-fecha form').addEventListener('change', function () {

    this.submit(); // Envía el formulario cada vez que se cambia una opción
});