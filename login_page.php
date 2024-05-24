<?php include('includes/header.php');?>
<?php include('includes/db_connection.php');?>

<div class="section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-12 text-center align-self-center py-5">
					<div class="section pb-5 pt-5 pt-sm-2 text-center">
						<div class="card-3d-wrap mx-auto">
							<div class="card-3d-wrapper">
								<div class="card-front">
									<div class="center-wrap">
										<div class="section text-center">
											<h4 class="mb-4 pb-3">Log In</h4>

                                            <form class="form-group" action="actions/login_process.php" method="post">

                                                <div class="form-group">
                                                    <input type="text" name="uname" class="form-style" placeholder="Username" id="logemail" autocomplete="off">
                                                    <i class="bi bi-8-circle-fill"></i>
                                                </div>	
                                                <div class="form-group mt-2">
                                                    <input type="email" name="email" class="form-style" placeholder="Email" id="logpass" autocomplete="off">
                                                    <i class="input-icon uil uil-lock-alt"></i>                    
                                                <input type="submit" class="btn mt-4" name="login" value="Login">
                                            </form>

                            				<p class="mb-0 mt-4 text-center"><a href="#0" class="link">Register a new user</a></p>
				      					</div>
			      					</div>
			      				</div>
			      			</div>
			      		</div>
			      	</div>
		      	</div>
	      	</div>
	    </div>
	</div>

    <?php
        if(isset($_GET['message'])){
            echo '<div class="bg-dark p-4 w-50 rounded mx-auto text-center">';
            echo "<h6>".$_GET['message']."</h6>";
            echo '</div>';
        }
    ?>
