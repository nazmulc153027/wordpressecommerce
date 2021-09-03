<?php

        include "src/ProcessCsv.php";

        $processCSV = new ProcessCsv($wpdb);
        $table = $_POST['table_name'];
        $file_type = $_POST['file_type'];
        $parsed_data = $processCSV->parseCSV($file_type);
        // print_r($parsed_data);exit;
        $fields = $processCSV->getFields($table);

        ?>
        <style>
            
        </style>
        <div class="wrapper flex-importer">
            <h3>Below table is showing 5 rows from your uploaded file.<br/> Select the related field for related column.</h3>
            <form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post">
                <input type="hidden" name="parsed_data" value='<?php echo serialize($parsed_data); ?>'>
                <input type="hidden" name="table" value="<?php echo $table; ?>" />
                <table>
                    <tbody>
                    <?php $p = 0;
                    foreach ($parsed_data as $key => $value) { ?>
                        <tr>
                            <?php
                            $n = 0;
                            foreach ($value as $skey => $svalue) { ?>
                                <td><?php echo $svalue; ?> </td>

                                <?php

                                $n++;
                            } ?>
                        </tr>
                        <?php $p++;
                        if ($p >= 5) {
                            break;
                        }
                    } ?>
                    <tr>
                        <?php for ($i = 0; $i <= $n - 1; $i++) { ?>
                            <td>
                                <select name="fields[<?php echo $i; ?>]" id="">
                                    <option value="">Select Field</option>
                                    <?php foreach ($fields as $fkey => $fvalue) { ?>
                                        <option value="<?php echo $fvalue; ?>"><?php echo $fvalue; ?></option>
                                    <?php } ?>
                                </select>
                            </td>
                        <?php } ?>
                    </tr>
                    </tbody>
                </table>
                <br>
                <input type="checkbox" name="ignore_file_header" value="1" /> <strong>Ignore File Header.</strong><small>(File header will be insert automatically in a row, to ignore it from inserting please check this.)</small><br/><br/>
                <input class="button button-primary" type="submit" name="upload_csv_data" value="Upload CSV Data">
            </form>
        </div>

