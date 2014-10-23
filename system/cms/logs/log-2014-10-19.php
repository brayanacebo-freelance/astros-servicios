<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>

ERROR - 2014-10-19 21:30:59 --> Page Missing: img/favicon.png
ERROR - 2014-10-19 21:30:59 --> Plugin method "img" does not exist on class "Plugin_Theme".
ERROR - 2014-10-19 21:41:18 --> Severity: Warning  --> mkdir(): File exists /Applications/XAMPP/xamppfiles/htdocs/boilerplates/pyro-v2/addons/shared_addons/modules/albums/details.php 33
ERROR - 2014-10-19 21:43:38 --> Severity: Warning  --> rmdir(uploads/default/albums): Directory not empty /Applications/XAMPP/xamppfiles/htdocs/boilerplates/pyro-v2/addons/shared_addons/modules/albums/details.php 237
ERROR - 2014-10-19 21:49:51 --> Severity: Warning  --> mkdir(): File exists /Applications/XAMPP/xamppfiles/htdocs/boilerplates/pyro-v2/addons/shared_addons/modules/albums/details.php 30
ERROR - 2014-10-19 14:49:59 --> Severity: Notice  --> Undefined property: CI::$album_category_model /Applications/XAMPP/xamppfiles/htdocs/boilerplates/pyro-v2/system/cms/libraries/MX/Controller.php 57
ERROR - 2014-10-19 14:52:04 --> Severity: Notice  --> Undefined variable: intro /Applications/XAMPP/xamppfiles/htdocs/boilerplates/pyro-v2/addons/shared_addons/modules/albums/views/admin/index.php 56
ERROR - 2014-10-19 14:52:04 --> Severity: Notice  --> Trying to get property of non-object /Applications/XAMPP/xamppfiles/htdocs/boilerplates/pyro-v2/addons/shared_addons/modules/albums/views/admin/index.php 56
ERROR - 2014-10-19 14:59:31 --> Severity: Notice  --> Undefined property: CI::$album_category_model /Applications/XAMPP/xamppfiles/htdocs/boilerplates/pyro-v2/system/cms/libraries/MX/Controller.php 57
ERROR - 2014-10-19 15:00:10 --> Severity: Notice  --> Undefined variable: categories /Applications/XAMPP/xamppfiles/htdocs/boilerplates/pyro-v2/addons/shared_addons/modules/albums/views/admin/create.php 40
ERROR - 2014-10-19 15:00:10 --> Severity: Warning  --> Invalid argument supplied for foreach() /Applications/XAMPP/xamppfiles/htdocs/boilerplates/pyro-v2/addons/shared_addons/modules/albums/views/admin/create.php 40
ERROR - 2014-10-19 15:00:47 --> Severity: Notice  --> Undefined variable: categories /Applications/XAMPP/xamppfiles/htdocs/boilerplates/pyro-v2/addons/shared_addons/modules/albums/views/admin/create.php 40
ERROR - 2014-10-19 15:00:47 --> Severity: Warning  --> Invalid argument supplied for foreach() /Applications/XAMPP/xamppfiles/htdocs/boilerplates/pyro-v2/addons/shared_addons/modules/albums/views/admin/create.php 40
ERROR - 2014-10-19 15:02:54 --> Severity: Notice  --> Undefined variable: categories /Applications/XAMPP/xamppfiles/htdocs/boilerplates/pyro-v2/addons/shared_addons/modules/albums/views/admin/create.php 88
ERROR - 2014-10-19 15:02:54 --> Severity: Warning  --> Invalid argument supplied for foreach() /Applications/XAMPP/xamppfiles/htdocs/boilerplates/pyro-v2/addons/shared_addons/modules/albums/views/admin/create.php 88
ERROR - 2014-10-19 15:03:09 --> Severity: Notice  --> Undefined variable: categories /Applications/XAMPP/xamppfiles/htdocs/boilerplates/pyro-v2/addons/shared_addons/modules/albums/views/admin/create.php 95
ERROR - 2014-10-19 15:03:09 --> Severity: Warning  --> Invalid argument supplied for foreach() /Applications/XAMPP/xamppfiles/htdocs/boilerplates/pyro-v2/addons/shared_addons/modules/albums/views/admin/create.php 95
ERROR - 2014-10-19 15:08:17 --> Severity: Notice  --> Undefined property: CI::$album_category_model /Applications/XAMPP/xamppfiles/htdocs/boilerplates/pyro-v2/system/cms/libraries/MX/Controller.php 57
ERROR - 2014-10-19 15:09:55 --> Severity: Notice  --> Undefined variable: category /Applications/XAMPP/xamppfiles/htdocs/boilerplates/pyro-v2/addons/shared_addons/modules/albums/views/admin/edit.php 29
ERROR - 2014-10-19 15:09:55 --> Severity: Notice  --> Trying to get property of non-object /Applications/XAMPP/xamppfiles/htdocs/boilerplates/pyro-v2/addons/shared_addons/modules/albums/views/admin/edit.php 29
ERROR - 2014-10-19 15:11:01 --> Page Missing: admin/albums/delete/3
ERROR - 2014-10-19 15:23:12 --> Page Missing: admin/albums/images4
ERROR - 2014-10-19 15:25:49 --> Query error: Column 'album_id' cannot be null - Invalid query: INSERT INTO `default_album_images` (`album_id`, `path`) VALUES (NULL, 'uploads/default/albums/307bbd755a2c63190cf66d3d56b86c95.jpeg')
ERROR - 2014-10-19 15:29:15 --> Severity: Notice  --> Undefined variable: album_id /Applications/XAMPP/xamppfiles/htdocs/boilerplates/pyro-v2/addons/shared_addons/modules/albums/controllers/admin.php 223
ERROR - 2014-10-19 22:55:28 --> Page Missing: img/favicon.png
ERROR - 2014-10-19 22:55:28 --> Plugin method "img" does not exist on class "Plugin_Theme".
ERROR - 2014-10-19 23:17:21 --> Query error: Too big precision 455 specified for column 'date'. Maximum is 6. - Invalid query: CREATE TABLE `default_perfil_chapters` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`title` VARCHAR(455) NULL,
	`slug` VARCHAR(455) NULL,
	`date` DATETIME(455) NULL,
	`country` VARCHAR(455) NULL,
	`video` VARCHAR(455) NULL,
	`description` TEXT NULL,
	`created_at` DATETIME NOT NULL,
	`updated_at` TIMESTAMP NOT NULL,
	PRIMARY KEY `id` (`id`)
) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
ERROR - 2014-10-19 23:17:42 --> Severity: Warning  --> mkdir(): File exists /Applications/XAMPP/xamppfiles/htdocs/freelos/marthaisabelbolanos/addons/shared_addons/modules/perfil/details.php 31
ERROR - 2014-10-19 16:17:50 --> Query error: Table 'marthaisabelbolanos.default_perfil_chapter' doesn't exist - Invalid query: SELECT COUNT(*) AS `numrows` FROM `default_perfil_chapter`
ERROR - 2014-10-19 16:44:51 --> Severity: Notice  --> Undefined variable: post /Applications/XAMPP/xamppfiles/htdocs/freelos/marthaisabelbolanos/addons/shared_addons/modules/perfil/views/admin/create.php 30
ERROR - 2014-10-19 16:44:51 --> Severity: Notice  --> Trying to get property of non-object /Applications/XAMPP/xamppfiles/htdocs/freelos/marthaisabelbolanos/addons/shared_addons/modules/perfil/views/admin/create.php 30
ERROR - 2014-10-19 16:59:19 --> Page Missing: admin/perfil/edit/1
ERROR - 2014-10-19 17:00:32 --> Severity: Notice  --> Undefined variable: chapters /Applications/XAMPP/xamppfiles/htdocs/freelos/marthaisabelbolanos/addons/shared_addons/modules/perfil/controllers/admin.php 110
ERROR - 2014-10-19 17:15:17 --> Query error: Table 'marthaisabelbolanos.default_perfil_chapters_images_model' doesn't exist - Invalid query: SELECT *
FROM `default_perfil_chapters_images_model`
WHERE `chapters_id` =  '1'
ERROR - 2014-10-19 17:16:39 --> Severity: Notice  --> Undefined property: stdClass::$name /Applications/XAMPP/xamppfiles/htdocs/freelos/marthaisabelbolanos/addons/shared_addons/modules/perfil/views/admin/images.php 5
ERROR - 2014-10-19 17:16:39 --> Severity: Notice  --> Undefined variable: album /Applications/XAMPP/xamppfiles/htdocs/freelos/marthaisabelbolanos/addons/shared_addons/modules/perfil/views/admin/images.php 9
ERROR - 2014-10-19 17:16:39 --> Severity: Notice  --> Trying to get property of non-object /Applications/XAMPP/xamppfiles/htdocs/freelos/marthaisabelbolanos/addons/shared_addons/modules/perfil/views/admin/images.php 9
ERROR - 2014-10-19 17:17:12 --> Severity: Notice  --> Undefined variable: album /Applications/XAMPP/xamppfiles/htdocs/freelos/marthaisabelbolanos/addons/shared_addons/modules/perfil/views/admin/images.php 9
ERROR - 2014-10-19 17:17:12 --> Severity: Notice  --> Trying to get property of non-object /Applications/XAMPP/xamppfiles/htdocs/freelos/marthaisabelbolanos/addons/shared_addons/modules/perfil/views/admin/images.php 9
ERROR - 2014-10-19 17:17:32 --> Severity: Notice  --> Undefined variable: album /Applications/XAMPP/xamppfiles/htdocs/freelos/marthaisabelbolanos/addons/shared_addons/modules/perfil/views/admin/images.php 9
ERROR - 2014-10-19 17:17:32 --> Severity: Notice  --> Trying to get property of non-object /Applications/XAMPP/xamppfiles/htdocs/freelos/marthaisabelbolanos/addons/shared_addons/modules/perfil/views/admin/images.php 9
ERROR - 2014-10-19 17:17:35 --> Severity: Notice  --> Undefined variable: album /Applications/XAMPP/xamppfiles/htdocs/freelos/marthaisabelbolanos/addons/shared_addons/modules/perfil/views/admin/images.php 9
ERROR - 2014-10-19 17:17:35 --> Severity: Notice  --> Trying to get property of non-object /Applications/XAMPP/xamppfiles/htdocs/freelos/marthaisabelbolanos/addons/shared_addons/modules/perfil/views/admin/images.php 9
ERROR - 2014-10-19 17:20:39 --> Severity: Notice  --> Undefined variable: album /Applications/XAMPP/xamppfiles/htdocs/freelos/marthaisabelbolanos/addons/shared_addons/modules/perfil/views/admin/create_image.php 5
ERROR - 2014-10-19 17:20:39 --> Severity: Notice  --> Trying to get property of non-object /Applications/XAMPP/xamppfiles/htdocs/freelos/marthaisabelbolanos/addons/shared_addons/modules/perfil/views/admin/create_image.php 5
ERROR - 2014-10-19 17:20:39 --> Severity: Notice  --> Undefined variable: album /Applications/XAMPP/xamppfiles/htdocs/freelos/marthaisabelbolanos/addons/shared_addons/modules/perfil/views/admin/create_image.php 49
ERROR - 2014-10-19 17:20:39 --> Severity: Notice  --> Trying to get property of non-object /Applications/XAMPP/xamppfiles/htdocs/freelos/marthaisabelbolanos/addons/shared_addons/modules/perfil/views/admin/create_image.php 49
ERROR - 2014-10-19 17:20:39 --> Severity: Notice  --> Undefined variable: album /Applications/XAMPP/xamppfiles/htdocs/freelos/marthaisabelbolanos/addons/shared_addons/modules/perfil/views/admin/create_image.php 51
ERROR - 2014-10-19 17:20:39 --> Severity: Notice  --> Trying to get property of non-object /Applications/XAMPP/xamppfiles/htdocs/freelos/marthaisabelbolanos/addons/shared_addons/modules/perfil/views/admin/create_image.php 51
ERROR - 2014-10-19 17:22:00 --> Severity: Notice  --> Undefined property: stdClass::$name /Applications/XAMPP/xamppfiles/htdocs/freelos/marthaisabelbolanos/addons/shared_addons/modules/perfil/views/admin/create_image.php 5
ERROR - 2014-10-19 17:22:22 --> Severity: Notice  --> Undefined property: stdClass::$path /Applications/XAMPP/xamppfiles/htdocs/freelos/marthaisabelbolanos/addons/shared_addons/modules/perfil/views/admin/images.php 23
ERROR - 2014-10-19 17:22:22 --> Severity: Notice  --> Undefined variable: album /Applications/XAMPP/xamppfiles/htdocs/freelos/marthaisabelbolanos/addons/shared_addons/modules/perfil/views/admin/images.php 26
ERROR - 2014-10-19 17:22:22 --> Severity: Notice  --> Trying to get property of non-object /Applications/XAMPP/xamppfiles/htdocs/freelos/marthaisabelbolanos/addons/shared_addons/modules/perfil/views/admin/images.php 26
ERROR - 2014-10-19 17:22:42 --> Severity: Notice  --> Undefined variable: album /Applications/XAMPP/xamppfiles/htdocs/freelos/marthaisabelbolanos/addons/shared_addons/modules/perfil/views/admin/images.php 26
ERROR - 2014-10-19 17:22:42 --> Severity: Notice  --> Trying to get property of non-object /Applications/XAMPP/xamppfiles/htdocs/freelos/marthaisabelbolanos/addons/shared_addons/modules/perfil/views/admin/images.php 26
ERROR - 2014-10-19 17:22:57 --> Severity: Notice  --> Undefined variable: perfil /Applications/XAMPP/xamppfiles/htdocs/freelos/marthaisabelbolanos/addons/shared_addons/modules/perfil/views/admin/images.php 26
ERROR - 2014-10-19 17:22:57 --> Severity: Notice  --> Trying to get property of non-object /Applications/XAMPP/xamppfiles/htdocs/freelos/marthaisabelbolanos/addons/shared_addons/modules/perfil/views/admin/images.php 26
ERROR - 2014-10-19 17:24:01 --> Severity: Notice  --> Undefined property: stdClass::$path /Applications/XAMPP/xamppfiles/htdocs/freelos/marthaisabelbolanos/addons/shared_addons/modules/perfil/controllers/admin.php 228
ERROR - 2014-10-19 17:24:01 --> Severity: Warning  --> unlink(): No such file or directory /Applications/XAMPP/xamppfiles/htdocs/freelos/marthaisabelbolanos/addons/shared_addons/modules/perfil/controllers/admin.php 228
ERROR - 2014-10-19 17:31:08 --> Severity: Notice  --> Undefined property: stdClass::$id /Applications/XAMPP/xamppfiles/htdocs/freelos/marthaisabelbolanos/addons/shared_addons/modules/perfil/controllers/admin.php 62
ERROR - 2014-10-19 17:31:13 --> Severity: Notice  --> Undefined property: stdClass::$id /Applications/XAMPP/xamppfiles/htdocs/freelos/marthaisabelbolanos/addons/shared_addons/modules/perfil/controllers/admin.php 62
