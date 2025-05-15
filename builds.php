<?php include("header.php"); ?>
<h1>Existing builds</h1>
<ul id="existing-builds"></ul> 
<script>
  (async function() {
    let builds = await fetch("./json-api/listid.php");
    builds = await builds.json();
    builds = builds.response.builds;
    builds.forEach((build) => {
      let buildElement = document.createElement("li");
      buildElement.textContent = build.title + " [" + build.arch + "] [";
      let downloadElement = document.createElement("a");
      downloadElement.textContent = "download";
      downloadElement.href = "./download.php?id=" + build.uuid;
      buildElement.appendChild(downloadElement);
      buildElement.innerHTML += "]";
      document.querySelector("#existing-builds").appendChild(buildElement);
    });
  })();
</script>
<?php include("footer.php"); ?>
