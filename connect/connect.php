<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://localhost:8080/wordpress/
 * @since             1.0.0
 * @package           Connect
 *
 * @wordpress-plugin
 * Plugin Name:       WP Connect
 * Plugin URI:        http://localhost:8080/wordpress/wp-admin/
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Aastha Yadav
 * Author URI:        http://localhost:8080/wordpress/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       connect
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'PLUGIN_NAME_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-connect-activator.php
 */
function activate_connect() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-connect-activator.php';
	Connect_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-connect-deactivator.php
 */
function deactivate_connect() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-connect-deactivator.php';
	Connect_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_connect' );
register_deactivation_hook( __FILE__, 'deactivate_connect' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-connect.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_connect() {

	$plugin = new Connect();
	$plugin->run();

}
run_connect();

function hello()
{
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "16it093";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) 
{
    die("Connection failed: " . mysqli_connect_error());
}
else
{
	echo "Successfully connected ";
}

$sql = "SELECT Id, Name FROM book_detail";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) 
{
    // output data of each row
	/* echo "<head>
        <style>
				div 
				{
    				background-color: lightgrey;
    				width: 300px;
    				border: 25px solid black;
    				padding: 25px;
   					margin: 25px;  					 
				}
		</style>
		</head>		
		";
		*/

		echo " <head>
				<style>
					marquee
					{
						fontcolor: darkblack;
						font style: bold;
						background-color: lightcyan;
						border: 15px solid black;
					}
				</style>
				</head>";

    while($row = mysqli_fetch_assoc($result)) 
    {
    	echo "
				<body>
				<div align=center border: 25px solid black>
    				<marquee direction = 'up'  scrolldelay = 180 fontcolor=black height=100 > ID: " . $row["Id"]. " - Name: " . $row["Name"]. 
    				"<br></marquee>
    			</div>
    			</body>";
    }
} 
else 
{
    echo "0 results";
}

mysqli_close($conn);

}
add_shortcode('aastha','hello');