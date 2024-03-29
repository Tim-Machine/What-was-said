
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>What was said?</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="/css/bootstrap.css" rel="stylesheet">
    <link href="/js/tablesorter/themes/blue/style.css" rel="stylesheet">
    <style>
      body {
        padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
        background: #333;
        color: #fff;
        font-size: 16px;
      }
      #directions{
          margin-top: 90px;
      }
    </style>
    <link href="/css/bootstrap-responsive.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
      <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
                    <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
                                   <link rel="shortcut icon" href="../assets/ico/favicon.png">
  </head>

  <body>

    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="#">What was said?</a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li><a href="#about">Add</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

    <div class="container">
        <div id="message" class="pull-right"></div>
                <table id="myTable" class="tablesorter">
                    
                    <thead>
                        <tr>
                        <th></th>
                        <th>Who</th>
                        <th>What was said</th>
                        <th>What was meant</th>
                        </tr>
                    </thead>
                    
                
                @foreach($entries as $entry)
                <tr>
                    <td>
                        <span id="entry_{{$entry->id}}">{{$entry->score}}</span>
                        <img src="/img/good.png" class="upvote" id="entry_{{$entry->id}}">
                        <img src="/img/dislike.png" class="downvote" id="entry_{{$entry->id}}">
                    </td>
                    <td>{{$entry->who->name}}</td>
                    <td>{{$entry->what}}</td>
                    <td>{{$entry->ment}}</td>
                </tr>
                @endforeach
                </table>
        
        
        
    <div id="pager" class="pager" style="top: 64px; position: relative;">
	<form>
		<img src="./img/first.png" class="first">
		<img src="./img/prev.png" class="prev">
		<input type="text" class="pagedisplay">
		<img src="./img/next.png" class="next">
		<img src="./img/last.png" class="last">
		<select class="pagesize">
			<option selected="selected" value="10">10</option>
			<option value="20">20</option>
			<option value="30">30</option>
			<option value="40">40</option>
		</select>
	</form>
</div>
      
        <div id="directions">
            <h3> How to install the Chrome Extensions </h3>
            <ul>
                <li>Download this <a href="/files/" target="_blank">zip</a> </li>
                <li>Unzip in my documents</li>
                <li>Visit <a>chrome://extensions</a> in your browser</li>
                <li>Ensure that the Developer Mode checkbox in the top right-hand corner is checked.</li>
                <li>Click on  "Load unpackaged extension.." </li>
                <li>Navigate to the directory in which your extension files live, and select it.</li>
                
            </ul>
            
            
        </div>
        
        
    </div> <!-- /container -->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.0/jquery.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/tablesorter/jquery.tablesorter.min.js"></script>
    <script src="/js/tablesorter/addons/pager/jquery.tablesorter.pager.js"></script>

    
    <script>
    $(document).ready(function() 
        { 
            $("#myTable").tablesorter({widthFixed: true, widgets: ['zebra']}) .tablesorterPager({container: $("#pager")});
            
            
            
            
            
            
            var vote = function(elm , direction){
                
                var id = elm.attr('id');
                var idArry = id.split("_");
                var score = $("span#"+id).html();
                
                
                if(score === ''){
                    score = 0; 
                }
                
                score = parseInt(score);
                
                // edit score 
                if(direction === 'up')
                { score = score + 1;}
                else if(direction === 'down')
                {score = score - 1;}
                
              

                $.ajax({
                    url: "/vote",
                    data: {direction :  direction  , id :  idArry[1]  },
                     type: "POST"
                  }).done(function(data) {
                      
                      if(!data === "<div class=\"alert alert-error\">You have already voted</div>")
                      {
                          $("span#"+id).html(score);
                      }
                      
                   $("#message").html(data);
                  
                });
                
            }
            
            
            $('.upvote').on('click',function(){
                vote($(this),'up');
            });
            
        } 
    ); 
    </script>
    
  </body>
</html>
