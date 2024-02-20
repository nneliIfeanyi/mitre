<?php
  class Application extends Controller{
    private $userModel;
    private $databaseModel;
    public $attendanceModel;

     public function __construct(){
      $this->userModel = $this->model('User');
      $this->attendanceModel = $this->model('Attendanze');
      $this->databaseModel = $this->model('Databaze');

      }



    public function index(){
     redirect('portal');
    }  

     public function add_mark(){

      if($_SERVER['REQUEST_METHOD'] == 'POST'){
            // Sanitize POST
            $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = '';
                  
            $mitre_set = trim($_POST['set']);
            $conclave = trim($_POST['conclave']);       
            $zone = $_POST['zone'];
            $paper = $_POST['paper'];
            $count = 1;

            if ($paper == 'long_paper') {
              $paper1 = 'short_paper';
              $paper2 = 'term_paper';
              $paper3 = 'Summary';
            }elseif ($paper == 'short_paper') {
              $paper1 = 'long_paper';
              $paper2 = 'term_paper';
              $paper3 = 'Summary';
            }elseif ($paper == 'term_paper') {
              $paper1 = 'short_paper';
              $paper2 = 'long_paper';
              $paper3 = 'Summary';
            }elseif ($paper == 'Summary') {
              $paper1 = 'short_paper';
              $paper2 = 'long_paper';
              $paper3 = 'term_paper';
            }

            //check for zone
            if ($zone == 'Kaduna') {

            //$total = $this->databaseModel->totals($mitre_set);
            $all = $this->databaseModel->allKaduna($mitre_set);
            $added = $this->attendanceModel->check_mark($mitre_set,$conclave,$paper,$zone);
            $output = "<div class='card-body'>";
            $output.= "<div class='col-md-12 jumbotron'>
                    <h3 class='text-center'>Add $paper Marks For Set $mitre_set</h3>
                    <p class='text-center lead'>Conclave $conclave $zone zone.</p>
              
                  </div>";
            $output .= "<form method='post' action='' id='add-scores'>";
            $output.= "<div class='table-responsive'>";
            $output .= "<table class='table table-bordered table-hover table-stripped' id='teacher'>
                        <thead>
                        <th>#</th>
                        <th>Name</th>
                        <th>$paper</th>
                         <th>$paper1</th>
                          <th>$paper2</th>
                          <th>$paper3</th>
                    </thead>";
            $output .= "<tbody>";
            if (!$added) {
              foreach ($all as $student) {
              $output.= "<tr>
                     <td>$count</td>
                     <td>$student->fullname</td>
                     <td><input type='number' name='score[]' placeholder='score' class='form-control' max='100' min='0' value=''></td>
                     <td><input placeholder='score' disabled class='form-control' value='Disabled'></td>
                     <td><input placeholder='score' disabled class='form-control' value='Disabled'></td>
                     <td><input placeholder='score' disabled class='form-control' value='Disabled'></td>
                      <input type='hidden' name='mitre_set[]' value='$mitre_set'>
                      <input type='hidden' name='fullname[]' value='$student->fullname'>
                      <input type='hidden' name='std_id[]' value='$student->id'>
                      <input type='hidden' name='conclave[]' value='$conclave'>
                      <input type='hidden' name='paper[]' value='$paper'>
                      <input type='hidden' name='zone[]' value='$zone'>
                </tr>";
              $count++;
            }//for ech loop ends
            $output .= "</tbody>";
            $output .= "<tfoot>
                          <th>#</th>
                            <th>Name</th>
                            <th>$paper</th>
                            <th>$paper1</th>
                            <th>$paper2</th>
                            <th>$paper3</th>
                       </tfoot>";
            $output.= "</table>";
            $output .= "<tr><td colspan='4'><input type='submit' name='submit_result' value='Add Mark' class='btn btn-dark'></td></tr>";
            }else{
            foreach ($added as $added) {
              $output.= "<tr>
                     <td>$count</td>
                     <td>$added->name</td>
                     <td><input type='number' name='score[]' placeholder='score' class='form-control' max='100' min='0' value='$added->score'></td>
                     <td><input placeholder='score' disabled class='form-control' value='Disabled'></td>
                     <td><input placeholder='score' disabled class='form-control' value='Disabled'></td>
                     <td><input placeholder='score' disabled class='form-control' value='Disabled'></td>
                      <input type='hidden' name='mitre_set[]' value='$mitre_set'>
                      <input type='hidden' name='fullname[]' value='$added->name'>
                      <input type='hidden' name='std_id[]' value='$added->std_id'>
                      <input type='hidden' name='conclave[]' value='$conclave'>
                      <input type='hidden' name='paper[]' value='$paper'>
                      <input type='hidden' name='zone[]' value='$zone'>
                </tr>";
              $count++;
            }//for ech loop ends
            $output .= "</tbody>";
            $output .= "<tfoot>
                          <th>#</th>
                            <th>Name</th>
                            <th>$paper</th>
                            <th>$paper1</th>
                            <th>$paper2</th>
                            <th>$paper3</th>
                       </tfoot>";
            $output.= "</table>";
            $output .= "<tr><td colspan='4'><input type='submit' name='submit_update' value='Update Mark' class='btn btn-dark'></td></tr>";
            }//end if added

            
            $output.= "</div>";
            $output .= "</form>";
            $output .= "</div>";
            echo $output;
             //Ufuma zone 
            }elseif($zone == 'Ufuma'){
              $all = $this->databaseModel->allUfuma($mitre_set);
            $added = $this->attendanceModel->check_mark($mitre_set,$conclave,$paper,$zone);
            $output = "<div class='card-body'>";
            $output.= "<div class='col-md-12 jumbotron'>
                    <h3 class='text-center'>Add $paper Marks For Set $mitre_set</h3>
                    <p class='text-center lead'>Conclave $conclave $zone zone.</p>
              
                  </div>";
            $output .= "<form method='post' action='' id='add-scores'>";
            $output.= "<div class='table-responsive'>";
            $output .= "<table class='table table-bordered table-hover table-stripped' id='teacher'>
                        <thead>
                        <th>#</th>
                        <th>Name</th>
                        <th>$paper</th>
                         <th>$paper1</th>
                          <th>$paper2</th>
                          <th>$paper3</th>
                    </thead>";
            $output .= "<tbody>";
            if (!$added) {
              foreach ($all as $student) {
              $output.= "<tr>
                     <td>$count</td>
                     <td>$student->fullname</td>
                     <td><input type='number' name='score[]' placeholder='score' class='form-control' max='100' min='0' value=''></td>
                     <td><input placeholder='score' disabled class='form-control' value='Disabled'></td>
                     <td><input placeholder='score' disabled class='form-control' value='Disabled'></td>
                     <td><input placeholder='score' disabled class='form-control' value='Disabled'></td>
                      <input type='hidden' name='mitre_set[]' value='$mitre_set'>
                      <input type='hidden' name='fullname[]' value='$student->fullname'>
                      <input type='hidden' name='std_id[]' value='$student->id'>
                      <input type='hidden' name='conclave[]' value='$conclave'>
                      <input type='hidden' name='paper[]' value='$paper'>
                      <input type='hidden' name='zone[]' value='$zone'>
                </tr>";
              $count++;
            }//for ech loop ends
            $output .= "</tbody>";
            $output .= "<tfoot>
                          <th>#</th>
                            <th>Name</th>
                            <th>$paper</th>
                            <th>$paper1</th>
                            <th>$paper2</th>
                            <th>$paper3</th>
                       </tfoot>";
            $output.= "</table>";
            $output .= "<tr><td colspan='4'><input type='submit' name='submit_result' value='Add Mark' class='btn btn-dark'></td></tr>";
            }else{
            foreach ($added as $added) {
              $output.= "<tr>
                     <td>$count</td>
                     <td>$added->name</td>
                     <td><input type='number' name='score[]' placeholder='score' class='form-control' max='100' min='0' value='$added->score'></td>
                     <td><input placeholder='score' disabled class='form-control' value='Disabled'></td>
                     <td><input placeholder='score' disabled class='form-control' value='Disabled'></td>
                     <td><input placeholder='score' disabled class='form-control' value='Disabled'></td>
                      <input type='hidden' name='mitre_set[]' value='$mitre_set'>
                      <input type='hidden' name='fullname[]' value='$added->name'>
                      <input type='hidden' name='std_id[]' value='$added->std_id'>
                      <input type='hidden' name='conclave[]' value='$conclave'>
                      <input type='hidden' name='paper[]' value='$paper'>
                      <input type='hidden' name='zone[]' value='$zone'>
                </tr>";
              $count++;
            }//for ech loop ends
            $output .= "</tbody>";
            $output .= "<tfoot>
                          <th>#</th>
                            <th>Name</th>
                            <th>$paper</th>
                            <th>$paper1</th>
                            <th>$paper2</th>
                            <th>$paper3</th>
                       </tfoot>";
            $output.= "</table>";
            $output .= "<tr><td colspan='4'><input type='submit' name='submit_update' value='Update Mark' class='btn btn-dark'></td></tr>";
            }//end if added

            
            $output.= "</div>";
            $output .= "</form>";
            $output .= "</div>";
            echo $output;

            //allminna
            }else{
              $all = $this->databaseModel->allMinna($mitre_set);
            $added = $this->attendanceModel->check_mark($mitre_set,$conclave,$paper,$zone);
            $output = "<div class='card-body'>";
            $output.= "<div class='col-md-12 jumbotron'>
                    <h3 class='text-center'>Add $paper Marks For Set $mitre_set</h3>
                    <p class='text-center lead'>Conclave $conclave $zone zone.</p>
              
                  </div>";
            $output .= "<form method='post' action='' id='add-scores'>";
            $output.= "<div class='table-responsive'>";
            $output .= "<table class='table table-bordered table-hover table-stripped' id='teacher'>
                        <thead>
                        <th>#</th>
                        <th>Name</th>
                        <th>$paper</th>
                         <th>$paper1</th>
                          <th>$paper2</th>
                          <th>$paper3</th>
                    </thead>";
            $output .= "<tbody>";
            if (!$added) {
              foreach ($all as $student) {
              $output.= "<tr>
                     <td>$count</td>
                     <td>$student->fullname</td>
                     <td><input type='number' name='score[]' placeholder='score' class='form-control' max='100' min='0' value=''></td>
                     <td><input placeholder='score' disabled class='form-control' value='Disabled'></td>
                     <td><input placeholder='score' disabled class='form-control' value='Disabled'></td>
                     <td><input placeholder='score' disabled class='form-control' value='Disabled'></td>
                      <input type='hidden' name='mitre_set[]' value='$mitre_set'>
                      <input type='hidden' name='fullname[]' value='$student->fullname'>
                      <input type='hidden' name='std_id[]' value='$student->id'>
                      <input type='hidden' name='conclave[]' value='$conclave'>
                      <input type='hidden' name='paper[]' value='$paper'>
                      <input type='hidden' name='zone[]' value='$zone'>
                </tr>";
              $count++;
            }//for ech loop ends
            $output .= "</tbody>";
            $output .= "<tfoot>
                          <th>#</th>
                            <th>Name</th>
                            <th>$paper</th>
                            <th>$paper1</th>
                            <th>$paper2</th>
                            <th>$paper3</th>
                       </tfoot>";
            $output.= "</table>";
            $output .= "<tr><td colspan='4'><input type='submit' name='submit_result' value='Add Mark' class='btn btn-dark'></td></tr>";
            }else{
            foreach ($added as $added) {
              $output.= "<tr>
                     <td>$count</td>
                     <td>$added->name</td>
                     <td><input type='number' name='score[]' placeholder='score' class='form-control' max='100' min='0' value='$added->score'></td>
                     <td><input placeholder='score' disabled class='form-control' value='Disabled'></td>
                     <td><input placeholder='score' disabled class='form-control' value='Disabled'></td>
                     <td><input placeholder='score' disabled class='form-control' value='Disabled'></td>
                      <input type='hidden' name='mitre_set[]' value='$mitre_set'>
                      <input type='hidden' name='fullname[]' value='$added->name'>
                      <input type='hidden' name='std_id[]' value='$added->std_id'>
                      <input type='hidden' name='conclave[]' value='$conclave'>
                      <input type='hidden' name='paper[]' value='$paper'>
                      <input type='hidden' name='zone[]' value='$zone'>
                </tr>";
              $count++;
            }//for ech loop ends
            $output .= "</tbody>";
            $output .= "<tfoot>
                          <th>#</th>
                            <th>Name</th>
                            <th>$paper</th>
                            <th>$paper1</th>
                            <th>$paper2</th>
                            <th>$paper3</th>
                       </tfoot>";
            $output.= "</table>";
            $output .= "<tr><td colspan='4'><input type='submit' name='submit_update' value='Update Mark' class='btn btn-dark'></td></tr>";
            }//end if added

            
            $output.= "</div>";
            $output .= "</form>";
            $output .= "</div>";
            echo $output;
            }//zone check if ends

        }//post request method endd

    }//addmark method ends


}