<h3>Upload Form</h3>
<?php
setcookie('current_page', '2', time()+60*60*24*30, '/', httponly:true );
if(!isset($_POST['uppbtn']))
{
?>
    <form action="index.php?page=2" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="myfile">Select file for upload:</label>
            <input type="hidden" name="MAX_FILE_SIZE" value="3145728" />
            <input type="file" class="form-control" name="myfile" accept="image/*">
            </div>
        <button type="submit" class="btn btn-primary" name="uppbtn">Send File</button>
    </form>
<?php
}
else
{
    if(isset($_POST['uppbtn']))
    {
        //errors handling
        if($_FILES['myfile']['error'] != 0)
        {
            echo "<h3/><span style='color:red;'>Upload error code: " .
                  $_FILES['myfile']['error'] . "</span><h3/>";
            exit();
        }
        //does the file exist on server in temp folder?
        if(is_uploaded_file($_FILES['myfile']['tmp_name']))
        {
             //remove the file from temp folder into images folder with origin name
             move_uploaded_file($_FILES['myfile']['tmp_name'], 
                                "./images/".$_FILES['myfile']['name']);
        }
        echo "<h3/><span style='color:green;'>File Uploaded Successfuly!
        </span><h3/>";
    }
}
?>