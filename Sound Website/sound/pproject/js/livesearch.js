
// $(document).ready(function () {
// $('input[name=songsearch]').keyup(function(){
//     if($(this).val().length)
//       $('#main-search-link-box').show();
//     else
//       $('#main-search-link-box').hide();
//   });
//     $('#livesearch').keyup(function (e) {
//         if (e.keyCode == 46) {
//             alert('Delete key released');
//         }

//         $('#main-search-link-box').addClass('search-show-onkeyup');
//         var search_term = $("#livesearch").val();

//         // This Ajax Default For All Songs Search Start

//         $.ajax({
//             url: "Ajax-Searches/ajax-live-search-for-All.php",
//             type: "POST",
//             data: { livesearch: search_term },
//             success: function (data) {
//                 $("#show-search").html(data);
//             }

//         });



//         // This Ajax Default For All Songs Search End






//         // This Ajax For Selected Searches Start


//         $('a.search-links').on('click', function (e) {
//             e.preventDefault();
//             // alert();
//             $('#selected').addClass('selected');
//             var url = $(this).attr('link');


//             $.ajax({
//                 url: url,
//                 type: "POST",
//                 data: {
//                     livesearch: search_term
//                 },
//                 success: function (data) {
//                     $("#show-search").html(data);
//                 }
//             });
//             // This Ajax For Selected Searches End


//         });



//     });
// });


















// $(document).ready(function () {


//     // $("#livesearch").keydown(function(){
//     // var search_term = $("#livesearch").val();
//     $('#livesearch').keyup(function (e) {
//         if (e.keyCode == 46) {
//             alert('Delete key released');
//         }

//         var search_term = $("#livesearch").val();


//         // console.log(search_term);


//         $.ajax({
//             url: "ajax-live-search.php",
//             type: "POST",
//             data: { livesearch: search_term },
//             success: function (data) {
//                 $("#show-search").html(data);
//             }

//         });


//     });


// });




// $(document).ready(function () {

//     // Define a variable to store the URL for the selected link
//     var selectedUrl = '';

//     $('input[name=songsearch]').keyup(function () {
//         if ($(this).val().length) {
//             $('#main-search-link-box').show();
//             $('a.search-links').addClass('selected');
//         } else {
//             $('#main-search-link-box').hide();
//             $('a.search-links').removeClass('selected');
//         }
//     });




//     $('#livesearch').keyup(function (e) {
//         if (e.keyCode == 46) {
//             alert('Delete key released');
//         }
//         var search_term = $("#livesearch").val();

//         // If a link has been clicked, use the selected URL
//         var url = selectedUrl || "Ajax-Searches/ajax-live-search-for-All.php";

//         $.ajax({
//             url: url,
//             type: "POST",
//             data: { livesearch: search_term },
//             success: function (data) {
//                 $("#show-search").html(data);
//             }
//         });

//         if ($(this).val().length) {
//             $('#main-search-link-box').show();
//             $('a.search-links').addClass('selected');
//         } else {
//             $('#main-search-link-box').hide();
//             $('a.search-links').removeClass('selected');
//         }
//     });



//     $('a.search-links').on('click', function (e) {
//         e.preventDefault();
//         var url = $(this).attr('link');
//         $(this).addClass('selected').attr('href', 'javascript:void(0)');

//         // Set the selected URL variable to the clicked link's URL
//         selectedUrl = url;

//         $('a.search-links.selected').not(this).removeClass('selected').attr('href', function () {
//             return $(this).attr('link');
//         });

//         var search_term = $("#livesearch").val();
//         // Check if a song is currently selected and add the 'selected' class
//         if ($('.songbarplay.selected').length) {
//             $('.songbarplay.selected').addClass('selected');
//         }

//         $.ajax({
//             url: url,
//             type: "POST",
//             data: {
//                 livesearch: search_term
//             },
//             success: function (data) {
//                 $("#show-search").html(data);
//             }
//         });
//     });

// });







$(document).ready(function () {
    // Define a variable to store the URL for the selected link
    var selectedUrl = '';
  
    $('input[name=songsearch]').keyup(function () {
      if ($(this).val().length) {
       
        $('a.search-links').addClass('selected');
      } else {
        
        $('a.search-links').removeClass('selected');
      }
    });
  
    $('#livesearch').keyup(function (e) {
      if (e.keyCode == 46) {
        // alert('Delete key released');
      }
      var search_term = $("#livesearch").val();
  
      // If a link has been clicked, use the selected URL
      var url = selectedUrl || "./pproject/Ajax-Searches/ajax-live-search-for-All.php";
  
      $.ajax({
        url: url,
        type: "POST",
        data: { livesearch: search_term },
        success: function (data) {
          $("#show-search").html(data);
        }
      });
  
      if ($(this).val().length) {
       
        $('a.search-links').addClass('selected');
      } else {
      
        $('a.search-links').removeClass('selected');
      }
    });
  
    $('a.search-links').on('click', function (e) {
      e.preventDefault();
      var url = $(this).attr('link');
      $(this).addClass('selected').attr('href', 'javascript:void(0)');
  
      // Set the selected URL variable to the clicked link's URL
      selectedUrl = url;
  
      $('a.search-links.selected').not(this).removeClass('selected').attr('href', function () {
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
        success: function (data) {
          $("#show-search").html(data);
        }
      });
    });
  });





  
 
    

  
