<?php
function connect() {
    $link = new mysqli('localhost', 'root', 'rootroot', 'travels');
    if ($link->connect_error) {
        die('Connection failed: ' . $link->connect_error);
    }
    return $link;
}

function seedDatabase() {
    $link = connect();

    $roles = [
        'admin',
        'user',
        'guest'
    ];

    foreach ($roles as $role) {
        $stmt = $link->prepare('INSERT INTO roles (role) VALUES (?)');
        $stmt->bind_param('s', $role);
        $stmt->execute();
    }

    $countries = [
        'USA',
        'Ukraine',
        'France',
        'Italy'
    ];

    foreach ($countries as $country) {
        $stmt = $link->prepare('INSERT INTO countries (country) VALUES (?)');
        $stmt->bind_param('s', $country);
        $stmt->execute();
    }

    $cities = [
        ['New York', 1],
        ['Kyiv', 2],
        ['Paris', 3],   
        ['Rome', 4] 
    ];

    foreach ($cities as $city) {
        $stmt = $link->prepare('INSERT INTO cities (city, countryid, ucity) VALUES (?, ?, ?)');
        $stmt->bind_param('sis', $city[0], $city[1], $city[0]);
        $stmt->execute();
    }

    $hotels = [
        ['Hotel Central', 1, 1, 4, 200, 'Nice hotel in the city center'],
        ['Kyiv Palace', 2, 2, 5, 150, 'Luxurious hotel with a great view'],
        ['Eiffel Tower Hotel', 3, 3, 3, 100, 'Budget hotel near the Eiffel Tower'],
        ['Roman Holiday', 4, 4, 4, 180, 'Charming hotel with an Italian atmosphere']
    ];

    foreach ($hotels as $hotel) {
        $stmt = $link->prepare('INSERT INTO hotels (hotel, cityid, countryid, stars, cost, info) VALUES (?, ?, ?, ?, ?, ?)');
        $stmt->bind_param('siisis', $hotel[0], $hotel[1], $hotel[2], $hotel[3], $hotel[4], $hotel[5]);
        $stmt->execute();
    }

    $images = [
        ['images/hotel1.jpg', 1],
        ['images/hotel2.jpg', 2],
        ['images/hotel3.jpg', 3],
        ['images/hotel4.jpg', 4]
    ];

    foreach ($images as $image) {
        $stmt = $link->prepare('INSERT INTO images (imagepath, hotelid) VALUES (?, ?)');
        $stmt->bind_param('si', $image[0], $image[1]);
        $stmt->execute();
    }

    $users = [
        ['admin_user', 'admin_pass', 'admin@example.com', 1],
        ['simple_user', 'user_pass', 'user@example.com', 2],
        ['simple_user2', 'user_pass2', 'user2@example.com', 2]
    ];

    foreach ($users as $user) {
        $stmt = $link->prepare('INSERT INTO users (login, pass, email, roleid, discount) VALUES (?, ?, ?, ?, ?)');
        $hashedPass = md5($user[1]);
        $discount = 0;
        $stmt->bind_param('sssii', $user[0], $hashedPass, $user[2], $user[3], $discount);
        $stmt->execute();
    }

    $comments_seed = [
        [1, 1, "Amazing place, loved it!"],
        [2, 2, "Service could be better, but overall nice."],
        [3, 3, "Fantastic experience, will come again!"],
        [1, 4, "The location was perfect, very clean rooms."],
    ];
    
    foreach ($comments_seed as $comment) {
        $stmt = $link->prepare("INSERT INTO comments (userid, hotelid, comment) VALUES (?, ?, ?)");
        $stmt->bind_param('iis', $comment[0], $comment[1], $comment[2]);
        $stmt->execute();
        $stmt->close();
    }
    

    echo "Database seeded successfully!";
}

seedDatabase();
?>
