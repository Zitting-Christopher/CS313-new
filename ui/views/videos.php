<script>
function openTab(evt, cityName) {
    var i, x, tablinks;
    x = document.getElementsByClassName("city");
    for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablink");
    for (i = 0; i < x.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" w3-deep-purple", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " w3-deep-purple";
}
</script>
<br>
<div class="w3-container">

  <div class="w3-bar w3-black">
    <button class="w3-bar-item w3-button tablink w3-deep-purple" onclick="openTab(event,'London')">Recent Videos</button>
    <button class="w3-bar-item w3-button tablink" onclick="openTab(event,'Paris')">Top Votes</button>
    <button class="w3-bar-item w3-button tablink" onclick="openTab(event,'Tokyo')">Promising Videos</button>
  </div>
  
  <div id="London" class="w3-container w3-border city">
    <h2>Recent Videos</h2>
    <p>Recent Videos go here.</p>
  </div>

  <div id="Paris" class="w3-container w3-border city" style="display:none">
    <h2>Top Votes</h2>
    <p>Top Votes go here.</p> 
  </div>

  <div id="Tokyo" class="w3-container w3-border city" style="display:none">
    <h2>Promising Videos</h2>
    <p>Promising Videos go here.</p>
  </div>
    <br>
</div>