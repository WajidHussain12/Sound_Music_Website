<?php
session_start();
if (isset($_POST['save_audio']) && $_POST['save_audio'] == "Update Audio") {

    $Song_id = $_POST['Song_id'];
    $Song_Name = $_POST['Song_Name'];
    $Artist_Name = $_POST['Artist_Name'];
    $Album_Name = $_POST['Album_Name'];
    $Film_Name = $_POST['Film_Name'];
    $Song_Time_Duration = $_POST['Song_Time_Duration'];
    $Year = $_POST['Year'];
    $category = implode(',', $_POST['category']);

    // check for empty values
    if (empty($Song_Name) || empty($Artist_Name) || empty($Album_Name) || empty($Film_Name) || empty($Song_Time_Duration) || empty($Year)) {
        $_SESSION['message'] = "Please fill all the required fields.";
    } else {
        include "./config.php";

        // Check for duplicate data
        $sql = "SELECT * FROM song_table WHERE Song_Name = '{$Song_Name}' AND Artist_Name = '{$Artist_Name}' AND Album_Name = '{$Album_Name}' AND Film_Name = '{$Film_Name}' AND Year = '{$Year}' AND Song_id <> '{$Song_id}'";
$result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");
if (mysqli_num_rows($result) > 0) {
    $_SESSION['message'] = "Error: Song with the same details already exists.";
    exit();
}

        // Get the existing song file and image
        $sql = "SELECT Song_File, Song_Img FROM song_table WHERE Song_id = {$Song_id}";
        $result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");
        $row = mysqli_fetch_assoc($result);
        $Song_File = $row['Song_File'];
        $Song_Img = $row['Song_Img'];

        // Update song file if a new file is uploaded
        if (isset($_FILES['Song_File']['name']) && !empty($_FILES['Song_File']['name'])) {
            $dir = 'Audio_Songs/';
            $Song_File = $dir . basename($_FILES['Song_File']['name']);

            if (move_uploaded_file($_FILES['Song_File']['tmp_name'], $Song_File)) {
                // Delete the old song file
                unlink($row['Song_File']);
            } else {
                $_SESSION['message'] = "Error uploading song file.";
                exit();
            }
        }

        // Update song image if a new image is uploaded
        if (isset($_FILES['Song_Img']['name']) && !empty($_FILES['Song_Img']['name'])) {
            $dir = 'Audio_Songs_Images/';
            $Song_Img = $dir . basename($_FILES['Song_Img']['name']);

            if (move_uploaded_file($_FILES['Song_Img']['tmp_name'], $Song_Img)) {
                // Delete the old song image
                unlink($row['Song_Img']);
            } else {
                $_SESSION['message'] = "Error uploading song image.";
                exit();
            }
        }

        $sql = "UPDATE song_table SET Song_Name = '{$Song_Name}',  Artist_Name = '{$Artist_Name}',  Album_Name = '{$Album_Name}', Film_Name = '{$Film_Name}',  

        Song_TimeDuration  = '{$Song_Time_Duration}',  Year = '{$Year}',  Song_File = '{$Song_File}', Song_Img = '{$Song_Img}', Song_Category = '{$category}' WHERE Song_id = {$Song_id}";

        $result1 = mysqli_query($conn, $sql) or die("Query Unsuccessful.");

        if (mysqli_affected_rows($conn) > 0) {
            $_SESSION['msg'] = "Record updated successfully.";
            $_SESSION['msg_type'] = "success";
        } else {
            $_SESSION['msg'] = "Error updating record. Please make changes." . mysqli_error($conn);
            $_SESSION['msg_type'] = "danger";
        }

        mysqli_close($conn);
        header('Location: /sound/admin.php#');
        exit();
    }
}
