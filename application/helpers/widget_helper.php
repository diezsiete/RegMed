<?php
function alert_dismissible($text, $class = "info") {
    $html = "<div class='alert alert-$class alert-dismissible fade in' role='alert'>
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span>
                </button>
                $text
              </div>";
    return $html;
}

function btn_consultar($url, $class = "default", $tooltip = "ver", $icon = "eye") {
    return "<a href='$url' class='btn btn-$class btn-xs' data-toggle='tooltip' data-placement='top' title='$tooltip'>"
        . "<i class='fa fa-$icon'></i></a>";
}

function btns_crud($formato, $entity_id){
    $html = "";
    if($formato->ver)
        $html .= btn_consultar(str_replace('__id__', $entity_id, site_url($formato->ver)), 'default', 'Ver', 'eye');
    if($formato->editar)
        $html .= btn_consultar(str_replace('__id__', $entity_id, site_url($formato->editar)), 'success', 'Editar', 'pencil');
    if($formato->borrar)
        $html .= btn_consultar(str_replace('__id__', $entity_id, site_url($formato->borrar)), 'danger', 'Borrar', 'trash-o');
    return $html;
}