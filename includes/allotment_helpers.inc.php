<?php
error_reporting(E_ALL & ~E_NOTICE);
ini_set('display_errors', 0);
require 'config.inc.php';


class Student {
    public $mis;
    public $year_of_study;
    public $cgpa;
    public $category;
    public $branch;
    public $backlogs;
}

class PriorityQueue {
    public $students = [];
    public $capacity;
    public $size = 0;

    function __construct($capacity) {
        $this->capacity = $capacity;
    }

    function insertStudent($s1) {
        if ($this->size == $this->capacity) {
            echo "Priority queue is full. Cannot insert student.\n";
            return;
        }

        $this->students[$this->size] = $s1;
        $this->size++;

        $this->heapifyUp($this->size - 1);
    }

    function removeStudent() {
        if ($this->size == 0) {
            echo "Priority queue is empty. Cannot remove student.\n";
            return NULL;
        }

        $highestPriorityStudent = $this->students[0];
        $this->students[0] = $this->students[$this->size - 1];
        $this->size--;
        $this->heapifyDown(0);

        return $highestPriorityStudent;
    }

    function heapifyUp($i) {
        $childIndex = $i;

        while ($childIndex > 0) {
            $parentIndex = (int)(($childIndex - 1) / 2);

            if ($this->students[$childIndex]->cgpa > $this->students[$parentIndex]->cgpa) {
                $temp = $this->students[$childIndex];
                $this->students[$childIndex] = $this->students[$parentIndex];
                $this->students[$parentIndex] = $temp;
            } else {
                break;
            }
            $childIndex = $parentIndex;
        }
    }

    function heapifyDown($i) {
        $largest = $i;
        $left = 2 * $i + 1;
        $right = 2 * $i + 2;

        if ($left < $this->size && $this->students[$left]->cgpa > $this->students[$largest]->cgpa)
            $largest = $left;

        if ($right < $this->size && $this->students[$right]->cgpa > $this->students[$largest]->cgpa)
            $largest = $right;

        if ($largest != $i) {
            $temp = $this->students[$i];
            $this->students[$i] = $this->students[$largest];
            $this->students[$largest] = $temp;
            $this->heapifyDown($largest);
        }
    }
}
class Branch {
    public $students; // This will hold the PriorityQueue object
    public $total_seats;
    public $size = 0;
    public $open;
    public $obc;
    public $st;
    public $ews;
    public $sc;
    public $alloted_students = array();


    
    // Constructor to initialize the students property
    public function __construct() {
        $this->students = new PriorityQueue(100);
    }
    
}

function createBranch($total_seats) {
    $br = new Branch();
    $br->total_seats = $total_seats;
    $br->open = (int)(($total_seats * 5) / 10);
    $br->st = $br->ews = $br->sc = (int)($total_seats / 10);
    $br->obc = $total_seats - $br->open - $br->st - $br->ews - $br->sc;
    
    return $br;
}

function fetch_students_data($branches,$branch_list) {
    require 'config.inc.php';

    for ($i=0; $i < 8; $i++) { 

        $sql = "SELECT s.MIS, s.Year_of_study,s.Category, s.Branch, a.CGPA, a.Backlogs FROM Students s JOIN Applications a ON s.MIS = a.MIS WHERE s.Branch='$branch_list[$i]'";
        $result = mysqli_query($conn, $sql);
        // ysqli_connect
        if($result){
            while ($row = mysqli_fetch_assoc($result)) {
                $s1 = new Student();
            
                $s1->mis = $row['MIS'];
                $s1->year_of_study = $row['Year_of_study'];
                $s1->branch = $row['Branch'];
                $s1->cgpa = $row['CGPA'];
                $s1->backlogs = $row['Backlogs'];
                $s1->category = $row['Category'];
                $s1->sequence = 0;

                // echo  ". MIS: {".$row['MIS']."} CGPA: {".$row['CGPA']."}  Backlogs: {".$row['Backlogs']."}";

            
                // $pq->insertStudent($s1);
                $branches[$i]->students->insertStudent($s1);

            }

        }
    }
   
}



