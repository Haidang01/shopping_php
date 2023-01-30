<div style="width: 50%; margin: 0 auto;">
  <h1 class="text-center">Đăng nhập</h1>
  <form action="/shopping_php/controllers/loginUser.php" method="POST">
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Email address</label>
      <input type="email" class="form-control" name='email' id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">Password</label>
      <input type="password" class="form-control" name='pass' id="exampleInputPassword1">
    </div>
    <button type="submit" style='width:100%' class="btn btn-primary">Submit</button>
  </form>
</div>