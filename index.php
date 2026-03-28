<?php

    require_once 'helpers.php';

    $notes = [];

    if (file_exists("notes.txt"))
    {
        $notes = file("notes.txt", FILE_IGNORE_NEW_LINES);

    //    notes_printer($notes);
    }
    if (isset($_GET['delete']))
    {
        $id = (int)$_GET['delete'];
        error_log("deleting..");
        // debug_to_console($id);
        if (isset($notes[$id]))
        {
            unset($notes[$id]);
            $notes = array_values($notes); // re index the array.
            file_put_contents("notes.txt", implode(PHP_EOL, $notes) . PHP_EOL);
            header("Location: index.php");
            exit;
        }
    }
?>

<!DOCTYPE html>
<html>

<head>
    <title>Notes App</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
<form action="save.php" method="POST">
    <input type="text" name="note" placeholder="Write a note..." required>
    <button type="submit">Add</button>
</form>
<hr>
<h2>All Notes</h2>
<ul>
<?php foreach ($notes as $id => $note) :?>
    <li><?php echo htmlspecialchars($note); ?>
    <a href="index.php?delete=<?php echo $id;?>"> Delete </a>
    </li>
<?php endforeach;?>
</ul>
</body>

</html>