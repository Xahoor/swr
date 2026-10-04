<?php

require "auth.php";
require 'header.php';

$admin = new core($conn);
$getHomePage = $admin->homepage();


$getHomepageFocus = $admin->homepageTb('focus_areas');
$getHomepageChoose = $admin->homepageTb('benefits');

?>

<style>
body{
    background:#f4f6f9;
    font-family:Segoe UI,sans-serif;
}

.page-title{
    font-weight:600;
}

.card{
    border:none;
    border-radius:15px;
}

.card-header{
    background:#fff;
    font-weight:600;
    font-size:18px;
    border-bottom:1px solid #eee;
}

.form-control,
.form-select{
    border-radius:10px;
}

textarea{
    resize:none;
}

#heroPreview{
    width:100%;
    height:230px;
    object-fit:cover;
    border-radius:12px;
    border:1px solid #ddd;
}

.section-space{
    margin-bottom:30px;
}

 
</style>

<!-- Top Navbar -->
<nav class="navbar bg-white shadow-sm px-4 py-3">

    <button class="btn btn-light d-lg-none" id="openSidebar">
        <i class="fas fa-bars"></i>
    </button>

    <h4 class="page-title mb-0">
        Homepage Management
    </h4>

    <button class="btn btn-success ms-auto" id="saveHomepage">
        <i class="fas fa-save me-2"></i>
        Save Homepage
    </button>

</nav>

<div class="container-fluid py-4">

<!-- =========================
        HERO SECTION
========================= -->

<div class="card shadow-sm section-space">

    <div class="card-header">
        Hero Section
    </div>

    <div class="card-body">

        <div class="row">

            <div class="col-lg-8">

                <div class="mb-3">
                    <label class="form-label">
                        Hero Title
                    </label>

                    <input
                        type="text"
                        class="form-control" id="hero_title"
                        value="<?php echo $getHomePage['hero_title']; ?>">
                </div>

                <div class="mb-3">
                    <label class="form-label">
                        Hero Subtitle
                    </label>

                    <input
                        type="text"
                        class="form-control" id="hero_subtitle"
                        value="<?php echo $getHomePage['hero_subtitle']; ?>">
                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Description
                    </label>

                    <textarea class="form-control" rows="6" id="hero_description"><?php echo $getHomePage['hero_description']; ?></textarea>

                </div>

            </div>

            <div class="col-lg-4">

                <label class="form-label">
                    Hero Image
                </label>

                <img
                    src="../assets/img/<?php echo $getHomePage['hero_image']; ?>"
                    id="heroPreview"
                    class="img-fluid shadow-sm mb-3">

                <input
                    type="file"
                    class="form-control"
                    id="heroImage">

            </div>

        </div>

    </div>

</div>

<!-- =========================
        ABOUT SECTION
========================= -->

<div class="card shadow-sm section-space">

    <div class="card-header">
        About Section
    </div>

    <div class="card-body">

        <div class="mb-3">

            <label class="form-label">
                Heading
            </label>

            <input
                type="text"
                class="form-control" id="about_heading"
                value="<?php echo $getHomePage['about_heading']; ?>">

        </div>

        <div class="mb-3">

            <label class="form-label">
                Paragraph One
            </label>

            <textarea rows="5" class="form-control" id="about_paragraph1"><?php echo $getHomePage['about_paragraph1']; ?></textarea>

        </div>

        <div class="mb-3">

            <label class="form-label">
                Paragraph Two
            </label>

            <textarea rows="5" class="form-control" id="about_paragraph2"><?php echo $getHomePage['about_paragraph2']; ?></textarea>
            

        </div>

        <div class="row">

                <div class="col-lg-6">

                    <label class="form-label">
                        About Image
                    </label>

                    <!-- Current image preview -->
                    <img 
                        id="aboutImagePreview"
                        src="../assets/img/<?php echo htmlspecialchars($getHomePage['about_image']); ?>"
                        class="img-thumbnail mb-2"
                        width="100"
                        height="100"
                    >

                    <!-- File input -->
                    <input 
                        type="file" 
                        name="about_image"
                        class="form-control"
                        id="about_image"
                        accept="image/*"
                        onchange="previewImage(event)"
                    >

                </div>

            </div>

