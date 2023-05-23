<?php

 include 'menu.php';

?>

<html lang="en">
<head>
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


</head>
<body>

    <div class="d-flex justify-content-center align-items-center vh-100">
        <form enctype="multipart/form-data" method="post" action="uploadcourse.php" class="bg-primary p-3 text-center">
            
            <h3 class="text-center">Upload Course Video</h3>
            <input type="text" class="form-control mt-3" name="name" placeholder="Enter Course Name" required>
            <input type="text" class="form-control mt-3" name="price" required placeholder="Enter Course Price">
            <textarea  class="form-control mt-3" rows="8" name="details" cols="50" placeholder="Video Description"></textarea></br>

            <h5>Upload Course Cover Photo Here</h5>
            <input accept=".jpg,.png" type="file" class="form-control mt-3"  name="cimname"></br>  <!--only for images use (accept=".jpg")-->

            <h5>Upload video Here</h5>
            <input type="file" accept="video/mp4,video/x-m4v,video/*" id="file" class="form-control mt-3"  name="imname"></br>  
            
            <input type="submit" value="Upload" class="mt-3 btn btn-success">  
        </form> 
    </div> 
    <script>
           /* var uploadField = document.getElementById("file");

            uploadField.onchange = function() {
                // 5242880 ~ 5MB
                if(this.files[0].size > 5242880) {
                alert("File is too big!");
                this.value = "";
                };
            }; */
    </script>
</body>
</html>