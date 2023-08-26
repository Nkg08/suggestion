<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "suggestionform";

$connection = mysqli_connect($servername, $username, $password, $dbname);

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

error_reporting(E_ALL);
ini_set('display_errors', '1');


function uploadSupportingDocument($targetDir) {
    if (isset($_FILES["supporting_document"]) && !empty($_FILES["supporting_document"]["name"])) {
        $fileName = basename($_FILES["supporting_document"]["name"]);
        $targetFilePath = $targetDir . $fileName;
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

        if (move_uploaded_file($_FILES["supporting_document"]["tmp_name"], $targetFilePath)) {
            return $targetFilePath;
            echo "File uploaded successfully!";
        } else {
            return "Upload Failed";
        }
    } else {
        return "";
    }
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
 
    $area_equipment = $_POST['area_equipment'];
    $present_status = $_POST['present_status'];
    $suggested_solution = $_POST['suggested_solution'];
    $impact_options = isset($_POST['impact_options']) ? $_POST['impact_options'] : [];
    $impact_options_str = implode(", ", $impact_options);
    $any_other_improvement = $_POST['any_other_improvement'];
    $saving_status = $_POST['saving_status'];
    $suggestion_details = $_POST['suggestion_details'];
    $supporting_document = uploadSupportingDocument("");
    
    $sql = "INSERT INTO suggestion (
        area_equipment, 
        present_status, 
        suggested_solution, 
        
        impact_options,
        any_other_improvement, 
        saving_status, 
        suggestion_details,
        supporting_document
    ) VALUES (
        '$area_equipment', 
        '$present_status', 
        '$suggested_solution', 
        
        '$impact_options_str',
        '$any_other_improvement', 
        '$saving_status', 
        '$suggestion_details',
        '$supporting_document'
    )";
 if ($connection->query($sql) === TRUE) {
   
 } else {
     echo "Error: " . $sql . "<br>" . $connection->error;
 }


