<?php
function connect(
    $host='localhost',
    $user='root',
    $pass='rootroot',
    $dbname='travels')
{
    $link = new mysqli($host, $user, $pass, $dbname);
    if ($link->connect_error) {
        die('Connection error: ' . $link->connect_error);
    }
    if (!$link->set_charset('utf8')) {
        die('Error setting charset: ' . $link->error);
    }
    return $link; 
}

function register($name, $pass, $email) {
    $name = trim(htmlspecialchars($name));
    $pass = trim(htmlspecialchars($pass));
    $email = trim(htmlspecialchars($email));

    if ($name == "" || $pass == "" || $email == "") {
        echo "<h3/><span style='color:red;'>Fill All Required Fields!</span><h3/>";
        return false;
    }
    if (strlen($name) < 3 || strlen($name) > 30 || strlen($pass) < 3 || strlen($pass) > 30) {
        echo "<h3/><span style='color:red;'>Values Length Must Be Between 3 And 30!</span><h3/>";
        return false;
    }

    $link = connect();
    $stmt = $link->prepare('INSERT INTO users (login, pass, email, roleid) VALUES (?, ?, ?, ?)');
    $hashedPass = md5($pass);
    $roleId = 2;
    $stmt->bind_param('sssi', $name, $hashedPass, $email, $roleId);

    if (!$stmt->execute()) {
        if ($stmt->errno == 1062) {
            echo "<h3/><span style='color:red;'>This Login Is Already Taken!</span><h3/>";
        } else {
            echo "<h3/><span style='color:red;'>Error code: " . $stmt->errno . "!</span><h3/>";
        }
        $stmt->close();
        $link->close();
        return false;
    }

    $stmt->close();
    $link->close();
    return true;
}

function login($name, $pass)
{
    $name = trim(htmlspecialchars($name));
    $pass = trim(htmlspecialchars($pass));

    if ($name == "" || $pass == "") {
        echo "<h3/><span style='color:red;'> Fill All Required Fields! </span><h3/>";
        return false;
    }

    if (strlen($name) < 3 || strlen($name) > 30 || strlen($pass) < 3 || strlen($pass) > 30) {
        echo "<h3/><span style='color:red;'> 
              Value Length Must Be Between 3 And 30!
              </span><h3/>";
        return false;
    }

    $link = connect();
    $sel = 'SELECT id, login, pass, roleid FROM users WHERE login="' . $name . '" AND pass="' . md5($pass) . '"';
    $res = $link->query($sel);

    if ($row = mysqli_fetch_array($res, MYSQLI_NUM)) {
        $_SESSION['ruser'] = $name; 
        $_SESSION['ruser_id'] = $row[0];

        if ($row[3] == 1) { 
            $_SESSION['radmin'] = $name; 
        }

        return true;
    } else {
        echo "<h3/><span style='color:red;'> No Such User! </span><h3/>";
        return false;
    }
}


?>