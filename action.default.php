<?php
if (!isset($gCms)) exit;

/* -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

   Code for Flikr Made Simple "default" action

   -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
   
   Typically, this will display something from a template
   or do some other task.
   
*/

$f = new phpFlickr($this->GetPreference('api_key'));

$photos = array();

if (isset($params['photoset']))
{
	$photoset = $f->photosets_getPhotos($params['photoset'], 'url_sq,url_s,url_m,url_t,url_o');
	
	if (isset($photoset['photoset']))
	{
		$photos = $photoset['photoset']['photo'];
	}
}

$this->smarty->assign('photos', $photos);

if (!isset($params['template']) || !$this->GetTemplate($params['template']))
{
	echo $this->ProcessTemplate('default.tpl');
}
else 
{
  echo $this->ProcessTemplateFromDatabase($params['template']);
} 

?>