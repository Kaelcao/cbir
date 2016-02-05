<?php
/**
 * Created by PhpStorm.
 * User: Do Son Tung
 * Date: 2/1/2016
 * Time: 6:23 PM
 */
?>
<div class="container">
    <div class="row">
        <h2 class="orange-text">Documentation</h2>
    </div>
    <div class="row">
        <p class="documentation">In this documentation we will show what this website can do and show the API of the server to help build the client side</p>
    </div>
    <div class="row">
        <h4 class="orange-text">Data Set</h4>
        <p class="documentation">Data Set which is available in the database on the server can be viewed in the Data Set Section. In this section, you can see
        image and modify the data set (including change name, or add some more images). If you want to have a new data set, you can add it and upload images to
        form a brand new data set</p>
    </div>
    <div class="row">
        <h4 class="orange-text">Client side - API</h4>
        <p class="documentation">This is the API link that you need to send data to server so as it can <strong>return images</strong></p>
    </div>
    <div class="row">
        <div class="col xs6 l6">
            <input id="api-link" value="cbir.sontg.net/cbir/recieve_feature/receive_grayscale">
        </div>
        <div class="col xs6 l6" style="padding-top: 10px;">
            <button class="btn waves-effect waves-light teal darken-2" id="copy-button" data-clipboard-target="#api-link">Copy</button>
        </div>
    </div>
</div>
<script src="//cdnjs.cloudflare.com/ajax/libs/clipboard.js/1.4.0/clipboard.min.js"></script>
<script>
    (function(){
        new Clipboard('#copy-button');
    })();
</script>

