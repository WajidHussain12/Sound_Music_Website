<?php
session_start();
include "config.php";

$User_id = strval($_SESSION['id']);
$Song_id = strval($_POST['Song_id']);
$rating = strval($_POST['rating']);

// Check Count of record inside the table
$query4 = "SELECT * FROM song_rating";
$resultset1 = mysqli_query($conn, $query4);
$rec_count = mysqli_num_rows($resultset1);

if ($rec_count == 0) {
    $rec_count = 1;
} else {
    $rec_count++;
}

$query2 = "SELECT * FROM song_rating WHERE Song_id = {$Song_id} AND User_id = {$User_id}";
$resultset2 = mysqli_query($conn, $query2);
$count = mysqli_num_rows($resultset2);

if ($count == 0) {
    // If the user has not rated the song yet, insert a new rating record
    $insertquery = "INSERT INTO song_rating(User_id, Song_id, rating) VALUES ({$User_id}, {$Song_id}, {$rating})";
    mysqli_query($conn, $insertquery);
} else {
    // If the user has already rated the song, update the existing rating record
    $updatequery = "UPDATE song_rating SET rating = {$rating} WHERE User_id = {$User_id} AND Song_id = {$Song_id}";
    mysqli_query($conn, $updatequery);
}

// fetch rating
$query3 = "SELECT ROUND(AVG(rating),1) as numRating FROM song_rating WHERE Song_id='" . $Song_id . "'";
$resultset3 = mysqli_query($conn, $query3) or die("dsd");
$getAverage = mysqli_fetch_array($resultset3);
$numRating = $getAverage['numRating'];

$return_arr = array("numRating" => $numRating);
echo json_encode($return_arr);
?>
