<!DOCTYPE html> <!--Basic HTML Formatting-->
<html>
   <head>
      <title>Item List Manager</title>
      <link rel="stylesheet" type="text/css" href="main.css"> <!--Linking Style Sheet-->
   </head>
   <body>
      <header>
         <h1>Item List Manager</h1>
      </header>
      <main>
         <p><?php print_r($shopping_list); ?></p> <!--Displays array-->
		 
		 
         <!-- Part 1: Errors -->
         <?php if (count($errors) > 0) : ?> <!--If an error is detected, message below will be executed-->
         <h2>Error/s:</h2>
		 
         <ul>
            <?php foreach($errors as $error) : ?>
            <li><?php echo $error; ?></li>
            <?php endforeach; ?>
         </ul>
         <?php endif; ?>
		 
		 
         <!-- Part 2: Items -->
         <h2>items:</h2>
		 
         <?php if (count($shopping_list) == 0) : ?> <!--If there are no items, message below will appear-->
         <p>There are no items in the item list.</p>
         <?php else: ?>
         <ul>
            <?php foreach( $shopping_list as $id => $item ) : ?>
            <li><?php echo $id + 1 . '. ' . $item; ?></li>
            <?php endforeach; ?>
         </ul>
         <?php endif; ?>
         <br>
		 
		 
         <!-- Part 3: The Add form -->
         <h2>Add item:</h2>
		 
         <form action="." method="post" >
            <?php foreach( $shopping_list as $item ) : ?>
            <input type="hidden" name="itemlist[]"
               value="<?php echo $item; ?>">
            <?php endforeach; ?>
            <label>item:</label>
            <input type="text" name="newitem" id="newitem"> <br>
            <label>&nbsp;</label>
            <input type="submit" name="action" value="Add item">
         </form>
         <br>
		 
		 
         <!-- Part 4: The Modify/Promote/Delete form -->
         <?php if (count($shopping_list) > 0 && empty($shopping_to_modify)) : ?>
		 
         <h2>Select item:</h2>
		 
         <form action="." method="post" >
            <?php foreach( $shopping_list as $item ) : ?>
            <input type="hidden" name="itemlist[]"
               value="<?php echo $item; ?>">
            <?php endforeach; ?>
			
            <label>item:</label>
			
            <select name="itemid">
               <?php foreach( $shopping_list as $id => $item ) : ?>
               <option value="<?php echo $id; ?>">
                  <?php echo $item; ?>
               </option>
               <?php endforeach; ?>
            </select>
            <br>
            <label>&nbsp;</label>
            <input type="submit" name="action" value="Modify item">
            <input type="submit" name="action" value="Promote item">
            <input type="submit" name="action" value="Delete item">
            <br>
            <label>&nbsp;</label>
            <input type="submit" name="action" value="Sort items">
         </form>
         <?php endif; ?>
		 
		 
         <!-- Part 5: The Modify form -->
         <?php if (!empty($shopping_to_modify)) : ?>
		 
         <h2>item to Modify:</h2>
		 
         <form action="." method="post" >
            <?php foreach( $shopping_list as $item ) : ?>
            <input type="hidden" name="itemlist[]" value="<?php echo $item; ?>">
            <?php endforeach; ?>
            <label>item:</label>
            <input type="hidden" name="modifieditem" value="<?php echo $item_index; ?>">
            <input type="text" name="modifieditem" value="<?php echo $shopping_to_modify; ?>"><br>
            <label>&nbsp;</label>
            <input type="submit" name="action" value="Save Changes">
            <input type="submit" name="action" value="Cancel Changes">
         </form>
         <?php endif; ?>
      </main>
   </body>
</html>
