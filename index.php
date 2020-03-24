<?php 
  require('inc/header.php');
  require('inc/navbar.php');
?>

  <!-- Page Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-12">

        <!-- Product grid -->
        <div class="row" id="product-grid"></div>

        <!-- Comment section -->
        <div class="row pt-5 pb-5">
          <div class="col-sm-10 offset-sm-1">
            <div class="comment-wrapper">
              <div class="panel panel-info">
                <div class="panel-heading mb-3">
                  <h2>Comments</h2>
                </div>
                <div class="panel-body">
                  <!-- Comment form -->
                  <label for="author">Name:</label>
                  <input class="form-control mb-2" type="text" id="author" name="author" placeholder="Enter your name here...">
                  <label for="author">Email:</label>
                  <input class="form-control mb-2" type="email" id="email" name="email" placeholder="Enter your email here...">
                  <br>
                  <textarea class="form-control" id="comment" name="comment" placeholder="Enter your comment here..." rows="3"></textarea>
                  <br>
                  <button type="button" class="btn btn-info pull-right" onclick="submitComment()">Submit</button>
                  <div class="clearfix"></div>
                  <hr>
                  
                  <!-- Comment list -->
                  <ul id="comment-list"></ul>

                </div>
                <!-- /.panel-body -->

              </div>
              <!-- /.panel-info -->

            </div>
            <!-- /.comment-wrapper -->

          </div>
          <!-- /.col-sm-10 -->

        </div>
        <!-- /.comment-section-row -->

      </div>
      <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container -->

  <?php require('inc/footer.php') ?>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script>
    $(document).ready(function(){
      // Products
      $.ajax({
        url: 'api/products/read.php',
        type: 'GET',
        dataType: 'json',
        success: function(data) {
          let response = '';
          for (let product in data) {
            response += `<div class="col-lg-4 col-md-6 mb-4 pt-3">
                          <div class="card h-100">
                            <a href="#"><img class="card-img-top" src="`+data[product].img+`" alt=""></a>
                            <div class="card-body">
                              <h4 class="card-title">
                                <a href="#">`+data[product].name+`</a>
                              </h4>
                              <p class="card-text">`+data[product].description+`</p>
                            </div>
                          </div>
                        </div>`;
          }
          $(response).appendTo($('#product-grid'));
        }
      });

      // Comments
      $.ajax({
        url: 'api/comments/readApproved.php',
        type: 'GET',
        dataType: 'json',
        success: function(data) {
          let response = '';
          for (let comment in data) {
            response += `<li class="comment">
                            <div class="comment-body">
                              <strong class="text-success">`+data[comment].author+`</strong>
                              <span class="text-muted">
                                  <small class="text-muted">`+data[comment].createdAt+`</small>
                              </span>
                              <p>`+data[comment].comment+`</p>
                            </div>
                        </li>`;
          }
          $(response).appendTo($('#comment-list'));
        }
      });
    });

    function submitComment() {
      let author = $('#author').val();
      let email = $('#email').val();
      let comment = $('#comment').val();
      if (author.length == 0 || email.length == 0 || comment.length == 0) {
        alert('Please fill in all the fields before submitting the comment.');
        return;
      } else {
        $.ajax({
          url: 'api/comments/create.php',
          type: 'POST',
          data: {
            author: author,
            email: email,
            comment: comment
          },
          success: function(){
            alert('Comment submitted successfuly! Your comment will appear once administrator approves it.');
            $('#author').val('');
            $('#email').val('');
            $('#comment').val('');
          },
          error: function(){
            alert('An error during comment submission occured. Please try again later.');
          }
        });
      }
    }
  </script>
