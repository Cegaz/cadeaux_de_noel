<form action='index.php' method='post'>

<?php
for($i = 0; $i < count($_POST['name']); $i++){
    echo $_POST['name'][$i];
    echo " ne doit pas faire de cadeau à : <select name='contraint[" . $i . "]'>";
    foreach ($_POST['name'] as $name) {
        echo "<option value='" . $name . "'";
        if($_POST['name'][$i] == $name){ echo " selected";}
        echo ">" . $name
            . "</option>";
    }
    echo "</select><br>";
} ?>

    <div class="button">
        <input type="submit" value="valider" name="form3submit">
    </div>
    </form>