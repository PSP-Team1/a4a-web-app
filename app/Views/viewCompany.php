<?= view('templates/header');

?>


<div class="container">

  <div class="row">
    <div class="col-lg-6">

    </div>
    <div class="ibox ">
      <div class="ibox-title">
        <h2>View Company - <b><span style="color: navy"><?php echo $company['companyName'] ?></b></h2>
      </div>

      <div class="ibox-content">

        <?php

                    echo "Email: " . $company['email'] . "<br>";
                    echo "Contact: " . $company['contact'] . "<br>";
                    echo "Tel: " . $company['tel'] . "<br>";
                    echo "Company Name: " . $company['companyName'] . "<br>";
                    echo "Company Number: " . $company['companyNumber'] . "<br>";
                    echo "Address: " . $company['address'] . "<br>";
                    echo "Date Created: " . $company['date_created'] . "<br>";
                    ?>
      </div>
    </div>

    <div class="ibox ">
      <div class="ibox-title">
        <h2>Company Management</h2>
      </div>

      <div class="ibox-content">

        <a class="btn btn-success btn-outline" href="/AdminCreateTemplate" role="button"> <i class="bx bx-list-ul  "></i>
          View Company Audit(s)</a>

      </div>
    </div>
  </div>
</div>

<?= view('templates/footer'); ?>