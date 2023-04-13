<!DOCTYPE html>
<html lang="en">
<?php
session_start();
if(!isset($_SESSION["email_address"])){
    header("location:../login.html");

} 

?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>File Management System</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <link href="_Assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="_Assets/css/mdb.min.css" rel="stylesheet">
    <link href="_Assets/css/style.min.css" rel="stylesheet">

    <!--     <script src="_Assets/js/jquery-1.8.3.min.js"></script> -->
    <link rel="stylesheet" type="text/css" href="_Assets/medias/css/dataTable.css" />
    <script src="_Assets/medias/js/jquery.dataTables.js" type="text/javascript"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.0/jquery.min.js"></script>

    <script type="text/javascript" charset="utf-8">
        $(document).ready(function() {
             $.fn.dataTable.ext.errMode = 'none';
            $('#tableko').dataTable({
                "aLengthMenu": [
                    [5, 10, 15, 25, 50, 100, -1],
                    [5, 10, 15, 25, 50, 100, "All"]
                ],
                "iDisplayLength": 10
            });
        })
    </script>


    <style>
        ul {
            margin: 0;
            padding: 0;
            list-style: none;
            border-top-right-radius: 4px;
            border-top-left-radius: 4px
        }

        input[type=radio] {
            display: none;
        }

        #vert_menu {
            background: #afab9d;
            overflow: hidden;
            width: 100%;
        }

        #vert_menu li {
            float: left;
        }

        #vert_menu label {
            padding: 8px 20px 8px 40px;
            float: left;
            text-align: center;
            font: normal 16px Myriad Pro, Helvetica, Arial, sans-serif;
            text-shadow: 0px 1px 0px #000;
            position: relative;
            text-shadow: 1px 0 0 #000;
            color: #e6e2cf;
            background-color: #525252;
            min-width: 50px;
            width: auto
        }

        #vert_menu a:first-child {
            border-top-left-radius: 4px
        }

        #vert_menu li:first-child label {
            padding-left: 1em;
        }

        #vert_menu label:hover {
            background: #afab9d;
        }

        #vert_menu label::after,
        #vert_menu label::before {
            content: "";
            position: absolute;
            top: 50%;
            margin-top: -19px;
            border-top: 19px solid transparent;
            border-bottom: 19px solid transparent;
            border-left: 1em solid;
            right: -1em;
        }

        #vert_menu label::after {
            z-index: 2;
            border-left-color: #525252;
        }

        #vert_menu label::before {
            border-left-color: #f8f5ee;
            right: -1.1em;
            z-index: 1;
        }

        #vert_menu label:hover::after {
            border-left-color: #afab9d;
        }

        #vert_menu input[type="radio"]:checked+label {
            background: #afab9d;
        }

        #vert_menu input[type="radio"]:checked+label::after {
            border-left-color: #afab9d;
        }

        select[multiple],
        select[size] {
            height: auto;
            width: 20px;
        }

        .pull-right {
            float: right;
            margin: 2px !important;
        }

        .map-container {
            overflow: hidden;
            padding-bottom: 56.25%;
            position: relative;
            height: 0;
        }

        .map-container iframe {
            left: 0;
            top: 0;
            height: 100%;
            width: 100%;
            position: absolute;
        }

        #loader {
            position: fixed;
            left: 0px;
            top: 0px;
            width: 100%;
            height: 100%;
            z-index: 9999;
            background: url('_Assets/img/lg.flip-book-loader.gif') 50% 50% no-repeat rgb(249, 249, 249);
            opacity: 1;
        }


        .imgs {
            outline: solid 0px #FC5185;
            transition: outline 0.6s linear;
            margin: 0.5em;
            /* Increased margin since the outline expands outside the element */
        }

        .imgs:hover {
            outline-width: 2px;
        }
    </style>

    <script src="jquery.min.js"></script>
    <script type="text/javascript">
        $(window).on('load', function() {
            setTimeout(function() {
                $('#loader').fadeOut('slow');
            });
        });
    </script>
</head>

