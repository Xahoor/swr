<?php

require "auth.php";
require 'header.php';
$admin = new core($conn);

$header = $admin->getInvolvedHeader();
$volunteers = $admin->volunteers();
$partners = $admin->partners();
?>



    <style>

/* Get Involved Admin */


.card{

border-radius:12px;

}


.card-header{

background:#fff;
font-weight:600;
font-size:18px;

}


.form-control,
.form-select{

border-radius:8px;

}


textarea{

resize:none;

}



.table td,
.table th{

vertical-align:middle;

}



.table td:nth-child(6){

max-width:150px;

}



.viewMessage{

border-radius:8px;

}


.deleteRow{

border-radius:8px;

}



.btn-success{

border-radius:8px;

}

    </style>




            <nav class="navbar bg-white shadow-sm px-3">

            <button class="btn btn-light d-lg-none" id="openSidebar">
            <i class="fas fa-bars"></i>
            </button>


            <h5 class="ms-2 mb-0">
            Get Involved Management
            </h5>


            </nav>




            <div class="p-4">


            <div class="container-fluid">



            <!-- Save -->

            <div class="d-flex mb-4">

            <button class="btn btn-success ms-auto px-4">

            <i class="fas fa-save me-2"></i>
            Save Changes

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
              value="<?php echo htmlspecialchars($header['page_title']); ?>">


            <label class="form-label">
            Subtitle
            </label>


            <textarea class="form-control" rows="3" id="page_subtitle"><?php echo htmlspecialchars($header['page_subtitle']); ?></textarea>


            </div>


            </div>









            <!-- Volunteer Section -->


            <div class="card shadow-sm mb-4">


            <div class="card-header">
            Volunteer Section
            </div>



            <div class="card-body">


            <label>
            Heading
            </label>

            <input 
              class="form-control mb-3"
              id="volunteer_heading"
              value="<?php echo htmlspecialchars($header['volunteer_heading']); ?>">



            <label>
            Description
            </label>


            <textarea class="form-control mb-3" rows="3" id="volunteer_description"><?php echo htmlspecialchars($header['volunteer_description']); ?></textarea>




            </div>


            </div>








            <!-- Volunteer Applications -->


            <div class="card shadow-sm mb-4">


            <div class="card-header">

            Volunteer Applications

            </div>



            <div class="card-body">


            <div class="table-responsive">


            <table class="table table-bordered">


            <thead class="table-light">

            <tr>

            <th>#</th>

            <th>Name</th>

            <th>Email</th>

            <th>Phone</th>

            <th>Skills</th>

            <th>Message</th>

            <th>Action</th>

            </tr>

            </thead>


              <tbody id="volunteerTable">

              <?php foreach($volunteers as $volunteer): ?>

              <tr data-id="<?php echo $volunteer['id']; ?>">

              <td>
              <?php echo $volunteer['id']; ?>
              </td>

              <td>
              <?php echo htmlspecialchars($volunteer['full_name']); ?>
              </td>

              <td>
              <?php echo htmlspecialchars($volunteer['email']); ?>
              </td>

              <td>
              <?php echo htmlspecialchars($volunteer['phone']); ?>
              </td>

              <td>
              <?php echo htmlspecialchars($volunteer['skills']); ?>
              </td>


              <td>

              <button 
              class="btn btn-info btn-sm viewMessage"
              data-message="<?php echo htmlspecialchars($volunteer['message']); ?>">

              View

              </button>

              </td>


              <td>

              <button 
              class="btn btn-danger btn-sm deleteVolunteer">

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









            <!-- Partner Section -->


            <div class="card shadow-sm mb-4">


            <div class="card-header">
            Partner Section
            </div>



            <div class="card-body">


            <label>
            Heading
            </label>

            <input 
              class="form-control mb-3"
              id="partner_heading"
              value="<?php echo htmlspecialchars($header['partner_heading']); ?>">



            <label>
            Description
            </label>


            <textarea class="form-control" rows="3" id="partner_description"><?php echo htmlspecialchars($header['partner_description']); ?></textarea>



            </div>


            </div>








            <!-- Partner Inquiries -->


            <div class="card shadow-sm mb-4">


            <div class="card-header">

            Partner Inquiries

            </div>



            <div class="card-body">


            <div class="table-responsive">


            <table class="table table-bordered">


            <thead class="table-light">


            <tr>

            <th>#</th>

            <th>Organization</th>

            <th>Representative</th>

            <th>Purpose</th>

            <th>Message</th>

            <th>Action</th>

            </tr>


            </thead>


              <tbody id="partnerTable">

              <?php foreach($partners as $partner): ?>

              <tr data-id="<?php echo $partner['id']; ?>">


              <td>
              <?php echo $partner['id']; ?>
              </td>


              <td>
              <?php echo htmlspecialchars($partner['organization_name']); ?>
              </td>


              <td>
              <?php echo htmlspecialchars($partner['representative_name']); ?>
              </td>


              <td>
              <?php echo htmlspecialchars($partner['purpose']); ?>
              </td>


              <td>

              <button 
              class="btn btn-info btn-sm viewMessage"
              data-message="<?php echo htmlspecialchars($partner['message']); ?>">

              View

              </button>

              </td>


              <td>

              <button 
              class="btn btn-danger btn-sm deletePartner">

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


            </div>









            <!-- Message Modal -->


            <div class="modal fade" id="messageModal">


            <div class="modal-dialog">


            <div class="modal-content">


            <div class="modal-header">

            <h5 class="modal-title">
            Full Message
            </h5>


            <button class="btn-close"
            data-bs-dismiss="modal"></button>


            </div>



            <div class="modal-body">


            <p id="fullMessage"></p>


            </div>



            </div>


            </div>


            </div>

