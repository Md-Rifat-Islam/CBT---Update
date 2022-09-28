
<!DOCTYPE html>
<html>

<head>
  <title>Bell-212 CBT Leaderboard</title>
  <link rel="stylesheet" type="text/css" href="semantic/datatables/dataTables.semanticui.min.css">
  <link rel="stylesheet" type="text/css" href="semantic/semantic.min.css">
  <!-- Standard Meta -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

  <script src="js/jquery/jquery-3.3.1.js"></script>
    <script src="js/datatables/jquery.dataTables.min.js"></script>
  <script src="js/datatables/dataTables.semanticui.min.js"></script>

<script src="semantic/semantic.min.js"></script>


  <style>
  * {
    font-family: "Open Sans Regular";
    font-size: 1.01em;
  }

  .ui .button {
    font-family: "Open Sans Regular";

    font-size: 1.01em;
  }
  
  body {
    overflow: auto;
  }
  </style>

</head>

<body>


  <div class="ui top red pointing menu">

    <div class="ui container" style="padding-left: 70px;">
      <a href="index.html">
        <h2 class="ui header left aligned">
          <img src="images/bell-logo2.jpg"></img>
          <div class="content">
            Leaderboard
            <div class="sub header">Bell-212 Hel CBT</div>
          </div>
        </h2>
      </a>
      <!-- <p class="item" style="font-size: 1.20em;">Bell-212 Tutorial</p></p> -->

    </div>
  </div>


<?php

//...
// $conn = mysqli_connect("127.0.0.1", "root", "mysql", "cbt-db");
// if($conn){
//   echo "CONNECTION OK";

// }else{
//   echo "CONNECTION FAILED";
// }

#*************************************CONNECTING THE SERVER STARTS************************************
#Defining the database connection variables
$serverName="127.0.0.1";
$username="root";
$password="";
$dbName="cbt-db";

