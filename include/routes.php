<?php
session_start(); 

error_reporting(E_ALL);
ini_set('display_errors',1);

include_once "../config/db.php";
include_once "core.php";


$data = new core($conn);



if(isset($_POST['type'])){


    $type = $_POST['type'];



    // SAVE FOCUS AREA
    if($type == 3){


     
      $save = $data->save_focus($_POST);

            if($save){

                echo json_encode([
                    "statusCode"=>200,
                    "id"=>$save
                ]);

            }else{

                echo json_encode([
                    "statusCode"=>201
                ]);

            }

        exit;

    }





    // DELETE FOCUS AREA
        if($type == 4){

    $delete = $data->delete_focus($_POST['id']);

    if($delete){

        echo json_encode([
            "statusCode"=>200
        ]);

    }else{

        echo json_encode([
            "statusCode"=>201
        ]);

    }

    exit;
}

// SAVE BENEFIT
if($type == 5){

    $save = $data->save_benefit($_POST);

    if($save){

        echo json_encode([
            "statusCode" => 200,
            "id" => $save
        ]);

    }else{

        echo json_encode([
            "statusCode" => 201
        ]);

    }

    exit;
}

// DELETE BENEFIT
if($type == 6){

    $delete = $data->delete_benefit($_POST['id']);

    if($delete){

        echo json_encode([
            "statusCode" => 200
        ]);

    }else{

        echo json_encode([
            "statusCode" => 201
        ]);

    }

    exit;
}


// UPDATE HOMEPAGE
if($type == 7){

    $update = $data->update_homepage($_POST, $_FILES);

    if($update){

        echo json_encode([
            "statusCode" => 200
        ]);

    }else{

        echo json_encode([
            "statusCode" => 201
        ]);

    }

    exit;
}

// ======================
// SAVE OBJECTIVE
// ======================

if($type == 8){

    $save = $data->save_objective($_POST);


    if($save){

        echo json_encode([
            "statusCode"=>200,
            "id"=>$save
        ]);

    }else{

        echo json_encode([
            "statusCode"=>201
        ]);

    }

    exit;

}


// ======================
// DELETE OBJECTIVE
// ======================

if($type == 9){

    $delete = $data->delete_objective($_POST['id']);


    if($delete){

        echo json_encode([
            "statusCode"=>200
        ]);

    }else{

        echo json_encode([
            "statusCode"=>201
        ]);

    }

    exit;

}


// ======================
// UPDATE ABOUT PAGE
// ======================

if($type == 10){


    $update = $data->update_aboutpage($_POST,$_FILES);


    if($update){

        echo json_encode([
            "statusCode"=>200
        ]);

    }else{

        echo json_encode([
            "statusCode"=>201
        ]);

    }


    exit;

}


// ======================
// SAVE / UPDATE PROGRAM
// ======================

if($type == 11){


    $save = $data->save_program($_POST,$_FILES);


    if($save){

        echo json_encode([

            "statusCode"=>200,
            "id"=>$save

        ]);

    }else{

        echo json_encode([

            "statusCode"=>201

        ]);

    }


    exit;

}




// ======================
// DELETE PROGRAM
// ======================

if($type == 12){


    $delete = $data->delete_program($_POST['id']);


    if($delete){

        echo json_encode([

            "statusCode"=>200

        ]);

    }else{

        echo json_encode([

            "statusCode"=>201

        ]);

    }


    exit;

}




// ======================
// UPDATE PROGRAM PAGE
// ======================

if($type == 13){


    $update = $data->update_programs_page($_POST);


    if($update){

        echo json_encode([

            "statusCode"=>200

        ]);

    }else{

        echo json_encode([

            "statusCode"=>201

        ]);

    }


    exit;

}

// ======================
// SAVE / UPDATE COMMITTEE
// ======================

if($type == 14){

    $save = $data->save_committee($_POST);

    if($save){

        echo json_encode([

            "statusCode"=>200,
            "id"=>$save

        ]);

    }else{

        echo json_encode([

            "statusCode"=>201

        ]);

    }

    exit;

}

// ======================
// DELETE COMMITTEE
// ======================

if($type == 15){

    $delete = $data->delete_committee($_POST['id']);

    if($delete){

        echo json_encode([

            "statusCode"=>200

        ]);

    }else{

        echo json_encode([

            "statusCode"=>201

        ]);

    }

    exit;

}

// ======================
// SAVE / UPDATE GOVERNANCE
// ======================

if($type == 16){

    $save = $data->save_governance($_POST);

    if($save){

        echo json_encode([

            "statusCode"=>200,
            "id"=>$save

        ]);

    }else{

        echo json_encode([

            "statusCode"=>201

        ]);

    }

    exit;

}

// ======================
// DELETE GOVERNANCE
// ======================

if($type == 17){

    $delete = $data->delete_governance($_POST['id']);

    if($delete){

        echo json_encode([

            "statusCode"=>200

        ]);

    }else{

        echo json_encode([

            "statusCode"=>201

        ]);

    }

    exit;

}

// ======================
// UPDATE LEADERSHIP PAGE
// ======================

if($type == 18){

    $update = $data->update_leadership($_POST,$_FILES);

    if($update){

        echo json_encode([

            "statusCode"=>200

        ]);

    }else{

        echo json_encode([

            "statusCode"=>201

        ]);

    }

    exit;

}


// ======================
// UPDATE NEWS PAGE HEADER
// ======================

if($type == 19){

    $update = $data->update_news_page($_POST);


    if($update){

        echo json_encode([
            "statusCode"=>200
        ]);

    }else{

        echo json_encode([
            "statusCode"=>201
        ]);

    }

    exit;

}



// ======================
// SAVE / UPDATE NEWS
// ======================

if($type == 20){

    $save = $data->save_news($_POST,$_FILES);


    if($save){

        echo json_encode([

            "statusCode"=>200,
            "id"=>$save

        ]);

    }else{

        echo json_encode([

            "statusCode"=>201

        ]);

    }


    exit;

}




// ======================
// DELETE NEWS
// ======================

if($type == 21){

    $delete = $data->delete_news($_POST['id']);


    if($delete){

        echo json_encode([

            "statusCode"=>200

        ]);

    }else{

        echo json_encode([

            "statusCode"=>201

        ]);

    }


    exit;

}




// ======================
// SAVE / UPDATE EVENT
// ======================

if($type == 22){

    $save = $data->save_event($_POST);


    if($save){

        echo json_encode([

            "statusCode"=>200,
            "id"=>$save

        ]);

    }else{

        echo json_encode([

            "statusCode"=>201

        ]);

    }


    exit;

}





// ======================
// DELETE EVENT
// ======================

if($type == 23){

    $delete = $data->delete_event($_POST['id']);


    if($delete){

        echo json_encode([

            "statusCode"=>200

        ]);

    }else{

        echo json_encode([

            "statusCode"=>201

        ]);

    }


    exit;

}





// ======================
// SAVE GALLERY IMAGE
// ======================

if($type == 24){

    $save = $data->save_gallery($_FILES);


    if($save){

        echo json_encode([

            "statusCode"=>200,
            "id"=>$save

        ]);

    }else{

        echo json_encode([

            "statusCode"=>201

        ]);

    }


    exit;

}





// ======================
// DELETE GALLERY IMAGE
// ======================

if($type == 25){

    $delete = $data->delete_gallery($_POST['id']);


    if($delete){

        echo json_encode([

            "statusCode"=>200

        ]);

    }else{

        echo json_encode([

            "statusCode"=>201

        ]);

    }


    exit;

}


// ======================
// UPDATE NEWS ONLY
// ======================

if($type == 26){

    $update = $data->update_news($_POST,$_FILES);


    if($update){

        echo json_encode([

            "statusCode"=>200,
            "id"=>$_POST['id']

        ]);

    }else{

        echo json_encode([

            "statusCode"=>201

        ]);

    }


    exit;

}

// ======================
// UPDATE GET INVOLVED HEADER
// ======================

if($type == 27){


    $update = $data->update_get_involved_header($_POST);


    if($update){

        echo json_encode([

            "statusCode"=>200

        ]);


    }else{

        echo json_encode([

            "statusCode"=>201

        ]);

    }


    exit;

}




// ======================
// DELETE VOLUNTEER APPLICATION
// ======================

if($type == 28){


    $delete = $data->delete_volunteer($_POST['id']);


    if($delete){

        echo json_encode([

            "statusCode"=>200

        ]);


    }else{

        echo json_encode([

            "statusCode"=>201

        ]);

    }


    exit;

}





// ======================
// DELETE PARTNER INQUIRY
// ======================

if($type == 29){


    $delete = $data->delete_partner($_POST['id']);


    if($delete){

        echo json_encode([

            "statusCode"=>200

        ]);


    }else{

        echo json_encode([

            "statusCode"=>201

        ]);

    }


    exit;

}


// ======================
// UPDATE CONTACT PAGE
// ======================

if($type == 30){

    $update = $data->update_contact_page($_POST);

    if($update){

        echo json_encode([

            "statusCode"=>200

        ]);

    }else{

        echo json_encode([

            "statusCode"=>201

        ]);

    }

    exit;

}

// ======================
// DELETE CONTACT MESSAGE
// ======================

if($type == 31){

    $delete = $data->delete_contact_message($_POST['id']);

    if($delete){

        echo json_encode([

            "statusCode"=>200

        ]);

    }else{

        echo json_encode([

            "statusCode"=>201

        ]);

    }

    exit;

}

// ======================
// UPDATE ADMIN ACCOUNT
// ======================

if($type == 33){

    $update = $data->update_admin_account($_POST);

    if($update === true){

        echo json_encode([
            "statusCode"=>200
        ]);

    }elseif($update == "wrong_password"){

        echo json_encode([
            "statusCode"=>202
        ]);

    }else{

        echo json_encode([
            "statusCode"=>201
        ]);

    }

    exit;

}


// ======================
// ADMIN LOGIN
// ======================

if($type == 34){


    $admin = $data->admin_login($_POST['username']);



    if($admin){


        if(password_verify($_POST['password'],$admin['password'])){


            $_SESSION['admin_id']=$admin['id'];

            $_SESSION['admin_username']=$admin['username'];



            echo json_encode([

                "statusCode"=>200

            ]);



        }else{


            echo json_encode([

                "statusCode"=>202

            ]);

        }



    }else{


        echo json_encode([

            "statusCode"=>201

        ]);


    }


    exit;

}


}



/*
 Volunteer Form
*/

if(isset($_POST['action']) && $_POST['action']=="volunteer"){


$status = $data->saveVolunteer($_POST);


echo $status 
? "Volunteer application submitted successfully."
: "Submission failed.";


exit;

}





/*
 Partner Form
*/

if(isset($_POST['action']) && $_POST['action']=="partner"){


$status = $data->savePartner($_POST);


echo $status
? "Partner inquiry submitted successfully."
: "Submission failed.";


exit;

}


if(isset($_POST['action']) && $_POST['action']=="contact"){


$status = $data->saveContact($_POST);


echo $status
? "Message sent successfully."
: "Message sending failed.";


exit;

}



?>