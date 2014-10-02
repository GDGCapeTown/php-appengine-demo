<!DOCTYPE html>
<html>
    <head>
        <title>KeepInTouch</title>
    </head>
    <body>
        Dashboard

        Groups
        {% for group in groups %}
            {{group.description}} <a href="/group/{{group.id}}" >View</a>
        {% endfor %}

        Invited Groups
        {% for group in invites %}
            {{group.description}} <a href="/group/{{group.id}}" >View</a>
            <form method="POST" action="/join/{{group.id}}">
                <input type=submit Value="Join" />
            </form>
        {% endfor %}
        </ul>
    </body>
</html>