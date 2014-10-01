<?php

function add_meta_title($string) {
    $CI =& get_instance();
    $CI->data['meta_title'] = e($string) . ' - ' . $CI->data['meta_title'];
}

function btn_edit($uri) {
    return anchor($uri,'<i class="glyphicon glyphicon-edit"></i>' );
}

function btn_delete($uri) {
    return anchor($uri, '<i class="glyphicon glyphicon-remove"></i>', array('onclick' => "return confirm('You are about to delete a record. This cannot be undone. Are you sure?');"));
}

function btn_download($uri) {
    return anchor($uri, '<i class="glyphicon glyphicon-cloud-download"></i>');
}

function article_link($article){
    return 'article/' . intval($article->id) . '/' . e($article->slug);
}
function blog_link($blog){
    return 'blog/' . intval($blog->id) . '/' . e($blog->slug);
}

function article_links($articles){
    $string = '<ul>';
    foreach ($articles as $article) {
            $url = article_link($article);
            $string .= '<li>';
            $string .= '<h4>' . anchor($url, e($article->title)) .  ' ›</h4>';
            $string .= '<p class="pubdate">' . e($article->pubdate) . '</p>';
            $string .= '</li>';
    }
    $string .= '</ul>';
    return $string;
}

function blog_links($blogs){
    $string = '<ul>';
    foreach ($blogs as $blog) {
            $url = blog_link($blog);
            $string .= '<li>';
            $string .= '<h4>' . anchor($url, e($blog->title)) .  ' ›</h4>';
            $string .= '<p class="pubdate">' . e($blog->created) . '</p>';
            $string .= '</li>';
    }
    $string .= '</ul>';
    return $string;
}


function get_excerpt($article, $numwords = 50){
    $string = '';
    $url = article_link($article);
    $string .='<h2>'. anchor($url, e($article->title)). '</h2>';
    $string .= '<p class="pubdate">' . e($article->pubdate) . '</p>';
    $string .= '<p>' . e(limit_to_numwords(strip_tags($article->body), $numwords)) . '</p>';
    $string .= '<p>' . anchor($url, 'Read more ›','class="btn btn-primary"',array('title' => e($article->title))) . '</p>';
    return $string;
}

function get_excerpt_blog($blog, $numwords = 50){
    $string = '';
    $url = blog_link($blog);
    $string .='<h2>'. anchor($url, e($blog->title)). '</h2>';
    $string .= 'by <a>' . e($blog->author) . '</a><p class="pubdate"> <span class="glyphicon glyphicon-time"></span>&nbsp;' . e($blog->created) . '</p>';
    //$string .= 'Tags <span class="glyphicon glyphicon-tag"></span> <a>' . e($tag->tag) . '</a><br>';
    $string .= '<p>' . e(limit_to_numwords(strip_tags($blog->body), $numwords)) . '</p>';
    $string .= '<p>' . anchor($url, 'Read more ›','class="btn btn-primary"',array('title' => e($blog->title))) . '</p>';
    return $string;
}

function limit_to_numwords($string, $numwords) {
    $excerpt = explode(' ', $string, $numwords + 1);
    if(count($excerpt) >= $numwords) {
        array_pop($excerpt);
    }
    $excerpt = implode(' ', $excerpt);
    return $excerpt;   
}

function separate_tags($string) {
    //TODO separate tags in blogs
    return $string;
}

function e($string){
    return htmlentities($string);
}

function get_menu($array, $child = FALSE) {
    
    $CI =& get_instance();
    $str = '';
    
    if(count($array)) {
        $str .= $child == FALSE ? '<ul class="nav navbar-nav">'. PHP_EOL : '<ul class="dropdown-menu">'. PHP_EOL;
        
        foreach ($array as $item) {
            
            $active = $CI->uri->segment(1) == $item['slug'] ? TRUE : FALSE;
            if(isset ($item['children']) && count($item['children'])) {
                $str .= $active ? '<li class="dropdown active">' : '<li class="dropdown">';
                $str .= '<a class="dropdown-toggle" data-toggle="dropdown" href="'. site_url(e(($item['slug']))).'">'. e($item['title']);
                $str .= '<b class="caret"></b></a>'. PHP_EOL;
                $str .= get_menu($item['children'], TRUE);
            }
            else {
                $str .= $active ? '<li class="active">' : '<li>';
                $str .= '<a href="'. site_url(e($item['slug'])). '">'. e($item['title']). '</a>';
            }
            $str .= '</li>' . PHP_EOL;
        }
        
        $str .= '</ul>' . PHP_EOL;
    }
    return $str;
}

function uri_active($string) {
    print $active = ($string == $this->uri->uri_string()) ? "active" : " ";
    
}


/**
 * Dump helper. Functions to dump variables to the screen, in a nicley formatted manner.
 * @author Joost van Veen
 * @version 1.0
 */
if (!function_exists('dump')) {
    function dump ($var, $label = 'Dump', $echo = TRUE)
    {
        // Store dump in variable 
        ob_start();
        var_dump($var);
        $output = ob_get_clean();
        
        // Add formatting
        $output = preg_replace("/\]\=\>\n(\s+)/m", "] => ", $output);
        $output = '<pre style="background: #FFFEEF; color: #000; border: 1px dotted #000; padding: 10px; margin: 10px 0; text-align: left;">' . $label . ' => ' . $output . '</pre>';
        
        // Output
        if ($echo == TRUE) {
            echo $output;
        }
        else {
            return $output;
        }
    }
}
 
 
if (!function_exists('dump_exit')) {
    function dump_exit($var, $label = 'Dump', $echo = TRUE) {
        dump ($var, $label, $echo);
        exit;
    }
}
