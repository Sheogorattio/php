<?php
include_once("functions.php");
$link = connect();

$hotels_query = 'SELECT id, hotel FROM hotels';
$hotels_result = $link->query($hotels_query);

if (isset($_POST['submit_comment']) && isset($_POST['hotel_id']) && isset($_POST['comment']) && isset($_SESSION['ruser_id'])) {
    $hotel_id = intval($_POST['hotel_id']);
    $comment = htmlspecialchars(trim($_POST['comment']));
    $user_id = $_SESSION['ruser_id'];

    $insert_query = "INSERT INTO comments (userid, hotelid, comment) VALUES (?, ?, ?)";
    $stmt = $link->prepare($insert_query);
    $stmt->bind_param('iis', $user_id, $hotel_id, $comment);
    $stmt->execute();
    $stmt->close();
    echo "<div class='alert alert-success'>Comment added successfully!</div>";
}
?>

<div class="container mt-5">
    <h1 class="mb-4">Leave a Comment</h1>
    <form method="post" action="">
        <div class="mb-3">
            <label for="hotelSelect" class="form-label">Select a Hotel</label>
            <select class="form-select" id="hotelSelect" name="hotel_id" required>
                <option value="" disabled selected>Choose a hotel</option>
                <?php
                while ($row = $hotels_result->fetch_assoc()) {
                    echo '<option value="' . $row['id'] . '">' . htmlspecialchars($row['hotel']) . '</option>';
                }
                ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="commentInput" class="form-label">Your Comment</label>
            <textarea class="form-control" id="commentInput" rows="4" name="comment" placeholder="Write your comment here..." required></textarea>
        </div>
        <button type="submit" class="btn btn-primary" name="submit_comment">Submit</button>
    </form>
</div>
