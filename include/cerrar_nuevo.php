<style>
body {
	padding: 50px;
	background-color: #ececec;
}

a {
	margin: 10px;
}

div {
	width: 250px;
	margin: 0 auto;
}

.button {
	display: inline-block;
	position: relative;
	color: #888;
	text-shadow: 0 1px 0 rgba(255,255,255, 0.8);
	text-decoration: none;
	text-align: center;
	padding: 8px 12px;
	font-size: 12px;
	font-weight: 700;
	font-family: helvetica, arial, sans-serif;
	border-radius: 4px;
	border: 1px solid #bcbcbc;

	-webkit-box-shadow: 0 1px 3px rgba(0,0,0,0.12);
	box-shadow: 0 1px 3px rgba(0,0,0,0.12);

	background-image: -webkit-linear-gradient(top, rgba(255,255,255,1) 0%,rgba(239,239,239,1) 60%,rgba(225,223,226,1) 100%);
	background-image: -moz-linear-gradient(top, rgba(255,255,255,1) 0%,rgba(239,239,239,1) 60%,rgba(225,223,226,1) 100%);
	background-image: -o-linear-gradient(top, rgba(255,255,255,1) 0%,rgba(239,239,239,1) 60%,rgba(225,223,226,1) 100%);
	background-image: -ms-linear-gradient(top, rgba(255,255,255,1) 0%,rgba(239,239,239,1) 60%,rgba(225,223,226,1) 100%);
	background-image: linear-gradient(top, rgba(255,255,255,1) 0%,rgba(239,239,239,1) 60%,rgba(225,223,226,1) 100%);
}

.button:hover {
	color: #555;
}

.button:active,.button:active:after,.button:active:before {
	-webkit-box-shadow: none;
	box-shadow: none;
}

/* Back Button */
.button.back {
	border-left: none;
}

.button.back:after {
	content: '';
	position: absolute;
	height: 50%;
	width: 15px;
	border-left: 1px solid #bcbcbc;

	background-image: -webkit-linear-gradient(top, rgba(255,255,255,0) 0%,rgba(255,255,255,1) 1%,rgba(240,240,240,1) 100%);
	background-image: -moz-linear-gradient(top, rgba(255,255,255,0) 0%,rgba(255,255,255,1) 1%,rgba(240,240,240,1) 100%);
	background-image: -o-linear-gradient(top, rgba(255,255,255,0) 0%,rgba(255,255,255,1) 1%,rgba(240,240,240,1) 100%);
	background-image: -ms-linear-gradient(top, rgba(255,255,255,0) 0%,rgba(255,255,255,1) 1%,rgba(240,240,240,1) 100%);
	background-image: linear-gradient(top, rgba(255,255,255,0) 0%,rgba(255,255,255,1) 1%,rgba(240,240,240,1) 100%);
	left: -5px;
	top: 1px;

	-webkit-transform: skew(-35deg, 0);
	-moz-transform: skew(-35deg, 0);
	-o-transform: skew(-35deg, 0);
	-ms-transform: skew(-35deg, 0);
	transform: skew(-35deg, 0);
}

.button.back:before {
	content: '';
	position: absolute;
	height: 48%;
	width: 15px;
	border-left: 1px solid #bcbcbc;
	bottom: 1px;
	left: -5px;

	-webkit-transform: skew(35deg, 0);
	-moz-transform: skew(35deg, 0);
	-o-transform: skew(35deg, 0);
	-ms-transform: skew(35deg, 0);
	transform: skew(35deg, 0);

	background-image: -webkit-linear-gradient(top, rgba(240,240,240,1) 0%,rgba(239,239,239,1) 10%,rgba(225,223,226,1) 100%);
	background-image: -moz-linear-gradient(top, rgba(240,240,240,1) 0%,rgba(239,239,239,1) 10%,rgba(225,223,226,1) 100%);
	background-image: -o-linear-gradient(top, rgba(240,240,240,1) 0%,rgba(239,239,239,1) 10%,rgba(225,223,226,1) 100%);
	background-image: -ms-linear-gradient(top, rgba(240,240,240,1) 0%,rgba(239,239,239,1) 10%,rgba(225,223,226,1) 100%);
	background-image: linear-gradient(top, rgba(240,240,240,1) 0%,rgba(239,239,239,1) 10%,rgba(225,223,226,1) 100%);

	-webkit-box-shadow: -2px 1px 2px rgba(100,100,100,0.1);
	box-shadow: -2px 1px 2px rgba(100,100,100,0.1);
}

/* Next Button */
.button.next {
	border-right: none;
}

.button.next:after {
	content: '';
	position: absolute;
	height: 48%;
	width: 15px;
	border-right: 1px solid #bcbcbc;

	background-image: -webkit-linear-gradient(top, rgba(240,240,240,1) 0%,rgba(239,239,239,1) 10%,rgba(225,223,226,1) 100%);
	background-image: -moz-linear-gradient(top, rgba(240,240,240,1) 0%,rgba(239,239,239,1) 10%,rgba(225,223,226,1) 100%);
	background-image: -o-linear-gradient(top, rgba(240,240,240,1) 0%,rgba(239,239,239,1) 10%,rgba(225,223,226,1) 100%);
	background-image: -ms-linear-gradient(top, rgba(240,240,240,1) 0%,rgba(239,239,239,1) 10%,rgba(225,223,226,1) 100%);
	background-image: linear-gradient(top, rgba(240,240,240,1) 0%,rgba(239,239,239,1) 10%,rgba(225,223,226,1) 100%);
	right: -5px;
	bottom: 1px;

	-webkit-transform: skew(-35deg, 0);
	-moz-transform: skew(-35deg, 0);
	-o-transform: skew(-35deg, 0);
	-ms-transform: skew(-35deg, 0);
	transform: skew(-35deg, 0);

	-webkit-box-shadow: 2px 1px 2px rgba(100,100,100,0.1);
	box-shadow: 2px 1px 2px rgba(100,100,100,0.1);
}

.button.next:before {
	content: '';
	position: absolute;

	background-image: -webkit-linear-gradient(top, rgba(255,255,255,0) 0%,rgba(255,255,255,1) 1%,rgba(240,240,240,1) 100%);
	background-image: -moz-linear-gradient(top, rgba(255,255,255,0) 0%,rgba(255,255,255,1) 1%,rgba(240,240,240,1) 100%);
	background-image: -o-linear-gradient(top, rgba(255,255,255,0) 0%,rgba(255,255,255,1) 1%,rgba(240,240,240,1) 100%);
	background-image: -ms-linear-gradient(top, rgba(255,255,255,0) 0%,rgba(255,255,255,1) 1%,rgba(240,240,240,1) 100%);
	background-image: linear-gradient(top, rgba(255,255,255,0) 0%,rgba(255,255,255,1) 1%,rgba(240,240,240,1) 100%);
	height: 50%;
	width: 15px;
	border-right: 1px solid #bcbcbc;
	top: 1px;
	right: -5px;

	-webkit-transform: skew(35deg, 0);
	-moz-transform: skew(35deg, 0);
	-o-transform: skew(35deg, 0);
	-ms-transform: skew(35deg, 0);
	transform: skew(35deg, 0);
	
}
</style>
<link rel="stylesheet" type="text/css" href="../css/font-awesome_act.css">
<div>
	<a class="button next" href="javascript:void(0)"><i class="fa fa-home fa-1x" aria-hidden="true"></i></a>
	<a class="button next" href="javascript:void(0)"><i class="fa fa-user fa-1x" aria-hidden="true"></i></a>
</div>

