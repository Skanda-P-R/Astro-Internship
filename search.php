<html>
<head>
  <title>Astrology Clients' Data</title>
  <style>
    body {
      margin: 0;
      font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
      background-color: #eae5e5;
    }

    .center-container {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .box {
      background-color: #e3f2fd;
      border-radius: 25px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      padding: 40px;
      width: 80%; 
      max-width: 600px; 
    }

    .box h2 {
      font-size: 1.5rem;
      color: #333;
      margin-bottom: 20px;
    }

    .box label {
	  font-size: 1.0rem
      display: block;
      margin-bottom: 8px;
      color: #333;
    }

    .box input {
	  background-color: #f3fffff;
      width: 100%;
      padding: 10px;
      margin-bottom: 20px;
      border: 1px solid #ccc;
      border-radius: 15px;
    }

    .box button {
      background-color: #006db5;
	  width: 150;
      color: #fff;
      border: 0;
      padding: 12px 20px;
      border-radius: 15px;
      cursor: pointer;
    }
	
	.cen {
      display: flex;
      justify-content: center;
      align-items: center;
	  border-radius: 15px;	  
	}

    .box button:hover {
      background-color: #00154d;
    }
	
	table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
    }

    th, td {
      border: 2px solid #545454;
      padding: 8px;
      text-align: left;
    }

    th {
      background-color: white;
    }
  </style>
</head>
<body>
<div class="center-container">
    <div class="box">
      <h2><?php
$servername = "localhost";
$username = "*****";
$password = "*****";
$dbname = "astrology";
$name = $_POST["name"];
$dob = $_POST["dob"];
$tob = $_POST["tob"];
$pob = $_POST["pob"];

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


$conditions = array();

if (!empty($name)) {
    $conditions[] = "Name LIKE '$name%'";
}

if (!empty($dob)) {
    $conditions[] = "dob LIKE '$dob'";
}

if (!empty($tob)) {
    $conditions[] = "tob LIKE '$tob'";
}

if (!empty($pob)) {
    $conditions[] = "pob LIKE '$pob'";
}

$query = "SELECT * FROM tb";


if (!empty($conditions)) {
    $query .= " WHERE " . implode(" OR ", $conditions);
}

$result = $conn->query($query);

if ($result->num_rows > 0) {
    echo "<div class='cen'>";
    echo "<table><tr><th>Name</th><th>Date of Birth</th><th>Time of Birth</th><th>Place of Birth</th></tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>{$row['Name']}</td><td>{$row['dob']}</td><td>{$row['tob']}</td><td>{$row['pob']}</td></tr>";
    }

    echo "</table>";
    echo "</div>";
} else {
    echo "<div class='cen'>";
    echo "No results found for the specified conditions<br>";
    echo "</div>";
}

$conn->close();
?></h2>
	  <div class="cen">
      <form action="Astro.html" method="post">
	  <button type="submit">Go Back</button>
      </div>
	  </form>
	</div>
  </div>
</body>
</html>
