<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>FaceMash</title>
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Comfortaa', cursive;
            /* font-size: 80%; */
        }
        .display_none{
            display: none;
        }
        .navbar{
            background-color: white;
            min-height: 15vh;
        }
        .center{
          width: 100%;
          /* min-height: 100vh; */
          display: flex;
          justify-content: center;
        }
        .vertical-center{
          display: flex;
          align-items: center;
          min-height: 85vh;
        }
    </style>
  </head>
  <body>
    {{-- NavBar --}}
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
          <a class="navbar-brand mt-1" href="/">
              <h4>Facemash</h4>
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ms-auto">
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Settings
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  <li><a class="dropdown-item" href="#">Check Stats</a></li>
                  <li><a class="dropdown-item" href="/images/create">Upload Images</a></li>
                  <li><a class="dropdown-item" href="#">Invite Friends</a></li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
    </nav>
    <div class="container">
        @yield('content')
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(document).ready(function(){
          $('.player1').fadeIn(300);
          $('.player2').fadeIn(300);
         
          $('.like2').click(function(){
              $('.like2 i').removeClass('fa-regular fa-heart');
              $('.like2 i').addClass('fa-solid fa-heart');
              $('.like2 i').css('color', 'red');
              // $('.like1 i').removeClass('fa-solid fa-heart');
              // $('.like1 i').addClass('fa-regular fa-heart');
              // $('.like1 i').css('color', '');
              $('.player1').fadeOut(300);
              $('.player2').fadeOut(300);
          });
          $('.like1').click(function(){
              $('.like1 i').removeClass('fa-regular fa-heart');
              $('.like1 i').addClass('fa-solid fa-heart');
              $('.like1 i').css('color', 'red');
              // $('.like2 i').removeClass('fa-solid fa-heart');
              // $('.like2 i').addClass('fa-regular fa-heart');
              // $('.like2 i').css('color', '');
              $('.player1').fadeOut(300);
              $('.player2').fadeOut(300);
          });
        });
    </script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>