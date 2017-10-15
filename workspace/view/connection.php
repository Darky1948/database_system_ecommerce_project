<div class="container" style="width:30%;">
    <div class="row">
	<form action="" method="POST" >
            <div class="form-group">
                <label for="login">Email</label>
                <input type="email" id="email" name="email" class="form-control" placeholder="Email" required autofocus>
            </div>
            
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name ="password" class="form-control" placeholder="******************" required>
            </div>
            
            <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
	</form>
    </div>
</div> <!-- /container -->

<?php 
    if($return != 0 && $return != -1){
            echo '<p style="text-align:center;">'. $return_codes[$return] . '</p>';
    }
?>