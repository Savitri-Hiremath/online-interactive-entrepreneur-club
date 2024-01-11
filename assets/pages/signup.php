<link rel="stylesheet" href="custom.css">
<link href="assets/css/style.css" rel="stylesheet">

<div class="login">
        <div class="col-4 bg-white border rounded p-4 shadow-sm">
            <form method="post" action="assets/php/process.php?signup">
            <h2 class="text-center" style="color:#00008B;font-family:cambria;font-size:300%"><b>NEXUS</b></h2></br>

                    <h5 class="text-center">Create a Nexus account</h5>
                    <p class="text-center">It's quick and easy.</p>
                <div class="d-flex">
                    <div class="form-floating mt-1 col-6 ">
                        <input type="text" name="firstname" value="<?=showFormData('firstname')?>" class="form-control rounded-0" placeholder="username/email">
                        <label for="floatingInput">first name</label>
                    </div>
                    <div class="form-floating mt-1 col-6">
                        <input type="text" name="lastname" value="<?=showFormData('lastname')?>" class="form-control rounded-0" placeholder="username/email">
                        <label for="floatingInput">last name</label>
                    </div>
                </div>
                <?=showError('firstname')?>
                <?=showError('lastname')?>
                <div class="d-flex gap-3 my-3">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" id="exampleRadios1"
                            value="1" <?=isset($_SESSION['formdata'])?'':'checked'?><?=showFormData('gender')==1?'checked':''?>>
                        <label class="form-check-label" for="exampleRadios1">
                            Male
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" id="exampleRadios3"
                            value="2"<?=showFormData('gender')==2?'checked':''?>>
                        <label class="form-check-label" for="exampleRadios3">
                            Female
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" id="exampleRadios2"
                            value="3"<?=showFormData('gender')==3?'checked':''?>>
                        <label class="form-check-label" for="exampleRadios2">
                            Other
                        </label>
                    </div>
                </div>
                <div class="form-floating mt-1">
                    <input type="email" name="email" value="<?=showFormData('email')?>" class="form-control rounded-0" placeholder="username/email">
                    <label for="floatingInput">email</label>
                </div>
                <?=showError('email')?>
                <div class="form-floating mt-1">
                    <input type="text" name="username" value="<?=showFormData('username')?>" class="form-control rounded-0" placeholder="username/email">
                    <label for="floatingInput">username</label>
                </div>
                <?=showError('username')?>
                <div class="form-floating mt-1">
                    <input type="password" name="password" value="<?=showFormData('password')?>" class="form-control rounded-0" id="floatingPassword" placeholder="Password">
                    <label for="floatingPassword">password</label>
                </div>
                <?=showError('password')?>

                <div class="mt-3 d-flex justify-content-between align-items-center">
                    <button class="btn btn-primary" type="submit">Sign Up</button>
                    <a href="?login" class="text-decoration-none">Already have an account ?</a>


                </div>

            </form>
        </div>
    </div>


 