<?php
require "auth.php";
require 'header.php';

$admin = new core($conn);
$getProgramsPage = $admin->programsPage();
$getPrograms = $admin->programs();
?>




    <style>

/* Program Image */

.programPreview{

    width:100%;
    height:230px;
    object-fit:cover;
    border:1px solid #ddd;

}


/* Program Card */

.program-item{

    background:#fff;
}


.deleteProgram{

    border-radius:8px;

}

    </style>




            <nav class="navbar bg-white shadow-sm px-3">

                <button class="btn btn-light d-lg-none" id="openSidebar">
                    <i class="fas fa-bars"></i>
                </button>

                <h5 class="ms-2 mb-0">
                    Programs Management
                </h5>

            </nav>


            <div class="p-4">

            <div class="container-fluid">


            <!-- Save Button -->

            <div class="d-flex mb-4">

            <button 
                class="btn btn-success ms-auto px-4"
                id="saveProgramsPage">
                <i class="fas fa-save me-2"></i>
                Save Programs
            </button>

            </div>



            <!-- Page Header -->

            <div class="card shadow-sm mb-4">

            <div class="card-header">
            Page Header
            </div>


            <div class="card-body">

            <label class="form-label">
            Title
            </label>

            <input 
                class="form-control mb-3"
                id="program_page_title"
                value="<?php echo htmlspecialchars($getProgramsPage['title']); ?>">


            <label class="form-label">
            Subtitle
            </label>

            <textarea class="form-control" rows="3" id="program_page_subtitle"><?php echo htmlspecialchars($getProgramsPage['subtitle']); ?></textarea>

            </div>

            </div>





<!-- ========================= -->
<!-- PROGRAMS -->
<!-- ========================= -->

<div class="card shadow-sm mb-4">

    <div class="card-header d-flex justify-content-between align-items-center">

        <span>Programs List</span>

        <button class="btn btn-primary btn-sm" id="addProgram">
            <i class="fas fa-plus"></i>
            Add Program
        </button>

    </div>


    <div class="card-body">


        <table class="table table-bordered align-middle">


            <thead>

                <tr>

                    <th width="120">Image</th>

                    <th>Title</th>

                    <th>Description</th>

                    <th>Features</th>

                    <th width="180">Action</th>

                </tr>

            </thead>


            <tbody id="programTable">


            <?php foreach($getPrograms as $program): ?>


                <tr data-id="<?php echo $program['id']; ?>">


                    <td>

                        <img 
                        src="../assets/img/<?php echo htmlspecialchars($program['image']); ?>"
                        width="100"
                        height="70"
                        style="object-fit:cover;border-radius:8px;">

                    </td>


                    <td>

                        <?php echo htmlspecialchars($program['title']); ?>

                    </td>


                    <td>

                        <?php echo htmlspecialchars($program['description']); ?>

                    </td>


                    <td>

                        <ul class="mb-0">

                            <li>
                            <?php echo htmlspecialchars($program['feature_1']); ?>
                            </li>

                            <li>
                            <?php echo htmlspecialchars($program['feature_2']); ?>
                            </li>

                            <li>
                            <?php echo htmlspecialchars($program['feature_3']); ?>
                            </li>

                        </ul>

                    </td>


                    <td>


                        <button class="btn btn-warning btn-sm editProgram">

                            Edit

                        </button>



                        <button class="btn btn-danger btn-sm deleteProgram">

                            Delete

                        </button>


                    </td>


                </tr>


            <?php endforeach; ?>


            </tbody>


        </table>


    </div>

</div>








            <!-- program ends -->


            </div>


            </div>


            </div>




            <!-- Add Program Modal -->


            <div class="modal fade" id="programModal">


            <div class="modal-dialog modal-lg">


            <div class="modal-content">



            <div class="modal-header">

            <h5 class="modal-title" id="programModalTitle">
            Add Program
            </h5>


            <button class="btn-close"
            data-bs-dismiss="modal"></button>


            </div>

            <div class="modal-body">

            <label>
            Program Image
            </label>

            <input 
            type="file"
            id="programImage"
            class="form-control mb-3">

            <label>
            Title
            </label>

            <input id="programTitle"
            class="form-control mb-3">



            <label>
            Description
            </label>

            <textarea id="programDescription"
            class="form-control mb-3"
            rows="4"></textarea>



            <label>
            Feature 1
            </label>

            <input id="feature1"
            class="form-control mb-2">



            <label>
            Feature 2
            </label>

            <input id="feature2"
            class="form-control mb-2">



            <label>
            Feature 3
            </label>

            <input id="feature3"
            class="form-control">


            </div>




            <div class="modal-footer">


            <button class="btn btn-secondary"
            data-bs-dismiss="modal">

            Cancel

            </button>



            <button class="btn btn-primary"
            id="saveProgram">

            Save

            </button>


            </div>


            </div>


            </div>


            </div>


</div>


<?php require 'back-top.php'; ?>


<script>

    // =========================
// Program Image Preview
// =========================
// let editingProgramItem = null;

// document.addEventListener("change",function(e){


// if(e.target.classList.contains("programImage")){


// let file=e.target.files[0];


// let reader=new FileReader();



// reader.onload=function(){


