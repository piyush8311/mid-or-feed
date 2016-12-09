{% extends "layout.html" %}
{% block content %}
<div id="main">
	<h1>Login Form</h1>
	<form action="/login" method="post">
		<label>email : </label>
		<input id="email" name="email" placeholder="email" type="text" />
		<label>password : </label>
		<input id="password" name="password" type="password" />
		<input name="submit" type="submit" value="Login" />
	</form>
	<a href="/register"> Register </a>
</div>
{% endblock %}
