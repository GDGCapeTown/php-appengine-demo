{% extends "base.php" %}

{% block content %}
    <div class="page-header">
      <h1>Dashboard<small> Manage your groups..</small></h1>
    </div>

    <h3>
        My groups:
    </h3>
    <ul class="list-group">
      {% for group in groups %}
      <li class="list-group-item"><h3>{{group.name}} <small>{{group.description}}</small>   <a href="/group/{{group.id}}" class="label label-info">View</a></h3></li>
      {% endfor %}
    </ul>

    <h3>
        Invited groups:
    </h3>    
    <ul class="list-group">
        {% for group in invites %}
        <li class="list-group-item">
            <h3>{{group.name}} <small>{{group.description}}</small> <a href="/group/{{group.id}}" class="label label-info" >View</a>
            <form method="POST" action="/join/{{group.id}}">
                <input type=submit class="btn btn-primary" value="Join" />
            </form>
            </h3>
        </li>  
        {% endfor %}
    </ul>
    

{% endblock %}
