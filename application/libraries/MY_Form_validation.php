<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Form_validation extends CI_Form_validation {

    public function __construct($rules = array())
    {
        parent::__construct($rules);
    }
	 /**
	 * First Error
	 *
	 * Returns the first error messages as a string, wrapped in the error delimiters
	 *
	 * @access  public
	 * @param   string
	 * @param   string
	 * @return  str
	 */
	public function first_error($prefix = '', $suffix = '')
	{
	    // No errrors, validation passes!
	    if (count($this->_error_array) === 0)
	    {
	        return '';
	    }

	    if ($prefix == '')
	    {
	        $prefix = $this->_error_prefix;
	    }

	    if ($suffix == '')
	    {
	        $suffix = $this->_error_suffix;
	    }

	    // Generate the error string
	    $str = '';
	    foreach ($this->_error_array as $val)
	    {
	        if ($val != '')
	        {
	            return $prefix.$val.$suffix."\n";
	        }
	    }

	    return $str;
	}
	public function username_check($str)
    {
        if ($str == 'test')
        {
            $this->form_validation->set_message('nom', 'The %s field can not be the word "test"');
            return FALSE;
        }
        else
        {
            return TRUE;
        }
    }
}