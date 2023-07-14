<?php

if($_FILES["my_image"]["error"] == 4){
echo
"<script>
alert('Image Does Not Exist');
</script>"
;
}
else{
$fileName=$_FILES["my_image"]["name"];
$fileSize=$_FILES["my_image"]["size"];
$tmpName=$_FILES["my_image"]["tmp_name"];
$imageExtension = explode('.', $fileName);
$imageExtension = strtolower(end($imageExtension));
$newImageName = uniqid();
$newImageName .= '.' . $imageExtension;
move_uploaded_file($tmpName, 'uploads/' . $newImageName);
}
?>