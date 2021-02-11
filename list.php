
    <?php
    /*Author: Kailey Hart
//Project: N-413 Password Assignment
//Date: 02-11-2021
//Description: This page displays a list of trips from the database. Each list item can be clicked on and looked at closer in the detail.php file. 
*/
    include("n413connect.php");            
    include("head.php");
    $sql = "SELECT id, item, description, image FROM `n413_list`";
    $result = mysqli_query($link, $sql);
        $records = array();
        while ($row = mysqli_fetch_array($result, MYSQLI_BOTH)){
            $records[] = $row;
        }
?>
    <style>
        .cursor-pointer {cursor:pointer;}
    </style>
    <div class="container-fluid">
        <div id="headline" class="row mt-5">
            <div class="col-12 text-center">
                <h2>Wonders of North America Top-Ten List</h2>            
            </div> <!-- /.col-12 -->
        </div> <!-- /.row -->
        <?php
            foreach ($records as $record){
                echo '
                <div class="row record-item mt-3 cursor-pointer" data-id="'.$record["id"].'" data-item="'.$record["item"].'">
                    <div class="col-1"></div>  <!-- spacer -->
                    <div class="col-2"><img class="rounded" src="images/'.$record["image"].'" width="100%"/></div>
                    <div class="col-7"><b>'.$record["item"].'</b> '.$record["description"].'</div>
                </div>  <!-- /.row -->';
            } //foreach
        ?>            
    </div> <!-- /.container-fluid -->
</body>
<script>
    var this_page = "list";
    var page_title = 'N413 PASSWORD | Wonders of North America Top-Ten List';
		
    $(document).ready(function(){ 
            document.title = page_title;
            navbar_update(this_page);
				
            $(".record-item").on("click", function(){
            var id = $(this).data('id');
            show_detail(id);
        }); //on()
}); //document.ready
			
    function show_detail(id){
        window.location.assign("detail.php?id="+id);
    }
</script>    
</html>