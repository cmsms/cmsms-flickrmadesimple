<?php
if (!isset($gCms)) exit;

/* -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

   Code for DocumentsLibrary "manageTemplate" admin action
   
   -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
   
   Typically, this will display something from a template
   or do some other task.
   
*/

// ROCK AND LOAD

if (isset($params['template']) && $params['template'] != '')
{
	$title = $params['template'];
	
	if (isset($params['submitbutton']) || isset($params['applybutton']))
	{
		$this->SetTemplate($params['template'], $params['templatedetails']);
		
		if (isset($params['submitbutton']))
		{
			$this->Redirect($id, 'defaultadmin', $returnid, array('active_tab' => 'templates'));
		}
	}
}
else 
{
	$title = '';
}

// DETAILS

	$this->smarty->assign('form_start', $this->CreateFormStart($id, 'manageTemplate', $returnid));
	
	
	$this->smarty->assign('title_template', $this->Lang('template_title'));
	$this->smarty->assign('input_template',$this->CreateInputText($id, 'template', $title, 50));
	
	if (isset($params['template']) && $params['template'] != '')
	{
		$templatecode = $this->GetTemplate($params['template']);
	}
	elseif (isset($params['templatedetails']))
	{
		$templatecode = $params['templatedetails'];
	}
	else 
	{
		$templatecode = '';
	}
	
	$this->smarty->assign('template_code', $this->Lang('template_code'));
	$this->smarty->assign('textarea_template', $this->CreateTextArea(true, $id, $templatecode, 'templatedetails', 'pagebigtextarea', '','', '', 90, 15, 'EditArea'));
	
	$this->smarty->assign('form_details_submit', $this->CreateInputSubmit($id, 'submitbutton', $this->Lang('submit')));
	$this->smarty->assign('form_details_apply', $this->CreateInputSubmit($id, 'applybutton', $this->Lang('apply')));

	$this->smarty->assign('form_end',$this->CreateFormEnd());

	$elements = '
	<h3>Variables</h3>
	<ul>
	 <li>array $photos</li>
	</ul>
  ';  
  
	$this->smarty->assign('elements', $elements);
	
	echo $this->ProcessTemplate('managetemplate.tpl');
	
?>