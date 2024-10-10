<?php
$loremIpsum = "Lorem ipsum dolor sit amet consectetur adipisicing elit.
Voluptatem reprehenderit, doloremque, dolore, voluptates quibusdam
consequuntur eum fugit quia accusantium laborum. Nemo, quibusdam.
quisquam? Quos impedit eum nulla optio.";

echo "<p>$loremIpsum</p>";
echo "Panjang karakter: " . strlen($loremIpsum) . "<br>";
echo "Panjang kata: " . str_word_count($loremIpsum) . "<br>";
echo "<p>" . strtoupper($loremIpsum) . "</p>";
echo "<p>" . strtolower($loremIpsum) . "</p>";

?>