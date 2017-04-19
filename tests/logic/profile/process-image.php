<?php
//if they DID upload a file...
if ($_FILES['image']['name']) {
    print_r($_FILES['image']);

    move_uploaded_file($_FILES['image']['tmp_name'], '/images');
}

//you get the following information for each file:
// $_FILES['field_name']['name']
// $_FILES['field_name']['size']
// $_FILES['field_name']['type']
// $_FILES['field_name']['tmp_name']
