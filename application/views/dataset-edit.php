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
                <h3>Edit Data Set Information</h3>
            </div>
        </div>
        <form method="post">
            <div class="center">
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
                    <div class="col xs12 s5 right-align" style="padding-top: 10px;">
                        Data Set Name:
                    </div>
                    <div class="col xs12 s4 left-align">
                        <div class="input-field" style="margin-top: 0;">
                            <input name="datasetname" type="text" value="<?php echo $dataset[0]['dataset_name'] ?>">
                            <input name="datasetid" type="hidden" value="<?php echo $dataset[0]['id'] ?>">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="center" style="padding-top:5px;">
                        <button class="btn waves-effect waves-light teal darken-2" type="submit">Change<i
                                class="material-icons right">swap_vertical_circle</i>
                        </button>
                        <a href="<?php echo base_url('UI/datasetof') . '/' . $dataset[0]['id'] ?>"
                           class="btn waves-effect waves-light red darken-2">Discard<i
                                class="material-icons right">loop</i>
                        </a>

                        <!-- Modal Trigger -->
                        <a class="waves-effect waves-light btn modal-trigger green darken-2" href="#modal1">
                            Upload<i
                                class="material-icons right">navigation</i>
                        </a>


                    </div>
                </div>
            </div>
        </form>

    </div>
    <!-- Modal Structure -->
    <div id="modal1" class="modal">
        <div class="modal-content">
            <h4>UPLOAD</h4>
            <form action="<?php echo base_url('UI/uploads/'.$dataset[0]['id']) ?>"
                  class="dropzone"
                  id="upload-dropzone"
                  style="border: 1px solid #e5e5e5; min-height: 300px; "></form>
        </div>
        <div class="modal-footer">
            <a href="#!"
               class=" modal-action modal-close waves-effect waves-green btn-flat">Done</a>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
            $('.modal-trigger').leanModal();
        });
    </script>
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