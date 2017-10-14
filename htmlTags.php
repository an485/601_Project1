<?php
  class htmlTags {
	  
    static public function headingOne($text) {
      return '<h1>' . $text . '</h1>';
    }
	   static public function message($text) {
      return '<span class="error">' . $text . '</span>';
    }
  }
?>