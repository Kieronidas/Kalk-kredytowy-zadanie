{extends file="main.tpl"}

{block name="title"}Kalkulator Kredytowy{/block}

{block name="content"}
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
{/block}
