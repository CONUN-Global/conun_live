<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
 
 class BS_Router extends CI_Router{
	 
  	function _validate_request( $segments ){
    	
    	if( $segments[0] === $this->default_controller && $segments[1] === $this->method ){
			return $segments;
		}
		else{
			
			$i = 0;
			$dir = '';
			$root = APPPATH.'controllers/';
			array_splice( $segments, 0, $i );
			$path = APPPATH.'controllers'.$dir.'/';
			
			while( is_dir( $root.$dir.'/'.$segments[$i] ) ){
				$dir .= '/'.$segments[$i++];				
			}
						
			$this->directory .= $dir.'/';
			array_splice(  $segments, 0, $i );
			$path = APPPATH.'controllers'.$dir.'/';				
	  			
			if(file_exists( $path.$segments[0].EXT ) ){ // 첫번째가 폴더명과 동일하면
				
				if( count($segments) === 1 ) array_push( $segments, $this->method );
				return $segments;
				
      		}else if(file_exists( $path.$this->default_controller.EXT ) ){
	      		
	  			if( count($segments) === 0 ) array_push($segments, $this->method );
	  			array_unshift($segments, $this->default_controller );	  			
	  			return $segments;
      		}
      		
    	}
    	
		show_404($segments[0]);
  	}
}
?>