mysqli_close($connection);
}
?>  
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="/Suggestion/img/NTPC-Logo.png" type="image/title-icon">
    <title>Thank You!</title>
    <link href="https://fonts.googleapis.com/css?family=Kaushan+Script|Source+Sans+Pro" rel="stylesheet">
    <style>
        body {
            margin: 0;
            padding: 0;
            background-image: url("submit_bg.jpg");
            background-size: 100%;
            overflow: hidden;
        }

        .pyro>.before,
        .pyro>.after {
            position: absolute;
            width: 5px;
            height: 5px;
            border-radius: 50%;
            box-shadow: -120px -218.66667px blue, 248px -16.66667px #00ff84, 190px 16.33333px #002bff, -113px -308.66667px #ff009d, -109px -287.66667px #ffb300, -50px -313.66667px #ff006e, 226px -31.66667px #ff4000, 180px -351.66667px #ff00d0, -12px -338.66667px #00f6ff, 220px -388.66667px #99ff00, -69px -27.66667px #ff0400, -111px -339.66667px #6200ff, 155px -237.66667px #00ddff, -152px -380.66667px #00ffd0, -50px -37.66667px #00ffdd, -95px -175.66667px #a6ff00, -88px 10.33333px #0d00ff, 112px -309.66667px #005eff, 69px -415.66667px #ff00a6, 168px -100.66667px #ff004c, -244px 24.33333px #ff6600, 97px -325.66667px #ff0066, -211px -182.66667px #00ffa2, 236px -126.66667px #b700ff, 140px -196.66667px #9000ff, 125px -175.66667px #00bbff, 118px -381.66667px #ff002f, 144px -111.66667px #ffae00, 36px -78.66667px #f600ff, -63px -196.66667px #c800ff, -218px -227.66667px #d4ff00, -134px -377.66667px #ea00ff, -36px -412.66667px #ff00d4, 209px -106.66667px #00fff2, 91px -278.66667px #000dff, -22px -191.66667px #9dff00, 139px -392.66667px #a6ff00, 56px -2.66667px #0099ff, -156px -276.66667px #ea00ff, -163px -233.66667px #00fffb, -238px -346.66667px #00ff73, 62px -363.66667px #0088ff, 244px -170.66667px #0062ff, 224px -142.66667px #b300ff, 141px -208.66667px #9000ff, 211px -285.66667px #ff6600, 181px -128.66667px #1e00ff, 90px -123.66667px #c800ff, 189px 70.33333px #00ffc8, -18px -383.66667px #00ff33, 100px -6.66667px #ff008c;
            -moz-animation: 1s bang ease-out infinite backwards, 1s gravity ease-in infinite backwards, 5s position linear infinite backwards;
            -webkit-animation: 1s bang ease-out infinite backwards, 1s gravity ease-in infinite backwards, 5s position linear infinite backwards;
            -o-animation: 1s bang ease-out infinite backwards, 1s gravity ease-in infinite backwards, 5s position linear infinite backwards;
            -ms-animation: 1s bang ease-out infinite backwards, 1s gravity ease-in infinite backwards, 5s position linear infinite backwards;
            animation: 1s bang ease-out infinite backwards, 1s gravity ease-in infinite backwards, 5s position linear infinite backwards;
        }

        .pyro>.after {
            -moz-animation-delay: 1.25s, 1.25s, 1.25s;
            -webkit-animation-delay: 1.25s, 1.25s, 1.25s;
            -o-animation-delay: 1.25s, 1.25s, 1.25s;
            -ms-animation-delay: 1.25s, 1.25s, 1.25s;
            animation-delay: 1.25s, 1.25s, 1.25s;
            -moz-animation-duration: 1.25s, 1.25s, 6.25s;
            -webkit-animation-duration: 1.25s, 1.25s, 6.25s;
            -o-animation-duration: 1.25s, 1.25s, 6.25s;
            -ms-animation-duration: 1.25s, 1.25s, 6.25s;
            animation-duration: 1.25s, 1.25s, 6.25s;
        }

        @-webkit-keyframes bang {
            from {
                box-shadow: 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white;
            }
        }

        @-moz-keyframes bang {
            from {
                box-shadow: 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white;
            }
        }

        @-o-keyframes bang {
            from {
                box-shadow: 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white;
            }
        }

        @-ms-keyframes bang {
            from {
                box-shadow: 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white;
            }
        }

        @keyframes bang {
            from {
                box-shadow: 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white;
            }
        }

        @-webkit-keyframes gravity {
            to {
                transform: translateY(200px);
                -moz-transform: translateY(200px);
                -webkit-transform: translateY(200px);
                -o-transform: translateY(200px);
                -ms-transform: translateY(200px);
                opacity: 0;
            }
        }

        @-moz-keyframes gravity {
            to {
                transform: translateY(200px);
                -moz-transform: translateY(200px);
                -webkit-transform: translateY(200px);
                -o-transform: translateY(200px);
                -ms-transform: translateY(200px);
                opacity: 0;
            }
        }

        @-o-keyframes gravity {
            to {
                transform: translateY(200px);
                -moz-transform: translateY(200px);
                -webkit-transform: translateY(200px);
                -o-transform: translateY(200px);
                -ms-transform: translateY(200px);
                opacity: 0;
            }
        }

        @-ms-keyframes gravity {
            to {
                transform: translateY(200px);
                -moz-transform: translateY(200px);
                -webkit-transform: translateY(200px);
                -o-transform: translateY(200px);
                -ms-transform: translateY(200px);
                opacity: 0;
            }
        }

        @keyframes gravity {
            to {
                transform: translateY(200px);
                -moz-transform: translateY(200px);
                -webkit-transform: translateY(200px);
                -o-transform: translateY(200px);
                -ms-transform: translateY(200px);
                opacity: 0;
            }
        }

        @-webkit-keyframes position {

            0%,
            19.9% {
                margin-top: 10%;
                margin-left: 40%;
            }

            20%,
            39.9% {
                margin-top: 40%;
                margin-left: 30%;
            }

            40%,
            59.9% {
                margin-top: 20%;
                margin-left: 70%;
            }

            60%,
            79.9% {
                margin-top: 30%;
                margin-left: 20%;
            }

            80%,
            99.9% {
                margin-top: 30%;
                margin-left: 80%;
            }
        }

        @-moz-keyframes position {

            0%,
            19.9% {
                margin-top: 10%;
                margin-left: 40%;
            }

            20%,
            39.9% {
                margin-top: 40%;
                margin-left: 30%;
            }

            40%,
            59.9% {
                margin-top: 20%;
                margin-left: 70%;
            }

            60%,
            79.9% {
                margin-top: 30%;
                margin-left: 20%;
            }

            80%,
            99.9% {
                margin-top: 30%;
                margin-left: 80%;
            }
        }

        @-o-keyframes position {

            0%,
            19.9% {
                margin-top: 10%;
                margin-left: 40%;
            }

            20%,
            39.9% {
                margin-top: 40%;
                margin-left: 30%;
            }

            40%,
            59.9% {
                margin-top: 20%;
                margin-left: 70%;
            }

            60%,
            79.9% {
                margin-top: 30%;
                margin-left: 20%;
            }

            80%,
            99.9% {
                margin-top: 30%;
                margin-left: 80%;
            }
        }

        @-ms-keyframes position {

            0%,
            19.9% {
                margin-top: 10%;
                margin-left: 40%;
            }

            20%,
            39.9% {
                margin-top: 40%;
                margin-left: 30%;
            }

            40%,
            59.9% {
                margin-top: 20%;
                margin-left: 70%;
            }

            60%,
            79.9% {
                margin-top: 30%;
                margin-left: 20%;
            }

            80%,
            99.9% {
                margin-top: 30%;
                margin-left: 80%;
            }
        }

        @keyframes position {

            0%,
            19.9% {
                margin-top: 10%;
                margin-left: 40%;
            }

            20%,
            39.9% {
                margin-top: 40%;
                margin-left: 30%;
            }

            40%,
            59.9% {
                margin-top: 20%;
                margin-left: 70%;
            }

            60%,
            79.9% {
                margin-top: 30%;
                margin-left: 20%;
            }

            80%,
            99.9% {
                margin-top: 30%;
                margin-left: 80%;
            }
        }

        .hh1 h1 {
            color: chartreuse;
            text-align: center;
            font-size: 50px;
            margin-top: 100px;
        }

        .hh1 a {
            text-decoration: none;
            padding: 10px;
            color: red;
            background-color: white;
            border-radius: 20px;
            text-align: center;
        }
    
    
      *{
  box-sizing:border-box;
 
}
body{
  background-image: url("submit_bg.jpg"); 
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ffffff', endColorstr='#e1e8ed',GradientType=0 );
    height: 100%;
        margin: 0;
        background-repeat: no-repeat;
        background-attachment: fixed;
  
}

