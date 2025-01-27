<?php
setcookie('current_page', '5', time()+60*60*24*30, '/', httponly:true );
include_once("./src/pages/functions.php");
if(isset($_POST['msgsend']) && isset($_POST['msgtext']) && isset($_SESSION['user_name']))
{
   saveMessage("./src/pages/chatMessages.txt", $_POST['msgtext'], $_SESSION['user_name'], time());
}
$messages = getMassages("./src/pages/chatMessages.txt");
?>

<div class="container mt-5">
        <h1 class="mb-4">Messages</h1>

        <!-- Messages Section -->
        <div id="messages" class="mb-4">
            <?php
            foreach($messages as $msg) {
                echo "<div class='card mb-3'>";
                echo "<div class='card-body'>";
                echo "<p class='mb-1 fw-bold'>" . htmlspecialchars($msg['sender']) . " <span class='text-muted small'>| " . htmlspecialchars($msg['time']) . "</span></p>";
                echo "<p class='message-content'>" . nl2br(htmlspecialchars($msg['text'])) . "</p>";
                echo "<span class='read-more' onclick=\"this.previousElementSibling.classList.toggle('expanded'); this.textContent = this.textContent === 'Read more' ? 'Read less' : 'Read more';\">Read more</span>";
                echo "</div></div>";
            }
            ?>
        </div>

        <!-- Message Form -->
        <?php
            if($_SESSION['user_name'])
            {
        ?>
        <form id="messageForm" method="post" action="">
            <div class="mb-3">
                <textarea class="form-control" id="messageInput" rows="3" placeholder="Type your message here..." name="msgtext"></textarea>
            </div>
            <button type="submit" class="btn btn-primary" name="msgsend">Send Message</button>
        </form>
        <?php
            }
            else
            {
                echo "<p style = 'color: red'>You must be signed in to send messages</p>";
            }
        ?>
    </div>