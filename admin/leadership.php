<?php
require "auth.php";
require 'header.php';

$admin = new core($conn);

$getLeadership = $admin->leadershipPage();

$getCommittee = $admin->leadershipTb('executive_committee');

$getGovernance = $admin->leadershipTb('board_governance');

?>


    <style>

/* Leadership Admin */

.founderPreview{

    width:100%;
    height:300px;
    object-fit:cover;
    border:1px solid #ddd;

}


.committee-item{

    background:#fff;

}


.deleteCommittee,
.deleteGovernor{

    border-radius:8px;

}


.table td,
.table th{

    vertical-align:middle;

}

    </style>



           


        <nav class="navbar bg-white shadow-sm px-3">

            <button class="btn btn-light d-lg-none" id="openSidebar">
                <i class="fas fa-bars"></i>
            </button>

            <h5 class="ms-2 mb-0">
                Leadership Management
            </h5>

        </nav>


        <div class="p-4">

        <div class="container-fluid">


        <!-- Save Button -->

        <div class="d-flex mb-4">

        <button class="btn btn-success ms-auto px-4" id="saveLeadership">
        <i class="fas fa-save me-2"></i>
        Save Leadership

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
            id="page_title"
            value="<?php echo htmlspecialchars($getLeadership['page_title']); ?>">


        <label class="form-label">
        Subtitle
        </label>

        <textarea
            class="form-control"
            rows="3"
            id="page_subtitle"><?php echo htmlspecialchars($getLeadership['page_subtitle']); ?></textarea>


        </div>

        </div>




        <!-- Founder Section -->


        <div class="card shadow-sm mb-4">


        <div class="card-header">
        Founder Section
        </div>


        <div class="card-body">


        <div class="row">


        <div class="col-lg-4">


        <label class="form-label">
        Founder Image
        </label>


        <img

            src="../assets/img/<?php echo htmlspecialchars($getLeadership['founder_image']); ?>"

            class="img-fluid rounded shadow mb-3 founderPreview"

            id="founderPreview">


        <input
            type="file"
            class="form-control founderImage"
            id="founderImage">


        </div>



        <div class="col-lg-8">


        <label>
        Founder Name
        </label>

        <input
            class="form-control mb-3"
            id="founder_name"
            value="<?php echo htmlspecialchars($getLeadership['founder_name']); ?>">



        <label>
        Designation
        </label>

        <input
            class="form-control mb-3"
            id="founder_designation"
            value="<?php echo htmlspecialchars($getLeadership['founder_designation']); ?>">



        <label>
        Founder Message
        </label>

        <textarea
            class="form-control mb-3"
            rows="4"
            id="founder_message"><?php echo htmlspecialchars($getLeadership['founder_message']); ?></textarea>



        <label>
        Biography & Qualifications
        </label>

        <textarea
            class="form-control mb-3"
            rows="5"
            id="founder_biography"><?php echo htmlspecialchars($getLeadership['founder_biography']); ?></textarea>



        <label>
        Experience
        </label>

        <textarea
            class="form-control"
            rows="5"
            id="founder_experience"><?php echo htmlspecialchars($getLeadership['founder_experience']); ?></textarea>

        </div>


        </div>


        </div>


        </div>





        <!-- Executive Committee -->


<!-- Executive Committee -->

<div class="card shadow-sm mb-4">

    <div class="card-header d-flex justify-content-between align-items-center">

        <span>
            Executive Committee
        </span>


        <button 
        class="btn btn-primary btn-sm"
        data-bs-toggle="modal"
        data-bs-target="#committeeModal">

        <i class="fas fa-plus"></i>
        Add Member

        </button>


    </div>


    <div class="card-body">


        <table class="table table-bordered">


            <thead>

                <tr>

                    <th>
                    Position
                    </th>

                    <th>
                    Description
                    </th>

                    <th width="120">
                    Action
                    </th>
                </tr>

            </thead>


            <tbody id="committeeTable">

                <?php foreach($getCommittee as $committee): ?>
                    <tr data-id="<?php echo $committee['id']; ?>">
                    <td>
                    <?php echo htmlspecialchars($committee['position']); ?>
                    </td>
                    <td>
                    <?php echo htmlspecialchars($committee['description']); ?>
                    </td>
                    <td>
                    <button class="btn btn-warning btn-sm editCommittee">
                    Edit
                    </button>
                    <button class="btn btn-danger btn-sm deleteCommittee">
                    Delete
                    </button>
                    </td>
                    </tr>
                <?php endforeach; ?>

            </tbody>


        </table>


    </div>