.wrapper-1{
  width:100%;
  
  display: flex;
flex-direction: column;
padding:175px;
}
.wrapper-2{
  padding :30px;
  text-align:center;
}
h1{
    font-family: 'Kaushan Script', cursive;
  font-size:4em;
  letter-spacing:3px;
  color:#5892FF ;
  margin:0;
  margin-bottom:20px;
}
.wrapper-2 p{
  margin:0;
  font-size:1.3em;
  color:#aaa;
  font-family: 'Source Sans Pro', sans-serif;
  letter-spacing:1px;
}
.go-home{
  color:#fff;
  background:#5892FF;
  border:none;
  padding:10px 50px;
  margin:30px 0;
  border-radius:30px;
  text-transform:capitalize;
  box-shadow: 0 0 12px 4px rgb(25, 80, 208);
  cursor: pointer;
}
.footer-like{
  margin-top: auto; 
  background:#D7E6FE;
  padding:6px;
  text-align:center;
}
.footer-like p{
  margin:0;
  padding:4px;
  color:#5892FF;
  font-family: 'Source Sans Pro', sans-serif;
  letter-spacing:1px;
}
.footer-like p a{
  text-decoration:none;
  color:#5892FF;
  font-weight:600;
}

@media (min-width:360px){
  h1{
    font-size:4.5em;
  }
  .go-home{
    margin-bottom:20px;
  }
}

@media (min-width:600px){
  
  .wrapper-1{
  height: initial;
 
  margin:-168px auto;
 
 
}
  
}
    </style>
</head>

<body>

   
    <div class="pyro">
        <div class="before"></div>
        <div class="after"></div>
    </div>
    <div class=content>
  <div class="wrapper-1" style="background-image: ">
    <div class="wrapper-2">
      <h1>Thank you ! <br> For Your Suggestion</h1>
      
      <a href="/Suggestion/index.html"><button class="go-home">
      go home
      </button></a>
    </div>
    
</div>
</div>






</body>

</html>