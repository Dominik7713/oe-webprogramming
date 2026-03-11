<?php

/** @var PDO $pdo_users */
/** @var PDO $pdo_projects */

require_once 'config.php';

$password = $_POST['admin_password'] ?? '';
$is_authenticated = false;

if (!empty($password)) {
    $stmt = $pdo_users->prepare("SELECT password_hash FROM users WHERE username = 'admin'");
    $stmt->execute();
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password_hash'])) {
        $is_authenticated = true;
    }
}

if ($is_authenticated) {
    if (isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['id'])) {
        $stmt = $pdo_projects->prepare("DELETE FROM projects WHERE id = ?");
        $stmt->execute([$_GET['id']]);
        header("Location: index.php?page=admin&msg=deleted");
    }

    if (isset($_POST['add_project'])) {
        $sql = "INSERT INTO projects (title, description, technologies, github_url, is_active) VALUES (?, ?, ?, ?, 1)";
        $stmt = $pdo_projects->prepare($sql);
        $stmt->execute([
            $_POST['title'],
            $_POST['description'],
            $_POST['technologies'],
            $_POST['github_url']
        ]);
        header("Location: index.php?page=admin&msg=added");
    }
}
?>


<div class="admin-wrapper" style="padding: 20px; text-align: center;">
    <?php if (!$is_authenticated): ?>
        <div class="login-box" style="background: #f4f4f4; padding: 40px; border-radius: 10px; display: inline-block; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
            <img src="assets/img/login.png" alt="login" width="50" height="50" style="vertical-align:middle">
            <br><br>

            <?php if (!empty($password) && !$is_authenticated): ?>
                <p style="color: red;">Wrong password!</p>
            <?php endif; ?>

            <form method="POST">
                <input type="password" name="admin_password" placeholder="Password" required
                       style="padding: 10px; width: 200px; border-radius: 5px; border: 1px solid #ccc;"><br><br>
                <button type="submit" style="padding: 10px 20px; background: #2c3e50; color: white; border: none; border-radius: 5px; cursor: pointer;">
                    Login
                </button>
            </form>
        </div>

    <?php else: ?>
        <div class="admin-panel" style="text-align: left; max-width: 800px; margin: 0 auto;">
            <h1 style="color: #2c3e50; text-align: center">Admin page</h1>
            <br>
            <a href="index.php?page=admin" style="color: #e74c3c;">Sign out</a>

        </div>
    <?php endif; ?>
</div>
