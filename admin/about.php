<?php

require "auth.php";
require 'header.php';

$admin = new core($conn);

$getAboutPage = $admin->aboutpage();
$getObjectives = $admin->aboutpageTb('about_objectives');
?>


    <style>

body{
    background:#f4f6f9;
    font-family:Segoe UI,sans-serif;
}

.card{
    border:none;
    border-radius:12px;
}

.card-header{
    background:#fff;
    font-weight:600;
    font-size:18px;
}

.form-control{
    border-radius:8px;
}

textarea{
    resize:none;
}

#storyPreview{
    width:100%;
    height:220px;
    object-fit:cover;
    border:1px solid #ddd;
}

.btn-success{
    border-radius:8px;
}

.table td,
.table th{
    vertical-align:middle;
}


    </style>





    <!-- Top Navbar -->
    <nav class="navbar bg-white shadow-sm px-3">
        <button class="btn btn-light d-lg-none" id="openSidebar">
            <i class="fas fa-bars"></i>
        </button>

        <h5 class="ms-2 mb-0">About Page Management</h5>
    </nav>

    <div class="p-4">

        <div class="container-fluid">

            <!-- Save Button -->
            <div class="d-flex mb-4">
                <button class="btn btn-success ms-auto px-4" id="saveAboutPage">
                    <i class="fas fa-save me-2"></i>
                    Save About Page
                </button>
            </div>

            <!-- ========================= -->
            <!-- PAGE HEADER -->
            <!-- ========================= -->

            <div class="card shadow-sm mb-4">

                <div class="card-header">
                    Page Header
                </div>

                <div class="card-body">

                    <label class="form-label">Page Title</label>
                    <input
                        type="text"
                        class="form-control mb-3"
                        id="page_title"
                        value="<?php echo htmlspecialchars($getAboutPage['page_title']); ?>">

                    <label class="form-label">Subtitle</label>
                    <textarea class="form-control" rows="3" id="page_subtitle"><?php echo htmlspecialchars($getAboutPage['page_subtitle']); ?></textarea>
                </div>

            </div>

            <!-- ========================= -->
            <!-- OUR STORY -->
            <!-- ========================= -->

            <div class="card shadow-sm mb-4">

                <div class="card-header">
                    Our Story
                </div>

                <div class="card-body">

                    <div class="row">

                        <div class="col-lg-8">

                            <label class="form-label">Heading</label>
                            <input
                                type="text"
                                class="form-control mb-3"
                                id="story_heading"
                                value="<?php echo htmlspecialchars($getAboutPage['story_heading']); ?>">

                            <label class="form-label">Paragraph 1</label>
                            <textarea class="form-control mb-3" rows="5" id="story_paragraph1"><?php echo htmlspecialchars($getAboutPage['story_paragraph1']); ?></textarea>

                            <label class="form-label">Paragraph 2</label>
                            <textarea class="form-control" rows="5" id="story_paragraph2"><?php echo htmlspecialchars($getAboutPage['story_paragraph2']); ?></textarea>

                        </div>

                        <div class="col-lg-4">

                            <label class="form-label">Story Image</label>

                            <img src="../assets/img/<?php echo htmlspecialchars($getAboutPage['story_image']); ?>"
                                class="img-fluid rounded shadow mb-3"
                                id="storyPreview">

                            <input
                                type="file"
                                class="form-control"
                                id="storyImage">

                        </div>

                    </div>

                </div>

            </div>

        

            <!-- ========================= -->
            <!-- OBJECTIVES -->
            <!-- ========================= -->

            <div class="card shadow-sm mb-4">

                <div class="card-header d-flex justify-content-between align-items-center">

                    <span>Objectives</span>

                    <button class="btn btn-primary btn-sm" id="addObjective">
                        <i class="fas fa-plus"></i>
                        Add Objective
                    </button>

                </div>

                <div class="card-body">

                    <table class="table table-bordered align-middle">

                        <thead>
                            <tr>
                                <th width="220">Title</th>
                                <th>Description</th>
                                <th width="180">Action</th>
                            </tr>
                        </thead>

                        <tbody id="objectiveTable">

                            <?php foreach($getObjectives as $objective): ?>

                                <tr data-id="<?php echo $objective['id']; ?>">

                                    <td>
                                        <?php echo htmlspecialchars($objective['title']); ?>
                                    </td>

                                    <td>
                                        <?php echo htmlspecialchars($objective['description']); ?>
                                    </td>

                                    <td>

                                        <button class="btn btn-warning btn-sm editObjective">
                                            Edit
                                        </button>

                                        <button class="btn btn-danger btn-sm deleteObjective">
                                            Delete
                                        </button>

                                    </td>

                                </tr>

                        <?php endforeach; ?>
                        </tbody>

                    </table>

                </div>

            </div>

         <!-- add objective modal -->
            <!-- Add Objective Modal -->
                <div class="modal fade" id="objectiveModal" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content">

                            <div class="modal-header">
                                <h5 class="modal-title">Add Objective</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>

                            <div class="modal-body">

                                <div class="mb-3">
                                    <label class="form-label">Title</label>
                                    <input type="text" id="objectiveTitle" class="form-control" placeholder="Enter title">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Description</label>
                                    <textarea id="objectiveDescription" class="form-control" rows="4" placeholder="Enter description"></textarea>
                                </div>

                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                    Cancel
                                </button>
                                <button type="button" class="btn btn-primary" id="saveObjective">
                                    Save
                                </button>
                            </div>

                        </div>
                    </div>
                </div>

         <!-- add objective modal end -->

            <!-- ========================= -->
            <!-- REGISTERED OFFICE -->
            <!-- ========================= -->

            <div class="card shadow-sm mb-4">

                <div class="card-header">
                    Registered Office
                </div>

                <div class="card-body">

                    <input
                        class="form-control mb-3"
                        id="office_heading"
                        value="<?php echo htmlspecialchars($getAboutPage['office_heading']); ?>">

                    <input
                        class="form-control mb-3"
                        id="office_name"
                        value="<?php echo htmlspecialchars($getAboutPage['office_name']); ?>">

                    <input
                        class="form-control mb-3"
                        id="office_floor"
                        value="<?php echo htmlspecialchars($getAboutPage['office_floor']); ?>">

                    <input
                        class="form-control mb-3"
                        id="office_nearby_location"
                        value="<?php echo htmlspecialchars($getAboutPage['office_nearby_location']); ?>">

                    <input
                        class="form-control mb-3"
                        id="office_road"
                        value="<?php echo htmlspecialchars($getAboutPage['office_road']); ?>">

                    <input
                        class="form-control"
                        id="office_city"
                        value="<?php echo htmlspecialchars($getAboutPage['office_city']); ?>">

                </div>

            </div>

            <!-- ========================= -->
            <!-- FOOTER -->
            <!-- ========================= -->

            

        </div>

    </div>

