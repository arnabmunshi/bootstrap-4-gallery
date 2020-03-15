<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap 4 Gallery</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="custom.css">
  </head>
  <body>
    <div class="album py-5 bg-light">
      <div class="container">
        <div class="row gallery">
          <?php
          $dir = __DIR__.'/./gallery/';
          
          // Open a directory, and read its contents
          if (is_dir($dir)) {
            $filelist = scandir($dir);
            unset($filelist[0]);
            unset($filelist[1]);
            $filelist = array_reverse($filelist);

            if (sizeof($filelist) > 0) {
              foreach ($filelist as $key => $file) {
          ?>
          <!-- loop start -->
          <div class="col-md-4 card-container">
            <div class="card mb-4 box-shadow image-card" style="background-image:url('./gallery/<?=$file;?>')"></div>
            <div class="check-circle-container inactive-circle-container" data-status="inactive">
              <div class="check-icon-container"><i class="fa fa-check"></i></div>
            </div>
          </div>
          <!-- loop end -->
          <?php
              }
            } else {
              $no_image_found = true;
            }
          }
          ?>
        </div>
      </div>
    </div>

    <script>
      $('body').on('click', '.check-circle-container[data-status="inactive"]', function() {
        $(this).addClass('active-circle-container').removeClass('inactive-circle-container').attr('data-status','active');
        $(this).find('.check-icon-container').addClass('bg-blue');
        $(this).find('.fa-check').addClass('color-white');
      });
      $('body').on('click', '.check-circle-container[data-status="active"]', function() {
        $(this).addClass('inactive-circle-container').removeClass('active-circle-container').attr('data-status','inactive');
        $(this).find('.check-icon-container').removeClass('bg-blue');
        $(this).find('.fa-check').removeClass('color-white');
      });
    </script>
  </body>
</html>