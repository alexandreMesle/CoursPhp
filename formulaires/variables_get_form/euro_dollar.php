<html>
  <head>
    <title>
      Convertisseur Euro/Dollar
    </title>
  </head>
  <body>
    <form method="get" action="euro_dollar.php">
        Montant en €
        <input name="euro" value=
        "<?php
            if(isset($_GET['euro']))
                print($_GET['euro']);
            else
                print(0);
        ?>">
        <br>
        Montant en $
        <input name="dollar" value=
        "<?php
        if(isset($_GET['dollar']))
          print($_GET['dollar']);
        else
          print(0);
        ?>">
        <br>
        <input type="submit" value="Convertir">
    </form>
    <?php
        $cours = 1.0684;
        if(isset($_GET['euro']) && is_numeric($_GET['euro']))
        {
          $dollar = $_GET['euro'] * $cours;
          print($_GET['euro'] . " € = $dollar \$.<BR>");
        }
        if(isset($_GET['dollar']) && is_numeric($_GET['dollar']))
        {
          $euro = $_GET['dollar'] / $cours;
          print($_GET['dollar'] . " \$ = $euro €.<BR>");
        }
    ?>
    <hr>
    <p>
      La variable <code>$_GET</code> contient <br>
    <pre><?php var_dump($_GET); ?></pre>
    </p>
  </body>
</html>
