<!DOCTYPE html>
<html>
    <head>
        <title>KeepInTouch</title>
    </head>
    <body>
    	<form method="POST" action="/checkin">
            <label>how have you been the last month?</label>
            <input type="radio" name="howhaveyoubeen" value="I've had better months">
            <input type="radio" name="howhaveyoubeen" value="Good, no complaints">
            <input type="radio" name="howhaveyoubeen" value="This has been a really good month :)">

            <label>how are those at home or around you doing?</label>
            <input type="radio" name="howthosearoundyou" value="All good">
            <input type="radio" name="howthosearoundyou" value="Getting there">
            <input type="radio" name="howthosearoundyou" value="It's been chaos">

            <label>how was work this month?</label>
            <input type="radio" name="howwaswork" value="Very good">
            <input type="radio" name="howwaswork" value="Usual, no complaints">
            <input type="radio" name="howwaswork" value="Could be better">
            <input type="radio" name="howwaswork" value="Too stressful">

            <label>anything new in the past month?</label>
            <textarea name="newpastmonth"></textarea>

            <label>going anywhere or doing something different in the coming month?</label>
            <textarea name="newnextmonth"></textarea>

    		<input type="submit" value="Checkin" />
    	</form>
    </body>
</html>