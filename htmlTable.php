<?php


class htmlTable extends page {

	
  public function get()
    {  
//Get file name from URL and open it
		$filename = "uploads/" . $_REQUEST['filename'];
		$file = fopen($filename,"r");
	

// make the uploaded csv file an associative array
		$csvArray = array();
		while (($array = fgetcsv($file)) !== false)
          {
          $csvArray[] = $array;
          }
			fclose($file);

		  
		    $this->html .=  '<a href="/~an485/Project1/index.php?page=homepage&msg=Upload Another File"> << Upload another csv file</a><br>';
// start table tags by adding to this->html
			$this->html .=  '<table>';
            $this->html .=  '<tr>';

// Start a Foreach row as array to load the header row tr > th
		foreach($csvArray[0] as $value) 
		        { 
			   $this->html .= '<th class="header">' . htmlspecialchars($value) . '</th>';
				}
         $this->html .= '</tr>';
		
// process all rows in table html   tr > td
//create the <tr> row first after shifting past the first row [0] of $csvArray
        array_shift($csvArray);
		foreach($csvArray  as $value)
			  {
                   $this->html .= '<tr>';
            
//create another foreach to put each element in a td within that row
				      foreach($value as $value2)
					   {
                       $this->html .= '<td>' . htmlspecialchars($value2) . '</td>';
                       }   
// close the row tag frm tehe row forEach line 35
				  $this->html .= '</tr>';
               }  

//Close table tag
              $this->html .= '</table>';
    
//holy crp I think its working!! 
    }
		
}

?>