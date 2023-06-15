<?php
include '../config.php';
session_start();
if (!isset($_SESSION['id'])) {
    header("location: index.php");
}
if (!empty($_SESSION["id"])) {
    $id = $_SESSION["id"];
    $result1 = mysqli_query($conn, "SELECT * FROM signin WHERE id = $id");
    $row1 = mysqli_fetch_assoc($result1);
} else {
    header("Location: index.php");
}




if (isset($_POST['livesearch'])) {
    $search_term = $_POST['livesearch'];
    $sql = "SELECT * FROM song_table WHERE Album_Name LIKE  '{$search_term}%'";

}




$result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");
$output = "";
if (mysqli_num_rows($result) > 0) {


    while ($row = mysqli_fetch_assoc($result)) {



        // Generate HTML for each song
        $output = "<div class='main_song_bar'>


    <div class='song_img'>
        <a id='myBtn' class='songbarplay' id='songbarplay' href='#'>
            <small> Song-ID {$row["Song_id"]}</small>
            <img src='/sound/pproject/admin/{$row["Song_Img"]}' alt='' />
    
            <div class='song_title'>
               <div class = 'title_album'>
               <h4 class='songplaytitle'>{$row["Song_Name"]}</h4>
               <h4 class='songplaytitle'><span>From&nbsp;&nbsp;</span>{$row["Album_Name"]}</h4>
               </div>
                <div class='song_artist_name_with_song_duration'>
                    <div class='artist_name'>
                        <p>{$row["Artist_Name"]}</p>
                    </div>
                    <div class='song_duration'>{$row["Song_TimeDuration"]}</div>
                </div>
            </div>
        </a>
    </div>
    <div class='mod_btns'>
    
    <a class='updatebtn' href='#'   data-id='{$row['Song_id']}'>Update</a>





        <a class='deletebtn' href='#' data-id='{$row['Song_id']}'>Delete</a>
    </div>

</div><hr>";

        echo $output;
    }} else {
        echo "<h2 class='error'> No Record Found</h2>";
    }


?>

    <!-- ------- song1 end ------- -->
    <script>
        // Handle click event of the "Update" button
        $('.updatebtn').click(function(event) {
            var id = $(this).data('id'); // Get the ID from the data attribute of the clicked element

            // Send an AJAX request to fetch the content of update.php with the ID parameter
            $.ajax({
                url: '../sound/pproject/admin/update.php',
                type: 'GET',
                data: {
                    id: id
                },
                success: function(data) {
                    // Load the content of update.php into the designated element on the page
                    $('#update-container').html(data);
                    $('#update-container2').removeClass("upmain");
                    $('#update-container2').show();
                    $('#updatebtn_mark').click(function() {
                        $('#update-container2').addClass("upmain");
                    });
                    $("input:checkbox").on('click', function() {
                        // in the handler, 'this' refers to the box clicked on
                        var $box = $(this);
                        if ($box.is(":checked")) {
                            // the name of the box is retrieved using the .attr() method
                            // as it is assumed and expected to be immutable
                            var group = "input:checkbox[name='" + $box.attr("name") + "']";
                            // the checked state of the group/box on the other hand will change
                            // and the current value is retrieved using .prop() method
                            $(group).prop("checked", false);
                            $box.prop("checked", true);
                        } else {
                            $box.prop("checked", false);
                        }
                    });
                },
                error: function() {
                    alert('An error occurred while loading the update form.');
                }
            });

        });
    </script>



    <?php


    ?>


<?php

?>


<!-- artist pic and name end-->


</body>



</html>