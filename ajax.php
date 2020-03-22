<?php
$mysql = new mysqli("server115.hosting.reg.ru","u0977049_dt","doublekk55","u0977049_dt");
mysqli_set_charset($mysql,'utf8');

?>

<?php
if(isset($_POST['city'])){
  $result = $mysql->query("SELECT * FROM `city`");
  echo  '<div class="col-4 ">'.
    '<div class="card">'.
      '<div class="card-body">'.
        '<div class="container ">'.
          '<h2 class="main-filtration-button"><b>Фильтр</b></h2>'.
          '<div class="custom-control custom-switch main-filtration-custom ">'.
            '<input type="checkbox" class="custom-control-input" id="customSwitch1">'.
          '  <label class="custom-control-label" for="customSwitch1">Страны СНГ</label>'.
          '</div>'.
        '  <div class="btn-group btn-block main-filtration-cards">'.
            '<button type="button" class="btn btn-outline-secondary btn-block">По популярности</button>'.
            '<button type="button" class="btn btn-outline-secondary  dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">'.
              '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down">'.
                '<polyline points="6 9 12 15 18 9"></polyline>'.
              '</svg>'.
          '  </button>'.
          '  <div class="dropdown-menu">'.
              '<a class="dropdown-item" href="#">Action</a>'.
              '<a class="dropdown-item" href="#">Another action</a>'.
            '  <a class="dropdown-item" href="#">Something else here</a>'.
              '<div class="dropdown-divider"></div>'.
              '<a class="dropdown-item" href="#">Separated link</a>'.
          '  </div>'.
          '</div>'.
          '<div class="btn-group btn-block main-filtration-cards-2">'.
            '<button type="button" class="btn btn-outline-secondary btn-block">По сезону</button>'.
            '<button type="button" class="btn btn-outline-secondary  dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">'.
            '  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down">'.
              '  <polyline points="6 9 12 15 18 9"></polyline>'.
            '  </svg>'.
            '</button>'.
          '  <div class="dropdown-menu">'.
              '<a class="dropdown-item" href="#">Action</a>'.
              '<a class="dropdown-item" href="#">Another action</a>'.
              '<a class="dropdown-item" href="#">Something else here</a>'.
              '<div class="dropdown-divider"></div>'.
              '<a class="dropdown-item" href="#">Separated link</a>'.
            '</div>'.
        '  </div>'.
        '  <div class="main-line"></div>'.
        '</div>'.
      '</div>'.
  '  </div>'.
  '</div>'.
  '<div class="col-8 ">';
    while ($row = $result->fetch_assoc()) {
      echo '<div class="card container " >'.

      '<div class="card-body card-click" data-type="text" data-pk="'.$row["id"].'">'.
      '  <div class="row align-items-center">'.
        '  <div class="col-auto">'.
            '<!-- Avatar -->'.
            '<a  class="avatar avatar-lg avatar-4by3 card-click" data-pk="'.$row["id"].'">'.
              '<img src="'. $row['img'] .'" alt="..." class="avatar-img rounded ">'.
          '  </a>'.
          '</div>'.
          '<div class="col ml-n2">'.
            '<h3 class="mb-1 card-click" data-pk="'.$row["id"].'">'.
              '<a href="#">'.
              $row['name'].
              '</a>'.
            '</h3>'.
          '  <p class="small text-muted mb-1">'.
              '<time datetime="2018-06-21">Популярность</time>'.
          '  </p>'.
            '<div class="row align-items-center no-gutters">'.
            '  <div class="col-auto">'.
                '<div class="small mr-2">80%</div>'.
            '  </div>'.
              '<div class="col">'.
                '<div class="progress progress-sm" style="height: 4; width: 100px;">'.
                '  <div class="progress-bar" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>'.
                '</div>'.
            '  </div>'.
            '</div>'.
        '  </div>'.
          '<div class="col-auto">'.
          '  <div class="main-card-visited">'.
              '<h5 class="text-uppercase text-muted mb-2">'.
                'ПОСЕТИЛО'.
            '  </h5>'.
              '<span class="h2 mb-0">'.
              '  35.2K'.
              '  <div class="main-line-blue"></div>'.
            '  </span>'.
            '</div>'.
        '  </div>'.
          '<div class="col-auto">'.
            '<div class="dropdown">'.
            '  <a href="#" class="dropdown-ellipses dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">'.
              '  <i class="fe fe-more-vertical"></i>'.
          '    </a>'.
            '  <div class="dropdown-menu dropdown-menu-right">'.
              '  <a href="#!" class="dropdown-item">'.
                  'Action'.
                '</a>'.
              '  <a href="#!" class="dropdown-item">'.
                '  Another action'.
                '</a>'.
                '<a href="#!" class="dropdown-item">'.
                '  Something else here'.
                '</a>'.
              '</div>'.
            '</div>'.
          '</div>'.
      '  </div>'.
      '</div>'.
    '</div>';
  }
  '</div>';
?>
<script>

  $(document).ready(function() {

  $(".card-click").click(function() {

    function fadeIn(el, speed) {
      var step = 2 / speed;
      var interval = setInterval(function() {
      if (+el.style.opacity >= 1)
        clearInterval(interval);

        el.style.opacity = +div.style.opacity + step;
      }, speed / 1000);
      }

      var div = document.getElementById("some-div")

      fadeIn(div, 300);


      var id = $(this).data('pk'); // мой код


      $.ajax({
          type: 'POST',
          data: {
              "tour": id
          },
          url: 'ajax.php',
          success: function(html){
            $("#content").html(html);

           }
      });

  });

});

</script>
<?php
}
?>


