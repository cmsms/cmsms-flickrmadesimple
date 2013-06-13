<?php
if (!isset($gCms)) exit;

if (! $this->CheckAccess())
  {
  return $this->DisplayErrorPage($id, $params, $returnid,$this->Lang('accessdenied'));
  }

/* -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

   Code for Flikr Made Simple "defaultadmin" admin action
   
   -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
   
   Typically, this will display something from a template
   or do some other task.
   
*/
if (FALSE == empty($params['active_tab']))
  {
    $tab = $params['active_tab'];
  } else {
  $tab = '';
 }

$this->smarty->assign('tab_headers',$this->StartTabHeaders().
  $this->SetTabHeader('galleries',$this->Lang('title_galleries'),('galleries' == $tab)?true:false).
  $this->SetTabHeader('templates',$this->Lang('title_templates'),('templates' == $tab)?true:false).
  $this->SetTabHeader('preferences',$this->Lang('title_preferences'),('preferences' == $tab)?true:false).
  $this->EndTabHeaders().$this->StartTabContent());
$this->smarty->assign('end_tab',$this->EndTab());
$this->smarty->assign('tab_footers',$this->EndTabContent());
$this->smarty->assign('start_galleries_tab',$this->StartTab('galleries'));
$this->smarty->assign('start_templates_tab',$this->StartTab('templates'));
$this->smarty->assign('start_preferences_tab',$this->StartTab('preferences'));
$this->smarty->assign('title_section','defaultadmin');


// Galleries
$galleries = array();
$api_key = $this->GetPreference('api_key');
$username = $this->GetPreference('username');
if (!empty($api_key) && !empty($username))
{
  $f = new phpFlickr($this->GetPreference('api_key'));  
  $nsid = $f->people_findByUsername($this->GetPreference('username'));
  $galleries = $f->galleries_getList($nsid['nsid']);
  $photosets = $f->photosets_getList($nsid['nsid']);
}

$this->smarty->assign('galleries', $galleries);
if (isset($photosets['photoset']))
{  
  $this->smarty->assign('photosets', $photosets['photoset']);
}
else
{
  $this->smarty->assign('photosets', array());
}

// TEMPLATES LIST

$template_list = $this->ListTemplates();

$rowclass = 'row1';

$templates = array();

foreach ($template_list as $template)
{
    $onerow = new stdClass();

    $onerow->name = $template;

    $onerow->deletelink = $this->CreateLink($id, 'deleteTemplate', $returnid, $gCms->variables['admintheme']->DisplayImage('icons/system/delete.gif', $this->Lang('deleteTemplate'),'','','systemicon'), array('template'=>$template), $this->Lang('areyousure'));
   
    $onerow->editlink = $this->CreateLink($id, 'manageTemplate', $returnid, $gCms->variables['admintheme']->DisplayImage('icons/system/edit.gif', $this->Lang('editTemplate'),'','','systemicon'), array('template'=>$template));

    $onerow->rowclass = $rowclass;

    $templates[] = $onerow;

    ($rowclass=="row1"?$rowclass="row2":$rowclass="row1");
}

$this->smarty->assign('templates', $templates);
$this->smarty->assign('title_template', $this->Lang('template'));    
$this->smarty->assign('addtemplatelink',$this->CreateLink($id, 'manageTemplate', '', $this->Lang('add_template'),array()));    
$this->smarty->assign('addtemplateicon',$this->CreateLink($id, 'manageTemplate', '', $gCms->variables['admintheme']->DisplayImage('icons/system/newobject.gif', $this->Lang('add_template'),'', '','systemicon'), array()));


// PREFERENCES

if(isset($params['api_key']) && !isset($params['cancelbutton']))
{
  $this->SetPreference('api_key', $params['api_key']);
}
$this->smarty->assign('api_key_title',$this->lang('api_key'));    
$this->smarty->assign('api_key',$this->CreateInputText($id, 'api_key', $this->GetPreference('api_key'), 80)); 

if(isset($params['username']) && !isset($params['cancelbutton']))
{
  $this->SetPreference('username', $params['username']);
}
$this->smarty->assign('username_title',$this->lang('username'));    
$this->smarty->assign('username',$this->CreateInputText($id, 'username', $this->GetPreference('username'), 80)); 

   
$this->smarty->assign('form_start', $this->CreateFormStart($id, 'defaultadmin', $returnid));
$this->smarty->assign('form_end',$this->CreateFormEnd());
$this->smarty->assign('pref_tabs',$this->CreateInputHidden($id, 'active_tab', 'preferences'));
$this->smarty->assign('submit', $this->CreateInputSubmit($id, 'submitbutton', $this->Lang('submit'))); 
$this->smarty->assign('cancel', $this->CreateInputSubmit($id, 'cancelbutton', $this->Lang('cancel')));




echo $this->ProcessTemplate('adminpanel.tpl');


?>