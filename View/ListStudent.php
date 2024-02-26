<?php
include '../Controller/StudentC.php';
$studentC = new StudentC();
/* _______________________________________________________

    Complete the code to get the students list 

    _______________________________________________________
*/


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
        <div class="d-flex justify-content-between align-items-center mb-3 mt-5">
            <div class="text-body-secondary">
                <span class="h5">All Students</span>
                <br>
                Manage all your existing students or add a new one
            </div>
            <!-- Button to trigger Add student offcanvas -->
            <button class="btn btn-dark" type="button" data-bs-toggle="modal" data-bs-target="#addStudentModal">
                Add new student
            </button>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="addStudentModal" tabindex="-1" aria-labelledby="addStudentModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addStudentModalLabel">Add New Student</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div id="error">
                            <?php echo $error; ?>
                        </div>
                        <form method="POST" id="insertForm" action="upload.php" enctype="multipart/form-data">
                            <div class="row mb-3">
                                <div class="col">
                                    <label class="form-label">First Name</label>
                                    <input type="text" class="form-control" name="first_name" placeholder="Your First Name Here">
                                </div>
                                <div class="col">
                                    <label class="form-label">Last Name</label>
                                    <input type="text" class="form-control" name="last_name" placeholder="Your Last Name Here">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="form-label">Upload Image</label>
                                <div class="col-2">
                                    <img class="preview_img" src="images/default_profile.jpg">
                                </div>
                                <div class="col-10">
                                    <div class="file-upload text-secondary">
                                        <input type="file" class="image" name="image" accept="image/*">
                                        <span class="fs-4 fw-2">Choose file...</span>
                                        <span>or drag and drop file here</span>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <button type="submit" class="btn btn-outline-dark me-1" id="insertBtn">Submit</button>
                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <table class="table table-bordered table-striped table-hover align-middle" id="myTable" style="width:100%;">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                /* _______________________________________________________

                    Complete the code to loop over the students list

                    _______________________________________________________
                */
                ?>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><img src=<?php echo ("./images/uploads/"); ?> alt="" style="width:50px;height:50px;border:2px solid gray;border-radius:8px;object-fit:cover"></td>
                    <td align="center">

                        <a href="UpdateStudent.php?id=" class="btn"><i class="fa-solid fa-pen-to-square fa-xl"></i>Update</a>
                        <a href="DeleteStudent.php?id=" class="btn"><i class="fa-solid fa-trash fa-xl"></i>Delete</a>

                    </td>
                </tr>
                <?php
                /* _______________________________________________________

                    End the loop here 

                    _______________________________________________________
                */
                ?>
            </tbody>
        </table>
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