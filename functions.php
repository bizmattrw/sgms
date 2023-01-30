<?php

function listClasses($db)
{
$k=mysqli_query($db,"SELECT * FROM classes ORDER BY class_name ASC");
echo"<option value=''>--- Select ---</option>";
while($load=mysqli_fetch_object($k))
{
echo"<option>".$load->class_name."</option>";
}
}

function realValue($db, $val, $table, $key)
{
    $k = mysqli_query($db, "SELECT $val FROM $table WHERE $key");
    $rows = mysqli_num_rows($k);
    if ($rows > 0) {
        $load = mysqli_fetch_object($k);
        return $load->$val;
    } else {
        return null;
    }
}
function countExist($db,$table,$key)
{
  $k=mysqli_query($db,"SELECT * FROM $table WHERE $key");
  $rows=mysqli_num_rows($k);
  return $rows;
}

function getStudentPossition($db, $acadyear, $regno, $class_name, $term){
    
    $opt=explode(" ",$class_name);
$level=trim($opt[0]);
$option=trim($opt[1]);
    
    $year=2022;

    $data=mysqli_query($db, "SELECT * FROM `position` WHERE `acadyear`=$acadyear AND `class_name`='$class_name' AND `term`=$term  ORDER BY total DESC")or die(mysqli_error($db));
      

    $students = array();

    $position =0;
    $marks = 0;
    $prevMarks = 0;
    $next=False;
    while($row=mysqli_fetch_array($data)){
         $marks = $row['total'];
         if($marks!=0 && $prevMarks==0){
           if($next==True){
             $position=$position+2;
             $next=False;
           }else{
             $position++;
           }

         }elseif($marks<$prevMarks){
           if($next==True){
             $position=$position+2;
             $next=False;
           }else{
             $position++;
           }
         }elseif($marks==$prevMarks){
           $next=True;
         }
        $prevMarks=$marks;
        $students[$row['regno']]=$position;
    }
    return $students[$regno];
}

function getStudentno($db, $class){
    $year=2022;
    $data=mysqli_query($db,"SELECT COUNT(`no`) AS number FROM `students` WHERE `std_class`='$class'");
    while($row=mysqli_fetch_array($data)){
        $marks = $row['number'];
    }
    return $marks;
}
?>