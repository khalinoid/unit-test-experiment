<?php
/*
Plugin Name: Author Display
Description: Displays author data on custom route /user/{username}
Version: 1.0
Author: Your Name
*/

// Prevent direct file access
if (!defined('ABSPATH')) {
    exit;
}

class Author_Display {
    public function __construct() {
        // Initialize with high priority
        add_action('init', array($this, 'add_rewrite_rules'), 1);
        add_filter('query_vars', array($this, 'add_query_vars'));
        add_filter('template_include', array($this, 'load_template'), 99);
        add_filter('pre_handle_404', array($this, 'prevent_404'), 10, 2);
    }

    // addes routing query site-url/user/[username]
    public function add_rewrite_rules() {
        add_rewrite_rule(
            '^user/([^/]+)/?$',
            'index.php?author_username=$matches[1]&author_page=true',
            'top'
        );
        
        // Add custom endpoint
        add_rewrite_endpoint('user', EP_ROOT);
    }

    public function add_query_vars($vars) {
        $vars[] = 'author_username';
        $vars[] = 'author_page';
        return $vars;
    }

    public function prevent_404($handled, $wp_query) {
        if (get_query_var('author_page') || get_query_var('author_username')) {
            return true;
        }
        return $handled;
    }

    public function load_template($template) {
        $author_username = get_query_var('author_username');
        
        if (!$author_username || !get_query_var('author_page')) {
            return $template;
        }

        // Get author data
        $author = get_user_by('login', $author_username);
        
        if (!$author) {
            return get_404_template();
        }

        // Make author data available to template
        set_query_var('author', $author);

        // Set up author query
        global $wp_query;
        $wp_query->is_author = true;
        
        // Return our template
        return plugin_dir_path(__FILE__) . 'author-template.php';
    }
}