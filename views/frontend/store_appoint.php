<?php
require_once BASE_PATH . "../views/frontend/inc/header.php";
require_once BASE_PATH . "../views/frontend/inc/navbar.php";
// session_start();
?>
<div class="page-wrapper">
  <div class="container">
    <nav style="--bs-breadcrumb-divider: '>'" aria-label="breadcrumb" class="fw-bold my-4 h4">
      <ol class="breadcrumb justify-content-center">
        <li class="breadcrumb-item">
          <a class="text-decoration-none" href="?page=home">Home</a>
        </li>
        <li class="breadcrumb-item">
          <a class="text-decoration-none" href="?page=doctors">Doctors</a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">DR.
          <?= strtoupper($allDoctors[0]['name_doctor']) ?>
        </li>
      </ol>
    </nav>
    
    <div class="d-flex flex-column gap-3 details-card doctor-details">
    <?php if (Session::getSession("errors")): ?>
        <?php require_once BASE_PATH . "../views/errors/error.php" ?>
      <?php endif; ?>
      <?php if (Session::getSession("success")): ?>
        <?php require_once BASE_PATH . "../views/errors/success.php" ?>
      <?php endif; ?>
      <div class="details d-flex gap-2 align-items-center">
        <img src="assets/img/doctors/<?= $allDoctors[0]['img_doctor'] ?>" alt="doctor" class="img-fluid rounded-circle"
          height="150px" width="150px" />
        <div class="details-info d-flex flex-column gap-3">
          <h4 class="card-title fw-bold">DR. <?= strtoupper($allDoctors[0]['name_doctor']) ?></h4>
          <h6 class="card-title fw-bold">
            Doctor <?= strtoupper($allDoctors[0]['name_doctor']) ?> Works in Major
            <?= strtoupper($allDoctors[0]['name_major']) ?> and more info about the doctor in summary
            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Sit qui ipsa totam voluptatum a eius.
          </h6>
        </div>
      </div>
      <hr />
      <form class="form" method="POST" action="?page=store_book">
        <div class="form-items">
          <div class="mb-3">
            <label class="form-label required-label" for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" />
          </div>
          <div class="mb-3">
            <label class="form-label required-label" for="phone">Phone</label>
            <input type="tel" class="form-control" id="phone" name="phone" />
          </div>
          <div class="mb-3">
            <label class="form-label required-label" for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" />
          </div>
        </div>
        <button type="submit" class="btn btn-primary">
          Confirm Booking
        </button>
      </form>
     
    </div>
  </div>
</div>

<script>
  const stars = document.querySelectorAll(".star");

  stars.forEach((star, index) => {
    star.addEventListener("click", () => {
      const isActive = star.classList.contains("active");
      if (isActive) {
        star.classList.remove("active");
      } else {
        star.classList.add("active");
      }
      for (let i = 0; i < index; i++) {
        stars[i].classList.add("active");
      }
      for (let i = index + 1; i < stars.length; i++) {
        stars[i].classList.remove("active");
      }
    });
  });
</script>

</div>

<?php
require_once BASE_PATH . "../views/frontend/inc/footer.php";
?>
   <?php Session::removeSession("errors")?>
   <?php Session::removeSession("success")?>