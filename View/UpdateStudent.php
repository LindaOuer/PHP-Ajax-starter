<?php
include '../Controller/StudentC.php';
$studentC = new StudentC();

$error = "";

$student = null;

if (
    isset($_POST["first_name"]) &&
    isset($_POST["last_name"])
) {
    if (
        !empty($_POST['first_name']) &&
        !empty($_POST["last_name"])
    ) {

        // Test if the user chose a new image or kept the old one
        if ($_FILES["image"]["size"] != 0) {
            // rename the image before saving to database
            $original_name = $_FILES["image"]["name"];
            $imageName = uniqid() . time() . "." . pathinfo($original_name, PATHINFO_EXTENSION);
            move_uploaded_file($_FILES["image"]["tmp_name"], "./images/uploads/" . $imageName);
            // remove the old image from uploads directory
            unlink("./images/uploads/" . $_POST["image_old"]);
        } else {
            $imageName = $_POST["image_old"];
        }

        //_______________________________________________________
        // Add The code for updating the student information here




        //_______________________________________________________

    } else
        $error = "Missing information";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Formation</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- Font Awesome  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Datatables CSS  -->
    <link href="https://cdn.datatables.net/v/bs5/dt-1.13.4/datatables.min.css" rel="stylesheet" />
    <!-- CSS  -->
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <?php
    // Include the header content
    include 'Header.php';
    ?>

    <div class="container">


        <?php
        if (isset($_GET['id'])) {
            /*_______________________________________________________

                Complete the code to get the information of a specific student before update 

                _______________________________________________________
            */
            

        ?>


            <div class="modal-header">
                <h5 class="modal-title" id="addStudentModalLabel">Update Student</h5>
            </div>
            <div class="modal-body">
                <div id="error">
                    <?php echo $error; ?>
                </div>
                <form method="POST" id="insertForm" action="" enctype="multipart/form-data">
                    <div class="row mb-3">
                        <div class="col">
                            <label class="form-label">First Name</label>
                            <!-- _______________________________________________________

                                Complete the code to preview the existing first name in case of update 

                                _______________________________________________________
                            -->
                            <input type="text" class="form-control" name="first_name" placeholder="Your First Name Here" value="">
                        </div>
                        <div class="col">
                            <label class="form-label">Last Name</label>
                            <!-- _______________________________________________________

                                Complete the code to preview the existing last name in case of update 

                                _______________________________________________________
                            -->
                            <input type="text" class="form-control" name="last_name" placeholder="Your Last Name Here" value="">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="form-label">Upload Image</label>
                        <div class="col-2">

                            <!-- _______________________________________________________

                            Add the code to visualize the previous image   

                            _______________________________________________________
                        -->


                        </div>
                        <div class="col-10">
                            <div class="file-upload text-secondary">
                                <input type="file" class="image" name="image" accept="image/*">
                                <!-- _______________________________________________________

                                    Add the code to save the previous image  in case of update 

                                    _______________________________________________________
                                -->

                                <span class="fs-4 fw-2">Choose file...</span>
                                <span>or drag and drop file here</span>
                            </div>
                        </div>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-outline-dark me-1" id="insertBtn">Submit</button>
                        <button type="reset" class="btn btn-outline-secondary">Cancel</button>
                    </div>
                </form>
            </div>
        <?php
        }
        ?>



    </div>




    <!-- Bootstrap  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Jquery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Datatables  -->
    <script src="https://cdn.datatables.net/v/bs5/dt-1.13.4/datatables.min.js"></script>
    <!-- JS  -->
    <script>
        // function to display image before upload
        $("input.image").change(function() {
            var file = this.files[0];
            var url = URL.createObjectURL(file);
            $(this).closest(".row").find(".preview_img").attr("src", url);
        });
    </script>
</body>

</html>