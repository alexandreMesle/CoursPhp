<!DOCTYPE html>
<html lang="fr">
  <head>
    <title>Calculatrice</title>
  </head>

  <body>
  <form method="get" action=".">

<!--
            Opérande 1
-->

    <input name="operande_1"
      <?php
      if (isset($_GET['operande_1']))
        print('value="'.$_GET['operande_1'].'"');
      ?>>

<!--
            Opérateur
-->

    <select name="operateur">
      <option value="plus"
      <?php
      if (isset($_GET['operateur'])&&$_GET['operateur'] == 'plus')
          print('selected');
      ?>>
        +
      </option>
      <option value="moins"
      <?php
      if (isset($_GET['operateur'])&&$_GET['operateur'] == 'moins')
          print('selected');
      ?>>
        -
      </option>
      <option value="mul"
      <?php
      if (isset($_GET['operateur'])&&$_GET['operateur'] == 'mul')
          print('selected');
      ?>>
        *
      </option>
      <option value="div"
      <?php
      if (isset($_GET['operateur'])&&$_GET['operateur'] == 'div')
          print('selected');
      ?>>
        /
      </option>
    </select>

<!--
            Opérande 2
-->

    <input name="operande_2"
      <?php
      if (isset($_GET['operande_2']))
        print('value="'.$_GET['operande_2'].'"');
      ?>>

<!--
             Bouton
-->

      <input type="submit" value="Go !">
  </form>

<!--
            Résultat
-->

  <?php if (isset($_GET['operande_1']) && is_numeric($_GET['operande_1'])
    && isset($_GET['operande_2']) && is_numeric($_GET['operande_2']))
  {
    switch($_GET['operateur'])
    {
      case 'plus' : print("= " . ($_GET['operande_1']+$_GET['operande_2'])); break;
      case 'moins' : print("= " . ($_GET['operande_1']-$_GET['operande_2'])); break;
      case 'mul' : print("= " . ($_GET['operande_1']*$_GET['operande_2'])); break;
      case 'div' : print("= " . ($_GET['operande_1']/$_GET['operande_2'])); break;
    }
  } ?>
  </body>
</html>