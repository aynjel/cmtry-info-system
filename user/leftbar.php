
<div class="row">
   <div class="col-md-12">
      <div class="panel panel-default" > 
         <div class="panel-body">
            <div class="list-group">
               <ul class="nav nav-pills nav-stacked">
                  <li class="<?php echo ($q=='home') ? "active" : false;?>">
                     <a href="index.php?q=home"><span class="fa fa-home fw-fa"></span> Home</a> 
                  </li>
                  <li class="<?php echo ($q=='person') ? "active" : false;?>">
                     <a href="index.php?q=person"><span class="fa fa-user fw-fa"></span> Deceased Person</a>
                  </li>
                  <li class="<?php echo ($q=='report') ? "active" : false;?>">
                     <a href="index.php?q=report"><span class="fa fa-file fw-fa"></span> Report Issues</a>
                  </li>
               </ul> 
            </div> 
         </div> 
      </div>
   </div>

   <?php if($q=='person'){ ?>
   <div class="col-md-12">
      <div class="panel panel-default" > 
            <div class="panel-body">
               <form class="form-horizontal span6" action="" method="POST" enctype="multipart/form-data">
                  <div class="row">
                     <div class="col-lg-12">
                        <h3 class="page-header">
                           Reserve Grave
                        </h3>
                        <p> <?php check_message(); ?> </p>
                     </div>
                  </div> 
               
                  <div class="form-group">
                     <div class="col-md-12">
                        <label class="col-md-4 control-label" for="GRAVENO">Number:</label>
               
                        <div class="col-md-8">
                           <input class="form-control input-sm" id="GRAVENO" name="GRAVENO" placeholder="Grave Number" type="text" value="">
                        </div>
                     </div>
                  </div> 
               
                  <div class="form-group">
                     <div class="col-md-12">
                           <label label class="col-md-4 control-label" for="FNAME">FullName:</label>
               
                           <div class="col-md-8">
                                 <input class="form-control input-sm" id="FNAME" name="FNAME" placeholder="Full Name" type="text" value="">
                           </div>
                     </div>
                  </div> 
               
                  <div class="form-group">
                     <div class="col-md-12">
                        <label class="col-md-4 control-label" for=
                        "CATEGORIES">Section:</label>
               
                        <div class="col-md-8">
                        <select class="form-control input-sm" name="CATEGORIES" id="CATEGORIES">
                           <option value="None">Select Section</option>
                           <?php
                              //Statement
                           $mydb->setQuery("SELECT * FROM `tblcategory`");
                           $cur = $mydb->loadResultList();
               
                        foreach ($cur as $result) {
                           echo  '<option value='.$result->CATEGORIES.' >'.$result->CATEGORIES.'</option>';
                           }
                           ?>
               
                        </select> 
                        </div>
                     </div>
                  </div>
               
                  <div class="form-group">
                     <div class="col-md-12">
                        <label class="col-md-4 control-label" for=
                        "BORNDATE">Born:</label>
               
                        <div class="col-md-8">
                        <div class="input-group" id=""> 
                           <div class="input-group-addon"> 
                              <i class="fa fa-calendar"></i>
                           </div>
                           <input id="datemask2" name="BORNDATE"  value="" type="text" class="form-control input-sm datemask2"   data-inputmask="'alias': 'mm/dd/yyyy'" data-mask >
                        </div>
                        </div>
                     </div>
                  </div>
               
                  <div class="form-group">
                     <div class="col-md-12">
                        <label class="col-md-4 control-label" for=
                        "DIEDDATE">Died:</label>
               
                        <div class="col-md-8">
                        <div class="input-group" id=""> 
                           <div class="input-group-addon"> 
                              <i class="fa fa-calendar"></i>
                           </div>
                           <input id="datemask2" name="DIEDDATE"  value="" type="text" class="form-control input-sm datemask2"   data-inputmask="'alias': 'mm/dd/yyyy'" data-mask >
                        </div>
                        </div>
                     </div>
                  </div>
               
                  <div class="form-group">
                     <div class="col-md-12">
                        <label class="col-md-4 control-label" for=
                        "LOCATION">Location:</label> 
                        <div class="col-md-8">
                              
                        <select class="form-control input-sm" name="LOCATION" id="LOCATION">
                           <option value="None" hidden>Select Location</option>
                           <option value="SANGI">SANGI TOLEDO CITY</option>
                           <option value="LURAY">LURAY TOLEDO CITY</option>
                           <option value="DUMLOG">DUMLOG TOLEDO CITY</option>
                        </select> 
                        </div>
                     </div>
                  </div>
                                 
                  <div class="form-group">
                     <div class="col-md-12">
                        <label class="col-md-4 control-label" for=
                        "idno"></label>
               
                        <div class="col-md-8">
                        <button class="btn  btn-primary btn-sm" name="btnPersonSubmit" type="submit" ><span class="fa fa-save fw-fa"></span> Submit</button>
                        </div>
                     </div>
                  </div>
               </form>
            </div>
      </div>
   </div>
   <?php
      global $mydb;
      if(isset($_POST['btnPersonSubmit'])){
         $borndate =  $_POST['BORNDATE'];
         $dieddate =  $_POST['DIEDDATE'];

         if ($_POST['FNAME'] == ""  ) {
            $messageStats = false;
            message("All fields are required!","error");
            redirect('index.php?q=person');
         }else{	
            $sql = "SELECT * FROM `tblpeople` WHERE `GRAVENO`= '".$_POST['GRAVENO']."'  AND  `CATEGORIES`='".$_POST['CATEGORIES']."' AND `LOCATION`='".$_POST['LOCATION']."'";
            $mydb->setQuery($sql);
            $cur = $mydb->loadSingleResult();
            if ($cur->GRAVENO== $_POST['GRAVENO']) {
               message("Grave number is already exists!","error");
               redirect("index.php?q=person");
            }else{

               $autonumber = New Autonumber();
               $res = $autonumber->set_autonumber('PEOPLEID');

                     $p = New Person(); 
                     $p->PEOPLEID 	= $res->AUTO; 
               $p->FNAME 		= $_POST['FNAME'];
               // $p->LNAME 		= $_POST['LNAME'];
               // $p->MNAME 		= $_POST['MNAME'];
               $p->CATEGORIES  = $_POST['CATEGORIES'];
               $p->BORNDATE	= $borndate;
               $p->DIEDDATE	= $dieddate; 
               $p->LOCATION 	= $_POST['LOCATION'];
               $p->GRAVENO		= $_POST['GRAVENO']; 
               $p->create();
               $autonumber = New Autonumber();
               $autonumber->auto_update('PEOPLEID');
               message("New Record created successfully!", "success");
               redirect("index.php?q=person");
            }
         }
      }
   } ?>

   <?php if($q=='report'){ ?>
   <div class="col-md-12">
      <div class="panel panel-default" > 
            <div class="panel-body">
               <form class="form-horizontal span6" action="" method="POST" enctype="multipart/form-data">
                  <div class="row">
                     <div class="col-lg-12">
                        <h3 class="page-header">
                           Report Issues
                        </h3>
                        <p> <?php check_message(); ?> </p>
                     </div>
                  </div> 
               
                  <div class="form-group">
                     <div class="col-md-12">
                        <label class="col-md-4 control-label" for="issue">Issue:</label>
                        <textarea class="form-control input-sm" id="issue" name="issue" placeholder="Issue" type="text" value=""></textarea>
                     </div>
                  </div>

                  <div class="form-group">
                     <div class="col-md-12">
                        <label class="col-md-4 control-label" for=
                        "LOCATION">Type:</label> 
                        <div class="col-md-8">
                              
                        <select class="form-control input-sm" name="report_type" id="report_type">
                           <option value="None" hidden>Select Report Type</option>
                           <option value="problem">Problem</option>
                           <option value="suggestion">Suggestion</option>
                           <option value="appreciation">Appreciation</option>
                           <option value="violations">Violations</option>
                           <option value="bug">Bug</option>
                        </select> 
                        </div>
                     </div>
                  </div>
                                 
                  <div class="form-group">
                     <div class="col-md-12">
                        <label class="col-md-4 control-label" for=
                        "idno"></label>
               
                        <div class="col-md-8">
                        <button class="btn  btn-primary btn-sm" name="btnReportSubmit" type="submit" ><span class="fa fa-save fw-fa"></span> Submit</button>
                        </div>
                     </div>
                  </div>
               </form>
            </div>
      </div>
   </div>
   <?php
   
   global $mydb;
      if(isset($_POST['btnReportSubmit'])){
         if ($_POST['issue'] == "" || $_POST['report_type'] == "" ) {
            $messageStats = false;
            message("All fields are required!","error");
            redirect('index.php?q=report');
         }else{
            $p = New Report(); 
            $p->issue = $_POST['issue'];
            $p->report_type = $_POST['report_type']; 
            $p->create();
            message("Created successfully!", "success");
            redirect("index.php?q=report");
         }
      }
   } ?>
 </div>
 