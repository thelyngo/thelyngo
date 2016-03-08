{*
* BISKOT - Micro PHP Framework
*
* @author     Toast Games
* @copyright  2015 Toast Games <http://toast-games.com>
* @version    Biskot 0.3
*}

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <title>Biskot - Oops, something went wrong</title>
        <meta name="generator" content="Bootply" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link href="{$base}/core/views/css/bootstrap.css" rel="stylesheet">
        <link href="{$base}/core/views/css/style.css" rel="stylesheet">
        <link href="{$base}/core/views/css/docs.css" rel="stylesheet">
        <!--[if lt IE 9]>
            <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
    </head>
    <body>
        <h1>Oops, something went wrong</h1>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    {*{foreach from=$errors item=error}
                    <div class="bs-callout bs-callout-{$error.type}">
                        <h4>{$error.title}</h4>
                        <p>{$error.content}</p>
                    </div>
                    {/foreach}*}

                    <div class="bs-callout bs-callout-{$code}">
                        <h4>Error</h4>
                        <p>{$message}</p>
                    </div>
                    <hr/>
                </div>
            </div>
            <footer>
                © Biskot Framework - 2015
            </footer>
        </div>
    </body>
</html>




