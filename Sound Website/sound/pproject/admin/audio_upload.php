<div id="Song_Upload_Form" class="Song_Upload_Form">
  <form action="../../../sound/pproject/admin/songupload.php" method="POST" enctype="multipart/form-data" class="formbody" id="audioform">
    <div class="form_section ">
      <div class="section1">
        <!-- input 1 Start -->
        <div class="gt section1inner">
          <label>Song Name</label>
          <input type="text" id="song_name" name="Song_Name" placeholder="Enter Song Name" required minlength="2" maxlength="50" title="Please enter a song name between 3 and 50 characters" pattern="[a-zA-Z0-9\s()&+!,.:'-]*" oninvalid="setCustomValidity('Please enter a valid song name. Only letters, numbers, spaces and these special characters are allowed: ()&+!,.:\'-')" oninput="setCustomValidity('')" list="song_suggestions">



        </div>

        <!-- input 1 End -->

        <!-- input 2 Start -->
        <div class="section1inner">
          <label>Artist Name</label>
          <input type="text" id="artist_name" name="Artist_Name" placeholder="Enter Artist Name" required minlength="3" maxlength="90" title="Please enter an artist name between 3 and 50 characters" oninvalid="setCustomValidity('Please enter a valid artist name. Only letters and spaces are allowed.')" oninput="setCustomValidity('')" list="artist_suggestions">

          <datalist id="artist_suggestions">
            <option value="Atif Aslam">
            <option value="Arijit Singh">
            <option value="Adele">
            <option value="Ed Sheeran">
            <option value="Beyonce">
            <option value="Taylor Swift">
            <option value="Drake">
          </datalist>

        </div>

        <!-- input 2 End -->

        <!-- input 3 Start -->
        <div class="section1inner">
          <label>Album Name</label>
          <input type="text" id="album_name" name="Album_Name" placeholder="Enter Album Name" required minlength="3" maxlength="40" title="Please enter an album name between 3 and 40 characters" pattern="[a-zA-Z0-9\s]*" oninvalid="setCustomValidity('Please enter a valid album name. Only letters, numbers, and spaces are allowed. ()&+!,.:'-')" oninput="setCustomValidity('')" list="album_suggestions">
          <datalist id="album_suggestions">
            <option value="Thriller">
            <option value="Back in Black">
            <option value="Abbey Road">
            <option value="The Dark Side of the Moon">
            <option value="Rumours">
          </datalist>
        </div>

        <!-- input 3 End -->

        <!-- input 4 Start -->
        <div class="section1inner">
          <label>Film Name</label>
          <input type="text" id="film_name" name="Film_Name" placeholder="Enter Film Name" required minlength="3" maxlength="40" title="Please enter a film name between 3 and 40 characters" pattern="[a-zA-Z0-9\s()&+!,.:'-]*" oninvalid="setCustomValidity('Please enter a valid film name. Only letters, numbers, spaces and these special characters are allowed: ()&+!,.:'-')" oninput="setCustomValidity('')" list="film_suggestions">

          <datalist id="film_suggestions">
            <option value="The Shawshank Redemption">
            <option value="The Godfather">
            <option value="The Dark Knight">
            <option value="Forrest Gump">
            <option value="Inception">
          </datalist>

        </div>

        <!-- input 4 End -->
      </div>
      <div class="section2">
        <!-- input 5 Start -->
        <div class="section2inner_first">
          <label>Song Time Duration</label>
          <input id="song-time-duration-display" type="text" name="Song_Time_Duration_Display" placeholder="Enter Song Time Duration" readonly>
<input id="song-time-duration" type="hidden" name="Song_Time_Duration" value="" required>





        </div>

        <!-- input 5 End -->

        <!-- input 6 Start -->
        <div class="section2inner_second">
          <label>Year</label>
          <input class="sec2input" type="text"  maxlength="4" name="Year" required placeholder="Enter year" pattern="\d{4}" title="Please enter a 4-digit year like 2010" />

        </div>

        <!-- input 6 End -->

        <!-- input 7 Start -->
        <div class="song_file">
          <label>Song File / Audio File</label>
          <!-- <input type="file" name="Song_File" /> -->
          <!-- <input type="file" id="audio_file" name="Song_File" accept="audio/*" onchange="handleAudioFileSelect(event)" required> -->
          <input type="file" required id="audio_file" name="Song_File" accept="audio/*, video/*" onchange="validateFile(event)">



        </div>

        <!-- input 7 End -->


        <!-- input 8 Start -->
        <div class="song_img song_file">
          <label>Song Img</label>
          <input type="file" required name="Song_Img" accept="image/*" onchange="validateImage(event)">

        </div>

        <!-- input 8 End -->
        <div class="category_submit">

          <div class="category">
            <table class="">
              <tr>Category</tr>
              <td>
                <input type="checkbox" name="category" class="category1" value="Bollywood"> Bollywood <br>
                <input type="checkbox" name="category" class="category2" value="Hollywood"> Hollywood
              </td>
            </table>
          </div>


          <div class="submit_btn">
            <input type="submit" value="Upload Audio" name="save_audio" class="submit" />

          </div>


        </div>


        <!-- --- Submit Btn --- -->


        <!-- --- Submit Btn --- -->

      </div>
    </div>
  </form>
