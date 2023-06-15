$(document).ready(function () {


    //     $(".bi-play-fill").click(function () {
    //     alert();
    //     $('#wave1').toggleClass("active1");
    //     document.getElementById("player").play();

    //     $('a.songbarplay').click(); // Trigger the inner click event
    //   });

    //   $('a.songbarplay').click(function (e) {
    //     e.preventDefault();
    //     $('#poster_master_play')
    //       .find('img')
    //       .attr('src', $('img', this).attr('src'));
    //   });





    //    master player setting


    $('#user').click(function () {
        $('#logout').slideToggle("logoutshow");
    })



    $('a.search-links').click(function () {
        // Remove "selected" class from all other anchor elements
        $('a.search-links').removeClass('selected1');

        // Add "selected" class to the clicked anchor element
        $(this).addClass('selected1');
    });





    $('#master_playicon').click(function () {
        $('.wave1').toggleClass("active1");
    })

    $('#master_playicon').click(function () {
        $('.wave2').toggleClass("active2");
    })

    $('#master_playicon').click(function () {
        $('.wave3').toggleClass("active3");
    })


    $('#master_playicon').click(function () {
        $('#pause').toggleClass("pause_none");
    })

    $('#back').click(function () {
        $('#pause').toggleClass("pause_none");
    })

    $('#master_playicon').click(function () {
        $('#master_playicon').hide();
        $('#pause').show();
    })


    $('#pause').click(function () {
        $('#master_playicon').show();
        $('#pause').hide();
    })

    // $('#pause').click(function () {
    //     $('#master_playicon').css("display", "block");
    // })


    // $('#master_playicon').click(function () {
    //     $('#pause').css("display", "none");
    // })








    //    master player setting






    $(document).ready(function () {
        var playing = false;

        $("#master_playicon").click(function () {
            jQuery(this).addClass("down");


            document.getElementById("player").play();
            // if (playing == false) {
            //     playing = true;



            // }

            // else {
            //     document.getElementById("player").pause();
            //     playing = false;
            // }


        });


    });




    $('.main_song_bar').click(function () {

        var playing = false;

        jQuery(this).toggleClass("down");
        document.getElementById("player").play();
        $('.wave1').addClass("active1");
        $('.wave2').addClass("active2");
        $('.wave3').addClass("active3");
        $('#pause').show();
        $('#master_playicon').hide();

    });

});



// song time currentTime and endTime with seek bar code


let currentStart = document.getElementById('currentime');
let currentEnd = document.getElementById('pasttime');
let audio = document.getElementById('player');

audio.addEventListener('timeupdate', () => {
    let audio_current = audio.currentTime;
    let audio_duration = audio.duration;

    let min1 = Math.floor(audio_duration / 60);
    let sec1 = Math.floor(audio_duration % 60);

    // console.log(sec1);

    if (sec1 < 10) {
        sec1 = `0${sec1}`;
    }

    currentEnd.innerText = `${min1}:${sec1}`;


    let min2 = Math.floor(audio_current / 60);
    let sec2 = Math.floor(audio_current % 60);

    if (sec2 < 10) {
        sec2 = `0${sec2}`;
    }
    currentStart.innerText = `${min2}:${sec2}`;






    let seek = document.getElementById('seek');
    let bar2 = document.getElementById('bar2');
    let progressBar = parseInt((audio_current / audio_duration) * 100);

    seek.value = progressBar;
    let seekbar = seek.value;
    bar2.style.width = `${seekbar}%`;
    document.getElementById("seek_dot").style.background = "blue";
    document.getElementById("seek_dot").style.left = `${seekbar}%`;



    // let seek_dot = document.getElementById('seek_dot');
    // console.log(seek.value);
    // seek_dot.style.style.left ='124px';
    // seek_dot.style.style.color ='yellow';
    // seek_dot= `${seekbar}%`
    // document.getElementById("seek_dot").style.marginLeft = "124px";
    // document.getElementById("seek_dot").style.marginLeft = "124px";
    // document.getElementById("seek_dot").style.left = "448px";
});

// song time currentTime and endTime with seek bar code




// seekbar targe click song  

seek.addEventListener('change', () => {
    audio.currentTime = seek.value * audio.duration / 100;
})


// seekbar targe click song  


let vol = document.getElementById('vol');
let vol_icon = document.getElementById('vol_icon');
let vol_dot = document.getElementById('vol_dot');
let vol_bar = document.getElementById('vol_bar');

