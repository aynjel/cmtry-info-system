<?php 
    if (isset($_POST['reserve'])) {
        $plot_no = $_POST['plot_no'];
        $location = $_POST['location'];
        $block = $_POST['block'];
        $mobile_number = $_POST['mobile_number'];
        $email = $_POST['email'];

        // check in database if plot number is already reserved
        $sql = "SELECT * FROM tblreserve WHERE graveno = '$plot_no' AND status = 'Approved'";
        $mydb->setQuery($sql);
        $cur = $mydb->loadResultList();
        
        if ($cur) {
            message("Plot number is already reserved!", "error");
        } else {
            $sql = "INSERT INTO tblreserve (graveno, location, block, mobile_number, email, user_id) VALUES ('$plot_no', '$location', '$block', '$mobile_number', '$email', ".$_SESSION['USERID'].")";
            $mydb->setQuery($sql);
            $res = $mydb->executeQuery();
            if ($res) {
                message("Plot number reserved successfully!", "success");
                echo "<script> window.location.href = 'index.php?q=view-reserve';</script>";
            } else {
                message("Something went wrong! Please try again.", "error");
            }
        }
        redirect(web_root."user/index.php?q=view-reserve");
    }
?>

<form method="POST">
    <div class="card">
        <div class="card-header">
            <div class="form-header text-start mb-0">
                <h4 class="mb-0">Reserve Plot</h4>
            </div>
        </div>
        <div class="card-body">
            <div class="bank-inner-details">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                            <label>Plot Number</label>
                            <p class="text-muted">
                                <small>
                                    <i>
                                        <b>Note:</b> Plot number is the number of the plot you want to reserve.
                                    </i>
                                </small>
                            </p>
                            <input 
                            type="number" 
                            class="form-control" 
                            name="plot_no" 
                            min="1"
                            max="300"
                            value="<?= isset($_GET['graveno']) ? $_GET['graveno'] : ''; ?>"
                            readonly
                            >
                        </div>
                    </div>
                    
                    <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                            <label>
                                Block Number
                            </label>
                            <p class="text-muted">
                                <small>
                                    <i>
                                        <b>Note:</b> Block number is the block of the plot you want to reserve.
                                    </i>
                                </small>
                            </p>
                            <input 
                            type="number" 
                            class="form-control" 
                            name="block" 
                            min="1"
                            max="3"
                            value="<?= isset($_GET['block']) ? $_GET['block'] : ''; ?>"
                            readonly
                            >
                        </div>
                    </div>

                    <div class="col-lg-12 col-md-12">
                        <div class="form-group">
                            <label>
                                Location
                            </label>
                            <p class="text-muted">
                                <small>
                                    <i>
                                        <b>Note:</b> Location is the location of the plot you want to reserve.
                                    </i>
                                </small>
                            </p>
                            <input type="text" class="form-control" name="location" placeholder="Ex. Sangi" required>
                            <!-- <select class="form-control" name="location" required>
                                <option selected hidden disabled>Select Location</option>
                                <option value="Sangi">Sangi</option>
                                <option value="Bunga">Bunga</option>
                                <option value="Luray">Luray</option>
                                <option value="Dumlog">Dumlog</option>
                                <option value="Carmen">Carmen</option>
                                <option value="Canlumampao">Canlumampao</option>
                                <option value="Poog">Poog</option>
                                <option value="Ibo">Ibo</option>
                            </select> -->
                        </div>
                    </div>
                    <hr>
                    <h5>
                        Contact Details
                    </h5>
                    <p class="text-muted">
                        <small>
                            <i>
                                <b>Note:</b> Please provide your contact details so we can contact you for the reservation.
                            </i>
                        </small>
                    </p>
                    <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                            <label>Number</label>
                            <input type="number" class="form-control" name="mobile_number" placeholder="Ex. 09123456789" required>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email" placeholder="Ex. 09123456789" required>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <div class="bank-details-btn">
                <a href="index.php?q=map" class="btn bank-cancel-btn me-2">Cancel</a>
                <button type="submit" name="reserve" class="btn bank-save-btn">Reserve Plot</button>
            </div>
        </div>
    </div>
</form>