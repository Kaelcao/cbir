<?php
/**
 * Created by PhpStorm.
 * User: Do Son Tung
 * Date: 2/3/2016
 * Time: 6:15 PM
 */
?>

<div class="container">
    <div class="row">
        <div class="center">
            <h3>Add new dataset</h3>
        </div>
    </div>
    <form method="post">
        <div class="center">
            <div class="row">
                <div class="row">
                    <?php
                    if (isset($status)) {
                        if ($status == 1) {
                            $class = 'teal';
                        } else {
                            $class = 'red lighten-1';
                        }
                        ?>
                        <div class="col s12">
                            <div class="card-panel <?php echo $class ?>">
          <span class="white-text"><?php echo $message ?>
          </span>
                            </div>
                        </div>
                        <?php
                    }
                    ?>

                </div>
                <div class="col xs12 s5 right-align" style="padding-top: 10px;">
                    Data Set Name:
                </div>

                <div class="col xs12 s4 left-align">
                    <div class="input-field" style="margin-top: 0;">
                        <input name="datasetname" type="text" value="">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="center" style="padding-top:5px;">
                    <button name="submit" class="btn waves-effect waves-light teal darken-2" type="submit">Submit<i
                            class="material-icons right">swap_vertical_circle</i>
                    </button>
                    <button type="reset" href="" class="btn waves-effect waves-light red darken-2">Reset<i
                            class="material-icons right">loop</i>
                    </button>
                </div>
            </div>
        </div>
    </form>
    <?php
    if (isset($status) && $status == 1) {
        ?>
        <script>
            window.setTimeout(function () {
                window.location = "<?php echo base_url('UI/dataset') ?>";
            }, 1000);
        </script>
        <?php
    }
    ?>

