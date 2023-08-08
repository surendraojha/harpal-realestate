<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BackupController extends Controller
{
    public function our_backup_database(){





           $get_all_table_query = "SHOW TABLES";
           $result = DB::select(DB::raw($get_all_table_query));

           $tables = [
            'about_us',
            'admin_menus',
            'admin_menu_items',
            'categories',
            'contact_categories',
            'contact_us',
            'customer_stories',
            'failed_jobs',
            'featured_properties',
            'features',
            'floors',
            'f_a_q_s',
            'home_page_products',
            'like_forums',
            'locations',
            'migrations',
            'news_letters',
            'our_services',
            'partners',
            'password_resets',
            'personal_access_tokens',
            'profile_locations',
            'properties',
            'property_features',
            'purposes',
            'recommended_properties',
            'road_sizes',
            'sessions',
            'settings',
            'shift_homes',
            'support_forums',
            'users',
            'user_profiles',
            'wish_lists'
        ];

           $structure = '';
           $data = '';
           foreach ($tables as $table) {
               $show_table_query = "SHOW CREATE TABLE " . $table . "";

               $show_table_result = DB::select(DB::raw($show_table_query));

               foreach ($show_table_result as $show_table_row) {
                   $show_table_row = (array)$show_table_row;
                   $structure .= "\n\n" . $show_table_row["Create Table"] . ";\n\n";
               }
               $select_query = "SELECT * FROM " . $table;
               $records = DB::select(DB::raw($select_query));

               foreach ($records as $record) {
                   $record = (array)$record;
                   $table_column_array = array_keys($record);
                   foreach ($table_column_array as $key => $name) {
                       $table_column_array[$key] = '`' . $table_column_array[$key] . '`';
                   }

                   $table_value_array = array_values($record);
                   $data .= "\nINSERT INTO $table (";

                   $data .= "" . implode(", ", $table_column_array) . ") VALUES \n";

                   foreach($table_value_array as $key => $record_column)
                       $table_value_array[$key] = addslashes($record_column);

                   $data .= "('" . implode("','", $table_value_array) . "');\n";
               }
           }


           $file_name = public_path().'/database_backup_on_' . date('y_m_d') . '.sql';
           $file_handle = fopen($file_name, 'w + ');

           $output = $structure . $data;
           fwrite($file_handle, $output);
           fclose($file_handle);
           echo "DB backup ready";


}
}
