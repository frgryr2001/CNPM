
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>The Easiest Way to Add Input Masks to Your Forms</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    
    <link rel="stylesheet" href="./assets/css/loginU.css">
</head>

<body>
    <div class="registration-form">
        <form id="form-register">
            <div class="form-icon">
                <span><i class="icon icon-user"></i></span>
            </div>
            <div class="form-group">
                <input type="number" class="form-control item" id="phone" placeholder="phone" />
            </div>
            <div class="form-group">
                <input type="date" class="form-control item" id="birthday" placeholder="birthday" />
            </div>
            <div class="form-group">
                <input type="text" class="form-control item" id="name" placeholder="name" />
            </div>
            <div class="form-group">
                <input type="text" class="form-control item" id="email" placeholder="Email" />
            </div>
            <div class="form-group">
                <input type="password" class="form-control item" id="password" placeholder="Password" />
            </div> 
            <div class="form-group">
                <select name="gender" id="gender" class="form-control" style="border-radius: 35px;">
                    <option selected value="1">Male</option>
                    <option value="0">Female</option>
                </select>
            </div>
            <div class="form-group">
                <input type="text" class="form-control item" id="address" placeholder="Address" />
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-block create-account">Create Account</button>
            </div>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
     <script src="./assets/js/loginU.js"></script>
    <script> 
            const url = '../api/register_api.php'
            const formRegister = document.querySelector('#form-register')
            formRegister.addEventListener('submit',function(e){
                e.preventDefault();
                const phone = document.querySelector('#phone').value;
                const birthday = document.querySelector('#birthday').value;
                const name = document.querySelector('#name').value;
                const password = document.querySelector('#password').value;
                const email = document.querySelector('#email').value;
                const gender = document.querySelector('#gender').value;
                const address = document.querySelector('#address').value;
                $.ajax({
                    url,
                    method: 'POST',
                    data: {email, password, name, phone, address, birthday, gender}
                }).done(response => {
                    console.log(response);
                    if (!response.status){
                        toastr.error(response.message);
                    }else{
                        toastr.success(response.message);
                        window.location.href = response.redirect;
                    }
                });
            })

        </script>
</body>
</html>