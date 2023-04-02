<?php
require_once(__DIR__ . "/../../partials/nav.php");
is_logged_in(true);
//handle public profile
$user_id = (int)se($_GET, "id", get_user_id(), false);
$isMe = $user_id == get_user_id();
$isEdit = isset($_GET["edit"]);

$db = getDB();
?>
<?php
if (isset($_POST["save"])) {
    $email = se($_POST, "email", null, false);
    $username = se($_POST, "username", null, false);
    $vis = isset($_POST["vis"]) ? 1 : 0;
    $params = [":email" => $email, ":username" => $username, ":id" => get_user_id(), ":vis" => $vis];

    $stmt = $db->prepare("UPDATE Users set email = :email, username = :username, visibility = :vis where id = :id");
    try {
        $stmt->execute($params);
        flash("Profile saved", "success");
    } catch (Exception $e) {
        if ($e->errorInfo[1] === 1062) {
            //https://www.php.net/manual/en/function.preg-match.php
            preg_match("/Users.(\w+)/", $e->errorInfo[2], $matches);
            if (isset($matches[1])) {
                flash("The chosen " . $matches[1] . " is not available.", "warning");
            } else {
                //TODO come up with a nice error message
                echo "<pre>" . var_export($e->errorInfo, true) . "</pre>";
            }
        } else {
            //TODO come up with a nice error message
            echo "<pre>" . var_export($e->errorInfo, true) . "</pre>";
        }
    }



    //check/update password
    $current_password = se($_POST, "currentPassword", null, false);
    $new_password = se($_POST, "newPassword", null, false);
    $confirm_password = se($_POST, "confirmPassword", null, false);
    if (!empty($current_password) && !empty($new_password) && !empty($confirm_password)) {
        if ($new_password === $confirm_password) {
            //TODO validate current
            $stmt = $db->prepare("SELECT password from Users where id = :id");
            try {
                $stmt->execute([":id" => $user_id]);
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                if (isset($result["password"])) {
                    if (password_verify($current_password, $result["password"])) {
                        $query = "UPDATE Users set password = :password where id = :id";
                        $stmt = $db->prepare($query);
                        $stmt->execute([
                            ":id" => $user_id,
                            ":password" => password_hash($new_password, PASSWORD_BCRYPT)
                        ]);

                        flash("Password reset", "success");
                    } else {
                        flash("Current password is invalid", "succes");
                    }
                }
            } catch (Exception $e) {
                echo "<pre>" . var_export($e->errorInfo, true) . "</pre>";
            }
        } else {
            flash("New passwords don't match", "warning");
        }
    }
}
//select fresh data from table
$stmt = $db->prepare("SELECT id, email, username, visibility, created from Users where id = :id LIMIT 1");
$isVisible = false;
try {
    $stmt->execute([":id" => $user_id]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($user) {
        if ($isMe) {
            $_SESSION["user"]["email"] = $user["email"];
            $_SESSION["user"]["username"] = $user["username"];
        }
        if (se($user, "visibility", 0, false) > 0) {

            $isVisible = true;
        }
        $email = se($user, "email", "", false);
        $username = se($user, "username", "", false);
        $joined = se($user, "created", "", false);
    } else {
        flash("User doesn't exist", "danger");
    }
} catch (Exception $e) {
    flash("An unexpected error occurred, please try again", "danger");
    //echo "<pre>" . var_export($e->errorInfo, true) . "</pre>";
}

//fetch ratings
$ratings = [];
//Spit query into data and total
$base_query = "SELECT R.id, R.product_id, R.user_id, P.name, R.rating, R.comment, R.created FROM Ratings as R INNER JOIN Products as P on P.id = R.product_id ";
$total_query = "SELECT count(1) as total FROM Ratings R ";
$query = "where R.user_id = :uid";
$params = [":uid" => $user_id];
$per_page = 5;
paginate($total_query . $query, $params, $per_page);
$query .= " LIMIT :offset, :count";
$params[":offset"] = $offset;
$params[":count"] = $per_page;
//get the records
$stmt = $db->prepare($base_query . $query);
//we'll want to convert this to use bindValue so ensure they're integers so lets map our array
foreach ($params as $key => $value) {
    $type = is_int($value) ? PDO::PARAM_INT : PDO::PARAM_STR;
    $stmt->bindValue($key, $value, $type);
}
$params = null; //set it to null to avoid issues

try{
    $stmt->execute($params);
    $r = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if ($r) {
        $ratings = $r;
    }
} catch (PDOException $e) {
    error_log(var_export($e, true));
    flash("Error fetching ratings", "danger");
}
?>


<div class="container-fluid">
    <h1>Profile</h1>

    <?php if ($isMe && $isEdit) : ?>
    <form method="POST" onsubmit="return validate(this);">
        <div class="mb-3">
            <label class="form-label" for="email">Email</label>
            <input class="form-control" type="email" name="email" id="email" value="<?php se($email); ?>" />
        </div>
        <div class="mb-3">
            <label class="form-label" for="username">Username</label>
            <input class="form-control" type="text" name="username" id="username" value="<?php se($username); ?>" />
        </div>
        <div class="mb-3">
            <div class="form-check form-switch">
                <input <?php if ($isVisible) {
                            echo "checked";
                        } ?> class="form-check-input" type="checkbox" role="switch" id="vis" name="vis">
                <label class="form-check-label" for="vis">Toggle Visibility</label>
            </div>
        </div>
        <!-- DO NOT PRELOAD PASSWORD -->
        <div class="mb-3"><h3>Password Reset</h3></div>
        <div class="mb-3">
            <label class="form-label" for="cp">Current Password</label>
            <input class="form-control" type="password" name="currentPassword" id="cp" />
        </div>
        <div class="mb-3">
            <label class="form-label" for="np">New Password</label>
            <input class="form-control" type="password" name="newPassword" id="np" />
        </div>
        <div class="mb-3">
            <label class="form-label" for="conp">Confirm Password</label>
            <input class="form-control" type="password" name="confirmPassword" id="conp" />
        </div>
        <div>
        <table>
            <tr>
                <td><input type="submit" class="btn btn-success" value="Save Changes" name="save" /></td>
                <?php if ($isMe) : ?>
                    <td><a class="btn btn-success btn" role="button" href="<?php echo get_url("profile.php"); ?>">View Profile</a></td>
                <?php endif; ?>
            </tr>
        </table>
        </div>
    <?php else : ?>
    </form>
<?php if ($isVisible || $isMe) : ?>
    <div class="container">
    <div class="row d-flex justify-content-center">
    <div class="col-md-7">
            <div class="card p-3 py-4">
                <div class="text-center">
                    <img src="" width="100" class="rounded-circle">
                </div>

                <div class="text-center mt-3">

                    <h5 class="mt-2 mb-0">@<?php se($username); ?></h5>
                    <span>Joined: <?php se($joined); ?></span>
                    
                    <div class="buttons">
                        <?php if ($isMe) : ?>
                            <a class="btn btn-success btn" role="button" href="?edit">Edit Profile</a>
                        <?php endif; ?>
                    </div>
                </div>

            </div>
        </div>
    </div>
    </div>

    <div>
    <section class="p-4 p-md-5 text-center text-lg-start shadow-1-strong rounded">
	<div class="container">
	<h1>Reviews</h1>
		<div class="row d-flex justify-content-center">
			<?php foreach($ratings as $r) : ?>
				<div class="col-md-10">
					<div class="card">
						<div class="card-body m-3">
							<div class="row">
								<div class="col-lg-4 d-flex justify-content-center align-items-center mb-4 mb-lg-0">
									<img src=""
										class="rounded-circle img-fluid shadow-1" alt="" width="200" height="200" />
								</div>
								<div class="col-lg-8">
									<h5 class="text-muted fw-light mb-4"><?php se($r,"comment"); ?></h5>
									<h4>Rating: <span class="fw-bold text-muted mb-0"><?php se($r,"rating") ?>/5</span></h4>
									<p class="fw-bold lead mb-2"><a class="link-success" href="product_details.php?id=<?php se($r,"product_id");?>"> <?php se($r, "name"); ?></a></p>
									<p class="fw-bold text-muted mb-0"><?php se($r,"created") ?></p>
								</div>
							</div>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
    <?php require(__DIR__ . "/../../partials/pagination.php"); ?>
</section>
    </div>
<?php else : ?>
    Profile is private
    <?php
    flash("Private profile", "warning");
    redirect("shop.php");
    ?>
<?php endif; ?>
</div>
<?php endif; ?>

<script>
    function validate(form){
        //TODO 1: implement JavaScript validation
        //ensure it returns false for an error and true for success
        let isValid = true;

        let email = form.email.value;
        let username = form.username.value;
        let current = form.currentPassword.value;
        let newPass = form.newPassword.value;
        let confirm = form.confirmPassword.value;

        if(!isValidEmail(email)){
            flash("Invalid email address","warning");
            isValid = false;
        }
        if(!isValidUsername(username)){
            flash("Username must only contain 3-16 characters a-z, 0-9, _, or -","warning");
            isValid = false;
        }
        
        if(current && !isValidPassword(current)){
            flash("Current password is invalid","info");
            isValid = false;
        }
        if(newPass && !isValidPassword(newPass)){
            flash("New password must be a minimum of eight characters", "warning");
            isValid = false;
        }
        if(confirm && !isEqual(newPass,confirm)){
            flash("New passwords must match","warning");
            isValid = false;
        }

        return isValid;
    }
</script>
<?php
require_once(__DIR__ . "/../../partials/flash.php");
?>