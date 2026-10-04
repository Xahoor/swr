<?php
require "auth.php";
require 'header.php';
$admin = new core($conn);

$newsPage = $admin->newsPage();

$newsList = $admin->news();

$eventsList = $admin->events();

$galleryList = $admin->gallery();

?>
<style>

/* News Management */

.newsPreview{

    width:100%;
    height:250px;
    object-fit:cover;
    border-radius:10px;
    border:1px solid #ddd;

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


.table td,
.table th{

    vertical-align:middle;

}


.galleryPreview{

    width:100%;
    height:220px;
    object-fit:cover;
    border-radius:10px;

}


</style>


<!-- Navbar -->

<nav class="navbar bg-white shadow-sm px-3">


<button class="btn btn-light d-lg-none" id="openSidebar">

<i class="fas fa-bars"></i>

</button>


<h5 class="ms-2 mb-0">

News & Events Management

</h5>


</nav>



<div class="p-4">


<div class="container-fluid">



<!-- Save Button -->


<div class="d-flex mb-4">


<button class="btn btn-success ms-auto px-4" id="savePageHeader">


<i class="fas fa-save me-2"></i>

Save News


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
value="<?php echo htmlspecialchars($newsPage['title']); ?>">


<label class="form-label">

Subtitle

</label>

<textarea class="form-control" rows="3" id="page_subtitle"><?php echo htmlspecialchars($newsPage['subtitle']); ?></textarea>


</div>


</div>


<!-- ==========================
        LATEST NEWS
=========================== -->


<div class="card shadow-sm mb-4">



<div class="card-header d-flex justify-content-between align-items-center">


<span>

Latest News

</span>



<button 
class="btn btn-primary btn-sm"
data-bs-toggle="modal"
data-bs-target="#newsModal">


<i class="fas fa-plus"></i>

Add News


</button>



</div>





<div class="card-body">


<div id="newsContainer">



<!-- Default News Item -->

<?php foreach($newsList as $news): ?>

<div class="news-item border rounded p-3 mb-3"
data-id="<?php echo $news['id']; ?>">


<div class="row">


<div class="col-lg-4">


<img 
src="../assets/img/<?php echo $news['image']; ?>"
class="newsPreview mb-3">


</div>



<div class="col-lg-8">


<h5>

<?php echo htmlspecialchars($news['title']); ?>

</h5>



<p>

<?php echo htmlspecialchars($news['description']); ?>

</p>


<button 
class="btn btn-warning btn-sm editNews">
Edit
</button>


<button 
class="btn btn-danger btn-sm deleteNews">
Delete
</button>

</div>


</div>


</div>


<?php endforeach; ?>




</div>


</div>


</div>







<!-- ==========================
        NEWS MODAL
=========================== -->


<div class="modal fade" id="newsModal">


<div class="modal-dialog modal-lg">


<div class="modal-content">



<div class="modal-header">


<h5 class="modal-title" id="newsModalTitle">

Add News

</h5>



<button 
class="btn-close"
data-bs-dismiss="modal">

</button>



</div>




<div class="modal-body">

<input type="hidden" id="newsId">

<label class="form-label">
News Image

</label>

<img 
id="newsImagePreview"
src="https://via.placeholder.com/500x300"
class="newsPreview mb-3">


<input 
type="file"
id="newsImage"
name="image"
class="form-control mb-3"
accept="image/*">







<label class="form-label">

News Title

</label>


<input
id="newsTitle"
class="form-control mb-3"
placeholder="News Title">





<label class="form-label">

Description

</label>


<textarea
id="newsDescription"
class="form-control mb-3"
rows="4"
placeholder="News Description"></textarea>







</div>






<div class="modal-footer">


<button 
class="btn btn-secondary"
data-bs-dismiss="modal">

Cancel

</button>



<button 
class="btn btn-primary"
id="saveNews">

Save News

</button>



</div>




</div>


</div>


</div>

<!-- ==========================
        UPCOMING EVENTS
=========================== -->


<div class="card shadow-sm mb-4">


<div class="card-header d-flex justify-content-between align-items-center">


<span>

Upcoming Events

</span>



<button
class="btn btn-primary btn-sm"
data-bs-toggle="modal"
data-bs-target="#eventModal">


<i class="fas fa-plus"></i>

Add Event


</button>



</div>




<div class="card-body">



<div class="table-responsive">


<table class="table table-bordered">



<thead class="table-light">


<tr>


<th>

Event Title

</th>


<th>

Date

</th>


<th width="120">

Action

</th>


</tr>


</thead>





<tbody id="eventTable">


<?php foreach($eventsList as $event): ?>


<tr data-id="<?php echo $event['id']; ?>">


<td>

<?php echo htmlspecialchars($event['title']); ?>

</td>



<td>

<?php echo htmlspecialchars($event['event_date']); ?>

</td>


<td>
<button 
class="btn btn-warning btn-sm editEvent">
Edit
</button>


<button 
class="btn btn-danger btn-sm deleteEvent">
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








<!-- ==========================
        EVENT MODAL
=========================== -->


<div class="modal fade" id="eventModal">


<div class="modal-dialog">


<div class="modal-content">



<div class="modal-header">


<h5 class="modal-title">

Add Event

</h5>



<button 
class="btn-close"
data-bs-dismiss="modal">

</button>


</div>





<div class="modal-body">

<input type="hidden" id="eventId">
<label class="form-label">

Event Title

</label>


<input
id="eventTitle"
class="form-control mb-3"
placeholder="Event Title">





<label class="form-label">

Event Date

</label>


<input
id="eventDate"
class="form-control mb-3"
type="date">





</div>





<div class="modal-footer">


<button
class="btn btn-secondary"
data-bs-dismiss="modal">

Cancel

</button>



<button
class="btn btn-primary"
id="saveEvent">

Save Event

</button>



</div>





</div>


</div>


</div>









<!-- ==========================
        PHOTO GALLERY
=========================== -->


<div class="card shadow-sm mb-4">


<div class="card-header d-flex justify-content-between align-items-center">



<span>

Photo Gallery

</span>



<button
class="btn btn-primary btn-sm"
data-bs-toggle="modal"
data-bs-target="#galleryModal">


<i class="fas fa-plus"></i>

Add Image


</button>



</div>






<div class="card-body">


<div class="row g-3"
id="galleryContainer">


<?php foreach($galleryList as $gallery): ?>


<div class="col-md-4 gallery-item"
data-id="<?php echo $gallery['id']; ?>">


<div class="border rounded p-2">


<img
src="../assets/img/<?php echo $gallery['image']; ?>"
class="galleryPreview mb-2">



<button
class="btn btn-danger btn-sm deleteGallery">

Delete

</button>


</div>


</div>


<?php endforeach; ?>


</div>



</div>



</div>









<!-- ==========================
        GALLERY MODAL
=========================== -->


<div class="modal fade" id="galleryModal">


<div class="modal-dialog">


<div class="modal-content">





<div class="modal-header">


<h5 class="modal-title">

Add Gallery Image

</h5>



<button
class="btn-close"
data-bs-dismiss="modal">

</button>


</div>






<div class="modal-body">


<label class="form-label">

Select Image

</label>


<input
type="file"
id="galleryImage"
name="image"
class="form-control">



</div>






<div class="modal-footer">


<button
class="btn btn-secondary"
data-bs-dismiss="modal">

Cancel

</button>



<button
class="btn btn-primary"
id="saveGallery">

Save Image

</button>



</div>






</div>


</div>


</div>


<?php require 'back-top.php'; ?>


<script src="assets/js/main.js"></script>


<script>

// ==========================
// UPDATE PAGE HEADER
// ==========================

document.getElementById("savePageHeader").onclick=function(){

let formData = new FormData();

formData.append("type",19);
formData.append("title",document.getElementById("page_title").value);
formData.append("subtitle",document.getElementById("page_subtitle").value);


$.ajax({

url:"../include/routes.php",
type:"POST",
data:formData,
processData:false,
contentType:false,
dataType:"json",

success:function(response){

console.log(response);

if(response.statusCode==200){

alert("News page updated successfully");

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
// SAVE NEWS
// ==========================


document.getElementById("saveNews").onclick=function(){


let title =
document.getElementById("newsTitle").value.trim();


let description =
document.getElementById("newsDescription").value.trim();



if(title==""){


alert("Please enter news title");


return;


}


if(description==""){


alert("Please enter news description");


return;
}

let formData=new FormData();


if(document.getElementById("newsId").value!=""){

    formData.append("type",26);

}else{

    formData.append("type",20);

}


formData.append(
"id",
document.getElementById("newsId").value
);



let file=document.getElementById("newsImage").files[0];


if(file){

formData.append("image",file);

}




formData.append(
"title",
document.getElementById("newsTitle").value
);



formData.append(
"description",
document.getElementById("newsDescription").value
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



document.getElementById("newsId").value="";

document.getElementById("newsTitle").value="";

document.getElementById("newsDescription").value="";

document.getElementById("newsImage").value="";


document.getElementById("newsImagePreview").src =
"https://via.placeholder.com/500x300";

location.reload();


}else{


alert("News save failed");


}


}


});



};




// Reset news modal for new item

document
.querySelector('[data-bs-target="#newsModal"]')
.addEventListener("click",function(){


document.getElementById("newsId").value="";

document.getElementById("newsTitle").value="";

document.getElementById("newsDescription").value="";

document.getElementById("newsImage").value="";


document.getElementById("newsImagePreview").src =
"https://via.placeholder.com/500x300";

document.getElementById("newsModalTitle").innerText="Add News";


});




// ==========================
// DELETE NEWS
// ==========================


document.addEventListener("click",function(e){



if(e.target.classList.contains("deleteNews")){


let item=e.target.closest(".news-item");


let id=item.dataset.id;



if(!confirm("Delete this news?")){

return;

}



$.ajax({


url:"../include/routes.php",

type:"POST",

data:{


type:21,

id:id


},


dataType:"json",


success:function(response){


if(response.statusCode==200){


item.remove();


}else{


alert("Delete failed");


}


}


});



}



});



// ==========================
// EDIT NEWS
// ==========================

document.addEventListener("click",function(e){


    let editBtn = e.target.closest(".editNews");


    if(editBtn){


        let item = editBtn.closest(".news-item");


        let id = item.dataset.id;


        let title = item.querySelector("h5").innerText.trim();


        let description = item.querySelector("p").innerText.trim();



        let img = item.querySelector("img");


        if(img){

            document.getElementById("newsImagePreview").src = img.src;

        }



        document.getElementById("newsId").value = id;


        document.getElementById("newsTitle").value = title;


        document.getElementById("newsDescription").value = description;


        document.getElementById("newsImage").value = "";



        document.getElementById("newsModalTitle").innerText = "Edit News";


        let modal = new bootstrap.Modal(
            document.getElementById("newsModal")
        );


        modal.show();


    }


});



// ==========================
// SAVE EVENT
// ==========================


document.getElementById("saveEvent").onclick=function(){


let title =
document.getElementById("eventTitle").value.trim();


let date =
document.getElementById("eventDate").value.trim();



if(title==""){


alert("Enter event title");


return;


}


if(date==""){


alert("Enter event date");


return;


}



$.ajax({


url:"../include/routes.php",

type:"POST",

data:{


type:22,

id:
document.getElementById("eventId").value,


title:title,


event_date:date


},


dataType:"json",


success:function(response){


if(response.statusCode==200){


document.getElementById("eventId").value="";

location.reload();


}else{


alert("Event save failed");


}


}


});



};









// ==========================
// DELETE EVENT
// ==========================


document.addEventListener("click",function(e){


if(e.target.classList.contains("deleteEvent")){


let row=e.target.closest("tr");


let id=row.dataset.id;



if(!confirm("Delete this event?")){

return;

}



$.ajax({


url:"../include/routes.php",

type:"POST",

data:{


type:23,

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
// EDIT EVENT
// ==========================


document.addEventListener("click",function(e){



if(e.target.classList.contains("editEvent")){


let row=e.target.closest("tr");


let id=row.dataset.id;


let title=row.children[0].innerText;


let date=row.children[1].innerText;



document.getElementById("eventId").value=id;


document.getElementById("eventTitle").value=title;


document.getElementById("eventDate").value=date;



let modal=new bootstrap.Modal(
document.getElementById("eventModal")
);


modal.show();



}



});




// ==========================
// SAVE GALLERY IMAGE
// ==========================


document.getElementById("saveGallery").onclick=function(){



let file=
document.getElementById("galleryImage").files[0];



if(!file){


alert("Select image");


return;


}



let formData=new FormData();



formData.append("type",24);


formData.append("image",file);




$.ajax({


url:"../include/routes.php",

type:"POST",

data:formData,

processData:false,

contentType:false,

dataType:"json",



success:function(response){



if(response.statusCode==200){


location.reload();


}else{


alert("Gallery upload failed");


}


}



});



};









// ==========================
// DELETE GALLERY IMAGE
// ==========================


document.addEventListener("click",function(e){



if(e.target.classList.contains("deleteGallery")){


let item=e.target.closest(".gallery-item");


let id=item.dataset.id;



if(!confirm("Delete image?")){

return;

}




$.ajax({


url:"../include/routes.php",

type:"POST",

data:{


type:25,

id:id


},


dataType:"json",



success:function(response){


if(response.statusCode==200){


item.remove();


}else{


alert("Delete failed");


}


}


});



}



});


// ==========================
// NEWS IMAGE PREVIEW
// ==========================


document
.getElementById("newsImage")
.addEventListener("change",function(e){


let file=e.target.files[0];


if(file){


let reader=new FileReader();



reader.onload=function(){


document.getElementById("newsImagePreview").src =
reader.result;


};



reader.readAsDataURL(file);



}



});



</script>




</div><!-- container-fluid -->


</div><!-- p-4 -->


</div><!-- main-content -->


</div><!-- admin-wrapper -->



</body>

</html>