<div style="width: 50%; margin: 0 auto;">
  <h1 class="text-center">Đăng ký</h1>
  <form action="/shopping_php/controllers/signup.php" method="POST">
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Email </label>
      <input type="email" class="form-control" required id="exampleInputEmail1" aria-describedby="emailHelp"
        name="email">
    </div>
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Name</label>
      <input type="text" class="form-control" required name="name" id="exampleInputEmail1" aria-describedby="emailHelp"
        </div>
      <!-- <div class="mb-3">
        <label for="formFile" class="form-label">Avatar</label>
        <input class="form-control" type="file" id="formFile" name="avatar">
      </div> -->
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Password</label>
        <input type="password" class="form-control" required id="exampleInputPassword1" name="pass">
      </div>
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Address</label>
        <input type="text" class="form-control" required id="exampleInputEmail1" aria-describedby="emailHelp"
          name="address">
      </div>
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Phone</label>
        <input type="number" class="form-control" required id="exampleInputEmail1" aria-describedby="emailHelp"
          name="phone">
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>