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
    case 'additem':
        $new_shopping = filter_input(INPUT_POST, 'newitem');
        if (empty($new_shopping)) {
            $errors[] = 'The Item cannot be empty.';
        } else {
            $shopping_list[] = $new_shopping;
            array_unshift($shopping_list, $new_shopping);
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
    case 'Modify List':
        $shopping_index = filter_input(INPUT_POST, 'item', FILTER_VALIDATE_INT);
        if ($shopping_index === NULL || $shopping_index === FALSE){
            $errors[] ='The Item cannot be modified.';
      }else{
        $shopping_to_modify = $shopping_list[$shopping_index];
      }
      break;
  case 'Save Changes':
    $i = filter_input(INPUT_POST, 'modifeditem', FILTER_VALIDATE_INT);
    $modified_item = filter_input(INPUT_POST, 'modifieditem');
    if (empty($modified_item)) {
      $errors[] = 'The modified item cannot be empty';
   }
   else {
      $shopping_list[$i] = $modified_item;
      $modified_item = '';
    }
    break;
  case 'Cancel Changes':
    $modified_item = '';
    break;
  case 'Promote Item':
    $shopping_index = filter_input(INPUT_POST, 'item', FILTER_VALIDATE_INT);
    if ($shopping_index === NULL || $shopping_index === FALSE) {
      $errors[] = 'The item cannot be promoted.';
    } 
    elseif ($shopping_index == 0) {
      $errors[] = 'You cannot promote the first item.';
      include('shopping_list.php');
      } else {
      $shopping_value = $shopping_list[$shopping_index];
      $prior_shopping_value = $shopping_list[$shopping_index-1];
      
      $shopping_list[$shopping_index-1] = $shopping_value;
      $shopping_list[$shopping_index] = $prior_shopping_value;
     
     break;
      }
      
  case 'Sort List':
    sort($shopping_list);
    break;
 }

include('shopping_list.php')
?>
