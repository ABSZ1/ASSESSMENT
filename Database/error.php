<!DOCTYPE html>
<html>

<!-- the head section -->
<head>
    <title>Shopping List Manager</title>
    <link rel="stylesheet" type="text/css" href="main.css" />
</head>

<!-- the body section -->
<body>
    <header><h1>My Shopping List</h1></header>

    <main>
        <h2 class="top">Error</h2>
        <p><?php echo $error; ?></p>
		<form method="POST" action="add_product_form.php">
		    <input type="Submit" value="Return"/>
    </main>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> Woolworths, Inc.</p>
    </footer>
</body>
</html>
