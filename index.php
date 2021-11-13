<?php
//get tasklist array from POST
$shopping_list = filter_input(INPUT_POST, 'shoppinglist', FILTER_DEFAULT,                  
                          FILTER_REQUIRE_ARRAY);
if ($shopping_list === NULL) {
    $shopping_list = array();
}

//get action variable from POST
$action = filter_input(INPUT_POST, 'action');

//initialize error messages array
$errors = array();

//process
switch( $action ) {
    case 'add':
        $new_shopping = filter_input(INPUT_POST, 'Item');
        if (empty($new_shopping)) {
            $errors[] = 'The Item cannot be empty.';
        } else {
            $shopping_list[] = $new_shopping;
        }
        break;
    case 'delete':
        $shopping_index = filter_input(INPUT_POST, 'item', FILTER_VALIDATE_INT);
        if ($shopping_index === NULL || $shopping_index === FALSE) {
            $errors[] = 'The Item cannot be deleted.';
        } else {
            unset($shopping_list[$shopping_index]);
            $shopping_list = array_values($shopping_list);
        }
        break;
}
include('shopping_list.php');
?>
