<?php

class core
{
    private $db;

    public function __construct($conn)
    {
        $this->db = $conn;
    }


    // Get homepage data
    public function homepage()
    {
        try {

            $sql = "SELECT * FROM homepage LIMIT 1";

            $statement = $this->db->prepare($sql);

            $statement->execute();

            return $statement->fetch(PDO::FETCH_ASSOC);

        } catch (\Throwable $th) {

            throw $th;

        }
    }



    // Get homepage tables data
    public function homepageTb($tbl)
    {
        try {

            $allowedTables = [
                "focus_areas",
                "benefits"
            ];


            if(!in_array($tbl, $allowedTables)){
                return [];
            }


            $sql = "SELECT * FROM `$tbl`";


            $statement = $this->db->prepare($sql);

            $statement->execute();


            return $statement->fetchAll(PDO::FETCH_ASSOC);


        } catch (\Throwable $th) {

            throw $th;

        }
    }




    // Add or update focus area
   public function save_focus($data)
{
    try {

        if(!empty($data['id'])){

            // UPDATE

            $sql = "
                UPDATE focus_areas
                SET title = :title
                WHERE id = :id
            ";

            $statement = $this->db->prepare($sql);

            return $statement->execute([
                ":title" => $data['title'],
                ":id" => $data['id']
            ]);

        }else{

            // INSERT

            $sql = "
                INSERT INTO focus_areas(title)
                VALUES(:title)
            ";

            $statement = $this->db->prepare($sql);

            if($statement->execute([
                ":title" => $data['title']
            ])){

                return $this->db->lastInsertId();

            }

            return false;

        }

    } catch(\Throwable $th){

        throw $th;

    }
}


    // Delete focus area

    public function delete_focus($id)
    {

        try{


            $sql = "
                DELETE FROM focus_areas
                WHERE id = :id
            ";


            $statement = $this->db->prepare($sql);


            return $statement->execute([
                ":id"=>$id
            ]);



        }catch(\Throwable $th){

            throw $th;

        }

    }