</div>





        <!-- Board Of Governors -->

       

        <div class="card shadow-sm mb-4">

            <div class="card-header d-flex justify-content-between align-items-center">

                <span>
                Board Of Governance
                </span>


                <button 
                class="btn btn-primary btn-sm"
                data-bs-toggle="modal"
                data-bs-target="#governanceModal">

                <i class="fas fa-plus"></i>
                Add Member

                </button>


            </div>



            <div class="card-body">


                <table class="table table-bordered">


                <thead>

                    <tr>

                        
                        <th>
                        Name
                        </th>

                        <th>
                        Role
                        </th>

                        <th>
                        Organization
                        </th>

                        <th width="120">
                        Action
                        </th>

                    </tr>


                </thead>



               <tbody id="governanceTable">

                    <?php foreach($getGovernance as $governance): ?>

                        <tr data-id="<?php echo $governance['id']; ?>">

                        <td>

                        <?php echo htmlspecialchars($governance['name']); ?>

                        </td>

                        <td>

                        <?php echo htmlspecialchars($governance['role']); ?>

                        </td>

                        <td>

                        <?php echo htmlspecialchars($governance['organization']); ?>

                        </td>

                        <td>

                        <button class="btn btn-warning btn-sm editGovernance">

                        Edit

                        </button>

                        <button class="btn btn-danger btn-sm deleteGovernance">

                        Delete

                        </button>

                        </td>

                        </tr>

                    <?php endforeach; ?>

                </tbody>


            </table>


        </div>


    </div>




</div>

</div>


</div>






        <!-- Add Committee Modal -->


        <div class="modal fade" id="committeeModal">


        <div class="modal-dialog">


        <div class="modal-content">


        <div class="modal-header">

            <h5 class="modal-title">
            Add Executive Committee Member
            </h5>


        <button class="btn-close"
        data-bs-dismiss="modal"></button>


        </div>


        <div class="modal-body">


        <label>
        Position
        </label>

        <input id="committeePosition"
        class="form-control mb-3">



        <label>
        Description
        </label>

        <input id="committeeDescription"
        class="form-control">


        </div>


        <div class="modal-footer">


        <button class="btn btn-secondary"
        data-bs-dismiss="modal">

        Cancel

        </button>


        <button class="btn btn-primary"
        id="saveCommittee">

        Save

        </button>


        </div>


        </div>


        </div>


        </div>


        <!-- Add Governance Modal -->

        <div class="modal fade" id="governanceModal">


            <div class="modal-dialog">


            <div class="modal-content">


            <div class="modal-header">

            <h5 class="modal-title">
            Add Board Member
            </h5>


            <button class="btn-close"
            data-bs-dismiss="modal"></button>


            </div>



            <div class="modal-body">


            



            <label>
            Name
            </label>

            <input 
            id="governanceName"
            class="form-control mb-3">



            <label>
            Role
            </label>

            <input 
            id="governanceRole"
            class="form-control mb-3">



            <label>
            Organization / Occupation
            </label>

            <input 
            id="governanceOrganization"
            class="form-control mb-3">



            </div>



            <div class="modal-footer">


            <button 
            class="btn btn-secondary"
            data-bs-dismiss="modal">

            Cancel

            </button>


            <button 
            class="btn btn-primary"
            id="saveGovernance">

            Save

            </button>


            </div>


            </div>


            </div>


            </div>

<?php require 'back-top.php'; ?>



<script>


let editingCommitteeRow = null;
let editingGovernanceRow = null;


  // Founder Image Preview

