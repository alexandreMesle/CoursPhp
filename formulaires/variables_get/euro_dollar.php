<html>
  <head>
    <title>
      Convertisseur Euro/Dollar
    </title>
  </head>
  <body>
    <?php
      $cours = 1.0684;
      if (isset($_GET['euro']) || isset($_GET['dollar']))
      {
        if(isset($_GET['euro']))
        {
          $dollar = $_GET['euro'] * $cours;
          print($_GET['euro'] . " € = $dollar \$.<BR>");
        }
        if(isset($_GET['dollar']))
        {
          $euro = $_GET['dollar'] / $cours;
          print($_GET['dollar'] . " \$ = $euro €.<BR>");
        }
      }
      else
      {
        print("Ajoutez <code>?euro=10&dollar=100</code> à la fin de l'adresse du site.");
      }
    ?>
    <hr>
    <p>
      La variable <code>$_GET</code> contient <br>
    <pre><?php var_dump($_GET); ?></pre>
    </p>
  </body>
</html>
