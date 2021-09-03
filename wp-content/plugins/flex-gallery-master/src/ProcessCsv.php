<?php
include_once(FLEXIMPORTER_PATH.'/vendor/autoload.php');
// use Excel;

class ProcessCsv
{
    //public $db = new Database();
    // public $fields = ["date", "task", "memo", "name", "hours", "charges"];
    public $wpdb;
    public function __construct($wpdb)
    {
        $this->wpdb = $wpdb;
    }

    public function parseCSV($type)
    {
        $input_file = $_FILES['csv']['tmp_name'];
        if($type == 'csv') {
            $data = array_map('str_getcsv', file($input_file));
        } else if ($type == 'xlsx' || $type == 'xlx') {
            // $data = Maatwebsite\Excel\Facades\Excel::load($input_file, function($reader) {})->get()->toArray();
            if ( $xlsx = SimpleXLSX::parse($input_file) ) {
                $data = $xlsx->rows();
            } else {
                echo SimpleXLSX::parseError();
            }
        }
        
        return $data;
    }

    public function getFields($table_name)
    {
        if(empty($table_name)) {
            return $this->fields;
        }
        $cols  = $this->wpdb->get_col( "DESC " . $table_name, 0 );
        if(empty($cols)) {
            return $this->fields;
        }
        return $cols;
    }

    public function importCsv($inputdata)
    {
        $csv_data = stripslashes($inputdata['parsed_data']);
        $csv_data = unserialize($csv_data);
        $table = $inputdata['table'];
        $ignore_file_header = !empty($_POST['ignore_file_header']) ? false : true;

        $n_rows = 1;
        foreach ($csv_data as $data) {
            if ( $ignore_file_header && $n_rows == 1) {
                $this->insertCSV($table, $data, $inputdata['fields']);
            } else if ( $n_rows > 1 ) {
                $this->insertCSV($table, $data, $inputdata['fields']);
            }
            $n_rows++;
        }
        $total_rows_inserted = $ignore_file_header ? ($n_rows - 1) : ($n_rows - 2);
        echo "<p>".$total_rows_inserted." rows inserted</p>";
        echo "<h3>CSV/XLSX file exported successfully</h3>";
    }

    public function insertCSV($table, $data, $input_fields)
    {
        global $wpdb;
        
        $insert_array = [];
        foreach ($input_fields as $key=>$field) {
            if(isset($input_fields[$key])){
                if( $field != null) {
                    $insert_array[$field] = $data[$key];
                } 
            }

        }
        
        $result = $wpdb->insert($table, $insert_array);
           
        return true;
    }

}