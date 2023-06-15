$(document).ready(function () {
  $('#admin_info').click(function () {
    $('#admin_logout').slideToggle("admin_logout_show");
  })

// song upload  start

$('#song_upload_panel').click(function () {
    $('#Song_Upload_Form').addClass("upload_panel_show");
    $('#Song_Upload_Form').removeClass("upload_panel_hide");

    $('#Modification_song_form').addClass("upload_panel_hide");
    $('#Modification_song_form').removeClass("upload_panel_show");


     
    $('#usersdetails').hide();


    // Nav title Change start

    $('#upload_title').addClass("song_upload_title");
    $('#upload_title').removeClass("upload_panel_hide ");
    $('#modification_title').removeClass("upload_panel_show");
    $('#modification_title').addClass("song_modification_title");
    $('#Useraccounts').hide();


    // Nav title Change end
  })


// song upload  end



// song modification start

  $('#song_modificaton_panel').click(function () {
    $('#Song_Upload_Form').addClass("upload_panel_hide");
    $('#Song_Upload_Form').removeClass("upload_panel_show");
    $('#Modification_song_form').addClass("upload_panel_show");
    $('#Modification_song_form').removeClass("upload_panel_hide");


    
    $('#usersdetails').hide();
   
    // Nav title Change start

    $('#upload_title').addClass("upload_panel_hide");
    $('#upload_title').removeClass("song_upload_title ");
    $('#modification_title').removeClass("song_modification_title");
    $('#modification_title').addClass("upload_panel_show");
    $('#Useraccounts').hide();

    // Nav title Change end
  })


// song modification end




// user account start

  $('#usershowbtn').click(function () {

    $('#Song_Upload_Form').addClass("upload_panel_hide");
    $('#Song_Upload_Form').removeClass("upload_panel_show");
    $('#Modification_song_form').addClass("upload_panel_hide");
    $('#Modification_song_form').removeClass("upload_panel_show");

    
    $('#usersdetails').removeClass("usersdetails");
    $('#usersdetails').show();



    // Nav title Change start

    $('#upload_title').addClass("upload_panel_hide");
    $('#upload_title').removeClass("song_upload_title "); 
    $('#modification_title').addClass("song_modification_title");
    $('#modification_title').removeClass("upload_panel_show");
    $('#Useraccounts').show();
    // Nav title Change end
  })


// user account end







  $('.updatebtn').click(function () {
    $('#update-container2').removeClass("upmain");
    $('#update-container2').show();
  })


  $('#updatebtn_mark').click(function () {
    console.log("Button 1 clicked");
    $('#update-container2').addClass("upmain");
  });

  
  
  // $('#updatebtn_mark2').click(function () {
  //   console.log("Button 2 clicked");
    
  // });

//   $('.updatebtn_mark').click(function () {
//     $('.update-container2').addClass("upmain");
// });


// $('.updatebtn_mark2').click(function () {
//     $('.update-container2').addClass("upmain");
// });


  // check box Tick Control


  $("input:checkbox").on('click', function () {
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


  // check box Tick Control





  $(document).ready(function() {
    $('#message').slideDown(1000); // show message with slide down animation
    setTimeout(function() {
        $('#message').slideUp(500); // hide message with slide up animation after 3 seconds
    }, 2000);
});




});






  

