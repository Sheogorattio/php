<?php
$users = 'src/pages/users.txt';
$moderatedWords = "src/pages/forbidenWords.txt";
function register($name, $pass, $email)
{
    //data validation block
    $name=trim(htmlspecialchars($name));
    $pass=trim(htmlspecialchars($pass));
    $email=trim(htmlspecialchars($email));
    if($name =='' && $pass =='' && $email =='')
    {
        echo "<h3/><span style='color:red;'>
            Fill All Required Fields!</span><h3/>";
        return false;
    }
    if(strlen($name) < 3 && strlen($name) > 30 &&
       strlen($pass) < 3 && strlen($pass) > 30)
    {
        echo "<h3/><span style='color:red;'>
            Values Length Must Be Between 3 And 30!</span><h3/>";
        return false;
    }
    //login uniqueness check block
    global $users;
    $file=fopen($users,'a+');
    while($line=fgets($file, 128))
    {
        $readname=substr($line,0,strpos($line,':'));
        if($readname == $name)
        {
            echo "<h3/><span style='color:red;'>
            Such Login Name Is Already Used!</span><h3/>";
            return false;
        }
    }
    //new user adding block
    $line=$name.':'.md5($pass).':'.$email."\r\n";
    fputs($file,$line);
    fclose($file);
    return true;
}

function login($login, $pass)
{
    $login = trim(htmlspecialchars($login));
    $pass = trim(htmlspecialchars($pass));
    if($login =='' && $pass =='' && $pass =='')
    {
        echo "<h3/><span style='color:red;'>
            Fill All Required Fields!</span><h3/>";
        return false;
    }
    if(strlen($login) < 3 && strlen($login) > 30 &&
       strlen($pass) < 3 && strlen($pass) > 30)
    {
        echo "<h3/><span style='color:red;'>
            Values Length Must Be Between 3 And 30!</span><h3/>";
        return false;
    }
    global $users;
    $file = fopen($users, 'r');
    while($line = fgets($file, 128))
    {
        $parts = explode(":",$line);
        if(count($parts) != 3) continue;
        $readname = $parts[0];
        if($readname == $login)
        {
            $readpass = $parts[1];
            if(md5($pass) == $readpass)
            {
                $_SESSION['user_name'] = $login;
                if(isset($_COOKIE['current_page']))
                {
                    header("Location: index.php?page=".$_COOKIE['current_page']);
                }
                return;
            }
        }
    }
    header("Location: index.php?page=4");
    return;
}

function saveMessage($filePath, $text, $sender, $time)
{
    $file = fopen($filePath, 'a'); 
    $text =  moderateMessage($text);
    fputs($file, $text.PHP_EOL);
    fputs($file, '#'.$sender.'#'.date("d/m/Y H:i:s").PHP_EOL);
    fclose($file);
}

function getMassages($filePath)
{
    $file = fopen($filePath, 'r');
    $messages = array();
    $msgText ='';
    while($line = fgets($file))
    {
        
        if($line[0] == '#')
        {
            $parts = explode('#', $line);
            $msg  = array("sender" => $parts[1], "time" => $parts[2], "text" => $msgText );
            array_push($messages, $msg);
            $msgText = '';
        }
        else
        {
            $msgText = $msgText.$line;
        }
    }
    fclose($file);
    return $messages;
}

function moderateMessage($userMessage)
{
    $triggerWords = array();
    global $moderatedWords;
    $file = fopen($moderatedWords, 'r');
    while($line = fgets($file))
    {
        array_push($triggerWords, strtolower(trim($line)));
    }
    fclose($file);

    $pattern = '/\b' . implode('|', array_map('preg_quote', $triggerWords)) . '\b/i';
    $filteredMessage = preg_replace_callback($pattern, function($matches){
        return str_repeat('*', strlen($matches[0]));
    }, $userMessage);
    return $filteredMessage;
}
?>