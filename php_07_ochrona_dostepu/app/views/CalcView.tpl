{extends file="main.tpl"}

{block name=content}

<div class="pure-menu pure-menu-horizontal bottom-margin">
	<a href="{$conf->action_url}logout"  class="pure-menu-heading pure-menu-link">wyloguj</a>
	<span style="float:right;">użytkownik: {$user->login}, rola: {$user->role}</span>
</div>

<form action="{$conf->action_url}calcCompute" method="post" class="pure-form pure-form-aligned bottom-margin">
	<legend>Kalkulator Kredytowy</legend>
	 <fieldset>
                <label for="amount">Kwota kredytu</label>
                <input id="amount" type="text" name="amount" value="{if isset($form->amount)}{$form->amount}{/if}">

                <label for="years">Liczba lat</label>
                <input id="years" type="text" name="years" value="{if isset($form->years)}{$form->years}{/if}">

                <label for="rate">Oprocentowanie (%)</label>
                <input id="rate" type="text" name="rate" value="{if isset($form->rate)}{$form->rate}{/if}">

                <button type="submit" class="pure-button">Oblicz</button>
	</div>
            </fieldset>
</form>	


{include file='messages.tpl'}

{if isset($res->result)}
<div class="messages inf">
	Wynik: {$res->result}
</div>
{/if}

{/block}