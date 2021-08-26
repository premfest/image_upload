<?php
if (isset($_POST['submit'])) {
   $file=$_FILES['file'];

   
   $fileName=$_FILES['file']['name'];
   $fileTempName=$_FILES['file']['tmp_name'];
   $fileSize=$_FILES['file']['size'];
   $fileError=$_FILES['file']['error'];
   $fileType=$_FILES['file']['type'];

   $fileExt=explode('.',$fileName);
   $fileActualExt=strtolower(end($fileExt));

   $allowed=array('jpg', 'jpeg', 'png', 'pdf');

   if (in_array($fileActualExt, $allowed)) {
       if ($fileError===0) {
           if ($fileSize<100000000) {
               $fileNameNew=uniqid('',true).".".$fileActualExt;
               $fileDestination='uplodes/'.$fileNameNew;
               move_uploaded_file($fileTempName, $fileDestination);
               header("Location: index.php?upload=success");
           } else {
               echo "Your file is too big";
           }
       } else {
        echo "Error on uploading file";
       }
   } else {
      echo "You cannot upload ffile pf this type!";
   }
}