</div>

</div>


<?php require 'back-top.php'; ?>



<script>
    // Hero Image Preview
let editingObjectiveRow = null;
document.getElementById("storyImage").addEventListener("change",function(e){

const reader=new FileReader();

reader.onload=function(){

document.getElementById("storyPreview").src=reader.result;

}

reader.readAsDataURL(e.target.files[0]);

});


// Open Modal
document.getElementById("addObjective").onclick = function(){

    editingObjectiveRow = null;

    document.getElementById("objectiveTitle").value = "";
    document.getElementById("objectiveDescription").value = "";

    document.querySelector("#objectiveModal .modal-title").innerText =
        "Add Objective";

    let modal = new bootstrap.Modal(
        document.getElementById("objectiveModal")
    );

    modal.show();

};

// Save Objective
document.getElementById("saveObjective").onclick = function(){

    let title = document.getElementById("objectiveTitle").value.trim();
    let description = document.getElementById("objectiveDescription").value.trim();

    if(title == "" || description == ""){
        return;
    }

    let id = editingObjectiveRow ? editingObjectiveRow.dataset.id : "";

    $.ajax({

        url: "../include/routes.php",

        type: "POST",

        data:{

            type:8,
            id:id,
            title:title,
            description:description

        },

        dataType:"json",

        success:function(response){

            if(response.statusCode == 200){

                if(editingObjectiveRow){

                    editingObjectiveRow.cells[0].innerText = title;
                    editingObjectiveRow.cells[1].innerText = description;

                }else{

                    let tbody = document.getElementById("objectiveTable");

                    let row = document.createElement("tr");

                    row.dataset.id = response.id;

                    row.innerHTML = `
                        <td>${title}</td>
                        <td>${description}</td>
                        <td>

                            <button class="btn btn-warning btn-sm editObjective">
                                Edit
                            </button>

                            <button class="btn btn-danger btn-sm deleteObjective">
                                Delete
                            </button>

                        </td>
                    `;

                    tbody.appendChild(row);

                }

                bootstrap.Modal
                    .getInstance(document.getElementById("objectiveModal"))
                    .hide();

                document.getElementById("objectiveTitle").value = "";
                document.getElementById("objectiveDescription").value = "";

                editingObjectiveRow = null;

            }else{

                alert("Save failed");

            }

        },

        error:function(xhr){

            console.log(xhr.responseText);

            alert("Server error");

        }

    });

};

