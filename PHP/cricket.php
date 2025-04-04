<!DOCTYPE html>
<html>
<head>
  <title>Indian Cricket Players</title>
  <style>
    table {
      width: 20%; 
      margin: left; 
      border: 1px solid black;
      border-collapse: collapse;
      padding: 8px;
      background-color: lightpink;
    }
    th, td {
      border: 1px solid black;
      padding: 8px;
    }
  </style>
</head>
<body>
  <h2>Indian Cricket Players</h2>

  <?php
  $indianPlayers = array(
    "Virat Kohli", "Rohit Sharma", "Jasprit Bumrah",
    "Ravindra Jadeja", "KL Rahul", "Ajinkya Rahane",
    "Rishabh Pant", "Shikhar Dhawan", "Hardik Pandya",
    "Ravichandran Ashwin"
  );
  ?>

  <table>
    <tr>
      <th>Player Name</th>
    </tr>
    <?php
    foreach ($indianPlayers as $player) {
      echo "<tr><td>$player</td></tr>";
    }
    ?>
  </table>
</body>
</html>
