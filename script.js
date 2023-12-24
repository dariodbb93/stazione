let wrapper = document.querySelector('#wrapper');

fetch('meteo.php')
    .then(response => response.json())
    .then(previsioni => {
        view(previsioni);
    })
    .catch(error => {
        console.error('Errore nel recupero dei dati:', error);
    });

function view(previsioni) {
    // Inverto l'array delle previsioni
    const previsioniReversed = previsioni.reverse();

    // Itero sulle previsioni e creo le righe della tabella
    previsioniReversed.forEach(previsione => {
        let row = document.createElement('div');
        row.classList.add('row', 'align-items-center');
        row.innerHTML = `
            <div class="col">${previsione[0]}</div>
            <div class="col">${previsione[1]}</div>
            <div class="col">${previsione[2]}</div>
        `;
        wrapper.appendChild(row);
    });
}
