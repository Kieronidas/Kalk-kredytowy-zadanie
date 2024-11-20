<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
    <meta charset="utf-8" />
    <title>{$page_title}</title>
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
                        <!-- Zmieniono <a> na zwykły tekst -->
                        <h1 id="logo">Halcyonic</h1>
                        <nav id="nav">
                            <a href="calc.php">Kalkulator</a>
                        </nav>
                    </div>
                </div>
            </div>
        </section>

        <!-- Kalkulator Kredytowy -->
        <section id="content">
            <div class="container">
                <h2>Kalkulator Kredytowy</h2>

                <!-- Formularz -->
                <form action="{$app_url}/app/calc.php" method="post">
                    <label for="id_amount">Kwota kredytu: </label>
                    <input id="id_amount" type="text" name="amount" value="{$amount}" /><br />

                    <label for="id_years">Liczba lat: </label>
                    <input id="id_years" type="text" name="years" value="{$years}" /><br />

                    <label for="id_interest">Oprocentowanie (%): </label>
                    <input id="id_interest" type="text" name="interest" value="{$interest}" /><br />

                    <input type="submit" value="Oblicz ratę" />
                </form>

                {if $messages}
                <div style="background-color: #f88; padding: 10px;">
                    <ul>
                        {foreach from=$messages item=msg}
                            <li>{$msg}</li>
                        {/foreach}
                    </ul>
                </div>
                {/if}

                {if $monthlyPayment}
                <div style="background-color: #0f0; padding: 10px;">
                    <p>Miesięczna rata: {$monthlyPayment|number_format:2} PLN</p>
                </div>
                {/if}
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
