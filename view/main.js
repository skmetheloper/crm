//* current http://localhost/view/index.html
//* SQL: SELECT * FRORM `users`
fetch('/db.cached.json')
    .then(res => res.json())
    .then(res => showData(res))
    .catch(res => showError(res.status))

function showData(users) {
    let cards = document.querySelector('.ui.cards');
    let template = cards.querySelector('template');

    users.forEach(({
        user_id,
        email,
        first_name,
        last_name,
        visibility_group,
        active_flag,
        permission_set,
        last_login
    }) => {
        let card = template.content.cloneNode(true);
        card.querySelector('.header').textContent = `${first_name} ${last_name}`;
        card.querySelector('.meta').textContent = email;
        card.querySelector('.description').textContent = last_login;
        cards.appendChild(card);
    })
}

function showError(status) {
    alert(status)
}
