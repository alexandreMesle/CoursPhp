<!DOCTYPE html>
<html lang="fr">
  <head>
    <title>Calculatrice</title>
  </head>
  <body>
  <form method="get" action="get">
    <input name="operande_1"
      <?php
      if (isset($_GET['operande_1']))
        print('value="'.$_GET['operande_1'].'"');
      ?>
    >
    <select name="operateur">
      <option value="+"
        <?php if ($_GET['operateur'] == '+') print('selected'); ?>
      >+</option>
      <option value="-"
        <?php if ($_GET['operateur'] == '-') print('selected'); ?>
      >-</option>
      <option value="*"
        <?php if ($_GET['operateur'] == '*') print('selected'); ?>
      >*</option>
      <option value="/"
        <?php if ($_GET['operateur'] == '/') print('selected'); ?>
      >/</option>
    </select>
    <input name="operande_2"
      <?php
      if (isset($_GET['operande_2']))
        print('value="'.$_GET['operande_2'].'"');
      ?>
    >
    <input type="submit" value="Go !">
  </form>
  <?php if (is_numeric($_GET['operande_1']) && is_numeric($_GET['operande_2']))
  {
    switch($_GET['operateur'])
    {
      case '+' : print("= " . ($_GET['operande_1']+$_GET['operande_2'])); break;
      case '-' : print("= " . ($_GET['operande_1']-$_GET['operande_2'])); break;
      case '*' : print("= " . ($_GET['operande_1']*$_GET['operande_2'])); break;
      case '/' : print("= " . ($_GET['operande_1']/$_GET['operande_2'])); break;
    }
  } ?>
  </body>
</html>