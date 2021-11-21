<!DOCTYPE html> <!--General HTML formatting, including CSS file-->
<html>
   <head>
      <title>Shopping List Form</title>
      <link rel="stylesheet" type="text/css" href="main.css">
   </head>
   <body>
      <header>
         <h1>Shopping List Form</h1>
      </header>
      <main>
         <p><?php print_r($shopping_list); ?></p>
		 
		 
         <!-- Part 1: The Errors -->
         <?php if (count($errors) > 0) : ?> <!--Lists errors-->
         <h2>Errors:</h2>
         <ul>
            <?php foreach($errors as $error) : ?>
            <li><?php echo $error; ?></li>
            <?php endforeach; ?>
         </ul>
         <?php endif; ?>
		 
		 
         <!-- Part 2: The Item -->
         <h2>Item:</h2>
         <?php if (count($shopping_list) == 0) : ?> <!--IF there are no items in list, display this error-->
         <p>There are no Items in the Shopping list.</p>
         <?php else: ?>
         <ul>
            <?php foreach( $shopping_list as $id => $item ) : ?>
            <li><?php echo $id + 1 . '. ' . $item; ?></li>
            <?php endforeach; ?>
         </ul>
         <?php endif; ?>
         <br>
		 
		 
         <!-- Part 3: Add Form -->
         <h2>Add Item:</h2>
         <form action="." method="post" >
            <?php foreach( $shopping_list as $item ) : ?>
            <input type="hidden" name="itemlist[]"
               value="<?php echo $item; ?>">
            <?php endforeach; ?>
            <label>Item:</label>
            <input type="text" name="newitem" id="newitem"> <br>
            <label>&nbsp;</label>
            <input type="submit" name="action" value="Add Item"> <!--Add item button-->
         </form>
         <br>
		 
		 
         <!-- Part 4: Modify/Promote/Delete Form -->
         <?php if (count($shopping_list) > 0 && empty($item_to_modify)) : ?>
         <h2>Select Item:</h2>
         <form action="." method="post" >
            <?php foreach( $shopping_list as $item ) : ?>
            <input type="hidden" name="itemlist[]"
               value="<?php echo $item; ?>">
            <?php endforeach; ?>
            <label>Item:</label>
            <select name="itemid">
               <?php foreach( $shopping_list as $id => $item ) : ?>
               <option value="<?php echo $id; ?>">
                  <?php echo $item; ?>
               </option>
               <?php endforeach; ?>
            </select>
            <br>
            <label>&nbsp;</label>
            <input type="submit" name="action" value="Modify Item"> <!--Buttons for Modify/Delete/Sort-->
            <input type="submit" name="action" value="Promote Item">
            <input type="submit" name="action" value="Delete Item">
            <br>
            <label>&nbsp;</label>
            <input type="submit" name="action" value="Sort Item">
         </form>
         <?php endif; ?>
		 
		 
         <!-- Part 5: Modify Form -->
         <?php if (!empty($item_to_modify)) : ?>
         <h2>Item to Modify:</h2>
         <form action="." method="post" >
            <?php foreach( $shopping_list as $item ) : ?>
            <input type="hidden" name="itemlist[]" value="<?php echo $item; ?>">
            <?php endforeach; ?>
            <label>Item:</label>
            <input type="hidden" name="modifieditemid" value="<?php echo $item_index; ?>">
            <input type="text" name="modifieditem" value="<?php echo $item_to_modify; ?>"><br>
            <label>&nbsp;</label>
            <input type="submit" name="action" value="Save Changes"> <!--Buttons for Modify Form at the end-->
            <input type="submit" name="action" value="Cancel Changes">
         </form>
         <?php endif; ?>
      </main>
   </body>
</html>
