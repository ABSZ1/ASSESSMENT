<!DOCTYPE html>
<html>

   <!--The head section -->
   <head>
      <title>Shopping List Manager</title>
      <link rel="stylesheet" type="text/css" href="main.css" />
   </head>
   
   <!--The body section -->
   <body>
   
      <header>
         <h1>Shopping List Manager</h1>
      </header>
	  
      <main>
         <h1>!Database Error!</h1>
         <p>There was an error connecting to the database.</p>
         <p>The database must be installed as described in the appendix.</p>
         <p>MySQL must be running as described in chapter 1.</p>
         <p>Error message: <?php echo $error_message; ?></p>
         <p>&nbsp;</p>
      </main>
	  
      <footer>
         <p>&copy; <?php echo date("Y"); ?> Woolworths, Inc.</p>
      </footer>
	  
   </body>
</html>
