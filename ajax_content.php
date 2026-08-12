<?php
$section = $_GET['section'] ?? 'home';
$section = preg_replace('/[^a-zA-Z0-9_-]/', '', $section);
$content = [
    'home' => '<h3>Home</h3><p>Welcome to the homepage section loaded via AJAX. No full refresh required.</p>',
    'products' => '<h3>Products</h3><p>Here are some product details loaded dynamically. This is useful for product listings and quick previews.</p>',
    'blog' => '<h3>Blog</h3><p>Blog post content is loaded from the server when the user clicks the blog menu item.</p>',
    'contact' => '<h3>Contact</h3><p>Contact section content can be loaded this way to keep the user experience smooth.</p>',
];

header('Content-Type: text/html; charset=UTF-8');
if (isset($content[$section])) {
    echo $content[$section];
} else {
    echo '<h3>Section not found</h3><p>The requested section does not exist.</p>';
}