    // Add or update benefit
public function save_benefit($data)
{
    try {

        if (!empty($data['id'])) {

            // UPDATE
            $sql = "
                UPDATE benefits
                SET benefit = :benefit
                WHERE id = :id
            ";

            $statement = $this->db->prepare($sql);

            return $statement->execute([
                ":benefit" => $data['benefit'],
                ":id" => $data['id']
            ]);

        } else {

            // INSERT
            $sql = "
                INSERT INTO benefits(benefit)
                VALUES(:benefit)
            ";

            $statement = $this->db->prepare($sql);

            if ($statement->execute([
                ":benefit" => $data['benefit']
            ])) {

                return $this->db->lastInsertId();

            }

            return false;
        }

    } catch (\Throwable $th) {

        throw $th;

    }
}

// Delete benefit
public function delete_benefit($id)
{
    try{

        $sql = "
            DELETE FROM benefits
            WHERE id = :id
        ";

        $statement = $this->db->prepare($sql);

        return $statement->execute([
            ":id" => $id
        ]);

    }catch(\Throwable $th){

        throw $th;

    }
}



// Update Homepage
public function update_homepage($data, $files)
{
    try{

        // Current homepage data
        $homepage = $this->homepage();

        $heroImage = $homepage['hero_image'];
        $aboutImage = $homepage['about_image'];



        // ============================
        // Upload Hero Image
        // ============================

        if(isset($files['hero_image']) && $files['hero_image']['error'] == 0){

            // Delete old image
            if(!empty($homepage['hero_image'])){

                $oldImage = "../assets/img/" . $homepage['hero_image'];

                if(file_exists($oldImage)){
                    unlink($oldImage);
                }

            }

            // Upload new image
            $heroImage = time() . "_" . basename($files['hero_image']['name']);

            move_uploaded_file(
                $files['hero_image']['tmp_name'],
                "../assets/img/" . $heroImage
            );

        }


        // ============================
        // Upload About Image
        // ============================

        if(isset($files['about_image']) && $files['about_image']['error'] == 0){

            // Delete old image
            if(!empty($homepage['about_image'])){

                $oldImage = "../assets/img/" . $homepage['about_image'];

                if(file_exists($oldImage)){
                    unlink($oldImage);
                }

            }

            // Upload new image
            $aboutImage = time() . "_" . basename($files['about_image']['name']);

            move_uploaded_file(
                $files['about_image']['tmp_name'],
                "../assets/img/" . $aboutImage
            );

        }



        // ============================
        // Update Homepage
        // ============================

        $sql = "

            UPDATE homepage SET

                hero_title = :hero_title,
                hero_subtitle = :hero_subtitle,
                hero_description = :hero_description,
                hero_image = :hero_image,

                about_heading = :about_heading,
                about_paragraph1 = :about_paragraph1,
                about_paragraph2 = :about_paragraph2,
                about_image = :about_image,

                vision_title = :vision_title,
                vision_description = :vision_description,

                mission_title = :mission_title,
                mission_description = :mission_description

            WHERE id = 1

        ";

        $statement = $this->db->prepare($sql);

        return $statement->execute([

            ":hero_title" => $data['hero_title'],
            ":hero_subtitle" => $data['hero_subtitle'],
            ":hero_description" => $data['hero_description'],
            ":hero_image" => $heroImage,

            ":about_heading" => $data['about_heading'],
            ":about_paragraph1" => $data['about_paragraph1'],
            ":about_paragraph2" => $data['about_paragraph2'],
            ":about_image" => $aboutImage,

            ":vision_title" => $data['vision_title'],
            ":vision_description" => $data['vision_description'],

            ":mission_title" => $data['mission_title'],
            ":mission_description" => $data['mission_description']

        ]);

    }catch(\Throwable $th){

        throw $th;

    }
}


// ============
// About page 
// =============

// Get About Page Data

public function aboutpage()
{

    try{


        $sql = "SELECT * FROM about_page LIMIT 1";


        $statement = $this->db->prepare($sql);


        $statement->execute();


        return $statement->fetch(PDO::FETCH_ASSOC);


    }catch(\Throwable $th){

        throw $th;

    }

}

// Get About Objectives

public function aboutpageTb($tbl)
{

    try{


        $allowedTables = [

            "about_objectives"

        ];


        if(!in_array($tbl,$allowedTables)){

            return [];

        }


        $sql = "SELECT * FROM `$tbl`";


        $statement = $this->db->prepare($sql);


        $statement->execute();


        return $statement->fetchAll(PDO::FETCH_ASSOC);



    }catch(\Throwable $th){

        throw $th;

    }

}

public function save_objective($data)
{

    try{


        if(!empty($data['id'])){


            $sql="
                UPDATE about_objectives

                SET

                title=:title,
                description=:description

                WHERE id=:id
            ";


            $statement=$this->db->prepare($sql);


            return $statement->execute([

                ":title"=>$data['title'],

                ":description"=>$data['description'],

                ":id"=>$data['id']

            ]);



        }else{


            $sql="
                INSERT INTO about_objectives

                (
                    title,
                    description
                )

                VALUES

                (
                    :title,
                    :description
                )

            ";


            $statement=$this->db->prepare($sql);


            if($statement->execute([

                ":title"=>$data['title'],

                ":description"=>$data['description']

            ])){


                return $this->db->lastInsertId();

            }


            return false;

        }


    }catch(\Throwable $th){

        throw $th;

    }

}

public function delete_objective($id)
{

    try{


        $sql="
            DELETE FROM about_objectives

            WHERE id=:id
        ";


        $statement=$this->db->prepare($sql);


        return $statement->execute([

            ":id"=>$id

        ]);



    }catch(\Throwable $th){

        throw $th;

    }

}

public function update_aboutpage($data,$files)
{

    try{


        $about = $this->aboutpage();


        $storyImage = $about['story_image'];



        // Upload Story Image

        if(isset($files['story_image']) 
            && 
            $files['story_image']['error']==0){



            if(!empty($about['story_image'])){


                $oldImage="../assets/img/".$about['story_image'];


                if(file_exists($oldImage)){

                    unlink($oldImage);

                }

            }



            $storyImage =
                time()."_".basename(
                    $files['story_image']['name']
                );



            move_uploaded_file(

                $files['story_image']['tmp_name'],

                "../assets/img/".$storyImage

            );


        }




        $sql="

        UPDATE about_page SET


            page_title=:page_title,

            page_subtitle=:page_subtitle,


            story_heading=:story_heading,

            story_paragraph1=:story_paragraph1,

            story_paragraph2=:story_paragraph2,

            story_image=:story_image,


            office_heading=:office_heading,

            office_name=:office_name,

            office_floor=:office_floor,

            office_nearby_location=:office_nearby_location,

            office_road=:office_road,

            office_city=:office_city


        WHERE id=1


        ";



        $statement=$this->db->prepare($sql);



        return $statement->execute([


            ":page_title"=>$data['page_title'],

            ":page_subtitle"=>$data['page_subtitle'],


            ":story_heading"=>$data['story_heading'],

            ":story_paragraph1"=>$data['story_paragraph1'],

            ":story_paragraph2"=>$data['story_paragraph2'],

            ":story_image"=>$storyImage,


            ":office_heading"=>$data['office_heading'],

            ":office_name"=>$data['office_name'],

            ":office_floor"=>$data['office_floor'],

            ":office_nearby_location"=>$data['office_nearby_location'],

            ":office_road"=>$data['office_road'],

            ":office_city"=>$data['office_city']


        ]);



    }catch(\Throwable $th){

        throw $th;

    }

}

// ============
//  Programs
// ===========

// Get Programs Page

public function programsPage()
{

    try{


        $sql="
            SELECT * 
            FROM programs_page 
            LIMIT 1
        ";


        $statement=$this->db->prepare($sql);


        $statement->execute();


        return $statement->fetch(PDO::FETCH_ASSOC);



    }catch(\Throwable $th){

        throw $th;

    }

}

// Get Programs List

public function programs()
{

    try{


        $sql="
            SELECT * 
            FROM programs
            ORDER BY id DESC
        ";


        $statement=$this->db->prepare($sql);


        $statement->execute();


        return $statement->fetchAll(PDO::FETCH_ASSOC);



    }catch(\Throwable $th){

        throw $th;

    }

}

public function save_program($data,$files)
{

    try{


        $image = "";


        // UPDATE

        if(!empty($data['id'])){


            $old = $this->db
            ->prepare(
                "SELECT image FROM programs WHERE id=:id"
            );


            $old->execute([

                ":id"=>$data['id']

            ]);


            $program=$old->fetch(PDO::FETCH_ASSOC);



            $image=$program['image'];



            if(
                isset($files['image']) &&
                $files['image']['error']==0
            ){


                if(!empty($image)){


                    $oldImage="../assets/img/".$image;


                    if(file_exists($oldImage)){

                        unlink($oldImage);

                    }

                }



                $image =
                time()."_".
                basename($files['image']['name']);



                move_uploaded_file(

                    $files['image']['tmp_name'],

                    "../assets/img/".$image

                );

            }




            $sql="
            
            UPDATE programs SET

            image=:image,
            title=:title,
            description=:description,
            feature_1=:feature_1,
            feature_2=:feature_2,
            feature_3=:feature_3

            WHERE id=:id
            
            ";



            $statement=$this->db->prepare($sql);



            return $statement->execute([


                ":image"=>$image,

                ":title"=>$data['title'],

                ":description"=>$data['description'],

                ":feature_1"=>$data['feature_1'],

                ":feature_2"=>$data['feature_2'],

                ":feature_3"=>$data['feature_3'],

                ":id"=>$data['id']


            ]);



        }



        // INSERT


        if(
            isset($files['image']) &&
            $files['image']['error']==0
        ){


            $image =
            time()."_".
            basename($files['image']['name']);



            move_uploaded_file(

                $files['image']['tmp_name'],

                "../assets/img/".$image

            );


        }




        $sql="

        INSERT INTO programs

        (

        image,
        title,
        description,
        feature_1,
        feature_2,
        feature_3

        )

        VALUES

        (

        :image,
        :title,
        :description,
        :feature_1,
        :feature_2,
        :feature_3

        )

        ";



        $statement=$this->db->prepare($sql);



        if($statement->execute([


            ":image"=>$image,

            ":title"=>$data['title'],

            ":description"=>$data['description'],

            ":feature_1"=>$data['feature_1'],

            ":feature_2"=>$data['feature_2'],

            ":feature_3"=>$data['feature_3']


        ])){


            return $this->db->lastInsertId();


        }



        return false;



    }catch(\Throwable $th){

        throw $th;

    }

}

// delete 
public function delete_program($id)
{

    try{


        $get = $this->db->prepare(
            "SELECT image FROM programs WHERE id=:id"
        );

        $get->execute([
            ":id"=>$id
        ]);


        $program=$get->fetch(PDO::FETCH_ASSOC);



        if($program && !empty($program['image'])){


            $file="../assets/img/".$program['image'];


            if(file_exists($file)){

                unlink($file);

            }

        }



        $sql="
            DELETE FROM programs
            WHERE id=:id
        ";


        $statement=$this->db->prepare($sql);


        return $statement->execute([

            ":id"=>$id

        ]);



    }catch(\Throwable $th){

        throw $th;

    }

}

// edit

public function update_programs_page($data)
{

    try{


        $sql="

        UPDATE programs_page SET

        title=:title,

        subtitle=:subtitle

        WHERE id=1

        ";


        $statement=$this->db->prepare($sql);



        return $statement->execute([


            ":title"=>$data['title'],


            ":subtitle"=>$data['subtitle']


        ]);



    }catch(\Throwable $th){

        throw $th;

    }

}

// =======================
// Leadership Page
// =======================

public function leadershipPage()
{

    try{

        $sql = "
            SELECT *
            FROM leadership_page
            LIMIT 1
        ";

        $statement = $this->db->prepare($sql);

        $statement->execute();

        return $statement->fetch(PDO::FETCH_ASSOC);

    }catch(\Throwable $th){

        throw $th;

    }

}

public function leadershipTb($tbl)
{

    try{

        $allowedTables = [

            "executive_committee",
            "board_governance"

        ];

        if(!in_array($tbl,$allowedTables)){

            return [];

        }

        $sql = "SELECT * FROM `$tbl` ORDER BY id DESC";

        $statement = $this->db->prepare($sql);

        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_ASSOC);

    }catch(\Throwable $th){

        throw $th;

    }

}

