<?php

// $Song_Name = $_POST['Song_Name'];
// $Artist_Name = $_POST['Artist_Name'];
// $Album_Name = $_POST['Album_Name'];
// $Film_Name = $_POST['Film_Name'];
// $Song_Time_Duration = $_POST['Song_Time_Duration'];
// $Year = $_POST['Year'];
// $category = $_POST['category'];



// $sql = "INSERT INTO song_table (Song_Name,Artist_Name,Album_Name,Film_Name,Song_TimeDuration,Year) VALUES ('{$Song_Name}','{$Artist_Name}','{$Album_Name}','{$Film_Name}','{$Song_Time_Duration}','{$Year}')";
// $result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");

?>




<?php
// if (isset($_POST['save_audio']) && $_POST['save_audio'] == "Upload Audio") {

//     $dir = 'Audio_Songs/';
//     $Song_File = $dir . basename($_FILES['Song_File']['name']);



//     $dir = 'Audio_Songs_Images/';
//     $Song_Img = $dir . basename($_FILES['Song_Img']['name']);



//     if (move_uploaded_file($_FILES['Song_File']['tmp_name'], $Song_File)) {


//         if (move_uploaded_file($_FILES['Song_Img']['tmp_name'], $Song_Img)) {
//             include "config.php";
//             // $query = "INSERT INTO song_table (Song_File) values ('{$Song_File}')";


//             $sql = "INSERT INTO song_table (Song_Name,Artist_Name,Album_Name,Film_Name,Song_TimeDuration,Year,Song_File,Song_Img,Song_Category) VALUES 
//                  ('{$Song_Name}','{$Artist_Name}','{$Album_Name}','{$Film_Name}','{$Song_Time_Duration}','{$Year}','{$Song_File}','{$Song_Img}','{$category}')";
//             $result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");




//             // mysqli_query($conn, $sql);

//             if (mysqli_affected_rows($conn) > 0) {
//                 echo "uploaded successfully";
//             };

//             mysqli_close($conn);
//         }
//     }
// }
?>





<?php
// if (isset($_POST['save_audio']) && $_POST['save_audio'] == "Upload Audio") {

//     $Song_Name = $_POST['Song_Name'];
//     $Artist_Name = $_POST['Artist_Name'];
//     $Album_Name = $_POST['Album_Name'];
//     $Film_Name = $_POST['Film_Name'];
//     $Song_Time_Duration = $_POST['Song_Time_Duration'];
//     $Year = $_POST['Year'];
//     $category = $_POST['category'];

//     // check for empty values
//     if (empty($Song_Name) || empty($Artist_Name) || empty($Album_Name) || empty($Song_Time_Duration) || empty($Year) || empty($category) || empty($_FILES['Song_File']['name']) || empty($_FILES['Song_Img']['name'])) {
//         // echo "Please Fill All The Required Fields and Upload Files.";





//     } else {
//         $dir = 'Audio_Songs/';
//         $Song_File = $dir . basename($_FILES['Song_File']['name']);

//         $dir = 'Audio_Songs_Images/';
//         $Song_Img = $dir . basename($_FILES['Song_Img']['name']);

//         if (move_uploaded_file($_FILES['Song_File']['tmp_name'], $Song_File)) {
//             if (move_uploaded_file($_FILES['Song_Img']['tmp_name'], $Song_Img)) {
//                 include "config.php";

//                 $sql = "INSERT INTO song_table (Song_Name,Artist_Name,Album_Name,Film_Name,Song_TimeDuration,Year,Song_File,Song_Img,Song_Category) VALUES 
//                  ('{$Song_Name}','{$Artist_Name}','{$Album_Name}','{$Film_Name}','{$Song_Time_Duration}','{$Year}','{$Song_File}','{$Song_Img}','{$category}')";
//                 $result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");

//                 if (mysqli_affected_rows($conn) > 0) {
//                     echo "uploaded successfully";
//                 };

//                 mysqli_close($conn);
//             }
//         }
//     }
// }




// if (isset($_POST['save_audio']) && $_POST['save_audio'] == "Upload Audio") {

//     $Song_Name = $_POST['Song_Name'];
//     $Artist_Name = $_POST['Artist_Name'];
//     $Album_Name = $_POST['Album_Name'];
//     $Film_Name = $_POST['Film_Name'];
//     $Song_Time_Duration = $_POST['Song_Time_Duration'];
//     $Year = $_POST['Year'];
//     $category = $_POST['category'];