// Add Edit Objective

document.addEventListener("click",function(e){

    let editButton = e.target.closest(".editObjective");

    if(editButton){

        editingObjectiveRow = editButton.closest("tr");

        document.getElementById("objectiveTitle").value =
            editingObjectiveRow.cells[0].innerText.trim();

        document.getElementById("objectiveDescription").value =
            editingObjectiveRow.cells[1].innerText.trim();

        document.querySelector("#objectiveModal .modal-title").innerText =
            "Edit Objective";

        let modal = new bootstrap.Modal(
            document.getElementById("objectiveModal")
        );

        modal.show();

    }

});

// Delete Row
document.addEventListener("click",function(e){

    let deleteButton = e.target.closest(".deleteObjective");

    if(deleteButton){

        let row = deleteButton.closest("tr");

        let id = row.dataset.id;

        if(!confirm("Are you sure you want to delete this objective?")){
            return;
        }

        $.ajax({

            url:"../include/routes.php",

            type:"POST",

            data:{

                type:9,
                id:id

            },

            dataType:"json",

            success:function(response){

                if(response.statusCode == 200){

                    row.remove();

                }else{

                    alert("Delete failed");

                }

            },

            error:function(xhr){

                console.log(xhr.responseText);

                alert("Server error");

            }

        });

    }

});


//==========================
// SAVE ABOUT PAGE
//==========================

document.getElementById("saveAboutPage").onclick = function(){

    let formData = new FormData();

    formData.append("type", 10);

    // Page Header
    formData.append("page_title", $("#page_title").val());
    formData.append("page_subtitle", $("#page_subtitle").val());

    // Story
    formData.append("story_heading", $("#story_heading").val());
    formData.append("story_paragraph1", $("#story_paragraph1").val());
    formData.append("story_paragraph2", $("#story_paragraph2").val());

    // Office
    formData.append("office_heading", $("#office_heading").val());
    formData.append("office_name", $("#office_name").val());
    formData.append("office_floor", $("#office_floor").val());
    formData.append("office_nearby_location", $("#office_nearby_location").val());
    formData.append("office_road", $("#office_road").val());
    formData.append("office_city", $("#office_city").val());

    // Story Image
    if($("#storyImage")[0].files.length > 0){

        formData.append(
            "story_image",
            $("#storyImage")[0].files[0]
        );

    }

    $.ajax({

        url:"../include/routes.php",

        type:"POST",

        data:formData,

        processData:false,

        contentType:false,

        dataType:"json",

        success:function(response){

            if(response.statusCode == 200){

                alert("About page updated successfully.");

                $("#storyImage").val("");

            }else{

                alert("Update failed.");

            }

        },

        error:function(xhr){

            console.log(xhr.responseText);

            alert("Server error.");

        }

    });

};


</script>

<script src="assets/js/main.js"></script>

</body>
</html>