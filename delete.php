<?php

if (isset($_GET['id'])) {
    $id = strip_tags($_GET['id']);

    $data = file_get_contents('data.json');
    $students = json_decode($data, true);

    foreach ($students as $i => $student) {
        if ($student['id'] == $id) {
            unset($students[$i]);
            $save = json_encode(array_values($students), JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
            file_put_contents('data.json', $save);
            break;
        }
    }
    header('Location: index.php');
}
die();

?>