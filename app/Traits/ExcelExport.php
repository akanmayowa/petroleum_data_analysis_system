<?php

namespace App\Traits;

trait ExcelExport
{
    private function exportToExcelDropDown($worksheetname, $data)
    {
        return \Excel::create($worksheetname, function ($excel) use ($data) {
            foreach ($data as $sheetname=>$realdata) {
                $excel->sheet($sheetname, function ($sheet) use ($realdata, $sheetname, $data) {
                    $last = collect($data)->last();
                    $sheet->fromArray($realdata[0]);

                    if ($sheetname == $last[2]) {
                        $i = 1;
                        foreach ($data as $key=>$data) {
                            $Cell = $data[1];
                            if ($data[1] != '') {
                                $sheet->_parent->addNamedRange(
                                new \PHPExcel_NamedRange(
                                    "sd{$data[1]}", $sheet->_parent->getSheet($i), 'B2:B'.$sheet->_parent->getSheet($i)->getHighestRow()
                                )
                            );
                                $i++;
                                for ($j = 2; $j <= 500; $j++) {
                                    $objValidation = $sheet->_parent->getSheet(0)->getCell("{$data[1]}$j")->getDataValidation();
                                    $objValidation->setType(\PHPExcel_Cell_DataValidation::TYPE_LIST);
                                    $objValidation->setErrorStyle(\PHPExcel_Cell_DataValidation::STYLE_INFORMATION);
                                    $objValidation->setAllowBlank(false);
                                    $objValidation->setShowInputMessage(true);
                                    $objValidation->setShowErrorMessage(true);
                                    $objValidation->setShowDropDown(true);
                                    $objValidation->setErrorTitle('Input error');
                                    $objValidation->setError('Value is not in list.');
                                    $objValidation->setPromptTitle('Pick from list');
                                    // $objValidation->setPrompt('Please pick a value from the drop-down list.');
                                    $objValidation->setFormula1("sd{$data[1]}");
                                }
                            }
                        }
                    }
                });
            }
        })->download('xlsx');
    }

    public function resolveModelId($model, $column_name, $value)
    {
        $id = $model::where($column_name, $value)->value('id');
        if (! is_null($id)) {
            return $id;
        } else {
            return 0;
        }
        // throw new \Exception(str_replace('\\App', '', $model). ' not valid');
    }

    public function resolveMasterData($modelName, $columnName, $row, $ROW)  //model_name, $column, like_text,  exact_text
    {
        $result = [];
        // $no_spec_char = preg_replace('/[^\X20-\x7E]/', '', $ROW);
        // $with_spec_char = preg_replace('/\s/', '-', $ROW);
        //all db calls
        $found = $modelName::where($columnName, 'like', "%{$ROW}%")->get();
        $exact = $modelName::where($columnName, $ROW)->first();
        // $clean_exact = $modelName::where($columnName, $no_spec_char)->first();
        // $spec_exact = $modelName::where($columnName, $with_spec_char)->first();

        $multi = $modelName::where($columnName, 'like', "%{$ROW}%")->first();

        //return $found[0]->id;

        //ONE RECORD FOUND
        if ($exact) {
            if (strlen($exact->$columnName) == strlen($ROW)) {
                $name_id = $exact->id;
                $stage_id = 0;
                $result = ['name' => $name_id, 'stage_id' => $stage_id];
            } else {
                $name_id = $ROW;
                $stage_id = 3;
                $result = ['name' => $name_id, 'stage_id' => $stage_id];
            }
        }
        //NO RECORD FOUND
        else {
            $name_id = $ROW;
            $stage_id = 3;
            $result = ['name' => $name_id, 'stage_id' => $stage_id];
        }

        return $result;
    }

