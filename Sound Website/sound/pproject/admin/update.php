<div class="" id="update-container">
    <div class="update-container2 upmain" id="update-container2">
        <?php
        $conn = mysqli_connect("localHost", "root", "", "sound") or die("Connection Failed");

        if (isset($_GET['id'])) {
            $getid = $_GET['id'];
            $sql1 = "SELECT * FROM song_table WHERE Song_id = $getid";
        } else {
            // Set a default value for $sql1
            $sql1 = "SELECT * FROM song_table LIMIT 1";
        }

        $result1 = mysqli_query($conn, $sql1) or die("Query Unsuccessful.");


        if (mysqli_num_rows($result1) > 0) {
            while ($row2 = mysqli_fetch_assoc($result1)) {
        ?>


                <div id="update_main" class="update_main update_mainresponsive">





                    <div id="update_form_div" class="update_form_div update_form_divresponsive">




                        <div class="updateform updateformresponsive">


                            <div class="updatebtn_close updatebtn_closeresponsive extrabtnclose">

                                <i id="updatebtn_mark2" class="fa-sharp fa-solid fa-circle-xmark"></i>

                            </div>



                            <form action="../../sound/pproject/admin/updatedata.php" method="POST" enctype="multipart/form-data" class="formbody formbody2_update formbodyresponsie" id="audioform">
                                <!-- form fields here -->
                                <div class="form_section form_section_update form_sectionresponsive">
                                    <div class="section1_update section1responsive">
                                        <!-- input 1 Start -->
                                        <div class="gt section1inner section1inner_update section1innerresponsive">
                                            <label>Song Name</label>
                                            <input type="hidden" name="Song_id" value="<?php echo $row2['Song_id']; ?>">
                                            <input type="text" name="Song_Name" value="<?php echo $row2['Song_Name']; ?>" placeholder="Enter Song Name" autofocus required minlength="3" maxlength="50" title="Please enter a song name between 3 and 50 characters" pattern="[a-zA-Z0-9\s()&+!,.:'-]*" />
                                        </div>

                                        <!-- input 1 End -->

                                        <!-- input 2 Start -->
                                        <div class="section1inner section1inner_update section1innerresponsive">
                                            <label>Artist Name</label>
                                            <input type="text" name="Artist_Name" value="<?php echo $row2['Artist_Name']; ?>" placeholder="Enter Artist Name" required minlength="3" maxlength="90" title="Please enter an artist name between 3 and 50 characters"  />
                                        </div>

                                        <!-- input 2 End -->

                                        <!-- input 3 Start -->
                                        <div class="section1inner section1inner_update section1innerresponsive">
                                            <label>Album Name</label>
                                            <input type="text" name="Album_Name" value="<?php echo $row2['Album_Name']; ?>" placeholder="Enter Album Name" required minlength="3" maxlength="40" title="Please enter an album name between 3 and 15 characters" pattern="[a-zA-Z0-9\s]*"  />
                                        </div>

                                        <!-- input 3 End -->

                                        <!-- input 4 Start -->
                                        <div class="section1inner section1inner_update section1innerresponsive">
                                            <label>Film Name</label>
                                            <input type="text" name="Film_Name" value="<?php echo $row2['Film_Name']; ?>" placeholder="Enter Film Name" required minlength="3" maxlength="40" title="Please enter a film name between 3 and 50 characters" pattern="[a-zA-Z0-9\s()&+!,.:'-]*" />
                                        </div>

                                        <!-- input 4 End -->
                                    </div>


                                    <div class="section1innert section2_update section2responsive">
                                        <!-- input 5 Start -->
                                        <div class="section2inner_first section2inner_first_update section2inner_firstresponsive">
                                            <label>Song Time Duration</label>
                                            <input type="text" name="Song_Time_Duration" placeholder="Enter Song Time Duration" value="<?php echo $row2['Song_TimeDuration']; ?>" placeholder="Enter Song Name" required/>
                                        </div>

                                        <!-- input 5 End -->

                                        <!-- input 6 Start -->
                                        <div class="section2inner_second section2inner_second_update section2inner_secondresponsive">
                                            <label>Year</label>
                                            <input type="text" name="Year"  placeholder="Enter year" value="<?php echo $row2['Year']; ?>"  maxlength="4" placeholder="Enter Song Name" required  pattern="\d{4}" title="Please enter a 4-digit year like 2010" />
                                        </div>

                                        <!-- input 6 End -->

                                        <!-- input 7 Start -->
                                        <div class="song_file song_file_update song_fileresponsive">
                                            <label class="file_detail_label2">Song File / Audio File</label>
                                            <p class="file_detail"><span class="current_file">Current file:</span> <?php echo $row2['Song_File']; ?></p>

                                            <input type="file"  name="Song_File" accept="audio/*, video/*"/>
                                        </div>

                                        <!-- input 7 End -->


                                        <!-- input 8 Start -->
                                        <div class="song_img song_file song_file_update song_imgresponsive">
                                            <label class="file_detail_label2">Song Img</label>
                                            <p class="file_detail"><span class="current_img">Current Img:</span> <?php echo $row2['Song_Img']; ?></p>
                                            <input type="file"  name="Song_Img" accept="image/*"/>
                                        </div>

                                        <!-- input 8 End -->
                                        <div class="category_submit category_submit_update category_submitresponsive">

                                            <div class="category categoryresponsive">
                                                <table class="">
                                                    <tr>Category</tr>
                                                    <td>
                                                        <input type="checkbox" name="category[]" value="Bollywood" class="category1" <?php if (isset($row2['Song_Category']) && in_array('Bollywood', explode(',', $row2['Song_Category']))) echo 'checked'; ?>> Bollywood<br>
                                                        <input type="checkbox" name="category[]" value="Hollywood" class="category2" <?php if (isset($row2['Song_Category']) && in_array('Hollywood', explode(',', $row2['Song_Category']))) echo 'checked'; ?>> Hollywood


                                                    </td>

                                                </table>
                                            </div>


                                            <div class="submit_btn submit_btnresponsive">
                                                <input type="submit" value="Update Audio" name="save_audio" class="submit submit_upload submitresponsive" />
                                            </div>


                                        </div>


                                        <!-- --- Submit Btn --- -->


                                        <!-- --- Submit Btn --- -->

                                    </div>
                                </div>
                            </form>
                        </div>


                        <div class="updatebtn_close updatebtn_closeresponsive updatebtn_closeresponsivenone">

                            <i id="updatebtn_mark" class="fa-sharp fa-solid fa-circle-xmark fa-2xl"></i>
                        </div>


                    </div>
                </div>

        <?php
            }
        } else {
            echo "No Record Found";
        }
        ?>
    </div>
</div>



<script>





    $('#updatebtn_mark2').click(function() {
        console.log("Button 1 clicked");
        $('#update-container2').addClass("upmain");
    });
</script>