public function save_committee($data)
{

    try{

        // UPDATE

        if(!empty($data['id'])){

            $sql = "

                UPDATE executive_committee

                SET

                    position = :position,
                    description = :description

                WHERE id = :id

            ";

            $statement = $this->db->prepare($sql);

            return $statement->execute([

                ":position"=>$data['position'],
                ":description"=>$data['description'],
                ":id"=>$data['id']

            ]);

        }


        // INSERT

        $sql = "

            INSERT INTO executive_committee

            (

                position,
                description

            )

            VALUES

            (

                :position,
                :description

            )

        ";

        $statement = $this->db->prepare($sql);

        if($statement->execute([

            ":position"=>$data['position'],
            ":description"=>$data['description']

        ])){

            return $this->db->lastInsertId();

        }

        return false;

    }catch(\Throwable $th){

        throw $th;

    }

}

public function delete_committee($id)
{

    try{

        $sql = "

            DELETE FROM executive_committee

            WHERE id = :id

        ";

        $statement = $this->db->prepare($sql);

        return $statement->execute([

            ":id"=>$id

        ]);

    }catch(\Throwable $th){

        throw $th;

    }

}

public function save_governance($data)
{

    try{

        // UPDATE

        if(!empty($data['id'])){

            $sql = "

                UPDATE board_governance

                SET

                    name = :name,
                    role = :role,
                    organization = :organization

                WHERE id = :id

            ";

            $statement = $this->db->prepare($sql);

            return $statement->execute([

                ":name"=>$data['name'],
                ":role"=>$data['role'],
                ":organization"=>$data['organization'],
                ":id"=>$data['id']

            ]);

        }


        // INSERT

        $sql = "

            INSERT INTO board_governance

            (

                name,
                role,
                organization

            )

            VALUES

            (

                :name,
                :role,
                :organization

            )

        ";

        $statement = $this->db->prepare($sql);

        if($statement->execute([

            ":name"=>$data['name'],
            ":role"=>$data['role'],
            ":organization"=>$data['organization']

        ])){

            return $this->db->lastInsertId();

        }

        return false;

    }catch(\Throwable $th){

        throw $th;

    }

}