<?php require 'back-top.php'; ?>


<script src="assets/js/main.js"></script>

<script>

// ==========================
// SAVE GET INVOLVED PAGE
// ==========================

document.querySelector(".btn-success").onclick = function(){


let formData = new FormData();


formData.append("type",27);


formData.append(
"page_title",
document.getElementById("page_title").value
);


formData.append(
"page_subtitle",
document.getElementById("page_subtitle").value
);



formData.append(
"volunteer_heading",
document.getElementById("volunteer_heading").value
);



formData.append(
"volunteer_description",
document.getElementById("volunteer_description").value
);



formData.append(
"partner_heading",
document.getElementById("partner_heading").value
);



formData.append(
"partner_description",
document.getElementById("partner_description").value
);




$.ajax({

url:"../include/routes.php",

type:"POST",

data:formData,

processData:false,

contentType:false,

dataType:"json",


success:function(response){


if(response.statusCode==200){

alert("Get Involved page updated successfully");


}else{

alert("Update failed");

}


},


error:function(xhr){

console.log(xhr.responseText);

}



});


};


// ==========================
// DELETE VOLUNTEER
// ==========================

document.addEventListener("click",function(e){

    if(e.target.classList.contains("deleteVolunteer")){

        let row = e.target.closest("tr");
        let id = row.dataset.id;

        if(!confirm("Delete this volunteer application?")){
            return;
        }

        $.ajax({

            url:"../include/routes.php",

            type:"POST",

            data:{
                type:28,
                id:id
            },

            dataType:"json",

            success:function(response){

                if(response.statusCode==200){

                    row.remove();

                }else{

                    alert("Delete failed");

                }

            },

            error:function(xhr){

                console.log(xhr.responseText);

            }

        });

    }

});

// ==========================
// DELETE PARTNER
// ==========================

document.addEventListener("click",function(e){

    if(e.target.classList.contains("deletePartner")){

        let row = e.target.closest("tr");
        let id = row.dataset.id;

        if(!confirm("Delete this partner inquiry?")){
            return;
        }

        $.ajax({

            url:"../include/routes.php",

            type:"POST",

            data:{
                type:29,
                id:id
            },

            dataType:"json",

            success:function(response){

                if(response.statusCode==200){

                    row.remove();

                }else{

                    alert("Delete failed");

                }

            },

            error:function(xhr){

                console.log(xhr.responseText);

            }

        });

    }

});








// Message View Modal


document
.querySelectorAll(".viewMessage")
.forEach(function(button){



button.addEventListener("click",function(){


let message=this.dataset.message;


document.getElementById("fullMessage").innerText=message;



let modal=new bootstrap.Modal(
document.getElementById("messageModal")
);


modal.show();



});


});




</script>

</body>
</html>