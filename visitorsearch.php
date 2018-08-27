
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Jabil GBC access card record">
    <link rel="icon" href="jabil.png">

    <title>Jabil GBC access card record</title>

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
        <a class="navbar-brand" href="index.html">JABIL</a>
        </div>
        <hr style="height:35px">
      </header>

      <main role="main" class="inner cover">
        <?php
        error_reporting(E_ALL);
        ini_set('display_errors',1);

        $input = fopen('visitor.csv', 'r');  //open for reading
        while( false !== ( $data = fgetcsv($input) ) ){  //read each line as an array
           //modify data here
           if ($data[0] == $_POST['accesscard']) {
              $name = $data[1];
              $startingdate = $data[2];
              $endingdate = $data[3];
              $contact = $data[4];
           }

        }

        fclose( $input );
        //clean up
        ?>
        <div class="p-3 mb-2 bg-dark text-white">
        <h1 class="cover-heading">Search result for access card <?php echo $_POST['accesscard'];?></h1>
        <br>
        <div >
        <h3>Name: <?php echo $name; ?></h3>
        <h3>Starting date: <?php echo $startingdate;?></h3>        
        <h3>Ending date: <?php echo $endingdate; ?></h3>
        <h3>Local contact: <?php echo $contact; ?></h3>
      </div>
        </div>
        <div>
        <br>
        <a class="btn btn-primary" href="visitorsearch.html" role="button">Back</a>
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
 