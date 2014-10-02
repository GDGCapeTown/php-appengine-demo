<!DOCTYPE html>
<html>
    <head>
        <title>KeepInTouch</title>
    </head>
    <body>
    	{% for group in groups %}
        	{{group.name}}
        	{{group.description}}

        	<form method="POST" action="/invite/{{group.id}}">
        		<input name="email" type="email" />
        		<input type="submit" value="Invite" />
        	</form>
        {% endfor %}

        {% for member in members %}
        	{{member.email}} {{member.status}}
        {% endfor %}
    </body>
</html>