<script>
function previewImage(event) {
    const image = document.getElementById('aboutImagePreview');
    image.src = URL.createObjectURL(event.target.files[0]);
}
</script>

    </div>

</div>

<!-- =========================
        VISION & MISSION
========================= -->

<div class="row">

    <div class="col-lg-6">

        <div class="card shadow-sm section-space">

            <div class="card-header">
                Vision
            </div>

            <div class="card-body">

                <div class="mb-3">

                    <label class="form-label">
                        Vision Title
                    </label>

                    <input
                        class="form-control"
                        value="<?php echo $getHomePage['vision_title']; ?>" id="vision_title">

                </div>

                <div>

                    <label class="form-label">
                        Description
                    </label>

                    <textarea rows="7" class="form-control" id="vision_description"><?php echo $getHomePage['vision_description']; ?></textarea>

                </div>

            </div>

        </div>

    </div>

    <div class="col-lg-6">

        <div class="card shadow-sm section-space">

            <div class="card-header">
                Mission
            </div>

            <div class="card-body">

                <div class="mb-3">

                    <label class="form-label">
                        Mission Title
                    </label>

                    <input
                        class="form-control"
                        value="<?php echo $getHomePage['mission_title']; ?>" id="mission_title">

                </div>

                <div>

                    <label class="form-label">
                        Description
                    </label>

                    <textarea rows="7" class="form-control" id="mission_description"><?php echo $getHomePage['mission_description']; ?></textarea>


                </div>

            </div>

        </div>

    </div>

</div>


<!-- =========================================
        FOCUS AREAS
========================================= -->

<div class="card shadow-sm section-space">

    <div class="card-header d-flex justify-content-between align-items-center">

        <h5 class="mb-0">
            Focus Areas
        </h5>

        <button
            class="btn btn-primary"
            id="addFocusBtn"
            data-bs-toggle="modal"
            data-bs-target="#focusModal">

            <i class="fas fa-plus me-2"></i>
            Add Focus Area

        </button>

    </div>

    <div class="card-body">

        <div class="table-responsive">

            <table class="table table-hover align-middle">

                <thead class="table-light">

                    <tr>
                        <th>Title</th>
                        <th width="140">Action</th>
                    </tr>

                </thead>

                <tbody id="focusTable">

                    <?php foreach ($getHomepageFocus as $focus): ?>

                        <tr data-id="<?php echo $focus['id']; ?>">

                            <td>
                                <?php echo htmlspecialchars($focus['title']); ?>
                            </td>

                            <td>

                                <button class="btn btn-warning btn-sm editFocus">
                                    <i class="fas fa-edit"></i>
                                </button>

                                <button class="btn btn-danger btn-sm deleteFocus">
                                    <i class="fas fa-trash"></i>
                                </button>

                            </td>

                        </tr>

                    <?php endforeach; ?>

                </tbody>

            </table>

        </div>

    </div>

</div>

<!-- =========================================
        WHY CHOOSE US
========================================= -->

<div class="card shadow-sm section-space">

    <div class="card-header d-flex justify-content-between align-items-center">

        <h5 class="mb-0">

            Why Choose Us

        </h5>

        <button
            class="btn btn-primary"
            data-bs-toggle="modal"
            data-bs-target="#benefitModal">

            <i class="fas fa-plus me-2"></i>

            Add Benefit

        </button>

    </div>

    <div class="card-body">

        <div class="table-responsive">

            <table class="table table-hover align-middle">

                <thead class="table-light">

                    <tr>


                        <th>
                            Benefit
                        </th>

                        <th width="140">
                            Action
                        </th>

                    </tr>

                </thead>

                <tbody id="benefitTable">

                    <?php foreach ($getHomepageChoose as $choose): ?>

                        <tr data-id="<?php echo $choose['id']; ?>">

                            <td>
                                <?php echo htmlspecialchars($choose['benefit']); ?>
                            </td>

                            <td>

                                <button class="btn btn-warning btn-sm editBenefit">
                                    <i class="fas fa-edit"></i>
                                </button>

                                <button class="btn btn-danger btn-sm deleteBenefit">
                                    <i class="fas fa-trash"></i>
                                </button>

                            </td>

                        </tr>

                    <?php endforeach; ?>
                </tbody>

            </table>

        </div>

    </div>

