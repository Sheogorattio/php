<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Info</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/info.css">
    <style>
        .star-icon {
            width: 30px;  
            height: 30px;
            margin: 0 3px;

            display: inline-block;
            background-image: url('../images/star.png'); 
            background-size: cover;
        }

        .stars-container {
            text-align: center;
            margin-bottom: 20px;
        }

        #gallery img {
            max-width: 100%;
            border-radius: 5px;
            transition: transform 0.2s;
        }

        #gallery img:hover {
            transform: scale(1.05);
        }

        h4 {
            font-size: 1.2rem; 
        }

        h2 {
            text-align: center;
            font-size: 2rem;
            text-transform: uppercase;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <?php
        include_once("functions.php");

        if (isset($_GET['hotel'])) {
            $hotel = $_GET['hotel'];
            $link = connect();
            $sel = 'SELECT * FROM hotels WHERE id=' . $hotel;
            $res = $link->query($sel);
            $row = mysqli_fetch_array($res, MYSQLI_NUM);
            $hname = $row[1];
            $hstars = $row[4];
            $hcost = $row[5];
            $hinfo = $row[6];
            $res->free();

            echo '<h2 class="text-uppercase text-center mb-4">' . $hname . '</h2>';

            echo '<div class="stars-container">';
            for ($i = 0; $i < $hstars; $i++) {
                echo '<span class="star-icon"></span>';  
            }
            echo '</div>';

            echo '<div class="row mb-5">
                    <div class="col-md-6">
                        <h4 class="text-muted">Hotel Information:</h4>
                        <p>' . $hinfo . '</p>
                        <p><strong>Price per night:</strong> $' . $hcost . '</p>
                    </div>
                    <div class="col-md-6 text-center">';

            echo '<h4 class="mb-3">Gallery</h4>';
            connect();
            $sel = 'SELECT imagepath FROM images WHERE hotelid=' . $hotel;
            $res = $link->query($sel);

            echo '<ul id="gallery" class="list-inline">';
            $image_found = false;
            while ($row = mysqli_fetch_array($res, MYSQLI_NUM)) {
                if (!$image_found) {
                    $image_found = true;
                } else {
                    echo '<li class="list-inline-item">
                            <img src="../' . $row[0] . '" class="img-fluid rounded shadow-sm" alt="Hotel Image">
                          </li>';
                }
            }
            $res->free();
            echo '</ul>';
            echo '</div>';
            echo '</div>';
            $comments_query = "SELECT c.comment, c.created_at, u.login 
            FROM comments c 
            JOIN users u ON c.userid = u.id 
            WHERE c.hotelid = ?";
            $stmt = $link->prepare($comments_query);
            $stmt->bind_param('i', $hotel);
            $stmt->execute();
            $result = $stmt->get_result();

            echo '<div class="mt-5">';
            echo '<h3>Customer Reviews</h3>';
            if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
            echo '<div class="card mb-3">';
            echo '<div class="card-body">';
            echo '<h5 class="card-title">' . htmlspecialchars($row['login']) . '</h5>';
            echo '<h6 class="card-subtitle mb-2 text-muted">' . $row['created_at'] . '</h6>';
            echo '<p class="card-text">' . nl2br(htmlspecialchars($row['comment'])) . '</p>';
            echo '</div>';
            echo '</div>';
            }
            } else {
            echo '<p>No comments yet. Be the first to leave a review!</p>';
            }
            echo '</div>';

        }
        ?>
    </div>
    <script src="../js/bootstrap.bundle.min.js"></script>
</body>
</html>