// e.target
// .closest(".program-item")
// .querySelector(".programPreview")
// .src=reader.result;


// }



// reader.readAsDataURL(file);



// }


// });



// =========================
// Save Programs Page Header
// =========================

document.getElementById("saveProgramsPage").onclick = function () {

    let title = document.getElementById("program_page_title").value.trim();
    let subtitle = document.getElementById("program_page_subtitle").value.trim();

    $.ajax({

        url: "../include/routes.php",
        type: "POST",

        data: {
            type: 13,
            title: title,
            subtitle: subtitle
        },

        dataType: "json",

        success: function (response) {

            if (response.statusCode == 200) {

                alert("Programs page updated successfully.");

            } else {

                alert("Update failed.");

            }

        },

        error: function (xhr) {

            console.log(xhr.responseText);
            alert("Server error.");

        }

    });

};


let editingProgramRow = null;


// =========================
// Add Program
// =========================

document.getElementById("addProgram").onclick=function(){


    editingProgramRow = null;


    document.getElementById("programModalTitle").innerText =
    "Add Program";


    document.getElementById("programImage").value="";

    document.getElementById("programTitle").value="";

    document.getElementById("programDescription").value="";

    document.getElementById("feature1").value="";

    document.getElementById("feature2").value="";

    document.getElementById("feature3").value="";


    let modal = new bootstrap.Modal(
        document.getElementById("programModal")
    );


    modal.show();


};




// =========================
// Save Program
// =========================

document.getElementById("saveProgram").onclick=function(){


let title =
document.getElementById("programTitle").value.trim();


let description =
document.getElementById("programDescription").value.trim();


let feature1 =
document.getElementById("feature1").value.trim();


let feature2 =
document.getElementById("feature2").value.trim();


let feature3 =
document.getElementById("feature3").value.trim();



if(title=="" || description==""){

alert("Fill required fields");

return;

}



let id = editingProgramRow 
? editingProgramRow.dataset.id 
: "";



let formData = new FormData();


formData.append("type",11);

formData.append("id",id);

formData.append("title",title);

formData.append("description",description);

formData.append("feature_1",feature1);

formData.append("feature_2",feature2);

formData.append("feature_3",feature3);



if(document.getElementById("programImage").files.length > 0){

formData.append(
"image",
document.getElementById("programImage").files[0]
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


if(response.statusCode==200){


if(editingProgramRow){


editingProgramRow.cells[1].innerText = title;


editingProgramRow.cells[2].innerText = description;



editingProgramRow.cells[3].innerHTML = `

<ul class="mb-0">

<li>${feature1}</li>

<li>${feature2}</li>

<li>${feature3}</li>

</ul>

`;



// change image if user selected a new one

if(document.getElementById("programImage").files.length > 0){


editingProgramRow.cells[0]
.querySelector("img")
.src = URL.createObjectURL(
    document.getElementById("programImage").files[0]
);


}


}else{


let tbody=document.getElementById("programTable");


let row=document.createElement("tr");


row.dataset.id=response.id;



row.innerHTML=`

<td>

<img 
src="${
    document.getElementById("programImage").files.length > 0
    ? URL.createObjectURL(document.getElementById("programImage").files[0])
    : "../assets/img/default.png"
}"
width="100"
height="70"
style="object-fit:cover;border-radius:8px;">

</td>


<td>${title}</td>


<td>${description}</td>


<td>

<ul class="mb-0">

<li>${feature1}</li>

<li>${feature2}</li>

<li>${feature3}</li>

</ul>

</td>


<td>

<button class="btn btn-warning btn-sm editProgram">
Edit
</button>


<button class="btn btn-danger btn-sm deleteProgram">
Delete
</button>

</td>

`;



tbody.appendChild(row);



}

bootstrap.Modal
.getInstance(document.getElementById("programModal"))
.hide();


// clear selected image file
document.getElementById("programImage").value = "";


editingProgramRow = null;



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





// =========================
// Edit Program
// =========================

document.addEventListener("click",function(e){


if(e.target.classList.contains("editProgram")){


editingProgramRow =
e.target.closest("tr");



document.getElementById("programTitle").value =
editingProgramRow.cells[1].innerText.trim();



document.getElementById("programDescription").value =
editingProgramRow.cells[2].innerText.trim();



let features =
editingProgramRow.cells[3]
.querySelectorAll("li");



document.getElementById("feature1").value =
features[0]?.innerText ?? "";

document.getElementById("feature2").value =
features[1]?.innerText ?? "";

document.getElementById("feature3").value =
features[2]?.innerText ?? "";



document.getElementById("programModalTitle").innerText =
"Edit Program";



let modal=new bootstrap.Modal(
document.getElementById("programModal")
);


modal.show();



}


});




// =========================
// Delete Program
// =========================

document.addEventListener("click",function(e){


if(e.target.classList.contains("deleteProgram")){


let row=e.target.closest("tr");


let id=row.dataset.id;



if(!confirm("Delete this program?")){

return;

}



$.ajax({


url:"../include/routes.php",

type:"POST",

data:{


type:12,

id:id


},


dataType:"json",



success:function(response){


if(response.statusCode==200){


row.remove();


}else{


alert("Delete failed");


}


}



});



}


});

</script>
<script src="assets/js/main.js"></script>

</body>
</html>