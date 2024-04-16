<head>
    <?php require_once('layout.php') ?> 
    <style>
        .dash-nav i{
            color: #fff;
        }
        .dash-nav i:hover{
            color: gray;
        }
    </style>
</head>

<div class="container-fluid bg-dark p-4 text-center dash-nav">
    <div class="container">
        <div class="row">
            <div class="col-3">
                <a href="dashboard.php">
                    <i class="fa fa-home display-3"></i>
                </a>
            </div>
            <div class="col-3">
                <a href="user-profile.php">
                    <i class="fa fa-eye display-3"></i>
                </a>
            </div>
            <div class="col-3">
                <a href="edit-profile.php">
                    <i class="fa fa-edit display-3"></i>
                </a>
            </div>
            <div class="col-3">
                <a href="delete-profile.php">
                    <i class="fa fa-trash display-3"></i>
                </a>
            </div>
        </div>
    </div>
</div>