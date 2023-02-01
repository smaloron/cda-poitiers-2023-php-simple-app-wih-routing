<h3>Nouvelle adresse</h3>
<form method="post">
    <div>
        <label>rue</label>
        <input type="text" name="rue" value="<?= $address["rue"] ?? "" ?>">
    </div>
    <div>
        <label>code postal</label>
        <input type="text" name="code_postal" value="<?= $address["code_postal"] ?? "" ?>">
    </div>
    <div>
        <label>ville</label>
        <input type="text" name="ville" value="<?= $address["ville"] ?? "" ?>">
    </div>

    <div>
        <button type="submit" name="submit">
            Valider
        </button>
    </div>
</form>