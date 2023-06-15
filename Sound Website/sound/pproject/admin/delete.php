<div id="delete_main">


<?php
include './config.php';

// Check if the "id" parameter is set
if (isset($_GET['id'])) {
    $getid2 = $_GET['id'];
    
    // Execute the SQL SELECT statement to get the Song_File and Song_Img paths
    $sql_select = "SELECT Song_File, Song_Img FROM song_table WHERE Song_id = $getid2";
    $result_select = mysqli_query($conn, $sql_select);

    if ($result_select) {
        $row_select = mysqli_fetch_assoc($result_select);

        // Delete the song file and song image from the admin directory
        $song_file_path = $row_select['Song_File'];
        $song_img_path = $row_select['Song_Img'];
        unlink($song_file_path);
        unlink($song_img_path);

        // Execute the SQL DELETE statement to delete the record from the database
        $sql_delete = "DELETE FROM song_table WHERE Song_id = $getid2";
        $result_delete = mysqli_query($conn, $sql_delete);

        if ($result_delete) {
            // Redirect the user back to the same page
            header("Location: ".$_SERVER['PHP_SELF']);
            exit;
        } else {
            echo "Error deleting record: " . mysqli_error($conn);
        }
    } else {
        echo "Error selecting record: " . mysqli_error($conn);
    }
} else {
    // Output an error message if the "id" parameter is not set
    echo "No ID parameter found";
}

mysqli_close($conn);
?>



</div>