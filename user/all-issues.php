<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>List of All Issues | CHADISS</title>
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
        <div class="product-status mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-status-wrap">
                            <h4>All Issues List</h4>
                            <div class="add-product">
                                <a href="submit-issue.php">Submit Other Issue</a>
                            </div>
                            <div class="asset-inner">
                                <?php 
                                  $allIssues = mysqli_query($con, "SELECT * FROM issues");
                                ?>
                                <table>
                                    <tr>
                                        <th>No</th>
                                        <th>Title Of Issue</th>
                                        <th>Description Of Issue</th>
                                        <th>Status</th>
                                        <th>Documents</th>
                                        <th>Setting</th>
                                    </tr>
                                    <?php
                                      $key = 1;
                                      while($issue = mysqli_fetch_assoc($allIssues)){
                                        ?>
                                          <tr>
                                            <td><?=$key++?></td>
                                            <td><?=$issue['title']?></td>
                                            <td><div class="form-group res-mg-t-15">
                                              <textarea name="IssueDescription" placeholder="Issue Description" readonly><?=$issue['title']?></textarea>
                                            </div></td>
                                            
                                            <td>
                                                <button class="ds-setting"><?=$issue['status']?></button>
                                            </td>
                                            <td><div class="form-group">
                                                <?php
                                                  if($issue['attachments']){
                                                    $attachments = json_decode($issue['attachments']);
                                                    // var

                                                    foreach ($attachments as $attachment) {
                                                      ?>
                                                        <a target="_blank" href="<?=$attachment?>">View</a>
                                                      <?php
                                                    }
                                                  }
                                                ?>
                                            </div></td>

                                            <td>
                                                <button data-toggle="tooltip" title="Edit" class="pd-setting-ed"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                                                <button data-toggle="tooltip" title="add document" class="pd-setting-ed"><i class="fa fa-upload" aria-hidden="true"></i></button>
                                            </td>
                                        </tr>

                                        <?php
                                      }
                                    ?>
                                   
<!--                                     <tr>
                                        <td>5</td>
                                        <td><img src="img/product/book-1.jpg" alt="" /></td>
                                        <td>Web Development Book</td>
                                        <td>
                                            <button class="pd-setting">Active</button>
                                        </td>
                                        <td>Wordpress</td>

                                        <td>
                                            <button data-toggle="tooltip" title="Edit" class="pd-setting-ed"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                                            <button data-toggle="tooltip" title="Trash" class="pd-setting-ed"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                        </td>
                                    </tr> -->

                                </table>
                            </div>
                            <div class="custom-pagination">
								<ul class="pagination">
									<li class="page-item"><a class="page-link" href="#">Previous</a></li>
									<li class="page-item"><a class="page-link" href="#">1</a></li>
<!-- 									<li class="page-item"><a class="page-link" href="#">2</a></li>
									<li class="page-item"><a class="page-link" href="#">3</a></li> -->
									<li class="page-item"><a class="page-link" href="#">Next</a></li>
								</ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include 'footer.php'; ?>