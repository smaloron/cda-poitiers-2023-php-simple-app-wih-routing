<h2>Nouvelle personne</h2>

<form method="post">

    <fieldset>
        <legend>Contact</legend>
        <div>
            <label>Prénom</label>
            <input type="text" name="person[prenom]">
        </div>
        <div>
            <label>Nom</label>
            <input type="text" name="person[nom]">
        </div>
    </fieldset>

    <fieldset>
        <legend>Adresse</legend>
        <div>
            <label>Rue</label>
            <input type="text" name="address[rue]">
        </div>
        <div>
            <label>Code postal</label>
            <input type="text" name="address[code_postal]">
        </div>
        <div>
            <label>Ville</label>
            <input type="text" name="address[ville]">
        </div>
    </fieldset>

    <div>
        <button type="submit" name="submit">VALIDER</button>
    </div>

</form>