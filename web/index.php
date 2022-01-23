

<?php

    

// php code to search data in mysql database and set it in input text

if(isset($_POST['search']))
{
    // id to search
    $id = $_POST['id'];
   
    
    
    // connect to mysql host,username,pass,dbname,port of mysql, port of localhot
    $con = mysqli_connect("localhost", "root", "","uom",3307,8080);
    
    // mysql search query
    $sql1 = "SELECT * FROM `student` WHERE regnumber='$id' LIMIT 1;";
    $sql2 = "SELECT DISTINCT c.name, c.dm, c.pm, sc.grade FROM student_has_classes_grades as sc INNER JOIN student as s on sc.student_id=s.id INNER JOIN classes as c on c.id=sc.classes_id WHERE s.regnumber='$id'";
    $result1 = mysqli_query($con, $sql2);
    $data = array();
    if(mysqli_num_rows($result1) > 0)
    {  
             
        while ($row1 = mysqli_fetch_row($result1))

      { $data[] = $row1;
        
        
      }
      $j=0;
      for($i=0;$i<sizeof($data);$i++){

      ${'mathima'.$i}=$data[$i][$j];
      $j++;
      ${'dm'.$i}=$data[$i][$j];
      $j++;
      ${'ects'.$i}=$data[$i][$j];
      $j++;
      ${'grade'.$i}=$data[$i][$j];
      $j=0;
      }
     
    }
    else{echo "not ok";}

    
    mysqli_free_result($result1);
    
    $result = mysqli_query($con, $sql1);
    
    
    if(mysqli_num_rows($result) > 0)
    { 
             
        while ($row = mysqli_fetch_array($result))

      { 
        
        $lastname = $row['lastname'];
        $name = $row['name'];
        $fname = $row['fname'];
        $mname = $row['mname'];
        $birth_place = $row['birth_place'];
        $birth_year = $row['birth_year'];
        $mitroo = $row['mitroo'];
        $arithmos = $row['arithmos'];
        $ryear = $row['ryear'];
        $way = $row['way'];
        $rsemester = $row['rsemester'];
        $atom = $row['atom'];
        $documents = $row['documents'];
        $id = $row['regnumber'];
        $expertise = $row['expertise'];

        
      }
      
     
    }
     // if the id not exist
    // show a message and clear inputs
    else {
        echo "Undifined ID";
        $lastname ="";
        $name = "";
        $fname = "";
        $mname = "";
        $birth_place =  "";
        $birth_year =  "";
        $mitroo = "";
        $arithmos =  "";
        $ryear =  "";
        $way =  "";
        $rsemester =  "";
        $atom =  "";
        $documents =  "";
        
        $expertise =  "";}
    mysqli_free_result($result);

   
            
    
    
    
    
    
    
    mysqli_close($con);
    
    


    

}

// in the first time inputs are empty
else{
    $lastname ="";
    $name = "";
    $fname = "";
    $mname = "";
    $birth_place =  "";
    $birth_year =  "";
    $mitroo = "";
    $arithmos =  "";
    $ryear =  "";
    $way =  "";
    $rsemester =  "";
    $atom =  "";
    $documents =  "";
    
    $expertise =  "";
    
 }


?>



<!DOCTYPE html>
<html lang="el">

<head>
    <style>
        
        body,html{
           
            font: 400 15px/1.8 "Arial Black", sans-serif;
            font-weight: bold;
            
            height:100%;

         margin: 0;
        }
        

        header {
            width: 100%;
            text-align: center;
            border: 1px solid grey;
            
        }
        
        .ui-datepicker-calendar {
            display: none;
            background-color: antiquewhite;
        }
        
        img {
            display: inline-block;
            margin: 0 auto;
        }
        
        h1 {
            text-align: center;
            display: inline-block;
            margin: 0 auto;
        }
        
        thead {
            text-align: center;
        }
    </style>

    
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-tofit=no">
    <!-- Bootstrap CSS -->

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="./test.css">-->

    <title>UoMStudents</title>

</head>