public function delete_governance($id)
{

    try{

        $sql = "

            DELETE FROM board_governance

            WHERE id = :id

        ";

        $statement = $this->db->prepare($sql);

        return $statement->execute([

            ":id"=>$id

        ]);

    }catch(\Throwable $th){

        throw $th;

    }

}

public function update_leadership($data,$files)
{

    try{

        $leadership = $this->leadershipPage();

        $founderImage = $leadership['founder_image'];


        // Upload Founder Image

        if(

            isset($files['founder_image']) &&

            $files['founder_image']['error'] == 0

        ){

            if(!empty($leadership['founder_image'])){

                $oldImage = "../assets/img/" . $leadership['founder_image'];

                if(file_exists($oldImage)){

                    unlink($oldImage);

                }

            }

            $founderImage =

                time() . "_" .

                basename($files['founder_image']['name']);

            move_uploaded_file(

                $files['founder_image']['tmp_name'],

                "../assets/img/" . $founderImage

            );

        }


        $sql = "

            UPDATE leadership_page SET

                page_title = :page_title,

                page_subtitle = :page_subtitle,

                founder_image = :founder_image,

                founder_name = :founder_name,

                founder_designation = :founder_designation,

                founder_message = :founder_message,

                founder_biography = :founder_biography,

                founder_experience = :founder_experience

            WHERE id = 1

        ";

        $statement = $this->db->prepare($sql);

        return $statement->execute([

            ":page_title"=>$data['page_title'],

            ":page_subtitle"=>$data['page_subtitle'],

            ":founder_image"=>$founderImage,

            ":founder_name"=>$data['founder_name'],

            ":founder_designation"=>$data['founder_designation'],

            ":founder_message"=>$data['founder_message'],

            ":founder_biography"=>$data['founder_biography'],

            ":founder_experience"=>$data['founder_experience']

        ]);

    }catch(\Throwable $th){

        throw $th;

    }

}


