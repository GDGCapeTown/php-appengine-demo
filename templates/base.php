<!DOCTYPE html>
<html>
    <head>
        {% block head %}
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <title>{% block title %}{% endblock %} - Keep in touch</title>

            <link href="/css/bootstrap.min.css" rel="stylesheet">
            <link rel="stylesheet" href="/css/main.css" />
        {% endblock %}
    </head>
    <body>
        <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="#">Keep In Touch</a>
            </div>
            <div class="collapse navbar-collapse">
              <ul class="nav navbar-nav">
                <li><a href="/">About</a></li>
                <li><a href="/dashboard">Dashboard</a></li>
                <li><a href="/stream">My stream</a></li>
              </ul>
            </div><!--/.nav-collapse -->
          </div>
        </div>

        <div class="container">
            <div id="content">{% block content %}{% endblock %}</div>
        </div><!-- /.container -->
        


        <div class="container">
            <div id="footer">
                {% block footer %}
                {% endblock %}
            </div>
        </div><!-- /.container -->
        
        <script src="/js/jquery-2.1.1.min.js"></script>
        <script src="/js/bootstrap.min.js"></script>
    </body>
</html>