<body style="padding:0px; margin:0px; background-color:#fff;font-family:arial,helvetica,sans-serif,verdana,'Open Sans'">
    <?php 

       require_once("_Assets/include/connection.php");
       
     $id = $conn->real_escape_string($_SESSION['email_address']);


      $r = $conn->query("SELECT * FROM login_user where id = '$id'") or die (mysqli_error($con));

      $row = $r->fetch_array();


       $image=htmlentities($row['user_profile']);
       $id=htmlentities($row['email_address']);
       $x=htmlentities($row['id']);
       $namex=htmlentities($row['name']);
       $userposition=htmlentities($row['user_position']);
       $user_contact=htmlentities($row['user_contact']);
       $user_address=htmlentities($row['user_address']);
  ?>

    <nav class="mb-1 navbar navbar-expand-lg navbar-dark default-color fixed-top">
        <a class="navbar-brand" href="home.php"><img src="_Assets/js/img/Files_Download.png" width="33px" height="33px">
            <font color="#F0B56F">F</font>ile <font color="#F0B56F">M</font>anagement <font color="#F0B56F">S</font>ystem
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-4" aria-controls="navbarSupportedContent-4" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent-4">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <font color="black">Welcome!,</font> <?php echo ucwords(htmlentities($id)); ?> <i class="fas fa-user-circle"></i> Login
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-info" aria-labelledby="navbarDropdownMenuLink-4">
                        <a class="dropdown-item" href="history_log.php"> <i class="fas fa-chalkboard-teacher"></i> User Logged</a>
                        <a class="dropdown-item" href="change_password.php"> <i class="fas fa-cog"></i> Change Password</a>
                        <a class="dropdown-item" href="Logout.php"><i class="fas fa-sign-in-alt"></i> LogOut</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    <br>
    <div id="loader"></div>
    <br><Br><br>
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="">
                    <a href="add_file.php"><button type="button" class="btn btn-success"><i class="fas fa-file-medical"></i> Add File</button></a>
                    <a href="add_folder.php"><button type="button" class="btn btn-warning"><i class="fas fa-folder-plus"></i> Add Folder</button></a>
          <!--           <a href="view_archive1.php"><img src="_Assets/img/user-trash-full-128.png" class="imgs" width="40px" height="40px" title="View Archive" style="float: right;"></a> -->
                </div>
     
                <div class="tab-content" id="myTabContent">
                    <!---main file-->
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <hr>

                        <table id="tableko" class="table table-striped" style="">
                            <thead>
                                <th>Filename</th>
                                <th>FileSize</th>
                                <th>Uploader</th>
                                <th>Status</th>
                                <th>Date/Time Upload</th>
                                 <th>Admin Comment</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                <tr>

                                 <?php 
                                  error_reporting(0);
                                   require_once("_Assets/include/connection.php");
                                    $getID = $conn->real_escape_string($_GET['SflKxwRJSMeKKF2QT4fwpMeJf36POk6yJV_adQssw5c']);
                                    $query = $conn->query("SELECT *,b.ID as IDS  FROM upload_files a INNER JOIN upload_files1 b ON a.ID = b.GET_ID WHERE GET_ID = '$getID'") or die (mysqli_error($conn));
                                  if($query->num_rows === 0) echo'<div class="alert alert-danger" role="alert">No Record Found!!!</div>';
                                    while($file=$query->fetch_array()){
                                       $id =  htmlentities($file['ID']);
                                       $idx =  htmlentities($file['IDS']);
                                       $folder =  htmlentities($file['FOLDERSELECT']);
                                       $name =  utf8_encode($file['NAME']);
                                       $size =  htmlentities($file['SIZE']);
                                       $uploads =  htmlentities($file['EMAIL']);
                                       $status =  htmlentities($file['ADMIN_STATUS']);
                                       $time =  htmlentities($file['TIMERS']);
                                       $foldername =  htmlentities($file['VARIABLE']);
                                       $targetFile = preg_replace('#[^\pL\pN./-]+#', '', $foldername);
                                       $comment =  htmlentities(ucfirst($file['COMMENT']));
                                       $type =  htmlentities($file['TYPE']);
                                       $loginid =  htmlentities($file['LOGIN_ID']);


                                       if($type == "sub_file1"){
                                          $var =  '<img src="_Assets/img/docs-64.png" width="30px" height="25px" title="View File">'.$name.'';
                                       }else{
                                          $var =  '<a href="subfolder2.php?SflKxwRJSMeKKF2QT4fwpMeJf36POk6yJV_adQssw5c='.$idx.'""><img src="_Assets/img/floder-close-128.png" width="30px" height="25px" title="View File">&nbsp;'.substr($foldername,12).'</a> &nbsp;<i class="fas fa-file-medical sub_click" style="color:#007bff" title="Add new file" data-id2="'.$idx.'"></i>';
                                       }
                                     if($type == "sub_file1"){
                                          $var2 =  '<a href="download.php?f='.$foldername.''.$name.'"><img src="_Assets/img/file-document-download-128.png" width="30px" height="30px" title="View And Download File"></a>';
                                           // | <a href="remove1.php?ID='.$id.'"><img src="_Assets/img/trash-128.png" width="30px" height="30px" title="Remove File"></a>
                                       }else{
                                          $var2 =  '';
                                       }
                                  
                                    ?>

                                    <td width="30%">
                                     <?php echo $var; ?>
                                    </td>
                                    <td><?php echo floor($size / 1000) . ' KB'; ?></td>
                                    <td><?php echo $uploads; ?></td>
                                    <td><?php echo $status; ?></td>
                                    <td><?php echo $time; ?></td>
                                     <td><?php echo $comment; ?></td>
                                    <td width="15%">
                                         <?php echo $var2; ?>
                                    </td>
                                </tr>

                                <?php } ?>
                            </tbody>
                        </table>
                        <!--end main file--->
                    </div>

                </div>
            </div>

            <!---tabs-->

            <!--end tabs-->

            </script>
            <div class="col-md-3" style="border-top: 4px solid #17a2b8;border-radius: 4px;  box-shadow: 0px 1px 1px 0px  #6c757d;"><br>
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Contact</a>
                    </li>
                </ul>
                <div class="tab-content pt-2 pl-1" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                        <img src="<?php echo (!empty($image)) ? ''.$image : '_Assets/img/Men-Profile-Image.png'; ?>" width="200px" height="200px" alt="Profile" class="img-thumbnail">
                        <hr>
                        <div class="">

                            <div class="">
                                <p><b style="font-size: 1.1em">Full Name:</b><?php echo $namex;?></p>
                            </div>
                            <div class="">
                                <p><b style="font-size: 1.1em">Position:</b><?php echo $userposition;?></p>
                            </div>
                        </div>
                        <hr>
                    </div>
                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                        <h6 style="font-size: 1.1em">file management system (fMS)</h6>
                        <Hr>
                        is a system (based on computer programs in the case of the management of digital documents) used to track, manage and store documents and reduce paper. Most are capable of keeping a record of the various versions created and modified by different users (history tracking).
                    </div>
                    <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                        <h6 style="font-size: 1.1em">Contact Number</h6>
                        <Hr><br>
                        <div class="">
                            <p><b style="font-size: 1.1em">Cellphone #:</b><?php echo $user_contact;?></p>
                        </div>
                        <p><b style="font-size: 1.1em">Address :</b><?php echo $user_address;?></p>
                    </div>
                    <hr><br>
                    <div class="card" style="border-top: 4px solid #17a2b8;border-radius: 4px;">
                        <div class="view overlay">
                            <div class="mask rgba-white-slight"></div>
                            </a>
                        </div>
                        <div class="card-body">
                            <h4 class="card-title">File Document</h4>
                            <hr>
                            <ul>
                                <li>
                                    <p>Ensuring changes and revisions are clearly identified</p>
                                </li>
                                <li>
                                    <p>Ensuring that documents remain legible and identifiable</p>
                                </li>
                                <li>
                                    <p>Preventing “unintended” use of obsolete documents</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include 'modal/add_filesub2.php';?>
        <?php include 'modal/add_sub3.php';?>
        <script>
            $(document).ready(function() {

                load_data();

                var count = 1;

                function load_data() {
                    $(document).on('click', '.sub_click', function(e) {
                        e.preventDefault();
                        $('#add_file2').modal('show');
                        var ID = $(this).attr("data-id2");
                        getID(ID); //argument


                    });
                }

                function getID(ID) {
                    $.ajax({
                        type: 'POST',
                        url: 'sub_row3.php',
                        data: {
                            ID: ID
                        },
                        dataType: 'json',
                        success: function(response) {
                            $('#get_id').val(response.ID); //nagamit
                            $('#folder_name').val(response.VARIABLE); //nagamit
                            $('#f_name').val(response.EMAIL); //nagamit
                            $('#log_name').val(response.LOGIN_ID); //nagamit
                            $('#showx').html(response.VARIABLE); //nagamit

                        }
                    });
                }

            });
        </script>
        <script>
            $(document).ready(function() {

                load_data();

                var count = 1;

                function load_data() {
                    $(document).on('click', '.sub_click2', function(e) {
                        e.preventDefault();
                        $('#Subfolder3').modal('show');
                        var ID = $(this).attr("data-id3");
                        getID2(ID); //argument

                    });
                }

                function getID2(ID) {
                    $.ajax({
                        type: 'POST',
                        url: 'sub_row3.php',
                        data: {
                            ID: ID
                        },
                        dataType: 'json',
                        success: function(response2) {
                            $('#sub_id2').val(response2.ID); //nagamit
                            $('#folder_name2').val(response2.VARIABLE); //nagamit
                            $('#show').html(response2.VARIABLE); //nagamit
                            $('#full_name').val(response2.EMAIL); //nagamit
                        }
                    });
                }

            });
        </script>

        <script type="text/javascript" src="_Assets/js/jquery-3.4.0.min.js"></script>
        <script type="text/javascript" src="_Assets/js/popper.min.js"></script>
        <script type="text/javascript" src="_Assets/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="_Assets/js/mdb.min.js"></script>

        <link rel="stylesheet" type="text/css" href="_Assets/css/jquery.dataTables.min.css" />
        <script type="text/javascript" src="_Assets/js/jquery.dataTables.min.js"></script>
        <link rel="stylesheet" type="text/css" href="_Assets/css/dataTables.responsive.css">
        <script type="text/javascript" language="javascript" src="_Assets/js/dataTables.responsive.js"></script>

</body>

</html>

<script type="text/javascript">
    var IDLE_TIMEOUT = 1200;
    var _idleSecondsCounter = 0;
    document.onclick = function() {
        _idleSecondsCounter = 0;
    };
    document.onmousemove = function() {
        _idleSecondsCounter = 0;
    };
    document.onkeypress = function() {
        _idleSecondsCounter = 0;
    };
    window.setInterval(CheckIdleTime, 1000);

    function CheckIdleTime() {
        _idleSecondsCounter++;
        var oPanel = document.getElementById("SecondsUntilExpire");
        if (oPanel)
            oPanel.innerHTML = (IDLE_TIMEOUT - _idleSecondsCounter) + "";
        if (_idleSecondsCounter >= IDLE_TIMEOUT) {
            document.location.href = "logout.php";
        }
    }
</script>