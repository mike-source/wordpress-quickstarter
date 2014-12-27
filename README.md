#Setup#

1. Clone this repo directly into the web directory (public_html, httpdocs, etc.) of your site:
        
        git clone https://github.com/mike-source/wordpress-starter.git .

2. Create databases for live, staging, development as required.

   From command line:

        mysql -u root -p
        
        (enter mysql root password)
        
        > CREATE USER 'dbuser'@'localhost' IDENTIFIED BY 'passw0rd!';
        > CREATE DATABASE dbname;
        > GRANT ALL PRIVILEGES ON dbname.* TO dbuser@localhost;
        > exit

3. Edit wp-config.php adding the database details for the LIVE (production) environment, and generating the 'Authentication Unique Keys and Salts', as with a normal Wordpress install.  

4. (Optional) Create a wp-config-local.php to override the database details locally.  

    Copy and paste the following into a new file and save as 'wp-config-local.php':
	
        <?php 
        // Local server settings
 
        define('WP_ENV', 'development');
         
        // Local Database
        define('DB_NAME', 'dbname');
        define('DB_USER', 'dbuser');
        define('DB_PASSWORD', 'dbpass');
        define('DB_HOST', 'localhost');
         
        // Turn on debug for local environment
        define('WP_DEBUG', true);

	
    Update this file with your local database details, 'wp-config-local.php' can not be included in the repository as it would override the live wp-config.php if deployed, it is excluded in .gitignore so needs to be re-added for each install.

5. Navigate to the web root in a browser and run Wordpress setup.