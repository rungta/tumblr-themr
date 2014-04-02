Themr for Tumblr
============

A crude boilerplate and parser for local Tumblr theme development.

## Why?

[Tumblr theme files][tt] get bulky very quickly and become a nightmare to actively develop and maintain for two reasons:

1. Tumblr uses a [custom template language][tt] for its themes. Browsers don't understand these template tags, resulting in developers maintaining two separate files --- a pure HTML version with sample data that can be rendered by a browser, and a Tumblr theme version with the data replaced by template tags.

2. The theme must be a single file with the template tags, HTML scaffolding, all CSS declarations and JavaScript code included inline. 

**Themr** attempts to solve both these problems.

## How it Works

A Themr file is a PHP file where template tags are declared as PHP function calls, and external CSS & JavaScript files are included by reference.

The file is rendered as pure HTML by default, with the template tags being replaced by sample data and CSS and JavaScript file references being included using the corresponding `<link>` and `<script>` tags.

The same file can be rendered as a Tumblr theme file by appending the `?tumblr` GET parameter. In this case the template tags are left as is, and the CSS and JavaScript at combined and included inline.


[tt]:http://www.tumblr.com/docs/en/custom_themes
