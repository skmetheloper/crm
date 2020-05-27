//* current http://localhost/view/index.php
//* SQL: SELECT * FRORM `product`
fetch('/db.cached.json')
    .then(res => res.json())
    .then(res => showData(res))
    .catch(res => showError(res.status))

function showData(products) {
    let cards = document.querySelector('.ui.cards');
    let template = cards.querySelector('template');

    products.forEach(({
        id,
        product_name,
        product_code,
        category_id,
        unit,
        unit_price,
        currency,
        total_price,
        visibility_group,
        active_flag,
        description,
        tax,
        custom_attribute
    }) => {
        let card = template.content.cloneNode(true);
        card.querySelector('.header').textContent = `${product_name} ${product_code}`;
        card.querySelector('.meta').textContent = unit;
        card.querySelector('.description').textContent = description;
        cards.appendChild(card);
    })
}

function showError(status) {
    alert(status)
}
