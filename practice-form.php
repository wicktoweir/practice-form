<?php 
  $name = '';
//Here we created an empty array for the $errors variable.
  $errors = [];
  $city = '';

/*first we want to check to see if the form has been submitted, 
or if the visitor is just entering the form. The below funtion 
is asking if the $_POST variable is not empty. If it is empty, 
the visitor has not submitted the form, so none of the errors 
will be shown. If it is not empty it will move onto the nested
if statement.*/
  if (!empty($_POST))
  {
/*Next, we check if the name field has been filled out. Below we 
are asking, if the name field is not empty by calling up the 
$_POST['name']. If the field is not empty we move into the brackets
and create a variable $name with the value entered into the form.*/
    if (!empty($_POST['name']))
    {
      $name=$_POST['name'];
/*The if statement below is asking if the name is less than or 
equal to the length of 5 characters. If it is less than 5 chars
the $error message is set.*/
      if (strlen($name) <= 1) {
// Each $errors variable was given a key
        $errors['name']='Get a longer name, please';
      }
/*The if statement below is checking whether or not the characters
are alphabetical characters or not. If they are not alphabetical 
the error message is set.*/
      if (!ctype_alpha($name)) {
        $errors['name']='Get out of here, robot';
      }
/*This else statement goes back to the !empty($_POST['name])
if statement above. If the name input is not empty the variable
$name will be created as established above. If it is empty the 
error below will appear.*/  
    } else {
      $errors['name']='You must fill out a name!';
    }



    if (!empty($_POST['city']))
    {
      $city=$_POST['city'];
      if (strlen($city) <= 2) {
        $errors['city']='Please fill out a legitimate city!';
      }
      if (!ctype_alpha($city)) {
        $errors['city']='All of the cities I know only have letters';
      }  
    } else {
      $errors['city']='You must fill out a city!';
    }
  }
?>
<!DOCTYPE html>

<html>

<head>
</head>
<body>
<!--The action on the form is submitting the form to itself.--> 
  <form action='practice-form.php' method='POST'>
<!--the php echo of the variable seen below is echoing out what the user
  typed into the field so that if they have any errors their information 
  they have already submitted will not be lost-->
    Name: <input type='text' name='name' value='<?php echo $name; ?>'><br>
<!-- Here we are checking if the $errors variable with the key of 'name' is 
  empty. If it is not empty, the error with the key of 'name' will be echoed
  to show the corresponding error. The same is done for the city -->
    <?php 
      if (!empty($errors['name'])) {
        echo '<p>' . $errors['name'] . '</p>';
      }
    ?>
    City: <input type='text' name='city' value='<?php echo $city; ?>'><br>
    <?php
      if (!empty($errors['city'])) {
        echo '<p>' . $errors['name'] . '</p>';
      }
    ?>

    <input type='submit' value='submit'>
  </form>

</body>
</html>
