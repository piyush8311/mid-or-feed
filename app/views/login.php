{% extends "layout.html" %}
{% block content %}
<a href="/logout"> logout </a>
<form action = "/submit" method="post">
	<label> What's on your mind? :P </label>
	<textarea name="news" row="7" columns="25"></textarea>
	<input type="submit" value="Post" />
</form>
<ul>
<?php foreach($feeds as $feed): ?>
	<li> <?php echo htmlspecialchars($feed->getNews()) ?> </li>
<?php endforeach ?>
</ul>
 
{% endblock %}