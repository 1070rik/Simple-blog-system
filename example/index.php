<html>
    <head>
        <title>Blog</title>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <script src="https://code.jquery.com/jquery-2.2.3.js"   integrity="sha256-laXWtGydpwqJ8JA+X9x2miwmaiKhn8tVmOVEigRNtP4="   crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
        <script>
            document.addEventListener('keydown', function(event) {
                if(event.keyCode == 18) {
                    if (window.confirm('Are you sure about this??'))
                        {
                            window.location.href = 'admin/';
                        }
                        else
                        {
                            // Do nothing :D
                        }
                }
            });
        </script>
    </head>
    <body>
        <nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Blog</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home <span class="sr-only">(current)</span></a></li>
      </ul>
      <form class="navbar-form navbar-left" role="search">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
        <?php
            
            // Load Slim
            require '../Slim/Slim.php';
            // Get a Slim instance
            \Slim\Slim::registerAutoloader();
            $app = new \Slim\Slim();
            $app = \Slim\Slim::getInstance();
            
            //App URLs (end points) and Function references
            $app->get('/', 'posts');  //Gets all docenten posts
            $app->get('/posts/search/:id', 'search_post'); //Search for specific leerlingen post by using the ID 
            
            
            
            //Make things happen
            $app->run();
             
            
            /****    The Functions    ****/ 
            function posts() {
                $sql = "SELECT * FROM posts";
                try {
                    $db = getConnection();
                    $stmt = $db->query($sql);
                    $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    $db = null;
                    foreach ($posts as $row) {
                        echo '
                        <div class="container">
                            <div style="margin:0 auto; width:70%; border-radius:20px;" class="jumbotron">
                              <h1 style="padding-left:10px;">'.$row['title'].'</h1>
                              <p style="white-space: nowrap; overflow: hidden; padding-left:10px; text-overflow: ellipsis; max-width: 400px;">'.$row['text'].'</p>
                              <p style="padding-left:10px;"><a class="btn btn-primary btn-lg" href="posts/search/'.$row['id'].'" role="button">Read more</a></p>
                            </div>
                        </div><br>';
                    }
                } catch(PDOException $e) {
                    echo '{"error":{"text":'. $e->getMessage() .'}}';
                }
            }
             
            function search_post($id) {
                $sql = "SELECT * FROM posts WHERE id = '$id'";
                try {
                    $db = getConnection();
                    $stmt = $db->prepare($sql);
                    $stmt->bindParam("id", $id);
                    $stmt->execute();
                    $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    $db = null;
                    echo json_encode($posts);
                } catch(PDOException $e) {
                    echo '{"error":{"text":'. $e->getMessage() .'}}';
                }
            }
            
            //MySQL Connection - PDO
            function getConnection() {
                $dbhost="localhost";
                $dbuser="a1070rik";
                $dbpass="";
                $dbname="blog";
                $dbh = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
                $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return $dbh;
            }
             
        ?>
    </body>
</html>