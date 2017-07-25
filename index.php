<!DOCTYPE html>
<html>

<head>
    <title>This Is File Upload Demo</title>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <style type="text/css">
        html,
        body {
            height: 100%;
            width: 100%;
        }
        
        .background {
            background-repeat: no-repeat;
            background-image: url('img/bg.jpg');
            background-size: cover;
        }
        
        .fullscreen,
        .content-a {
            width: 100%;
            height: 100%;
            overflow: hidden;
        }
        
        .fullscreen.overflow,
        .fullscreen.overflow .content-a {
            height: auto;
            min-height: 100%;
        }
        
        .content-a {
            display: table;
        }
        
        .content-b {
            display: table-cell;
            position: relative;
            vertical-align: middle;
            text-align: center;
        }
        
        .files input {
            outline: 2px dashed #92b0b3;
            outline-offset: -10px;
            -webkit-transition: outline-offset .15s ease-in-out, background-color .15s linear;
            transition: outline-offset .15s ease-in-out, background-color .15s linear;
            padding: 120px 0px 85px 35%;
            text-align: center !important;
            margin: 0;
            width: 100% !important;
        }
        
        .files input:focus {
            outline: 2px dashed #92b0b3;
            outline-offset: -10px;
            -webkit-transition: outline-offset .15s ease-in-out, background-color .15s linear;
            transition: outline-offset .15s ease-in-out, background-color .15s linear;
            border: 1px solid #92b0b3;
        }
        
        .files {
            position: relative
        }
        
        .files:after {
            pointer-events: none;
            position: absolute;
            top: 60px;
            left: 0;
            width: 50px;
            right: 0;
            height: 56px;
            content: "";
            background-image: url(https://image.flaticon.com/icons/png/128/109/109612.png);
            display: block;
            margin: 0 auto;
            background-size: 100%;
            background-repeat: no-repeat;
        }
        
        .color input {
            background-color: #f1f1f1;
        }
        
        .files:before {
            position: absolute;
            bottom: 10px;
            left: 0;
            pointer-events: none;
            width: 100%;
            right: 0;
            height: 57px;
            content: " or drag it here. ";
            display: block;
            margin: 0 auto;
            color: #2ea591;
            font-weight: 600;
            text-transform: capitalize;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="fullscreen background">
        <div class="content-a">
            <div class="content-b">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3">
                            <form method="post" action="" enctype="multipart/form-data">
                                <div class="form-group files color">
                                    <input type="file" class="form-control" multiple="" name="image">
                                </div>

                                <input type="submit" />
                            </form>
                        </div>
                    </div>
                    <?php
                        $uploadDir = 'upload/';
                        if(isset($_FILES['image'])){
                            $tempFile   = $_FILES['image']['tmp_name'];
                            
                            // New File Name generate
                            $file_extention = explode('.', $_FILES['image']['name']);
                            $file_name_new = uniqid('',true). '.' .end($file_extention);

                            // Upload File Directory
                            $uploadDir  = $_SERVER['DOCUMENT_ROOT'] . $uploadDir;
                            //echo $uploadDir;
                            $targetFile = $uploadDir . $file_name_new;
                            // Save the file
                            if(move_uploaded_file($tempFile, $targetFile)){
                                echo "File Upload Successfully";
                            } else {
                                echo "Something Wrong Please Try Again.";
                            }
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>


</body>

</html>