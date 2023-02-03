<h3>Nouvelle adresse</h3>
<form method="post">
    <div>
        <label>rue</label>
        <input type="text" name="rue" value="<?= $address["rue"] ?? "" ?>">
    </div>
    <div>
        <label>code postal</label>
        <input type="text" name="code_postal" value="<?= $address["code_postal"] ?? "" ?>" id="codePostal">
    </div>
    <div>
        <label>ville</label>
        <select type="text" name="ville" value="<?= $address["ville"] ?? "" ?>" id="selectVille">
        </select>
    </div>

    <div>
        <button type="submit" name="submit">
            Valider
        </button>
    </div>
</form>

<script>
const $codePostal = document.getElementById("codePostal");
const $ville = document.getElementById("selectVille");
let cp;
<?php if (isset($address["code_postal"])) : ?>
ville = "<?= $address["ville"] ?>";
<?php endif ?>

// Récupération de la liste des villes depuis l'API
async function getOptionsForSelect(codePostal) {
    const response = await fetch('http://localhost:8000/api/cp-ville?cp=' + codePostal);
    const data = await response.json();

    if (response.status == '404') {
        return "";
    }
    return data.map((item) => {
        const selected = item == ville ? 'selected' : '';
        return `<option ${selected}>${item}</option>`
    }).join('');
}

// Modification de la liste des villes lors du changement de code postal
$codePostal.onblur = (ev) => {
    getOptionsForSelect(ev.target.value).then((data) => $ville.innerHTML = data);
}

<?php
    if (isset($address["code_postal"])) : ?>
getOptionsForSelect("<?= $address['code_postal'] ?>").then((data) => $ville.innerHTML = data);
<?php endif; ?>
</script>