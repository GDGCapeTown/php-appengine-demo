{% extends "base.php" %}

{% block content %}
    <a href={{loginurl}}><img class="signin-icon" src="/img/sign-in.png" /></a>

    <div class="page-header">
      <h1>Keep In Touch<small> An unsocial network for close-knit groups (families)</small></h1>
    </div>

    <ul class="list-group">
      <li class="list-group-item"><h3>No posting overload - once a month only...</h3></li>
      <li class="list-group-item"><h3>No unnecessary posts - Important questions only...</h3></li>
      <li class="list-group-item"><h3>No distracting notifications - monthly email only...</h3></li>
      <li class="list-group-item"><h3>Info you care about - questions you'd ask over a phone call...</h3></li>
      <li class="list-group-item"><h3>Less people overload - important info about people you care about...</h3></li>
    </ul>
{% endblock %}
