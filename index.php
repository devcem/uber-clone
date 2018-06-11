<?php
    include 'core.php';
?>
<!DOCTYPE html>
  <html>
    <head>
        <title>Uber - Clone</title>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

        <link rel="stylesheet" type="text/css" href="css/main.css?v=1.0">

        <script type="text/javascript" src="js/vue.js"></script>
        <script type="text/javascript" src="js/jquery.min.js"></script>
        <script type="text/javascript" src="js/materialize.min.js"></script>
    </head>
    <body>
        <div id="wrapper">
            <nav class="no-shadow">
                <div class="nav-wrapper grey lighten-4 app-header">
                    <span class="app-header-title">
                        <?php
                            if($request == 'dashboard' && @$_SESSION['user']['level'] == 0){
                        ?>
                        <div class="switch">
                            <label>
                                Off
                                <input v-model="status" type="checkbox">
                                <span class="lever"></span>
                                On
                            </label>
                        </div>
                        <?php
                            }else{
                                echo $page[$request];
                            }
                        ?>
                    </span>
                    <div style="display: none;" class="nav-content">
                        <a class="btn-floating btn-large halfway-fab waves-effect waves-light teal">
                            <i class="material-icons">add</i>
                        </a>
                    </div>
                </div>
            </nav>
            <div id="content" class="container">
                <?php
                    if(@$request && @$auth){
                        include 'views/'.$request.'.php';
                    }else{
                        include 'views/login.php';
                    }
                ?>
            </div>
        </div>

        <script type="text/javascript" src="js/main.js"></script>
    </body>
</html>