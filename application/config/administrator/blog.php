<?php

return array(
        
    'title' => "Blog",
    
    'single' => 'blog',
    
    'model' => 'blog',
    
    'form_width' => 800,
    
    'columns'=> array(
        'id',
        'title' => array(
            'title' => 'Title'
        ),
        'urlslug' => array(
            'title' => 'Url Slug'
        ),
        'content' => array(
                'title' => 'Blog Entry',
                
                ),

    ),
    
    'edit_fields' =>    array(
        'title'=> array(
            'title' => 'Title',
            'type'  =>  'text',
        ),
        'urlslug'   =>  array(
            'title' => 'Url Slug',
            'type'  =>  'text'
        ),
        'content'   =>  array(
            'title' =>  "Blog Entry",
            'type'  =>  'wysiwyg'
        ),

    ),
    
    'filters' => array(
        'title',
        'id'
    )
    
    
);

