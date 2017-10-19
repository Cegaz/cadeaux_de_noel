<form action="index.php" method="post">

<?php
for ($i = 0; $i < $_POST['number']; $i++) { ?>
    <div class="form-group">
        <label for="name" class="block">personne n°<?php echo ($i+1); ?></label>
        <input type='text' id="name" name='name[<?php echo $i; ?>]'>
    </div>
    <div class="form-group">
        <label class="block">e-mail</label>
        <input type='email' name='email[<?php echo $i; ?>]'><br><br>
    </div>
<?php } ?>
    <div class="button">
        <input type="submit" value="valider" name="form2submit">
    </div>
    </form>

