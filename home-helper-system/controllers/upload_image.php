<?php

$image=$_FILES['image']['name'];

move_uploaded_file($_FILES['image']['tmp_name'],"../uploads/".$image);

echo "Снимката е качена успешно";

?>