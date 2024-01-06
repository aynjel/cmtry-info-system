<?php  

    if (!isset($_SESSION['USERID'])){
      redirect(web_root."index.php");
     }


  $peopleid = $_GET['id'];
  $person = New Person();
  $p = $person->single_people($peopleid);

?>
  
        
        <div class="row">
         <div class="col-lg-12">
            <h1 class="page-header">Update Person</h1>
          </div>
          <!-- /.col-lg-12 -->
       </div>
       <form class="form-horizontal span6" action="controller.php?action=edit" method="POST"  />
 
                <div class="row"> 

               
                   <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "GRAVENO">Number:</label>

                      <div class="col-md-8">
                            <input type="hidden" name="PEOPLEID" value="<?php echo $p->PEOPLEID;?>">
                            <input class="form-control input-sm" id="GRAVENO" name="GRAVENO" placeholder=
                            "Grave Number" type="text" value="<?php echo $p->GRAVENO ?>">
                      </div>
                    </div>
                  </div> 

                 <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "FNAME">Full Name:</label>

                      <div class="col-md-8">
                            <input class="form-control input-sm" id="FNAME" name="FNAME" placeholder=
                            "Full Name" type="text" value="<?php echo $p->FNAME ?>">
                      </div>
                    </div>
                  </div> 

               <!--  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "MNAME">Middle Name:</label>

                      <div class="col-md-8">
                             <input class="form-control input-sm" id="MNAME" name="MNAME" placeholder=
                            "Middle Name" type="text" value="<?php echo $p->MNAME ?>">
                      </div>
                    </div>
                  </div>

               <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "LNAME">Last Name:</label>

                      <div class="col-md-8">
                             <input class="form-control input-sm" id="LNAME" name="LNAME" placeholder=
                            "Last Name" type="text" value="<?php echo $p->LNAME ?>">
                      </div>
                    </div>
                  </div> -->

                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "CATEGORIES">Block:</label>

                      <div class="col-md-8">
                       <select class="form-control input-sm" name="CATEGORIES" id="CATEGORIES">
                          <option value="None">Select Block</option>

                            <?php
                            //Statement
 

                           $mydb->setQuery("SELECT * FROM `tblcategory` where CATEGORIES = '".$p->CATEGORIES."'");
                          $cur = $mydb->loadResultList();
                        foreach ($cur as $result) {
                          echo  '<option SELECTED  value='.$result->CATEGORIES.' >'.$result->CATEGORIES.'</option>';
                          }


                          $mydb->setQuery("SELECT * FROM `tblcategory` where CATEGORIES != '".$p->CATEGORIES."'");
                          $cur = $mydb->loadResultList();
                        foreach ($cur as $result) {
                          echo  '<option  value='.$result->CATEGORIES.' >'.$result->CATEGORIES.'</option>';
                          }
                          ?>
                         
          
                        </select> 
                      </div>
                    </div>
                  </div>

              <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "BORNDATE">Born:</label>

                      <div class="col-md-8">
                       <div class="input-group" id=""> 
                          <div class="input-group-addon"> 
                            <i class="fa fa-calendar"></i>
                          </div>
                          <input name="BORNDATE"  value="<?php echo $p->BORNDATE ?>" type="date" class="form-control input-sm datemask2">
                        </div>
                      </div>
                    </div>
                  </div>

                   <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "DIEDDATE">Died:</label>

                      <div class="col-md-8">
                       <div class="input-group" id=""> 
                          <div class="input-group-addon"> 
                            <i class="fa fa-calendar"></i>
                          </div>
                          <input name="DIEDDATE"  value="<?php echo $p->DIEDDATE ?>" type="date" class="form-control input-sm datemask2">
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "BURIALDATE">Burial Date:</label>

                      <div class="col-md-8">
                       <div class="input-group" id=""> 
                          <div class="input-group-addon"> 
                            <i class="fa fa-calendar"></i>
                          </div>
                          <input name="BURIALDATE"  value="<?php echo $p->BURIALDATE ?>" type="date" class="form-control input-sm datemask2">
                        </div>
                      </div>
                    </div>
                  </div>

                   <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "LOCATION">Location:</label> 
                      <div class="col-md-8">

                        <input class="form-control input-sm" id="LOCATION" name="LOCATION" placeholder=
                            "Location" type="text" value="<?php echo $p->LOCATION ?>">
                             
                      <!-- <select class="form-control input-sm" name="LOCATION" id="LOCATION">
                          <option value="None" hidden>Select Location</option>
                          <option value="Sangi" <?php echo ($p->LOCATION=='Sangi') ? 'selected="true"': '' ?>>SANGI</option>
                          <option value="Luray" <?php echo ($p->LOCATION=='Luray') ? 'selected="true"': '' ?>>LURAY</option>
                          <option value="Dumlog" <?php echo ($p->LOCATION=='Dumlog') ? 'selected="true"': '' ?>>DUMLOG</option>
                          <option value="Carmen" <?php echo ($p->LOCATION=='Carmen') ? 'selected="true"': '' ?>>CARMEN</option>
                          <option value="Canlumampao" <?php echo ($p->LOCATION=='Canlumampao') ? 'selected="true"': '' ?>>CANLUMAMPAO</option>
                          <option value="Poog" <?php echo ($p->LOCATION=='Poog') ? 'selected="true"': '' ?>>POOG</option>
                          <option value="Ibo" <?php echo ($p->LOCATION=='Ibo') ? 'selected="true"': '' ?>>IBO</option>
                          <option value="Bunga" <?php echo ($p->LOCATION=='Bunga') ? 'selected="true"': '' ?>>BUNGA</option>
                        </select>  -->
                      </div>
                    </div>
                  </div> 
             
                   
                  
             <div class="form-group">
                    <div class="col-md-8"> 
                      <label class="col-md-4 control-label" for=
                      "idno"></label>

                      <div class="col-md-8">
                               <button class="btn  btn-primary btn-sm" name="save" type="submit" ><span class="fa fa-save fw-fa"></span> Save</button>
                  </div>
                    </div>
                  </div> 
            
 
            </div>
 
  
      
<!--/.fluid-container--> 
 </form>