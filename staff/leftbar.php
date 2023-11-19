
<div class="row">
   <div class="col-md-12">
      <div class="panel panel-default" > 
         <div class="panel-body">
            <div class="list-group">
               <ul class="nav nav-pills nav-stacked">
                  <li class="<?php echo ($q=='person' or $q==='person-view' or $q==='person-edit') ? "active" : false;?>">
                     <a href="index.php?q=person"><span class="fa fa-user fw-fa"></span> Manage Burial</a>
                  </li>
                  <li class="<?php echo ($q=='report') ? "active" : false;?>">
                     <a href="index.php?q=report"><span class="fa fa-file fw-fa"></span> Report Issues</a>
                  </li>
               </ul> 
            </div> 
         </div> 
      </div>
   </div>
 </div>
 