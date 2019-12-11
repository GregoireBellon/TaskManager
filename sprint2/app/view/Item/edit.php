<?php
include_once('View.php');
include('app/view/Basics/header.php');?>

            <form id='editItem' action='index.php'>
                Description : <input type='text' name='description' id='description'  value='".$donnees['description']."'><br />
                Date d'échéance : <input type='text' name='expiration' id='expiration'  value='".$donnees['expiration']."'><br />
                <input type='hidden' name='slug' value='$slug'>
                <input type='hidden' name='action' value='do_edit'>

                <input type='submit' value='Modifier'>
            </form>

<?php
include('app/view/Basics/footer.php');?>
        
