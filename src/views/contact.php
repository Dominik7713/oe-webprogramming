<h2>Contact me</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <p>
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name">
    </p>

    <p>
        <label for="text">Message:</label><br>
        <textarea id="text" name="text" rows="5" cols="40"></textarea>
    </p>

    <input type="submit" name="submit" value="Submit">


</form>