vol.addEventListener('change', () => {
    if (vol.value == 0) {
        vol_icon.classList.remove('fa-volume-high');
        vol_icon.classList.remove('bi-volume-down');
        vol_icon.classList.add('bi-volume-off');

    }

    if (vol.value > 0) {
        vol_icon.classList.remove('fa-volume-high');
        vol_icon.classList.add('bi-volume-down');
        vol_icon.classList.remove('bi-volume-off');
    }


    if (vol.value > 50) {
        vol_icon.classList.add('fa-volume-high');
        vol_icon.classList.remove('bi-volume-down');
        vol_icon.classList.remove('bi-volume-off');

    }


    let vol_a = vol.value;
    vol_bar.style.width = `${vol_a}%`;
    vol_dot.style.left = `${vol_a}%`;
    audio.volume = vol_a / 100;



});













$('#back').click(function () {

    var playing = false;

    jQuery(this).toggleClass("down");
    document.getElementById("player").play();
    $('.wave1').addClass("active1");
    $('.wave2').addClass("active2");
    $('.wave3').addClass("active3");
    $('#pause').show();
    $('#master_playicon').hide();
    $(".song_display_poster").attr('src', this.src);
    //   $(".song_display_poster").attr('alt',this.alt);
    //   $(".song_display_poster").text('this'.alt);

});




$('#next').click(function () {

    var playing = false;

    jQuery(this).toggleClass("down");
    document.getElementById("player").play();
    $('.wave1').addClass("active1");
    $('.wave2').addClass("active2");
    $('.wave3').addClass("active3");
    $('#pause').show();
    $('#master_playicon').hide();
    $(".song_display_poster").attr('src', this.src);
    //   $(".song_display_poster").attr('alt',this.alt);
    //   $(".song_display_poster").text('this'.alt);

});




$(".song_img_src").click(function () {

    $(".song_display_poster").attr('src', this.src);

});


$('#pause').click(function () {
    var playing = false;

    jQuery(this).toggleClass("down");
    document.getElementById("player").pause();
    $('.wave1').removeClass("active1");
    $('.wave2').removeClass("active2");
    $('.wave3').removeClass("active3");
    document.getElementById("seek_dot").style.background = "yellow";
})



$('a.songbarplay').click(function (e) {
    e.preventDefault();

    $('.poster_master_play')
        .find('img')
        .attr('src', $('img', this).attr('src'))
        .end()
        //   .find('span')
        //   .text($(this).text())
        ;
});




$('a.songbarplay').click(function (e) {
    e.preventDefault();

    $('#songchange')
        .find('audio')
        .attr('src', $('audio', this).attr('src'))
        .end()
        //   .find('span')
        //   .text($(this).text())
        ;
});




// $('a.songbarplay').click(function (e) {
//     e.preventDefault();

//     $('#songplayname')
//         // .find('audio')
//         // .attr('src', $('audio', this).attr('src'))
//         // .end()
//         //   .find('span')
//           .text($(this).text())
//         ;
// });




// $(".songbarplay,.song_title,h4").on("click", function(e){
//     e.preventDefault();
//     $('#songplayname')
//     .text($(this).text())
//   ;

//   });







//   let song_bar = document.getElementsByClassName('songbarplay');
//   let songplaytitle = document.getElementById('songplaytitle');
//   let songplayname = document.getElementById('songplayname');



// song_bar.addEventListener('click', () => {
//     songplaytitle.innerText = songplayname.innerHTML;


// })






// Search Input Clear Start


$('.fa-xmark').on('click', function () {
    $('#livesearch').val('');
});


// Search Input Clear End



// for download btn
var downloadmuted = document.getElementById("player1");
downloadmuted.muted = true;




$('a.songbarplay').click(function () {
    var clickedText = $(this).find('.songplaytitle').text();
    $('.songplayname').text(clickedText);
});













// Update the download link when the audio source changes
// $('a.songbarplay').click(function (e) {
//   e.preventDefault();

//   var audioSrc = $('audio', this).attr('src');

//   $('#songchange')
//     .find('audio')
//     .attr('src', audioSrc)
//     .end();

//   $('#songchange2')
//     .find('audio')
//     .attr('src', audioSrc)
//     .end();

//   $('#download-link').attr('href', audioSrc);
// });



// $('a.songbarplay').click(function (e) {
//     e.preventDefault();

//     // Find the audio tag associated with the clicked link
//     var audioSrc = $('audio', this).attr('src');

//     // Create a new Blob object from the audio file data
//     fetch(audioSrc)
//       .then(response => response.blob())
//       .then(blob => {
//         // Save the audio file data into a variable
//         var audioFile = new File([blob], 'audio.mp3', { type: 'audio/mpeg' });

//         // Update the download button link to use the audio file data
//         var downloadLink = $('#download-link');
//         downloadLink.attr('href', URL.createObjectURL(audioFile));
//         downloadLink.attr('download', 'audio.mp3');
//       });
//   });
















