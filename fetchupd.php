<?php include("header.php"); ?>
<h1>Fetch a build</h1>
<p>This page is for advanced users. The page will refresh after some time, and if successful the new build will show.</p>
<select id="arch">
  <option value="all">All architectures</option>
  <option value="amd64">AMD64</option>
  <option value="x86">x86</option>
  <option value="arm64">ARM64</option>
</select>
<select id="ring">
  <option value="Canary">Canary</option>
  <option value="Dev">Dev</option>
  <option value="Beta">Beta</option>
  <option value="ReleasePreview">Release Preview</option>
  <option value="Retail">Retail</option>
</select>
<input type="number" id="build" placeholder="Build" value="26100">
<select id="sku">
  <option value="4">Client</option>
  <option value="125">Enterprise LTSC</option>
  <option value="7">Server</option>
</select>
<button type="button" id="fetch">Fetch</button>
<script>
  document.querySelector("#fetch").onclick = async function() {
    document.querySelector("#fetch").disabled = true;
    await fetch("./json-api/fetchupd.php" + 
      "?arch=" + encodeURIComponent(document.querySelector("#arch").value) +
      "&ring=" + encodeURIComponent(document.querySelector("#ring").value) +
      "&build=" + encodeURIComponent(document.querySelector("#build").value) +
      "&sku=" + encodeURIComponent(document.querySelector("#sku").value) +
      "&flight=Mainline&type=Production",
    {mode:"no-cors"})
    .then(data => {location.href = "./"});
  };
</script>
<?php include("footer.php"); ?>