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
        <h2>Documentation</h2>
    </div>
    <div class="row">
        <p>In this documentation we will show what this website can do and show the API of the server to </p>
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

