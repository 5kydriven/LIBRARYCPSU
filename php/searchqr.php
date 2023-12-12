<?php

include 'db.php';

$action = !isset($_GET['id']) ? 'none' : strtolower($_GET['id']);
switch ($action) {
    case 'id':

    extract($_POST);

        $q_emp = mysqli_query($conn,"SELECT * FROM members WHERE idnumber = '$idscan'") ;
        $row=mysqli_fetch_array($q_emp); 
        $rows = mysqli_num_rows($q_emp);
       


        if ($rows < 1) { ?>

               <div class="alert alert-dismissible">
                  <center><i class="icon fa fa-ban text-danger" style="font-size: 5em" ></i></center>
                  <p style="font-size: 2em;text-align:center; ">No Match found!!!</p>
                  <embed src="../beep.mp3" style="visibility:hidden">
                  
                </div>

  
 
        <?php }
        else{  ?>

          <script type="text/javascript">
            window.open("process.php?key=<?php echo $idscan; ?>","_self");
          </script>
            


        <!-- 
            
        <div class="card-box mb-30">
          <div class="pd-20">
            <h4 class="text-blue h4">Borrower name: <?php  echo $row['fullname'] ?></h4>
          </div>
          <div class="pb-20">
            <table class="data-table table stripe hover nowrap">
              <thead>
                <tr>
                  <th>Title</th>
                  <th>Author</th>
                  <th>ISBN</th>
                  <th>Date Borrowed</th>
                  <th>Date Returned</th>
                  <th>Due Date</th>
                  <th>Penalty</th>

                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>sample</td>
                </tr>
                
              </tbody>
            </table>
          </div>
        </div>

         <div class="card-box mb-30">
          <div class="pb-20">
            <table class="data-table table stripe hover nowrap">
              <thead>
                <form method="POST">
                    <div class="form-inline">
                      <input type="text" id="search_data" class="form-control" placeholder="Search ISBN"/>
                      <button type="button" id="search" class="btn btn-primary"><span class="glyphicon glyphicon-search"></span> Search</button>
                    </div>
                  </form>
                <tr>
                  <th>Title</th>
                  <th>Author</th>
                  <th>ISBN</th>

                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>sample</td>
                </tr>
                
              </tbody>
            </table>
          </div>
        </div>



 -->

                 
           <?php }
           
        
                
    break;
    default:
    break;
}

?>                 