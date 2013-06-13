<?php
if (!isset($gCms)) exit;

if (! $this->CheckPermission('Use NotificationTool')) {
  return $this->DisplayErrorPage($id, $params, $returnid,$this->Lang('accessdenied'));
}

/* -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

   Code for DocumentsLibrary "manageCategories" admin action
   
   -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
   
   Typically, this will display something from a template
   or do some other task.
   
*/

if (isset($params['template']))
{
	$this->DeleteTemplate($params['template']);
	
	$this->Redirect($id, 'defaultadmin', $returnid, array('active_tab' => 'templates'));

}
else 
{
		echo $this->ShowErrors($this->Lang('noidfound'));
}

?>