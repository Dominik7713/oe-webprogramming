<?php

include 'includes/header.php';

$page = $_GET['page'] ?? 'home';

switch ($page) {
    case 'projects':
        include 'src/Views/projects.php';
        break;
    case 'contact':
        include 'src/Views/contact.php';
        break;
    case 'admin':
        include 'src/Views/admin.php';
        break;
    default:
        include 'src/Views/home.php';
        break;
}

include 'includes/footer.php';

?>
