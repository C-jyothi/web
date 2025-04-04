<?php
// Define variables and set to empty values
$name = $email = $password = $confirm_password = "";
$nameErr = $emailErr = $passwordErr = $confirmPasswordErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $isValid = true;

  // Name validation
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
    $isValid = false;
  } else {
    $name = htmlspecialchars(trim($_POST["name"]));
  }

  // Email validation
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
    $isValid = false;
  } elseif (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
    $emailErr = "Invalid email format";
    $isValid = false;
  } else {
    $email = htmlspecialchars(trim($_POST["email"]));
  }

  // Password validation
  if (empty($_POST["password"])) {
    $passwordErr = "Password is required";
    $isValid = false;
  } elseif (strlen($_POST["password"]) < 6) {
    $passwordErr = "Password must be at least 6 characters";
    $isValid = false;
  } else {
    $password = $_POST["password"];
  }

  // Confirm Password validation
  if (empty($_POST["confirm_password"])) {
    $confirmPasswordErr = "Please confirm your password";
    $isValid = false;
  } elseif ($_POST["confirm_password"] !== $_POST["password"]) {
    $confirmPasswordErr = "Passwords do not match";
    $isValid = false;
  } else {
    $confirm_password = $_POST["confirm_password"];
  }

  // If all validations pass
  if ($isValid) {
    echo "<h3>Registration Successful!</h3>";
    echo "<p><strong>Name:</strong> $name</p>";
    echo "<p><strong>Email:</strong> $email</p>";
    // Password would usually be hashed & stored securely in a DB
  }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Registration Form</title>
  <style>
    .error { color: red; }
    form {
      width: 300px;
      padding: 20px;
      border: 1px solid #ccc;
      margin: auto;
      margin-top: 50px;
      font-family: Arial;
    }
    input[type=text], input[type=password], input[type=email] {
      width: 100%;
      padding: 8px;
      margin: 5px 0 15px;
    }
    input[type=submit] {
      padding: 10px;
      width: 100%;
      background-color: #4CAF50;
      color: white;
      border: none;
    }
    h2 { text-align: center; }
  </style>
</head>
<body>

<h2>User Registration</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
  Name:
  <input type="text" name="name" value="<?php echo $name; ?>">
  <span class="error"><?php echo $nameErr; ?></span>

  Email:
  <input type="email" name="email" value="<?php echo $email; ?>">
  <span class="error"><?php echo $emailErr; ?></span>

  Password:
  <input type="password" name="password">
  <span class="error"><?php echo $passwordErr; ?></span>

  Confirm Password:
  <input type="password" name="confirm_password">
  <span class="error"><?php echo $confirmPasswordErr; ?></span>

  <input type="submit" value="Register">
</form>

</body>
</html>
