#### Security added the 14th of February 2022

- Install limit login plugin : Limit Login Attempts
- hide WP version :
  - In functions.php add 
    ```php
    remove_action("wp_head", "wp_generator");
    ```
  - suppress the file readme.html can an option as well. Didnt do it here.
- Protect wp-config file, sensitive directories and htaccess file via .htaccess with :
```
<Files wp-config.php>
order allow,deny
deny from all
</Files>
```
```
Options All -Indexes
```
```
<Files .htaccess>
order allow,deny
deny from all
</Files>
```
- Deactivate files edit into wp :
```php
define('DISALLOW_FILE_EDIT',true);
```
- Install captcha plugin : Captcha bank
