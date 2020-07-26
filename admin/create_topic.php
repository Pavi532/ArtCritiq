<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="../jquery/jquery-3.4.1.min.js"></script>
    <link href="../fontawesome/css/all.css" rel="stylesheet">
    <script defer src="../fontawesome/js/all.js"></script>
    <style type="text/css">
        form{
            width:500px;
            margin-left:auto;
            margin-right:auto;
        }
        h1,h5{
            color: #209CEE;
        }
        h1{
            text-align:center;
        }
        img{
            max-width:100%;
            padding-top:0.5em;
            margin-top: 0.5em;
        }
    </style>
    <title>Create Topics</title>
</head>
<body>
        <?php
            session_start();
        ?>
        <br>
        <h1>Create Topic</h1>
        
        <div class="container tform">
            <form id="addTopic"  method="post" >
                <label for="cusSelect">Course:</label>
                <select class="custom-select" id="cusSelect" name='cusSelect' required>
                    <option selected>Choose...</option>
                </select>
                <input type="hidden" id="cid" name="cid" value="<?php echo $_SESSION['user_id']?>">
                <br><label for="topic">Topic:</label>
                <input id="topic" class="form-control" type="text" name="topic" placeholder="Enter the topic to be discussed" required>
                <form id="file_form" >
                <label for="img">Image:</label>
                <div class="custom-file"  method="post"  enctypr="multipart/form-data" >
                    <input type="file" class="custom-file-input" id="file" name='file' multiple="false" accept="image/*" required>
                    <label id="fname" class="custom-file-label" for="validatedCustomFile">Choose file... ( jpg , jpeg , png)</label>
                </div>
                <img class='img-thumbnail rounded mx-auto d-block' id="uploaded_img">
                <br><button type="submit" class="btn btn-primary" onclick="addTopic()">Submit</button>
                </form>
                
            </form>
        </div>
</body>
<script type="text/javascript">
var filepath_temp;
var admin_name;
var img_name;

    $(document).ready(function(){
        admin_name = '<?php echo $_SESSION['uname']?>';
        $.ajax({
            type: 'post',
            url: 'get_courses.php',
            data: {admin_name:admin_name},
            success: function(data){
                $('#cusSelect').html(data);
            }
        });
    });

    $(document).on('change','#file',function(){
        var property = document.getElementById("file").files[0];
        img_name = property.name;
        console.log("Detected File Name:",img_name);
        var img_ext = img_name.split(".").pop().toLowerCase();
        if(jQuery.inArray(img_ext,['jpg','jpeg','png']) == -1){
            alert("Invalid Image Format");
        }
        var img_size = property.size;
        if(img_size > 5000000){
            alert("Image is to large. Please upload images which are smaller than 5MB");
        }
        else{
            document.getElementById('fname').innerHTML=img_name;
            console.log("Accepted File Name:",img_name);
            var form_data =  new FormData();
            form_data.append("file",property);
            $.ajax({
                method: 'POST',
                url: 'upload.php',
                data: form_data,
                contentType: false,
                cache: false,
                processData: false,
                beforSend:function(){
                    alert("Image Uploading");
                },
                success:function(data){
                    console.log(data);
                    alert(data);
                    filepath_temp=data;
                    document.getElementById('uploaded_img').src=data;
                    filepath_temp=data;
                }
            });
        }
    });

    function addTopic(){
        
        var option = document.getElementById('cusSelect');
        var course_id = option.options[option.selectedIndex].value;
        var topic = document.getElementById('topic').value;
        $.ajax({
            type: 'post',
            url: 'topic_todb.php',
            data: {filepath_temp:filepath_temp,admin_name:admin_name,course_id:course_id,topic:topic,img_name:img_name},
            success:function(data){
                alert(data);
                
            }
        });
        
        
    }
</script>
</html>