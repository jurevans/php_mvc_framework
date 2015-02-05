<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	{block name=meta} {/block}

	<title>{block name=title}Custom App{/block}</title>

	{block name=css} {/block}
	<link href="{$APP_BASE_URL}css/app.css" rel="stylesheet"/>

	{block name=scripts} {/block}
	<script type="text/javascript" src="{$APP_BASE_URL}js/app.js"></script>
</head>
<body>

<div id="main">
	<div id="header">
	{block name=header} {/block}
	</div>

	<div id="content">
	{block name=content} {/block}
	</div>

	<div id="footer">
	{block name=footer} {/block}
	</div>
</div>

</body>
</html>