<?php
if(isset($_POST['tour'])){
  $id_tour = $_POST['tour'];
  $result = $mysql->query("SELECT * FROM `tour` WHERE `idcity` = $id_tour");
  ?>
  <div class="col-4  main-filtration-col">
    <div class="card">
      <div class="card-body">
        <div class="container ">
          <h2 class="main-filtration-button"><b>Фильтр</b></h2>
          <div class="custom-control custom-switch main-filtration-custom ">
            <input type="checkbox" class="custom-control-input" id="customSwitch1">
            <label class="custom-control-label" for="customSwitch1">Пользовательские</label>

          </div>

          <div class="btn-group btn-block main-filtration-cards">
            <button type="button" class="btn btn-outline-secondary btn-block">По популярности</button>
            <button type="button" class="btn btn-outline-secondary  dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down">
                <polyline points="6 9 12 15 18 9"></polyline>
              </svg>
            </button>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="#">Action</a>
              <a class="dropdown-item" href="#">Another action</a>
              <a class="dropdown-item" href="#">Something else here</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">Separated link</a>
            </div>
          </div>

          <div class="btn-group btn-block main-filtration-cards-2">
            <button type="button" class="btn btn-outline-secondary btn-block">По цене</button>
            <button type="button" class="btn btn-outline-secondary  dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down">
                <polyline points="6 9 12 15 18 9"></polyline>
              </svg>
            </button>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="#">Action</a>
              <a class="dropdown-item" href="#">Another action</a>
              <a class="dropdown-item" href="#">Something else here</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">Separated link</a>
            </div>
          </div>

          <div class="btn-group btn-block main-filtration-cards-3">
            <button type="button" class="btn btn-outline-secondary btn-block">По тематике</button>
            <button type="button" class="btn btn-outline-secondary  dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down">
                <polyline points="6 9 12 15 18 9"></polyline>
              </svg>
            </button>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="#">Action</a>
              <a class="dropdown-item" href="#">Another action</a>
              <a class="dropdown-item" href="#">Something else here</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">Separated link</a>
            </div>
          </div>


          <div class="main-line"></div>

        </div>
      </div>
    </div>
  </div>
  <div class="col-8 ">
    <?php while ($row = $result->fetch_assoc()) { ?>
    <div class="container">

      <div class="card card-fill "  >

        <!-- Image -->
        <a class="crop card-click" data-pk="<?php echo $row['id']?>" href="#">
                          <img src="<?php echo $row['img']; ?>" alt="..." class="card-img-top">
                      </a>
        <!-- Body -->
        <div class="card-body mt-0 card-click" data-pk="<?php echo $row['id']?>">
          <div class="row align-items-center">
            <div class="col">

              <!-- Title -->
              <h3 class="mb-4 page2-card-button card-click" data-pk="<?php echo $row['id']?>">
                <a class="test" href="#"><b><?php echo $row['name']; ?></b></a>
              </h3>

              <!-- Subtitle -->
              <div class="page2-card-subtitle ">
              <a class="text-muted ">
                <?php echo $row['description']; ?>
              </a>
            </div>

            </div>
            <div class="col-auto">

            </div>
          </div> <!-- / .row -->
        </div>

        <!-- Footer -->
        <div class="card-footer card-footer-boxed">
          <div class="row align-items-center">
            <div class="col">
              <div class="row align-items-center no-gutters">

                <div class="col">

                  <!-- Progress -->
                  <a href="#!" class="btn btn-sm btn-white">
                    👍 <?php echo $row['people']; ?>
                  </a>

                </div>
              </div> <!-- / .row -->
            </div>
            <div class="col-auto">

              <!-- Avatar group -->

              <small class="text-muted">
                Приняли участие
              </small>

              <div class="avatar-group">
                <div class="avatar">
                  <img src="https://sun9-37.userapi.com/c830608/v830608360/1d5676/JXzPfhCzemw.jpg?ava=1" alt="test" class="avatar-img rounded-circle border border-white" width="45px" height="45px">
                </div>
                <div class="avatar">
                  <img src="https://sun9-37.userapi.com/c830608/v830608360/1d5676/JXzPfhCzemw.jpg?ava=1" alt="test" class="avatar-img rounded-circle border border-white" width="45px" height="45px">
                </div>
                <div class="avatar">
                  <img src="https://sun9-37.userapi.com/c830608/v830608360/1d5676/JXzPfhCzemw.jpg?ava=1" alt="test" class="avatar-img rounded-circle border border-white" width="45px" height="45px">
                </div>
                <div class="avatar">
                  <img src="https://sun9-37.userapi.com/c830608/v830608360/1d5676/JXzPfhCzemw.jpg?ava=1" alt="test" class="avatar-img rounded-circle border 2px border-white" width="45px" height="45px">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  <?php } ?>
  <script>
  $(document).ready(function() {

    function fadeIn(el, speed) {
      var step = 2 / speed;
      var interval = setInterval(function() {
      if (+el.style.opacity >= 1)
        clearInterval(interval);

        el.style.opacity = +div.style.opacity + step;
      }, speed / 1000);
      }

      var div = document.getElementById("some-div")

      fadeIn(div, 300);

    $(".card-click").click(function() {

        var id = $(this).data('pk');
        

        $.ajax({
            type: 'POST',
            data: {
                "full-tour": id
            },
            url: 'ajax.php',
            success: function(html){
              $("#content").html(html);
             }
        });

    });

  });
  </script>
<?php
}

