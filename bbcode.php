<?PHP
function bbcode_format ($str) {  
    //$str = htmlentities($str);  
  
    $simple_search = array(  
                //added line break  
                '/\[br\]/is',  
                '/\[b\](.*?)\[\/b\]/is',  
                '/\[i\](.*?)\[\/i\]/is',  
                '/\[u\](.*?)\[\/u\]/is',  
                '/\[a\:(left|center|right|justify)\](.*?)\[\/a\]/is',  
                '/\[font\:(.*?)\](.*?)\[\/font\]/is',  
                '/\[size\:(.*?)\](.*?)\[\/size\]/is',  
                '/\[c\:(.*?)\](.*?)\[\/c\]/is',  
               	);  
  
    $simple_replace = array(  
				//added line break  
               '<br />',  
                '<strong>$1</strong>',  
                '<em>$1</em>',  
                '<u>$1</u>',  
				// added nofollow to prevent spam  
                '<div style="text-align: $1;">$2</div>',  
				//added alt attribute for validation  
                '<span style="font-family: $1;">$2</span>',  
                '<span style="font-size: $1;">$2</span>',  
                '<span style="color: $1;">$2</span>',    
                );  
  
    // Do simple BBCode's  
    $str = preg_replace ($simple_search, $simple_replace, $str);  
  
    return $str;  
}
?>