// =======================
// News Page
// =======================

public function newsPage()
{

    try{

        $sql = "

            SELECT *

            FROM news_page

            LIMIT 1

        ";


        $statement = $this->db->prepare($sql);


        $statement->execute();


        return $statement->fetch(PDO::FETCH_ASSOC);


    }catch(\Throwable $th){

        throw $th;

    }

}

// update news page
public function update_news_page($data)
{

    try{


        $sql = "

            UPDATE news_page SET

                title=:title,

                subtitle=:subtitle

            WHERE id=1

        ";


        $statement=$this->db->prepare($sql);


        return $statement->execute([


            ":title"=>$data['title'],

            ":subtitle"=>$data['subtitle']


        ]);


    }catch(\Throwable $th){

        throw $th;

    }

}

// =======================
// News List
// =======================

public function news()
{

    try{


        $sql="

            SELECT *

            FROM news

            ORDER BY id DESC

        ";


        $statement=$this->db->prepare($sql);


        $statement->execute();


        return $statement->fetchAll(PDO::FETCH_ASSOC);


    }catch(\Throwable $th){

        throw $th;

    }

}

// Save / Update News

public function save_news($data,$files)
{

    try{


        $image="";


        // UPDATE

        if(!empty($data['id'])){


            $get=$this->db->prepare(

                "SELECT image FROM news WHERE id=:id"

            );


            $get->execute([

                ":id"=>$data['id']

            ]);


            $old=$get->fetch(PDO::FETCH_ASSOC);


            $image=$old['image'];



            if(

                isset($files['image'])

                &&

                $files['image']['error']==0

            ){


                if(!empty($image)){


                    $oldImage="../assets/img/".$image;


                    if(file_exists($oldImage)){

                        unlink($oldImage);

                    }

                }



                $image=

                time()."_".

                basename($files['image']['name']);



                move_uploaded_file(

                    $files['image']['tmp_name'],

                    "../assets/img/".$image

                );


            }



            $sql="

                UPDATE news SET

                    image=:image,

                    title=:title,

                    description=:description


                WHERE id=:id

            ";



            $statement=$this->db->prepare($sql);



            return $statement->execute([


                ":image"=>$image,

                ":title"=>$data['title'],

                ":description"=>$data['description'],

                ":id"=>$data['id']


            ]);



        }




        // INSERT


        if(

            isset($files['image'])

            &&

            $files['image']['error']==0

        ){


            $image=

            time()."_".

            basename($files['image']['name']);



            move_uploaded_file(

                $files['image']['tmp_name'],

                "../assets/img/".$image

            );


        }




        $sql="

            INSERT INTO news

            (

                image,

                title,

                description

            )

            VALUES

            (

                :image,

                :title,

                :description

            )

        ";



        $statement=$this->db->prepare($sql);



        if($statement->execute([


            ":image"=>$image,

            ":title"=>$data['title'],

            ":description"=>$data['description']


        ])){


            return $this->db->lastInsertId();


        }



        return false;



    }catch(\Throwable $th){

        throw $th;

    }

}

// Delete News