function allocateBranch($br, $current_student) {
    if ($br->size == $br->total_seats) {
        // echo "1<br>";
        // seats are full
        return 0;
    }
    if ($current_student->category == 'Open') {
        // echo "2<br>";
        
        if ($br->open == 0) {
            //open seats are full        
            return 0;
        }
        $br->alloted_students[]= $current_student;
        $br->size++;
        $br->open--;
        return 1;
    }
    
    if ($current_student->category == 'OBC') {
        // echo "3<br>";
        if ($br->open == 0) {
            if ($br->obc == 0) {
                return 0;
            }
            $br->alloted_students[] = $current_student;
            $br->size++;
            $br->obc--;
            return 1;
        }
        $br->alloted_students[] = $current_student;
        $br->size++;
        $br->open--;
        return 1;
    }
    if ($current_student->category == 'EWS') {
        // echo "4<br>";
        if ($br->open == 0) {
            if ($br->ews == 0) {
                return 0;
            }
            $br->alloted_students[] = $current_student;
            $br->size++;
            $br->ews--;
            return 1;
        }
        $br->alloted_students[] = $current_student;
        $br->size++;
        $br->open--;
        return 1;
    }
    if ($current_student->category == 'ST') {
        // echo "5<br>";
        if ($br->open == 0) {
            if ($br->st == 0) {
                return 0;
            }
            $br->alloted_students[] = $current_student;
            $br->size++;
            $br->st--;
            return 1;
        }
        $br->alloted_students[] = $current_student;
        $br->size++;
        $br->open--;
        return 1;
    }
    if ($current_student->category == 'SC') {
        // echo "6<br>";
        if ($br->open == 0) {
            if ($br->sc == 0) {
                return 0;
            }
            $br->alloted_students[] = $current_student;
            $br->size++;
            $br->sc--;
            return 1;
        }
        $br->alloted_students[] = $current_student;
        $br->size++;
        $br->open--;
        return 1;
    }

 
    return 0;


}




function Allocation($branches) {
    
    for ($i=0; $i < 8; $i++) { 
        $br = $branches[$i];
        $pq = $br->students;
        while ($pq->size != 0 && $br->size < $br->total_seats) {
            $current_student = $pq->removeStudent();
            allocateBranch($br, $current_student);
        }
        
    }
    
    
    
}





// function display_branch_student($branches,$branch_list) {
//     for ($i=0; $i < 8; $i++) { 
//         echo "Selected Students of ".$branch_list[$i]." are :\n";
//         echo "<br>";
//         $size = $branches[$i]->size;
//         for ($j=0; $j < $size; $j++) { 
//             echo ($j + 1) . ". MIS: {".$branches[$i]->alloted_students[$j]->mis."} CGPA: {".$branches[$i]->alloted_students[$j]->cgpa."}  Backlogs: {".$branches[$i]->alloted_students[$j]->backlogs."}";
//             echo "<br>";

//         }
        
//         echo "<br>";
        
//     }
//     echo "\n";
//     // echo "<script type='text/javascript'>alert('Application sent successfully')</script>";

    
// }






// Assuming you have already defined the createBranch function and branch_capacity array

// Define the branch capacities
//-----------------------cvl,cmp,elc,etc,ins,mch,met,prd
// $branch_list = array('civil','comp','elec','entc','instru','mech','meta','prod');
// $branch_capacity = array(10, 5, 15, 10, 8,  15, 12, 10); // Example capacities for each branch

// // Create an array to hold the branches
// $branches = array();

// // Create and add Branch objects to the array with different capacities
// for ($i = 0; $i < count($branch_capacity); $i++) {
//     $branches[] = createBranch($branch_capacity[$i]);
//     // echo  "size: {".$branches[$i]->size."} total seats: {".$branches[$i]->total_seats."} open seats: {".$branches[$i]->open."} ews seats: {".$branches[$i]->ews."} obc seats: {".$branches[$i]->obc."} sc seats: {".$branches[$i]->sc."} st seats: {".$branches[$i]->st."} <br>";
// }



// fetch_students_data($branches,$branch_list);
// Allocation($branches);
// display_branch_student($branches,$branch_list);










