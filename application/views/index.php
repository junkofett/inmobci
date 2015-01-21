<html>
  <head>
  	<title>Inmuebles</title>
  </head>
  <body>
    <h3 align="center">Criterios de busqueda</h3>
    
    <?= filtros() ?>

    <?= tabla_inm($res) ?>

	<?php if (isset($telefono)): ?>
		<h3><?= $telefono ?></h3>
	<?php endif; ?>
  </body>
</html>