</div>







<!-- =========================================
        FOCUS AREA MODAL
========================================= -->

<div class="modal fade" id="focusModal" tabindex="-1">

    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title" id="focusModalTitle">
                    Add Focus Area
                </h5>
                        
                <button class="btn-close" data-bs-dismiss="modal"></button>

            </div>


            <div class="modal-body">

                <div class="mb-3">

                    <label class="form-label">
                        Title
                    </label>

                    <input 
                        id="focusTitle" 
                        class="form-control"
                        placeholder="Title">

                </div>

            </div>


            <div class="modal-footer">

                <button 
                    class="btn btn-secondary" 
                    data-bs-dismiss="modal">
                    Cancel
                </button>

                <button 
                    class="btn btn-primary" 
                    id="saveFocus">
                    Save
                </button>

            </div>

        </div>

    </div>

</div>


<!-- =========================================
        BENEFIT MODAL
========================================= -->

<div class="modal fade" id="benefitModal" tabindex="-1">

    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title">
                    Add Benefit
                </h5>

                <button class="btn-close" data-bs-dismiss="modal"></button>

            </div>

            <div class="modal-body">

                <label class="form-label">
                    Benefit
                </label>

                <textarea id="benefitText" rows="4" class="form-control"></textarea>

            </div>

            <div class="modal-footer">

                <button class="btn btn-secondary" data-bs-dismiss="modal">
                    Cancel
                </button>

                <button class="btn btn-primary" id="saveBenefit">
                    Save
                </button>

            </div>

        </div>

    </div>

</div>


<!-- Back To Top -->

<?php require 'back-top.php'; ?>

<script>


let editingFocusRow = null;
let editingBenefitRow = null;
//==========================
// Hero Preview
//==========================

document.getElementById("heroImage").addEventListener("change",function(e){

    if(e.target.files.length){

        const reader=new FileReader();

        reader.onload=function(){

            document.getElementById("heroPreview").src=reader.result;

        }

        reader.readAsDataURL(e.target.files[0]);

    }

});



//==========================
// Save Focus Area
//==========================

document.getElementById("addFocusBtn").onclick = function(){

    editingFocusRow = null;

    document.getElementById("focusTitle").value = "";

    document.getElementById("focusModalTitle").innerText = 
        "Add Focus Area";
        
};

