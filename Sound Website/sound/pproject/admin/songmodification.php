<style>
  .error {
    color: red;
  }
</style>
<div id="Modification_song_form" class="song_modification_form">


  <div class="modification_main">
    <!-- searchbar start -->
    <div class="searchbar">


      <!-- searchbox start -->
      <div class="searchbox">
        <i class="fa-solid fa-magnifying-glass"></i>
        <input id="livesearch" name="songsearch" class="searchinput" type="text" placeholder="Search Song's?" />
      </div>
      <!-- searchbox end -->
    </div>

    <!-- Search Category Start -->

    <div class="searchlinkwithlogout">
      <div id="main-search-link-box" class="search_category">
        <a class="search-links" href="#" link="../../../sound/pproject/admin/admin_live_searches/admin_live_search_all.php">All</a>
        <a class="search-links" href="#" link="../../../sound/pproject/admin/admin_live_searches/admin_live_search_by_song_name.php">Song Name</a>
        <a class="search-links" href="#" link="../../../sound/pproject/admin/admin_live_searches/admin_live_search_by_Artist.php">Artist</a>
        <a class="search-links" href="#" link="../../../sound/pproject/admin/admin_live_searches/admin_live_search_by_album.php">Albums / Film Name</a>
        <a class="search-links" href="#" link="../../../sound/pproject/admin/admin_live_searches/admin_live_search_by_year.php">Year</a>
        <a class="search-links" href="#" link="../../../sound/pproject/admin/admin_live_searches/admin_live_search_by_bollywood.php">Bollywood</a>
        <a class="resholly search-links" href="#" link="../../../sound/pproject/admin/admin_live_searches/admin_live_search_by_hollywood.php">Hollywood</a>
      </div>
    </div>

    <!-- Search Category END -->


    <div id="show-search" class="main_div_for_songs">

      <?php

      include 'pproject/admin/config.php';

      $sql = "SELECT * FROM song_table";


      $result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");
      $output = "";

      if (mysqli_num_rows($result) > 0) {

      ?>

        <!-- ------- song1 start ------- -->
        <?php
        while ($row = mysqli_fetch_assoc($result)) {
        ?>


          <?php $output = "
                    <div class='main_song_bar'>


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
            
                </div><hr>
                    ";
          ?>



      <?php
          echo "$output";
        }
      } else {
        echo "<h2 class='error'> No Record Found</h2>";
      }

      ?>

    </div>

  </div>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>




  <script>
    $(document).ready(function() {

      $('input[name=songsearch]').keyup(function() {
        if ($(this).val().length) {
        
          $('a.search-links').addClass('selected');
        } else {
         
          $('a.search-links').removeClass('selected');
        }
      });


      var selectedUrl = '';

      $('input[name=songsearch]').keyup(function() {
        if ($(this).val().length) {
          
          $('a.search-links').addClass('selected');
        } else {
          $('a.search-links').removeClass('selected');
        }
      });

      $('#livesearch').keyup(function(e) {
        if (e.keyCode == 46) {
          // alert('Delete key released');
        }
        var search_term = $("#livesearch").val();
        console.log(search_term)

        // If a link has been clicked, use the selected URL
        var url = selectedUrl || "../../../sound/pproject/admin/admin_live_searches/admin_live_search_all.php";

        $.ajax({
          url: url,
          type: "POST",
          data: {
            livesearch: search_term
          },
          success: function(data) {
            $("#show-search").html(data);
          }
        });

        if ($(this).val().length) {
          
          $('a.search-links').addClass('selected');
        } else {
          
          $('a.search-links').removeClass('selected');
        }
      });


      $('a.search-links').on('click', function(e) {
        e.preventDefault();
        var url = $(this).attr('link');
        $(this).addClass('selected').attr('href', 'javascript:void(0)');

        // Set the selected URL variable to the clicked link's URL
        selectedUrl = url;

        $('a.search-links.selected').not(this).removeClass('selected').attr('href', function() {
          return $(this).attr('link');
        });

        var search_term = $("#livesearch").val();

        // Get the unique identifier for the clicked link
        var id = $(this).data('id');
        if (id) {
          // Add the 'selected' class to the corresponding .songbarplay element
          $('.songbarplay[data-id="' + id + '"]').addClass('selected');
          $('.songbarplay[data-id!="' + id + '"]').removeClass('selected');

          // Get the corresponding song ID
          // var songId = $('.main_song_bar[data-id="' + id + '"]').find('.song_id').text();
          //   var songId = $('.songbox[data-id="' + id + '"]').find('.song_id').text();
          console.log(songId);
        }

        $.ajax({
          url: url,
          type: "POST",
          data: {
            livesearch: search_term
          },
          success: function(data) {
            $("#show-search").html(data);
          }
        });
      });

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




      // delete btn



      // Handle click event of the "Update" button
      // Get the confirmation dialog and its buttons
      var confirmationDialog = document.getElementById("confirmation-dialog");
      var confirmBtn = document.getElementById("confirm-btn");
      var cancelBtn = document.getElementById("cancel-btn");

      // When the delete button is clicked, show the confirmation dialog
      $(".deletebtn").click(function(event) {
        var id = $(this).data("id"); // Get the ID from the data attribute of the clicked element
        console.log(id);

        // Show the confirmation dialog
        confirmationDialog.style.display = "block";

        // When the OK button is clicked, send an AJAX request to delete the record
        confirmBtn.onclick = function() {
          $.ajax({
            url: "../sound/pproject/admin/delete.php",
            type: "GET",
            data: {
              id: id
            },
            success: function(data) {
              $("#delete_main").html(data);
              location.reload(); // Reload the current page after the record has been deleted
            },
            error: function() {
              alert("An error occurred while loading the Delete.");
            }
          });

          // Hide the confirmation dialog
          confirmationDialog.style.display = "none";
        }

        // When the Cancel button is clicked, hide the confirmation dialog
        cancelBtn.onclick = function() {
          confirmationDialog.style.display = "none";
        }
      });






      // delete btn


    });
  </script>


  <!-- <script src="../../../sound/pproject/admin/admin_live_searches/admin_live_search_all.php"></script> -->