    public function resolveMasterDataOld($modelName, $columnName, $row, $ROW)  //model_name, $column, like_text,  exact_text
    {
        $result = [];
        //removing all special characters  return $row;
        $ROW = ltrim($ROW);
        $ROW = rtrim($ROW);
        // $no_spec_char = preg_replace('/[^\X20-\x7E]/', '', $ROW);
        // $with_spec_char = preg_replace('/\s/', '-', $ROW);
        //all db calls
        $found = $modelName::where($columnName, 'like', "%{$ROW}%")->get();
        $exact = $modelName::where($columnName, $ROW)->first();
        // $clean_exact = $modelName::where($columnName, $no_spec_char)->first();
        // $spec_exact = $modelName::where($columnName, $with_spec_char)->first();

        $multi = $modelName::where($columnName, 'like', "%{$ROW}%")->first();

        //return $found[0]->id;

        //ONE RECORD FOUND

        if (count($found) > 0 && count($found) <= 1) {   //return 'FOUND';
            foreach ($found as $key => $value) {
                $name_id = $value->id;
            }
            $result = ['name' => $name_id, 'stage_id' => 0];
        } elseif ($exact) {   //return 'exact';
            $found_many = $modelName::where($columnName, 'like', "%{$exact[$columnName]}%")->first();
            if ($exact[$columnName]) {
                $result = ['name' => $found_many->id, 'stage_id' => 0];
            }
        } elseif ($clean_exact) {   //return 'clean_exact';
            $clean_found_many = $modelName::where($columnName, 'like', "%{$clean_exact[$columnName]}%")->first();
            if ($clean_exact[$columnName] == $no_spec_char) {
                $result = ['name' => $clean_found_many->id, 'stage_id' => 0];
            }
        } elseif ($spec_exact) {   //return 'spec_exact';
            $spec_found_many = $modelName::where($columnName, 'like', "%{$spec_exact[$columnName]}%")->first();
            if ($spec_exact[$columnName] == $with_spec_char) {
                $result = ['name' => $spec_found_many->id, 'stage_id' => 0];
            }
        }

        //MULTIPLE RECORDS FOUND
        elseif (count($found) > 1) {   //return 'MULTIPLE';
            //found excat match from many
            if ($exact && $ROW == $exact[$columnName]) {
                $result = ['name' => $found_many->id, 'stage_id' => 0];
            } else {
                //CHECK FOR THE EXACT MATCH
                // if($exact){ $name_id = NULL; $stage_id = 2; }
                if ($exact) {
                    $name_id = $exact->id;
                    $stage_id = 2;
                }
                //OR GET THE FIRST OCCURANCE
                else {
                    $multi = $multi;
                    $name_id = $found[0]->id;
                    $stage_id = 3;
                }
                // else{ $multi = $multi; $name_id = $multi->id; $stage_id = 2; }
                $result = ['name' => $name_id, 'stage_id' => $stage_id];
            }
        }

        //NO RECORD FOUND
        elseif (count($found) == 0) {
            $name_id = $ROW;
            $stage_id = 3;
            $result = ['name' => $name_id, 'stage_id' => $stage_id];
        }

        return $result;
    }

    public function updateTable($modelName, $id, $table_id, $pending_id)
    {
        $data = [$id => $pending_id];
        $modelName::where('id', $table_id)->update($data);
    }

    public function unResolved($id, $type)
    {
        return $unresolved = \App\unresolvedMasterData::where('tab_id', $id)->where('type', $type)->first();
    }

    public function updateTempRecord($id, $type, $column)
    {
        //checking columns to resolved
        $temp = \App\unresolvedMasterData::where('tab_id', $id)->where('type', $type)->where($column, '<>', null)->first();
        if ($temp) {
            $data = [$column => null];
            \App\unresolvedMasterData::where('id', $temp->id)->update($data);
        }
    }

    public function clearTempRecord($modelName, $id, $type)
    {
        $temp_record = \App\unresolvedMasterData::where('tab_id', $id)->where('type', $type)
        ->where('column_1', null)->where('column_2', null)->where('column_3', null)->where('column_4', null)->where('column_5', null)
        ->where('column_6', null)->where('column_7', null)->where('column_8', null)->where('column_9', null)->where('column_10', null)
        ->first();

        //if all columns are empty delete record from unresolved table and set pending id of selected record to null in based table.
        if ($temp_record) {
            $res = \App\unresolvedMasterData::where('id', $temp_record->id)->delete();
            $data = ['pending_id' => null];
            $modelName::where('id', $temp_record->tab_id)->update($data);
        }
    }
}
