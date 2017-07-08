<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller 
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('table');
    }
	
	public function index()
	{
		$this->table->set_heading('Name', 'Color', 'Size');
		$this->table->add_row('Fred', 'Blue', 'Small');
		$this->table->add_row('Mary', 'Red', 'Large');
		$this->table->add_row('John', 'Green', 'Medium');

		echo $this->table->generate();

		$this->table->clear();

		$this->table->set_heading('Name', 'Day', 'Delivery');
		$this->table->add_row('Fred', 'Wednesday', 'Express');
		$this->table->add_row('Mary', 'Monday', 'Air');
		$this->table->add_row('John', 'Saturday', 'Overnight');

		echo $this->table->generate();
	}

}