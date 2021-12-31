<!DOCTYPE html>
<html lang="es">
<head>
<title>Título</title>
<meta charset="UTF-8" />
<!-- Loading Font Awesome -->
<link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet" />
</head>
<body>
<style>
/* Hidding the radiobuttons &amp; checkboxes */
input[type="radio"], input[type="checkbox"] {
display: none;
}
/* Styling background */
label i:first-child {
color: gray;
}
/* Hidding the "check" status of inputs */
input[type="radio"] + label .fa-circle,
input[type="checkbox"] + label .fa-check  {
display: none;
}
/* Styling the "check" status */
input[type="radio"]:checked + label .fa-circle,
input[type="checkbox"]:checked + label .fa-check {
display: block;
color: DarkTurquoise;
}
/* Styling checkboxes */
input[type="checkbox"]:checked + label .fa-check {
position: relative;
left: .125em;
bottom: .125em;
}
/* Styling radiobuttons */
input[type="radio"]:checked + label .fa-circle-o {
display: none;
}
</style>
<form>
<input type="radio" name="option" id="radio1" checked/>    
<label for="radio1">
<span class="fa-stack">
<i class="fa fa-circle-o fa-stack-1x"></i>
<i class="fa fa-circle fa-stack-1x"></i>
</span>
Hombre
</label><br />
<input type="radio" name="option" 
id="radio2" />   
<label for="radio2">
<span class="fa-stack">
<i class="fa fa-circle-o fa-stack-1x"></i>
<i class="fa fa-circle fa-stack-1x"></i>
</span>
Mujer
</label><br />
<input type="checkbox" name="option" id="check1" checked/>
<label for="check1">
<span class="fa-stack">
<i class="fa fa-square-o fa-stack-1x"></i>
<i class="fa fa-check fa-stack-1x"></i>
</span>
DVD
</label><br />
<input type="checkbox" name="option" id="check2" />
<label for="check2">
<span class="fa-stack">
<i class="fa fa-square-o fa-stack-1x"></i>
<i class="fa fa-check fa-stack-1x"></i>
</span>
CD
</label><br />
</form>
</body>
</html>