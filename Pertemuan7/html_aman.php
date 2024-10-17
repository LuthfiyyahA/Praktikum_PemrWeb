<?php
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $input = $_POST['input'];
$input = htmlspecialchars($input, ENT_QUOTES, 'UTF-8');
}
?>