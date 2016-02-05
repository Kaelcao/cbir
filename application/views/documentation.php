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
        <h3 class="orange-text">Documentation</h3>
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
    </div>
    <div class="row">
        <h5 class="orange-text">How to get Image (Compare by Grayscale)</h5>
        <p class="documentation">You want to search for the image in the data set <strong>compare after convert into grayscale</strong></p>
    </div>
    <div class="row">
        <div class="col xs6 l6">
            <input id="grayscale-link" value="cbir.sontg.net/cbir/Compare/receive_grayscale">
        </div>
        <div class="col xs6 l6" style="padding-top: 10px;">
            <button class="btn waves-effect waves-light teal darken-2" id="copy-button" data-clipboard-target="#grayscale-link">Copy</button>
        </div>
    </div>
    <div class="row">
        <table>
            <thead>
            <tr>
                <th>Parameters</th>
                <th>Explanation</th>
                <th>Example</th>
            </tr>
            </thead>

            <tbody>
            <tr>
                <td>grayscale</td>
                <td>A JSON data contains the grayscale histogram</td>
                <td></td>
            </tr>
            <tr>
                <td>number</td>
                <td>An integer number that is number of returning images</td>
                <td>$3.76</td>
            </tr>
            <tr>
                <td>datasets</td>
                <td>A JSON data contains a list of data set id that you want to search in</td>
                <td>$7.00</td>
            </tr>
            </tbody>
        </table>
    </div>
    <div class="row">
        <h5 class="orange-text">How to get Image (Compared by RGB)</h5>
        <p class="documentation">You want search for the image in data set which is <strong>compared by RGB</strong>. You have to use this link with the data
        send from the client as JSON format similar to Grayscale send to server</p>
    </div>
    <div class="row">
        <div class="col xs6 l6">
            <input id="rgb-link" value="cbir.sontg.net/cbir/Compare/receive_rgb">
        </div>
        <div class="col xs6 l6" style="padding-top: 10px;">
            <button class="btn waves-effect waves-light teal darken-2" id="copy-button" data-clipboard-target="#rgb-link">Copy</button>
        </div>
    </div>
    <div class="row">
        <table>
            <thead>
            <tr>
                <th>Parameters</th>
                <th>Explanation</th>
                <th>Example</th>
            </tr>
            </thead>

            <tbody>
            <tr>
                <td>red</td>
                <td>A JSON data contains the red histogram</td>
                <td></td>
            </tr>
            <tr>
                <td>green</td>
                <td>A JSON data contains the green histogram</td>
                <td></td>
            </tr>
            <tr>
                <td>blue</td>
                <td>A JSON data contains the blue histogram</td>
                <td></td>
            </tr>
            <tr>
                <td>number</td>
                <td>An integer number that is number of returning images</td>
                <td>10</td>
            </tr>
            <tr>
                <td>datasets</td>
                <td>A JSON data contains a list of data set id that you want to search in</td>
                <td>$7.00</td>
            </tr>
            </tbody>
        </table>
    </div>
    <div class="row">
        <h5 class="orange-text">How to get the data set list</h5>
        <p class="documentation">For the data set, we use the following API to retrieve all the data set information in JSON format</strong></p>
    </div>
    <div class="row">
        <div class="col xs6 l6">
            <input id="dataset-link" value="cbir.sontg.net/cbir/Compare/get_dataset">
        </div>
        <div class="col xs6 l6" style="padding-top: 10px;">
            <button class="btn waves-effect waves-light teal darken-2" id="copy-button" data-clipboard-target="#dataset-link">Copy</button>
        </div>
    </div>
    <div class="row">
        <table>
            <thead>
            <tr>
                <th>Parameters</th>
                <th>Explanation</th>
                <th>Example</th>
            </tr>
            </thead>

            <tbody>
            <tr>
                <td></td>
                <td>A JSON data contains the red histogram</td>
                <td></td>
            </tr>
            <tr>
                <td>green</td>
                <td>A JSON data contains the green histogram</td>
                <td></td>
            </tr>
            <tr>
                <td>blue</td>
                <td>A JSON data contains the blue histogram</td>
                <td></td>
            </tr>
            <tr>
                <td>number</td>
                <td>An integer number that is number of returning images</td>
                <td>10</td>
            </tr>
            <tr>
                <td>datasets</td>
                <td>A JSON data contains a list of data set id that you want to search in</td>
                <td>$7.00</td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
<script src="//cdnjs.cloudflare.com/ajax/libs/clipboard.js/1.4.0/clipboard.min.js"></script>
<script>
    (function(){
        new Clipboard('#copy-button');
    })();
</script>

