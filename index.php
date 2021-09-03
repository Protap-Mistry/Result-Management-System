<?php

//index.php

include('admin/srms.php');

$object = new srms();

$object->query = "
SELECT * FROM exam_srms 
WHERE exam_result_published = 'Yes' 
AND exam_status = 'Enable'
";

$result = $object->get_result();

include('header.php');

?>

<div class="card">
	
	<div class="card-header"><h3 class="text-center"><b>Search Your Result</b></h3></div>
	<div class="card-body">
		<div class="mycard">
			<form method="post" action="result.php" class="form_label">

				<div class="form-group">
				    <label for="exam">Select Exam Type</label>
					<select name="exam_name" class="form-control">
						<option value="">Select Exam</option>
						<?php
						foreach($result as $row)
						{
							echo '<option value="'.$row["exam_id"].'">'.$row["exam_name"].'</option>';
						}
						?>
					</select>
				</div>
				<div class="form-group">
				    <label for="roll">Enter Your Roll No.</label>
					<input type="text" name="student_roll_no" class="form-control"/ >
				</div>
				<div class="buttons">
                    <div class="one">
                        <button type="submit" name="submit" class="btn btn-success">Result</button>
                        <span><button type="reset" name="clear" class="btn btn-warning">Clear</button></span>
                        
                    </div>
                </div>
			</form>
		</div>
	</div>	
</div>
<br>		    

<?php

include('footer.php');

?>