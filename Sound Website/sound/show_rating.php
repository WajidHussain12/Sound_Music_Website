<?php
$User_id = strval($_SESSION['id']);

$query1 = "SELECT * FROM song_table";
$result = mysqli_query($conn, $query1);

if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}

while ($row = mysqli_fetch_array($result)) {
    $Song_id  = $row['Song_id'];

    // Star rating
    $query = "SELECT * FROM song_rating WHERE Song_id = " . $Song_id . " and User_id = " . $User_id;
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
        $numRating = "No ratings given.";
    }
?>

    <div class='card mb-3'>
        <div class='card-body'>
            <!-- 5 Star Rating -->
            <select name='star_rating_option' class='rating' id='star_rating_<?php echo $Song_id; ?>' data-id='rating_<?php echo $Song_id; ?>'>
                <option value='1>1</option>
                <option value='2>2</option>
                <option value='3>3</option>
                <option value='4>4</option>
                <option value='5>5</option>
            </select>
            Rating: <span id='numeric_rating_<?php echo $Song_id; ?>'><?php echo ($rating != null) ? $rating : $numRating; ?></span>
        </div>
    </div>
<?php } ?>