public function delete_news($id)
{

    try{


        $get=$this->db->prepare(

            "SELECT image FROM news WHERE id=:id"

        );


        $get->execute([

            ":id"=>$id

        ]);


        $news=$get->fetch(PDO::FETCH_ASSOC);



        if($news && !empty($news['image'])){


            $file="../assets/img/".$news['image'];


            if(file_exists($file)){

                unlink($file);

            }

        }




        $sql="

            DELETE FROM news

            WHERE id=:id

        ";


        $statement=$this->db->prepare($sql);



        return $statement->execute([


            ":id"=>$id


        ]);



    }catch(\Throwable $th){

        throw $th;

    }

}

// =======================
// Events
// =======================

public function events()
{

    try{


        $sql="

            SELECT *

            FROM events

            ORDER BY id DESC

        ";


        $statement=$this->db->prepare($sql);


        $statement->execute();


        return $statement->fetchAll(PDO::FETCH_ASSOC);


    }catch(\Throwable $th){

        throw $th;

    }

}

// Save update event

public function save_event($data)
{

    try{


        if(!empty($data['id'])){


            $sql="

                UPDATE events SET

                    title=:title,

                    event_date=:event_date

                WHERE id=:id

            ";


            $statement=$this->db->prepare($sql);



            return $statement->execute([


                ":title"=>$data['title'],

                ":event_date"=>$data['event_date'],

                ":id"=>$data['id']


            ]);



        }




        $sql="

            INSERT INTO events

            (

                title,

                event_date

            )

            VALUES

            (

                :title,

                :event_date

            )

        ";



        $statement=$this->db->prepare($sql);



        if($statement->execute([


            ":title"=>$data['title'],

            ":event_date"=>$data['event_date']


        ])){


            return $this->db->lastInsertId();


        }



        return false;



    }catch(\Throwable $th){

        throw $th;

    }

}

public function delete_event($id)
{

    try{


        $sql="

            DELETE FROM events

            WHERE id=:id

        ";



        $statement=$this->db->prepare($sql);



        return $statement->execute([


            ":id"=>$id


        ]);



    }catch(\Throwable $th){

        throw $th;

    }

}


// =======================
// Gallery
// =======================

public function gallery()
{

    try{


        $sql="

            SELECT *

            FROM gallery

            ORDER BY id DESC

        ";



        $statement=$this->db->prepare($sql);


        $statement->execute();


        return $statement->fetchAll(PDO::FETCH_ASSOC);



    }catch(\Throwable $th){

        throw $th;

    }

}


public function save_gallery($files)
{

    try{


        $image="";



        if(

            isset($files['image'])

            &&

            $files['image']['error']==0

        ){



            $image=

            time()."_".

            basename($files['image']['name']);



            move_uploaded_file(

                $files['image']['tmp_name'],

                "../assets/img/".$image

            );


        }



        $sql="

            INSERT INTO gallery

            (

                image

            )

            VALUES

            (

                :image

            )

        ";



        $statement=$this->db->prepare($sql);



        if($statement->execute([


            ":image"=>$image


        ])){


            return $this->db->lastInsertId();


        }



        return false;



    }catch(\Throwable $th){

        throw $th;

    }

}

public function delete_gallery($id)
{

    try{


        $get=$this->db->prepare(

            "SELECT image FROM gallery WHERE id=:id"

        );


        $get->execute([

            ":id"=>$id

        ]);



        $gallery=$get->fetch(PDO::FETCH_ASSOC);



        if($gallery && !empty($gallery['image'])){


            $file="../assets/img/".$gallery['image'];



            if(file_exists($file)){

                unlink($file);

            }


        }




        $sql="

            DELETE FROM gallery

            WHERE id=:id

        ";



        $statement=$this->db->prepare($sql);



        return $statement->execute([


            ":id"=>$id


        ]);



    }catch(\Throwable $th){

        throw $th;

    }

}

// =======================
// UPDATE NEWS ONLY
// =======================

