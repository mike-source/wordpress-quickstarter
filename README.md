The following instructions will provide you with:

- A fresh Git repository
- Blank MySQL Database
- Fresh install of wordpress (with core files in their own subdirectory)
- Blank theme
- Set up to compile Sass via Compass
- Easy system for changing config settings outside of the repo, via local config override (`wp-config-local.php`)

You may wish to tailor this README to be specific to the site you are developing.




#Setup#

1. Clone this repo directly into the live web directory (public_html, httpdocs, etc.) of your environment:

        git clone https://github.com/mike-source/wordpress-starter.git .

    You most likely will want to remove the /.git/ directory and initiate a new git repository:

        rm -rf .git
        git init

2. Download the latest copy (or any copy you wish) of wordpress and extract it to the `/wordpress/` directory.

	Linux/Unix:

        wget http://wordpress.org/latest.tar.gz
        tar -xzvf latest.tar.gz

	OSX:

        curl -O https://wordpress.org/latest.tar.gz
        tar -xvzf latest.tar.gz

    You should probably remove the archive file too:

    	rm latest.tar.gz

     Note: The `/wordpress` directory can just take any version of wordpress, dumped into that folder. This is also excluded from the git repo, so it is very easy to swap out different versions of wordpress for testing.


3. Create databases for live, staging, development as required.

   From a linux command line this is:

        mysql -u root -p

        (enter mysql root password)

        > CREATE USER 'dbuser'@'localhost' IDENTIFIED BY 'passw0rd!';
        > CREATE DATABASE dbname;
        > GRANT ALL PRIVILEGES ON dbname.* TO dbuser@localhost;
        > exit

4. Edit `wp-config.php` adding the database details for the LIVE (production) environment, and generating the 'Authentication Unique Keys and Salts', as with a normal Wordpress install.  

5. (Optional) Create a wp-config-local.php to override the database details locally.
	
	** For developing in multiple databases/locations it is extremely useful to be able to override certain settings in wp-config.php without committing them to the repository. This is done using an if statement in wp-config.php: **
	
		// If 'wp-config-local.php' exists, use those settings
		if ( file_exists( dirname( __FILE__ ) . '/wp-config-local.php' ) ) {
			include( dirname( __FILE__ ) . '/wp-config-local.php' );

		// Otherwise use the below settings (live server)
		} else {

     - `wp-config.php` - contains the above if statement, along with LIVE database details which act as a fallback if no override is found.
     
     - `wp-config-local.php` - contains the code below, which override settings for the local database, you can also alter paths to your HOME and CONTENT directories if your site isn't in the live web directory of your vhost.
    
    Copy and paste the following into a new file and save as 'wp-config-local.php':

        <?php
		// Local server settings
		
		define('WP_ENV', 'development');
		
		// Local Database
		define('DB_NAME', 'starter');
		define('DB_USER', 'dbuser');
		define('DB_PASSWORD', 'dbpass');
		define('DB_HOST', 'localhost');
		
		// Turn on debug for local environment
		define('WP_DEBUG', true);
		
		define('WP_SITEURL', 'http://' . $_SERVER['HTTP_HOST'] . '/wordpress');
		define('WP_HOME',    'http://' . $_SERVER['HTTP_HOST']);
		define('WP_CONTENT_DIR', $_SERVER['DOCUMENT_ROOT'] . '/wp-content');
		define('WP_CONTENT_URL', 'http://' . $_SERVER['HTTP_HOST'] . '/wp-content');


    Update this file with your local database details, '`wp-config-local.php`' can not be included in the repository as it would override the live wp-config.php if deployed, it is excluded in .gitignore so needs to be re-added for each install.

5. Navigate to the web root in a browser and run Wordpress setup.

6. Rename theme folder and give theme a name in style.css.

7. Now you're probably seeing a blank page when navigating to the web root in browser! That's because Wordpress is looking for "twentyfifteen" (or whatever is currently the default theme) and it's been removed. Fix this by logging into the admin and selecting your theme in Appearance > Themes.

8. Now would be a good time to make an initial git commit:

        git add .
        git commit -m "Initial Commit"


#SASS via Compass#

There is nothing to stop you from simply editing the theme's main.css file (`/wp-content/themes/assets/css/main.css`), you could happily work this way and simply delete the `/assets/sass/` directory and config.rb. Some people like to stick to what they know... (even though the switch takes minutes!)

The much much much better way to work would be to use SASS (specifically SCSS). If you're in any doubt as to why you should, a quick google on the advantages should convince you, e.g. read: http://alistapart.com/article/why-sass

The time you spend learning the basics of SASS (10-20 minutes) vs. the time you'll save using SASS makes it almost a no brainer.

The main obstacle for most people will be the set up, you need a way of compiling your .scss files into a nice concatenated .css file. There are various ways to do this, this project comes with a pre-configured Compass config (/assets/config.rb).

Steps to set up:

1. Make sure Compass is installed on your dev machine: http://compass-style.org/install/

2. Navigate to `/wp-content/themes/assets/` in a terminal.

3. Run compass:

        compass watch

4. Edit a file in the /sass folder, compass will now watch for any changes to these files and recompile css/main.css whenever it detects a change. Compass will actually make a `.css` file in `/css` for every `.scss` file it finds in `/sass`, so `sass/main.scss` compiles to `css/main.css`. Compass will ignore files that begin with an underscore (files it refers to as 'partials'). If you open up `sass/main.scss`, you'll see it includes all of the partials. It should be self explanatory how this works.

5. One of the first things you'll want to take advantage of is setting variables for fonts and colours in `/assets/sass/config/_variables.scss`.

6. There is a pre-included set of css reset rules based on normalize.css in `/assets/sass/config/_reset.scss`.

Its up to you to consider how necessary all of the above is on a per project basis, files can easily be removed, this should form a good basis
