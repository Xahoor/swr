<?php
require "auth.php";
require 'header.php';



$admin = new core($conn);

$account = $admin->adminAccount();

?>

  <style>

.account-card{

border-radius:12px;

}


#updateAccount{

border-radius:8px;

}


.password-strength{

font-size:14px;
margin-top:5px;

}

    </style>

    


    <nav class="navbar bg-white shadow-sm px-3">

        <button class="btn btn-light d-lg-none" id="openSidebar">
            <i class="fas fa-bars"></i>
        </button>


        <h5 class="ms-2 mb-0">
            Account Settings
        </h5>

    </nav>



    <div class="p-4">


        <div class="container-fluid">


            <!-- Admin Account Settings -->

            <div class="card shadow-sm mb-4">


                <div class="card-header">
                    Admin Account Settings
                </div>



                <div class="card-body">


                    <div class="row">


                        <div class="col-lg-6">


                            <label class="form-label">
                                Username
                            </label>


                            <input type="text"
                            class="form-control mb-3"
                            id="adminUsername"
                            value="<?php echo htmlspecialchars($account['username']); ?>">


                        </div>



                        <div class="col-lg-6">


                            <label class="form-label">
                                Current Password
                            </label>


                            <input type="password"
                            class="form-control mb-3"
                            id="currentPassword"
                            placeholder="Enter current password">


                        </div>


                    </div>





                    <div class="row">


                        <div class="col-lg-6">


                            <label class="form-label">
                                New Password
                            </label>


                            <input type="password"
                            class="form-control mb-3"
                            id="newPassword"
                            placeholder="Enter new password">


                        </div>





                        <div class="col-lg-6">


                            <label class="form-label">
                                Confirm New Password
                            </label>


                            <input type="password"
                            class="form-control mb-3"
                            id="confirmPassword"
                            placeholder="Confirm new password">


                        </div>


                    </div>





                    <div class="text-end">


                        <button class="btn btn-primary"
                        id="updateAccount">


                            <i class="fas fa-user-lock me-2"></i>

                            Update Account


                        </button>


                    </div>



                </div>


            </div>


        </div>


    </div>


</div>



<?php require 'back-top.php'; ?>


<script src="assets/js/main.js"></script>

<script>

    // ==========================
// UPDATE ACCOUNT
// ==========================

document.getElementById("updateAccount").onclick = function(){

    let username = document.getElementById("adminUsername").value.trim();

    let current = document.getElementById("currentPassword").value;

    let password = document.getElementById("newPassword").value;

    let confirm = document.getElementById("confirmPassword").value;

    if(username==""){

        alert("Username is required");

        return;

    }

    if(current==""){

        alert("Enter current password");

        return;

    }

    if(password != confirm){

        alert("Passwords do not match");

        return;

    }

    $.ajax({

        url:"../include/routes.php",

        type:"POST",

        data:{

            type:33,

            username:username,

            current_password:current,

            new_password:password

        },

        dataType:"json",

        success:function(response){

            if(response.statusCode==200){

                alert("Account updated successfully");

                document.getElementById("currentPassword").value="";
                document.getElementById("newPassword").value="";
                document.getElementById("confirmPassword").value="";

            }else if(response.statusCode==202){

                alert("Current password is incorrect");

            }else{

                alert("Update failed");

            }

        }

    });

};
</script>


</body>
</html>