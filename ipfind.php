<?php
$ip = $_SERVER["REMOTE_ADDR"];
$servername = "localhost";
$username = "root";
$password = "";
$db = "blocksys";
try{    
$conn = new mysqli($servername, $username, $password, $db);
}    
catch(mysqli_sql_exception){
$connecterr = [
        "response" => [    
            "error" => [
                "msg" => "Server is down",
                "code" => "500",
                "IP" => "$ip"
    ]
]    
];
header('Content-Type: application/json');
echo json_encode($connecterr);
exit;
}
 $stmt = $conn->prepare("SELECT * FROM ip WHERE ip = ?");
 $stmt->bind_param("s", $ip);
 $stmt->execute();
 $result = $stmt->get_result();
if($result->num_rows > 0){
$response = [
"response" => [    
    "error" => [
        "msg" => "You have been IP blocked by the webmaster or got blocked by the system",
        "code" => "403",
        "IP" => "$ip"
    ]
]    
];
    header('Content-Type: application/json');
    echo json_encode($response);
    $conn->close();
    exit;
};
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <img src="e treta.jpg" height="50px" width="50px"></img><H1>Test</H1>
</body>
</html>
