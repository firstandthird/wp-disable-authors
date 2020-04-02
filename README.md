## Disable Authors

Disable authors

This plugin has already been approved by Wordpress for use in VIP installations.

### Installing on VIP GO

```shell
git submodule add https://github.com/firstandthird/wp-disable-authors.git plugins/wp-disable-authors
```

Add this to `client-mu-plugins/plugin-loader.php` or similar:

```php
wpcom_vip_load_plugin( 'wp-disable-authors' );
```

### Installing on other Wordpress installations

Download the latest release and copy the contents of the zip file to the plugins directory.

Activate the plugin.

### First use

Go to Settings ➡ Disable Authors

Adjusting settings as needed.

### Dev setup

`./run`

Open browser: http://localhost:8080

Install wordpress.

Activate plugin.

### Creating plugin zip

`./run generate-package`