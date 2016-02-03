<?php
/**
 * Created by PhpStorm.
 * User: Do Son Tung
 * Date: 2/1/2016
 * Time: 5:18 PM
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Welcome to CBIR</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css">

    <!--    jQuery CDN-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>

    <!-- Compiled and minified JavaScript -->
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js"></script>
    <script>
        $(document).ready(function ($) {
            $(function () {

                $('.button-collapse').sideNav();

            });
        });

        $(document).ready(function() {
            $('select').material_select();
        });
    </script>
    <style type="text/css">

    </style>
</head>
<body>
<nav class="light-blue lighten-1" role="navigation">
    <div class="nav-wrapper container"><a id="logo-container" href="<?php echo base_url()?>" class="brand-logo">DURIO</a>
        <ul class="right hide-on-med-and-down">
            <li <?php if(isset($nav)){if($nav == "documentation") echo "class='active'";} ?>><a href="<?php echo base_url('UI/documentation');?>">Documentation</a></li>
            <li <?php if(isset($nav)){if($nav == "dataset") echo "class='active'";} ?>><a href="<?php echo base_url('UI/dataset');?>">Data Set</a></li>
        </ul>
        <ul id="nav-mobile" class="side-nav">
            <li <?php if(isset($nav)){if($nav == "documentation") echo "class='active'";} ?>><a href="<?php echo base_url('UI/documentation');?>">Documentation</a></li>
            <li <?php if(isset($nav)){if($nav == "dataset") echo "class='active'";} ?>><a href="<?php echo base_url('UI/dataset');?>">Data Set</a></li>
        </ul>
        <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
    </div>
</nav>
<!-- Main Content -->
<?php $this->load->view($content, isset($data) ? $data : NULL); ?>
</body>
</html>