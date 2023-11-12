<html>
  <head>
    <title>
      Convertisseur Euro en Dollar
    </title>
  </head>
  <body>
    <form method="get" action="index.php">
        Montant en €
        <input name="euro" value="0">
        <input type="submit">
    </form>
    <p>
      <?php
        if (isset($_GET['euro']) && is_numeric($_GET['euro']))
        {
          $cours = 1.0684;
          $dollar = $_GET['euro'] * $cours;
          print($_GET['euro'] . " € = $dollar \$.");
        }
      ?>
    </p>
    <hr>
    <p>
      La variable <code>$_GET</code> contient <br>
      <pre><?php var_dump($_GET); ?></pre>
    </p>
  </body>
</html>
