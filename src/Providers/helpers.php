<?php

use \IO3x1\LaravelSettings\Models\Setting;

//Get Setting Value
if(!function_exists('settings')){
    function setting($key){
        $setting = Setting::where('key', $key)->first();
        if($setting){
            return $setting->value;
        }
        else {
            return false;
        }
    }
}

//Show Setting Input View
if(!function_exists('setting_show')){
    function setting_show($key, $label, $type, $option=[]){
        $setting = Setting::where('key', $key)->first();
        if($setting){
            switch($type){
                case "text":
                case "number":
                case "password":
                case "email":
                case "rang":
                    return '<div class="form-group"><label for="'.$key.'">'.$label.'</label> <small class="text-danger">settings("'.$key.'")</small><input class="form-control" type="'.$type.'" name="'.$key.'" id="'.$key.'" value="'.$setting->value.'"  placeholder="'.$label.'" required></div>';
                    break;
                case "textarea":
                    return '<div class="form-group"><label for="'.$key.'">'.$label.'</label> <small class="text-danger">settings("'.$key.'")</small><textarea class="form-control" name="'.$key.'" id="'.$key.'"  placeholder="'.$label.'" required>'.$setting->value.'</textarea></div>';
                    break;
                case "editor":
                    return '<div class="form-group"><label for="'.$key.'">'.$label.'</label> <small class="text-danger">settings("'.$key.'")</small><wysiwyg name="'.$key.'" id="'.$key.'" value="'.$setting->value.'" :config="mediaWysiwygConfig"></wysiwyg></div>';
                    break;
                case "file":
                    return '<div class="custom-file"> <small class="text-danger">settings("'.$key.'")</small><input class="custom-file-input" type="'.$type.'" name="'.$key.'" id="'.$key.'"  required><label class="custom-file-label"  for="'.$key.'">'.$label.'</label></div>';
                    break;
                case "image":
                    return '<label for="'.$key.'">'.$label.'</label> <small class="text-danger">settings("'.$key.'")</small><br><img class="m-2" style="border: 1px solid #b9c8de" src="'.url($setting->value).'" width="10%" alt="'.$label.'"><div class="custom-file mb-3"><input class="custom-file-input" type="file" name="'.$key.'" id="'.$key.'" ><label class="custom-file-label"  for="'.$key.'">'.$label.'</label></div>';
                    break;
                case "select":
                    $setOptions = '';
                    foreach ($option as $item){
                        if(is_array($item)){
                            if($item['id'] == $setting->value){
                                $setOptions .= '<option value="'.$item['id'].'" selected>'.$item['name'].'</option>';
                            }
                            else {
                                $setOptions .= '<option value="'.$item['id'].'">'.$item['name'].'</option>';
                            }
                        }
                        else {
                            if($item->id == $setting->value){
                                $setOptions .= '<option value="'.$item->id.'" selected>'.$item->id.'</option>';
                            }
                            else {
                                $setOptions .= '<option value="'.$item->id.'">'.$item->id.'</option>';
                            }
                        }


                    }
                    return '<div class="form-group"><label for="'.$key.'">'.$label.'</label><select class="form-control" name="'.$key.'" id="'.$key.'" required>'.$setOptions.'</select></div>';
                    break;

            }
        }
        else {
            return false;
        }

    }
}

//Update Setting From Controller
if(!function_exists('setting_update')){
    function setting_update($key, $value){
        $setting = Setting::where('key', $key)->first();
        if($setting){
            $setting->value = $value;
            $setting->save();
            return true;
        }
        else {
            return false;
        }
    }
}