// function shufflePlaylist(playlist) {
//     return playlist.sort(() => Math.random() - 0.5);
//   }

//   const audioPlayer = document.querySelector('#audio-player');
//   const shuffleBtn = document.querySelector('#shuffle-btn');

//   shuffleBtn.addEventListener('click', () => {
//     const sources = [...audioPlayer.querySelectorAll('source')];
//     const shuffledSources = shufflePlaylist(sources);

//     audioPlayer.innerHTML = '';
//     shuffledSources.forEach(source => {
//       audioPlayer.appendChild(source);
//     });

//     audioPlayer.load();
//     audioPlayer.play();
//   });
















// function shufflePlaylist(playlist) {
//   const shuffled = playlist.slice(); // make a copy of the array
//   for (let i = shuffled.length - 1; i > 0; i--) {
//     const j = Math.floor(Math.random() * (i + 1));
//     [shuffled[i], shuffled[j]] = [shuffled[j], shuffled[i]];
//   }
//   return shuffled;
// }

// const masterPlay = $('#player')[0]; // get the underlying HTMLMediaElement
// const shuffleBtn = $('#shuffle-btn');

// shuffleBtn.click(function() {
//   const sources = masterPlay.querySelectorAll('source');
//   const shuffledSources = shufflePlaylist(Array.from(sources));

//   // Update the src attribute of the master audio element with the first shuffled source
//   masterPlay.src = shuffledSources[0].src;

//   // Use the MediaList interface to play the remaining shuffled sources
//   const mediaList = masterPlay.mediaGroup.mediaText ? masterPlay.mediaGroup : masterPlay.addMediaGroup();
//   mediaList.removeAll();
//   shuffledSources.slice(1).forEach(source => {
//     mediaList.appendMedium('src');
//     mediaList.appendSource(source.src, source.type);
//   });

//   masterPlay.load();
//   masterPlay.play();
// });






// const player = $('#player')[0]; // get the underlying HTMLMediaElement
// const songchange = $('#songchange');
// const shuffleBtn = $('#shuffle-btn');
// const originalSource = $('audio').attr('src');

// function shufflePlaylist(playlist) {
//   const shuffled = playlist.slice(); // make a copy of the array
//   for (let i = shuffled.length - 1; i > 0; i--) {
//     const j = Math.floor(Math.random() * (i + 1));
//     [shuffled[i], shuffled[j]] = [shuffled[j], shuffled[i]];
//   }
//   return shuffled;
// }

// function playShuffledSong() {
//   const sources = player.querySelectorAll('source');
//   const shuffledSources = shufflePlaylist(Array.from(sources));
//   const firstSource = shuffledSources[0];

//   // Update the src attribute of the player audio element with the first shuffled source
//   player.src = firstSource.src;

//   // Remove the existing source elements from the player audio element
//   $(sources).remove();

//   // Append the shuffled source elements to the player audio element
//   shuffledSources.slice(1).forEach(source => {
//     player.appendChild(source);
//   });

//   // Load and play the shuffled audio
//   player.load();
//   player.play();
// }

// // Play the original song when the page loads
// player.src = originalSource;
// player.load();
// player.play();

// shuffleBtn.click(function(event) {
//   event.preventDefault();
//   playShuffledSong();
// });

// songchange.click(function(event) {
//   event.preventDefault();
//   player.src = originalSource;
//   player.load();
//   player.play();
// });









// $('.songbarplay').on('click', function () {

//     $(this).addClass('selected');
//     $('.songbarplay').not(this).removeClass('selected');

// });


// var searchinput = document.getElementById('livesearch').value;
// // var seacrlinks = document.getElementById('main-search-link-box');

// if(searchinput.value = 1)
// {
//     // document.getElementById("myDIV").style.display = "block";
//     document.getElementById('main-search-link-box').style.display = "block";
//     alert();
    
// }



// $('input[name=songsearch]').keyup(function(){
//     if($(this).val().length)
//       $('#main-search-link-box').show();
//     else
//       $('#main-search-link-box').hide();
//   });




let parent = document.querySelector('.sticky').parentElement;

while (parent) {
    const hasOverflow = getComputedStyle(parent).overflow;
    if (hasOverflow !== 'visible') {
        console.log(hasOverflow, parent);
    }
    parent = parent.parentElement;
}




$('input[name=songsearch]').keyup(function () {
    if ($(this).val().length) {
        $('#main-search-link-box').show();
        $('a.search-links').addClass('selected');
    } else {
        $('#main-search-link-box').hide();
        $('a.search-links').removeClass('selected');
    }
});






// $('#user').click(function () {
//     $('#logout').show();
// })



