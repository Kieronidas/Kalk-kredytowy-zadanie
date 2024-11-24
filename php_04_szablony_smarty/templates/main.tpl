<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
    <meta charset="utf-8" />
    <title>{block name="title"}Tytuł strony{/block}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="{$app_url}/assets/css/main.css" />
</head>
<body>
    <div id="page-wrapper">

        <!-- Header -->
        <section id="header">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h1 id="logo">Halcyonic</h1>
                        <nav id="nav">
                            <a href="calc.php">Kalkulator</a>
                        </nav>
                    </div>
                </div>
            </div>
        </section>

        <!-- Content -->
        <section id="content">
            <div class="container">
                {block name="content"}{/block}
            </div>
        </section>

        <!-- Footer -->
        <section id="footer">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <p>&copy; Untitled. All rights reserved. | Design: <a href="http://html5up.net">HTML5 UP</a></p>
                    </div>
                </div>
            </div>
        </section>

    </div>
</body>
</html>
