<h2>Liste des personnes</h2>

<div>
    <a href="/person/new">Ajouter une personne</a>
</div>

<table>
    <thead>
        <tr>
            <th>Nom complet</th>
            <th>Adresse</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($personList as $person) : ?>
        <tr>
            <td><?= $person["nom_complet"] ?></td>
            <td><?= $person["rue"] . " " . $person["code_postal"] . " " . $person["ville"]  ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>