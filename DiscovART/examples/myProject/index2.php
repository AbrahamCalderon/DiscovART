<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>TPA: Trans Planet Airlines - Start</title>
<link href="styles/main.css" rel="stylesheet" type="text/css">
<script src="http://code.jquery.com/jquery-1.8.2.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$("#submit").click(function(e) {
			e.preventDefault();
			var theChoice = $('input:radio:checked').val()
			localStorage.setItem("theChoice",theChoice);
			window.location = "beam-up2.php";
		});
	});
</script>
</head>

<body>
<div id="outerWrapper">
  <div id="header">
	<h1>LOGO IMAGE GOES HERE</h1>
  <br>
	<h2>IMAGE GOES HERE</h2>
  </div>
  <div id="nav">
  <h1>Create a funny photo</h1>
    <ul>
      <li><a href="index2.php">START</a></li>
      <li><a href="beam-up2.php">UPLOAD</a></li>
      <li><a href="modify2.php">MODIFY</a></li>
      <li id="captionNav"><a href="javascript:void();">CAPTION</a></li>
      <li><a href="javascript:void(); id="saveImage" target="_blank">SAVE</a></li>
    </ul>
  </div>
<div id="content">
  <h1>Step 1: Choose a background</h1>
  <p>&nbsp;</p>
  <form name="form1" method="post" action="">
    <table>
      <tr>
        <td><label><input type="radio" name="bgImage" value="mtrushmore.jpg" id="radioImage_0"></label></td>
        <td>Mount Rushmore</td>
        <td><img src="images/mtrushmore.jpg" width="320" height="238"></td>
      </tr>
    </table>
    <p>
      <input type="submit" name="submit" id="submit" value="Select Background and Proceed">
    </p>
  </form>
</div>
<div id="footer">
  <p>Copyright &copy; 2013 DiscovART. All rights reserved</p>
</div></div>
</body>
</html>
