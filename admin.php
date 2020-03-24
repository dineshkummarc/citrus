<?php 
  require('inc/header.php');
  require('inc/navbar.php');
?>

    <div class="container">
        <div class="row">
            <div class="col-sm-12 pt-5">
                <h2>Pending comments</h2>
                <br>
                <div id="id-table">
                    <table class="table">
                        <thead class="thead-light" id="comment-table-header">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Date</th>
                                <th scope="col">Comment</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody id="comment-list">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

<?php require('inc/footer.php') ?>

<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script>
    $(document).ready(function(){
      let commentsFound = false;
      $.ajax({
        url: 'api/comments/readUnapproved.php',
        type: 'GET',
        dataType: 'json',
        async: false,
        success: function(data) {
            if (data.hasOwnProperty('status')) {
                // The only status at the moment is 'Comments not found'.
            } else {
                commentsFound = true;
                let response = '';
                for (let comment in data) {
                    response += `<tr>
                                <th scope="row">`+data[comment].id+`</th>
                                <td>`+data[comment].author+`</td>
                                <td>`+data[comment].email+`</td>
                                <td>`+data[comment].createdAt+`</td>
                                <td>`+data[comment].comment+`</td>
                                <td><button type="button" class="btn btn-success" onclick="approveComment(`+data[comment].id+`)">Approve</button></td>
                            </tr>`;
                }
                $(response).appendTo($('#comment-list'));  
            }
        }
      });
      
      if (!commentsFound) {
        $('.table').empty();
        $('<p>No comments found.</p>').appendTo('#id-table');
      }
    });

    function approveComment(id) {
        $.ajax({
            url: 'api/comments/update.php',
            type: 'POST',
            data: {
                id: id
            },
            success: function(){
                alert('Comment approved successfuly.');
                location.reload();
            },
            error: function(){
                alert('An error during comment approval occured.');
            }
        });
    }
  </script>
