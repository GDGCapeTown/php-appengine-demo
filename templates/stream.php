{% extends "base.php" %}

{% block content %}
    <div class="page-header">
      <h1>My Feed.. <small> How are my better parts keeping?</small></h1>
    </div>

    <table class="table">
    <th>
        <td><h4>Checkin Time</h4></td>
        <td><h4>Who</h4></td>
        <td><h4>How they were in the past month</h4></td>
        <td><h4>How those around them were doing</h4></td>
        <td><h4>Their work during the last month</h4></td>
        <td><h4>What new or out of the ordinary did they do last month</h4></td>
        <td><h4>New things going on for them in the coming month</h4></td>
    </th>

    {% for checkin in checkins %}
    <tr>
        <td></td>
        <td>{{checkin.created}}</td>
        <td>{{checkin.email}}</td>
        <td>{{checkin.statuslastmonth}}</td>
        <td>{{checkin.statusthosearoundyou}}</td>
        <td>{{checkin.statuswork}}</td>
        <td>{{checkin.newpastmonth}}</td>
        <td>{{checkin.newnextmonth}}</td>
    </tr>
    {% endfor %}
    </table>

{% endblock %}