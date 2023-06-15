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
  $sql = "SELECT * FROM song_table WHERE Song_Name LIKE  '{$search_term}%'";
} else {
  $sql = "SELECT * FROM song_table";
}

$result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");
$output = "";
if (mysqli_num_rows($result) > 0) {



  // <!-- this code for rating -->


  // Fetch user id
  $User_id = strval($_SESSION['id']);

  // Fetch all songs
  $query = "SELECT * FROM song_table";
  $result2 = mysqli_query($conn, $query);

  if (!$result2) {
    die("Query failed: " . mysqli_error($conn));
  }

  // Fetch rating and average rating for each song
  while ($row = mysqli_fetch_assoc($result)) {
    $Song_id  = $row['Song_id'];

    // Star rating
    $query = "SELECT * FROM song_rating WHERE Song_id = " . $Song_id . " and id = " . $User_id;
    $productResult = mysqli_query($conn, $query);

    if (!$productResult) {
      die("Query failed: " . mysqli_error($conn));
    }

    $getRating = mysqli_fetch_array($productResult);
    $rating = ($getRating != null) ? $getRating['rating'] : null;

    // Rating
    $query = "SELECT ROUND(AVG(rating), 1) as numRating FROM song_rating WHERE Song_id = " . $Song_id;
    $avgresult = mysqli_query($conn, $query);

    if (!$avgresult) {
      die("Query failed: " . mysqli_error($conn));
    }

    $fetchAverage = mysqli_fetch_array($avgresult);
    $numRating = $fetchAverage['numRating'];

    if ($numRating <= 0) {
      $numRating = "No&nbsp;ratings&nbsp;given.";
    }
    // Generate HTML for each song
    $output = "<div class='main_song_bar'>
  <div class='song_img'>
    <a id='myBtn' class='songbarplay' id='songbarplay' href='#'>
      <img src='/sound/pproject/admin/{$row["Song_Img"]}' alt='' />
      <audio src='/sound/pproject/admin/{$row["Song_File"]}'></audio>

      <div class='song_title'>
      <div class = 'title_album'>
      <h4 class='songplaytitle'>{$row["Song_Name"]}</h4>
      <h4 class='songplaytitle'><span>From&nbsp;&nbsp;</span>{$row["Album_Name"]}</h4>
      </div>
        <div class='song_artist_name_with_song_duration'>
        
          <div class='artist_name'>
            <p>{$row["Artist_Name"]}</p>
          </div>

          <div class='song_duration'>
            {$row["Song_TimeDuration"]}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
          </div>

        </div>


      
      </div>
      <div class='song_id' data-id='{$row["Song_id"]}'></div>
      <div class='card mb-3'>
        <div class='card-body'>
          <!-- 5 Star Rating -->
          <select name='star_rating_option' class='rating' id='star_rating_{$row["Song_id"]}' data-id='rating_{$row["Song_id"]}'>
            <option value='1'>1</option>
            <option value='2'>2</option>
            <option value='3'>3</option>
            <option value='4'>4</option>
            <option value='5'>5</option>
          </select>
         <div class='avgrating'>
         Your&nbspRating&nbsp:&nbsp; <span class='yourrating' id='numeric_rating_{$row["Song_id"]}'>" . ($rating != null ? $rating : $numRating) .  "</span>&nbsp;
         </div>
        <div class='avgrating'>Average&nbspRating&nbsp:&nbsp; <span class='average_rating'>" . ($numRating) .  "</span>
        </div>
        </div>
      </div>
      <i class='playfill bi bi-play-fill' id='1'></i>
    </a>
  </div>
</div>";

    echo $output;
  }


?>

  <!-- ------- song1 end ------- -->

  <?php


  echo "<script>




   








  $('a.songbarplay').click(function (e) {
    e.preventDefault();

    // Find the audio tag associated with the clicked link
    var audioSrc = $('audio', this).attr('src');

    // Create a new Blob object from the audio file data
    fetch(audioSrc)
      .then(response => response.blob())
      .then(blob => {
        // Save the audio file data into a variable
        var audioFile = new File([blob], 'audio.mp3', { type: 'audio/mpeg' });

        // Update the download button link to use the audio file data
        var downloadLink = $('#download-link');
        downloadLink.attr('href', URL.createObjectURL(audioFile));
        downloadLink.attr('download', 'audio.mp3');
      });
  });








  $('a.songbarplay').click(function() {
    var clickedText = $(this).find('.songplaytitle').text();
    $('.songplayname').text(clickedText);
  });





  $('a.songbarplay').click(function() {
    var clickedText = $(this).find('.artist_name').text();
    $('.artist').text(clickedText);
  });




$('a.songbarplay').click(function (e) {
  e.preventDefault();

  $('.poster_master_play')
      .find('img')
      .attr('src', $('img', this).attr('src'))
      .end()
      ;
});




$('a.songbarplay').click(function (e) {
  e.preventDefault();

  $('#songchange')
      .find('audio')
      .attr('src', $('audio', this).attr('src'))
      .end()
      ;

      $('#songchange2')
      .find('audio')
      .attr('src', $('audio', this).attr('src'))
      .end()
      ;
});




$('#master_playicon').click(function () {
jQuery(this).addClass('down');
document.getElementById('player').play();
document.getElementById('player1').play();
});





$('.main_song_bar').click(function () {

var playing = false;

jQuery(this).toggleClass('down');
document.getElementById('player').play();
$('.wave1').addClass('active1');
$('.wave2').addClass('active2');
$('.wave3').addClass('active3');
$('#pause').show();
$('#master_playicon').hide();

});





// THIS CODE FOR SONG PLAY SELECTED

    // Add click event to all divs with the class 'my-div'

    $('.songbarplay').on('click', function() {

      // Add class to the clicked div

      $(this).addClass('selected');
      

      // Remove class from other divs with the same class

      $('.songbarplay').not(this).removeClass('selected');
      
      
    });
  

    // THIS CODE FOR SONG PLAY SELECTED




    
</script>";

  ?>




  <?php


  ?>





  <script type='text/javascript'>
    $(document).ready(function() {


      $('#star_rating_<?php echo $Song_id; ?>').barrating('set', <?php echo $rating; ?>);
    });


    $(function() {
      $('.rating').barrating({
        theme: 'fontawesome-stars',
        onSelect: function(value, text, event) {

          var el = this;
          var el_id = el.$elem.data('id');



          if (typeof(event) !== 'undefined') {

            var split_id = el_id.split('_');
            var Song_id = split_id[1];

            $.ajax({
              url: 'ajax_rating.php',
              type: 'POST',
              data: {
                Song_id: Song_id,
                rating: value
              },
              dataType: 'json',
              success: function(data) {
                var average = data['numRating'];
                $('#numeric_rating_' + Song_id).text(average);
              }
            });
          }
        }
      });

    });
  </script>
<?php
} else {
  echo "<h2 class='error'> No Record Found</h2>";
}
?>


<!-- artist pic and name end-->


</body>



</html>