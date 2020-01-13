<?php 
/**
 * @package WordPress
 * @subpackage Elegence_Playquet
 * @since 1.0.0
 */

if( !class_exists( 'Elegenec_Nav_Walker' ) ){

	class Elegence_Nav_Walker extends Walker_Nav_Menu{

		public function start_lvl(&$output, $depth = 0, $args = array()) {
	        $html = '';
	        parent::start_lvl($html, $depth, $args);
	        $html = str_replace('sub-menu', 'dropdown-menu', $html);
	        $output .= $html;
	    }

		public function start_el(&$output, $item, $depth=0, $args=array(), $id = 0) {
	    	$object = $item->object;
	    	$type = $item->type;
	    	$title = $item->title;
	    	$description = $item->description;
	    	$permalink = $item->url;
	    	foreach ( $item->classes as $class_key => $class) {
	    		if( $class == 'current_page_item' ){
	    			unset($item->classes[$class_key]);
	    			$item->classes[] = 'active';
	    		}
	    		if( $class == 'menu-item-has-children' ){
	    			$item->classes[] = 'dropdown';
	    		}
	    	}
	      	$output .= "<li class='" .  implode(" ", $item->classes) . " nav-item'>";
	        
		      //Add SPAN if no Permalink
		    if( $permalink ) {
		    	$menu_icon =  $button_color = '';
		    	if( in_array( 'button-menu', $item->classes ) ){
		    		$menu_icon =  $item->icon;
		    		$button_color = "style='background : " . $item->button['background'] . "; color : " . $item->button['color']. "'";
		    	}
		      	if( in_array( 'menu-item-has-children', $item->classes ) ){
		      		$output .= '<a class="dropdown-toggle nav-link" data-toggle="dropdown" href="' . $permalink . '">';
		      	}
		      	else{
		      		$output .= '<a class="nav-link" href="' . $permalink . '" ' . $button_color . '>' . $menu_icon ;
		      	}
		    } 
		    else {
		      	$output .= '<span>';
		    }
		       
		    $output .= in_array( 'menu-item-home', $item->classes ) ? '<i class="fa fa-home" aria-hidden="true"></i>
' : $title;
		   $output .= in_array( 'menu-item-has-children', $item->classes ) ? '<span class="caret"></span>' : '';   
		      if( $permalink  ) {
		      	$output .= '</a>';
		      } else {
		      	$output .= '</span>';
		      }
	    }
	}

}