public function update_news($data,$files)
{

    try{


        $get = $this->db->prepare(

            "SELECT image FROM news WHERE id=:id"

        );


        $get->execute([

            ":id"=>$data['id']

        ]);


        $old = $get->fetch(PDO::FETCH_ASSOC);


        $image = $old['image'];



        // If new image uploaded

        if(

            isset($files['image'])

            &&

            $files['image']['error']==0

        ){


            // Delete old image

            if(!empty($image)){


                $oldImage="../assets/img/".$image;


                if(file_exists($oldImage)){

                    unlink($oldImage);

                }

            }



            // Upload new image

            $image = time()."_".basename($files['image']['name']);


            move_uploaded_file(

                $files['image']['tmp_name'],

                "../assets/img/".$image

            );

        }




        $sql="

            UPDATE news SET

                image=:image,

                title=:title,

                description=:description

            WHERE id=:id

        ";


        $statement=$this->db->prepare($sql);



        return $statement->execute([


            ":image"=>$image,

            ":title"=>$data['title'],

            ":description"=>$data['description'],

            ":id"=>$data['id']


        ]);



    }catch(\Throwable $th){

        throw $th;

    }

}


// =======================
// GET INVOLVED HEADER
// =======================


public function getInvolvedHeader()
{

    try{

        $sql = "
            SELECT *
            FROM get_involved_header
            LIMIT 1
        ";


        $statement = $this->db->prepare($sql);

        $statement->execute();


        return $statement->fetch(PDO::FETCH_ASSOC);



    }catch(\Throwable $th){

        throw $th;

    }

}



// =======================
// UPDATE GET INVOLVED HEADER
// =======================


public function update_get_involved_header($data)
{

    try{


        $sql = "

        UPDATE get_involved_header SET

            page_title = :page_title,

            page_subtitle = :page_subtitle,

            volunteer_heading = :volunteer_heading,

            volunteer_description = :volunteer_description,

            partner_heading = :partner_heading,

            partner_description = :partner_description

        WHERE id = 1

        ";


        $statement = $this->db->prepare($sql);



        return $statement->execute([


            ":page_title" => $data['page_title'],

            ":page_subtitle" => $data['page_subtitle'],

            ":volunteer_heading" => $data['volunteer_heading'],

            ":volunteer_description" => $data['volunteer_description'],

            ":partner_heading" => $data['partner_heading'],

            ":partner_description" => $data['partner_description']


        ]);



    }catch(\Throwable $th){

        throw $th;

    }

}




// =======================
// VOLUNTEER APPLICATIONS
// =======================


public function volunteers()
{

    try{


        $sql = "

            SELECT *

            FROM volunteer_applications

            ORDER BY id DESC

        ";


        $statement=$this->db->prepare($sql);


        $statement->execute();


        return $statement->fetchAll(PDO::FETCH_ASSOC);



    }catch(\Throwable $th){

        throw $th;

    }

}





// =======================
// DELETE VOLUNTEER
// =======================


public function delete_volunteer($id)
{

    try{


        $sql="

            DELETE FROM volunteer_applications

            WHERE id=:id

        ";


        $statement=$this->db->prepare($sql);


        return $statement->execute([

            ":id"=>$id

        ]);



    }catch(\Throwable $th){

        throw $th;

    }

}





// =======================
// PARTNER INQUIRIES
// =======================


public function partners()
{

    try{


        $sql="

            SELECT *

            FROM partner_inquiries

            ORDER BY id DESC

        ";


        $statement=$this->db->prepare($sql);


        $statement->execute();


        return $statement->fetchAll(PDO::FETCH_ASSOC);



    }catch(\Throwable $th){

        throw $th;

    }

}






// =======================
// DELETE PARTNER
// =======================


public function delete_partner($id)
{

    try{


        $sql="

            DELETE FROM partner_inquiries

            WHERE id=:id

        ";


        $statement=$this->db->prepare($sql);



        return $statement->execute([


            ":id"=>$id


        ]);



    }catch(\Throwable $th){

        throw $th;

    }

}

// =======================
// CONTACT PAGE
// =======================

public function contactPage()
{
    try{

        $sql = "
            SELECT *
            FROM contact_page
            LIMIT 1
        ";

        $statement = $this->db->prepare($sql);

        $statement->execute();

        $page = $statement->fetch(PDO::FETCH_ASSOC);

        if(!$page){

            $page = [

                "page_title"=>"",
                "page_subtitle"=>"",
                "address"=>"",
                "email"=>"",
                "facebook_url"=>"",
                "instagram_url"=>"",
                "linkedin_url"=>"",
                "youtube_url"=>""

            ];

        }

        return $page;

    }catch(\Throwable $th){

        throw $th;

    }
}

// =======================
// UPDATE CONTACT PAGE
// =======================

