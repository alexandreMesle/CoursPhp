<html>
  <head>
    <title>
      Convertisseur Euro/Dollar
    </title>
  </head>
  <body>
    <form method="POST" action="euro_dollar.php">
        Montant en €
        <input name="euro" value=
        "<?php
            if(isset($_POST['euro']))
                print($_POST['euro']);
            else
                print(0);
        ?>">
        <br>
        Montant en $
        <input name="dollar" value=
        "<?php
        if(isset($_POST['dollar']))
          print($_POST['dollar']);
        else
          print(0);
        ?>">
        <br>
        <input type="submit" value="Convertir">
    </form>
    <?php
        $cours = 1.0684;
        if(isset($_POST['euro']) && is_numeric($_POST['euro']))
        {
          $dollar = $_POST['euro'] * $cours;
          print($_POST['euro'] . " € = $dollar \$.<BR>");
        }
        if(isset($_POST['dollar']) && is_numeric($_POST['dollar']))
        {
          $euro = $_POST['dollar'] / $cours;
          print($_POST['dollar'] . " \$ = $euro €.<BR>");
        }
    ?>
    <hr>
    <p>
      La variable <code>$_POST</code> contient <br>
    <pre><?php var_dump($_POST); ?></pre>
    </p>
  </body>
</html>