</div>

<style>
  .alert1 {
    background-color: red;
    border: 1px solid #ff6666;
    color: white;
    padding: 10px;
    margin-bottom: 10px;
    border-radius: 5px;
    text-align: center;
    opacity: 1;
    transition: opacity 1s, transform 1s;

  }

  .top {
    position: absolute;
    top: 10%;
    left: 50%;
    transform: translate(-50%, -50%);
  }
</style>






<script>
  const form = document.querySelector('form'); // assuming you have a form element
  const categoryCheckboxes = document.querySelectorAll('input[name="category"]');
  form.addEventListener('submit', (event) => {
    const checked = Array.from(categoryCheckboxes).some((checkbox) => checkbox.checked);
    if (!checked) {
      event.preventDefault();
      const alertMsg = document.createElement('div');
      alertMsg.textContent = 'Please check at least one category.';
      alertMsg.classList.add('alert1');
      alertMsg.classList.add('top');
      document.body.appendChild(alertMsg);
      setTimeout(() => {
        alertMsg.style.opacity = 0;
        alertMsg.style.transform = 'translateY(-100%)';
        alertMsg.classList.add('slide-up');
        setTimeout(() => {
          alertMsg.remove();
        }, 1000);
      }, 3000);
    }
  });





  function validateFile(event) {
    const file = event.target.files[0];
    const fileType = file.type.split('/')[0];

    if (fileType !== 'audio' && fileType !== 'video') {
      event.target.value = ''; // Clear the file input field

      const alertDiv = document.createElement('div');
      alertDiv.innerText = 'Please choose an audio or video file.';
      alertDiv.style.color = 'white';
      alertDiv.style.backgroundColor = 'red';
      alertDiv.style.padding = '10px';
      alertDiv.style.borderRadius = '5px';
      alertDiv.style.textAlign = 'center';
      alertDiv.style.marginTop = '10px';
      alertDiv.style.transition = 'all 0.5s ease-in-out'; // Add transition to the alert message

      const form = document.querySelector('form');
      form.insertBefore(alertDiv, form.firstChild); // Add the alert message to the top of the form

      setTimeout(() => {
        alertDiv.style.opacity = '0'; // Fade out the alert message
        alertDiv.style.transform = 'translateY(-50px)'; // Slide up the alert message
        setTimeout(() => {
          alertDiv.remove(); // Remove the alert message from the DOM
        }, 500);
      }, 3000);
    } else {
      handleAudioFileSelect(file);
    }
  }

  function handleAudioFileSelect(file) {
  const audio = new Audio();
  audio.src = URL.createObjectURL(file);
  audio.onloadedmetadata = () => {
    const durationInSeconds = Math.floor(audio.duration);
    const minutes = Math.floor(durationInSeconds / 60);
    const seconds = durationInSeconds % 60;
    const durationFormatted = `${minutes}:${seconds.toString().padStart(2, '0')}`;

    const songTimeDurationInput = document.querySelector('input[name="Song_Time_Duration_Display"]');
    songTimeDurationInput.value = durationFormatted;
    songTimeDurationInput.disabled = true;
    songTimeDurationInput.setAttribute('readonly', true);

    const songTimeDurationHiddenInput = document.querySelector('input[name="Song_Time_Duration"]');
    songTimeDurationHiddenInput.value = `${minutes}:${seconds}`;
  };
}






  function validateImage(event) {
    const file = event.target.files[0];
    const fileType = file.type.split('/')[0];

    if (fileType !== 'image') {
      event.target.value = ''; // Clear the file input field

      const alertDiv = document.createElement('div');
      alertDiv.innerText = 'Please choose an image file.';
      alertDiv.style.color = 'white';
      alertDiv.style.backgroundColor = 'red';
      alertDiv.style.padding = '10px';
      alertDiv.style.borderRadius = '5px';
      alertDiv.style.textAlign = 'center';
      alertDiv.style.marginTop = '10px';
      alertDiv.style.transition = 'all 0.5s ease-in-out'; // Add transition to the alert message

      const form = document.querySelector('form');
      form.insertBefore(alertDiv, form.firstChild); // Add the alert message to the top of the form

      setTimeout(() => {
        alertDiv.style.opacity = '0'; // Fade out the alert message
        alertDiv.style.transform = 'translateY(-50px)'; // Slide up the alert message
        setTimeout(() => {
          alertDiv.remove(); // Remove the alert message from the DOM
        }, 500);
      }, 3000);
    }
  }






</script>