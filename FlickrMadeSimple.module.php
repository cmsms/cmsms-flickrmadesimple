<?php
#-------------------------------------------------------------------------
# Module: Flikr Made Simple - This module allows you to manipulate your Flikr Library
# Version: 0.0.1, Jean-Christophe Cuvelier
#
#-------------------------------------------------------------------------
# CMS - CMS Made Simple is (c) 2010 by Ted Kulp (wishy@cmsmadesimple.org)
# This project's homepage is: http://www.cmsmadesimple.org
#
# This file originally created by ModuleMaker module, version 0.3.1
# Copyright (c) 2010 by Samuel Goldstein (sjg@cmsmadesimple.org) 
#
#-------------------------------------------------------------------------
#
# This program is free software; you can redistribute it and/or modify
# it under the terms of the GNU General Public License as published by
# the Free Software Foundation; either version 2 of the License, or
# (at your option) any later version.
#
# This program is distributed in the hope that it will be useful,
# but WITHOUT ANY WARRANTY; without even the implied warranty of
# MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
# GNU General Public License for more details.
# You should have received a copy of the GNU General Public License
# along with this program; if not, write to the Free Software
# Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA 02111-1307 USA
# Or read it online: http://www.gnu.org/licenses/licenses.html#GPL
#
#-------------------------------------------------------------------------

#-------------------------------------------------------------------------
# For Help building modules:
# - Read the Documentation as it becomes available at
#   http://dev.cmsmadesimple.org/
# - Check out the Skeleton Module for a commented example
# - Look at other modules, and learn from the source
# - Check out the forums at http://forums.cmsmadesimple.org
# - Chat with developers on the #cms IRC channel
#-------------------------------------------------------------------------
// require_once('lib/phpFlickr/phpFlickr.php');
// require_once('libraries/classes/MCFlickr.class.php');

class FlickrMadeSimple extends CMSModule
{

	function GetName()	{		return 'FlickrMadeSimple';	}

	function GetFriendlyName()	{		return $this->Lang('friendlyname');	}
	function GetVersion()	{		return '0.0.4';	}
	function GetHelp()	{		return $this->Lang('help');	}
	function GetAuthor()	{		return 'Jean-Christophe Cuvelier';	}
	function GetAuthorEmail()	{		return 'jcc@atomseeds.com';	}
	function GetChangeLog()	{		return $this->Lang('changelog');	}
	function IsPluginModule()	{		return true;	}
	function HasAdmin()	{		return true;	}
	function GetAdminSection()	{		return 'content';	}
	function GetAdminDescription()	{		return $this->Lang('admindescription');	}
	function VisibleToAdminUser()	{        return true;	}
	function CheckAccess($perm = '')		{		return $this->CheckPermission($perm);		}
	function SetParameters()
	{
	   $this->RegisterModulePlugin();
	}
  function DisplayErrorPage($id, &$params, $return_id, $message='')
    {
		$this->smarty->assign('title_error', $this->Lang('error'));
		$this->smarty->assign_by_ref('message', $message);

        // Display the populated template
        echo $this->ProcessTemplate('error.tpl');
    }
	function GetDependencies()
	{
		return array();
	}

	/*---------------------------------------------------------
	   MinimumCMSVersion()
	   Your module may require functions or objects from
	   a specific version of CMS Made Simple.
	   Ever since version 0.11, you can specify which minimum
	   CMS MS version is required for your module, which will
	   prevent it from being installed by a version of CMS that
	   can't run it.
	   
	   This method returns a string representing the
	   minimum version that this module requires.
	   ---------------------------------------------------------*/
	function MinimumCMSVersion()
	{
		return "1.9.0";
	}


	/*---------------------------------------------------------
	   MaximumCMSVersion()
	   You may want to prevent people from using your module in
	   future versions of CMS Made Simple, especially if you
	   think API features you use may change -- after all, you
	   never really know how the CMS MS API could evolve.
	   
	   So, to prevent people from flooding you with bug reports
	   when a new version of CMS MS is released, you can simply
	   restrict the version. Then, of course, the onus is on you
	   to release a new version of your module when a new version
	   of the CMS is released...
	   
	   This method returns a string representing the
	   maximum version that this module supports.
	   ---------------------------------------------------------*/
	/*function MaximumCMSVersion()
	{
		return "";
	}
*/

	/*---------------------------------------------------------
	   InstallPostMessage()
	   After installation, there may be things you want to
	   communicate to your admin. This function returns a
	   string which will be displayed.
	  ---------------------------------------------------------*/
	function InstallPostMessage()
	{
		return $this->Lang('postinstall');
	}

	/*---------------------------------------------------------
	   UninstallPostMessage()
	   After removing a module, there may be things you want to
	   communicate to your admin. This function returns a
	   string which will be displayed.
	  ---------------------------------------------------------*/
	function UninstallPostMessage()
	{
		return $this->Lang('postuninstall');
	}




	/**
	 * UninstallPreMessage()
	 * This allows you to display a message along with a Yes/No dialog box. If the user responds
	 * in the affirmative to your message, the uninstall will proceed. If they respond in the
	 * negative, the uninstall will be canceled. Thus, your message should be of the form
	 * "All module data will be deleted. Are you sure you want to uninstall this module?"
	 *
	 * If you don't want the dialog, have this method return a FALSE, which will cause the
	 * module to uninstall immediately if the user clicks the "uninstall" link.
	 */
	function UninstallPreMessage()
	{
		return $this->Lang('really_uninstall');
	}
	
}

?>