?>

<?php if(isset($_POST['full-tour'])){
  $id_full_tour = $_POST['full-tour'];
  $result= $mysql->query("SELECT * FROM `tour` WHERE `id`= $id_full_tour");
  ?>
  <?php while ($row = $result->fetch_assoc()) { ?>
  <div class="container main-cards-card ">

    <div class="card card-fill ">

      <!-- Image -->
      <a class="crop" href="# ">

          <img src="<?php echo $row['img']; ?>" alt="..." class="card-img-top ">
      </a>

      <!-- Body -->
      <div class="card-body mt-0">
        <div class="row align-items-center">
          <div class="col ">

            <!-- Title -->
            <h4 class="mb-2 page3-card-cener ">
              <a href="# "><?php echo $row['name'] ?></a>
            </h4>

            <!-- Subtitle -->
            <small class="text-muted page3-card-cener-2">
              Добавил:<?php echo $row['owner']; ?>
            </small>

          </div>

        </div> <!-- / .row -->
      </div>

      <!-- Footer -->
      <div class="card-footer border-0 card-footer-boxed  ">
        <div class="row align-items-center ">
          <div class="col">
            <div class="row align-items-center no-gutters  page3-card-cener-3">

              <div class="col ">
                <small class="text-muted ">
                  УЧАВСТВУЕТ
                </small>
                <h4 class="mb-2">
                  <a href="#"><?php echo $row['people']; ?> ЧЕЛОВЕК</a>
                </h4>
              </div>
            </div> <!-- / .row -->
          </div>
          <div>
            <div class="row align-items-center">
              <div class="col">

                <div class="row align-items-center no-gutters page3-card-cener-4">
                  <div class="col ">
                    <small class="text-muted ">
                      СТОИМОСТЬ
                    </small>
                    <h4 class="mb-2">
                      <a href="# ">$<?php echo $row ['price']; ?></a>
                    </h4>
                  </div>
                </div>
              </div>
            </div> <!-- / .row -->
          </div>
        </div>
      </div>
        <b>
      <div class="card-footer border card-footer-boxed">
        <div class="row align-items-center">
          <div class="col">
            <div class="row align-items-center no-gutters">
              <div class="col">
                <h4 class="mb-2 main-nav-link-element">
                  <a href="# "><b>Дата</b></a>
                </h4>
              </div>
            </div> <!-- / .row -->
          </div>
          <div>
            <div class="row align-items-center no-gutters">
              <div class="col">
                <h4 class="mb-2 page3-text-cener">
                  <a href="# "><b><?php echo $row['datestart']; ?></b></a>
                </h4>
              </div>
            </div>
          </div>
        </div> <!-- / .row -->
      </div>
      <div class="card-footer border card-footer-boxed">
        <div class="row align-items-center">
          <div class="col">
            <div class="row align-items-center no-gutters">

              <div class="col">
                <h4 class="mb-2 main-nav-link-element">
                  <a href="# m2"><b>Место встречи</b></a>
                </h4>
              </div>
            </div> <!-- / .row -->
          </div>
          <div>
            <div class="row align-items-center no-gutters">
              <div class="col">
                <h5 class="mb-2 page3-text-cener-2">
                  <a href="# "><b><?php echo $row['place']; ?></b></a>
              </h5>
              </div>
            </div>
          </div>
        </div> <!-- / .row -->
      </div>
      <div class="card-footer border card-footer-boxed">
        <div class="row align-items-center">
          <div class="col">
            <div class="row align-items-center no-gutters">
              <div class="col">
                <h4 class="mb-2 main-nav-link-element">
                  <a href="# "><b>Куратор</b></a>
                </h4>
              </div>
            </div> <!-- / .row -->
          </div>
          <div>
            <div class="row align-items-center no-gutters">
              <div class="col  ">
                <h4 class="mb-2 page3-text-cener-3">
                  <a href="# "><b><?php echo $row ['owner']; ?></b></a>
                </h4>
              </div>
            </div>
          </div>
        </div> <!-- / .row -->
      </div>
      <div>


        <button type="button" class="btn btn-primary page3-button" data-toggle="modal" data-target="#exampleModal">
          Запустить модальное окно
        </button>
        <button type="button" class="btn border btn-primary page3-button-2 btn_click">Принять участие</button>


        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title text-muted" id="exampleModalLabel">САНКТ-ПЕТЕРБУРГ</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <h1>GEEK TOUR</h1>
                <h4 class="text-muted">Погрузиться в попкультуру</h4><br>
                <div class="container">
                  <div class="col-6">

                    <img src="img/1293835.svg" alt="">


                  </div>
                  <div class="col-6 page3-smehenie"><br>
                    <div class="row">
                      <h3><b>Общий сбор</b></h3>
                      <p class="text-muted ">Встречаемся возле вокзала после чего начинаем нашу программу</p>
                    </div><br>
                    <div class="row">
                      <h3><b>Посещение клуб "Retro Games"</b></h3>
                      <p class="text-muted">Играем на игровых автоматах 90-х. В такие игры как Sonic, Tekken и Street Fighter</p>
                    </div><br>
                    <div class="row">
                      <h3><b>Знакомство с автором комиксов</b></h3>
                      <p class="text-muted">Познакамимся с представителями Digital,Янушем Лигвушским</p>
                    </div><br>
                    <div class="row">
                      <h3><b>Играем в антикафе</b></h3>
                    </div><br>
                  </div>
                </div>
              </div>
              <div class="col">
                <form>
                  <div class="form-group">

                      <h3>Добавить пожелание:</h3>
                    <!-- <div class="col-sm-10"> -->

                    <input type="offer" class="form-control form-control-lg" id="examplOffer">
                      <button type="button" class="btn btn-secondary">Отправить</button>
                    <!-- </div> -->
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
<?php } ?>
<script>
$(document).ready(function() {

  function fadeIn(el, speed) {
    var step = 2 / speed;
    var interval = setInterval(function() {
    if (+el.style.opacity >= 1)
      clearInterval(interval);

      el.style.opacity = +div.style.opacity + step;
    }, speed / 1000);
    }

    var div = document.getElementById("some-div-1")

    fadeIn(div, 300);

  $(".btn_click").click(function() {

      $.ajax({
          type: 'POST',
          data: {
              "final": "ccc"
          },
          url: 'ajax.php',
          success: function(html){
            $("#content").html(html);
           }
      });

  });

});
</script>
<?php
}
 ?>

<?php
 if (isset($_POST['final'])) {
?>
    <div class="container pageend-cards-card-2">
      <div class="card">
        <h1 class="mb-2 pageend-first-information ">
          Замечательно!
        </h1>

        <img src="img/8.svg" alt="">
        <div class="card-Footer pageend-second-information mb-4">
          <h3 class="text-muted">Вы успешно записались на участие в туре,<br>желаем вам удачно провести время!</h3>
        </div>
      </div>
    </div>


    <script>
    $(document).ready(function() {

      function fadeIn(el, speed) {
        var step = 2 / speed;
        var interval = setInterval(function() {
        if (+el.style.opacity >= 1)
          clearInterval(interval);

          el.style.opacity = +div.style.opacity + step;
        }, speed / 1000);
        }

        var div = document.getElementById("some-div-2")

        fadeIn(div, 300);

      $(".btn_click").click(function() {


      });

    });
    </script>
<?php
 } ?>
