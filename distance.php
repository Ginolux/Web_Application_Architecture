<div class="jumbotron">
<h2>Distance to our stores</h2>
  <div class="form-group">
    <label for="exampleFormControlInput1"><b>Your address:</b></label>
    <input type="text" class="form-control" id="addr1" placeholder="Insert your address here">
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1"><b>Select a store address:</b></label>
    <select class="form-control" id="addr2">
      <option>kevin street, dublin</option>
      <option>grafton street, dublin</option>
      <option>Henry street, dublin</option>
    </select>
  </div>

  <div class="form-group">
    <button id="distance" class="btn btn-primary">Compute distance</button>

  </div>

<!-- Display distance -->
  <div id="div1" style="font-weight: bold"></div>
  <div id="div2" style="font-weight: bold"></div>
</div>


<script>
  $("#distance").click(function(){
    var addr1 = document.getElementById("addr1").value;
    var addr2 = document.getElementById("addr2").value;

    $.get("https://cors-anywhere.herokuapp.com/" +
    "https://maps.googleapis.com/maps/api/distancematrix/json?units=imperial&origins=" + addr1 + "&destinations=" + addr2 + "&key=" +
      "AIzaSyC-kuOCafBjLH-7WlNCySpn2-vCdcQ9qgk", function(data){
        $("#div1").text("The distance is: " + data.rows[0].elements[0].distance.text);
        $("#div2").text("The duration is: " + data.rows[0].elements[0].duration.text);

      });
  });
</script>
