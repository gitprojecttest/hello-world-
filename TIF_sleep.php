<?php

include 'TIF_form.php';

$connection = mysqli_connect("127.0.0.1", "root", "", "tif");

$insertSleepQuery = "INSERT INTO sleep (sleep_hours) VALUES(?);";
$stmt = mysqli_prepare($connection, $insertSleepQuery);
mysqli_stmt_bind_param($stmt, 's', $sleep);
mysqli_stmt_execute($stmt);
$insertSleepResults = mysqli_stmt_affected_rows($stmt);
mysqli_stmt_close($stmt);

$sleep = $_POST["Sleep_hours"];

if ($sleep == "0 hours" || $sleep == "1-3 hours"){
  echo "You are suffering from lack of sleep. A lack of sleep can lower your stress threshold and decrease your ability to stay optimistic. This can leave you feeling unable to cope with things and unable to see anything positive.";
} elseif ($sleep == "3-6 hours"){
  echo "You are probably tired. This can affect your memory and concentration, making you more prone to stress.";
} elseif ($sleep == "6-8 hours"){
  echo "You are sleeping ok, but there may be other things affecting your mood.";
} elseif ($sleep == "8+ hours") {
  echo "Awesome! You are well-rested! Let's look at other things that might be making you feel emotionally wobbly.";
}

echo "<br>";

$sleep_help = "http://www.nhs.uk/Livewell/insomnia/Pages/insomniatips.aspx";

function insomnia($sleep, $sleep_help) {
  if ($sleep == "0 hours" || $sleep == "1-3 hours"){
  echo "For help with insomnia, check out $sleep_help.";
}  }

insomnia($sleep, $sleep_help);
