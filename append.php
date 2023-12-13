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
	}

    .box button:hover {
      background-color: #00154d;
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

$sql = "INSERT INTO tb
VALUES ('$name', '$dob', '$tob', '$pob')";

if (mysqli_query($conn, $sql)) {
  echo "Record added to Database.";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
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
