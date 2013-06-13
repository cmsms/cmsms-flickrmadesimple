<h3>{$title_section}</h3>
<p>This is content that is shown in the Admin Panel, above the tabbed interface area.</p>
{$tab_headers}

{$start_galleries_tab}

<pre>
	<h3>Galleries</h3>
	{*$galleries|var_dump*}
	<h4>Photosets</h4>
	<ul>
	{foreach from=$photosets item=photoset}
	<li><strong>{$photoset.title}</strong> - id: [{$photoset.id}] <code>{ldelim}FlickrMadeSimple photoset="{$photoset.id}"{rdelim}</code></li>
	{/foreach}
	</ul>
</pre>
{$end_tab}

{$start_templates_tab}
<div class="pageoptions">
	<p class="pageoptions">{$addtemplateicon} {$addtemplatelink}</p>
</div>
{if $templates|count > 0}
<table cellspacing="0" class="pagetable"><thead><tr><th>{$title_template}</th><th class="pageicon"> </th><th class="pageicon"> </th></tr></thead><tbody>
{foreach from=$templates item=entry}
		<tr class="{$entry->rowclass}" onmouseover="this.className='{$entry->rowclass}hover';" onmouseout="this.className='{$entry->rowclass}';">
		<td>{$entry->name}</td><td>{$entry->editlink}</td><td>{$entry->deletelink}</td></tr>
{/foreach}
	</tbody></table>

<div class="pageoptions">
	<p class="pageoptions">{$addtemplateicon} {$addtemplatelink}</p>
</div>

{/if}
{$end_tab}

{$start_preferences_tab}
{$form_start}
<div class="pageoverflow">
    <p class="pagetext">{$api_key_title}:</p>
    <p class="pageinput">{$api_key}</p>
</div>
<div class="pageoverflow">
    <p class="pagetext">{$username_title}:</p>
    <p class="pageinput">{$username}</p>
</div>

<div>
{$pref_tabs}
{$submit}
{$cancel}
</div>
{$form_end}
{$end_tab}

{$tab_footers}

<p>This content shows up as a footer for all tabs in the admin panel.</p>
