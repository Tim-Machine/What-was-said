<html>
    
    
    <body>
        
        @if($status)
        <h1>{{$status}}</h1>
        @endif
        
        <table>
            
            <?php echo Form::open("/temp","post",array('id'=>'newcomment')); ?>
            <tr>
                <td> Who Said it?</td>
                <td><? echo Form::select("who_id", $users); ?></td>
            </tr>
            
            <tr>
                <td> What was said?</td>
                <td><?php echo Form::textarea('what'); ?></td>
            </tr>
            
            <tr>
                <td > What they meant?</td>
                <td><?php echo Form::textarea('ment'); ?></td>
            </tr>
            
            <tr>
                <td></td>
                <td><?php echo Form::submit('Save!'); ?></td>
            </tr>
        </table>
        <?php echo Form::close(); ?>
        
    </body>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.0/jquery.min.js"></script>
    <script>
    $(document).ready(function(){
        
        
        
        $('#newcomment').on('submit',function(){
            var valid = true;
            $("textarea").each(function(){
                   // if test has already failed then exit
                   if(!valid){
                    return false;    
                   }
                   
                   
                    var val = $(this).val();
                    if(val == "")
                    {
                        valid  = false;
                    }
              });
              
              if(!valid)
              {
                  alert('Make sure everythign is filled out...');
                }
                
                
            return valid;
        });
        
        
    });
    
    </script> 
</html>