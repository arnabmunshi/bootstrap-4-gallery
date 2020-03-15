<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap 4 Gallery</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.2/baguetteBox.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.2/baguetteBox.min.js"></script>

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
          <div class="col-md-4">
            <a href="./gallery/<?=$file;?>">
              <div class="card mb-4 box-shadow image-card"
                style="background-image:url('./gallery/<?=$file;?>')"></div>
            </a>
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
      baguetteBox.run('.gallery', {
        noScrollbars: true,
      });
    </script>
  </body>
</html>