<?php
 $ip = $_SERVER["REMOTE_ADDR"];
 $servername = "localhost";
 $username = "root";
 $password = "";
 $db = "blocksys";
 
 try{
 $conn = new mysqli($servername, $username, $password, $db);
 } catch(mysqli_sql_exception){
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
 if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
 };
 $stmt_ip = $conn->prepare("SELECT * FROM ip WHERE ip = ?");
 $stmt_ip->bind_param("s", $ip);
 $stmt_ip->execute();
 $result_ip = $stmt_ip->get_result();
 
 if($result_ip->num_rows > 0){

  $blockerr = [
    "response" => [    
        "error" => [
            "msg" => "Your IP is already blocked!",
            "code" => "400",
            "IP" => "$ip"
]
]    
];
header('Content-Type: application/json');
echo json_encode($blockerr);
$conn->close();
exit;

  } else{

    $stmt2 = $conn->prepare("INSERT INTO ip (ip) VALUES (?)");
    $stmt2->bind_param("s", $ip);
    $stmt2->execute();
if ($stmt2->execute()) {
  $block = [
    "response" => [    
            "msg" => "Your IP has been blocked.",
            "code" => "200",
            "IP" => "$ip"
]
];    
header('Content-Type: application/json');
echo json_encode($block);
$conn->close();
exit;
  } else {
    $blockfail = [
      "response" => [    
          "error" => [
              "msg" => "Failed to block IP!",
              "code" => "503",
              "IP" => "$ip"
  ]
  ]    
  ];
  header('Content-Type: application/json');
  echo json_encode($blockfail);
  $conn->close();
  exit;
  }
};

$conn->close();
?>