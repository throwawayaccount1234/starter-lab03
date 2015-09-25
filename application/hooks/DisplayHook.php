<?php

/**
 * Overrides the display of specific elements before being shown to the user
 *
 * hooks/DisplayHook.php
 * 
 * @author Derek
 */
class DisplayHook {
    
    // changes output so that capitalized words are now bold (in "lead" class p tags)
    function boldCapitalizedWords() {
        $this->CI =& get_instance();
        $buffer = $this->CI->output->get_output(); // grab the output
        
        $tagPattern = "/<p class=\"lead\">(.*)<\/p>/";
        
        // insert strong tags where capitalized words are found
        function insertStrongTags($matches) {
            return preg_replace("/([A-Z]+[a-z]*)/", "<strong>$1</strong>", $matches[0]);
        }
        
        // match strings within "lead" class p tags, then bold capitalized words
        $newBuffer = preg_replace_callback($tagPattern, "insertStrongTags", $buffer);
        
        // set the new output
        $this->CI->output->set_output($newBuffer);
	$this->CI->output->_display();
    }
}
