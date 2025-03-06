<?php

if ($_SERVER['REQUEST_URI'] == '/html') {
    echo '<div><b>HTML content here</b></div>';

} elseif ($_SERVER['REQUEST_URI'] == '/json') {
    echo '<div><b>JSON content here</b></div>';
}

?>