public function update_contact_page($data)
{

    try{

        $sql="

            UPDATE contact_page SET

                page_title=:page_title,

                page_subtitle=:page_subtitle,

                address=:address,

                email=:email,

                facebook_url=:facebook_url,

                instagram_url=:instagram_url,

                linkedin_url=:linkedin_url,

                youtube_url=:youtube_url

            WHERE id=1

        ";

        $statement=$this->db->prepare($sql);

        return $statement->execute([

            ":page_title"=>$data['page_title'],

            ":page_subtitle"=>$data['page_subtitle'],

            ":address"=>$data['address'],

            ":email"=>$data['email'],

            ":facebook_url"=>$data['facebook_url'],

            ":instagram_url"=>$data['instagram_url'],

            ":linkedin_url"=>$data['linkedin_url'],

            ":youtube_url"=>$data['youtube_url']

        ]);

    }catch(\Throwable $th){

        throw $th;

    }

}

// =======================
// CONTACT MESSAGES
// =======================

public function contactMessages()
{

    try{

        $sql="

            SELECT *

            FROM contact_messages

            ORDER BY id DESC

        ";

        $statement=$this->db->prepare($sql);

        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_ASSOC);

    }catch(\Throwable $th){

        throw $th;

    }

}


// =======================
// DELETE CONTACT MESSAGE
// =======================

public function delete_contact_message($id)
{

    try{

        $sql="

            DELETE FROM contact_messages

            WHERE id=:id

        ";

        $statement=$this->db->prepare($sql);

        return $statement->execute([

            ":id"=>$id

        ]);

    }catch(\Throwable $th){

        throw $th;

    }

}


// =======================
// ADMIN ACCOUNT
// =======================

public function adminAccount()
{

    try{

        $sql = "

            SELECT *

            FROM admin_users

            LIMIT 1

        ";

        $statement = $this->db->prepare($sql);

        $statement->execute();

        return $statement->fetch(PDO::FETCH_ASSOC);

    }catch(\Throwable $th){

        throw $th;

    }

}

// =======================
// UPDATE ADMIN ACCOUNT
// =======================

public function update_admin_account($data)
{

    try{

        $admin = $this->adminAccount();

        if(!$admin){

            return false;

        }

        // Verify current password
        if(!password_verify($data['current_password'], $admin['password'])){

            return "wrong_password";

        }

        $username = trim($data['username']);

        // Keep old password if new password is empty
        $password = $admin['password'];

        if(!empty($data['new_password'])){

            $password = password_hash($data['new_password'], PASSWORD_DEFAULT);

        }

        $sql = "

            UPDATE admin_users SET

                username = :username,

                password = :password

            WHERE id = :id

        ";

        $statement = $this->db->prepare($sql);

        return $statement->execute([

            ":username"=>$username,

            ":password"=>$password,

            ":id"=>$admin['id']

        ]);

    }catch(\Throwable $th){

        throw $th;

    }

}


// =======================
// ADMIN LOGIN
// =======================

public function admin_login($username)
{

    try{

        $sql = "
        SELECT *
        FROM admin_users
        WHERE username=:username
        LIMIT 1
        ";


        $statement=$this->db->prepare($sql);


        $statement->execute([

            ":username"=>$username

        ]);


        return $statement->fetch(PDO::FETCH_ASSOC);



    }catch(\Throwable $th){

        throw $th;

    }

}

public function saveVolunteer($data)
{



$query="
INSERT INTO volunteer_applications
(full_name,email,phone,skills,message)

VALUES
(:full_name,:email,:phone,:skills,:message)
";


$stmt=$this->db->prepare($query);


return $stmt->execute([

":full_name"=>$data['full_name'],
":email"=>$data['email'],
":phone"=>$data['phone'],
":skills"=>$data['skills'],
":message"=>$data['message']

]);

}

public function savePartner($data)
{

$query="
INSERT INTO partner_inquiries
(organization_name,representative_name,message)

VALUES
(:organization_name,:representative_name,:message)
";


$stmt=$this->db->prepare($query);


return $stmt->execute([

":organization_name"=>$data['organization_name'],
":representative_name"=>$data['representative_name'],
":message"=>$data['message']

]);

}


public function saveContact($data)
{


$query="
INSERT INTO contact_messages
(full_name,email,subject,message)

VALUES
(:full_name,:email,:subject,:message)
";


$stmt=$this->db->prepare($query);



return $stmt->execute([

":full_name"=>$data['full_name'],

":email"=>$data['email'],

":subject"=>$data['subject'],

":message"=>$data['message']

]);


}

}

?>