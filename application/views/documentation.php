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
        <h3 class="orange-text darken-3">Documentation</h3>
    </div>
    <div class="row">
        <p class="documentation">In this documentation we will show what this website can do and show the API of the server to help build the client side</p>
    </div>
    <div class="row">
        <h4 class="orange-text darken-3">Data Set</h4>
        <p class="documentation">Data Set which is available in the database on the server can be viewed in the Data Set Section. In this section, you can see
        image and modify the data set (including change name, or add some more images). If you want to have a new data set, you can add it and upload images to
        form a brand new data set</p>
    </div>
    <div class="row">
        <h4 class="orange-text darken-3">Client side - API</h4>
    </div>
    <div class="row">
        <h5 class="orange-text darken-3">How to get Image (Compare by Grayscale)</h5>
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
                <td>[1,0.47177419354839,0.54883512544803,.........,0,0.0053763440860215]</td>
            </tr>
            <tr>
                <td>number</td>
                <td>An integer number that is number of returning images</td>
                <td>5</td>
            </tr>
            <tr>
                <td>datasets</td>
                <td>A JSON data contains a list of data set id that you want to search in</td>
                <td>[{"id":"2"},{"id":"3"},{"id":"9"}]</td>
            </tr>
            </tbody>
        </table>
    </div>
    <div class="row">
        <h5>Sample Result</h5>
        <blockquote>
            <pre>
{
  "images": [
    {
      "url": "http://cbir.sontg.net/cbir/images/14546737787lHOub5uYH9213.jpg",
      "distance": 1.018157281457
    },
    {
      "url": "http://cbir.sontg.net/cbir/images/1454673671vWD1mFBD1H9036.jpg",
      "distance": 1.0426516698439
    },
    {
      "url": "http://cbir.sontg.net/cbir/images/1454674007LKu1DInCbI9598.jpg",
      "distance": 1.1896482484676
    },
    {
      "url": "http://cbir.sontg.net/cbir/images/1454673958bhuuDZHS5U9510.jpg",
      "distance": 1.2268602983952
    },
    {
      "url": "http://cbir.sontg.net/cbir/images/1454673889zGDio1MUWM9390.jpg",
      "distance": 1.3859393466925
    }
  ]
}
        </pre></blockquote>
    </div>
    <div class="row">
        <h5 class="orange-text darken-3">How to get Image (Compared by RGB)</h5>
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
                <td>[1,0.47177419354839,0.54883512544803,.........,0,0.0053763440860215]</td>
            </tr>
            <tr>
                <td>green</td>
                <td>A JSON data contains the green histogram</td>
                <td>[1,0.47177419354839,0.54883512544803,.........,0,0.0053763440860215]</td>
            </tr>
            <tr>
                <td>blue</td>
                <td>A JSON data contains the blue histogram</td>
                <td>[1,0.47177419354839,0.54883512544803,.........,0,0.0053763440860215]</td>
            </tr>
            <tr>
                <td>number</td>
                <td>An integer number that is number of returning images</td>
                <td>5</td>
            </tr>
            <tr>
                <td>datasets</td>
                <td>A JSON data contains a list of data set id that you want to search in</td>
                <td>[{"id":"2"},{"id":"3"},{"id":"9"}]</td>
            </tr>
            </tbody>
        </table>
    </div>
    <div class="row">
        <h5>Sample Result</h5>
        <blockquote>
            <pre>
{
  "images": [
    {
      "url": "http://cbir.sontg.net/cbir/images/14546737787lHOub5uYH9213.jpg",
      "distance": 1.018157281457
    },
    {
      "url": "http://cbir.sontg.net/cbir/images/1454673671vWD1mFBD1H9036.jpg",
      "distance": 1.0426516698439
    },
    {
      "url": "http://cbir.sontg.net/cbir/images/1454674007LKu1DInCbI9598.jpg",
      "distance": 1.1896482484676
    },
    {
      "url": "http://cbir.sontg.net/cbir/images/1454673958bhuuDZHS5U9510.jpg",
      "distance": 1.2268602983952
    },
    {
      "url": "http://cbir.sontg.net/cbir/images/1454673889zGDio1MUWM9390.jpg",
      "distance": 1.3859393466925
    }
  ]
}
        </pre></blockquote>
    </div>
    <div class="row">
        <h5 class="orange-text darken-3">How to get the data set list</h5>
        <p class="documentation">For the data set, we use the following API to retrieve all the data set information in JSON format</strong>. This API requires <strong>no parameters</strong></p>
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
        <h5>Sample Result</h5>
        <blockquote>
            <pre>
[
  {
    "id": "1",
    "dataset_name": "Wang",
    "create_at": "2016-02-05 14:16:13",
    "updated_at": "0000-00-00 00:00:00"
  },
  {
    "id": "2",
    "dataset_name": "Tung",
    "create_at": "2016-02-05 15:02:00",
    "updated_at": "0000-00-00 00:00:00"
  },
  {
    "id": "3",
    "dataset_name": "Wang 2",
    "create_at": "2016-02-05 18:56:02",
    "updated_at": "0000-00-00 00:00:00"
  }
]
        </pre></blockquote>
    </div>
</div>
<script src="//cdnjs.cloudflare.com/ajax/libs/clipboard.js/1.4.0/clipboard.min.js"></script>
<script>
    (function(){
        new Clipboard('#copy-button');
    })();
</script>

