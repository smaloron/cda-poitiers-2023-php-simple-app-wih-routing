<h2>Inscription</h2>

<?php if (!empty($message)) : ?>
<div style="background: red; margin-bottom: 10px;">
    <?= $message ?>
</div>
<?php endif; ?>

<form method="post">
    <div>
        <input type="text" name="userName">
    </div>
    <div>
        <input type="password" name="userPassword">
    </div>

    <button type="submit">Valider</button>
</form>