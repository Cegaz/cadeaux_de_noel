<h2>Ce petit programme vous permet de gérer automatiquement le tirage au sort des cadeaux de Noël.</h2>

<form action="index.php" method="post">
    <label for="number">Combien de personnes ?</label>
    <input type="number" min="2" name="number" value="2">

    <p>Voulez-vous voir le résultat du tirage au sort ?
    <input type="radio" name="seeResult" value=1 id="true" checked><label for="true">oui</label>
    <input type="radio" name="seeResult" value=0 id="false"><label for="false">non</label><br>
    </p>

    <div class="button">
        <input type="submit" value="valider" name="form1submit">
    </div>
</form>
