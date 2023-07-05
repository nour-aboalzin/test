<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>New Project</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="topnav">
  <a class="active" href="#home">Home</a>
  <a href="#news">News</a>
  <a href="#contact">Contact us</a>
  <a href="#about">About</a>
</div>
<!-- <div class="ti">
<br><form>
  <label for="fname">First name:</label><br>
  <input type="text" id="fname" name="fname"><br>
  <label for="lname">Last name:</label><br>
  <input type="text" id="lname" name="lname"><br>
  <label for="email">E-mail:</label><br>
  <input type="email" id="email" name="email"><br>
</form>
<label for="select issue">Select Issue:</label><br>
<select name="select issue" id="select issue">
  <option value="Query">Query</option>
  <option value="Feedback">Feedback</option>
  <option value="Complaint">Complaint</option>
  <option value="Other">Other</option>
</select>
<br><label for="comment">Your Comment:</label><br>
<textarea id="com" name="com" rows="5" cols="40">
</textarea><br>
</div>
<form method="POST" action="input.php">
      <input type="submit" value="Submit"/>
    </form> -->
<?php
// define variables and set to empty values
$nameErr = $nameErr = $emailErr = $genderErr = $websiteErr = "";
$name = $name = $email = $gender = $comment = $website = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "First Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters
    if (!preg_match("/^[a-zA-Z-']*$/",$name)) {
      $nameErr = "Only letters allowed";
    }
  }
  
  if (empty($_POST["lname"])) {
    $lnameErr = "Last Name is required";
  } else {
    $lname = test_input($_POST["lname"]);
    // check if name only contains letters
    if (!preg_match("/^[a-zA-Z-']*$/",$lname)) {
      $lnameErr = "Only letters allowed";
    }
  }

  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }
    
  if (empty($_POST["website"])) {
    $website = "";
  } else {
    $website = test_input($_POST["website"]);
    // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
    if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
      $websiteErr = "Invalid URL";
    }
  }

  if (empty($_POST["comment"])) {
    $comment = "";
  } else {
    $comment = test_input($_POST["comment"]);
  }

  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
<h2>Fill in your information below</h2>
<p><span class="error">* required field</span></p>
<form class="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  First Name: <input type="text" name="name" value="<?php echo $name;?>">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>
  Last Name: <input type="text" name="lname" value="<?php echo $lname;?>">
  <span class="error">* <?php echo $lnameErr;?></span>
  <br><br>
  E-mail: <input type="text" name="email" value="<?php echo $email;?>">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>
  Website: <input type="text" name="website" value="<?php echo $website;?>">
  <span class="error"><?php echo $websiteErr;?></span>
  <br><br>
  Comment: <textarea name="comment" rows="5" cols="40"><?php echo $comment;?></textarea>
  <br><br>
  Gender:
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="Female") echo "checked";?> value="Female">Female
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="Male") echo "checked";?> value="Male">Male
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="Other") echo "checked";?> value="Other">Other  
  <span class="error">* <?php echo $genderErr;?></span>
  <br><br>
  <input type="submit" name="submit" value="Submit">
  </form>
<?php
echo "<h2>Your Input:</h2>";
echo $name;
echo ' ';
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
</body>
</html>