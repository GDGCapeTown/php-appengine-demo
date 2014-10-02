{% extends "base.php" %}

{% block content %}
    <div class="page-header">
      <h1>Group<small> {{group.name}}</small></h1>
    </div>

    <h4>
        Description: {{group.description}}
    </h4>

    <form method="POST" action="/invite/{{group.id}}">
                <input name="email" type="email" />
                <input type="submit" value="Invite" class="btn btn-primary"/>
            </form>
    
    <h3>
        Members:
    </h3>    
    <ul class="list-group">
        {% for member in members %}
        <li class="list-group-item">
            <h4>{{member.email}} <small>{{member.status}}</small></h4>
        </li>  
        {% endfor %}
    </ul>
    

{% endblock %}