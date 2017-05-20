// Login code....

switch ($role) {
    case 'owner':
        $redirect = 'owner.php';
    break;
    case 'admin':
        $redirect = 'admin.php';
    break;
    case 'clerk':
        $redirect = 'clerk.php';
    break;
}

header('Location: ' . $redirect);
/*IF statement

// Login code...

if ($role == 'owner') {
    $redirect = 'owner.php';
} else if ($role == 'admin') {
    $redirect = 'admin.php';
} else if ($role == 'administrator') {
    $redirect = 'clerk.php';
}

header('Location: ' . $redirect);
