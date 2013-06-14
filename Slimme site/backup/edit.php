<!DOCTYPE html>
<html>
    <head>
        <title>Writer</title>
        <meta content="text/html; charset=utf-8" http-equiv="content-type" />
        <script type="text/javascript" src="ckeditor/ckeditor.js"></script>
        <script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
        <script type="text/javascript" src="js/jquery.form.js"></script>
        <style>
            .cke_contents {
                height: 400px !important;
            }
        </style>
		<script type="text/javascript">
			$(document).ready(function() {
				CKEDITOR.replace( 'editor',
				{
					fullPage : true,
					uiColor : '#9AB8F3',
					toolbar : 'MyToolbar'
				});
			});
		</script>
    </head>
    <body>
        <form action="result.php" method="post">
            <textarea class="editor" id="editor" name="data"></textarea>
			<div id="messages"></div>
            <input type="submit" value="do it" />
        </form>
    </body>
</html>
