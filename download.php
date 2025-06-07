<?php include("header.php"); ?>
<h1>Download</h1>
<p>Below is a table of all of the files in the build you selected. It can take some time to load.</p>
<ul id="download"></ul>
<script>
  (async function() {
    let files = await fetch("./json-api/get.php" +
      "?id=" + (new URLSearchParams(document.location.search)).get("id"));
    files = await files.json();
    files = files.response.files;
    let names = Object.keys(files);
    names.forEach((name) => {
      let link = document.createElement("a");
      link.href = files[name].url;
      link.textContent = name;
      let item = document.createElement("li");
      item.appendChild(link);
      let downloadElement = document.querySelector("#download");
      downloadElement.appendChild(item);
    });
  })();
</script>
<?php include("footer.php"); ?>
