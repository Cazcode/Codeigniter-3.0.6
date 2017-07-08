<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	public function index()
	{
		
		$temp = '';
		
		$template1 = '<li><a href="{link}">{title}</a></li>';
		
		$data1 = array(
	        array('title' => 'First Link', 'link' => '/first'),
	        array('title' => 'Second Link', 'link' => '/second'),
		);

		foreach ($data1 as $menuitem)
		{
		        $temp .= $this->parser->parse_string($template1, $menuitem, TRUE);
		}

		$template = '<ul>{menuitems}</ul>';
		
		$data = array(
				'blog_title' =>'el titulo de este pagina',
		        'menuitems' => $temp,
		);

		$this->parser->parse('welcome',$data);
	}
}
