<?php include("header.php"); ?>
<h1>Download</h1>
<p>Below is a table of all of the files in the build you selected. It can take some time to load.</p>
<table id="download">
  <tr>
    <th>Name</th>
    <th>URL</th>
  </tr>
</pre>
<script>
  (async function() {
    let files = await fetch("./json-api/get.php" +
      "?id=" + (new URLSearchParams(document.location.search)).get("id"));
    files = await files.json();
    files = files.response.files;
    let names = Object.keys(files);
    names.forEach((name) => {
      let row = document.createElement("tr");
      let nameElement = document.createElement("td");
      nameElement.textContent = name;
      row.appendChild(nameElement);
      let url = document.createElement("td");
      let link = document.createElement("a");
      link.textContent = files[name].url;
      link.href = files[name].url;
      url.appendChild(link);
      row.appendChild(url);
      document.querySelector("#download").appendChild(row);
    });
  })();
</script>
<?php include("footer.php"); ?>
