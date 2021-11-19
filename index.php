<?php
//get itemlist array from POST
$shopping_list = filter_input(INPUT_POST, 'itemlist', FILTER_DEFAULT,
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
case 'Add Item':
$new_item = filter_input(INPUT_POST, 'newitem');
if (empty($new_item)) {
$errors[] = 'The new item cannot be empty.';
} else {
// $shopping_list[] = $new_item;
//array_push($shopping_list, $new_item);
array_unshift($shopping_list, $new_item); //add the item in first index shifted the array
}
break;
case 'Delete Item':
$item_index = filter_input(INPUT_POST, 'itemid', FILTER_VALIDATE_INT);
if ($item_index === NULL || $item_index === FALSE) {
$errors[] = 'The item cannot be deleted.';
} else {
unset($shopping_list[$item_index]);
$shopping_list = array_values($shopping_list);
}
break;
case 'Modify Item':
$item_index = filter_input(INPUT_POST, 'itemid', FILTER_VALIDATE_INT);
if ($item_index === NULL || $item_index === FALSE) {
$errors[] = 'The item cannot be modified.';
} else {
$item_to_modify = $shopping_list[$item_index];
}
break;
case 'Save Changes':
$i = filter_input(INPUT_POST, 'modifieditemid', FILTER_VALIDATE_INT);
$modified_item = filter_input(INPUT_POST, 'modifieditem');
if (empty($modified_item)) {
$errors[] = 'The modified item cannot be empty.';
} elseif($i === NULL || $i === FALSE) {
$errors[] = 'The item cannot be modified.';
} else {
$shopping_list[$i] = $modified_item;
$modified_item = '';
}
break;
case 'Cancel Changes':
$modified_item = '';
break;
case 'Promote Item':
$item_index = filter_input(INPUT_POST, 'itemid', FILTER_VALIDATE_INT);
if ($item_index === NULL || $item_index === FALSE) {
$errors[] = 'The item cannot be promoted.';
} elseif ($item_index == 0) {
$errors[] = 'You can\'t promote the first item.';
} else {
// get the values for the two indexes
$item_value = $shopping_list[$item_index];
$prior_item_value = $shopping_list[$item_index-1];

// swap the values
$shopping_list[$item_index-1] = $item_value;
$shopping_list[$item_index] = $prior_item_value;
break;
}
case 'Sort Item':
sort($shopping_list);
break;
}

include('shopping_list.php');
?>
