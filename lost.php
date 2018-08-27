<!doctype html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="Jabil GBC access card record">
      <link rel="icon" href="jabil.png">
      <title>Jabil GBC CARD LOST</title>
      <!-- Bootstrap core CSS -->
      <link href="css/bootstrap.min.css" rel="stylesheet">
      <!-- Custom styles for this template -->
      <link href="cover.css" rel="stylesheet">
   </head>
   <body class="text-center">
      <div class="cover-container d-flex w-100 h-100 p-2 mx-auto flex-column">
         <header class="masthead mb-auto">
            <div class="inner">
               <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
               <a class="navbar-brand font-weight-bold"" href="index.html">JABIL</a>
            </div>
            <hr style="height:35px">
         </header>
         <main role="main" class="inner cover">
            <?php
               error_reporting(E_ALL);
               ini_set('display_errors',1);
               $host        = "host = 127.0.0.1";
               $port        = "port = 5432";
               $dbname      = "dbname = postgres";
               $credentials = "user = postgres password=quahchiinluen";
               $valid = false;
               $lostdate = $_POST['lostdate'];
               
               $db = pg_connect( "$host $port $dbname $credentials"  );
               if(!$db) {
                 echo "Error : Unable to open database\n";
               } 
               
               $sql =<<<EOF
               insert into lostdb(name, employee_id, accesscardnumber, status)
               select name, employee_id, accesscardnumber, status from employeedb where employee_id = '$_POST[id]';
               update lostdb set lostdate = '$lostdate' where employee_id = '$_POST[id]' AND lostdate is null;
               update employeedb 
               set accesscardnumber = '$_POST[newaccesscard]'
               where employee_id = '$_POST[id]';
EOF;
               $ret = pg_query($db, $sql);
               if(!$ret) {
                 echo pg_last_error($db);
               } else {
                 $valid = true;
               }
               pg_close($db);
               
               ?>
            <?php if($valid){ ?>
            <h1 class="cover-heading">Your change request is success!</h1>
            <?php } ?>
            <?php if(!$valid){ ?>
            <h1 class="cover-heading">Input invalid! Please try again</h1>
            <?php }?>
            <div>
               <br>
               <a class="btn btn-primary" href="lost.html" role="button">Back</a>
            </div>
         </main>
         <footer class="mastfoot mt-auto">
         </footer>
      </div>
      <!-- Bootstrap core JavaScript
         ================================================== -->
      <!-- Placed at the end of the document so the pages load faster -->
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
      <script src="js/bootstrap.min.js"></script>
   </body>
</html>