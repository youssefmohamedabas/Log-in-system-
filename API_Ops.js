// Get the value from the date input
const dateInput = document.getElementById('dateInput');
const actorsBtn = document.getElementById('actorsBtn');
const actorsList = document.querySelector('.actors__list');

console.log(actorsBtn);
actorsBtn.addEventListener('click', () => {
    const date = dateInput.value;
    console.log(date);
    const dateAsArray = date.split('-');
    const day = dateAsArray[2];
    const month = dateAsArray[1];

    if (date === '') {
        actorsList.innerHTML = `
            <li class="error">
                Please select a date to see the actors born on the same day
            </li>
        `;
        console.log('Please select a date');
    } else {
        actorsList.innerHTML = '';
        fetchActorBornToday(day, month);
    }
});

// Fetch MDBI API 

// Constant variables
const BASE_URL = 'https://online-movie-database.p.rapidapi.com';
const ACTOR_BORN_TODAY_ENDPOINT = `/actors/list-born-today?`;
const ACTOR_BIO_ENDPOINT = '/actors/get-bio?nconst=';


function fetchActorBornToday(day, month) {
    const options = {
        method: 'GET',
        headers: {
            'X-RapidAPI-Key': '1e1a0cdcfemsh63e4159692e779dp1def68jsn7277beaa5e42',
            'X-RapidAPI-Host': 'online-movie-database.p.rapidapi.com'
        }
    };
    fetch(`${BASE_URL}${ACTOR_BORN_TODAY_ENDPOINT}month=${month}&day=${day}`, options)
        .then(response => response.json())
        .then(response => {
            response.forEach((actor, index) => {
                // get only five actors
                if (index > 4) return;
                // actor = /name/actorID/
                const actorId = actor.split('/')[2]; // actorID only 

                setTimeout(() => {
                    // set timeout to avoid 429 error (too many requests)
                    // fetch actor bio
                    fetch(`${BASE_URL}${ACTOR_BIO_ENDPOINT}${actorId}`, options)
                        .then(response => response.json())
                        .then(response => {
                            console.log(response)

                            actorsList.innerHTML += `
                        <li class="actor" data-id=${actorId}>
                            <span class="name">${response.name}</span>
                           
                        </li>
                        `;
                        })
                        .catch(err => console.error(err));
                }, index * 1000)
            });
        })
        .catch(err => console.error(err));
}

