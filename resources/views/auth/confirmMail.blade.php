<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<style>
	body {
		font-family: Arial;
	}
	.confirm {
		border: 5px dotted #bbb;
		width: 80%;
		border-radius: 15px;
		margin: 0 auto;
		max-width: 600px;
	}
	.container {
		padding: 2px 16px;
		background-color: #f1f1f1;
        line-height: 25px;
        text-align: center;
	}
	.note {
    font-size: large;
	}
</style>
</head>
<body>
	<div class="confirm">
		<div class="container">
            <h2>@lang('lang.RequestToGetAPassword')</h2>
        </div>
		<div class="container" style="background-color:white">
			<h2 class="note"><b><i>
				<p>@lang('lang.Please click on the link'): <a target="_blank" href="{{ $url }}">{{ $url }}</a>
			</i></b></h2> 
		</div>
		<div class="container">
			<h3 class="code">@lang('lang.ShoppingList')</h3>
		</div>

	</div>

</body>
</html> 
