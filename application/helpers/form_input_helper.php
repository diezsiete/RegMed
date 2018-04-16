<?php

function _help_block($vali = "", $help_block = "") {
    if($help_block || $vali){
        $text = [];
        $help_block ? $text[] = $help_block : null;
        $vali ? $text[] = $vali : null;
        $help_block = '<p class="help-block">'.implode("<br>", $text)."</p>";
    }
    return $help_block;
}

function _input($name, $view, $input_function = "", $params = [])
{
    if(!$view && $input_function){
        $return = call_user_func_array($input_function, $params);
    }else {
        $value = set_value($name);
        if(is_array($value))
            $value = implode(", ", $value);
        $return = "<p>" . $value . "</p>";
    }
    return $return;
}

function _input_html($name, $input, $label = "", $help_block = ""){
    $vali = form_error($name);
    $label = $label ? form_label($label, $name, ['class' => 'control-label']) : "";
    $html = "<div class='form-group" . ($vali ? ' has-error' : '') . "'>"
        . $label
        . $input
        . _help_block($vali, $help_block)
        . "</div>";
    return $html;
}

function input_text($name, $view = false, $label = "", $placeholder = "", $help_block = "", $attrs = []){
    $data = ['id' => $name, 'name' => $name, 'placeholder' => $placeholder, "class" => 'form-control'];
    $data += $attrs;
    $input = _input($name, $view, "form_input", [$data, set_value($name)]);
    return _input_html($name, $input, $label, $help_block);
}

function input_flatpickr($name, $view = false, $label = "", $placeholder = "", $help_block = "", $extra = []){
    $data = ['id' => $name, 'name' => $name, 'placeholder' => $placeholder, "class" => 'form-control flatpickr'];
    $set_value = set_value($name);
    if($set_value)
        $extra['data-defaultdate'] = $set_value;
    $input = _input($name, $view, "form_input", [$data, set_value($name), $extra]);
    return _input_html($name, $input, $label, $help_block);
}

function input_textarea($name, $view = false, $label = "", $placeholder = "", $help_block = "", $rows = 3){
    $data = ['id' => $name, 'name' => $name, 'placeholder' => $placeholder, "class" => 'form-control', 'rows' => $rows];
    $input = _input($name, $view, "form_textarea", [$data, set_value($name)]);
    return _input_html($name, $input, $label, $help_block);
}

function input_submit($name, $view = false, $value = "", $attrs = []){
    if(!$view) {
        $attrs = array_merge(["name" => $name, "class" => "btn btn-success"], $attrs);
        $html = form_submit($attrs, $value);
    }else
        $html = "";
    return $html;
}

function input_button_checkbox($name, $view = false, $label = "", $options = [], $default = false) {
    $name .= strpos("[]", $name) === false ? "[]" : "";
    $html = "";
    if(!$view && $options){
        $html = '<br><div class="btn-group" data-toggle="buttons">';
        $default = is_array($default) ? $default : [$default];
        foreach($options as $value => $text){
            $checked = set_checkbox($name, $value, in_array($value, $default));
            $html .= '<label class="btn btn-default'.($checked ? " active" : "").'">'
                   .    "<input type='checkbox' autocomplete='off' $checked value='$value' name='$name'> $text"
                   . '</label>';
        }
        $html .= '</div>';
        $html = _input_html($name, $html, $label);
    }elseif($view){
        $html = _input_html($name,_input($name, $view), $label);
    }
    return $html;
}

function input_button_radio($name, $view = false, $label = "", $options = [], $default = false) {
    $html = "";
    if(!$view && $options){
        $html = '<br><div class="btn-group" data-toggle="buttons">';
        $CI =& get_instance();
        $input = $CI->input->post($name);

        foreach($options as $value => $text){
            $checked = set_radio($name, $value, $default == $value);
            //fix en actualizar entidades que rellena $_POST pero set_radio no lo coge
            if($input)
                $checked = $value == $input ? "checked='checked'" : "";

            $html .= '<label class="btn btn-default'.($checked ? " active" : "").'">'
                   .    "<input type='radio' autocomplete='off' $checked value='$value' name='$name'> $text"
                   . '</label>';
        }
        $html .= '</div>';
        $html = _input_html($name, $html, $label);
    }elseif($view){
        $html = _input_html($name,_input($name, $view), $label);
    }
    return $html;
}

function input_select($name, $view = false, $label = "", $options = [], $default = false) {
    $data = ['id' => $name, 'name' => $name, "class" => 'form-control'];
    $selected = set_value($name) ? [set_value($name)] : [$default];
    $input = _input($name, $view, "form_dropdown", [$data, $options, $selected]);
    return _input_html($name, $input, $label);
}



   