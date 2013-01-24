<?php

return array(
        
    'title' => "What was said",
    
    'single' => 'What',
    
    'model' => 'what',

    
    'columns'=> array(
        'who' => array(
            'title' => 'who',
            'relationship' => 'who',
            'select' => 'name',
        ),
        'what' => array(
            'title' => 'What was said'
        ),
        'ment' => array(
            'title' =>  'What was ment',
        )
    ),
    
    'edit_fields' =>    array(
        'who'=> array(
            'title' => 'Who Said it?',
            'type'  =>  'relationship',
        ),
        'what'   => array(
            'title' => 'what was said',
            'type'  => 'textarea',
            
        ),
        'ment'  =>  array(
            'title' =>  'What was ment',
            'type'  =>  'textarea'
        ),
    ),
    
    'filters' => array(
        'name'
    )
    
    
);