//     // check for empty values
//     if (empty($Song_Name) || empty($Artist_Name) || empty($Album_Name) || empty($Song_Time_Duration) || empty($Year) || empty($category) || empty($_FILES['Song_File']['name']) || empty($_FILES['Song_Img']['name'])) {
//         // echo "Please Fill All The Required Fields and Upload Files.";
//     } else {
//         $dir = 'Audio_Songs/';
//         $Song_File = $dir . basename($_FILES['Song_File']['name']);

//         $dir = 'Audio_Songs_Images/';
//         $Song_Img = $dir . basename($_FILES['Song_Img']['name']);

//         if (move_uploaded_file($_FILES['Song_File']['tmp_name'], $Song_File)) {
//             if (move_uploaded_file($_FILES['Song_Img']['tmp_name'], $Song_Img)) {
//                 include "config.php";

//                 // check if the song already exists in the database
//                 $sql = "SELECT * FROM song_table WHERE Song_Name='{$Song_Name}' AND Artist_Name='{$Artist_Name}' AND Album_Name='{$Album_Name}' AND Film_Name='{$Film_Name}' AND Song_TimeDuration='{$Song_Time_Duration}' AND Year='{$Year}' AND Song_Category='{$category}'";
//                 $result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");
                
//                 if (mysqli_num_rows($result) > 0) {
//                     echo '<script>alert("The song already exists in the database.");</script>';
//                 } else {
//                     // insert the song into the database
//                     $sql = "INSERT INTO song_table (Song_Name,Artist_Name,Album_Name,Film_Name,Song_TimeDuration,Year,Song_File,Song_Img,Song_Category) VALUES 
//                      ('{$Song_Name}','{$Artist_Name}','{$Album_Name}','{$Film_Name}','{$Song_Time_Duration}','{$Year}','{$Song_File}','{$Song_Img}','{$category}')";
//                     $result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");

//                     if (mysqli_affected_rows($conn) > 0) {
//                         echo '<div class="success-messageupload">Uploaded successfully</div>';
//                         header("Location: /sound/admin.php?success=7");

//                     }
//                 }

//                 mysqli_close($conn);
//             }
//         }
//     }
// }




if (isset($_POST['save_audio']) && $_POST['save_audio'] == "Upload Audio") {

    $Song_Name = $_POST['Song_Name'];
    $Artist_Name = $_POST['Artist_Name'];
    $Album_Name = $_POST['Album_Name'];
    $Film_Name = $_POST['Film_Name'];
    $Song_Time_Duration = $_POST['Song_Time_Duration'];
    $Year = $_POST['Year'];
    $category = $_POST['category'];

    // check for empty values
    if (empty($Song_Name) || empty($Artist_Name) || empty($Album_Name) || empty($Song_Time_Duration) || empty($Year) || empty($category) || empty($_FILES['Song_File']['name']) || empty($_FILES['Song_Img']['name'])) {
        // echo "Please Fill All The Required Fields and Upload Files.";
    } else {
        $dir = 'Audio_Songs/';
        $Song_File = $dir . basename($_FILES['Song_File']['name']);

        $dir = 'Audio_Songs_Images/';
        $Song_Img = $dir . basename($_FILES['Song_Img']['name']);

        if (move_uploaded_file($_FILES['Song_File']['tmp_name'], $Song_File)) {
            if (move_uploaded_file($_FILES['Song_Img']['tmp_name'], $Song_Img)) {
                include "config.php";

                // check if the song already exists in the database
                $sql = "SELECT * FROM song_table WHERE Song_Name='{$Song_Name}' AND Artist_Name='{$Artist_Name}' AND Album_Name='{$Album_Name}' AND Film_Name='{$Film_Name}' AND Song_TimeDuration='{$Song_Time_Duration}' AND Year='{$Year}' AND Song_Category='{$category}'";
                $result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");
                
                if (mysqli_num_rows($result) > 0) {
                    echo '<div class="error-messageupload">The song already exists in the database.</div>';
                } else {
                    // insert the song into the database
                    $sql = "INSERT INTO song_table (Song_Name,Artist_Name,Album_Name,Film_Name,Song_TimeDuration,Year,Song_File,Song_Img,Song_Category) VALUES 
                     ('{$Song_Name}','{$Artist_Name}','{$Album_Name}','{$Film_Name}','{$Song_Time_Duration}','{$Year}','{$Song_File}','{$Song_Img}','{$category}')";
                    $result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");

                    if (mysqli_affected_rows($conn) > 0) {
                        echo '<div class="success-messageupload">Uploaded successfully</div>';
                        header("Location: /sound/admin.php?success=7");

                    }
                }

                mysqli_close($conn);
            }
        }
    }
}





?>





<style>
    .success-messageupload {
    background-color: #c3e6cb;
    color: #155724;
    padding: 10px;
    border-radius: 5px;
    margin-bottom: 10px;
}
</style>


