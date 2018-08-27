<!doctype html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="Jabil GBC access card record">
      <link rel="icon" href="jabil.png">
      <title>Jabil GBC SHOW SERIAL</title>
      <!-- Bootstrap core CSS -->
      <link href="css/bootstrap.min.css" rel="stylesheet">
      <!-- Custom styles for this template -->
      <link href="cover.css" rel="stylesheet">
      <style>
         .table{
            max-width:70em;
            margin: auto;
         }
      </style>
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
            <h1 class="cover-heading">Current visitor list</h1>
            <br>
            <table class = "table table-bordered">
               <tbody>
                  <?php
                     $host        = "host = 127.0.0.1";
                     $port        = "port = 5432";
                     $dbname      = "dbname = postgres";
                     $credentials = "user = postgres password=quahchiinluen";
                     $valid = false;
                     
                     $db = pg_connect( "$host $port $dbname $credentials"  );
                     if(!$db) {
                        echo "Error : Unable to open database\n";
                     } 
                     $sql =<<<EOF
                        SELECT * from visitordb order by no;
EOF;
                     
                     $ret = pg_query($db, $sql);
                     if(!$ret) {
                        echo pg_last_error($db);
                        exit;
                     } 
                     while($data = pg_fetch_row($ret)){  //read each line as an array
                      	if (!is_null($data[2])){ 
                      	 $valid = true;
	                     echo "<tr>";
	                         echo "<td >$data[1] </td>";
	                         echo "<td >$data[2] </td>";
	                     echo "</tr>";
                     }
                     }
                     pg_close($db);
                     ?>
               </tbody>
               </thead>
            </table>
            <?php if(!$valid){ ?>
            <h2 class="cover-heading">**There are currently no serial stored in record! Please input and try again.**</h2>
            <?php }?>     
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