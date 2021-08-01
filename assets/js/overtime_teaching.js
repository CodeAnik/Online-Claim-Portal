function add_rows(){
    // Number of inputs to create
    var number = document.getElementById("member").value;
    console.log(number);
    var container = document.getElementById("main_table");

   document.getElementById('main_table').innerHTML = parseHtml(number);
 
}




function parseHtml(number)
{
   var html= '<form method="POST" class="container card">'+
'        <div class="row">'+
'            <div class="col-md-6">'+
'                <label for="name">Name:</label>'+
'                <input type="text" class="form-control" id="name" name="name">'+
'            </div>'+
'            <div class="col-md-6">'+
'                <label for="facultyof"> Faculty Of:</label>'+
'                <input type="text" class="form-control" id="facultyof" name="facultyof">'+
'            </div>'+
'            <div class="col-md-6">'+
'                <label for="emp_no">Emp No:</label>'+
'                <input type="number" class="form-control" id="emp_no" name="emp_no">'+
'            </div>'+
'            <div class="col-md-6">'+
'                <label for="department"> Department:</label>'+
'                <input type="text" class="form-control" id="department" name="department">'+
'            </div>'+
'            <div class="col-md-6">'+
'                <label for="position"> Position:</label>'+
'                <input type="text" class="form-control" id="position" name="position">'+
'            </div>                    '+
'            <div class="col-md-6">'+
'                <label for="semester"> Semester</label>'+
'                <input type="text" class="form-control" id="semester" name="semester">'+
'            </div>'+
'        </div>'+
'          <div class="mt-4 row" style="text-align: justify;-moz-text-align-last:justify ;text-align-last:justify;border:1px solid black; height: 100px;">'+
'            <div class="col-md-6">'+
'                <label for="position"> Total Contact Per Semester = </label>'+
'                <input type="number" class="form-control" id="total_contact" name="total_contact">'+
'            </div>                    '+
'            <div class="col-md-6">'+
'                <div my="2">'+
'                <label for="semester"> Total Excess of 252 hours =</label>'+
'                <input type="number" class="form-control" id="total_excess_252" name="total_excess_252">'+
'                </div>'+
'            </div>'+
'          </div><br>'+
'    <table class="table table-striped">'+
''+
'        <thead>'+
'            <tr class="">'+
'                <th rowspan="2"  >Date</th>'+
'                <th rowspan="2" >Day</th>'+
'                <th rowspan="2" >Subject</th>'+
'                <th rowspan="2" >Sub Code</th>'+
'                <th rowspan="2">No of Std</th>'+
'                <th rowspan="2" >Level (Diploma/Degree)</th>'+
'                <th colspan="2" >Hour</th>'+
'            </tr>'+
'            <tr>'+
'                <th>Lecture</th>'+
'                <th>tutorial</th>'+
'            </tr>'+
'        </thead>'+
'        <tbody>';
    
        for(var i=0;i<number;++i)
        {
            html+='        <tr class="">'+
            '          <td ><input type="date" name="my_date-'+(i)+'"class="form-control" required></td>'+
            '          <td ><input type="text" name="day-'+(i)+'"class="form-control" required></td>'+
            '          <td ><input type="text" name="subject-'+(i)+'"class="form-control" required></td>'+
            '          <td ><input type="text" name="subject_code-'+(i)+'"class="form-control" required></td>'+
            '          <td ><input type="number" name="no_of_std-'+(i)+'"class="form-control" required></td>'+
            '          <td ><input type="text" name="level-'+(i)+'"class="form-control" required></td>'+
            '          <td ><input type="number" name="lecture-'+(i)+'"class="form-control" required></td>'+
            '          <td ><input type="number" name="tutorial-'+(i)+'"class="form-control" required></td>'+
            '        </tr>';
        }

html+='        </tbody>'+
'    </table>'+
''+
''+
'        <div class="row my-3">'+
'            <h3 class="col-12 text-center">(i) Diploma Program: </h3>'+
''+
'            <div class="col-md-6">'+
'                Lecture RM <input type="number"  name="diploma_lecture_rate" required> Per Hour'+
'            </div>'+
'            <div class="col-6">'+
'                Tutorial RM <input type="number" name="diploma_tutorial_rate" required> Per Hour'+
'            </div>'+
'        </div>'+
''+
'        <div class="row my-3">'+
'            <h3 class="col-12 text-center">(ii) Degree Program: </h3>'+
''+
'            <div class="col-md-6">'+
'                Lecture RM <input type="number"  name="degree_lecture_rate" required> Per Hour'+
'            </div>'+
'            <div class="col-6">'+
'                Tutorial RM <input type="number" name="degree_tutorial_rate" required> Per Hour'+
'            </div>'+
'        </div>'+
'        </br></br>'+
'        <div style="background-color:rgb(5, 184, 238);color:rgb(0, 0, 0);padding-left: 10px">'+
'          <h2>PART-II</h2>'+
'        </div>'+
''+
'        <div class="row my-3">'+
'            <div class="col-md-4">'+
'                Verified By</br>'+
'                <input type="text" id="signature" name="signature_hod">'+
'                <p>Head of Department</p>'+
'            </div>'+
'            <div class="col-md-4">'+
'                Recommended by</br>'+
'                <input type="text" id="signature" name="signature_dean">'+
'                <p>Dean of Faculty</p>                      '+
'            </div>'+
'            <div class="col-md-4">'+
'                Approved by</br>'+
'                <input type="text" id="signature" name="signature_deputy_vc">'+
'                <p>Deputy Vice Chancellor</p>                       '+
'            </div>'+
'        </div>'+
''+
'            <div class="text-block">'+
'                <p>1. Please attach Student Attendance Sheet with this claim; Claims must be verified and approved by the Head of Deportment. </p>'+
'                <p>2. All claims must be submitted to the respective Admit; Assistants/Officers in the School by end of the month.</p>'+
'                <p>3. School Admin Assistants/Officers would need to submit the claims to HR deportment before/on 5th of the following month to be able to process the claim in the some month. (e.g. Claims for the month of January must be submitted to HR department by Ch February in order to process the payment in February)</p>'+
'                <p>4- Claims submitted after 5th of the month will be processed in the following month.</p>'+
'            </div>'+
'          </div>'+
'<input type="text" id="total_object" name="total_object" value="'+(number)+'" style="display:none;">'+
'        <div style="display: flex; justify-content: center;; padding-bottom:10px;">'+
''+
'        <button type="button" class="" data-toggle="modal" data-target="#exampleModal">'+
'         Submit'+
'        </button>'+
'        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">'+
'          <div class="modal-dialog" role="document">'+
'            <div class="modal-content">'+
'              <div class="modal-header">'+
'                <h5 class="modal-title" id="exampleModalLabel">Are You Confirm</h5>'+
'                <button type="button" class="close" data-dismiss="modal" aria-label="Close">'+
'                  <span aria-hidden="true">&times;</span>'+
'                </button>'+
'              </div>'+
'              <div class="modal-body">'+
'                Are You sure to submit ?'+
'              </div>'+
'              <div class="modal-footer">'+
'                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>'+
'                <button type="submit" name="submit_form" class="btn btn-primary">YES</button>'+
'              </div>'+
'            </div>'+
'          </div>'+
'        </div>'+
'            <a href="../index.php"><button type="button" class="button">Cancel</button></a>'+
'        </div>'+
'</form>';

    return html;

}