document.getElementById("founderImage").addEventListener("change",function(e){

    if(e.target.files.length){

        const reader = new FileReader();

        reader.onload = function(){

            document.getElementById("founderPreview").src = reader.result;

        }

        reader.readAsDataURL(e.target.files[0]);

    }

});


document.querySelector('[data-bs-target="#committeeModal"]').onclick = function(){

    editingCommitteeRow = null;

    document.getElementById("committeePosition").value = "";

    document.getElementById("committeeDescription").value = "";

    document.querySelector("#committeeModal .modal-title").innerText =
        "Add Executive Committee Member";

};



// Save Committee Member


document.getElementById("saveCommittee").onclick = function(){

    let position = $("#committeePosition").val().trim();

    let description = $("#committeeDescription").val().trim();

    if(position=="" || description==""){

        alert("Please fill all fields");

        return;

    }

    let id = editingCommitteeRow ? editingCommitteeRow.dataset.id : "";

    $.ajax({

        url:"../include/routes.php",

        type:"POST",

        data:{

            type:14,

            id:id,

            position:position,

            description:description

        },

        dataType:"json",

        success:function(response){

            if(response.statusCode==200){

                if(editingCommitteeRow){

                    editingCommitteeRow.cells[0].innerText = position;

                    editingCommitteeRow.cells[1].innerText = description;

                }

                else{

                    let tbody=document.getElementById("committeeTable");

                    let row=document.createElement("tr");

                    row.dataset.id=response.id;

                    row.innerHTML=`

                        <td>${position}</td>

                        <td>${description}</td>

                        <td>

                            <button class="btn btn-warning btn-sm editCommittee">

                                Edit

                            </button>

                            <button class="btn btn-danger btn-sm deleteCommittee">

                                Delete

                            </button>

                        </td>

                    `;

                    tbody.appendChild(row);

                }

                bootstrap.Modal
                .getInstance(document.getElementById("committeeModal"))
                .hide();

                $("#committeePosition").val("");

                $("#committeeDescription").val("");

                editingCommitteeRow = null;

            }

            else{

                alert("Save failed");

            }

        },

        error:function(xhr){

            console.log(xhr.responseText);

            alert("Server Error");

        }

    });

};


// edit committee

document.addEventListener("click",function(e){

    let btn=e.target.closest(".editCommittee");

    if(btn){

        editingCommitteeRow = btn.closest("tr");

        $("#committeePosition").val(
            editingCommitteeRow.cells[0].innerText.trim()
        );

        $("#committeeDescription").val(
            editingCommitteeRow.cells[1].innerText.trim()
        );

        document.querySelector("#committeeModal .modal-title").innerText =
            "Edit Executive Committee Member";

        new bootstrap.Modal(
            document.getElementById("committeeModal")
        ).show();

    }

});


// Delete Committee

document.addEventListener("click",function(e){

    let btn=e.target.closest(".deleteCommittee");

    if(!btn){

        return;

    }

    let row=btn.closest("tr");

    let id=row.dataset.id;

    if(!confirm("Delete this committee member?")){

        return;

    }

    $.ajax({

        url:"../include/routes.php",

        type:"POST",

        data:{

            type:15,

            id:id

        },

        dataType:"json",

        success:function(response){

            if(response.statusCode==200){

                row.remove();

            }

            else{

                alert("Delete failed");

            }

        },

        error:function(xhr){

            console.log(xhr.responseText);

            alert("Server Error");

        }

    });

});



// save governenace memeber

// ==========================
// Add / Update Governance
// ==========================

