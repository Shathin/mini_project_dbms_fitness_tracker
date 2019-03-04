<!doctype html>
<html>
    <?php
    $servername = "localhost";
                $username = "root";
                $password = "";
                $db = "fitness";
                // Create connection
                $conn = new mysqli($servername, $username, $password, $db);
                //session_start();
    //$u=$_SESSION["user"];
    ?>
<title>Welcome</title>
    <head>
        <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel = "stylesheet" href = "login.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script>
  <script>
  $( function() {
    $( ".datepicker" ).datepicker();
  } );
  </script>
        <link rel="stylesheet" href="post_login.css">
        <style>
            .graph{
            padding-left: 1%;
            width: 90%;
            height: 700%;
        }
        .content{
            background-image: none;
            height: 100%;
        }
            
        </style>
    </head>
    <?php
        $servername = "localhost";
                                $username = "root";
                                $password = "";
                                $db = "fitness";
                                // Create connection
                                $conn = new mysqli($servername, $username, $password, $db);
                                // Check connection
                                    session_start();
                                $u=$_SESSION["user"];
                                $sql = "select user_id from user where user_name = '$u'";
                                $result = $conn->query($sql);
                                if ($result->num_rows > 0) {
                                    while($row = $result->fetch_assoc()) {
                                        $uid=$row['user_id'];
                                    }
                                   
                                        }
                                $sql = "select c_date from CALORIES_BURNT_GRAPH where user_id='$uid'";
                                $result = $conn->query($sql);
                                if ($result->num_rows > 0) {
                              
                                // output data of each row
                                    while($row = $result->fetch_assoc()) {
                                       $array[] = explode(", ", $row['c_date']);
                                    }
                                }
                                $sql = "select total_burnt_calories from CALORIES_BURNT_GRAPH where user_id='$uid'";
                                $result = $conn->query($sql);
  
                                if ($result->num_rows > 0) {
                                // output data of each row
                                    while($row = $result->fetch_array(MYSQLI_NUM)) {
                                       //$a1[$x] = $row[$x++];
                                        $array1[] = $row[0];
                                    }
                                }
       //$array=array("day 1","day 2","day 3","day 4","day 5","day 6");
        //$array1=array(40,45,50,55,60,30);

//    $arrlength = count($array);
//    $array1 = array();
//    foreach($array as $x) {
//    echo $x;
//}
    ?>
    <body>
        <div class="top">
            <span><a href="food_tracker_fitness.php"><h1>Fitness.<i>com</i></h1></a></span><div class="tab">
                
   <button class="tablinks"><a href="<?php echo 'food_tracker_fitness.php"?'.SID;?> ">Food Tracker</a></button>
  <button class="tablinks"><a href="<?php echo 'exercise_tracker_fitness.php?'.SID;?>" >Exercise Tracker</a></button>
  <button class="tablinks"><a href="<?php echo 'body_tracker_fitness.php?'.SID;?>">Body Tracker</a></button>
  <button class="tablinks"><a href="<?php echo 'analysis_fitness.php?'.SID;?>" >Analysis</a></button>
  <button class="tablinks"  onclick="openContent(event, 'foodlog')" id="openDefault">Workout Log</button>
  <button class="tablinks"><a href="<?php echo 'food_log_fitness.php?'.SID;?>">Food Log</a></button>
  <button class="tablinks"><a href="<?php echo 'profile_fitness.php?'.SID;?>" >Profile</a></button>
</div>
<div id="foodlog" class="tabcontent tabcontent-workoutlogcontent">
     <table>
         <tr><td class="reducewidth">
             <form action="workout_log_fitness.php" method="post">
        <table class="fix">
            <tr>
                <td>
                    <div class="minibox first opacity col1" >
                        
                    </div>
                    </td>
            </tr>
          </table>
             </form>
             </td>
    
                <td><table class="fix">
            <tr>
                <td><div class="minibox first opacity col2" >
                   <div class="scroll"> <div class="graph">
                <canvas id="myChart"></canvas>
                       </div></div>
                    </div>
                    </td>
            </tr>
          </table></td></tr></table>
    
                
    <script>
    let myChart = document.getElementById('myChart').getContext('2d');

    // Global Options
    Chart.defaults.global.defaultFontFamily = 'Lato';
    Chart.defaults.global.defaultFontSize = 12;
    Chart.defaults.global.defaultFontColor = '#777';
      var array = <?php echo json_encode($array); ?>;
      var array1 = <?php echo json_encode($array1); ?>;
    let massPopChart = new Chart(myChart, {
      type:'line', // bar, horizontalBar, pie, line, doughnut, radar, polarArea
      data:{
        labels:array,
        datasets:[{
          label:'Weight',
          data:array1,
          //backgroundColor:'green',
          backgroundColor:[
            'rgba(255, 99, 132, 0.6)',//background
            'rgba(54, 162, 235, 0.6)',
            'rgba(255, 206, 86, 0.6)',
            'rgba(75, 192, 192, 0.6)',
            'rgba(153, 102, 255, 0.6)',
            'rgba(255, 159, 64, 0.6)',
            'rgba(255, 99, 132, 0.6)'
          ],
          borderWidth:1,
          borderColor:'#777',
          hoverBorderWidth:3,
          hoverBorderColor:'#000'
        }]
      },
      options:{
        title:{
          display:true,
          text:'Calorie Graph',
          fontSize:25
        },
        legend:{
          display:true,
          position:'right',
          labels:{
            fontColor:'#000'
          }
        },
        layout:{
          padding:{
            left:50,
            right:0,
            bottom:0,
            top:0
          }
        },
        tooltips:{
          enabled:true
        }
      }
    });
  </script>
      
</div>
        </div>
        <div class="top">
            <table>
                <tr>
                     <th><h4><a href="contactus.html">Contact Us</a></h4></th>
                    <th><h4><a href="aboutus.html">About Us</a></h4></th>
                </tr>
            </table>
        </div>
    </body>
<script>
    document.getElementById("openDefault").click();
    function openContent(evt, contentName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(contentName).style.display = "block";
    evt.currentTarget.className += " active";
}
</script>
</html>