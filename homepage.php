<?php

class homepage extends page {

    public function get() {
		
		$this->html .= htmlTags::headingOne('Upload a CSV File to view as a Table');
		$form = '<form action="upload.php" method="post" enctype="multipart/form-data">';
        $form .= '<input type="file" name="fileToUpload" id="fileToUpload">';
        $form .= '<button type="submit" value="Upload" name="submit">Upload File</button>';
        $form .= '</form> ';
		
		
		//$errorMsg = $_REQUEST['error'];
		if (!empty($_REQUEST['msg'])) {
			
			$formMsg = $_REQUEST['msg'];
			$this->html .= htmlTags::message($formMsg);
			
		} else {
			$formMsg = '';	
		  }

		//load the form
        $this->html .= $form;

    }
}

?>