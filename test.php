<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Title Page</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" media="screen" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/css/bootstrap.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn t work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
<form action="classes/routing.php" method="POST" role="form" enctype="multipart/form-data">
    <legend>Form title</legend>

    <div class="form-group">
        <label for="">Name</label>
        <input type="text" class="form-control" id="" placeholder="Input field" name="child_name">
    </div>
    <div class="form-group">
        <label for="">Gender</label>
        <input type="text" class="form-control" id="" placeholder="Input field" name="gender">
    </div>
    <div class="form-group">
        <label for="">Dob</label>
        <input type="date" class="form-control" id="" placeholder="Input field" name="dob">
    </div>

    <div class="form-group">
        <label for="">Birthmark</label>
        <input type="text" class="form-control" id="" placeholder="Input field" name="birthmark">
    </div>

    <div class="form-group">
        <label for="">Disability</label>
        <input type="text" class="form-control" id="" placeholder="Input field" name="disability">
    </div>


    <div class="form-group">
        <label for="">Date of admission</label>
        <input type="date" class="form-control" id="" placeholder="Input field" name="date_of_admission">
    </div>

    <div class="form-group">
        <label for="">Source of Admission</label>
        <input type="text" class="form-control" id="" placeholder="Input field" name="source_of_admission">
    </div>


    <div class="form-group">
        <label for="">Image</label>
        <input type="file" class="form-control" id="" placeholder="Input field" name="child_image">
    </div>

    <div class="form-group">
        <label for="">Current Standard</label>
        <input type="text" class="form-control" id="" placeholder="Input field" name="current_standard">
    </div>

    <div class="form-group">
        <label for="">Personal Documents</label>
        <input type="file" class="form-control" id="" placeholder="Input field" name="personal_documents">
    </div>




    <button type="submit" class="btn btn-primary" name="child_submit">Submit</button>
</form>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>

</html>
