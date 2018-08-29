<!doctype html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="Jabil GBC access card record">
      <link rel="icon" href="jabil.png">
      <title>Jabil GBC INSERTING VISITORS</title>
      <!-- Bootstrap core CSS -->
      <link href="css/bootstrap.min.css" rel="stylesheet">
      <!-- Custom styles for this template -->
      <link href="cover.css" rel="stylesheet">
   </head>
   <body class="text-center">
      <div class="cover-container d-flex w-100 h-100 p-2 mx-auto flex-column">
         <header class="masthead mb-auto">
            <div class="inner">
               <nav class="navbar navbar-expand-lg navbar-dark fixed-top bg-dark">
               <a class="navbar-brand font-weight-bold"" href="index.html">JABIL</a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample05" aria-controls="navbarsExample05" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>

              <div class="collapse navbar-collapse" id="navbarsExample05">
                <ul class="navbar-nav mr-auto">
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle"  id="dropdown05" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Records</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown05">
                      <a class="dropdown-item" href="parkingwinners.php">Parking Winners</a>
                      <a class="dropdown-item" href="displayvisitors.php">Visitors</a>
                      <a class="dropdown-item" href="specialN.php">Special Need</a> 
                    </div>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle"  id="dropdown05" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Employee settings</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown05">
                      <a class="dropdown-item" href="resetdraw.html">Reset status</a>
                      <a class="dropdown-item" href="changestatus.html">Change status</a>
                    </div>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle"  id="dropdown05" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Visitor settings</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown05">
                      <a class="dropdown-item" href="assignserial.html">Assign Serial</a>
                      <a class="dropdown-item" href="showserial.php">Show Serial</a>
                    </div>
                  </li>

                </ul>
                <form class="form-inline my-2 my-md-0" action="employeesearch.php" method="POST">
                     <input type="number" class="form-control" name="id" id="inputID" placeholder="Employee Search by ID">
                </form>
              </div>
            </nav>
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
               $name=$_POST['name'];
               $company=$_POST['company'];
               $sdate=$_POST['sdate'];
               $edate=$_POST['edate'];
               $contactname=$_POST['contactname'];
               $hostcontact=$_POST['hostcontact'];
               $accesscard=$_POST['accesscard'];
               
               $db = pg_connect( "$host $port $dbname $credentials"  );
               if(!$db) {
                 echo "Error : Unable to open database\n";
               } 
               
               $sql =<<<EOF
               
               update visitordb 
               set visitor_name = '$name',
               visitor_company = '$company',
               startingdate = '$sdate',
               endingdate = '$edate',
               hostname = '$contactname',
               hostcontact = '$hostcontact'
               
               where accesscard = '$accesscard';
               
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
            <h1 class="cover-heading">Your storing request is success!</h1>
            <?php } ?>
            <?php if(!$valid){ ?>
            <h1 class="cover-heading">Input invalid! Please try again</h1>
            <?php }?>       
            <div>
               <br>
               <a class="btn btn-primary" href="visitorinsert.html" role="button">Back</a>
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