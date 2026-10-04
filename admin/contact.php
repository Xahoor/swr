<?php

require "auth.php";
require 'header.php';

$admin = new core($conn);

$contact = $admin->contactPage();

$messages = $admin->contactMessages();
?>



    <style>

/* Contact Admin */


.card{

border-radius:12px;

}


.card-header{

background:white;
font-weight:600;
font-size:18px;

}


.form-control{

border-radius:8px;

}


textarea{

resize:none;

}



.table td,
.table th{

vertical-align:middle;

}



.deleteMessage{

border-radius:8px;

}


.btn-success{

border-radius:8px;

}

.message-preview{

max-width:300px;
white-space:nowrap;
overflow:hidden;
text-overflow:ellipsis;

}


#fullMessage{

white-space:pre-wrap;
line-height:1.7;

}


.modal-body{

font-size:16px;

}

    </style>




<nav class="navbar bg-white shadow-sm px-3">

<button class="btn btn-light d-lg-none" id="openSidebar">
<i class="fas fa-bars"></i>
</button>


<h5 class="ms-2 mb-0">
Contact Page Management
</h5>


</nav>





<div class="p-4">

<div class="container-fluid">





<!-- Save Button -->

<div class="d-flex mb-4">

<button class="btn btn-success ms-auto px-4">

<i class="fas fa-save me-2"></i>
Save Contact Page

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
value="<?php echo htmlspecialchars($contact['page_title']); ?>">



<label class="form-label">
Subtitle
</label>


<textarea class="form-control" rows="3" id="page_subtitle"><?php echo htmlspecialchars($contact['page_subtitle']); ?></textarea>

</div>


</div>









<!-- Contact Information -->


<div class="card shadow-sm mb-4">


<div class="card-header">
Contact Information
</div>


<div class="card-body">


<label>
Address
</label>


<textarea class="form-control mb-3" rows="3" id="address"><?php echo htmlspecialchars($contact['address']); ?></textarea>


<label>
Email
</label>


<input
class="form-control mb-3"
id="email"
value="<?php echo htmlspecialchars($contact['email']); ?>">








</div>


</div>









<!-- Social Media -->


<div class="card shadow-sm mb-4">


<div class="card-header">
Social Media Links
</div>


<div class="card-body">


<div class="row">


<div class="col-md-6">


<label>
Facebook
</label>


<input
class="form-control mb-3"
id="facebook_url"
value="<?php echo htmlspecialchars($contact['facebook_url']); ?>">



<label>
Instagram
</label>


<input
class="form-control"
id="instagram_url"
value="<?php echo htmlspecialchars($contact['instagram_url']); ?>">


</div>





<div class="col-md-6">


<label>
LinkedIn
</label>


<input
class="form-control mb-3"
id="linkedin_url"
value="<?php echo htmlspecialchars($contact['linkedin_url']); ?>">



<label>
Youtube
</label>


<input
class="form-control"
id="youtube_url"
value="<?php echo htmlspecialchars($contact['youtube_url']); ?>">


</div>



</div>


</div>


</div>









<!-- Contact Messages -->


<div class="card shadow-sm mb-4">


<div class="card-header">

Contact Form Messages

</div>



<div class="card-body">


<div class="table-responsive">


<table class="table table-bordered align-middle">


<thead class="table-light">


<tr>


<th width="50">
#
</th>


<th>
Name
</th>


<th>
Email
</th>


<th>
Subject
</th>



<th width="160">
Action
</th>


</tr>


</thead>




<tbody id="messageTable">


<?php foreach($messages as $message): ?>

<tr data-id="<?php echo $message['id']; ?>">

<td>
<?php echo $message['id']; ?>
</td>

<td>
<?php echo htmlspecialchars($message['full_name']); ?>
</td>

<td>
<?php echo htmlspecialchars($message['email']); ?>
</td>

<td>
<?php echo htmlspecialchars($message['subject']); ?>
</td>

<td>

<button
class="btn btn-primary btn-sm viewMessage"
data-message="<?php echo htmlspecialchars($message['message']); ?>">

<i class="fas fa-eye"></i>

View

</button>

<button
class="btn btn-danger btn-sm deleteMessage">

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








</div>

</div>


</div>









<!-- Message View Modal -->


<div class="modal fade" id="messageModal">


<div class="modal-dialog modal-lg">


<div class="modal-content">


<div class="modal-header">


<h5 class="modal-title">
Full Message
</h5>


<button class="btn-close"
data-bs-dismiss="modal">
</button>


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
// SAVE CONTACT PAGE
// ==========================

document.querySelector(".btn-success").onclick=function(){

let formData=new FormData();

formData.append("type",30);

formData.append("page_title",
document.getElementById("page_title").value);

formData.append("page_subtitle",
document.getElementById("page_subtitle").value);

formData.append("address",
document.getElementById("address").value);

formData.append("email",
document.getElementById("email").value);

formData.append("facebook_url",
document.getElementById("facebook_url").value);

formData.append("instagram_url",
document.getElementById("instagram_url").value);

formData.append("linkedin_url",
document.getElementById("linkedin_url").value);

formData.append("youtube_url",
document.getElementById("youtube_url").value);

$.ajax({

url:"../include/routes.php",

type:"POST",

data:formData,

processData:false,

contentType:false,

dataType:"json",

success:function(response){

if(response.statusCode==200){

alert("Contact page updated successfully");

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
// DELETE MESSAGE
// ==========================

document.addEventListener("click",function(e){

if(e.target.closest(".deleteMessage")){

let row=e.target.closest("tr");

let id=row.dataset.id;

if(!confirm("Delete this message?")){

return;

}

$.ajax({

url:"../include/routes.php",

type:"POST",

data:{

type:31,

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




// ==========================
// VIEW MESSAGE
// ==========================

document.addEventListener("click",function(e){

if(e.target.closest(".viewMessage")){

let button=e.target.closest(".viewMessage");

document.getElementById("fullMessage").innerText=
button.dataset.message;

let modal=new bootstrap.Modal(
document.getElementById("messageModal")
);

modal.show();

}

});




// ==========================
// AUTO RESIZE TEXTAREA
// ==========================

document.querySelectorAll("textarea").forEach(function(textarea){

textarea.addEventListener("input",function(){

this.style.height="auto";

this.style.height=this.scrollHeight+"px";

});

});

</script>

</body>
</html>