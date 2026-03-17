<?php

/** @var PDO $pdo_messages */

$name = $message = $nameErr = $messageErr = "";
$success = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $isValid = true;

    if (empty($_POST["name"])) {
        $nameErr = "Name is required";
        $isValid = false;
    } else {
        $name = formValidation($_POST["name"]);
        if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
            $nameErr = "Only letters and white space allowed";
            $isValid = false;
        }
    }

    if (empty($_POST["message"])) {
        $messageErr = "Message is required";
        $isValid = false;
    } else {
        $message = formValidation($_POST["message"]);
    }

    if ($isValid) {
        $stmt = $pdo_messages->prepare("INSERT INTO messages (name, message) VALUES (?, ?)");
        $stmt->execute([$name, $message]);
        $success = true;
        $name = $message = "";
    }
}

function formValidation($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<h2>Contact me</h2>

<?php if ($success): ?>
    <div style="background-color: #d4edda; color: #155724; padding: 15px; border-radius: 5px; margin-bottom: 20px; border: 1px solid #c3e6cb;">
        <strong>Success!</strong> Your message has been sent.
    </div>
<?php endif; ?>

<form method="post" action="index.php?page=contact">
    <p>
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name" value="<?php echo $name; ?>" style="width: 100%; max-width: 300px;">
        <br><span style="color: red; font-size: 0.8rem;"><?php echo $nameErr;?></span>
    </p>

    <p>
        <label for="message">Message:</label><br>
        <textarea id="message" name="message" rows="5" style="width: 100%; max-width: 400px;"><?php echo $message; ?></textarea>
        <br><span style="color: red; font-size: 0.8rem;"><?php echo $messageErr;?></span>
    </p>

    <input type="submit" name="submit" value="Submit" style="padding: 10px 20px; cursor: pointer;">
</form>