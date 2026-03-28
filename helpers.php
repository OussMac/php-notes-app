<?php

    function notes_printer(array $notes)
    {
        $lenght = count($notes);
        for ($i = 0; $i <$lenght; $i++)
        {
            echo $notes[$i] . "<br>";
        }
    }

    function debug_to_console($data) {
    $output = $data;
    if (is_array($output))
        $output = implode(',', $output);

    echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
}

?>