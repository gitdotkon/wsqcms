<?php
class DynamicAdmin{
    public $list_field = array();

    public function addField($post_type, $field_key, $filed_name, $callback,  $after = 'title'){
        $this->list_field[] = array(
            'post_type' => $post_type,
            'key' => $field_key,
            'field' => $filed_name,
            'after' => $after,
            'callback' => $callback
        );
    }

    public function run(){
        if($this->list_field){
            foreach($this->list_field as $field){
                /* Add new column */
                $manage_edit_callback = function($columns) use($field){
                    $res = array();
                    foreach($columns as $key=>$col){
                        $res[$key] = $col;
                        if($key == $field['after']){
                            $res[$field['key']] = $field['field'];
                        }
                    }
                    return $res;
                };
                add_filter('manage_edit-'.$field['post_type'].'_columns', $manage_edit_callback, 30);

                /* Fill new column */
                add_filter('manage_'.$field['post_type'].'_posts_custom_column', $field['callback'], 5, 2);
            }
        }
    }
}