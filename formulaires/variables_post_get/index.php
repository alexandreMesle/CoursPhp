<html>
<head>
    <title>
        Convertisseur Euro/Dollar
    </title>
</head>
<body>
    <p>
        <?php
        if(!isset($_GET['devise']) || $_GET['devise'] != 'euro')
            print('Conversion du <a href="?devise=euro">l\'euro vers le dollar</a><br>');
        if(!isset($_GET['devise']) || $_GET['devise'] != 'dollar')
          print('Conversion du <a href="?devise=dollar">dollar vers l\'euro</a>');
        ?>
    </p>
    <?php
        if(isset($_GET['devise']) && ($_GET['devise'] == 'euro' || $_GET['devise'] == 'dollar'))
        {
            $action = "index.php?devise=" . $_GET['devise'];
            ?>
            <form method="POST" action="<?php print($action); ?>">
                Montant en
                <?php if($_GET['devise'] == "euro")
                    print("euro");
                else
                    print("dollar");
                ?>
                <input name="montant" value=
                "<?php
                if(isset($_POST['montant']))
                  print($_POST['montant']);
                else
                  print(0);
                ?>">
                <input type="submit" value="<?php
                if($_GET['devise'] == 'euro')
                  print("Convertir en dollars");
                else
                  print("Convertir en euros");
                ?>">
            </form>
          <?php
          $cours = 1.0684;
          if(isset($_POST['montant']) && is_numeric($_POST['montant']))
          {
            if($_GET['devise'] == "euro")
              print($_POST['montant'] . '€ = ' . $_POST['montant'] * $cours . '$');
            else
              print($_POST['montant'] . '$ = ' . $_POST['montant'] / $cours . '€');
          }
          ?>

    <?php } ?>
<hr>
<p>
    La variable <code>$_GET</code> contient <br>
<pre><?php var_dump($_GET); ?></pre>
    La variable <code>$_POST</code> contient <br>
    <pre><?php var_dump($_POST); ?></pre>
</p>
</body>
</html>
