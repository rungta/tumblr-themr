<?php
// 
//  Themr for Tumblr
//  
//  Created by Prateek Rungta.
// 



// determine the output mode
// false  -> HTML
// true   -> Tumblr theme
define('THEMR_MODE', isset($_GET['tumblr']));

// constants
define('THEMR_DATA', 'default_data.json');  // default data file



// Themr
// 
// Class for translating template tags.
// Supports conditional blocks (contexts)
// and variables (data)
class Themr {
  
  var $data = array();
  var $contexts = array();
  var $context_stack = array();
  
  function __construct($data) {
    $this->data = $data;
    $this->context_stack = array($data);
  }
  
  private function push($key) {
    $context = $this->get($key);
    
    if ($context !== false && is_array($context)) {
      array_unshift($this->context_stack, $context);
      $this->contexts[$key] = true;
    } else {
      $this->contexts[$key] = null;
    }
    
    return $this->contexts[$key];
  }
  
  private function pop($key) {
    if (isset($this->contexts[$key])) array_shift($this->context_stack);
  }
  
  private function get($key) {
    $key = strtolower($key);
    
    foreach ($this->context_stack as $context) {
      if (isset($context[$key])) return $context[$key];
    }
    
    return false;
  }
  
  public function process($tag) {
    
    // determine if it is a block tag
    $block_tag = strpos($tag, ':') !== false;
    
    if ($block_tag) {
      $tag = explode(':', $tag);
      if ($tag[0] == 'block') {
        // push new context
        $this->push($tag[1]);
        
      } elseif ($tag[0] == '/block') {
        // pop old context
        $this->pop($tag[1]);
      }
      
      return;
    } else {
      
      // not a block tag, so look for value
      // in current contexts and print that
      
      $value = $this->get($tag);
      
      return $value === false ? "{".$tag."}" : $value;
    }   
  }
  
  // End of class
}



function styles($css) {
  if (THEMR_MODE) {
    
    // concat the CSS files
    echo "<style>\n";
    foreach ($css as $href => $media) {
      if ($media) { echo "@media $media {\n"; }
      echo "\n/***** $href *****/\n\n";
      readfile($href);
      echo "\n";
      if ($media) { echo "}\n\n"; }
    }
    echo "</style>";
    
  } else {
    
    // external <link> references
    foreach ($css as $href => $media) {
      echo '<link rel="stylesheet" href="'.$href.'"'.($media ? ' media="'.$media.'"' : '').">\n";
    }
  }
}

function scripts($js) {
  if (THEMR_MODE) {
    
    // concat the JS files
    echo "<script>\n//<![CDATA[\n";
    foreach ($js as $href) {
      readfile($href);
      echo "\n";
    }
    echo "//]]>\n</script>";
    
  } else {
    
    // external <script> references
    foreach ($js as $href) {
      echo "<script src=\"$href\"></script>\n";
    }
  }
}



// main
if (THEMR_MODE) {
  
  function _($tag) {
    echo "{".$tag."}".                            // spit out Tumblr tags
      (strpos($tag, ':') === false ? '' : "\n");  // newline character after {block:} tags
    return;
  }
  
} else {
  
  // try parsing the specified JSON file for use as theme data
  $json = null;
  if (isset($data_file)) $json = json_decode(file_get_contents($data_file), true);
  
  if (!$json) {
    // could not parse, so fallback to default data file
    $file = file_get_contents(THEMR_DATA);
    $json = json_decode($file, true);
  }
  
  $theme = new Themr($json);
  function _($tag) {
    global $theme;
    return $theme->process($tag);
  }
}



