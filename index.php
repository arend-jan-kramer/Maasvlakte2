<!doctype html>
<html>
<head>
	<?php include 'php/head.php';?>
</head>
<body>
	<nav>
        <!-- Deze wordt gebruikt voor de UI jquery om het wisselen van haven en de ip camera -->
        <?php include 'php/nav.php' ?>
    </nav>
    <div id="wrapper">
        <article> <!-- Dit is het rangeer terein -->
            <?php include 'php/overzicht.php' ?>
            <?php include 'php/ipcamera.php' ?>
        </article>
        <aside> <!-- Dit is de lijst met treinen. deze komt aan de rechter kant te staan -->
            <?php include 'php/informatie.php' ?>
        </aside>
        <footer> <!-- Dit is de voet tekst op de pagina -->
            <?php include 'php/footer.php' ?>
        </footer>
    </div>
</body>
</html>