document.getElementById("saveFocus").onclick = function(){

    let title = document.getElementById("focusTitle").value.trim();

    if(title == ""){
        return;
    }

    let id = editingFocusRow ? editingFocusRow.dataset.id : "";

    $.ajax({

        url: "../include/routes.php",

        type: "POST",

        data: {
            type: 3,
            id: id,
            title: title
        },

        dataType: "json",

        success:function(response){

            if(response.statusCode == 200){

                if(editingFocusRow){

                    // Update existing row
                    editingFocusRow.cells[0].innerText = title;

                }else{

                    // Add new row
                    let tbody = document.getElementById("focusTable");

                    let newRow = document.createElement("tr");

                    newRow.dataset.id = response.id;

                    newRow.innerHTML = `
                        <td>${title}</td>
                        <td>
                            <button class="btn btn-warning btn-sm editFocus">
                                <i class="fas fa-edit"></i>
                            </button>

                            <button class="btn btn-danger btn-sm deleteFocus">
                                <i class="fas fa-trash"></i>
                            </button>
                        </td>
                    `;

                    tbody.appendChild(newRow);

                }


                // Close modal
                bootstrap.Modal
                .getInstance(document.getElementById("focusModal"))
                .hide();


                // Clear form
                document.getElementById("focusTitle").value = "";

                // Reset edit mode
                editingFocusRow = null;


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


//==========================
// Edit Focus Area
//==========================

document.addEventListener("click", function(e){

    let editButton = e.target.closest(".editFocus");

    if(editButton){

    editingFocusRow = editButton.closest("tr");

    let title = editingFocusRow.cells[0].innerText.trim();

    document.getElementById("focusTitle").value = title;

    document.getElementById("focusModalTitle").innerText =
        "Edit Focus Area";
        



    let modal = new bootstrap.Modal(
        document.getElementById("focusModal")
    );

    modal.show();

}

});



// ============
// Save Benefit
// ============

document.getElementById("saveBenefit").onclick = function(){

    let text = document.getElementById("benefitText").value.trim();

    if(text == ""){
        return;
    }

    let id = editingBenefitRow ? editingBenefitRow.dataset.id : "";

    $.ajax({

        url: "../include/routes.php",

        type: "POST",

        data: {
            type: 5,
            id: id,
            benefit: text
        },

        dataType: "json",

        success:function(response){

            if(response.statusCode == 200){

                if(editingBenefitRow){

                    editingBenefitRow.cells[0].innerText = text;

                }else{

                    let tbody = document.getElementById("benefitTable");

                    let row = document.createElement("tr");

                    row.dataset.id = response.id;

                    row.innerHTML = `
                        <td>${text}</td>
                        <td>
                            <button class="btn btn-warning btn-sm editBenefit">
                                <i class="fas fa-edit"></i>
                            </button>

                            <button class="btn btn-danger btn-sm deleteBenefit">
                                <i class="fas fa-trash"></i>
                            </button>
                        </td>
                    `;

                    tbody.appendChild(row);

                }

                bootstrap.Modal
                    .getInstance(document.getElementById("benefitModal"))
                    .hide();

                document.getElementById("benefitText").value = "";

                editingBenefitRow = null;

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




// ============
// Edit Benefit
// ============

document.addEventListener("click", function(e){

    let editButton = e.target.closest(".editBenefit");

    if(editButton){

        editingBenefitRow = editButton.closest("tr");


        let text = editingBenefitRow.cells[0].innerText.trim();


        document.getElementById("benefitText").value = text;


        let modal = new bootstrap.Modal(
            document.getElementById("benefitModal")
        );

        modal.show();

    }

});
//==========================
// Delete Rows
//==========================

document.addEventListener("click",function(e){

    let deleteBtn = e.target.closest(".deleteFocus");

    if(deleteBtn){

        let row = deleteBtn.closest("tr");

        let id = row.dataset.id;


        if(!confirm("Are you sure you want to delete this focus area?")){
            return;
        }


        $.ajax({

            url: "../include/routes.php",

            type: "POST",

            data: {
                type: 4,
                id: id
            },

            dataType: "json",

            success:function(response){

                if(response.statusCode == 200){

                    // remove from table after database delete
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


if(e.target.closest(".deleteBenefit")){

    let row = e.target.closest("tr");

    let id = row.dataset.id;

    if(!confirm("Are you sure you want to delete this benefit?")){
        return;
    }

    $.ajax({

        url: "../include/routes.php",

        type: "POST",

        data: {
            type: 6,
            id: id
        },

        dataType: "json",

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
// SAVE HOMEPAGE
//==========================

document.getElementById("saveHomepage").onclick = function(){

    let formData = new FormData();

    formData.append("type", 7);

    // Hero
    formData.append("hero_title", $("#hero_title").val());
    formData.append("hero_subtitle", $("#hero_subtitle").val());
    formData.append("hero_description", $("#hero_description").val());

    // About
    formData.append("about_heading", $("#about_heading").val());
    formData.append("about_paragraph1", $("#about_paragraph1").val());
    formData.append("about_paragraph2", $("#about_paragraph2").val());

    // Vision
    formData.append("vision_title", $("#vision_title").val());
    formData.append("vision_description", $("#vision_description").val());

    // Mission
    formData.append("mission_title", $("#mission_title").val());
    formData.append("mission_description", $("#mission_description").val());

    // Hero Image
    if($("#heroImage")[0].files.length > 0){
        formData.append("hero_image", $("#heroImage")[0].files[0]);
    }

    // About Image
    if($("#about_image")[0].files.length > 0){
        formData.append("about_image", $("#about_image")[0].files[0]);
    }

    $.ajax({

        url: "../include/routes.php",

        type: "POST",

        data: formData,

        processData: false,

        contentType: false,

        dataType: "json",

        success:function(response){

            if(response.statusCode == 200){

                alert("Homepage updated successfully.");
                // Clear file inputs
        $("#heroImage").val("");
        $("#about_image").val("");
        

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

</div><!-- /.container-fluid -->
</div><!-- /.main-content -->
</div><!-- /.admin-wrapper -->

<script src="assets/js/main.js"></script>


</body>
</html>