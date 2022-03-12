function initEditModal(asset, title, label, price, status, qte, delivery, description, cat_id, img) {
    document.getElementById('editModalFrom').setAttribute("action", asset);
    document.getElementById('title').value = title;
    document.getElementById('label').value = label;
    document.getElementById('price').value = price;
    document.getElementById('status').value = status;
    document.getElementById('qte').value = qte;
    document.getElementById('delivery').value = delivery;
    document.getElementById('description').innerHTML = description;
    document.getElementById('cat_id').value = cat_id;
    document.getElementById('thumb').setAttribute("src", img);
}

function initEditModalCat(asset, title) {
    document.getElementById('editModalFrom').setAttribute("action", asset);
    document.getElementById('title').value = title;
}