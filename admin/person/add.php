<?php
   if (!isset($_SESSION['USERID'])){
      redirect(web_root."index.php");
     }

      // $autonum = New Autonumber();
      // $result = $autonum->single_autonumber(4);

?> 
 <form class="form-horizontal span6" action="controller.php?action=add" method="POST" enctype="multipart/form-data"    >
 <div class="row">
         <div class="col-lg-12">
            <h1 class="page-header">Add New Person</h1>
          </div>
          <!-- /.col-lg-12 -->
       </div> 

                   <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "GRAVENO">Number:</label>

                      <div class="col-md-8">
                            <input class="form-control input-sm" id="GRAVENO" name="GRAVENO" placeholder=
                            "Grave Number" type="text" value="">
                      </div>
                    </div>
                  </div> 

                 <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "FNAME">Full Name:</label>

                      <div class="col-md-8">
                            <input class="form-control input-sm" id="FNAME" name="FNAME" placeholder=
                            "Full Name" type="text" value="">
                      </div>
                    </div>
                  </div> 

               <!--  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "MNAME">Middle Name:</label>

                      <div class="col-md-8">
                             <input class="form-control input-sm" id="MNAME" name="MNAME" placeholder=
                            "Middle Name" type="text" value="">
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "LNAME">Last Name:</label>

                      <div class="col-md-8">
                             <input class="form-control input-sm" id="LNAME" name="LNAME" placeholder=
                            "Last Name" type="text" value="">
                      </div>
                    </div>
                  </div>
 -->
                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "CATEGORIES">Block:</label>

                      <div class="col-md-8">
                       <select class="form-control input-sm" name="CATEGORIES" id="CATEGORIES">
                          <option selected hidden>Select Block</option>
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
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "BORNDATE">Born:</label>

                      <div class="col-md-8">
                       <div class="input-group" id=""> 
                          <div class="input-group-addon"> 
                            <i class="fa fa-calendar"></i>
                          </div>
                          <input name="BORNDATE"  value="" type="date" class="form-control input-sm datemask2">
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
                          <input name="DIEDDATE"  value="" type="date" class="form-control input-sm datemask2">
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
                          <input name="BURIALDATE" value="" type="date" class="form-control input-sm datemask2">
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
                            "Location" type="text" value="">
                             
                        <!-- <select class="form-control input-sm" name="LOCATION" id="LOCATION">
                          <option selected hidden disabled>Select Location</option>
                          <option value="Sangi">SANGI</option>
                          <option value="Luray">LURAY</option>
                          <option value="Dumlog">DUMLOG</option>
                          <option value="Carmen">CARMEN</option>
                          <option value="Canlumampao">CANLUMAMPAO</option>
                          <option value="Poog">POOG</option>
                          <option value="Ibo">IBO</option>
                          <option value="Bunga">BUNGA</option>
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
       
          
        </form>
      

       