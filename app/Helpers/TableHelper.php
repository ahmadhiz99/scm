<?php
namespace App\Helpers;
use Illuminate\Support\Facades\DB;


class TableHelper
{
    public static function index($table, $config)
    {
        // Data table
        $column = DB::getSchemaBuilder()->getColumnListing(($table)->getTable());


        foreach($column as $column){
            if(array_search($column, $config['field_block']) == false){
                if(isset($config['field_rename'][$column]) && $config['field_rename'][$column] != NULL){
                    $result[$column] = $config['field_rename'][$column] ;
                }else{
                    $result[$column] =  ucwords(implode(' ',preg_split('/(?=[A-Z])/', str_replace('_', ' ', $column) )));

                }
            }
        }

        return $result;
    }
}