<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submission Result</title>
    <link rel="shortcut icon" href="./logo.png" type="image/x-icon">
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #a690f8, #f38a8a, hsl(110, 85%, 65%));;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .result-container {
            background: #d0ece7;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            text-align: center;
        }

        h2 {
            color: #fd5000;
        }

        p {
            color: #555;
            margin: 10px 0;
            font-size: 1.1em;
        }

        .highlight {
            font-weight: bold;
            color: #333;
        }

        .back-button {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background: linear-gradient(135deg, #a690f8, #f38a8a, hsl(110, 85%, 65%));
            color: black;
            text-decoration: none;
            font-weight: bold;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .back-button:hover {
            background: linear-gradient(45deg, #ff758c, #ff7eb3);
            transform: scale(1.05);
        }
    </style>
</head>
<body>
    <div class="result-container">
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = htmlspecialchars($_POST['name']);
            $email = htmlspecialchars($_POST['email']);
            $phone = htmlspecialchars($_POST['phone']);
            $message = htmlspecialchars($_POST['message']);

            echo "<h2>Registration Successful!</h2>";
            echo "<p><span class='highlight'>Name:</span> $name</p>";
            echo "<p><span class='highlight'>Email:</span> $email</p>";
            echo "<p><span class='highlight'>Phone:</span> $phone</p>";
            echo "<p><span class='highlight'>Message:</span> $message</p>";

            $file = fopen("submissions.txt", "a");
            if ($file) {
                $entry = "Name: $name, Email: $email, Phone: $phone, Message: $message" . PHP_EOL;
                fwrite($file, $entry);
                fclose($file);
            } else {
                echo "<p>Unable to save data to the text file.</p>";
            }

            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "form_data";

            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "INSERT INTO submissions (name, email, phone, message) 
                    VALUES ('$name', '$email', '$phone', '$message')";

            if ($conn->query($sql) === TRUE) {
                echo "<p>Data saved to the database successfully!</p>";
            } else {
                echo "<p>Error: " . $sql . "<br>" . $conn->error . "</p>";
            }

            $conn->close();
        }
        ?>
        <a href="index.html" class="back-button">Back to Form</a>
    </div>
</body>
</html>
