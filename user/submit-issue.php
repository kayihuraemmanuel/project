<?php
require_once('connection.php');
?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Submit Issue | CHADISS</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
		============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="img/logo/logodep.svg">
    <!-- Google Fonts
		============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- owl.carousel CSS
		============================================ -->
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/owl.theme.css">
    <link rel="stylesheet" href="css/owl.transitions.css">
    <!-- animate CSS
		============================================ -->
    <link rel="stylesheet" href="css/animate.css">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="css/normalize.css">
    <!-- meanmenu icon CSS
		============================================ -->
    <link rel="stylesheet" href="css/meanmenu.min.css">
    <!-- main CSS
		============================================ -->
    <link rel="stylesheet" href="css/main.css">
    <!-- educate icon CSS
		============================================ -->
    <link rel="stylesheet" href="css/educate-custon-icon.css">
    <!-- morrisjs CSS
		============================================ -->
    <link rel="stylesheet" href="css/morrisjs/morris.css">
    <!-- mCustomScrollbar CSS
		============================================ -->
    <link rel="stylesheet" href="css/scrollbar/jquery.mCustomScrollbar.min.css">
    <!-- metisMenu CSS
		============================================ -->
    <link rel="stylesheet" href="css/metisMenu/metisMenu.min.css">
    <link rel="stylesheet" href="css/metisMenu/metisMenu-vertical.css">
    <!-- calendar CSS
		============================================ -->
    <link rel="stylesheet" href="css/calendar/fullcalendar.min.css">
    <link rel="stylesheet" href="css/calendar/fullcalendar.print.min.css">
    <!-- forms CSS
		============================================ -->
    <link rel="stylesheet" href="css/form/all-type-forms.css">
    <!-- dropzone CSS
		============================================ -->
    <link rel="stylesheet" href="css/dropzone/dropzone.css">
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="style.css">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- modernizr JS
		============================================ -->
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<?php include 'header.php'; ?>
        <div class="single-pro-review-area mt-t-30 mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-payment-inner-st">
                            <ul id="myTabedu1" class="tab-review-design">
                                <li class="active"><a href="#description">Submit Issue</a></li>
                                <li><a href="#reviews">Submit Document related to issue</a></li>
                            </ul>
                            <?php
                              // Process issue creation
                              if($_SERVER['REQUEST_METHOD'] == 'POST'){
                                $title = $_POST['IssueTitle'];
                                $description = $_POST['IssueDescription'];
                                $userId = $_SESSION['user_id'];
                                $uploadedFiles = [];
                                // Process uploads attachment
                                if(!empty($_FILES)){
                                  $issueAttachmentFile = $_FILES['issue_attachment'];

                                  $fileName = $issueAttachmentFile['name'];
                                  $fileTmpName = $issueAttachmentFile['tmp_name'];
                                  $fileSize = $issueAttachmentFile['size'];
                                  $fileError = $issueAttachmentFile['error'];
                                  $fileType = $issueAttachmentFile['type'];
                                  $fileExt = explode('.', $fileName);
                                  $fileActualExt = strtolower(end($fileExt));
                                  $allowed = array('jpg', 'jpeg', 'png', 'pdf');
                                  if (in_array($fileActualExt, $allowed)) {
                                    if ($fileError === 0) {
                                      if ($fileSize < 1000000) {
                                          $fileNameNew = "profile" . mt_rand() . "." . $fileActualExt;
                                          $fileDestination = 'img/issues/' . $fileNameNew;
                                          move_uploaded_file($fileTmpName, $fileDestination);
                                          $uploadedFiles[] = $fileDestination;
                                      }
                                    }
                                  }
                                }
                               


                                if($title && $description){
                                  $encodeFilePaths = json_encode($uploadedFiles);
                                  $query = "INSERT INTO `issues`(`title`, `description`, `attachments`,  `submitted_by`)
                                    VALUES ('$title', '$description', '$encodeFilePaths',  '$userId')";
                                    if (mysqli_query($con, $query)) {
                                        echo '<script>alert("Issue has been submitted Successful!")</script>';
                                        // Redirect to a success page if desired
                                    } else {
                                        echo '<script>alert("Issue recording failed. '.$con->error.'")</script>';
                                    }
                                }else{
                                  echo '<p class="text-danger">Please specify title and description</p>';
                                }
                              }
                            ?>
                            <div id="myTabContent" class="tab-content custom-product-edit">
                                <div class="product-tab-list tab-pane fade active in" id="description">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="review-content-section">
                                                <div id="dropzone1" class="pro-ad">
                                                    <form action="" method="POST" id="demo1-upload" enctype="multipart/form-data">
                                                        <div class="row">
                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                            <div class="form-group">
                                                                    <input name="IssueTitle" type="text" class="form-control" placeholder="Issue Title">
                                                                </div>
                                                                <div class="form-group res-mg-t-15">
                                                                    <textarea name="IssueDescription" placeholder="Issue Description"></textarea>
                                                                </div>
                                                                <div class="form-group alert-up-pd">
                                                                    <div class="dz-message needsclick download-custom">
                                                                        <!-- <i class="fa fa-download edudropnone" aria-hidden="true"></i>
                                                                        <h2 class="edudropnone">Drop Document here or click to upload.</h2>
                                                                        <p class="edudropnone"><span class="note needsclick">(This is a dropzone. Selected Document to <strong>be uploaded</strong>.)</span>
                                                                        </p> -->
                                                                        <label>Upload file 

                                                                        <input name="issue_attachment" class="hd-pro-img" type="file" placeholder="attachemnt" />
                                                                        </label>
                                                                        
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <div class="payment-adress">
                                                                    <button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-tab-list tab-pane fade" id="reviews">
                                    <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="review-content-section">
                                                <div id="dropzone1" class="pro-ad">
                                                    <form action="/upload" class="dropzone dropzone-custom needsclick add-professors" id="demo1-upload">
                                                        <div class="row">
                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                            <div class="form-group">
                                                                <select name="issue" class="form-control">
                                                                  <option value="none" selected="" disabled="">Select Issue</option>
                                                                  <option value="0">Kurenganwa kubera Ruswa</option>
                                                                  <option value="1">Ibibazo by' Ubutaka</option>
                                                                </select>
                                                                </div>
                                                                <div class="form-group alert-up-pd">
                                                                    <div class="dz-message needsclick download-custom">
                                                                        <i class="fa fa-download edudropnone" aria-hidden="true"></i>
                                                                        <h2 class="edudropnone">Drop Document here or click to upload.</h2>
                                                                        <p class="edudropnone"><span class="note needsclick">(This is a dropzone. Selected Document to <strong>be uploaded</strong>.)</span>
                                                                        </p>
                                                                        <input name="imageico" class="hd-pro-img" type="text" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <div class="payment-adress">
                                                                    <button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include 'footer.php'; ?>