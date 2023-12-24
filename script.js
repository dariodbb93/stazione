let wrapper = document.querySelector('#wrapper');
fetch('meteo.php')
    .then(response => {
        response.json()
            .then(previsioni => {

                view(previsioni);

            })

    })

function view(previsioni) {

    previsioniReversed = previsioni.reverse();

    previsioniReversed.forEach(previsione => {

        let row = document.createElement('div');

        row.innerHTML = `
<div class="row align-items-center">
<div class="col">${previsione[2]}</div>
<div class="col">${previsione[1]}</div>
<div class="col">${previsione[0]}</div>
</div>

`
        wrapper.appendChild(row);

    });


}