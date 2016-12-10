{% extends "layout.html" %}
{% block content %}
<a href="/logout"> logout </a>
<script>

function ajaxFunc() {
    if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
    } else {
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }

    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("newPost").innerHTML = this.responseText;
        }
    };

    var myPost = document.getElementById('myPost').value;
    var url = "submit?news=" + myPost;

    xmlhttp.open("GET", url, true);
    xmlhttp.send();
}

</script>
<form>
	<label> What's on your mind? :P </label>
	<textarea id="myPost"name="news" row="7" columns="25"></textarea>
	<input value="submit" type="button" onclick="ajaxFunc()"  />
</form>
<ul>
<span id = "newPost"> </span>
<?php foreach($feeds as $feed): ?>
	<span> <li> <?php echo htmlspecialchars($feed->getNews()) ?> </li> </span>
<?php endforeach ?>
</ul>
 
{% endblock %}