#Creating the Connection
try{
    $pdo=new PDO ("mysql:host=$serverName; port=3306 ;dbname=$dbName", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    echo "Succussfully connected to the database";
}catch (PDOException $exception){
    echo "Got this error in connection" . $exception->getMessage() . "\n"; 
}
#*************************************CONNECTING THE SERVER ENDS************************************
#include("connection.php");

// // Create connection
// // Check connection
// if ($conn->connect_error) {
// die("Connection failed: " . $conn->connect_error);
// }

?>

  <div class="ui container" style="width: 80%">
  <!-- <div class="ui grid"> -->



    <!-- <div class="stretched row" style="height: 100vh; padding-left: 15%; padding-right: 15%;"> -->

      <!-- <div class="column"> -->
        
        <!-- Printing the contents of the post array starts-->
        <?php
          //  echo "came here";
          $form1Class="active";$form2Class="";$form3Class="";$form4Class="";$form5Class="";$form6Class="";  
          $chosenModule="Engine";         
          if(isset($_POST["buttonChosen"])){
              $chosenModule=$_POST["buttonChosen"];
              // echo "The chosen module is :".$chosenModule;

              $form1Class="";$form2Class="";$form3Class="";$form4Class="";$form5Class="";$form6Class="";           
              
              if($chosenModule=="Engine"){
                $form1Class="active";
              }else if($chosenModule=="Airframe"){
                $form2Class="active";
              }else if($chosenModule=="Electrical Components"){
                $form3Class="active";
              }else if($chosenModule=="Instruments"){
                $form4Class="active";
              }else if($chosenModule=="Radio"){
                $form5Class="active";  
              }else if($chosenModule=="Arnaments"){
                $form6Class="active";  
              }
          }
        ?>
      
        <!-- Printing the contents of the post array ends-->

        <!--************************ Printing the navigation buttons in container starts************************ -->
        <div class="ui top attached tabular menu">
          <form  action="#" method="POST" enctype="multipart/form-data">
              <input id="form1" class=<?php echo '"item '.$form1Class.'"';?> data-tab="first" type="submit" name="buttonChosen" value="Engine">   
          </form>  

          <form  action="#" method="POST" enctype="multipart/form-data">
              <input id="form2" class=<?php echo '"item '.$form2Class.'"';?> data-tab="first" type="submit" name="buttonChosen" value="Airframe">   
          </form>          

          <form  action="#" method="POST" enctype="multipart/form-data">
              <input id="form3" class=<?php echo '"item '.$form3Class.'"';?> data-tab="first" type="submit" name="buttonChosen" value="Electrical Components">   
          </form>          

          <form  action="#" method="POST" enctype="multipart/form-data">
              <input id="form4" class=<?php echo '"item '.$form4Class.'"';?> data-tab="first" type="submit" name="buttonChosen" value="Instruments">   
          </form>       
      
          <form  action="#" method="POST" enctype="multipart/form-data">
              <input id="form5" class=<?php echo '"item '.$form5Class.'"';?> data-tab="first" type="submit" name="buttonChosen" value="Radio">   
          </form>       
      
          <form  action="#" method="POST" enctype="multipart/form-data">
              <input id="form6" class=<?php echo '"item '.$form6Class.'"';?> data-tab="first" type="submit" name="buttonChosen" value="Arnaments">   
          </form>      

       
        </div>
       
        <!-- <script>
          console.log("Script  executed");
        document.getElementById("form1").onclick=function(){
          
          if ( document.getElementById("form1").classList.contains('active') ){
          //if it is already active then 
            //do nothing with its UI
          }else{
          //otherwise some one else is active  
            //make this form active
            document.getElementById("form1").classList.add('active');                
            if(document.getElementById("form2").classList.contains('active') ){document.getElementById("form2").classList.remove('active');}
            if(document.getElementById("form3").classList.contains('active') ){document.getElementById("form3").classList.remove('active');}
            if(document.getElementById("form4").classList.contains('active') ){document.getElementById("form4").classList.remove('active');}
            if(document.getElementById("form5").classList.contains('active') ){document.getElementById("form5").classList.remove('active');}
            if(document.getElementById("form6").classList.contains('active') ){document.getElementById("form6").classList.remove('active');}
          }
          
          
        };
         

        </script> -->
        <!--************************ Printing the navigation buttons in container ends************************ -->


        
        <!-- ****************************THE CONTENTS FOR THE ENGINE BUTTON STARTS******************************** -->
        <div class="ui bottom attached tab segment active" data-tab="first">        
          <table id="table1" class="ui celled selectable table" style="width:100%; text-align: center; cursor: pointer;">
              
              <!-- Printing the table headers -->
              <thead>
                  <tr>
                      <th>Date/Time</th>
                      <th>BAF No.</th>
                      <th>Rank</th>
                      <th>Name</th>
                      <th>Score</th>
                      <th>Remarks</th>
                  </tr>
              </thead>
              <!-- Printing the table body -->
              <tbody>
                
                <?php
                if($chosenModule=="Engine"){
                  $sql = "SELECT * FROM leaderboard where trade_id=1";
                  $stmt= $pdo->prepare($sql);
                  $stmt->execute();
                  while($row = $stmt->fetch(PDO::FETCH_ASSOC)){                                                               
                        
                        echo "<tr>";
                        echo "<td>".$row["TIME"]."</td>";
                        echo "<td>".$row["BAF_NO"]."</td>";
                        echo "<td>".$row["RANK"]."</td>";
                        echo "<td>".$row["PERSON_NAME"]."</td>";

                        $cor = (int)$row["CORRCET_ANS_COUNT"];
                        $tot = (int)$row["TOTAL_QUESTION_COUNT"];

                        if ($tot != 0)
                          echo "<td>".round($cor/$tot*100,2)."%</td>";
                        else
                          echo "<td>0%</td>";
                        echo "<td>".$row["CORRCET_ANS_COUNT"]." correct out of ".$row["TOTAL_QUESTION_COUNT"]."</td>";
                        echo "</tr>";
                    }
                }else if($chosenModule=="Airframe"){
                  $sql = "SELECT * FROM leaderboard where trade_id=2";
                  $stmt= $pdo->prepare($sql);
                  $stmt->execute();
                  while($row = $stmt->fetch(PDO::FETCH_ASSOC)){                                                               
                        
                        echo "<tr>";
                        echo "<td>".$row["TIME"]."</td>";
                        echo "<td>".$row["BAF_NO"]."</td>";
                        echo "<td>".$row["RANK"]."</td>";
                        echo "<td>".$row["PERSON_NAME"]."</td>";

                        $cor = (int)$row["CORRCET_ANS_COUNT"];
                        $tot = (int)$row["TOTAL_QUESTION_COUNT"];

                        if ($tot != 0)
                          echo "<td>".round($cor/$tot*100,2)."%</td>";
                        else
                          echo "<td>0%</td>";
                        echo "<td>".$row["CORRCET_ANS_COUNT"]." correct out of ".$row["TOTAL_QUESTION_COUNT"]."</td>";
                        echo "</tr>";
                    }
                }else if($chosenModule=="Electrical Components"){
                  $sql = "SELECT * FROM leaderboard where trade_id=3";
                  $stmt= $pdo->prepare($sql);
                  $stmt->execute();
                  while($row = $stmt->fetch(PDO::FETCH_ASSOC)){                                                               
                        
                        echo "<tr>";
                        echo "<td>".$row["TIME"]."</td>";
                        echo "<td>".$row["BAF_NO"]."</td>";
                        echo "<td>".$row["RANK"]."</td>";
                        echo "<td>".$row["PERSON_NAME"]."</td>";

                        $cor = (int)$row["CORRCET_ANS_COUNT"];
                        $tot = (int)$row["TOTAL_QUESTION_COUNT"];

                        if ($tot != 0)
                          echo "<td>".round($cor/$tot*100,2)."%</td>";
                        else
                          echo "<td>0%</td>";
                        echo "<td>".$row["CORRCET_ANS_COUNT"]." correct out of ".$row["TOTAL_QUESTION_COUNT"]."</td>";
                        echo "</tr>";
                    }
                }else if($chosenModule=="Instruments"){
                  $sql = "SELECT * FROM leaderboard where trade_id=4";
                  $stmt= $pdo->prepare($sql);
                  $stmt->execute();
                  while($row = $stmt->fetch(PDO::FETCH_ASSOC)){                                                               
                        
                        echo "<tr>";
                        echo "<td>".$row["TIME"]."</td>";
                        echo "<td>".$row["BAF_NO"]."</td>";
                        echo "<td>".$row["RANK"]."</td>";
                        echo "<td>".$row["PERSON_NAME"]."</td>";

                        $cor = (int)$row["CORRCET_ANS_COUNT"];
                        $tot = (int)$row["TOTAL_QUESTION_COUNT"];

                        if ($tot != 0)
                          echo "<td>".round($cor/$tot*100,2)."%</td>";
                        else
                          echo "<td>0%</td>";
                        echo "<td>".$row["CORRCET_ANS_COUNT"]." correct out of ".$row["TOTAL_QUESTION_COUNT"]."</td>";
                        echo "</tr>";
                    }
                }else if($chosenModule=="Radio"){
                  $sql = "SELECT * FROM leaderboard where trade_id=5";
                  $stmt= $pdo->prepare($sql);
                  $stmt->execute();
                  while($row = $stmt->fetch(PDO::FETCH_ASSOC)){                                                               
                        
                        echo "<tr>";
                        echo "<td>".$row["TIME"]."</td>";
                        echo "<td>".$row["BAF_NO"]."</td>";
                        echo "<td>".$row["RANK"]."</td>";
                        echo "<td>".$row["PERSON_NAME"]."</td>";

                        $cor = (int)$row["CORRCET_ANS_COUNT"];
                        $tot = (int)$row["TOTAL_QUESTION_COUNT"];

                        if ($tot != 0)
                          echo "<td>".round($cor/$tot*100,2)."%</td>";
                        else
                          echo "<td>0%</td>";
                        echo "<td>".$row["CORRCET_ANS_COUNT"]." correct out of ".$row["TOTAL_QUESTION_COUNT"]."</td>";
                        echo "</tr>";
                    }
                }else if($chosenModule=="Arnaments"){
                  $sql = "SELECT * FROM leaderboard where trade_id=6";
                  $stmt= $pdo->prepare($sql);
                  $stmt->execute();
                  while($row = $stmt->fetch(PDO::FETCH_ASSOC)){                                                               
                        
                        echo "<tr>";
                        echo "<td>".$row["TIME"]."</td>";
                        echo "<td>".$row["BAF_NO"]."</td>";
                        echo "<td>".$row["RANK"]."</td>";
                        echo "<td>".$row["PERSON_NAME"]."</td>";

                        $cor = (int)$row["CORRCET_ANS_COUNT"];
                        $tot = (int)$row["TOTAL_QUESTION_COUNT"];

                        if ($tot != 0)
                          echo "<td>".round($cor/$tot*100,2)."%</td>";
                        else
                          echo "<td>0%</td>";
                        echo "<td>".$row["CORRCET_ANS_COUNT"]." correct out of ".$row["TOTAL_QUESTION_COUNT"]."</td>";
                        echo "</tr>";
                    }
                }                        
                ?>
              
              </tbody>
          </table>
        </div>
      <!-- ****************************THE CONTENTS FOR THE ENGINE BUTTON ENDS******************************** -->
      
      
        

        
    </table>
        </div>
        <div class="ui bottom attached tab segment" data-tab="sixth">
          <table id="table6" class="ui celled selectable table" style="width:100%; text-align: center; cursor: pointer;">
        <thead>
            <tr>
                <th>Date/Time</th>
                <th>BAF No.</th>
                <th>Rank</th>
                <th>Name</th>
                <th>Score</th>
                <th>Remarks</th>
            </tr>
        </thead>
        <tbody>
            <?php
          
          $sql = "SELECT * FROM leaderboard where trade_id=6";
          $result = $conn->query($sql);
          if ($result->num_rows > 0) {
          // output data of each row
          while($row = $result->fetch_assoc()){

              echo "<tr>";
              echo "<td>".$row["TIME"]."</td>";
              echo "<td>".$row["BAF_NO"]."</td>";
              echo "<td>".$row["RANK"]."</td>";
              echo "<td>".$row["PERSON_NAME"]."</td>";

              $cor = (int)$row["CORRCET_ANS_COUNT"];
              $tot = (int)$row["TOTAL_QUESTION_COUNT"];
              if ($tot != 0)
                echo "<td>".round($cor/$tot*100,2)."%</td>";
              else
                echo "<td>0%</td>";
              echo "<td>".$row["CORRCET_ANS_COUNT"]." correct out of ".$row["TOTAL_QUESTION_COUNT"]."</td>";
              echo "</tr>";
          }
        }
         

          ?>

        </tbody>
    </table>
        </div>

        

      <!-- </div> -->
      </div>
</div>


<!-- Table end -->
<!-- </div> -->


</body>

</html>