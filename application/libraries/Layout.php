<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
 
class Layout
{
 
    var $obj;
    var $layout;
 
    function __construct($layout = "layout")
    {
        $this->obj =& get_instance();
        $this->layout = $layout;
    }
 
    function setLayout($layout)
    {
        $this->layout = $layout;
    }
 
    function view($view, $data=null, $return=false)
    {
        $loadedData = array();
        $tmp_view = $this->obj->load->view($view,$data,true);
 
        preg_match('/<body>(.*)<\/body>/s',$tmp_view, $body);
        preg_match('/<head>(.*)<\/head>/s',$tmp_view, $head);
        $loadedData['body'] =  $body[1];
        $loadedData['head'] = $head[1];
 
        if($return)
        {
            $output = $this->obj->load->view($this->layout, $loadedData, true);
            return $output;
        }
        else
        {
            $this->obj->load->view($this->layout, $loadedData, false);
        }
    }
}
?>
