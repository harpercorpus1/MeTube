<?php 
    session_start();
?>

<?php
  include 'header.php';
  include 'account_sidebar.php';
  include_once 'mysql_lib.php';
  include_once 'function.php';
?>

<div class="anti-sidebar">
<?php
    if(!isset($_GET['act'])){
        echo "<h1>Contact List</h1>";
        $result = get_contacts($_SESSION['username']);
        if($result == NULL){
            echo "No Contacts<br>";
        }else{
            while($row = mysqli_fetch_array($result)){
                echo $row['username_b'] . '-->' . $row['type'] . "<br>";
            }
        }

        echo "<br>";
        
        echo '<a class="contact-button" href="contact_list.php?act=add">Add Contact to Contact List<br></a>';
        echo '<a class="contact-button" href="contact_list.php?act=edit">Edit Contact List<br></a>';
        echo '<a class="contact-button" href="contact_list.php?act=remove">Remove Contact From Contact List<br></a>';
    }else if(isset($_GET['act'])){
        if($_GET['act'] == 'add'){
            echo "<h1>Add to Contact List</h1>";
            echo '<form action="add_contact.php" method="get">';
            echo "<label for='username'>Username of User To add to contact List: </label>";
            echo "<input type='text' id='username' name='username'>";
            echo "<br>";
            echo "<label for='class'>Type of Contact: </label>";
            echo '<select name="class" id="class">';
            echo "<option value='family'>Family</option>";
            echo "<option value='friend'>Friend</option>";
            echo '</select>';
            echo "<br>";
            echo '<input type="hidden" name="act" value="add">';
            echo '<input type="submit" value="Submit">';
            echo "</form>";
        }else if($_GET['act'] == 'edit'){
            echo "<h1>Edit Contact List</h1>";
            echo '<form action="edit_contact.php" method="get">';
            echo "<label for='username'>Username of User To toggle: </label>";
            echo "<input type='text' id='username' name='username'>";
            echo "<br>";
            echo '<input type="hidden" name="act" value="add">';
            echo '<input type="submit" value="Submit">';
            echo "</form>";
        }else if($_GET['act'] == 'remove'){
            echo "<h1>Remove from Contact List</h1>";
            echo '<form action="delete_contact.php" method="get">';
            echo "<label for='username'>Username of User To Remove: </label>";
            echo "<input type='text' id='username' name='username'>";
            echo "<br>";
            echo '<input type="hidden" name="act" value="remove">';
            echo '<input type="submit" value="Submit">';
            echo "</form>";
        }else{
            //error condition
            header('Location: contact_list.php');
        }
    }else if(isset($_GET['username'])){
        echo "complete: " . $_GET['username'];
    }
?>

</div>