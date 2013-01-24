<?php

return array(
        
    'title' => "Who Can Say it",
    
    'single' => 'who',
    
    'model' => 'who',

    
    'columns'=> array(
        'id',
        'name' => array(
            'title' => 'Name'
        ),
    ),
    
    'edit_fields' =>    array(
        'name'=> array(
            'title' => 'Name',
            'type'  =>  'text',
        ),
    ),
    
    'filters' => array(
        'name'
    )
    
    
);

