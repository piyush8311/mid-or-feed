<a href="/logout"> logout </a>
<script>

function ajaxFunc() {
    if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
    } else {
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }

    var myList = document.getElementById("myList");
    var newItem = document.createElement("li");

    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
        	var textNode = document.createTextNode(this.responseText);
        	newItem.appendChild(textNode);
        	myList.insertBefore(newItem, myList.childNodes[0]);
        	document.getElementById("myPost").value = "";
        }
    };

    var myForm = new FormData();
    myForm.append('news', document.getElementById('myPost').value);

    var url = "submit";

    xmlhttp.open("POST", url, true);
    xmlhttp.send(myForm);
}

</script>
<form>
	<label> What's on your mind? :P </label>
	<textarea id="myPost" name="news" row="7" columns="25"></textarea>
	<input value="submit" type="button" onclick="ajaxFunc()"  />
</form>
<ul id="myList">
<?php foreach($feeds as $feed): ?>
	<span> <li> <?php echo htmlspecialchars($feed->getNews()) ?> </li> </span>
<?php endforeach ?>
</ul>
 