document.getElementById("saveGovernance").onclick = function(){

    let name = $("#governanceName").val().trim();

    let role = $("#governanceRole").val().trim();

    let organization = $("#governanceOrganization").val().trim();

    if(name=="" || role==""){

        alert("Please fill required fields");

        return;

    }

    let id = editingGovernanceRow ? editingGovernanceRow.dataset.id : "";

    $.ajax({

        url:"../include/routes.php",

        type:"POST",

        data:{

            type:16,

            id:id,

            name:name,

            role:role,

            organization:organization

        },

        dataType:"json",

        success:function(response){

            if(response.statusCode==200){

                if(editingGovernanceRow){

                    editingGovernanceRow.cells[0].innerText=name;

                    editingGovernanceRow.cells[1].innerText=role;

                    editingGovernanceRow.cells[2].innerText=organization;

                }

                else{

                    let tbody=document.getElementById("governanceTable");

                    let row=document.createElement("tr");

                    row.dataset.id=response.id;

                    row.innerHTML=`

                        <td>${name}</td>

                        <td>${role}</td>

                        <td>${organization}</td>

                        <td>

                            <button class="btn btn-warning btn-sm editGovernance">

                                Edit

                            </button>

                            <button class="btn btn-danger btn-sm deleteGovernance">

                                Delete

                            </button>

                        </td>

                    `;

                    tbody.appendChild(row);

                }

                bootstrap.Modal
                .getInstance(document.getElementById("governanceModal"))
                .hide();

                $("#governanceName").val("");

                $("#governanceRole").val("");

                $("#governanceOrganization").val("");

                editingGovernanceRow = null;

            }

            else{

                alert("Save failed");

            }

        },

        error:function(xhr){

            console.log(xhr.responseText);

            alert("Server Error");

        }

    });

};

// ==========================
// Edit Governance
// ==========================

document.addEventListener("click",function(e){

    let btn=e.target.closest(".editGovernance");

    if(btn){

        editingGovernanceRow=btn.closest("tr");

        $("#governanceName").val(
            editingGovernanceRow.cells[0].innerText.trim()
        );

        $("#governanceRole").val(
            editingGovernanceRow.cells[1].innerText.trim()
        );

        $("#governanceOrganization").val(
            editingGovernanceRow.cells[2].innerText.trim()
        );

        document.querySelector("#governanceModal .modal-title").innerText =
            "Edit Board Member";

        new bootstrap.Modal(
            document.getElementById("governanceModal")
        ).show();

    }

});

// reset the modal 

document.querySelector('[data-bs-target="#governanceModal"]').onclick=function(){

    editingGovernanceRow=null;

    $("#governanceName").val("");

    $("#governanceRole").val("");

    $("#governanceOrganization").val("");

    document.querySelector("#governanceModal .modal-title").innerText =
        "Add Board Member";

};

// ==========================
// Delete Governance
// ==========================

document.addEventListener("click",function(e){

    let btn=e.target.closest(".deleteGovernance");

    if(!btn){

        return;

    }

    let row=btn.closest("tr");

    let id=row.dataset.id;

    if(!confirm("Delete this board member?")){

        return;

    }

    $.ajax({

        url:"../include/routes.php",

        type:"POST",

        data:{

            type:17,

            id:id

        },

        dataType:"json",

        success:function(response){

            if(response.statusCode==200){

                row.remove();

            }

            else{

                alert("Delete failed");

            }

        },

        error:function(xhr){

            console.log(xhr.responseText);

            alert("Server Error");

        }

    });

});

// ==========================
// Save Leadership Page
// ==========================

document.getElementById("saveLeadership").onclick=function(){

    let formData=new FormData();

    formData.append("type",18);

    formData.append("page_title",$("#page_title").val());

    formData.append("page_subtitle",$("#page_subtitle").val());

    formData.append("founder_name",$("#founder_name").val());

    formData.append("founder_designation",$("#founder_designation").val());

    formData.append("founder_message",$("#founder_message").val());

    formData.append("founder_biography",$("#founder_biography").val());

    formData.append("founder_experience",$("#founder_experience").val());

    if($("#founderImage")[0].files.length>0){

        formData.append(

            "founder_image",

            $("#founderImage")[0].files[0]

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

                alert("Leadership updated successfully.");

                $("#founderImage").val("");

            }

            else{

                alert("Update failed.");

            }

        },

        error:function(xhr){

            console.log(xhr.responseText);

            alert("Server Error.");

        }

    });

};

</script>

<script src="assets/js/main.js"></script>

</body>
</html>