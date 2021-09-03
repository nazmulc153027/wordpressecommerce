<?php

/**
 * Plugin Name:       Flex Gallery
 * Description:       A gallery plugin by flexibleit!
 * Version:           1.0.0
 * Author:            Flexible It
 * Author URI:        https://flexibleit.net
 * Text Domain:       
 * License:           MIT
 * GitHub Plugin URI: 
 */

/*
 * Plugin constants
 */
if (!defined('FLEXGALLERY_URI'))
    define('FLEXGALLERY_URI', plugin_dir_url(__FILE__));
if (!defined('FLEXGALLERY_PATH'))
    define('FLEXGALLERY_PATH', plugin_dir_path(__FILE__));

/*
 * Main class
 */
/**
 * Class ProcessCsv
 *
 * This class creates the option page and add the web app script
 */
//include "Database.php";
class flexgallery
{
    public $csvData = [];
    /**
     * flexgallery constructor.
     *
     * The main plugin actions registered for WordPress
     */
    public function __construct()
    {
        add_action('admin_menu', array($this, 'addAdminMenu'));
        add_action('parse_csv', array($this, 'parseCsvData'));
        wp_enqueue_style('flexgallery-style', FLEXGALLERY_URI . 'assets/flexgallery.css');
    }

    /**
     * Adds the Feedier label to the WordPress Admin Sidebar Menu
     */
    public function addAdminMenu()
    {
        add_menu_page(
            __('Flex Gallery', 'flexgallery'),
            __('Flex Gallery', 'flexgallery'),
            'manage_options',
            'flexgallery',
            array($this, 'adminLayout'),
            ''
        );
        add_submenu_page(
            __('parse CSV', 'flexgallery'),
            __('ParseCSV', 'flexgallery'),
            'manage_options',
            'flexgallery',
            'parsecsv',
            'parseCsvData'
        );
    }




    /**
     * Outputs the Admin Dashboard layout containing the form with all its options
     *
     * @return void
     */
    public function adminLayout()
    {
        if (!is_user_logged_in()) {
            auth_redirect();
        }
        global $wpdb;
        if ($_POST['submit']) {

            include_once('process_csv.php');
        } elseif ($_POST['upload_csv_data']) {

            include_once('uploadCSV.php');
        } else {
?>
            <div class="wrap flex-importer">
                <h3><?php _e('Uploading csv file form', 'flexgallery'); ?></h3>
                <p>
                    <?php _e('You can upload a csv file with this form.', 'flexgallery'); ?>
                </p>
                <hr>
                <form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post" enctype="multipart/form-data">
                    <table class="form-table">
                        <tbody>
                            <tr>
                                <td scope="row">
                                    <label><?php _e('Select a table where you want to export :', 'flexgallery'); ?></label>
                                </td>
                                <td>
                                    <select name="table_name" id="">
                                        <?php $mytables = $wpdb->get_results('show tables');

                                        foreach ($mytables as $table) {
                                            $table = (array)$table;
                                            $table = reset($table);
                                            echo "<option value='" . $table . "'>" . $table . "</option>";
                                        }
                                        ?>

                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td scope="row">
                                    <label><?php _e('Select a CSV/xlsx file :', 'flexgallery'); ?></label>
                                </td>
                                <td>
                                    <input name="csv" class="regular-text" type="file" />
                                </td>
                            </tr>
                            <tr>
                                <td scope="row">
                                    <label><?php _e('File Type :', 'flexgallery'); ?></label>
                                </td>
                                <td>
                                    <select name="file_type" id="file_type">
                                        <option value="csv">CSV</option>
                                        <option value="xlsx">XLSX</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <input class="button button-primary" id="parse_csv" name="submit" type="submit" value="<?php _e('Save', 'flexgallery'); ?>">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </form>
            </div>
<?php
        }
    }
}
$flexgallery  = new flexgallery();
