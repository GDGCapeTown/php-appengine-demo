
{% extends "base.php" %}

{% block content %}
    <div class="page-header">
      <h1>Lets checkin.. <small> and tell them how it's going</small></h1>
    </div>

    <form role="form" method="POST" action="/checkin">
        <label for="">How have you been the last month?</label>
        <div class="radio">
          <label>
            <input type="radio" name="howhaveyoubeen" value="I've had better months">
            I've had better months
          </label>
        </div>
        <div class="radio">
          <label>
            <input type="radio" name="howhaveyoubeen" value="Good, no complaints">
            Good, no complaints
          </label>
        </div>
        <div class="radio">
          <label>
            <input type="radio" name="howhaveyoubeen" value="This has been a really good month :)">
            This has been a really good month :)
          </label>
        </div>


        <label for="">How are those around you doing?</label>
        <div class="radio">
          <label>
            <input type="radio" name="howthosearoundyou" value="All good">
            All good
          </label>
        </div>
        <div class="radio">
          <label>
            <input type="radio" name="howthosearoundyou" value="Getting there">
            Getting there
          </label>
        </div>
        <div class="radio">
          <label>
            <input type="radio" name="howthosearoundyou" value="It's been chaos">
            It's been chaos
          </label>
        </div>

 
        <label for="">How was work this month?</label>
        <div class="radio">
          <label>
            <input type="radio" name="howwaswork" value="Very good">
            Very good
          </label>
        </div>
        <div class="radio">
          <label>
            <input type="radio" name="howwaswork" value="Usual, no complaints">
            Usual, no complaints
          </label>
        </div>
        <div class="radio">
          <label>
            <input type="radio" name="howwaswork" value="Could be better">
            Could be better
          </label>
        </div>
        <div class="radio">
          <label>
            <input type="radio" name="howwaswork" value="Too stressful">
            Too stressful
          </label>
        </div>

      <div class="form-group">
        <label for="">Anything new in the past month?</label>
        <textarea class="form-control" name="newpastmonth"></textarea>
      </div>

      <div class="form-group">
        <label for="">Going anywhere or doing something different in the coming month?</label>
        <textarea class="form-control" name="newnextmonth"></textarea>
      </div>

      <button type="submit" class="btn btn-default">Checkin</button>
    </form>

{% endblock %}