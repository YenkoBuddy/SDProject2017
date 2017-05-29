 <?php

    error_reporting(~E_NOTICE);
    require_once 'include/config.php';
    require_once 'include/connection.php';

        session_start();

        $genstatus = array('valid', 'invalid',);
        shuffle($genstatus);
        reset($genstatus);

        foreach ($genstatus as $genstatus):
            $status = $genstatus;
        endforeach;


        $regNo = filter_input(INPUT_POST, 'regNo');
        $type = filter_input(INPUT_POST,'type');
        $year = filter_input(INPUT_POST,'year');
        $model = filter_input(INPUT_POST,'model');
        $description = filter_input(INPUT_POST,'description');
        $route="1";
        $ownerID = "9";
        $licenceDisc = filter_input(INPUT_POST,'licenceDisc');
        $inspectionReport = filter_input(INPUT_POST,'inspectionReport');


        $firstname = filter_input(INPUT_POST, 'firstname');
        $lastName = filter_input(INPUT_POST, 'lastName');
        $idNo = filter_input(INPUT_POST, 'idNo');
        $contactNumber = filter_input(INPUT_POST, 'contactNumber');
        $email = filter_input(INPUT_POST, 'email');
        $address1 = filter_input(INPUT_POST, 'address1');
        $suburb = "1"; //filter_input(INPUT_POST, 'suburb');
        $res = filter_input(INPUT_POST, 'res');
        $licence = filter_input(INPUT_POST, 'licence');
        $prdp = filter_input(INPUT_POST, 'prdp');
        $headshot = filter_input(INPUT_POST, 'headshot');
 

        $sql = "INSERT INTO application(RegNo, Type, Year, Model, Description, RouteID, ownerID, FirstName, lastName, IDNo, ContactNumber, EmailAddress, Address1, SuburbID, ProofOfResidence, DriversLicence,PrDP, Photo, ValidationStatus) VALUES(:regNo, :type, :year, :model, :description, :route, :ownerID, :firstname, :lastName, :idNo, :contactNumber, :email, :address1, :suburb, :res, :licence, :prdp, :headshot, :status)";


        $stmt = $conn->prepare($sql);
            #Taxi
            $stmt->bindParam(':regNo',$regNo);
            $stmt->bindParam(':type',$type);
            $stmt->bindParam(':year',$year);
            $stmt->bindParam(':model',$model);
            $stmt->bindParam(':description',$description);
            $stmt->bindParam(':route', $route);
            $stmt->bindParam(':ownerID',$ownerID);
            #Driver
            $stmt->bindParam(':firstname',$firstname);
            $stmt->bindParam(':lastName',$lastName);
            $stmt->bindParam(':idNo',$idNo);
            $stmt->bindParam(':contactNumber',$contactNumber);
            $stmt->bindParam(':email',$email);
            $stmt->bindParam(':address1',$address1);
            $stmt->bindParam(':suburb',$suburb);
            $stmt->bindParam(':res',$res);
            $stmt->bindParam(':licence',$licence);
            $stmt->bindParam(':prdp',$prdp);
            $stmt->bindParam(':headshot',$headshot);
            $stmt->bindParam(':status', $status);

            if($stmt->execute())
            {
                $MSG = "new record succesfully inserted ...";
              
            }
            else
            {
                $MSG = "error while inserting....";
            }
       
            
    ?>
    <!DOCTYPE html>
    <html>

    <body>
        <?php echo $status ; ?>
                <?php echo $MSG ; ?>

    </body>
    </html>