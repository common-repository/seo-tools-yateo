<?php

/*
Plugin Name: SEO TOOLS - YATEO
Plugin URI: https://www.yateo.com/
Description: Ouvre en un clic les outils indispensables pour le SEO.
Author: Agence de référencement YATEO
Version: 1.0
Author URI: https://www.yateo.com/agencedereferencement.html
*/


class YateoSEOTools 
{
	public function __construct()
	{
		add_action('admin_menu', array($this, 'add_admin_menu'), 20);
	}

	public function add_admin_menu()
	{
	    add_menu_page('Page SEO TOOLS - Yateo', 'Yateo Plugin', 'manage_options', 'seo-tools', array($this, 'content_html'));
	}

	public function content_html()
    {
    	global $wp;  
		$current_url = self::current_location();

    	$html = "";
        $html .= '<h1>'.get_admin_page_title().'</h1>';
        $html .= '<p>Ouvre en un clic les outils indispensables pour le SEO.</p>';
        $html .= '<p><a href="https://fr.semrush.com/analytics/organic/overview/?db=fr&q'.$current_url.'/&searchType=url" target="_blank">Semrush</a></p>';
        $html .= '<p><a href="https://ahrefs.com/site-explorer/overview/v2/subdomains/live?target='.$current_url.'%2F" target="_blank">Ahrefs</a></p>';
        $html .= '<p><a href="https://fr.majestic.com/reports/site-explorer?q='.$current_url.'&oq='.$current_url.'&IndexDataSource=F" target="_blank">Majestic SEO</a></p>';
        $html .= '<p><a href="https://developers.google.com/speed/pagespeed/insights/?url=tab.ur" target="_blank">Google Pagespeed</a></p>';
        $html .= '<p><a href="https://search.google.com/structured-data/testing-tool#url='.$current_url.'" target="_blank">Google Structured Datas</a></p>';

        echo $html;
    }

    public function current_location()
	{
	    if (isset($_SERVER['HTTPS']) && ($_SERVER['HTTPS'] == 'on' || $_SERVER['HTTPS'] == 1) 
	    	|| isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https') 
	        $protocol = 'https://';
	    else 
	        $protocol = 'http://';

	    return $protocol . $_SERVER['HTTP_HOST'];
	}
}

new YateoSEOTools();
