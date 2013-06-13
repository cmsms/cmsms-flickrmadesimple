{if $photos|count > 0}
<ul>
	{foreach from=$photos item=photo}
	<li>{*$photo|var_dump*}
		<a href="{$photo.url_m}" target="_new"><img src="{$photo.url_s}" alt="{$photo.title}" /><a>
		<br />
		<a href="{$photo.url_o}" target="_new">Original size</a>
	</li>
	{/foreach}
</ul>
{/if}
{*
<pre>{$photos|var_dump}</pre>
*}