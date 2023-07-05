<?php
// define variables and set to empty values
$nameErr = $nameErr = $emailErr = $genderErr = $websiteErr = "";
$name = $name = $email = $gender = $comment = $website = "";
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<?php
echo "<h2>Your Input:</h2>";
echo $name;
echo "<br>";
echo $lname;
echo "<br>";
echo $email;
echo "<br>";
echo $website;
echo "<br>";
echo $comment;
echo "<br>";
echo $gender;
?>