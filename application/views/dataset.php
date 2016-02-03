<?php
/**
 * Created by PhpStorm.
 * User: Do Son Tung
 * Date: 2/1/2016
 * Time: 6:55 PM
 */
//echo $isSelected;
?>
<!--Data Set Section Body content-->
<div class="container" xmlns="http://www.w3.org/1999/html">
    <div class="row" style="margin-top: 50px;">
        <div class="col s4">
            <form action="datasetof" method="post">
                <div class="row">
                    <div class="col s3">
                        <p>Data Set:</p>
                    </div>
                    <div class="col s5">
                        <div class="input-field" style="margin-top: 0;">
                            <select name="dataset">
                                <?php if (!isset($isSelected)) echo '<option value="" disabled selected>Choose a dataset</option>' ?>
                                <?php for ($i = 0; $i < $total_instance; $i++) {
                                    echo '<option value="' . $all_data_set[$i]['id'] . '"';
                                    if (isset($isSelected) && $isSelected == $all_data_set[$i]['id']) {
                                        echo "selected";
                                    };
                                    echo '>' . $all_data_set[$i]['dataset_name'] . '</option>';
                                };?>
                            </select>
                        </div>
                    </div>
                    <div class="col s3" style="padding-top:5px;">
                        <button class="btn waves-effect waves-light light-blue lighten-1" type="submit">Choose<i
                                class="material-icons right">send</i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <?php if (isset($isSelected)) {
            echo '
                <div class="col s3" style="padding-top:5px;">
                    <a href="#" class="btn waves-effect waves-light red darken-3">EDIT</a>
                </div>';
        }?>
    </div>
    <!--    IMAGE DISPLAY AREA-->
    <div class="row">
        <?php if (isset($image_of_dataset) && isset($number_of_image)) {
            for ($j = 0; $j < $number_of_image; $j++) {
                echo '<div class="col xs12 m3"><img class="hoverable" src="' . $image_of_dataset[$j]['url'] . '" width="200px"
                 height="200px"></div>';

            };
        };?>
    </div>
    <!--    END OF IMAGE DISPLAY AREA-->
</div>
<!--End of Data Set Section Body content-->