<body style="margin:2em; background-color:  #e6ff99">

    <header>

        <div class="container-fluid" style="display:inline-block;
    margin: 0;">

            <img src="uom.png" alt="logo" height="100px" width="150px">
            <h6> SCHOOL OF INFORMATION SCIENCES</h6>
            <h6>DEPARTMENT OF APPLIED INFORMATIICS</h6>
        </div>
    </header>

    <div class="container-fluid" style="text-align:center;">

        <h1 style="float:center; ">CERTIFICATE</h1>
        <h3>THE FOLLOWING DATA  CERTIFIED:</h3>
    </div>
        <p style="font-weight:bold; text-alighn:left;">Personal Info:</p>
    
    <div class="container-fluid">
        <form class="form-inline" id="myform" action="index.php" method="post" >
            <table class="table table-condensed ">

                <tbody>
                    <tr>
                        <td><label for="lastname">Last Name:</label> </td>
                        <td><input type="name" class="form-control" id="lastname" placeholder="last name" pattern="[A-Za-z]"  name="lastname" value="<?php echo $lastname;?>" ></td>
                        <td><label for="firstname">Name:</label> </td>
                        <td><input type="name" class="form-control" id="name" placeholder="first name" pattern="[A-Za-z]" name="name" value="<?php echo $name;?>"> </td>
                    </tr>
                    <tr>
                        <td><label for="mothername">Mother's Name:</label> </td>
                        <td><input type="name" class="form-control" id="mothername" placeholder="mother's name" pattern="[A-Za-z]" name="mname" value="<?php echo $mname;?>" ></td>
                        <td><label for="fname">Father's Name:</label> </td>
                        <td><input type="name" class="form-control" id="fathername" placeholder="father's name" pattern="[A-Za-z]" name="fname" value="<?php echo $fname;?>"></td>
                    </tr>
                    <tr>
                        <td><label for="birthplace">Birth Place:</label> </td>
                        <td><input type="name" class="form-control" id="birthplace" name="birth_place" value="<?php echo $birth_place;?>" placeholder="birth place" pattern="[A-Za-z]" ></td>
                        <td><label for="birthyear">Birth Year:</label> </td>
                        <td><input type="text" class="date-own form-control" id="birth_year" name="birth_year" value="<?php echo $birth_year;?>" placeholder="birth year"></td>
                    </tr>
                    <tr>
                        <td><label for="mhtroo">On Register numbers:</label> </td>
                        <td><input type="text" class="form-control" id="mhtroo" name="mitroo" value="<?php echo $mitroo;?>" placeholder="mhtroo" ></td>
                        <td><label for="arith">Number:</label> </td>
                        <td><input type="text" class="form-control" id="arith" name="arithmos" value="<?php echo $arithmos;?>" placeholder="Αριθμ." ></td>
                    </tr>

                </tbody>
            </table>
            
    
    
        <p style="font-weight:bold;" >Registration Info:</p> 
        <table  class="table table-condensed" style="margin-right:1.3em; margin-left:-1.9em;">

            <tbody >
                <tr>
                    <td><label for="date">Register Year:</label> </td>
                    <td><input type="text" class="date-own form-control" id="uyear" name="ryear" value="<?php echo $ryear;?>" placeholder="date of register" ></td>
                    <td><label for="semester">Reg. Semester:</label> </td>
                    <td><input type="text" class="form-control" id="semester" name="rsemester" value="<?php echo $rsemester;?>" placeholder="semester"pattern="[Α-Η]"></td>

                </tr>

                <tr>
                    <td><label for="typeofregistration">Type Of Registration: </label> </td>
                    <td><input type="text" class="form-control" id="typeofregistration" name="way" value="<?php echo $way;?>" placeholder="type of registration" ></td>
                    <td><label for="atom">Atom. Delt. Epil: </label> </td>
                    <td><input type="text" class="form-control" id="atom" name="atom" value="<?php echo $atom;?>" placeholder=" " ></td>
                </tr>
               
                <tr>
                    <td><label for="documents">Registtration documents:</label> </td>
                    <td><input type="text" class="form-control" id="documents" name="documents" value="<?php echo $documents;?>" placeholder="documents" pattern="[A-Za-z]"></td>
                    <td style="margin-left:1.3em;"><label for="department">Specialization: </label> </td>
                    <td><input type="text" class="form-control" id="department" name="expertise" value="<?php echo $expertise;?>" placeholder="department" pattern="[A-Za-z]" ></td>
                </tr>
                <tr>
                    <td style="margin-left:1.3em;"><label for="registration">Acedemic ID: </label> </td> 
                    <td><input type="text" class="form-control" name="id" id="registration"  value="<?php echo $id;?>" placeholder="registration number" ></td>
                    <td><button id="regnumber_submit"  name="search"> search</button></td>

                </tr>
                <tr>
                    


                </tr>
               
            </tbody>
        </table>
    </form>
    </div>
    <div class="container-fluid" style="display:inline-block;
    margin: 0 auto;">
        <form id="grades">
            <table class="table table-condensed " id="table2">
                <thead class="table-dark">
                    <tr>
                        <td><label>Class</label> </td>
                        <td><label>C.C</label></td>
                        <td><label>ECTS</label></td>
                        <td><label>Grade</label></td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><label for="A">Semester A</label> </td>
                    </tr>
                    <tr>
                        <td><input type="text" class="form-control" id="mathima0" name="mathima0" value="<?php echo $mathima0;?>" placeholder="class name" ></td>
                        <td><input type="number" class="form-control" id="DM" name="dm0" value="<?php echo $dm0;?>" placeholder="dm" min="1" max="10"></td>
                        <td><input type="number" class="form-control" id="ECTS0"  name="ects0" value="<?php echo $ects0;?>" placeholder="ECTS" min="1" max="10" > </td>
                        <td><input type="number" class="form-control" id="grade0" name="grade0" value="<?php echo $grade0;?>"  placeholder="grade"  min="5" max="10" required="true"></td>
                    </tr>
                    <tr>
                        <td><input type="text" class="form-control" id="mathima1" name="mathima1" value="<?php echo $mathima1;?>" placeholder="class name" ></td>
                        <td><input type="number" class="form-control" id="DM" name="dm1" value="<?php echo $dm1;?>" placeholder="dm" min="1" max="10" ></td>
                        <td><input type="number" class="form-control" id="ECTS1" name="ects1" value="<?php echo $ects1;?>" placeholder="ECTS" min="1" max="10" > </td>
                        <td><input type="number" class="form-control" id="grade1" name="grade1" value="<?php echo $grade1;?>" placeholder="grade" min="5" max="10" required="true"></td>
                    </tr>
                    <tr>
                        <td><input type="text" class="form-control" id="mathima2" name="mathima2" value="<?php echo $mathima2;?>" placeholder="class name"> </td>
                        <td><input type="number" class="form-control" id="DM" name="dm2" value="<?php echo $dm2;?>" placeholder="dm" min="1" max="10" ></td>
                        <td><input type="number" class="form-control" id="ECTS2" name="ects2" value="<?php echo $ects2;?>" placeholder="ECTS" min="1" max="10" > </td>
                        <td><input type="number" class="form-control" id="grade2" name="grade2" value="<?php echo $grade2;?>" placeholder="grade" min="5" max="10" ></td>
                    </tr>
                    <tr>
                        <td><label for="B">Semester B</label> </td>
                    </tr>
                    <tr>
                        <td><input type="text" class="form-control" id="mathima3" name="mathima3" value="<?php echo $mathima3;?>" placeholder="class name" > </td>
                        <td><input type="number" class="form-control" id="DM"  name="dm3" value="<?php echo $dm3;?>" placeholder="dm" min="1" max="10" ></td>
                        <td><input type="number" class="form-control" id="ECTS3" name="ects3" value="<?php echo $ects3;?>"  placeholder="ECTS" min="1" max="10" > </td>
                        <td><input type="number" class="form-control" id="grade3" name="grade3" value="<?php echo $grade3;?>" placeholder="grade" min="5"max="10" required="true"></td>
                    </tr>
                    <tr>
                        <td><input type="text" class="form-control" id="mathima4" name="mathima4" value="<?php echo $mathima4;?>" placeholder="class name" > </td>
                        <td><input type="number" class="form-control" id="DM" name="dm4" value="<?php echo $dm4;?>" placeholder="dm" min="1" max="10"></td>
                        <td><input type="number" class="form-control" id="ECTS4" name="ects4" value="<?php echo $ects4;?>" placeholder="ECTS" min="1" max="10"> </td>
                        <td><input type="number" class="form-control" id="grade4" name="grade4" value="<?php echo $grade4;?>" placeholder="grade" required="true" min="5" max="10"></td>
                    </tr>
                    <tr>
                        <td><label for="C">Semester C</label> </td>
                    </tr>
                    <tr>
                        <td><input type="text" class="form-control" id="mathima5" name="mathima5" value="<?php echo $mathima5;?>" placeholder="class name" > </td>
                        <td><input type="number" class="form-control" id="DM" name="dm5" value="<?php echo $dm5;?>" placeholder="dm"  min="1" max="10"></td>
                        <td><input type="number" class="form-control" id="ECTS5" name="ects5" value="<?php echo $ects5;?>" placeholder="ECTS" min="1" max="10"> </td>
                        <td><input type="number" class="form-control" id="grade5" name="grade5" value="<?php echo $grade5;?>" placeholder="grade" min="5" max="10" required="true"></td>
                    </tr>
                    <tr>
                        <td><input type="text" class="form-control" id="mathima6" name="mathima6" value="<?php echo $mathima6;?>" placeholder="class name" > </td>
                        <td><input type="number" class="form-control" id="DM" name="dm6" value="<?php echo $dm6;?>" placeholder="dm" min="1" max="10"></td>
                        <td><input type="number" class="form-control" id="ECTS6" name="ects6" value="<?php echo $ects6;?>" placeholder="ECTS" min="1"max="10" > </td>
                        <td><input type="number" class="form-control" id="grade6" name="grade6" value="<?php echo $grade6;?>" placeholder="grade" min="5" max="10" required="true"></td>
                    </tr>



                </tbody>
            </table>
            </form>
        </div>
            <div class="container-fluid" style="display:inline-block;
            margin: 0 auto;">
            <form id="submitform">
            <div class="form-group">
                <label for="Sender Address">University administration Address</label>
                <input value="0xC88C9F9ee3Ba588706532E9e4E52731c61949aa7" type="text" class="form-control" id="fromAddress" ariadescribedby="fromAddressHelp" placeholder="Εισάγετε την διεύθυνσή σας" required="true" readonly/>
                <small id="fromAddressHelp" class="form-text text-muted">Approve it with Metamask.</small>
            </div>
            <div class="form-group">
                <label for="Receiver Address">Student Address</label>
                <input value="0xB1DedF3e9b7558fEA42ba05625355bAA3Ed5BdeE" type="text" class="form-control" id="toAddress" aria-describedby="toAddressHelp" placeholder="Enter the receipient address" required="true"/>
                <small id="toAddressHelp" class="form-text text-muted">Give the student's address (public address)</small>
            </div>
        

            <button type="submit" class="btn btn-primary" id="btn">Send</button>
            <div id="deposit-result">Press Send button to store student's info on smart contract.</div>
            <span id="deposit-result1"></span>

        </form>


    </div>



   
    <script src="web3.min.js"></script>
    <script src="contractAbi.js"></script>
  

   
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossOrigin="anonymous">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js" integrity="sha384-vk5WoKIaW/vJyUAd9n/wmopsmNhiy+L2Z+SBxGYnUkunIxVxAv/UtMOhba/xskxh" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossOrigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossOrigin="anonymous">
    </script>
   
    <script>
    window.addEventListener('load', async () => {
    // Modern dapp browsers...
    if (window.ethereum) {
        window.web3 = new Web3(ethereum);
        try {
            // Request account access if needed
            await ethereum.enable();
            // Acccounts now exposed
            web3.eth.sendTransaction({/* ... */});
        } catch (error) {
            // User denied account access...
        }
    }
    // Legacy dapp browsers...
    else if (window.web3) {
        window.web3 = new Web3(web3.currentProvider);
        // Acccounts always exposed
        web3.eth.sendTransaction({/* ... */});
    }
    // Non-dapp browsers...
    else {
        console.log('Non-Ethereum browser detected. You should consider trying MetaMask!');
    }
});
        if ( typeof web3 != 'undefined' ) {
        web3 = new Web3(web3.currentProvider);
        } else {
        web3 = new Web3(new Web3.providers.HttpProvider("http://localhost:8545"));
        }
        web3.eth.defaultAccount = web3.eth.accounts[0];
    </script>

    <script>
        var contractAddress = "0x07dc4077f33c7bc71643df7029c59339540a0d1a";
        var Contract = new web3.eth.Contract(abi, contractAddress);
      
       
        $("#submitform").submit(function() {
            event.preventDefault();
            
           
            var fromAddress = $('#fromAddress').val();
         
            var toAddress = $('#toAddress').val();
            var lastname = $('#lastname').val();
            var name = $('#name').val();
            var fname = $('#fathername').val();
            var mname = $('#mothername').val();
            var birthyear = $('#birth_year').val();
            var specialization = $('#department').val();
            var registeryear = $('#uyear').val();
            var classes=getArray("mathima"); 
            
            
            var ects=getArray("ECTS");  
            var grades=getArray("grade");
           
            if (web3.utils.isAddress(toAddress) != true) {
                alert('Not an address');
                return;
            }
           
          
            for(i=0;i<classes.length;i++)
            {
                classes[i]= web3.utils.padRight(web3.utils.fromAscii(classes[i]), 64);
                grades[i]= web3.utils.padLeft(web3.utils.fromDecimal(grades[i]), 64);
             
                ects[i]= web3.utils.padLeft(web3.utils.fromDecimal(ects[i]), 64);
               


            }
            var count= classes.length+grades.length+ects.length;
          
            var alldata=new Array(count);
            var j=0;
            for(i=0;i<count;i+=3)
            {
                alldata[i]=classes[j];
                alldata[i+1]=grades[j];
                alldata[i+2]=ects[j];
                j++;
            }
            console.log(alldata);
            
           var y;
            Contract.methods.setStudent(toAddress,lastname,name,fname,mname,birthyear,registeryear,specialization).estimateGas({from: fromAddress}).then(function(gasAmount){
    console.log(gasAmount);
    y=gasAmount;

})
.catch(function(error){
    console.log(error);
});
           
           
            Contract.methods.setStudent(toAddress,lastname,name,fname,mname,birthyear,registeryear,specialization).send({from: fromAddress},
            function(error, result) {
             if (error) {
                 console.log('error: ' + error);
            $('#deposit-result').html('<b>Error: </b>' + error);
            
        }
        else {
             $('#deposit-result').html('Success TX: <b>' + result + '</b>');
            
        }
    });
    var x;
    Contract.methods.setStudentGrades(toAddress,alldata).estimateGas({from: fromAddress}).then(function(gasAmount){
    console.log(gasAmount);
    x=gasAmount;

})
.catch(function(error){
    console.log(error);
});
Contract.methods.setStudentGrades(toAddress,alldata).send({from: fromAddress},
function(error,result){
    if (error) {
                 console.log('error: ' + error);
            $('#deposit-result').html('<b>Error: </b>' + error);
            
        }
        else {
             $('#deposit-result').html('Success TX: <b>' + result + '</b>');
            
        }
});
            
   
           
        
   
          
            

        })
    </script>

    
       

    <script src="https://code.jquery.com/ui/1.8.3/jquery-ui.js" integrity="sha384-QesperQPj/3XDYRp1sifXcUWxzjJV09hNcNEj/4OgxfqUirkPH+dYRrw2dLluAZf" crossorigin="anonymous">
    </script>

    <script>
    $(function() {
    $('.date-own').datepicker({
        changeYear: true,
        showButtonPanel: true,
        dateFormat: 'yy',
        onClose: function(dateText, inst) { 
            var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
            $(this).datepicker('setDate', new Date(year, 1));
        }
    });
	$(".date-picker-year").focus(function () {
        $(".ui-datepicker-month").hide();
    });
});
    </script>
    <script>
    function getArray (x){
            var idArr = [];

            

            for(var i=0;i<7;i++)
            {
                idArr[i]=document.getElementById(x+i).value;
             }
             return idArr;
             
    }
    </script>
</body>

</html>