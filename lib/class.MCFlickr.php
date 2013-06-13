<?php

	/*
	
	MCFlikr: Functions for the Flickr Made Simple Module.
	
	Copyright: Jean-Christophe Cuvelier 2010
	*/
	
	class MCFlickr
	{
		var $phpflickr; // Must have the phpFlikr instance...
		
		public function __construct($phpflickr)
		{
			$this->phpflickr = $phpflickr;
		}
		
		public function getUserNSID($username)
		{
			return $this->phpflickr->people_findByUsername($username);
		}
	}