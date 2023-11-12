<html>
  <head>
    <title>
      Convertisseur Euro en Dollar
    </title>
  </head>
  <body>
    <form method="post" action=".">
        Montant en €
        <input name="euro" value=
        "<?php
        if(isset($_POST['euro']))
          print($_POST['euro']);
        else
          print(0);
        ?>">
        <input type="submit">
    </form>
    <p>
      <?php
        if (isset($_POST['euro']) && is_numeric($_POST['euro']))
        {
          $cours = 1.0684;
          $dollar = $_POST['euro'] * $cours;
          print($_POST['euro'] . " € = $dollar \$.");
        }
      ?>
    </p>
    <hr>
    <p>
      La variable <code>$_POST</code> contient <br>
      <pre><?php var_dump($_POST); ?></pre>
    </p>
  </body>
</html>
