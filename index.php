<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tag sys - mzielinski.pl</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/autocomplete.css" rel="stylesheet">
  </head>
  <body>
      <div class="container">
      <div class="col-md-6 col-md-offset-3">
        <h1 class="text-center">TAG SYS - mzielinski.pl</h1>
        <p class="lead text-center">Simply tag system on MySQL.<br> Save or delete records.</p>
        
        <form  method="post" action="">
            <div class="row">
                <label>Tag:</label>
				<input class="form-control auto" type="text" id="tag" /> <br>
                <div class="btn btn-default" id="addTag">Add Tag</div>
                <div class="clearfix"></div><br>
                    <div class="tagForm">
                        <ul id="tagList">
                            <? require('db.php'); 
                            $tags = $mysqli->query("SELECT * FROM tags");
                                if(mysqli_num_rows($tags) > 0) {
                                    while($tag = $tags->fetch_object()) {
                                        
                                        echo "<li class=\"tag\" id=\"id_{$tag->id}\"> {$tag->tag} <button class=\"deleteTagExsit btn-warning\" id=\"id_{$tag->id}\">X</button></li>";
                                        
                                    } 
                                }?>         
                        </ul>
                    </div>
                <div class="buttons-box clearfix">
                    <input class="btn btn-info btn-lg pull-right" type="submit" value="Save" name="save">
                </div>
            </div>
		  </form>
          
            <? if (isset($_POST['save'])) {
                    if(!empty($_POST['multiTag'])) {
                        foreach ($_POST['multiTag'] as $key=>$tag) {
      
                        $tag = mysqli_real_escape_string($mysqli,$tag); 
                        echo "Tag(s): ".$tag.", ";
                
                        $upTags = "INSERT INTO tags (tag) VALUES ('$tag')";
                        if ($mysqli->query($upTags) === TRUE) echo "added to DB";
                        header("Refresh:1");
                    }
                }
            }?>
        <div class="footer text-center">Do you like it? Visit my page <a href="http://mzielinski.pl">mzielinski.pl</a> My work is usefull for you? Support me by BTC  <div id="coinwidget-bitcoin-14Qaw1shp8ccg2n5jxzHD1DSfyTkYoKNqe"></div></div>    
    </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>	
    <script src="js/bootstrap.min.js"></script>
    <script> 
    $(function() {
        $( "#tag" ).autocomplete({
        source: 'autocomplete.php'
        });
    });
        
    var id = 0;
    $("#addTag").click(function(){
        if($("#tag").val() ) {
            
                id++;
            var li = document.createElement("li");
                li.className = "tag";
                li.setAttribute("id", id);
            
            var i = document.createElement("INPUT"); 
                i.setAttribute("name","multiTag[]");
                i.setAttribute("type","hidden");
                i.setAttribute("id", id);
            
            var tag = document.getElementById('tag').value;
             
            li.innerHTML = " " + tag + '  <button class=\"deleteTag btn-warning\" id=\"'+id+'\">X</button>' 
            i.setAttribute("value", tag);    
            
            $("#tagList").append(li)
            $("#tagList").append(i)
            $('#tag').val('');  
        }});
  
    $("#tagList").on('click', 'button.deleteTag', function() {
    
        var idDiv = this.id;
        $("#"+idDiv).remove()
        $(":input[id='"+idDiv+"']").remove();

    });

    $("#tagList").on('click', 'button.deleteTagExsit', function() {
    
        var del_id = this.id;
        var toDel = del_id.replace('id_', '');
        $("#id_"+toDel).remove();
        $.ajax({
            type:'POST',
            url:'delete_tag.php',
            data:'delete_id='+toDel
        });
    
    });
    </script>
    <script src="//blockr.io/js_external/coinwidget/coin.js"></script>
    <script>
			CoinWidgetCom.go({
				wallet_address: '14Qaw1shp8ccg2n5jxzHD1DSfyTkYoKNqe',
				currency: 'bitcoin',
				counter: 'hide',
				lbl_button: 'Donate',
				lbl_count: 'donations',
				lbl_amount: 'BTC',
				lbl_address: 'Use address below to donate. Thanks!',
				qrcode: true,
				alignment: 'bl',
				decimals: 8,
				size: "big",
				color: "dark",
				countdownFrom: "1000",
				element: "#coinwidget-bitcoin-14Qaw1shp8ccg2n5jxzHD1DSfyTkYoKNqe",
				onShow: function(){},
				onHide: function(){}
			});
    </script>
    </body>
</html>