<?php header("Status: 403"); exit("Access denied."); ?>
---
<? if(stripos($_SERVER['HTTP_HOST'],'local.') !== false){ ?>
sql: 
  host: "localhost"
  username: "root"
  password: "root"
  database: "lifthousedesign"
  prefix: "blog_"
  adapter: "mysql"
url: "http://local.lifthousedesign.com/blog"
chyrp_url: "http://local.lifthousedesign.com/blog"
<? }else{ ?>
sql: 
  host: "localhost"
  username: "thomas"
  password: "Dsb6Zf3npPi8"
  database: "thomas_lhd"
  prefix: "blog_"
  adapter: "mysql"
url: "http://lifthousedesign.com/blog"
chyrp_url: "http://lifthousedesign.com/blog"
<? } ?>

name: "Lift House Blog"
description: "Lift House Design"
email: "bain.lifthousedesign@gmail.com"
timezone: "America/Chicago"
locale: "en_US"
check_updates: true
theme: "lhd"
admin_theme: "default"
posts_per_page: 5
feed_items: 20
feed_url: 
uploads_path: "/uploads/"
enable_trackbacking: true
send_pingbacks: false
enable_xmlrpc: true
enable_ajax: true
enable_wysiwyg: true
can_register: false
email_activation: false
enable_recaptcha: false
default_group: 2
guest_group: 5
clean_urls: true
post_url: "(url)/"
enabled_modules: 
  0: "cacher"
  1: "cascade"
  3: "tags"
  4: "theme_editor"
  5: "analytics"
enabled_feathers: 
  - "text"
routes: 
  tag/(name)/: "tag"
secure_hashkey: "c38fd5337b556570ff0511b88f68e540"
cache_expire: 1
cache_exclude: 
cache_memcached_hosts: 
ajax_scroll_auto: true
ga_tracking_number: "UA-40034269-1"
ga_script_position: "head"
