<?php include 'header.php'; ?>

<!-- Redirect when there's no JS -->
<!-- https://stackoverflow.com/questions/14121743/php-noscript-combination-to-detect-enabled-javascript-in-browser -->
<!-- Local Storage: -->
<!-- https://stackoverflow.com/questions/17087636/how-to-save-data-from-a-form-with-html5-local-storage -->
<!-- multipage form -->
<!-- https://www.w3schools.com/howto/howto_js_form_steps.asp -->

<?php
session_start();

?>
<div class="content">

<div class="progress-container">
	<ol class="progression-bar step-1">
	   <li class="is-active"><span class="progression-title">Personal and Family</span></li>
	   <li class="is-pending"><span class="progression-title">School Information</span></li>
	   <li><span class="progression-title">Essay Questions</span></li>
	   <li class=""><span class="progression-title">Review</span></li>
	</ol>
</div>

<form action="" name="form-step-1">

<div class="container container-form">
  <div class="row">

    <div class="col-sm-8">
      
				<div class="fieldgroup">
					<input type="text" name="name" id="name" />
					<label for="firstName">Name</label>
				</div>

				<div class="fieldgroup">
					<input type="text" name="homeAddress" id="homeAddress" />
					<label for="lastName">Home Address</label>
				</div>

				<div class="container">
					<div class="row">
						<div class="col-6 fieldgroup no-padding no-margin">
							<input type="text" name="dob" id="dob" />
							<label for="email">Date of Birth</label>
						</div>
						<div class="col-6 fieldgroup no-padding no-margin">
							<input type="text" name="pob" id="pob" />
							<label for="email">Place of Birth</label>
						</div>
					</div>
				</div>

				<div class="fieldgroup">
					<input type="text" name="timeInUS" id="timeInUS" />
					<label for="postalCode">How long have you live in the U.S.?</label>
				</div>

				<div class="fieldgroup">
					<input type="text" name="disabilities" id="disabilities" />
					<label for="postalCode">List any psychological and/or physical disabilities</label>
				</div>

    </div>

    <div class="col-sm-4">
      			<div class="fieldgroup">
					<input type="text" name="email" id="email" />
					<label for="firstName">Email</label>
				</div>

				<div class="fieldgroup">
					<input type="text" name="applicant-phone" id="applicant-phone" />
					<label for="lastName">Telephone</label>
				</div>

				<div class="fieldgroup">
					<span>Are you a U.S. citizen?</span>
					<input type="radio" id="US-yes" name="USCitizen" value="US-yes">Yes
					<input type="radio" id="US-no" name="USCitizen" value="US-no">No
				</div>
    </div>

  </div>
</div>

</form>
</div>
<?php include 'footer.php'; ?>