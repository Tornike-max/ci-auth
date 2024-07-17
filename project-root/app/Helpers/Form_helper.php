<?php


function display_form_error($validation, $field)
{
    if ($validation->has($field)) {
        return $validation->getError($field);
    }
}
